<?php
/**
 * Floating storefront header used when Elementor has no header template.
 *
 * @package SasanZare
 */

defined( 'ABSPATH' ) || exit;

$account_url = function_exists( '\\wc_get_page_permalink' ) ? \wc_get_page_permalink( 'myaccount' ) : wp_login_url();
$site_tagline = trim( (string) get_bloginfo( 'description' ) );
$site_name = get_bloginfo( 'name' );
// Match the supplied wordmark while preserving an explicitly configured identity.
$brand_name = apply_filters( 'saz_reference_brand_name', 'فروشگاه عینک' === $site_name ? __( 'دیدآرا', 'sasan-zare' ) : $site_name );
$site_tagline = '' !== $site_tagline ? $site_tagline : __( 'عینک فراتر از دید', 'sasan-zare' );
?>
<header id="masthead" class="saz-site-header">
	<div class="saz-site-header__inner <?php echo has_nav_menu( 'primary' ) ? 'has-primary-menu' : 'no-primary-menu'; ?>">
		<?php if ( has_custom_logo() ) : ?>
			<div class="saz-site-header__brand saz-site-header__brand--logo">
				<?php the_custom_logo(); ?>
				<span class="saz-site-header__brand-copy">
					<span class="screen-reader-text"><?php echo esc_html( $brand_name ); ?></span>
					<?php if ( '' !== $site_tagline ) : ?>
						<span class="saz-site-header__tagline"><?php echo esc_html( $site_tagline ); ?></span>
					<?php endif; ?>
				</span>
			</div>
		<?php else : ?>
			<a aria-label="<?php echo esc_attr( $site_name ); ?>" class="saz-site-header__brand saz-site-header__brand--fallback" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<span class="saz-brand-mark" aria-hidden="true"><span></span><span></span></span>
				<span class="saz-site-header__brand-copy">
					<span class="saz-site-header__title"><?php echo esc_html( $brand_name ); ?></span>
					<?php if ( '' !== $site_tagline ) : ?>
						<span class="saz-site-header__tagline"><?php echo esc_html( $site_tagline ); ?></span>
					<?php endif; ?>
				</span>
			</a>
		<?php endif; ?>

		<button class="saz-mobile-menu-toggle" type="button" data-saz-menu-open aria-controls="saz-mobile-menu" aria-haspopup="dialog" aria-expanded="false" aria-label="<?php esc_attr_e( 'باز کردن منوی ناوبری', 'sasan-zare' ); ?>">
			<?php echo \SasanZare\saz_get_icon_markup( 'menu' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG from the theme icon map. ?>
		</button>

		<nav class="saz-primary-navigation" aria-label="<?php esc_attr_e( 'ناوبری اصلی', 'sasan-zare' ); ?>" dir="rtl">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'fallback_cb'    => '\\SasanZare\\saz_reference_navigation',
					'menu_id'        => 'saz-primary-menu',
					'menu_class'     => 'saz-primary-menu',
					'depth'          => 2,
				)
			);
			?>
		</nav>

		<div class="saz-header-search">
			<form class="saz-search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<label class="screen-reader-text" for="saz-header-search-input"><?php esc_html_e( 'جستجوی محصولات و برندها', 'sasan-zare' ); ?></label>
				<input id="saz-header-search-input" type="search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php esc_attr_e( 'جستجوی محصولات، برندها و ...', 'sasan-zare' ); ?>" autocomplete="off">
				<?php if ( class_exists( '\\WooCommerce' ) ) : ?>
					<input type="hidden" name="post_type" value="product">
				<?php endif; ?>
				<button type="submit" aria-label="<?php esc_attr_e( 'جستجو', 'sasan-zare' ); ?>">
					<?php echo \SasanZare\saz_get_icon_markup( 'search' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG from the theme icon map. ?>
				</button>
			</form>
		</div>

		<div class="saz-header-actions" role="group" aria-label="<?php esc_attr_e( 'عملیات حساب کاربری و خرید', 'sasan-zare' ); ?>">
			<a class="saz-header-action saz-header-action--account" href="<?php echo esc_url( $account_url ); ?>" aria-label="<?php esc_attr_e( 'حساب کاربری', 'sasan-zare' ); ?>" title="<?php esc_attr_e( 'حساب کاربری', 'sasan-zare' ); ?>">
				<?php echo \SasanZare\saz_get_icon_markup( 'user' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG from the theme icon map. ?>
			</a>
			<button class="saz-header-action saz-header-action--wishlist saz-header-action--unavailable" type="button" disabled aria-label="<?php esc_attr_e( 'فهرست علاقه‌مندی‌ها در حال حاضر در دسترس نیست', 'sasan-zare' ); ?>" title="<?php esc_attr_e( 'فهرست علاقه‌مندی‌ها در حال حاضر در دسترس نیست', 'sasan-zare' ); ?>">
				<?php echo \SasanZare\saz_get_icon_markup( 'heart' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG from the theme icon map. ?>
			</button>
			<?php \SasanZare\saz_render_cart_action( 'desktop' ); ?>
		</div>
	</div>

	<dialog id="saz-mobile-menu" class="saz-mobile-drawer" aria-labelledby="saz-mobile-menu-title">
		<div class="saz-mobile-drawer__top">
			<h2 id="saz-mobile-menu-title" class="saz-mobile-drawer__title"><?php esc_html_e( 'منوی فروشگاه', 'sasan-zare' ); ?></h2>
			<button class="saz-header-action" type="button" data-saz-menu-close aria-label="<?php esc_attr_e( 'بستن منوی ناوبری', 'sasan-zare' ); ?>">
				<?php echo \SasanZare\saz_get_icon_markup( 'close' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG from the theme icon map. ?>
			</button>
		</div>
		<nav class="saz-mobile-drawer__navigation" aria-label="<?php esc_attr_e( 'ناوبری موبایل', 'sasan-zare' ); ?>" dir="rtl">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'fallback_cb'    => '\\SasanZare\\saz_reference_navigation',
					'menu_id'        => 'saz-mobile-menu-items',
					'menu_class'     => 'saz-primary-menu',
					'depth'          => 2,
				)
			);
			?>
		</nav>
		<div class="saz-mobile-drawer__extras">
			<a class="saz-mobile-drawer__account" href="<?php echo esc_url( $account_url ); ?>">
				<?php echo \SasanZare\saz_get_icon_markup( 'user' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG from the theme icon map. ?>
				<span><?php esc_html_e( 'حساب کاربری', 'sasan-zare' ); ?></span>
			</a>
			<button class="saz-header-action saz-header-action--wishlist saz-header-action--unavailable" type="button" disabled aria-label="<?php esc_attr_e( 'فهرست علاقه‌مندی‌ها در حال حاضر در دسترس نیست', 'sasan-zare' ); ?>">
				<?php echo \SasanZare\saz_get_icon_markup( 'heart' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG from the theme icon map. ?>
				<span><?php esc_html_e( 'فهرست علاقه‌مندی‌ها در دسترس نیست', 'sasan-zare' ); ?></span>
			</button>
		</div>
	</dialog>
</header>
