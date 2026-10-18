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
	wp_enqueue_style(
		'sasan-zare-design-system',
		get_theme_file_uri( 'assets/css/design-system.css' ),
		array( 'sasan-zare-base' ),
		(string) filemtime( get_theme_file_path( 'assets/css/design-system.css' ) )
	);
	wp_enqueue_style(
		'sasan-zare-header',
		get_theme_file_uri( 'assets/css/header.css' ),
		array( 'sasan-zare-design-system' ),
		(string) filemtime( get_theme_file_path( 'assets/css/header.css' ) )
	);

	wp_enqueue_script(
		'sasan-zare-header',
		get_theme_file_uri( 'assets/js/site-header.js' ),
		array(),
		$version,
		true
	);

	if ( is_rtl() ) {
		wp_enqueue_style(
			'sasan-zare-rtl',
			get_theme_file_uri( 'rtl.css' ),
			array( 'sasan-zare-header' ),
			$version
		);
	}
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\saz_enqueue_assets' );
