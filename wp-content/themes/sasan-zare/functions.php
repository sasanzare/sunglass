<?php
/**
 * Theme bootstrap.
 *
 * @package SasanZare
 */

namespace SasanZare;

defined( 'ABSPATH' ) || exit;

if ( ! defined( __NAMESPACE__ . '\\SAZ_THEME_VERSION' ) ) {
	define( __NAMESPACE__ . '\\SAZ_THEME_VERSION', '0.1.0' );
}

$saz_theme_directory = get_template_directory() . '/inc/';

require_once $saz_theme_directory . 'setup.php';
require_once $saz_theme_directory . 'helpers.php';
require_once $saz_theme_directory . 'assets.php';
require_once $saz_theme_directory . 'elementor.php';
require_once $saz_theme_directory . 'woocommerce.php';
