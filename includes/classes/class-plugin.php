<?php
/**
 * Main plugin class
 * 
 * @package WordPressPluginTemplate
 */

namespace WordPressPluginTemplate\Classes;

use WordPressPluginTemplate\Traits\Singleton;

defined( 'ABSPATH' ) || exit;

class Plugin {
	use Singleton;

	/**
	 * Initialize the plugin.
	 *
	 * Add plugin hooks and setup here.
	 *
	 * @return void
	 */
	protected function init() : void {
	}
}
