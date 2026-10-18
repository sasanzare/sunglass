<?php
/**
 * Frontend asset loading.
 *
 * @package SasanZare
 */

namespace SasanZare;

defined( 'ABSPATH' ) || exit;

/**
 * Enqueue the minimal theme foundation styles.
 *
 * @return void
 */
function saz_enqueue_assets(): void {
	$version = constant( __NAMESPACE__ . '\\SAZ_THEME_VERSION' );

	wp_enqueue_style( 'sasan-zare', get_stylesheet_uri(), array(), $version );
	wp_enqueue_style(
		'sasan-zare-base',
		get_theme_file_uri( 'assets/css/base.css' ),
		array( 'sasan-zare' ),
		$version
	);

	if ( is_rtl() ) {
		wp_enqueue_style(
			'sasan-zare-rtl',
			get_theme_file_uri( 'rtl.css' ),
			array( 'sasan-zare-base' ),
			$version
		);
	}
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\saz_enqueue_assets' );
