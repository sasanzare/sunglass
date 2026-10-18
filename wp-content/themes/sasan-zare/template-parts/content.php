<?php
/**
 * Basic post content fallback.
 *
 * @package SasanZare
 */

defined( 'ABSPATH' ) || exit;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'saz-content' ); ?>>
	<header class="saz-content__header">
		<?php if ( is_singular() ) : ?>
			<h1 class="saz-content__title"><?php echo esc_html( get_the_title() ); ?></h1>
		<?php else : ?>
			<h2 class="saz-content__title">
				<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
			</h2>
		<?php endif; ?>
	</header>
	<div class="saz-content__body">
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
	</div>
</article>
