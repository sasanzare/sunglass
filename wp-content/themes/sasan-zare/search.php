<?php
/**
 * Search results fallback.
 *
 * @package SasanZare
 */

namespace SasanZare;

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="primary" class="saz-main" tabindex="-1">
	<?php if ( ! saz_render_elementor_location( 'archive' ) ) : ?>
		<header class="saz-search-header">
			<h1><?php esc_html_e( 'Search results', 'sasan-zare' ); ?></h1>
			<p><?php echo esc_html( get_search_query() ); ?></p>
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
