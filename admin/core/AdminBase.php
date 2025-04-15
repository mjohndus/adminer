<?php

namespace AdminNeo;

abstract class AdminBase
{
	/** @var Config */
	protected $config;

	/** @var array */
	private $systemDatabases;

	/** @var array */
	private $systemSchemas;

	public function __construct(array $config = [])
	{
		$this->config = new Config($config);
	}

	public function getConfig(): Config
	{
		return $this->config;
	}

	public abstract function setOperators(?array $operators, ?string $likeOperator, ?string $regexpOperator): void;

	public abstract function getOperators(): ?array;

	public abstract function getLikeOperator(): ?string;

	public abstract function getRegexpOperator(): ?string;

	public function setSystemObjects(array $databases, array $schemas): void
	{
		$this->systemDatabases = $databases;
		$this->systemSchemas = $schemas;
	}

	public abstract function name();

	/**
	 * Returns connection parameters.
	 *
	 * @return string[] array($server, $username, $password)
	 */
	public function getCredentials(): array
	{
		$server = $this->config->getServer(SERVER);

		return [$server ? $server->getServer() : SERVER, $_GET["username"], get_password()];
	}

	/**
	 * Verifies given password if database itself does not require any password.
	 *
	 * @return true|string true for success, string for error message
	 */
	public function verifyDefaultPassword(string $password)
	{
		$hash = $this->config->getDefaultPasswordHash();
		if ($hash === null || $hash === "") {
			return lang('Database does not support password.');
		} elseif (!password_verify($password, $hash)) {
			return lang('Invalid server or credentials.');
		}

		return true;
	}

	/**
	 * Authenticate the user.
	 *
	 * @return bool|string true for success, string for error message, false for unknown error.
	 */
	public function authenticate(string $username, string $password)
	{
		if ($password == "") {
			$hash = $this->config->getDefaultPasswordHash();

			if ($hash === null) {
				return lang('AdminNeo does not support accessing a database without a password, <a href="https://www.adminer.org/en/password/"%s>more information</a>.', target_blank());
			} else {
				return $hash === "";
			}
		}

		return true;
	}

	/**
	 * Returns a private key used for permanent login.
	 *
	 * @return string|false Cryptic string which gets combined with password or false in case of an error.
	 * @throws \Random\RandomException
	 */
	public function getPrivateKey(bool $create = false)
	{
		return get_private_key($create);
	}

	/**
	 * Returns key used to group brute force attacks.
	 * Behind a reverse proxy, you want to return the last part of X-Forwarded-For.
	 */
	public function getBruteForceKey(): string
	{
		return $_SERVER["REMOTE_ADDR"];
	}

	/**
	 * Returns server name displayed in breadcrumbs. Can be empty string.
	 */
	public function getServerName(string $server): string
	{
		if ($server == "") {
			return "";
		}

		$serverObj = $this->config->getServer($server);

		return $serverObj ? $serverObj->getName() : $server;
	}

	public abstract function getDatabase(): ?string;

	/**
	 * Returns cached list of databases.
	 *
	 * @return string[]
	 */
	public function getDatabases($flush = true): array
	{
		return $this->filterListWithWildcards(get_databases($flush), $this->config->getHiddenDatabases(), false, $this->systemDatabases);
	}

	/**
	 * Returns the list of schemas.
	 *
	 * @return string[]
	 */
	public function getSchemas(): array
	{
		return $this->filterListWithWildcards(schemas(), $this->config->getHiddenSchemas(), false, $this->systemSchemas);
	}

	/**
	 * Returns the list of collations.
	 *
	 * @param string[] $keepValues List of collations that can not be removed by filtering.
	 *
	 * @return string[][]
	 */
	public function getCollations(array $keepValues = []): array
	{
		$visibleCollations = $this->config->getVisibleCollations();
		$filterList = $visibleCollations ? array_merge($visibleCollations, $keepValues) : [];

		return $this->filterListWithWildcards(collations(), $filterList, true);
	}

	/**
	 * @param string[] $values
	 * @param string[] $filterList
	 * @param string[] $systemObjects
	 */
	private function filterListWithWildcards(array $values, array $filterList, bool $keeping, array $systemObjects = []): array
	{
		if (!$values || !$filterList) {
			return $values;
		}

		$index = array_search("__system", $filterList);
		if ($index !== false) {
			unset($filterList[$index]);
			$filterList = array_merge($filterList, $systemObjects);
		}

		array_walk($filterList, function (&$value) {
			$value = str_replace('\\*', ".*", preg_quote($value, "~"));
		});
		$pattern = '~^(' . implode("|", $filterList) . ')$~';

		return $this->filterListWithPattern($values, $pattern, $keeping);
	}

	private function filterListWithPattern(array $values, string $pattern, bool $keeping): array
	{
		$result = [];

		foreach ($values as $key => $value) {
			if (is_array($value)) {
				if ($subValues = $this->filterListWithPattern($value, $pattern, $keeping)) {
					$result[$key] = $subValues;
				}
			} elseif (($keeping && preg_match($pattern, $value)) || (!$keeping && !preg_match($pattern, $value))) {
				$result[$key] = $value;
			}
		}

		return $result;
	}

	public abstract function getQueryTimeout(): int;

	/**
	 * Sends additional HTTP headers.
	 */
	public function sendHeaders(): void
	{
		//
	}

	/**
	 * Returns lists of directives for Content-Security-Policy HTTP header.
	 *
	 * @var string[] $csp [directive name => allowed sources].
	 */
	public function updateCspHeader(array &$csp): void
	{
		//
	}

	public function printFavicons(): void
	{
		$colorVariant = validate_color_variant($this->getConfig()->getColorVariant());

		// https://evilmartians.com/chronicles/how-to-favicon-in-2021-six-files-that-fit-most-needs
		// Converting PNG to ICO: https://redketchup.io/icon-converter
		echo "<link rel='icon' type='image/x-icon' href='", link_files("favicon-$colorVariant.ico", ["../admin/images/variants/favicon-$colorVariant.ico"]), "' sizes='32x32'>\n";
		echo "<link rel='icon' type='image/svg+xml' href='", link_files("favicon-$colorVariant.svg", ["../admin/images/variants/favicon-$colorVariant.svg"]), "'>\n";
		echo "<link rel='apple-touch-icon' href='", link_files("apple-touch-icon-$colorVariant.png", ["../admin/images/variants/apple-touch-icon-$colorVariant.png"]), "'>\n";
	}

	public abstract function printToHead(): void;

	/**
	 * Returns configured URLs of the CSS files together with autoloaded adminneo.css if exists.
	 *
	 * @return string[]
	 */
	public function getCssUrls(): array
	{
		$urls = $this->config->getCssUrls();

		foreach (["adminneo.css", "adminneo-light.css", "adminneo-dark.css"] as $filename) {
			if (file_exists($filename)) {
				$urls[] = "$filename?v=" . filemtime($filename);
			}
		}

		return $urls;
	}

	public function isLightModeForced(): bool
	{
		return file_exists("adminneo-light.css") && !file_exists("adminneo-dark.css");
	}

	public function isDarkModeForced(): bool
	{
		return file_exists("adminneo-dark.css") && !file_exists("adminneo-light.css");
	}

	/**
	 * Returns configured URLs of the JS files together with autoloaded adminneo.js if exists.
	 *
	 * @return string[]
	 */
	public function getJsUrls(): array
	{
		$urls = $this->config->getJsUrls();

		$filename = "adminneo.js";
		if (file_exists($filename)) {
			$urls[] = "$filename?v=" . filemtime($filename);
		}

		return $urls;
	}

	public abstract function printLoginForm(): void;

	/**
	 * Returns composed row for login form field.
	 */
	public function getLoginFormRow(string $fieldName, string $label, string $field): string
	{
		if ($label) {
			return "<tr><th>$label</th><td>$field</td></tr>\n";
		} else {
			return "$field\n";
		}
	}

	/**
	 * Returns table name used in navigation and headings.
	 *
	 * @param array $tableStatus The result of SHOW TABLE STATUS.
	 *
	 * @return string HTML code, "" to ignore table
	 */
	public function getTableName(array $tableStatus): string
	{
		return h($tableStatus["Name"]);
	}

	public abstract function getFieldName(array $field, int $order = 0): string;

	/**
	 * Returns formatted comment.
	 *
	 * @return string HTML to be printed.
	 */
	public function formatComment(?string $comment): string
	{
		return h($comment);
	}

	public abstract function printTableMenu(array $tableStatus, ?string $set = ""): void;

	/**
	 * Returns foreign keys for table.
	 */
	public function getForeignKeys(string $table): array
	{
		return foreign_keys($table);
	}

	public abstract function getBackwardKeys(string $table, string $tableName): array;

	public abstract function printBackwardKeys(array $backwardKeys, array $row): void;

	public abstract function formatSelectQuery(string $query, float $start, bool $failed = false): string;

	public abstract function formatMessageQuery(string $query, string $time, bool $failed = false): string;

	public abstract function formatSqlCommandQuery(string $query): string;

	public abstract function getTableDescriptionFieldName(string $table): string;

	public abstract function fillForeignDescriptions(array $rows, array $foreignKeys): array;

	/**
	 * Returns a link to use in select table.
	 *
	 * @param string|int|null $val Raw value of the field.
	 * @param ?array $field Single field returned from fields(). Null for aggregated field.
	 */
	public function getFieldValueLink($val, ?array $field): ?string
	{
		if (is_mail($val)) {
			return "mailto:$val";
		}
		if (is_web_url($val)) {
			return $val;
		}

		return null;
	}

	public abstract function formatSelectionValue(?string $val, ?string $link, ?array $field, ?string $original): string;

	public abstract function formatFieldValue($value, array $field): ?string;

	public abstract function printTableStructure(array $fields): void;

	public abstract function printTablePartitions(array $partitionInfo): void;

	public abstract function printTableIndexes(array $indexes): void;

	public abstract function printSelectionColumns(array $select, array $columns): void;

	public abstract function printSelectionSearch(array $where, array $columns, array $indexes): void;

	public abstract function printSelectionOrder(array $order, array $columns, array $indexes): void;

	public abstract function printSelectionLimit(?int $limit): void;

	public abstract function printSelectionLength(?string $textLength): void;

	public abstract function printSelectionAction(array $indexes): void;

	public function isDataEditAllowed(): bool
	{
		return !information_schema(DB);
	}

	public abstract function processSelectionColumns(array $columns, array $indexes): array;

	public abstract function processSelectionSearch(array $fields, array $indexes): array;

	public abstract function processSelectionOrder(array $fields, array $indexes): array;

	/**
	 * Processed limit box in select.
	 *
	 * @return ?int Expression to use in LIMIT, will be escaped.
	 */
	public function processSelectionLimit(): ?int
	{
		if (!isset($_GET["limit"])) {
			return $this->config->getRecordsPerPage();
		}

		return $_GET["limit"] != "" ? (int)$_GET["limit"] : null;
	}

	public abstract function processSelectionLength(): string;

	public abstract function editRowPrint($table, $fields, $row, $update);

	public abstract function editFunctions($field);

	public abstract function getFieldInput(string $table, array $field, string $attrs, $value, ?string $function): string;

	/**
	 * Returns hint for edit field.
	 *
	 * @param string $table Table name.
	 * @param array $field Single field from fields().
	 * @param string $value Field value.
	 *
	 * @return string HTML code.
	 */
	public function getFieldInputHint(string $table, array $field, ?string $value): string
	{
		return support("comment") ? $this->formatComment($field["comment"]) : "";
	}

	public abstract function processFieldInput(?array $field, string $value, string $function = ""): string;

	/**
	 * Detect JSON field or value and optionally reformat the value.
	 *
	 * @param string $fieldType
	 * @param string|array $value
	 * @param bool|null $pretty True to pretty format, false to compact format, null to skip formatting.
	 *
	 * @return bool Whether field or value are detected as JSON.
	 */
	public function detectJson(string $fieldType, &$value, ?bool $pretty = null): bool
	{
		if (is_array($value)) {
			$flags = JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | ($this->getConfig()->isJsonValuesAutoFormat() ? JSON_PRETTY_PRINT : 0);
			$value = json_encode($value, $flags);
			return true;
		}

		$flags = JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | ($pretty ? JSON_PRETTY_PRINT : 0);

		if (str_contains($fieldType, "json")) {
			if ($pretty !== null && $this->getConfig()->isJsonValuesAutoFormat()) {
				$value = json_encode(json_decode($value), $flags);
			}

			return true;
		}

		if (!$this->config->isJsonValuesDetection()) {
			return false;
		}

		if (
			$value != "" &&
			preg_match('~varchar|text|character varying|String~', $fieldType) &&
			($value[0] == "{" || $value[0] == "[") &&
			($json = json_decode($value))
		) {
			if ($pretty !== null && $this->getConfig()->isJsonValuesAutoFormat()) {
				$value = json_encode($json, $flags);
			}

			return true;
		}

		return false;
	}

	public abstract function getDumpOutputs(): array;

	public abstract function getDumpFormats(): array;

	public abstract function sendDumpHeaders(string $identifier, bool $multiTable = false): string;

	/**
	 * Exports database structure.
	 */
	public function dumpDatabase(string $database): void
	{
		//
	}

	public abstract function dumpTable(string $table, string $style, int $viewType = 0): void;

	public abstract function dumpData(string $table, string $style, string $query): void;

	public abstract function getImportFilePath(): string;

	public abstract function printDatabaseMenu(): void;

	public function printNavigation(?string $missing): void
	{
		global $VERSION;

		$last_version = $_COOKIE["neo_version"] ?? null;
?>

<div class="header">
	<?= $this->name(); ?>

	<?php if ($missing != "auth"): ?>
		<span class="version">
			<?= h($VERSION); ?>
			<a id="version" class="version-badge" href="https://github.com/adminneo-org/adminneo/releases"<?= target_blank(); ?> title="<?= h($last_version); ?>">
				<?= ($this->config->isVersionVerificationEnabled() && $last_version && version_compare($VERSION, $last_version) < 0 ? icon_solo("asterisk") : ""); ?>
			</a>
		</span>
		<?php
		if ($this->config->isVersionVerificationEnabled() && !$last_version) {
			echo script("verifyVersion('" . js_escape(ME) . "', '" . get_token() . "');");
		}
		?>
	<?php endif; ?>
</div>

<?php
	}

	public abstract function printDatabaseSwitcher(?string $missing): void;

	public function printTablesFilter(): void
	{
		echo "<div class='tables-filter jsonly'>"
			. "<input id='tables-filter' type='search' class='input' autocomplete='off' placeholder='" . lang('Table') . "'>"
			. script("initTablesFilter(" . json_encode($this->getDatabase()) . ");")
			. "</div>\n";
	}

	public abstract function printTableList(array $tables): void;

	public abstract function getForeignColumnInfo(array $foreignKeys, string $column): ?array;
}
