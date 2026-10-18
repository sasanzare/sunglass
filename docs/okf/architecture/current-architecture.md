---
type: Architecture
title: Current Sasan Zare Architecture
description: Classic PHP theme and companion plugin boundaries for the homepage Header + Hero implementation.
tags:
  - architecture
  - theme
  - plugin
  - elementor
  - woocommerce
status: active
---

# Structure

`wp-content/themes/sasan-zare/` is the original classic PHP theme. `functions.php` loads modular setup, asset, Elementor, WooCommerce, and helper files from `inc/`. Root template files follow the WordPress classic template hierarchy; shared fallback markup lives in `template-parts/`. `front-page.php` preserves existing page/post content and renders the shared hero on the latest-posts homepage or an empty static front page.

`wp-content/plugins/sasan-zare-core/` is a separate namespaced plugin bootstrap. It manually loads optional Elementor and WooCommerce integrations only when the corresponding plugin is active. Its shared `Homepage_Hero` renderer supplies the theme fallback and the `saz-eyewear-hero` Elementor widget.

The theme slug is `sasan-zare`; the companion plugin directory slug is `sasan-zare-core`. The plugin text domain remains `sasan-Zare-core`.

# Elementor

The theme registers Elementor's core Theme Builder locations through `elementor/theme/register_locations` when the supplied manager supports `register_all_core_location()`. Templates call the guarded namespaced location helper and render a minimal fallback when no template handles the location. Elementor page content remains rendered through WordPress `the_content()`.

The plugin registers the `saz-eyewear-hero` widget through `elementor/widgets/register`. Its controls cover hero copy/highlight, media/alt/focal point, CTA labels/URLs, a published-product selector, and a benefits repeater. The theme header remains editable through WordPress Custom Logo, site title/tagline, and the registered `primary` menu location. Without a primary menu, a presentation fallback links to home, the shop, product searches, an alphabetical catalog, and the posts query. Without a custom logo, the generic Persian store title receives the reference Didara wordmark; an explicitly configured name is preserved and the `saz_reference_brand_name` filter can override it. No site-identity database values are changed. Live Elementor editor rendering has not yet been independently verified.

Elementor Pro is not installed in the observed plugin inventory, so Pro Theme Builder behavior is unverified. An earlier editor preview failed on its pretty permalink; it has not been retested during the reference-match task. The user confirmed other storefront pages are not built yet and server/permalink work is outside this homepage task. See the [foundation decision](../decisions/elementor-first-class-theme.md).

# WooCommerce

The theme declares WooCommerce and standard product-gallery support only when WooCommerce is loaded. The header cart count and AJAX fragment use WooCommerce APIs; the hero widget selects a published product and reads its image, title, SKU, permalink, and formatted price through WooCommerce product objects. It does not copy WooCommerce templates or access order storage directly. Future order-aware plugin behavior must use WooCommerce APIs and maintain HPOS compatibility. WooCommerce 11.2.1 was previously observed active; live cart/product behavior for this widget has not yet been verified.

# Presentation, RTL, and Accessibility

`theme.json` declares the current WordPress schema version without global visual styles. Elementor Global Styles remain the primary authoring layer. The task-scoped eyewear tokens live in `assets/css/design-system.css` as primitive, semantic, and component values; `header.css` owns the WordPress fallback header. The plugin owns the shared hero view and its CSS. Base CSS retains box sizing, responsive media, overflow safety, and a visible-on-focus skip link. RTL layout uses direction-aware browser behavior and logical CSS properties; `rtl.css` has no physical-direction overrides.

Typography uses the locally supplied [IranSansX font files](../../../wp-content/themes/sasan-zare/assets/fonts/IranSans/). The theme declares the static 100–900 weights for both `IRANSansXFaNum` and `IRANSansX`, with `font-display: swap`. Persian UI text uses the FaNum family; English eyebrow, Latin product names, and SKU values use the regular-digit family. The homepage browser check confirmed the 400, 600, and 800 font faces resolve.

The theme removes WordPress's frontend emoji detection script and emoji styles, including for embeds. Emoji characters remain Unicode text and are rendered by the browser and device fonts.

The installed Elementor 4.3.5 frontend modules and WooCommerce 11.2.1 scripts declare dependencies on WordPress's `jquery` handle. WordPress resolves that handle to `jquery-core` and `jquery-migrate`; do not dequeue these core handles globally. The dependency is included when a queued script requests it.

WordPress emits `global-styles-inline-css` from its merged core, theme, and custom style data, then adds styles for blocks during rendering. Core hooks this on the frontend through `wp_enqueue_scripts` and `wp_footer`; it is not limited to the dashboard or logged-in users. The generated CSS includes preset variables and core block layout/button rules. Keep this runtime output for public visitors too; a copied static stylesheet could become stale when styles or rendered blocks change.

The fallback header uses a WordPress menu or the reference navigation fallback, dynamic custom logo/site identity, product search, account link, cart quantity, and a clearly unavailable wishlist state. On narrow screens, a native dialog provides navigation and account access. Mobile open/Escape/close and focus return were verified at a 390px viewport.

The reference hero is a full-bleed photographic scene with independently rendered glass panel, heading, actions, benefits, editorial card, and English decorative caption. `eyewear-scene-reference.jpg` is a clean 1672×941 photographic plate generated from the supplied reference with all interface elements removed. `eyewear-frame-reference.png` is a separate transparent optical-frame asset. The prior editorial photo remains untouched. Scene-specific colors remain centralized in the design-system tokens. CSS and the hero script use file modification versions for cache invalidation.

A real featured product still supplies its own name, image, SKU, price, and permalink through WooCommerce APIs. Without a selected product, the default card is labeled **پیشنهاد استایل** (style inspiration), shows the reference frame/model, and links to the catalog. It does not invent a sale price, inventory, or cart count. Decorative color samples appear only on this editorial fallback, not on real products.

For the Iranian store currency, WooCommerce keeps the `IRR` code while the theme displays its symbol as `تومان`; product price values are entered in toman units with zero decimal places. The [currency decision](../decisions/iranian-toman-display.md) records the payment-gateway compatibility caveat.

An empty secondary URL now opens an accessible native frame-selection guide. A supplied secondary URL retains the editor's destination/target behavior. The shared `homepage-hero.js` uses delegated clicks so frontend Elementor widget insertions can use the guide; the widget declares this script dependency. Guide open/Escape/focus return were browser-verified. Live Elementor editor rendering and actual featured-product selection remain unverified.

The scene was inspected at 1672px, 1280px, 820px, and 390px viewport widths without horizontal overflow. At desktop reference width, the heading stays on one line and the glass panel is approximately 612px tall. Browser checks confirmed both image assets load, fonts finish loading, and the final homepage has no captured warning/error console entries. Existing post content and footer remain below the hero.

# Product Card Motion

The shared hero CSS/JS adds a gentle 6-second idle float (5px), hover/focus lift (10px) and scale (1.025), pointer-driven tilt (±6° X, ±8° Y relative to the reference angle), and a soft highlight that follows the pointer. These effects are restricted to fine-pointer hover devices with `prefers-reduced-motion: no-preference`; touch/reduced-motion users retain the static card. Links keep their existing behavior and keyboard focus remains visible.

Pointer handlers are delegated for dynamically rendered Elementor cards. Initial bounds are cached to avoid moving-boundary feedback; requestAnimationFrame batches style updates. Exit, cancellation, blur, scrolling, resizing, and preference changes clear transient tilt/light properties. Browser verification confirmed hover response, changing tilt coordinates, and property reset after exit. Reduced-motion/touch conditions were verified in source, not device-emulated.

# Header and Hero Motion

The theme header CSS provides a brief 560ms arrival, optical logo/nav/action feedback, search focus glow, and 280ms native mobile-drawer entry. Disabled actions stay still. The plugin hero CSS staggers eyebrow, heading, description, actions, and benefits over 520ms with 60ms delay steps; the final group begins at 240ms. The photograph and main glass panel remain stationary. Backward-only animation fill avoids retaining hidden content or persistent animation transforms after completion. Header/action keyboard focus cancels the relevant entrance immediately.

The primary CTA adds a local glass sheen and directional arrow movement; the secondary button and benefit icons receive small hover feedback. The frame guide has a 280ms entry without delaying its native open state or close behavior. No new library, PHP/JS behavior, server setting, or content is involved. New motion is inside `prefers-reduced-motion: no-preference`; pointer-only feedback additionally requires fine hover, and reduced-motion rules remove decorative animations/transitions.

Desktop browser checks observed the stagger, focus/hover styles, and guide behavior. Mobile 390px checks confirmed drawer entry, Escape, focus return, and no horizontal overflow. Reduced-motion rules were reviewed in source; OS preference emulation was not performed.

# Standalone Design Contract

[DESIGN.md](../../../DESIGN.md) consolidates the approved visual/interaction profile into one portable brief to pair with a target image. Its header/hero values and source map were checked against current source. It distinguishes approved specimen behavior from defaults for future authorized pages, includes a ready-to-paste task prompt, and does not require the longer material/palette documents as attachments. It is documentation only; writing the brief does not change runtime behavior or certify GPT-6 Luna output.

# Scope Boundary

The user clarified that other storefront pages are not built yet. Navigation retains future destination URLs; completing those pages or changing server/permalink settings is outside the homepage task. A temporary root `.htaccess` created during link testing was removed after this clarification, returning the filesystem routing state to its baseline. No server/permalink changes remain.
