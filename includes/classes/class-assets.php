<?php
/**
 * Front-end asset registration and enqueueing.
 *
 * @package WordPressPluginTemplate
 */

namespace WordPressPluginTemplate\Classes;

use WordPressPluginTemplate\Traits\Singleton;

defined( 'ABSPATH' ) || exit;

/**
 * Enqueues assets built with WordPress scripts.
 *
 * @package WordPressPluginTemplate
 */
class Assets {
	use Singleton;

	/**
	 * Initialize asset enqueueing.
	 *
	 * @return void
	 */
	protected function init(): void {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
		add_action( 'enqueue_block_assets', array( $this, 'enqueue_block_assets' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_block_editor_assets' ) );
	}

	/**
	 * Enqueue the main front-end stylesheet and script when build metadata exists.
	 *
	 * @return void
	 */
	public function enqueue(): void {
		$this->enqueue_bundle( 'main' );
	}

	/**
	 * Enqueue assets shared by front-end and editor blocks.
	 *
	 * @return void
	 */
	public function enqueue_block_assets(): void {
		$this->enqueue_bundle( 'blocks' );
	}

	/**
	 * Enqueue assets for the block editor interface.
	 *
	 * @return void
	 */
	public function enqueue_block_editor_assets(): void {
		$this->enqueue_bundle( 'editor' );
	}

	/**
	 * Enqueue the CSS and JavaScript for a compiled entry point.
	 *
	 * Each bundle is expected to have a matching `{name}.asset.php` metadata file
	 * in the build directory. WordPress scripts generates this file alongside
	 * the compiled assets; it provides the script dependencies and cache version.
	 * The stylesheet and script are enqueued independently when their files exist.
	 * Missing or invalid metadata causes the method to skip the bundle safely.
	 *
	 * @param string $bundle The entry point name, used to locate its metadata, CSS, and JavaScript files.
	 * @return void
	 */
	private function enqueue_bundle( string $bundle ): void {
		$build_path = dirname( WORDPRESS_PLUGIN_TEMPLATE_FILE ) . '/assets/build/';
		$asset_path = $build_path . $bundle . '.asset.php';

		if ( ! is_readable( $asset_path ) ) {
			return;
		}

		$asset = require $asset_path;

		if ( ! is_array( $asset ) ) {
			return;
		}

		$dependencies = $asset['dependencies'] ?? array();
		$version      = (string) ( $asset['version'] ?? '' );

		if ( is_file( $build_path . $bundle . '.css' ) ) {
			$style_handle = 'wordpress-plugin-template-' . $bundle;
			wp_enqueue_style(
				$style_handle,
				plugins_url( 'assets/build/' . $bundle . '.css', WORDPRESS_PLUGIN_TEMPLATE_FILE ),
				$dependencies,
				$version
			);
		}

		if ( is_file( $build_path . $bundle . '.js' ) ) {
			wp_enqueue_script(
				'wordpress-plugin-template-' . $bundle,
				plugins_url( 'assets/build/' . $bundle . '.js', WORDPRESS_PLUGIN_TEMPLATE_FILE ),
				$dependencies,
				$version,
				true
			);
		}
	}
}
