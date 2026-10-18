<?php
/**
 * Minimal header used when Elementor has no header template.
 *
 * @package SasanZare
 */

defined( 'ABSPATH' ) || exit;
?>
<header id="masthead" class="saz-site-header">
	<div class="saz-site-header__inner">
		<?php if ( has_custom_logo() ) : ?>
			<?php the_custom_logo(); ?>
		<?php else : ?>
			<a class="saz-site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
			</a>
		<?php endif; ?>
		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav class="saz-primary-navigation" aria-label="<?php esc_attr_e( 'Primary navigation', 'sasan-zare' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'fallback_cb'    => false,
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'saz-primary-menu',
					)
				);
				?>
			</nav>
		<?php endif; ?>
	</div>
</header>
