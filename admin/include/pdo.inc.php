<?php

namespace AdminNeo;

// PDO can be used in several database drivers
use Exception;
use PDO;
use PDOStatement;

if (extension_loaded('pdo')) {
	abstract class PdoConnection extends Connection
	{
		/** @var PDO */
		protected $pdo;

		/** @var PdoResult|false */
		protected $multiResult;

		protected function dsn(string $dsn, string $username, string $password, array $options = []): bool
		{
			$options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_SILENT;

			try {
				$this->pdo = new PDO($dsn, $username, $password, $options);
			} catch (Exception $exception) {
				$this->error = $exception->getMessage();
				return false;
			}

			$this->version = preg_replace('~^\D*([\d.]+).*~', "$1", (string)@$this->pdo->getAttribute(PDO::ATTR_SERVER_VERSION));

			return true;
		}

		function quote(string $string): string
		{
			return $this->pdo->quote($string);
		}

		function query(string $query, bool $unbuffered = false)
		{
			$statement = $this->pdo->query($query);

			$this->error = "";
			if (!$statement) {
				list(, $this->errno, $this->error) = $this->pdo->errorInfo();
				if (!$this->error) {
					$this->error = lang('Unknown error.');
				}

				return false;
			}

			$result = new PdoResult($statement);
			$this->storeResult($result);

			return $result;
		}

		public function storeResult($result = null)
		{
			if (!$result) {
				$result = $this->multiResult;
				if (!$result) {
					return false;
				}
			}

			if ($result->getColumnsCount()) {
				return $result;
			}

			$this->affectedRows = $result->getAffectedRowsCount();

			return true;
		}

		function nextResult(): bool
		{
			return $this->multiResult && $this->multiResult->nextRowset();
		}
	}

	class PdoResult extends Result
	{
		/** @var PDOStatement */
		private $statement;

		/** @var int */
		private $offset = 0;

		public function __construct(PDOStatement $statement)
		{
			// It is not guaranteed to work with all drivers.
			// MSSQL PDO driver returns -1 for SELECT queries.
			parent::__construct(max($statement->columnCount() ? $statement->rowCount() : 0, 0));

			$this->statement = $statement;
		}

		public function getColumnsCount(): int
		{
			return $this->statement->columnCount();
		}

		public function getAffectedRowsCount(): int
		{
			return $this->statement->rowCount();
		}

		public function fetchAssoc()
		{
			return $this->statement->fetch(PDO::FETCH_ASSOC);
		}

		public function fetchRow()
		{
			return $this->statement->fetch(PDO::FETCH_NUM);
		}

		public function fetchField()
		{
			$row = $this->statement->getColumnMeta($this->offset++);
			if ($row === false) {
				return false;
			}

			$type = $row["pdo_type"];
			$row["type"] = ($type == PDO::PARAM_INT ? 0 : 15);
			$row["charsetnr"] = ($type == \PDO::PARAM_LOB || (isset($row["flags"]) && in_array("blob", (array) $row["flags"])) ? 63 : 0);

			return (object) $row;
		}

		public function seek(int $offset): bool
		{
			for ($i = 0; $i < $offset; $i++) {
				if ($this->statement->fetch() === false) {
					return false;
				};
			}

			return true;
		}

		public function nextRowset(): bool
		{
			$this->offset = 0;

			// @ - PDO_PgSQL doesn't support it
			return @$this->statement->nextRowset();
		}
	}
}
