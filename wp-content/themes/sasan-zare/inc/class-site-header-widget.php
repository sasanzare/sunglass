<?php
/**
 * Elementor widget for the editable Sasan Zare site header.
 *
 * @package SasanZare
 */

namespace SasanZare\Elementor;

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Widget_Base;

defined( 'ABSPATH' ) || exit;

/**
 * Reusable header content with editor controls for identity and navigation.
 */
final class Site_Header_Widget extends Widget_Base {
	/**
	 * Widget identifier.
	 *
	 * @return string
	 */
	public function get_name() {
		return 'saz-site-header';
	}

	/**
	 * Widget title shown in Elementor.
	 *
	 * @return string
	 */
	public function get_title() {
		return esc_html__( 'Sasan Zare Header', 'sasan-zare' );
	}

	/**
	 * Elementor widget icon.
	 *
	 * @return string
	 */
	public function get_icon() {
		return 'eicon-header';
	}

	/**
	 * Widget search keywords.
	 *
	 * @return array<int,string>
	 */
	public function get_keywords() {
		return array( 'sasan zare', 'header', 'navigation', 'logo', 'eyewear' );
	}

	/**
	 * Widget category.
	 *
	 * @return array<int,string>
	 */
	public function get_categories() {
		return array( 'general' );
	}

	/**
	 * Register editable header content controls.
	 *
	 * @return void
	 */
	protected function register_controls() {
		$defaults = \SasanZare\saz_get_header_defaults();

		$this->start_controls_section(
			'identity_section',
			array(
				'label' => esc_html__( 'Brand identity', 'sasan-zare' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'logo',
			array(
				'label'   => esc_html__( 'Header logo', 'sasan-zare' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => $defaults['logo'],
			)
		);

		$this->add_control(
			'logo_alt',
			array(
				'label'       => esc_html__( 'Logo alternative text', 'sasan-zare' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => $defaults['logo_alt'],
				'label_block' => true,
			)
		);

		$this->add_control(
			'brand_name',
			array(
				'label'       => esc_html__( 'Brand name', 'sasan-zare' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => $defaults['brand_name'],
				'label_block' => true,
			)
		);

		$this->add_control(
			'tagline',
			array(
				'label'       => esc_html__( 'Tagline', 'sasan-zare' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => $defaults['tagline'],
				'label_block' => true,
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'navigation_section',
			array(
				'label' => esc_html__( 'Navigation', 'sasan-zare' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'navigation_source',
			array(
				'label'   => esc_html__( 'Navigation source', 'sasan-zare' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'wordpress' => esc_html__( 'WordPress menu', 'sasan-zare' ),
					'elementor' => esc_html__( 'Elementor links', 'sasan-zare' ),
				),
				'default' => $defaults['navigation_source'],
			)
		);

		$this->add_control(
			'wordpress_menu',
			array(
				'label'     => esc_html__( 'WordPress menu', 'sasan-zare' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => \SasanZare\saz_get_header_menu_options(),
				'default'   => $defaults['wordpress_menu'],
				'condition' => array( 'navigation_source' => 'wordpress' ),
			)
		);

		$menu_item = new Repeater();
		$menu_item->add_control(
			'label',
			array(
				'label'       => esc_html__( 'Label', 'sasan-zare' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Menu item', 'sasan-zare' ),
				'label_block' => true,
			)
		);
		$menu_item->add_control(
			'url',
			array(
				'label'   => esc_html__( 'Link', 'sasan-zare' ),
				'type'    => Controls_Manager::URL,
				'default' => array( 'url' => '' ),
			)
		);

		$this->add_control(
			'navigation_items',
			array(
				'label'       => esc_html__( 'Navigation links', 'sasan-zare' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $menu_item->get_controls(),
				'default'     => $defaults['navigation_items'],
				'title_field' => '{{{ label }}}',
				'condition'   => array( 'navigation_source' => 'elementor' ),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'actions_section',
			array(
				'label' => esc_html__( 'Search and actions', 'sasan-zare' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'show_search',
			array(
				'label'        => esc_html__( 'Show product search', 'sasan-zare' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => $defaults['show_search'],
				'return_value' => 'yes',
			)
		);

		$this->add_control(
			'search_placeholder',
			array(
				'label'       => esc_html__( 'Search placeholder', 'sasan-zare' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => $defaults['search_placeholder'],
				'label_block' => true,
				'condition'   => array( 'show_search' => 'yes' ),
			)
		);

		$this->add_control(
			'show_account',
			array(
				'label'        => esc_html__( 'Show account link', 'sasan-zare' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => $defaults['show_account'],
				'return_value' => 'yes',
			)
		);

		$this->add_control(
			'show_wishlist',
			array(
				'label'        => esc_html__( 'Show unavailable wishlist placeholder', 'sasan-zare' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => $defaults['show_wishlist'],
				'return_value' => 'yes',
			)
		);

		$this->add_control(
			'show_cart',
			array(
				'label'        => esc_html__( 'Show WooCommerce cart', 'sasan-zare' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => $defaults['show_cart'],
				'return_value' => 'yes',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Render the shared theme header using the current Elementor settings.
	 *
	 * @return void
	 */
	protected function render() {
		\SasanZare\saz_render_site_header( $this->get_settings_for_display() );
	}
}
