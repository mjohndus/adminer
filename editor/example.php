<?php

use AdminNeo\Admin;
use function AdminNeo\h;

function create_adminneo()
{
	class ExampleEditor extends Admin
	{
		public function getServiceTitle(): string
		{
			// Custom name in title and heading.
			return 'Example';
		}

		public function getCredentials(): array
		{
			// User ODBC with password ODBC on localhost.
			return ['localhost', 'ODBC', 'ODBC'];
		}

		public function authenticate(string $username, string $password): ?bool
		{
			// username: 'admin', password: anything
			return ($username == 'admin');
		}

		public function getDatabase(): ?string
		{
			// Use just one database.
			return 'adminneo_test';
		}

		public function getTableName(array $tableStatus): string
		{
			// Tables without comments would return empty string and will be ignored by Editor.
			return $tableStatus["Comment"] ? h($tableStatus["Name"]) : "";
		}

		public function getFieldName(array $field, int $order = 0): string
		{
			// Hide hashes in select.
			if ($order && preg_match('~_(md5|sha1)$~', $field["field"])) {
				return "";
			}

			// Display only column with comments, first five of them plus searched columns.
			if ($order < 5) {
				return h($field["field"]);
			}

			foreach ((array)$_GET["where"] as $key => $where) {
				if ($where["col"] == $field["field"] && ($key >= 0 || $where["val"] != "")) {
					return h($field["field"]);
				}
			}

			return "";
		}

	}

	$config = [
		"colorVariant" => "green",
	];

	return ExampleEditor::create($config);
}

include "index.php";
