<?php
/**
 * Homepage hero renderer shared by the theme fallback and Elementor widget.
 *
 * @package SasanZare\Core
 */

namespace SasanZare\Core;

defined( 'ABSPATH' ) || exit;

/**
 * Prepare safe storefront content and render the shared homepage hero view.
 */
final class Homepage_Hero {
	/**
	 * Boot the theme fallback and asset registration hooks.
	 *
	 * @return void
	 */
	public static function boot(): void {
		add_action( 'saz_render_homepage_hero', array( __CLASS__, 'render_default' ) );
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'register_assets' ), 20 );
	}

	/**
	 * Register the shared hero stylesheet and load it for the homepage fallback.
	 *
	 * @return void
	 */
	public static function register_assets(): void {
		$plugin_file = dirname( __DIR__ ) . '/sasan-zare-core.php';
		$version     = (string) filemtime( dirname( __DIR__ ) . '/assets/css/homepage-hero.css' );

		wp_register_style(
			'saz-core-homepage-hero',
			plugin_dir_url( $plugin_file ) . 'assets/css/homepage-hero.css',
			array( 'sasan-zare-design-system' ),
			$version
		);

		wp_register_script( 'saz-core-homepage-hero', plugin_dir_url( $plugin_file ) . 'assets/js/homepage-hero.js', array(), (string) filemtime( dirname( __DIR__ ) . '/assets/js/homepage-hero.js' ), true );

		if ( is_front_page() ) {
			wp_enqueue_style( 'saz-core-homepage-hero' );
		}
	}

	/**
	 * Return the development defaults used by the fallback and Elementor widget.
	 *
	 * @return array<string,mixed>
	 */
	public static function get_default_settings(): array {
		return array(
			'eyebrow'           => 'PREMIUM EYEWEAR',
			'heading'           => 'استایل شفاف، دید دقیق',
			'heading_highlight' => 'دید دقیق',
			'description'       => 'مجموعه‌ای از بهترین برندهای عینک دنیا، فریم‌های مدرن و چشم‌نواز با انتخابی دقیق، برای سبک زندگی متفاوت شما.',
			'hero_image'        => array(
				'url' => self::get_default_image_url(),
				'id'  => 0,
			),
			'image_alt'         => '',
			'image_position_y'  => 50,
			'primary_label'     => 'مشاهده محصولات',
			'primary_url'       => self::get_shop_url(),
			'secondary_label'   => 'راهنمای انتخاب فریم',
			'secondary_url'     => '',
			'featured_product_id' => '',
			'benefits'          => array(
				array(
					'icon'        => 'truck',
					'title'       => 'ارسال سریع',
					'description' => 'به سراسر ایران',
				),
				array(
					'icon'        => 'shield',
					'title'       => 'ضمانت اصالت',
					'description' => 'کالاهای اورجینال',
				),
				array(
					'icon'        => 'headset',
					'title'       => 'مشاوره خرید',
					'description' => 'توسط متخصصان ما',
				),
			),
		);
	}

	/**
	 * Return the project-owned fallback editorial image URL.
	 *
	 * @return string
	 */
	public static function get_default_image_url(): string {
		$plugin_file = dirname( __DIR__ ) . '/sasan-zare-core.php';
		return plugin_dir_url( $plugin_file ) . 'assets/images/eyewear-scene-reference.jpg';
	}

	/**
	 * Return a valid product archive URL when WooCommerce is active.
	 *
	 * @return string
	 */
	public static function get_shop_url(): string {
		if ( function_exists( '\\get_post_type_archive_link' ) ) {
			$shop_url = \get_post_type_archive_link( 'product' );
			if ( is_string( $shop_url ) && '' !== $shop_url ) {
				return $shop_url;
			}
		}

		return function_exists( 'home_url' ) ? home_url( '/' ) : '';
	}

	/**
	 * Render the default hero on the theme's homepage fallback.
	 *
	 * @return void
	 */
	public static function render_default(): void {
		self::render( self::get_default_settings() );
	}

	/**
	 * Render a hero from Elementor settings using the shared view.
	 *
	 * @param array<string,mixed> $settings Widget settings.
	 * @return void
	 */
	public static function render( array $settings ): void {
		$defaults = self::get_default_settings();
		$settings = wp_parse_args( $settings, $defaults );
		$settings['benefits'] = is_array( $settings['benefits'] ) ? $settings['benefits'] : array();

		$heading          = trim( (string) $settings['heading'] );
		$highlight        = trim( (string) $settings['heading_highlight'] );
		$highlight_offset = '' !== $highlight ? strpos( $heading, $highlight ) : false;
		$heading_before   = false !== $highlight_offset ? substr( $heading, 0, $highlight_offset ) : $heading;
		$heading_highlight = false !== $highlight_offset ? $highlight : '';
		$heading_after    = false !== $highlight_offset ? substr( $heading, $highlight_offset + strlen( $highlight ) ) : '';
		$image_position_y = max( 0, min( 100, (int) $settings['image_position_y'] ) );
		$title_id         = function_exists( 'wp_unique_id' ) ? wp_unique_id( 'saz-home-hero-title-' ) : 'saz-home-hero-title';
		$image_html       = self::get_hero_image_markup( $settings );
		$product          = self::get_product( $settings['featured_product_id'] );
		$product_image     = self::get_product_image_markup( $product );
		$product_price     = $product ? (string) $product->get_price_html() : '';
		$benefits         = $settings['benefits'];
		$primary_url      = trim( (string) $settings['primary_url'] ) !== '' ? (string) $settings['primary_url'] : self::get_shop_url();
		$secondary_url    = trim( (string) $settings['secondary_url'] );
		$guide_id         = $title_id . '-guide';
		$show_guide       = '' === $secondary_url;
		$secondary_url    = $show_guide ? '#' . $guide_id : $secondary_url;
		$editorial_product_url = plugin_dir_url( dirname( __DIR__ ) . '/sasan-zare-core.php' ) . 'assets/images/eyewear-frame-reference.png';

		wp_enqueue_style( 'saz-core-homepage-hero' );
		wp_enqueue_script( 'saz-core-homepage-hero' );
		require __DIR__ . '/views/homepage-hero.php';
	}

	/**
	 * Build the responsive hero image markup.
	 *
	 * @param array<string,mixed> $settings Widget settings.
	 * @return string
	 */
	private static function get_hero_image_markup( array $settings ): string {
		$image = is_array( $settings['hero_image'] ) ? $settings['hero_image'] : array( 'url' => (string) $settings['hero_image'] );
		$alt   = trim( (string) $settings['image_alt'] );
		$id    = isset( $image['id'] ) ? absint( $image['id'] ) : 0;

		if ( $id > 0 && function_exists( 'wp_get_attachment_image' ) ) {
			if ( '' === $alt ) {
				$alt = trim( (string) get_post_meta( $id, '_wp_attachment_image_alt', true ) );
			}

			return (string) wp_get_attachment_image(
				$id,
				'large',
				false,
				array(
					'class'         => 'saz-home-hero__image',
					'alt'           => $alt,
					'loading'       => 'eager',
					'fetchpriority' => 'high',
					'decoding'      => 'async',
					'sizes'         => '100vw',
				)
			);
		}

		$url = isset( $image['url'] ) && is_string( $image['url'] ) ? $image['url'] : self::get_default_image_url();
		if ( '' === $url ) {
			$url = self::get_default_image_url();
		}
		if ( '' === $alt && self::get_default_image_url() === $url ) {
			$alt = 'مدل عینک با فریم طبی در فضای روشن و مینیمال';
		}

		return sprintf(
			'<img class="saz-home-hero__image" src="%1$s" alt="%2$s" width="1672" height="941" loading="eager" fetchpriority="high" decoding="async" sizes="100vw">',
			esc_url( $url ),
			esc_attr( $alt )
		);
	}

	/**
	 * Get the selected product through WooCommerce's public API.
	 *
	 * @param mixed $product_id Product ID setting.
	 * @return mixed
	 */
	private static function get_product( $product_id ) {
		$product_id = absint( $product_id );
		if ( 0 === $product_id || ! class_exists( '\\WooCommerce' ) || ! function_exists( '\\wc_get_product' ) ) {
			return null;
		}

		$product = \wc_get_product( $product_id );
		if ( ! is_object( $product ) || ! method_exists( $product, 'get_name' ) || ! method_exists( $product, 'get_price_html' ) ) {
			return null;
		}

		return $product;
	}

	/**
	 * Build an accessible responsive featured-product image.
	 *
	 * @param mixed $product WooCommerce product instance.
	 * @return string
	 */
	private static function get_product_image_markup( $product ): string {
		if ( ! $product || ! method_exists( $product, 'get_image_id' ) || ! method_exists( $product, 'get_name' ) ) {
			return '';
		}

		$image_id = absint( $product->get_image_id() );
		if ( 0 === $image_id ) {
			return '';
		}

		return (string) wp_get_attachment_image(
			$image_id,
			'woocommerce_thumbnail',
			false,
			array(
				'class'         => 'saz-product-card__image',
				'alt'           => $product->get_name(),
				'loading'       => 'eager',
				'fetchpriority' => 'low',
				'decoding'      => 'async',
			)
		);
	}

	/**
	 * Return the plugin's controlled SVG icon markup.
	 *
	 * @param string $name Icon name.
	 * @return string
	 */
	public static function get_icon_markup( string $name ): string {
		$icons = array(
			'book'    => '<path d="M12 7v14"/><path d="M3 5.5A2.5 2.5 0 0 1 5.5 3H12v18H5.5A2.5 2.5 0 0 0 3 23V5.5Z"/><path d="M21 5.5A2.5 2.5 0 0 0 18.5 3H12v18h6.5A2.5 2.5 0 0 1 21 23V5.5Z"/>',
			'chevron' => '<path d="m9 18 6-6-6-6"/>',
			'glasses' => '<path d="M3 11h2l2 7a3 3 0 0 0 5.8-.6L13.5 11h-3"/><path d="M21 11h-2l-2 7a3 3 0 0 1-5.8-.6L10.5 11h3"/><path d="M3 11a2 2 0 0 1 2-2h2a3 3 0 0 1 3 3M21 11a2 2 0 0 0-2-2h-2a3 3 0 0 0-3 3"/>',
			'heart'   => '<path d="M20.8 8.6c0 4.4-8.8 10-8.8 10s-8.8-5.6-8.8-10A4.6 4.6 0 0 1 12 6.1a4.6 4.6 0 0 1 8.8 2.5Z"/>',
			'headset' => '<path d="M4 13v-2a8 8 0 0 1 16 0v2"/><rect x="3" y="12" width="4" height="7" rx="2"/><rect x="17" y="12" width="4" height="7" rx="2"/><path d="M17 19a5 5 0 0 1-5 3h-1"/>',
			'shield'  => '<path d="M12 3 20 6v5c0 5-3.4 8.1-8 10-4.6-1.9-8-5-8-10V6l8-3Z"/><path d="m9 12 2 2 4-4"/>',
			'truck'   => '<path d="M3 6h11v11H3zM14 10h4l3 3v4h-7z"/><circle cx="7.5" cy="19" r="1.5"/><circle cx="17.5" cy="19" r="1.5"/>',
		);

		if ( ! isset( $icons[ $name ] ) ) {
			return '';
		}

		return '<svg class="saz-icon saz-icon--' . esc_attr( $name ) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">' . $icons[ $name ] . '</svg>';
	}
}
