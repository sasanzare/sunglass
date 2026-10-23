<?php
/**
 * Shared markup for the editable homepage hero.
 *
 * @package SasanZare\Core
 *
 * @var array<string,mixed>  $settings Hero settings.
 * @var string               $title_id Unique heading ID.
 * @var string               $image_html Responsive hero image HTML.
 * @var int                  $image_position_y Image focal position.
 * @var string               $heading_before Text before the highlighted phrase.
 * @var string               $heading_highlight Highlighted phrase.
 * @var string               $heading_after Text after the highlighted phrase.
 * @var string               $primary_url Primary action URL.
 * @var string               $secondary_url Secondary action URL.
 * @var mixed                $product Selected WooCommerce product, if available.
 * @var string               $product_image Product image HTML.
 * @var string               $product_price WooCommerce formatted product price.
 * @var array<int,array>     $benefits Benefit repeater items.
 * @var string              $editorial_image_html Escaped style-inspiration image markup.
 * @var string              $editorial_url Style-inspiration card destination.
 */

namespace SasanZare\Core;

defined( 'ABSPATH' ) || exit;

$primary_label   = trim( (string) $settings['primary_label'] );
$secondary_label = trim( (string) $settings['secondary_label'] );
$heading         = trim( (string) $settings['heading'] );
?>
<section class="saz-home-hero" <?php if ( '' !== $heading ) : ?>aria-labelledby="<?php echo esc_attr( $title_id ); ?>"<?php else : ?>aria-label="<?php esc_attr_e( 'بخش معرفی فروشگاه عینک', 'sasan-Zare-core' ); ?>"<?php endif; ?>>
	<figure class="saz-home-hero__media" style="--saz-hero-image-position: <?php echo esc_attr( (string) $image_position_y ); ?>%;">
		<?php echo $image_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped renderer output. ?>
	</figure>
	<div class="saz-home-hero__grid">
		<div class="saz-home-hero__panel">
			<?php if ( '' !== trim( (string) $settings['eyebrow'] ) ) : ?>
				<p class="saz-home-hero__eyebrow"><span class="saz-home-hero__eyebrow-line" aria-hidden="true"></span><span lang="en" dir="ltr"><?php echo esc_html( $settings['eyebrow'] ); ?></span></p>
			<?php endif; ?>

			<?php if ( '' !== $heading ) : ?>
				<h1 id="<?php echo esc_attr( $title_id ); ?>" class="saz-home-hero__heading">
					<?php echo esc_html( $heading_before ); ?>
					<?php if ( '' !== $heading_highlight ) : ?><span class="saz-home-hero__highlight"><?php echo esc_html( $heading_highlight ); ?></span><?php endif; ?>
					<?php echo esc_html( $heading_after ); ?>
				</h1>
			<?php endif; ?>

			<?php if ( '' !== trim( (string) $settings['description'] ) ) : ?>
				<p class="saz-home-hero__description"><?php echo esc_html( $settings['description'] ); ?></p>
			<?php endif; ?>

			<div class="saz-home-hero__actions">
				<?php if ( '' !== $primary_label && '' !== $primary_url ) : ?>
					<a class="saz-hero-button saz-hero-button--primary" href="<?php echo esc_url( $primary_url ); ?>"<?php if ( ! empty( $settings['primary_target'] ) ) : ?> target="<?php echo esc_attr( $settings['primary_target'] ); ?>" rel="<?php echo esc_attr( $settings['primary_rel'] ); ?>"<?php endif; ?>>
						<span><?php echo esc_html( $primary_label ); ?></span>
						<?php echo Homepage_Hero::get_icon_markup( 'chevron' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG from the plugin icon map. ?>
					</a>
				<?php endif; ?>
				<?php if ( '' !== $secondary_label ) : ?>
					<a class="saz-hero-button saz-hero-button--secondary" href="<?php echo esc_url( $secondary_url ); ?>"<?php if ( $show_guide ) : ?> data-saz-guide-open="<?php echo esc_attr( $guide_id ); ?>" aria-haspopup="dialog"<?php elseif ( ! empty( $settings['secondary_target'] ) ) : ?> target="<?php echo esc_attr( $settings['secondary_target'] ); ?>" rel="<?php echo esc_attr( $settings['secondary_rel'] ); ?>"<?php endif; ?>>
						<?php echo Homepage_Hero::get_icon_markup( 'book' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG from the plugin icon map. ?>
						<span><?php echo esc_html( $secondary_label ); ?></span>
					</a>
				<?php endif; ?>
			</div>

			<?php if ( ! empty( $benefits ) ) : ?>
				<ul class="saz-home-hero__benefits" aria-label="<?php esc_attr_e( 'مزایای فروشگاه', 'sasan-Zare-core' ); ?>">
					<?php foreach ( $benefits as $benefit ) : ?>
						<?php
						$benefit_title       = isset( $benefit['title'] ) ? trim( (string) $benefit['title'] ) : '';
						$benefit_description = isset( $benefit['description'] ) ? trim( (string) $benefit['description'] ) : '';
						$benefit_icon        = isset( $benefit['icon'] ) ? (string) $benefit['icon'] : 'truck';
						if ( '' === $benefit_title && '' === $benefit_description ) {
							continue;
						}
						?>
						<li class="saz-home-hero__benefit">
							<span class="saz-home-hero__benefit-icon"><?php echo Homepage_Hero::get_icon_markup( $benefit_icon ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG from the plugin icon map. ?></span>
							<span class="saz-home-hero__benefit-copy">
								<?php if ( '' !== $benefit_title ) : ?><strong><?php echo esc_html( $benefit_title ); ?></strong><?php endif; ?>
								<?php if ( '' !== $benefit_description ) : ?><span><?php echo esc_html( $benefit_description ); ?></span><?php endif; ?>
							</span>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>

		<div class="saz-home-hero__visual" style="--saz-hero-image-position: <?php echo esc_attr( (string) $image_position_y ); ?>%;">
			<?php if ( '' !== trim( (string) $settings['scene_caption'] ) ) : ?><p class="saz-home-hero__manifesto" lang="en" dir="ltr" aria-hidden="true"><?php echo nl2br( esc_html( $settings['scene_caption'] ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped text with generated line breaks. ?><span></span></p><?php endif; ?>

			<article class="saz-product-card" aria-label="<?php esc_attr_e( 'محصول منتخب عینک', 'sasan-Zare-core' ); ?>">
				<div class="saz-product-card__top">
					<?php if ( $product && '' !== $product_image ) : ?>
						<a class="saz-product-card__image-link" href="<?php echo esc_url( $product->get_permalink() ); ?>" aria-label="<?php echo esc_attr( $product->get_name() ); ?>">
							<?php echo $product_image; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Responsive markup generated by WordPress attachment APIs. ?>
						</a>
					<?php elseif ( $product ) : ?>
						<div class="saz-product-card__placeholder" aria-hidden="true"><?php echo Homepage_Hero::get_icon_markup( 'glasses' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG. ?></div>
					<?php else : ?>
						<div class="saz-product-card__editorial-image">
							<?php echo $editorial_image_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped renderer/WordPress attachment markup. ?>
						</div>
					<?php endif; ?>
					<button class="saz-product-card__wishlist" type="button" disabled aria-label="<?php esc_attr_e( 'فهرست علاقه‌مندی‌ها در حال حاضر در دسترس نیست', 'sasan-Zare-core' ); ?>" title="<?php esc_attr_e( 'فهرست علاقه‌مندی‌ها در حال حاضر در دسترس نیست', 'sasan-Zare-core' ); ?>">
						<?php echo Homepage_Hero::get_icon_markup( 'heart' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG from the plugin icon map. ?>
					</button>
				</div>

				<?php if ( $product ) : ?>
					<p class="saz-product-card__eyebrow"><?php esc_html_e( 'فریم منتخب', 'sasan-Zare-core' ); ?></p>
					<h2 class="saz-product-card__title saz-safe-text"><a href="<?php echo esc_url( $product->get_permalink() ); ?>"><bdi dir="auto"><?php echo esc_html( $product->get_name() ); ?></bdi></a></h2>
					<?php if ( '' !== (string) $product->get_sku() ) : ?><p class="saz-product-card__sku"><bdi dir="auto"><?php echo esc_html( $product->get_sku() ); ?></bdi></p><?php endif; ?>
					<?php if ( '' !== $product_price ) : ?><div class="saz-product-card__price"><?php echo wp_kses_post( $product_price ); ?></div><?php endif; ?>
				<?php else : ?>
					<?php if ( '' !== trim( (string) $settings['editorial_title'] ) ) : ?><h2 class="saz-product-card__title"><?php echo esc_html( $settings['editorial_title'] ); ?></h2><?php endif; ?>
					<?php if ( '' !== trim( (string) $settings['editorial_sku'] ) ) : ?><p class="saz-product-card__sku" dir="auto"><?php echo esc_html( $settings['editorial_sku'] ); ?></p><?php endif; ?>
					<?php if ( '' !== trim( (string) $settings['editorial_link_label'] ) ) : ?><a class="saz-product-card__collection" href="<?php echo esc_url( $editorial_url ); ?>"<?php if ( ! empty( $settings['editorial_target'] ) ) : ?> target="<?php echo esc_attr( $settings['editorial_target'] ); ?>" rel="<?php echo esc_attr( $settings['editorial_rel'] ); ?>"<?php endif; ?>><?php echo esc_html( $settings['editorial_link_label'] ); ?></a><?php endif; ?>
					<p class="saz-product-card__editorial-note"><?php esc_html_e( 'پیشنهاد استایل', 'sasan-Zare-core' ); ?></p>
				<?php endif; ?>
				<?php if ( ! $product ) : ?><div class="saz-product-card__swatches" aria-hidden="true"><span></span><span></span><span></span></div><?php endif; ?>
			</article>
		</div>
	</div>
	<?php if ( $show_guide ) : ?>
		<dialog id="<?php echo esc_attr( $guide_id ); ?>" class="saz-frame-guide" aria-labelledby="<?php echo esc_attr( $guide_id . '-title' ); ?>">
			<button type="button" class="saz-frame-guide__close" data-saz-guide-close aria-label="<?php esc_attr_e( 'بستن راهنمای انتخاب فریم', 'sasan-Zare-core' ); ?>">×</button>
			<?php if ( '' !== trim( (string) $settings['guide_eyebrow'] ) ) : ?><p class="saz-frame-guide__eyebrow"><?php echo esc_html( $settings['guide_eyebrow'] ); ?></p><?php endif; ?>
			<h2 id="<?php echo esc_attr( $guide_id . '-title' ); ?>"><?php echo esc_html( $secondary_label ); ?></h2>
			<ul>
				<?php foreach ( $settings['guide_items'] as $item ) : ?>
					<?php if ( ! is_array( $item ) ) { continue; } ?>
					<li><strong><?php echo esc_html( $item['title'] ?? '' ); ?></strong><p><?php echo esc_html( $item['description'] ?? '' ); ?></p></li>
				<?php endforeach; ?>
			</ul>
			<a class="saz-hero-button saz-hero-button--primary" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary_label ); ?></a>
		</dialog>
	<?php endif; ?>
</section>
