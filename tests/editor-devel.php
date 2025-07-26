<?php

/*
 * This file is used by automated Katalon tests of compiled version.
 */

use AdminNeo\Admin;

function adminneo_instance()
{
	$config = [
		"colorVariant" => "green",
	];

	return Admin::create($config);
}

chdir("../editor/");

require "../editor/index.php";
