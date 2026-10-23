<?php
/**
 * Elementor widget for the Persian eyewear homepage hero.
 *
 * @package SasanZare\Core
 */

namespace SasanZare\Core\Widgets;

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Widget_Base;
use SasanZare\Core\Homepage_Hero;

defined( 'ABSPATH' ) || exit;

/**
 * Editable hero copy, media, product card, and benefit items.
 */
final class Eyewear_Hero_Widget extends Widget_Base {
	/**
	 * Widget identifier.
	 *
	 * @return string
	 */
	public function get_name() {
		return 'saz-eyewear-hero';
	}

	/**
	 * Widget label in Elementor.
	 *
	 * @return string
	 */
	public function get_title() {
		return esc_html__( 'Eyewear Hero', 'sasan-Zare-core' );
	}

	/**
	 * Elementor widget icon.
	 *
	 * @return string
	 */
	public function get_icon() {
		return 'eicon-image-box';
	}

	/**
	 * Widget keywords for the editor panel.
	 *
	 * @return array<int,string>
	 */
	public function get_keywords() {
		return array( 'eyewear', 'hero', 'banner', 'glasses', 'sasan zare' );
	}

	/**
	 * Widget categories.
	 *
	 * @return array<int,string>
	 */
	public function get_categories() {
		return array( 'general' );
	}

	/**
	 * Styles used by this widget.
	 *
	 * @return array<int,string>
	 */
	public function get_style_depends(): array {
		return array( 'saz-core-homepage-hero' );
	}

	/**
	 * Shared interactive frame guide.
	 *
	 * @return array<int,string>
	 */
	public function get_script_depends(): array {
		return array( 'saz-core-homepage-hero' );
	}

	/**
	 * Register editable hero controls.
	 *
	 * @return void
	 */
	protected function register_controls() {
		$defaults = Homepage_Hero::get_default_settings();

		$this->start_controls_section(
			'content_section',
			array(
				'label' => esc_html__( 'Hero Content', 'sasan-Zare-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'eyebrow',
			array(
				'label'       => esc_html__( 'Eyebrow', 'sasan-Zare-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => $defaults['eyebrow'],
				'label_block' => true,
			)
		);

		$this->add_control(
			'heading',
			array(
				'label'       => esc_html__( 'Heading', 'sasan-Zare-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => $defaults['heading'],
				'label_block' => true,
				'dynamic'     => array( 'active' => true ),
			)
		);

		$this->add_control(
			'heading_highlight',
			array(
				'label'       => esc_html__( 'Highlighted phrase', 'sasan-Zare-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => $defaults['heading_highlight'],
				'label_block' => true,
				'description' => esc_html__( 'The first matching phrase in the heading receives the violet emphasis.', 'sasan-Zare-core' ),
			)
		);

		$this->add_control(
			'description',
			array(
				'label'       => esc_html__( 'Description', 'sasan-Zare-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => $defaults['description'],
				'rows'        => 4,
				'dynamic'     => array( 'active' => true ),
			)
		);

		$this->add_control(
			'hero_image',
			array(
				'label'   => esc_html__( 'Hero image', 'sasan-Zare-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => $defaults['hero_image'],
				'dynamic' => array( 'active' => true ),
			)
		);

		$this->add_control(
			'image_alt',
			array(
				'label'       => esc_html__( 'Hero image alternative text', 'sasan-Zare-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => '',
				'label_block' => true,
				'description' => esc_html__( 'Describe the image for screen-reader users; leave blank to use the media-library alt text.', 'sasan-Zare-core' ),
			)
		);

		$this->add_control(
			'primary_label',
			array(
				'label'   => esc_html__( 'Primary button label', 'sasan-Zare-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => $defaults['primary_label'],
			)
		);

		$this->add_control(
			'primary_url',
			array(
				'label'   => esc_html__( 'Primary button link', 'sasan-Zare-core' ),
				'type'    => Controls_Manager::URL,
				'default' => array( 'url' => $defaults['primary_url'] ),
			)
		);

		$this->add_control(
			'secondary_label',
			array(
				'label'   => esc_html__( 'Secondary button label', 'sasan-Zare-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => $defaults['secondary_label'],
			)
		);

		$this->add_control(
			'secondary_url',
			array(
				'label'       => esc_html__( 'Secondary button link', 'sasan-Zare-core' ),
				'type'        => Controls_Manager::URL,
				'default'     => array( 'url' => '' ),
				'description' => esc_html__( 'Leave empty to open the built-in frame guide, or set a custom destination.', 'sasan-Zare-core' ),
			)
		);

		$this->add_control(
			'featured_product_id',
			array(
				'label'       => esc_html__( 'Featured WooCommerce product', 'sasan-Zare-core' ),
				'type'        => Controls_Manager::SELECT2,
				'options'     => self::get_product_options(),
				'default'     => '',
				'label_block' => true,
				'description' => esc_html__( 'Choose from up to 100 published products. The card uses WooCommerce product data and price formatting.', 'sasan-Zare-core' ),
			)
		);

		$benefit_repeater = new Repeater();
		$benefit_repeater->add_control(
			'icon',
			array(
				'label'   => esc_html__( 'Icon', 'sasan-Zare-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'truck'   => esc_html__( 'Delivery', 'sasan-Zare-core' ),
					'shield'  => esc_html__( 'Authenticity', 'sasan-Zare-core' ),
					'headset' => esc_html__( 'Consultation', 'sasan-Zare-core' ),
				),
				'default' => 'truck',
			)
		);
		$benefit_repeater->add_control(
			'title',
			array(
				'label'   => esc_html__( 'Title', 'sasan-Zare-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'Benefit', 'sasan-Zare-core' ),
			)
		);
		$benefit_repeater->add_control(
			'description',
			array(
				'label'   => esc_html__( 'Description', 'sasan-Zare-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '',
			)
		);

		$this->add_control(
			'benefits',
			array(
				'label'       => esc_html__( 'Benefits', 'sasan-Zare-core' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $benefit_repeater->get_controls(),
				'default'     => $defaults['benefits'],
				'title_field' => '{{{ title }}}',
			)
		);
		$this->add_control(
			'scene_caption',
			array(
				'label'       => esc_html__( 'Scene caption', 'sasan-Zare-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => $defaults['scene_caption'],
				'description' => esc_html__( 'Use a new line for each line of the decorative caption.', 'sasan-Zare-core' ),
			)
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'editorial_section',
			array(
				'label'     => esc_html__( 'Style inspiration card', 'sasan-Zare-core' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
				'condition' => array( 'featured_product_id' => '' ),
			)
		);
		$this->add_control(
			'editorial_image',
			array(
				'label'   => esc_html__( 'Card image', 'sasan-Zare-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => $defaults['editorial_image'],
				'dynamic' => array( 'active' => true ),
			)
		);
		$card_labels = array(
			'editorial_image_alt'  => esc_html__( 'Card image alternative text', 'sasan-Zare-core' ),
			'editorial_title'      => esc_html__( 'Card title', 'sasan-Zare-core' ),
			'editorial_sku'        => esc_html__( 'Card model', 'sasan-Zare-core' ),
			'editorial_link_label' => esc_html__( 'Card link label', 'sasan-Zare-core' ),
		);
		foreach ( $card_labels as $key => $label ) {
			$this->add_control( $key, array( 'label' => $label, 'type' => Controls_Manager::TEXT, 'default' => $defaults[ $key ], 'label_block' => true ) );
		}
		$this->add_control(
			'editorial_url',
			array(
				'label'       => esc_html__( 'Card link', 'sasan-Zare-core' ),
				'type'        => Controls_Manager::URL,
				'default'     => array( 'url' => '' ),
				'description' => esc_html__( 'Leave empty to use the primary button destination. This card stays labeled as style inspiration; select a WooCommerce product to show real product data and prices.', 'sasan-Zare-core' ),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section( 'guide_section', array( 'label' => esc_html__( 'Frame guide', 'sasan-Zare-core' ), 'tab' => Controls_Manager::TAB_CONTENT ) );
		$this->add_control( 'guide_eyebrow', array( 'label' => esc_html__( 'Guide introduction', 'sasan-Zare-core' ), 'type' => Controls_Manager::TEXT, 'default' => $defaults['guide_eyebrow'], 'label_block' => true ) );
		$guide_repeater = new Repeater();
		$guide_repeater->add_control( 'title', array( 'label' => esc_html__( 'Title', 'sasan-Zare-core' ), 'type' => Controls_Manager::TEXT, 'label_block' => true ) );
		$guide_repeater->add_control( 'description', array( 'label' => esc_html__( 'Description', 'sasan-Zare-core' ), 'type' => Controls_Manager::TEXTAREA ) );
		$this->add_control( 'guide_items', array( 'label' => esc_html__( 'Guide items', 'sasan-Zare-core' ), 'type' => Controls_Manager::REPEATER, 'fields' => $guide_repeater->get_controls(), 'default' => $defaults['guide_items'], 'title_field' => '{{{ title }}}' ) );
		$this->end_controls_section();

		$this->start_controls_section(
			'layout_section',
			array(
				'label' => esc_html__( 'Image Layout', 'sasan-Zare-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'image_position_y',
			array(
				'label'      => esc_html__( 'Vertical image focus', 'sasan-Zare-core' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( '%' ),
				'range'      => array( '%' => array( 'min' => 0, 'max' => 100 ) ),
				'default'    => array( 'unit' => '%', 'size' => (int) $defaults['image_position_y'] ),
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Render the shared hero view using current Elementor settings.
	 *
	 * @return void
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		foreach ( array( 'primary', 'secondary', 'editorial' ) as $prefix ) {
			$key = $prefix . '_url';
			if ( isset( $settings[ $key ] ) && is_array( $settings[ $key ] ) ) {
				$settings[ $prefix . '_target' ] = ! empty( $settings[ $key ]['is_external'] ) ? '_blank' : '';
				$settings[ $prefix . '_rel' ] = ! empty( $settings[ $key ]['nofollow'] ) ? 'nofollow' : '';
				$settings[ $key ] = $settings[ $key ]['url'] ?? '';
				if ( '_blank' === $settings[ $prefix . '_target' ] ) {
					$settings[ $prefix . '_rel' ] = trim( $settings[ $prefix . '_rel' ] . ' noopener noreferrer' );
				}
			}
		}
		if ( isset( $settings['image_position_y'] ) && is_array( $settings['image_position_y'] ) ) {
			$settings['image_position_y'] = isset( $settings['image_position_y']['size'] ) ? $settings['image_position_y']['size'] : 42;
		}

		Homepage_Hero::render( $settings );
	}

	/**
	 * Build the searchable list of recent published WooCommerce products.
	 *
	 * @return array<string,string>
	 */
	private static function get_product_options(): array {
		$options = array( '' => esc_html__( 'Select a product', 'sasan-Zare-core' ) );
		if ( ! class_exists( '\\WooCommerce' ) || ! function_exists( '\\wc_get_products' ) ) {
			$options[''] = esc_html__( 'WooCommerce is not available', 'sasan-Zare-core' );
			return $options;
		}

		$products = \wc_get_products(
			array(
				'status'  => 'publish',
				'limit'   => 100,
				'orderby' => 'title',
				'order'   => 'ASC',
				'return'  => 'objects',
			)
		);

		if ( ! is_array( $products ) || empty( $products ) ) {
			$options[''] = esc_html__( 'No published products found', 'sasan-Zare-core' );
			return $options;
		}

		foreach ( $products as $product ) {
			if ( ! is_object( $product ) || ! method_exists( $product, 'get_id' ) || ! method_exists( $product, 'get_name' ) ) {
				continue;
			}

			$product_label = wp_strip_all_tags( (string) $product->get_name() );
			if ( method_exists( $product, 'get_sku' ) && '' !== (string) $product->get_sku() ) {
				$product_label .= ' (' . wp_strip_all_tags( (string) $product->get_sku() ) . ')';
			}
			$options[ (string) $product->get_id() ] = esc_html( $product_label );
		}

		return $options;
	}
}
