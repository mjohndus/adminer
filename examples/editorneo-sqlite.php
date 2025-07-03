<?php

use AdminNeo\Admin;

function adminneo_instance()
{
	class SQLiteEditor extends Admin
	{
		public function getServiceTitle()
		{
			// Custom name in title and heading.
			return 'SQLite Example';
		}

		public function getDatabase()
		{
			return "/path/to/your/database_file.db";
		}

		public function getLoginFormRow($fieldName, $label, $field)
		{
			// Hide username field.
			if ($fieldName == "username") {
				return "";
			}

			return parent::getLoginFormRow($fieldName, $label, $field);
		}
	}

	$config = [
		"colorVariant" => "green",
		// Default driver is required only if EditorNeo is compiled with multiple drivers.
		"defaultDriver" => "sqlite",
		// Warning! Inline the result of password_hash() so that the password is not visible in the source code.
		"defaultPasswordHash" => password_hash("YOUR_PASSWORD_HERE", PASSWORD_DEFAULT),
	];

	return SQLiteEditor::create($config);
}

include "../compiled/editorneo.php";
