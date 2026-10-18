<?php
/**
 * Elementor registration for reusable Sasan Zare widgets.
 *
 * @package SasanZare\Core
 */

namespace SasanZare\Core;

defined( 'ABSPATH' ) || exit;

/**
 * Elementor integration bootstrap for reusable storefront widgets.
 */
final class Elementor {
	/**
	 * Register the project-owned Elementor widgets.
	 *
	 * @return void
	 */
	public static function boot(): void {
		add_action( 'elementor/widgets/register', array( __CLASS__, 'register_widgets' ) );
	}

	/**
	 * Register the eyewear homepage hero widget.
	 *
	 * @param mixed $widgets_manager Elementor widgets manager.
	 * @return void
	 */
	public static function register_widgets( $widgets_manager ): void {
		if ( ! is_object( $widgets_manager ) || ! method_exists( $widgets_manager, 'register' ) ) {
			return;
		}

		require_once __DIR__ . '/widgets/class-eyewear-hero-widget.php';
		$widgets_manager->register( new Widgets\Eyewear_Hero_Widget() );
	}
}
