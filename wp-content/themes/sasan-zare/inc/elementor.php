<?php
/**
 * Elementor Theme Builder integration.
 *
 * @package SasanZare
 */

namespace SasanZare;

defined( 'ABSPATH' ) || exit;

/**
 * Register Elementor's core Theme Builder locations when the manager supports them.
 *
 * Elementor Pro supplies the Theme Builder location manager. The method checks keep
 * the theme safe when Elementor Pro is not installed or its API is unavailable.
 *
 * @param mixed $theme_manager Elementor theme manager passed by the registration hook.
 * @return void
 */
function saz_register_elementor_locations( $theme_manager ): void {
	if ( ! is_object( $theme_manager ) || ! method_exists( $theme_manager, 'register_all_core_location' ) ) {
		return;
	}

	$theme_manager->register_all_core_location();
}
add_action( 'elementor/theme/register_locations', __NAMESPACE__ . '\\saz_register_elementor_locations' );
