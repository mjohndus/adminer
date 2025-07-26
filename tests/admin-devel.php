<?php

/*
 * This file is used by automated Katalon tests of compiled version.
 */

use AdminNeo\Admin;

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
