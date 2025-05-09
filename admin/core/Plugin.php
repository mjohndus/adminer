<?php

namespace AdminNeo;

/**
 * Plugin parent class.
 *
 * @author Peter Knut
 *
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
 */
abstract class Plugin
{
	/** @var Origin|Pluginer */
	protected $admin;

	/** @var Config */
	protected $config;

	/**
	 * @param Origin|Pluginer $admin
	 * @param Config $config
	 */
	public function inject($admin, Config $config): void
	{
		$this->admin = $admin;
		$this->config = $config;
	}
}
