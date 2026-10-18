<?php
/**
 * Core plugin bootstrap.
 *
 * @package SasanZare\Core
 */

namespace SasanZare\Core;

defined( 'ABSPATH' ) || exit;

/**
 * Loads optional integrations only when their owning plugins are active.
 */
final class Plugin {
	/**
	 * Attach the integration loader after all plugin files have been included.
	 *
	 * @return void
	 */
	public static function boot(): void {
		add_action( 'plugins_loaded', array( __CLASS__, 'load_optional_integrations' ), 20 );
	}

	/**
	 * Load future integration modules when their dependencies are available.
	 *
	 * @return void
	 */
	public static function load_optional_integrations(): void {
		if ( did_action( 'elementor/loaded' ) ) {
			require_once __DIR__ . '/class-elementor.php';
			Elementor::boot();
		}

		if ( class_exists( '\\WooCommerce' ) ) {
			require_once __DIR__ . '/class-woocommerce.php';
			WooCommerce::boot();
		}
	}
}
