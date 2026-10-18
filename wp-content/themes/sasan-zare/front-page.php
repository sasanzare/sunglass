<?php
/**
 * Front page template with a safe Elementor/theme fallback.
 *
 * @package SasanZare
 */

namespace SasanZare;

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="primary" class="saz-site-main">
	<?php if ( is_home() ) : ?>
		<?php do_action( 'saz_render_homepage_hero' ); ?>
	<?php endif; ?>

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php if ( is_home() ) : ?>
				<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
			<?php else : ?>
				<?php
				$elementor_content = get_post_meta( get_the_ID(), '_elementor_data', true );
				$elementor_mode    = get_post_meta( get_the_ID(), '_elementor_edit_mode', true );
				$has_page_content  = '' !== trim( (string) get_the_content() );
				$has_elementor     = 'builder' === $elementor_mode && ! empty( $elementor_content ) && '[]' !== $elementor_content;

				if ( $has_page_content || $has_elementor ) {
					the_content();
				} else {
					do_action( 'saz_render_homepage_hero' );
				}
				?>
			<?php endif; ?>
		<?php endwhile; ?>
	<?php elseif ( ! is_home() ) : ?>
		<?php do_action( 'saz_render_homepage_hero' ); ?>
	<?php endif; ?>
</main>
<?php
get_footer();
