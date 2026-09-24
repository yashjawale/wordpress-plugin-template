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
	 * Instance variable
	 *
	 * @var $instance The attribute storing the class instance
	 */
	private static $instance;

	/**
	 * Get instance of the class that uses this trait
	 * 
	 * @return Instance of the class
	 */
	public static function get_instance() {
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