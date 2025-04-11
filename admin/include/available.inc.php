<?php

namespace AdminNeo;

function get_available_themes(): array
{
	$paths = array_filter(glob(__DIR__ . "/../themes/*", GLOB_BRACE));

	$themes = [];
	foreach ($paths as $path) {
		if (preg_match('~(.*)-(blue|green|red)$~', $path, $matches)) {
			$themes[basename($matches[1])][$matches[2]] = true;
		}
	}

	return $themes;
}
