<?php

/*
 * This file is used by automated Katalon tests of compiled version.
 */

if (!file_exists("../compiled/editorneo.php")) {
	exec("php ../bin/compile.php editor");
}

require "../compiled/editorneo.php";
