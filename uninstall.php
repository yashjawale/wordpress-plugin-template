<?php
/**
 * Runs when the plugin is uninstalled.
 *
 * @package WordPressPluginTemplate
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// This template does not currently store persistent plugin data to remove.
//
// Add cleanup here when the plugin begins persisting data:
// - Delete only options and metadata owned by this plugin.
// - Remove only custom database tables created by this plugin, if any.
// - For multisite data, account for whether it is stored per site or network-wide.
// Avoid removing data owned by WordPress, another plugin, or the site owner.
