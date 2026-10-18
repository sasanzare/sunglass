<?php
/**
 * Static page fallback.
 *
 * @package SasanZare
 */

namespace SasanZare;

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="primary" class="saz-main" tabindex="-1">
	<?php if ( ! saz_render_elementor_location( 'single' ) ) : ?>
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content' );
		endwhile;
		?>
	<?php endif; ?>
</main>
<?php
get_footer();
