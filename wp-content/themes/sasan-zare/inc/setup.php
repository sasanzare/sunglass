<?php
/**
 * WordPress theme setup.
 *
 * @package SasanZare
 */

namespace SasanZare;

defined( 'ABSPATH' ) || exit;

/**
 * Register the theme's WordPress features.
 *
 * @return void
 */
function saz_setup_theme(): void {
	load_theme_textdomain( 'sasan-zare', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support(
		'html5',
		array(
			'comment-list',
			'comment-form',
			'search-form',
			'gallery',
			'caption',
		)
	);
	add_theme_support( 'custom-logo' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor.css' );

	if ( did_action( 'elementor/loaded' ) ) {
		add_theme_support( 'elementor' );
	}

	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary menu', 'sasan-zare' ),
		)
	);
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\\saz_setup_theme' );
