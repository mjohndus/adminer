<?php

use AdminNeo\FrameSupportPlugin;
use AdminNeo\JsonPreviewPlugin;
use AdminNeo\Pluginer;
use AdminNeo\SlugifyEditPlugin;
use AdminNeo\TranslationPlugin;

function create_adminneo(): Pluginer
{
	class PluginsEditor extends Pluginer
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

	return new PluginsEditor($plugins, $config);
}

include "index.php";
