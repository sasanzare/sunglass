<?php
/**
 * WooCommerce theme support.
 *
 * @package SasanZare
 */

namespace SasanZare;

defined( 'ABSPATH' ) || exit;

/**
 * Enable WooCommerce support without coupling the theme to WooCommerce internals.
 *
 * @return void
 */
function saz_add_woocommerce_support(): void {
	if ( ! class_exists( '\\WooCommerce' ) ) {
		return;
	}

	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\\saz_add_woocommerce_support' );
