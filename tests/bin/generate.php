<?php

const KatalonPath = __DIR__ . "/../katalon/";

@mkdir(KatalonPath . "/compiled");

foreach (glob(KatalonPath . "*.krecorder") as $filename) {
	$content = file_get_contents($filename);
	$content = preg_replace("~(admin|editor)-devel.php~", "$1-compiled.php", $content);
	$content = str_replace("</title>", "-compiled</title>", $content);

	$filename = preg_replace('~/katalon/([^.]+)~', "/katalon/compiled/$1-compiled", $filename);
	file_put_contents($filename, $content);
}
