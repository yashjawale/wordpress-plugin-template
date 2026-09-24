<?php
/**
 * Plugin Name: WordPress Plugin Template
 * Description: A template for creating WordPress plugins.
 *
 * @package WordPressPluginTemplate
 */

namespace WordPressPluginTemplate;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'WORDPRESS_PLUGIN_TEMPLATE_FILE', __FILE__ );

require_once __DIR__ . '/vendor/autoload.php';

Classes\Plugin::get_instance();
