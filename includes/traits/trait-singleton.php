<?php
/**
 * Singleton trait
 *
 * @package WordPressPluginTemplate
 */

namespace WordPressPluginTemplate\Traits;

defined( 'ABSPATH' ) || exit;

trait Singleton {
	/**
	 * The singleton instance for the class using this trait.
	 *
	 * @var self|null
	 */
	private static ?self $instance = null;

	/**
	 * Get the singleton instance of the class using this trait.
	 *
	 * @return self
	 */
	public static function get_instance(): self {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Preventing the constructor from being called by making it private
	 */
	private function __construct() {
		$this->init();
	}
}
