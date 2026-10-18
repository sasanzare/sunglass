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

/**
 * Return a small, inline SVG from the theme's controlled icon set.
 *
 * @param string $name Icon name.
 * @return string
 */
function saz_get_icon_markup( string $name ): string {
	$icons = array(
		'bag'      => '<path d="M5 8h14l1 13H4L5 8Z"/><path d="M9 9V6a3 3 0 0 1 6 0v3"/><path d="M8 12v.01M16 12v.01"/>',
		'book'     => '<path d="M12 7v14"/><path d="M3 5.5A2.5 2.5 0 0 1 5.5 3H12v18H5.5A2.5 2.5 0 0 0 3 23V5.5Z"/><path d="M21 5.5A2.5 2.5 0 0 0 18.5 3H12v18h6.5A2.5 2.5 0 0 1 21 23V5.5Z"/>',
		'chevron'  => '<path d="m9 18 6-6-6-6"/>',
		'close'    => '<path d="m6 6 12 12M18 6 6 18"/>',
		'heart'    => '<path d="M20.8 8.6c0 4.4-8.8 10-8.8 10s-8.8-5.6-8.8-10A4.6 4.6 0 0 1 12 6.1a4.6 4.6 0 0 1 8.8 2.5Z"/>',
		'menu'     => '<path d="M4 7h16M4 12h16M4 17h16"/>',
		'search'   => '<circle cx="10.8" cy="10.8" r="6.8"/><path d="m16 16 4.5 4.5"/>',
		'shield'   => '<path d="M12 3 20 6v5c0 5-3.4 8.1-8 10-4.6-1.9-8-5-8-10V6l8-3Z"/><path d="m9 12 2 2 4-4"/>',
		'truck'    => '<path d="M3 6h11v11H3zM14 10h4l3 3v4h-7z"/><circle cx="7.5" cy="19" r="1.5"/><circle cx="17.5" cy="19" r="1.5"/>',
		'user'     => '<circle cx="12" cy="8" r="3.5"/><path d="M5 21a7 7 0 0 1 14 0"/>',
		'headset'  => '<path d="M4 13v-2a8 8 0 0 1 16 0v2"/><rect x="3" y="12" width="4" height="7" rx="2"/><rect x="17" y="12" width="4" height="7" rx="2"/><path d="M17 19a5 5 0 0 1-5 3h-1"/>',
	);

	if ( ! isset( $icons[ $name ] ) ) {
		return '';
	}

	return '<svg class="saz-icon saz-icon--' . esc_attr( $name ) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">' . $icons[ $name ] . '</svg>';
}

/**
 * Get the current WooCommerce cart quantity without assuming WooCommerce is active.
 *
 * @return int
 */
function saz_get_cart_count(): int {
	if ( ! function_exists( '\\WC' ) ) {
		return 0;
	}

	$woocommerce = \WC();

	if ( ! is_object( $woocommerce ) || ! isset( $woocommerce->cart ) || ! is_object( $woocommerce->cart ) ) {
		return 0;
	}

	return (int) $woocommerce->cart->get_cart_contents_count();
}

/**
 * Render the live cart count used by WooCommerce cart fragments.
 *
 * @return void
 */
function saz_render_cart_badge(): void {
	$count = saz_get_cart_count();
	printf(
		'<span class="saz-cart-count" data-count="%1$s" aria-live="polite" aria-atomic="true">%2$s</span>',
		esc_attr( (string) $count ),
		esc_html( number_format_i18n( $count ) )
	);
}

/**
 * Render the WooCommerce cart link or an honest unavailable fallback.
 *
 * @param string $context Header layout context.
 * @return void
 */
function saz_render_cart_action( string $context = 'desktop' ): void {
	$context_class = 'saz-header-action--' . sanitize_html_class( $context );

	if ( ! function_exists( '\\wc_get_cart_url' ) ) {
		printf(
			'<button class="saz-header-action %1$s saz-header-action--unavailable" type="button" disabled aria-label="%2$s" title="%2$s">%3$s</button>',
			esc_attr( $context_class ),
			esc_attr__( 'سبد خرید در دسترس نیست', 'sasan-zare' ),
			saz_get_icon_markup( 'bag' )
		);
		return;
	}

	$count     = saz_get_cart_count();
	$label     = sprintf(
		esc_html__( 'سبد خرید، %s کالا', 'sasan-zare' ),
		number_format_i18n( $count )
	);
	$cart_url  = \wc_get_cart_url();

	printf(
		'<a class="saz-header-action %1$s saz-header-action--cart" href="%2$s" aria-label="%3$s" title="%3$s">%4$s',
		esc_attr( $context_class ),
		esc_url( $cart_url ),
		esc_attr( $label ),
		saz_get_icon_markup( 'bag' )
	);
	saz_render_cart_badge();
	echo '</a>';
}

/**
 * Render useful reference navigation until a primary menu is assigned.
 * Search links avoid inventing categories, brands, or pages in site content.
 *
 * @param array<string,mixed> $args Menu arguments.
 * @return void
 */
function saz_reference_navigation( array $args = array() ): void {
	$shop = function_exists( '\\wc_get_page_permalink' ) ? \wc_get_page_permalink( 'shop' ) : home_url( '/' );
	$search = static function ( string $term ): string {
		return add_query_arg( array( 's' => $term, 'post_type' => 'product' ), home_url( '/' ) );
	};
	$items = array(
		array( __( 'خانه', 'sasan-zare' ), home_url( '/' ), is_front_page() ),
		array( __( 'فروشگاه', 'sasan-zare' ), $shop, function_exists( '\\is_shop' ) && \is_shop() ),
		array( __( 'عینک طبی', 'sasan-zare' ), $search( 'طبی' ), false ),
		array( __( 'عینک آفتابی', 'sasan-zare' ), $search( 'آفتابی' ), false ),
		array( __( 'برندها', 'sasan-zare' ), add_query_arg( 'orderby', 'title', $shop ), false ),
		array( __( 'وبلاگ', 'sasan-zare' ), get_option( 'page_for_posts' ) ? get_permalink( (int) get_option( 'page_for_posts' ) ) : home_url( '/?post_type=post' ), false ),
	);
	echo '<ul class="saz-primary-menu">';
	foreach ( $items as $item ) {
		printf(
			'<li%1$s><a href="%2$s"%3$s>%4$s</a></li>',
			$item[2] ? ' class="current-menu-item"' : '',
			esc_url( $item[1] ),
			$item[2] ? ' aria-current="page"' : '',
			esc_html( $item[0] )
		);
	}
	echo '</ul>';
}
