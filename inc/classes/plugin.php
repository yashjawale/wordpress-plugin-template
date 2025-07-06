<?php
/**
 * Main plugin class
 * 
 * @package WordPressPluginTemplate
 */

namespace WordPressPluginTemplate\Classes;

use WordPressPluginTemplate\Traits\Singleton;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Plugin {
	use Singleton;
}