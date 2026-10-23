<?php
/**
 * Shared storefront header used by Elementor and the theme fallback.
 *
 * @package SasanZare
 * @var array<string,mixed> $args Template-part arguments.
 */

defined( 'ABSPATH' ) || exit;

$defaults      = \SasanZare\saz_get_header_defaults();
$settings      = isset( $args['settings'] ) && is_array( $args['settings'] ) ? wp_parse_args( $args['settings'], $defaults ) : $defaults;
$site_name     = (string) get_bloginfo( 'name' );
$brand_name    = trim( (string) $settings['brand_name'] );
$tagline       = trim( (string) $settings['tagline'] );
$logo_alt      = trim( (string) $settings['logo_alt'] );
$logo          = is_array( $settings['logo'] ) ? $settings['logo'] : array( 'url' => (string) $settings['logo'] );
$logo_id       = isset( $logo['id'] ) ? absint( $logo['id'] ) : 0;
$logo_url      = isset( $logo['url'] ) && is_string( $logo['url'] ) ? $logo['url'] : '';
$has_logo      = $logo_id > 0 || '' !== $logo_url;
$show_search   = 'yes' === (string) $settings['show_search'];
$show_account  = 'yes' === (string) $settings['show_account'];
$show_wishlist = 'yes' === (string) $settings['show_wishlist'];
$show_cart     = 'yes' === (string) $settings['show_cart'];
$menu          = isset( $settings['wordpress_menu'] ) ? (string) $settings['wordpress_menu'] : 'primary';
$has_menu      = 'elementor' === (string) $settings['navigation_source'] ? ! empty( $settings['navigation_items'] ) : ( has_nav_menu( 'primary' ) || 0 === strpos( $menu, 'menu:' ) );
$header_id     = function_exists( 'wp_unique_id' ) ? wp_unique_id( 'saz-header-' ) : 'saz-header';
$drawer_id     = $header_id . '-mobile-menu';
$search_id     = $header_id . '-search-input';
$account_url   = function_exists( '\\wc_get_page_permalink' ) ? \wc_get_page_permalink( 'myaccount' ) : wp_login_url();

if ( '' === $logo_alt ) {
	$logo_alt = $brand_name !== '' ? $brand_name : $site_name;
}
?>
<header id="masthead" class="saz-site-header">
	<div class="saz-site-header__inner <?php echo $has_menu ? 'has-primary-menu' : 'no-primary-menu'; ?>">
		<?php if ( $has_logo ) : ?>
			<div class="saz-site-header__brand saz-site-header__brand--logo">
				<a class="custom-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="<?php echo esc_attr( $brand_name !== '' ? $brand_name : $site_name ); ?>">
					<?php if ( $logo_id > 0 ) : ?>
						<?php echo wp_get_attachment_image( $logo_id, 'full', false, array( 'class' => 'custom-logo', 'alt' => $logo_alt, 'decoding' => 'async' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Responsive image markup is generated and escaped by WordPress. ?>
					<?php else : ?>
						<img class="custom-logo" src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $logo_alt ); ?>" decoding="async">
					<?php endif; ?>
				</a>
				<span class="saz-site-header__brand-copy">
					<span class="screen-reader-text"><?php echo esc_html( $brand_name ); ?></span>
					<?php if ( '' !== $tagline ) : ?>
						<span class="saz-site-header__tagline"><?php echo esc_html( $tagline ); ?></span>
					<?php endif; ?>
				</span>
			</div>
		<?php else : ?>
			<a aria-label="<?php echo esc_attr( $brand_name !== '' ? $brand_name : $site_name ); ?>" class="saz-site-header__brand saz-site-header__brand--fallback" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<span class="saz-brand-mark" aria-hidden="true"><span></span><span></span></span>
				<span class="saz-site-header__brand-copy">
					<?php if ( '' !== $brand_name ) : ?><span class="saz-site-header__title"><?php echo esc_html( $brand_name ); ?></span><?php endif; ?>
					<?php if ( '' !== $tagline ) : ?>
						<span class="saz-site-header__tagline"><?php echo esc_html( $tagline ); ?></span>
					<?php endif; ?>
				</span>
			</a>
		<?php endif; ?>

		<button class="saz-mobile-menu-toggle" type="button" data-saz-menu-open aria-controls="<?php echo esc_attr( $drawer_id ); ?>" aria-haspopup="dialog" aria-expanded="false" aria-label="<?php esc_attr_e( 'باز کردن منوی ناوبری', 'sasan-zare' ); ?>">
			<?php echo \SasanZare\saz_get_icon_markup( 'menu' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG from the theme icon map. ?>
		</button>

		<nav class="saz-primary-navigation" aria-label="<?php esc_attr_e( 'ناوبری اصلی', 'sasan-zare' ); ?>" dir="rtl">
			<?php \SasanZare\saz_render_header_navigation( $settings, $header_id . '-primary-menu' ); ?>
		</nav>

		<?php if ( $show_search ) : ?>
			<div class="saz-header-search">
				<form class="saz-search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<label class="screen-reader-text" for="<?php echo esc_attr( $search_id ); ?>"><?php esc_html_e( 'جستجوی محصولات و برندها', 'sasan-zare' ); ?></label>
					<input id="<?php echo esc_attr( $search_id ); ?>" type="search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php echo esc_attr( (string) $settings['search_placeholder'] ); ?>" autocomplete="off">
					<?php if ( class_exists( '\\WooCommerce' ) ) : ?>
						<input type="hidden" name="post_type" value="product">
					<?php endif; ?>
					<button type="submit" aria-label="<?php esc_attr_e( 'جستجو', 'sasan-zare' ); ?>">
						<?php echo \SasanZare\saz_get_icon_markup( 'search' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG from the theme icon map. ?>
					</button>
				</form>
			</div>
		<?php endif; ?>

		<?php if ( $show_account || $show_wishlist || $show_cart ) : ?>
			<div class="saz-header-actions" role="group" aria-label="<?php esc_attr_e( 'عملیات حساب کاربری و خرید', 'sasan-zare' ); ?>">
				<?php if ( $show_account ) : ?>
					<a class="saz-header-action saz-header-action--account" href="<?php echo esc_url( $account_url ); ?>" aria-label="<?php esc_attr_e( 'حساب کاربری', 'sasan-zare' ); ?>" title="<?php esc_attr_e( 'حساب کاربری', 'sasan-zare' ); ?>">
						<?php echo \SasanZare\saz_get_icon_markup( 'user' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG from the theme icon map. ?>
					</a>
				<?php endif; ?>
				<?php if ( $show_wishlist ) : ?>
					<button class="saz-header-action saz-header-action--wishlist saz-header-action--unavailable" type="button" disabled aria-label="<?php esc_attr_e( 'فهرست علاقه‌مندی‌ها در حال حاضر در دسترس نیست', 'sasan-zare' ); ?>" title="<?php esc_attr_e( 'فهرست علاقه‌مندی‌ها در حال حاضر در دسترس نیست', 'sasan-zare' ); ?>">
						<?php echo \SasanZare\saz_get_icon_markup( 'heart' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG from the theme icon map. ?>
					</button>
				<?php endif; ?>
				<?php if ( $show_cart ) : ?>
					<?php \SasanZare\saz_render_cart_action( 'desktop' ); ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>

	<dialog id="<?php echo esc_attr( $drawer_id ); ?>" class="saz-mobile-drawer" aria-labelledby="<?php echo esc_attr( $drawer_id . '-title' ); ?>">
		<div class="saz-mobile-drawer__top">
			<h2 id="<?php echo esc_attr( $drawer_id . '-title' ); ?>" class="saz-mobile-drawer__title"><?php esc_html_e( 'منوی فروشگاه', 'sasan-zare' ); ?></h2>
			<button class="saz-header-action" type="button" data-saz-menu-close aria-label="<?php esc_attr_e( 'بستن منوی ناوبری', 'sasan-zare' ); ?>">
				<?php echo \SasanZare\saz_get_icon_markup( 'close' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG from the theme icon map. ?>
			</button>
		</div>
		<nav class="saz-mobile-drawer__navigation" aria-label="<?php esc_attr_e( 'ناوبری موبایل', 'sasan-zare' ); ?>" dir="rtl">
			<?php \SasanZare\saz_render_header_navigation( $settings, $header_id . '-mobile-menu-items' ); ?>
		</nav>
		<?php if ( $show_account || $show_wishlist ) : ?>
			<div class="saz-mobile-drawer__extras">
				<?php if ( $show_account ) : ?>
					<a class="saz-mobile-drawer__account" href="<?php echo esc_url( $account_url ); ?>">
						<?php echo \SasanZare\saz_get_icon_markup( 'user' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG from the theme icon map. ?>
						<span><?php esc_html_e( 'حساب کاربری', 'sasan-zare' ); ?></span>
					</a>
				<?php endif; ?>
				<?php if ( $show_wishlist ) : ?>
					<button class="saz-header-action saz-header-action--wishlist saz-header-action--unavailable" type="button" disabled aria-label="<?php esc_attr_e( 'فهرست علاقه‌مندی‌ها در حال حاضر در دسترس نیست', 'sasan-zare' ); ?>">
						<?php echo \SasanZare\saz_get_icon_markup( 'heart' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG from the theme icon map. ?>
						<span><?php esc_html_e( 'فهرست علاقه‌مندی‌ها در دسترس نیست', 'sasan-zare' ); ?></span>
					</button>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</dialog>
</header>
