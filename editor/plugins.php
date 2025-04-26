<?php

use AdminNeo\Admin;
use AdminNeo\FrameSupportPlugin;
use AdminNeo\JsonPreviewPlugin;
use AdminNeo\SlugifyEditPlugin;
use AdminNeo\TranslationPlugin;

function create_adminneo()
{
	class PluginsEditor extends Admin
	{
		public function getServiceTitle(): string
		{
			return 'Plugins Test';
		}

		public function getDatabase(): ?string
		{
			return 'adminneo_test';
		}
	}

	$plugins = [
		new JsonPreviewPlugin(),
		new TranslationPlugin(),
		new SlugifyEditPlugin(),
		new FrameSupportPlugin(),
	];

	$config = [
		"colorVariant" => "green",
		"jsonValuesDetection" => true,
		"jsonValuesAutoFormat" => true,
	];

	return PluginsEditor::create($config, $plugins);
}

include "index.php";
