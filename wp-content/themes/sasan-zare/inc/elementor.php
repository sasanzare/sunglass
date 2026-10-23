<?php
/**
 * Elementor Theme Builder integration.
 *
 * @package SasanZare
 */

namespace SasanZare;

defined( 'ABSPATH' ) || exit;

/**
 * Register Elementor's core Theme Builder locations when the manager supports them.
 *
 * Elementor Pro supplies the Theme Builder location manager. The method checks keep
 * the theme safe when Elementor Pro is not installed or its API is unavailable.
 *
 * @param mixed $theme_manager Elementor theme manager passed by the registration hook.
 * @return void
 */
function saz_register_elementor_locations( $theme_manager ): void {
	if ( ! is_object( $theme_manager ) || ! method_exists( $theme_manager, 'register_all_core_location' ) ) {
		return;
	}

	$theme_manager->register_all_core_location();
}
add_action( 'elementor/theme/register_locations', __NAMESPACE__ . '\\saz_register_elementor_locations' );

/**
 * Register the theme's Elementor header widget.
 *
 * @param mixed $widgets_manager Elementor widgets manager.
 * @return void
 */
function saz_register_elementor_widgets( $widgets_manager ): void {
	if ( ! is_object( $widgets_manager ) || ! method_exists( $widgets_manager, 'register' ) || ! class_exists( '\\Elementor\\Widget_Base' ) ) {
		return;
	}

	require_once __DIR__ . '/class-site-header-widget.php';
	$widgets_manager->register( new \SasanZare\Elementor\Site_Header_Widget() );
}
add_action( 'elementor/widgets/register', __NAMESPACE__ . '\\saz_register_elementor_widgets' );

/**
 * List published Elementor library templates for the free Elementor header slot.
 *
 * @return array<int|string,string>
 */
function saz_get_elementor_header_template_choices(): array {
	$choices = array(
		0 => __( 'Use Elementor Pro Header when available; otherwise use the theme header', 'sasan-zare' ),
	);

	if ( ! post_type_exists( 'elementor_library' ) ) {
		return $choices;
	}

	$templates = get_posts(
		array(
			'post_type'      => 'elementor_library',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'orderby'        => 'title',
			'order'          => 'ASC',
			'meta_query'     => array(
				array(
					'key'   => '_elementor_edit_mode',
					'value' => 'builder',
				),
			),
		)
	);

	foreach ( $templates as $template ) {
		$choices[ (int) $template->ID ] = sprintf(
			/* translators: 1: Elementor template title, 2: template type. */
			__( '%1$s (%2$s)', 'sasan-zare' ),
			wp_strip_all_tags( $template->post_title ),
			(string) get_post_meta( $template->ID, '_elementor_template_type', true )
		);
	}

	return $choices;
}

/**
 * Add a selectable global header template for Elementor Free installations.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer manager.
 * @return void
 */
function saz_customize_elementor_header( $wp_customize ): void {
	if ( ! is_object( $wp_customize ) ) {
		return;
	}

	$wp_customize->add_section(
		'saz_elementor_header',
		array(
			'title'       => __( 'Elementor Header', 'sasan-zare' ),
			'description' => __( 'Create and publish an Elementor Saved Template, add the Sasan Zare Header widget, then select it here. A published Elementor Pro Theme Builder header takes priority.', 'sasan-zare' ),
			'priority'    => 35,
		)
	);

	$wp_customize->add_setting(
		'saz_elementor_header_template_id',
		array(
			'default'           => 0,
			'type'              => 'theme_mod',
			'sanitize_callback' => 'absint',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'saz_elementor_header_template_id',
		array(
			'label'       => __( 'Header template', 'sasan-zare' ),
			'section'     => 'saz_elementor_header',
			'type'        => 'select',
			'choices'     => saz_get_elementor_header_template_choices(),
			'description' => __( 'The selected published template is rendered site-wide when Elementor Pro does not provide a Header location.', 'sasan-zare' ),
		)
	);
}
add_action( 'customize_register', __NAMESPACE__ . '\\saz_customize_elementor_header' );

/**
 * Render the selected saved Elementor template when no Theme Builder header exists.
 *
 * @return bool Whether a saved Elementor template rendered.
 */
function saz_render_elementor_header_template(): bool {
	$template_id = absint( get_theme_mod( 'saz_elementor_header_template_id', 0 ) );
	$template    = $template_id ? get_post( $template_id ) : null;

	if ( ! $template || 'elementor_library' !== $template->post_type || 'publish' !== $template->post_status || 'builder' !== get_post_meta( $template_id, '_elementor_edit_mode', true ) ) {
		return false;
	}

	if ( ! class_exists( '\\Elementor\\Plugin' ) ) {
		return false;
	}

	$elementor = \Elementor\Plugin::$instance;
	if ( ! is_object( $elementor ) || ! isset( $elementor->frontend ) || ! method_exists( $elementor->frontend, 'get_builder_content_for_display' ) ) {
		return false;
	}

	$content = $elementor->frontend->get_builder_content_for_display( $template_id, true );
	if ( ! is_string( $content ) || '' === trim( $content ) ) {
		return false;
	}

	echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Elementor renders saved, editor-authored template content.
	return true;
}
