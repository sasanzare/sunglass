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

/**
 * Display Iranian rial currency values using the local toman convention.
 * Product amounts are entered in tomans while WooCommerce retains its IRR code.
 *
 * @param string $currency_symbol Existing currency symbol.
 * @param string $currency        Currency code.
 * @return string
 */
function saz_toman_currency_symbol( $currency_symbol, $currency ) {
	if ( 'IRR' !== $currency ) {
		return $currency_symbol;
	}

	return 'تومان';
}
add_filter( 'woocommerce_currency_symbol', __NAMESPACE__ . '\\saz_toman_currency_symbol', 10, 2 );

/**
 * Load WooCommerce's native cart-fragment listener for the custom header badge.
 *
 * @return void
 */
function saz_enqueue_cart_fragments(): void {
	if ( class_exists( '\\WooCommerce' ) && wp_script_is( 'wc-cart-fragments', 'registered' ) ) {
		wp_enqueue_script( 'wc-cart-fragments' );
	}
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\saz_enqueue_cart_fragments', 30 );

/**
 * Keep the header cart quantity in sync with WooCommerce AJAX updates.
 *
 * @param array<string,string> $fragments Existing cart fragments.
 * @return array<string,string>
 */
function saz_refresh_cart_count_fragment( array $fragments ): array {
	ob_start();
	saz_render_cart_badge();
	$fragments['span.saz-cart-count'] = ob_get_clean();

	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', __NAMESPACE__ . '\\saz_refresh_cart_count_fragment' );
