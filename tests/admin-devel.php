<?php

/*
 * This file is used by automated Katalon tests of devel version.
 */

use AdminNeo\Admin;

if (!file_exists("../compiled/adminneo.php")) {
	exec("php ../bin/compile.php");
}

function adminneo_instance()
{
	$config = [
		"colorVariant" => "green",
		"defaultPasswordHash" => "",
		"sslTrustServerCertificate" => true,
	];

	return Admin::create($config);
}

chdir("../admin/");

require "../admin/index.php";
