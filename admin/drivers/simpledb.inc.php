<?php

namespace AdminNeo;

Drivers::add("simpledb", "SimpleDB", ["SimpleXML + allow_url_fopen"]);

if (isset($_GET["simpledb"])) {
	define("AdminNeo\DRIVER", "simpledb");
	define("AdminNeo\DIALECT", "simpledb");

	if (class_exists('SimpleXMLElement') && ini_bool('allow_url_fopen')) {
		define("AdminNeo\DRIVER_EXTENSION", "SimpleXML");

		class SimpleDbConnection extends Connection
		{
			/** @var string */
			private $serviceUrl;

			/** @var int */
			public $timeout = 0;

			public $next;

			public function open(string $server, string $username, string $password): bool
			{
				if ($server == '') {
					$this->error = lang('Invalid server or credentials.');
					return false;
				}

				$parts = parse_url($server);

				if (!$parts || !isset($parts['host']) || !preg_match('~^sdb\.([a-z0-9-]+\.)?amazonaws\.com$~i', $parts['host']) ||
					isset($parts['port'])
				) {
					$this->error = lang('Invalid server or credentials.');
					return false;
				}

				$this->serviceUrl = build_http_url($server, "", "", "");
				if (!$this->serviceUrl) {
					$this->error = lang('Invalid server or credentials.');
					return false;
				}

				$this->version = '2009-04-15';

				return (bool) sdb_request('ListDomains', ['MaxNumberOfDomains' => 1], $this);
			}

			public function getServiceUrl(): string
			{
				return $this->serviceUrl;
			}

			public function selectDatabase(string $name): bool
			{
				return $name == "domain";
			}

			public function query(string $query, bool $unbuffered = false)
			{
				$params = ['SelectExpression' => $query, 'ConsistentRead' => 'true'];
				if ($this->next) {
					$params['NextToken'] = $this->next;
				}

				$result = sdb_request_all('Select', 'Item', $params, $this->timeout); //! respect $unbuffered

				$this->timeout = 0;
				if ($result === false) {
					return false;
				}

				if (preg_match('~^\s*SELECT\s+COUNT\(~i', $query)) {
					$sum = 0;
					foreach ($result as $item) {
						$sum += $item->Attribute->Value;
					}
					$result = [(object) ['Attribute' => [(object) [
						'Name' => 'Count',
						'Value' => $sum,
					]]]];
				}

				return new SimpleDbResult($result);
			}

			public function quote(string $string): string
			{
				return "'" . str_replace("'", "''", $string) . "'";
			}

		}

		class SimpleDbResult extends Result
		{
			/** @var array */
			private $rows;

			/** @var int */
			private $offset = 0;

			public function __construct(array $result)
			{
				$this->rows = [];

				foreach ($result as $item) {
					$row = [];
					if ($item->Name != '') { // SELECT COUNT(*)
						$row['itemName()'] = (string) $item->Name;
					}

					foreach ($item->Attribute as $attribute) {
						$name = $this->processValue($attribute->Name);
						$value = $this->processValue($attribute->Value);

						if (isset($row[$name])) {
							$row[$name] = (array) $row[$name];
							$row[$name][] = $value;
						} else {
							$row[$name] = $value;
						}
					}

					$this->rows[] = $row;

					foreach ($row as $key => $val) {
						if (!isset($this->rows[0][$key])) {
							$this->rows[0][$key] = null;
						}
					}
				}

				parent::__construct(count($this->rows));
			}

			private function processValue($element)
			{
				return (is_object($element) && $element['encoding'] == 'base64' ? base64_decode($element) : (string) $element);
			}

			public function fetchAssoc()
			{
				$row = current($this->rows);
				if (!$row) {
					return $row;
				}

				$data = [];
				foreach ($this->rows[0] as $key => $val) {
					$data[$key] = $row[$key];
				}

				next($this->rows);

				return $data;
			}

			public function fetchRow()
			{
				$data = $this->fetchAssoc();

				return $data ? array_values($data) : $data;
			}

			public function fetchField()
			{
				$keys = array_keys($this->rows[0]);

				return (object) [
					'name' => $keys[$this->offset++],
					'type' => 15,
					'charsetnr' => 0,
				];
			}

		}
	}



	class SimpleDbDriver extends Driver
	{
		public $primary = "itemName()";

		protected function __construct(Connection $connection, $admin)
		{
			parent::__construct($connection, $admin);

			$this->operators = [
				"=", "<", ">", "<=", ">=", "!=",
				"LIKE", "LIKE %%", "NOT LIKE",
				"IN",
				"IS NULL", "IS NOT NULL",
			];

			$this->likeOperator = "LIKE %%";

			$this->grouping = [
				"count",
			];

			$this->editFunctions = [["json"]];
		}

		private function chunkRequest($ids, $action, $params, $expand = []) {
			foreach (array_chunk($ids, 25) as $chunk) {
				$params2 = $params;
				foreach ($chunk as $i => $id) {
					$params2["Item.$i.ItemName"] = $id;
					foreach ($expand as $key => $val) {
						$params2["Item.$i.$key"] = $val;
					}
				}
				if (!sdb_request($action, $params2)) {
					return false;
				}
			}
			Connection::get()->setAffectedRows(count($ids));
			return true;
		}

		private function extractIds($table, $queryWhere, $limit) {
			$return = [];
			if (preg_match_all("~itemName\(\) = (('[^']*+')+)~", $queryWhere, $matches)) {
				$return = array_map('AdminNeo\idf_unescape', $matches[1]);
			} else {
				foreach (sdb_request_all('Select', 'Item', ['SelectExpression' => 'SELECT itemName() FROM ' . table($table) . $queryWhere . ($limit ? " LIMIT 1" : "")]) as $item) {
					$return[] = $item->Name;
				}
			}
			return $return;
		}

		public function select(string $table, array $select, array $where, array $group, array $order = [], ?int $limit = 1, int $page = 0, bool $print = false)
		{
			Connection::get()->next = $_GET["next"];
			$return = parent::select($table, $select, $where, $group, $order, $limit, $page, $print);
			Connection::get()->next = 0;
			return $return;
		}

		public function delete(string $table, string $queryWhere, int $limit = 0): bool
		{
			return $this->chunkRequest(
				$this->extractIds($table, $queryWhere, $limit),
				'BatchDeleteAttributes',
				['DomainName' => $table]
			);
		}

		public function update(string $table, array $record, string $queryWhere, int $limit = 0, string $separator = "\n"): bool
		{
			$delete = [];
			$insert = [];
			$i = 0;
			$ids = $this->extractIds($table, $queryWhere, $limit);
			$id = idf_unescape($record["`itemName()`"]);
			unset($record["`itemName()`"]);
			foreach ($record as $key => $val) {
				$key = idf_unescape($key);
				if ($val == "NULL" || ($id != "" && [$id] != $ids)) {
					$delete["Attribute." . count($delete) . ".Name"] = $key;
				}
				if ($val != "NULL") {
					foreach ((array) $val as $k => $v) {
						$insert["Attribute.$i.Name"] = $key;
						$insert["Attribute.$i.Value"] = (is_array($val) ? $v : idf_unescape($v));
						if (!$k) {
							$insert["Attribute.$i.Replace"] = "true";
						}
						$i++;
					}
				}
			}
			$params = ['DomainName' => $table];
			return (!$insert || $this->chunkRequest(($id != "" ? [$id] : $ids), 'BatchPutAttributes', $params, $insert))
				&& (!$delete || $this->chunkRequest($ids, 'BatchDeleteAttributes', $params, $delete))
			;
		}

		public function insert(string $table, array $record)
		{
			$params = ["DomainName" => $table];
			$i = 0;
			foreach ($record as $name => $value) {
				if ($value != "NULL") {
					$name = idf_unescape($name);
					if ($name == "itemName()") {
						$params["ItemName"] = idf_unescape($value);
					} else {
						foreach ((array) $value as $val) {
							$params["Attribute.$i.Name"] = $name;
							$params["Attribute.$i.Value"] = (is_array($value) ? $val : idf_unescape($value));
							$i++;
						}
					}
				}
			}
			return sdb_request('PutAttributes', $params);
		}

		public function insertUpdate(string $table, array $records, array $primary): bool
		{
			//! use one batch request
			foreach ($records as $record) {
				if (!$this->update($table, $record, "WHERE `itemName()` = " . q($record["`itemName()`"]))) {
					return false;
				}
			}

			return true;
		}

		public function begin(): bool
		{
			return false;
		}

		public function commit(): bool
		{
			return false;
		}

		public function rollback(): bool
		{
			return false;
		}

		public function slowQuery(string $query, int $timeout): ?string
		{
			$this->connection->timeout = $timeout;

			return $query;
		}

	}



	function create_driver(Connection $connection): Driver
	{
		return SimpleDbDriver::create($connection, Admin::get());
	}

	/**
	 * @param string $hostPath
	 * @return bool
	 */
	function is_server_host_valid($hostPath)
	{
		return strpos(rtrim($hostPath, '/'), '/') === false;
	}

	function connect(bool $primary = false, ?string &$error = null): ?Connection
	{
		$connection = $primary ? SimpleDbConnection::create() : SimpleDbConnection::createSecondary();

		list($server, , $password) = Admin::get()->getCredentials();
		if ($password != "") {
			$result = Admin::get()->verifyDefaultPassword($password);
			if ($result !== true) {
				$error = $result;
				return null;
			}
		}

		if (!$connection->open($server, "", "")) {
			$error = $connection->getError();
			return null;
		}

		return $connection;
	}

	function support($feature) {
		return preg_match('~sql~', $feature);
	}

	function logged_user() {
		$credentials = Admin::get()->getCredentials();
		return $credentials[1];
	}

	function get_databases() {
		return ["domain"];
	}

	function collations() {
		return [];
	}

	function db_collation($db, $collations) {
	}

	function tables_list() {
		$return = [];
		foreach (sdb_request_all('ListDomains', 'DomainName') as $table) {
			$return[(string) $table] = 'table';
		}
		if (Connection::get()->getError() && defined("AdminNeo\PAGE_HEADER")) {
			echo "<p class='error'>" . error() . "\n";
		}
		return $return;
	}

	function table_status($name = "", $fast = false) {
		$return = [];
		foreach (($name != "" ? [$name => true] : tables_list()) as $table => $type) {
			$row = ["Name" => $table, "Auto_increment" => ""];
			if (!$fast) {
				$meta = sdb_request('DomainMetadata', ['DomainName' => $table]);
				if ($meta) {
					foreach ([
						"Rows" => "ItemCount",
						"Data_length" => "ItemNamesSizeBytes",
						"Index_length" => "AttributeValuesSizeBytes",
						"Data_free" => "AttributeNamesSizeBytes",
					] as $key => $val) {
						$row[$key] = (string) $meta->$val;
					}
				}
			}
			if ($name != "") {
				return $row;
			}
			$return[$table] = $row;
		}
		return $return;
	}

	function explain(Connection $connection, string $query): bool
	{
		return false;
	}

	function error() {
		return h(Connection::get()->getError());
	}

	function information_schema() {
	}

	function indexes(string $table, ?Connection $connection = null): array
	{
		return [
			["type" => "PRIMARY", "columns" => ["itemName()"]],
		];
	}

	function fields($table) {
		return fields_from_edit();
	}

	function foreign_keys($table) {
		return [];
	}

	function table($idf) {
		return idf_escape($idf);
	}

	function idf_escape($idf) {
		return "`" . str_replace("`", "``", $idf) . "`";
	}

	function limit($query, $where, ?int $limit, $offset = 0, $separator = " ") {
		return " $query$where" . ($limit !== null ? $separator . "LIMIT $limit" : "");
	}

	function unconvert_field(array $field, $return) {
		return $return;
	}

	function fk_support($table_status) {
	}

	function alter_table($table, $name, $fields, $foreign, $comment, $engine, $collation, $auto_increment, $partitioning) {
		return ($table == "" && sdb_request('CreateDomain', ['DomainName' => $name]));
	}

	function drop_tables($tables) {
		foreach ($tables as $table) {
			if (!sdb_request('DeleteDomain', ['DomainName' => $table])) {
				return false;
			}
		}
		return true;
	}

	function count_tables($databases) {
		foreach ($databases as $db) {
			return [$db => count(tables_list())];
		}
	}

	function found_rows($table_status, $where) {
		return ($where ? null : $table_status["Rows"]);
	}

	function last_id($result)
	{
		return 0;
	}

	function sdb_request($action, $params = [], ?Connection $connection = null) {
		if (!$connection) {
			$connection = Connection::get();
		}

		list($host, $params['AWSAccessKeyId'], $secret) = Admin::get()->getCredentials();
		$params['Action'] = $action;
		$params['Timestamp'] = gmdate('Y-m-d\TH:i:s+00:00');
		$params['Version'] = '2009-04-15';
		$params['SignatureVersion'] = 2;
		$params['SignatureMethod'] = 'HmacSHA1';
		ksort($params);
		$query = '';
		foreach ($params as $key => $val) {
			$query .= '&' . rawurlencode($key) . '=' . rawurlencode($val);
		}
		$query = str_replace('%7E', '~', substr($query, 1));
		$query .= "&Signature=" . urlencode(base64_encode(hash_hmac('sha1', "POST\n" . preg_replace('~^https?://~', '', $host) . "\n/\n$query", $secret, true)));

		$file = @file_get_contents($connection->getServiceUrl(), false, stream_context_create(['http' => [
			'method' => 'POST', // may not fit in URL with GET
			'content' => $query,
			'ignore_errors' => 1,
			'follow_location' => 0,
			'max_redirects' => 0,
		]]));
		if (!$file) {
			$connection->setError(error_get_last()['message']);
			return false;
		}
		libxml_use_internal_errors(true);
		libxml_disable_entity_loader();
		$xml = simplexml_load_string($file);
		if (!$xml) {
			$error = libxml_get_last_error();
			$connection->setError($error->message);
			return false;
		}
		if ($xml->Errors) {
			$error = $xml->Errors->Error;
			$connection->setError("$error->Message ($error->Code)");
			return false;
		}
		$connection->setError('');
		$tag = $action . "Result";
		return $xml->$tag ?: true;
	}

	function sdb_request_all($action, $tag, $params = [], $timeout = 0) {
		$return = [];
		$start = ($timeout ? microtime(true) : 0);
		$limit = (preg_match('~LIMIT\s+(\d+)\s*$~i', $params['SelectExpression'], $match) ? $match[1] : 0);
		do {
			$xml = sdb_request($action, $params);
			if (!$xml) {
				break;
			}
			foreach ($xml->$tag as $element) {
				$return[] = $element;
			}
			if ($limit && count($return) >= $limit) {
				$_GET["next"] = $xml->NextToken;
				break;
			}
			if ($timeout && microtime(true) - $start > $timeout) {
				return false;
			}
			$params['NextToken'] = $xml->NextToken;
			if ($limit) {
				$params['SelectExpression'] = preg_replace('~\d+\s*$~', $limit - count($return), $params['SelectExpression']);
			}
		} while ($xml->NextToken);
		return $return;
	}
}
