<?php
/**
 * Small template helpers.
 *
 * @package SasanZare
 */

namespace SasanZare;

defined( 'ABSPATH' ) || exit;

/**
 * Render an Elementor Theme Builder location when Elementor Pro provides it.
 *
 * @param string $location Theme Builder location name.
 * @return bool Whether Elementor rendered a template for the location.
 */
function saz_render_elementor_location( string $location ): bool {
	if ( ! function_exists( 'elementor_theme_do_location' ) ) {
		return false;
	}

	return (bool) \elementor_theme_do_location( $location );
}
