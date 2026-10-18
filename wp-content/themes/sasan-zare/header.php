<?php
/**
 * Document head and header location.
 *
 * @package SasanZare
 */

namespace SasanZare;

defined( 'ABSPATH' ) || exit;
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="saz-skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'sasan-zare' ); ?></a>
<div id="page" class="saz-site">
	<?php
	if ( ! saz_render_elementor_location( 'header' ) ) {
		get_template_part( 'template-parts/fallback/header' );
	}
	?>
