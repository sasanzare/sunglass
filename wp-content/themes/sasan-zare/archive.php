<?php
/**
 * Archive fallback.
 *
 * @package SasanZare
 */

namespace SasanZare;

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="primary" class="saz-main" tabindex="-1">
	<?php if ( ! saz_render_elementor_location( 'archive' ) ) : ?>
		<header class="saz-archive-header">
			<?php the_archive_title( '<h1>', '</h1>' ); ?>
			<?php the_archive_description( '<div class="saz-archive-description">', '</div>' ); ?>
		</header>
		<?php if ( have_posts() ) : ?>
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content' );
			endwhile;
			the_posts_navigation();
			?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content-none' ); ?>
		<?php endif; ?>
	<?php endif; ?>
</main>
<?php
get_footer();
