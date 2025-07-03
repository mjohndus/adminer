<?php

use AdminNeo\Admin;
use AdminNeo\FrameSupportPlugin;
use AdminNeo\JsonPreviewPlugin;
use AdminNeo\SlugifyEditPlugin;
use AdminNeo\TranslationPlugin;

function adminneo_instance()
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

	$config = [
		"colorVariant" => "green",
		"jsonValuesDetection" => true,
		"jsonValuesAutoFormat" => true,
	];

	$plugins = [
		new JsonPreviewPlugin(),
		new TranslationPlugin(),
		new SlugifyEditPlugin(),
		new FrameSupportPlugin(),
	];

	return PluginsEditor::create($config, $plugins);
}

include "index.php";
