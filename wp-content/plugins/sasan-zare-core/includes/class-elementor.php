<?php
/**
 * Elementor registration for reusable Sasan Zare widgets.
 *
 * @package SasanZare\Core
 */

namespace SasanZare\Core;

defined( 'ABSPATH' ) || exit;

/**
 * Elementor integration bootstrap for reusable storefront widgets.
 */
final class Elementor {
	/**
	 * Register the project-owned Elementor widgets.
	 *
	 * @return void
	 */
	public static function boot(): void {
		add_action( 'elementor/widgets/register', array( __CLASS__, 'register_widgets' ) );
		add_action( 'elementor/editor/before_enqueue_scripts', array( __CLASS__, 'use_local_editor_scripts' ) );
		add_action( 'elementor/editor/after_enqueue_styles', array( __CLASS__, 'use_editor_font_fallback' ) );
	}

	/**
	 * Keep the editor's existing Ace dependency available without a CDN connection.
	 *
	 * @return void
	 */
	public static function use_local_editor_scripts(): void {
		add_filter( 'script_loader_src', array( __CLASS__, 'local_editor_script_url' ), 20, 2 );
	}

	/**
	 * Replace only the pinned Ace sources used by the installed Elementor editor.
	 *
	 * @param string $src Script URL.
	 * @param string $handle Registered script handle.
	 * @return string
	 */
	public static function local_editor_script_url( string $src, string $handle ): string {
		$files = array(
			'ace'                => 'ace.js',
			'ace-language-tools' => 'ext-language_tools.js',
		);
		$upstream = 'https://cdn.jsdelivr.net/npm/ace-builds@1.43.2/src-min-noconflict/';

		if ( ! isset( $files[ $handle ] ) || 0 !== strpos( $src, $upstream ) ) {
			return $src;
		}

		$relative_path = 'assets/vendor/ace/1.43.2/' . $files[ $handle ];
		if ( ! is_readable( dirname( __DIR__ ) . '/' . $relative_path ) ) {
			return $src;
		}

		$plugin_file = dirname( __DIR__ ) . '/sasan-zare-core.php';
		return add_query_arg( 'ver', '1.43.2', plugin_dir_url( $plugin_file ) . $relative_path );
	}

	/**
	 * Let Elementor use its built-in font fallback when Google Fonts is blocked.
	 *
	 * Keep the dependency handle as an alias so editor styles still resolve.
	 * This hook runs only in the editor, outside the storefront preview document.
	 *
	 * @return void
	 */
	public static function use_editor_font_fallback(): void {
		$styles = wp_styles();
		$font   = $styles->registered['google-font-roboto'] ?? null;

		if ( ! $font || 'fonts.googleapis.com' !== wp_parse_url( (string) $font->src, PHP_URL_HOST ) ) {
			return;
		}

		wp_deregister_style( 'google-font-roboto' );
		wp_register_style( 'google-font-roboto', false );
	}

	/**
	 * Register the eyewear homepage hero widget.
	 *
	 * @param mixed $widgets_manager Elementor widgets manager.
	 * @return void
	 */
	public static function register_widgets( $widgets_manager ): void {
		if ( ! is_object( $widgets_manager ) || ! method_exists( $widgets_manager, 'register' ) ) {
			return;
		}

		require_once __DIR__ . '/widgets/class-eyewear-hero-widget.php';
		$widgets_manager->register( new Widgets\Eyewear_Hero_Widget() );
	}
}
