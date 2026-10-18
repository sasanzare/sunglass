<?php
/**
 * Final template fallback.
 *
 * @package SasanZare
 */

namespace SasanZare;

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="primary" class="saz-main" tabindex="-1">
	<?php
	$location = is_archive() || is_search() || is_home() ? 'archive' : 'single';

	if ( ! saz_render_elementor_location( $location ) ) :
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content' );
			endwhile;
			the_posts_navigation();
		else :
			get_template_part( 'template-parts/content-none' );
		endif;
	endif;
	?>
</main>
<?php
get_footer();
