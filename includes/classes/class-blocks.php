<?php
/**
 * Block registration.
 *
 * @package WordPressPluginTemplate
 */

namespace WordPressPluginTemplate\Classes;

use WordPressPluginTemplate\Traits\Singleton;

defined( 'ABSPATH' ) || exit;

/**
 * Registers the plugin's custom blocks.
 *
 * @package WordPressPluginTemplate
 */
class Blocks {
	use Singleton;

	/**
	 * Initialize block registration.
	 *
	 * @return void
	 */
	protected function init(): void {
		add_action( 'init', array( $this, 'register_blocks' ) );
	}

	/**
	 * Register blocks from their compiled block metadata.
	 *
	 * @return void
	 */
	public function register_blocks(): void {
		$build_path    = dirname( WORDPRESS_PLUGIN_TEMPLATE_FILE ) . '/assets/build';
		$manifest_path = $build_path . '/blocks-manifest.php';

		if ( ! is_readable( $manifest_path ) ) {
			return;
		}

		wp_register_block_types_from_metadata_collection( $build_path, $manifest_path );
	}
}
