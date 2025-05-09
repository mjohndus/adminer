<?php

use AdminNeo\Admin;

function adminneo_instance()
{
	class SQLiteEditor extends Admin
	{
		public function getDatabase(): ?string
		{
			return "PATH_TO_YOUR_SQLITE_HERE";
		}
	}

	$config = [
		"colorVariant" => "green",
		"defaultDriver" => "sqlite",
		// Warning! Inline the result of password_hash() so that the password is not visible in the source code.
		"defaultPasswordHash" => password_hash("YOUR_PASSWORD_HERE", PASSWORD_DEFAULT),
	];

	return SQLiteEditor::create($config);
}

include "index.php";
