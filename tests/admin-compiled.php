<?php

/*
 * This file is used by automated Katalon tests of compiled version.
 */

if (!file_exists("../compiled/adminneo.php")) {
	exec("php ../bin/compile.php");
}

require "../compiled/adminneo.php";
