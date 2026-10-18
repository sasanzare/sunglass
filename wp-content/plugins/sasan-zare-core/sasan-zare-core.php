<?php
/**
 * Plugin Name: Sasan Zare Core
 * Description: Foundation plugin for reusable Sasan Zare functionality.
 * Version: 0.1.0
 * Requires at least: 7.1
 * Requires PHP: 7.4
 * Text Domain: sasan-Zare-core
 * Domain Path: /languages
 *
 * @package SasanZare\Core
 */

namespace SasanZare\Core;

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'SAZ_CORE_VERSION' ) ) {
	define( 'SAZ_CORE_VERSION', '0.1.0' );
}

require_once __DIR__ . '/includes/class-plugin.php';
require_once __DIR__ . '/includes/class-homepage-hero.php';

Plugin::boot();
Homepage_Hero::boot();
