<?php
/**
 * Not-found fallback.
 *
 * @package SasanZare
 */

namespace SasanZare;

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="primary" class="saz-main" tabindex="-1">
	<?php if ( ! saz_render_elementor_location( 'single' ) ) : ?>
		<section class="saz-not-found">
			<h1><?php esc_html_e( 'Page not found', 'sasan-zare' ); ?></h1>
			<p><?php esc_html_e( 'The requested page could not be found.', 'sasan-zare' ); ?></p>
			<?php get_search_form(); ?>
		</section>
	<?php endif; ?>
</main>
<?php
get_footer();
