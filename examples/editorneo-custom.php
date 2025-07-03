<?php

use AdminNeo\Admin;
use AdminNeo\JsonPreviewPlugin;
use AdminNeo\SlugifyEditPlugin;
use AdminNeo\TranslationPlugin;
use function AdminNeo\h;

function adminneo_instance()
{
	class CustomEditor extends Admin
	{
		public function getServiceTitle()
		{
			// Custom name in title and heading.
			return 'Editor Example';
		}

		public function getCredentials(): array
		{
			// User 'test' with password 'test' on localhost.
			return ['localhost', 'test', 'test'];
		}

		public function authenticate($username, $password)
		{
			// username: 'admin', password: anything
			return ($username == 'admin');
		}

		public function getDatabase()
		{
			// Use just one database.
			return 'adminneo_test';
		}

		public function getTableName(array $tableStatus)
		{
			// Tables without comments would return empty string and will be ignored by Editor.
			return $tableStatus["Comment"] ? h($tableStatus["Name"]) : "";
		}

		public function getFieldName(array $field, $order = 0)
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
		"jsonValuesDetection" => true,
		"jsonValuesAutoFormat" => true,
	];

	$plugins = [
		new JsonPreviewPlugin(),
		new TranslationPlugin(),
		new SlugifyEditPlugin(),
	];

	return CustomEditor::create($config, $plugins);
}

include "../compiled/editorneo.php";
