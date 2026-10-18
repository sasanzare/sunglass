---
type: Architecture
title: Current Sasan Zara Architecture
description: Classic PHP theme and companion plugin boundaries for the Phase 0 foundation.
tags:
  - architecture
  - theme
  - plugin
  - elementor
  - woocommerce
status: active
---

# Structure

`wp-content/themes/sasan-zare/` is the corrected original classic PHP theme. `functions.php` loads modular setup, asset, Elementor, WooCommerce, and helper files from `inc/`. Root template files follow the WordPress classic template hierarchy; shared fallback markup lives in `template-parts/`.

`wp-content/plugins/sasan-zara-core/` is a separate namespaced plugin bootstrap. It conditionally loads Elementor and WooCommerce integration modules only when the corresponding plugin is active. Phase 0 adds no widgets or business behavior.

The active theme slug is `sasan-zare`; the active companion plugin slug is `sasan-zara-core`.

# Elementor

The theme registers Elementor's core Theme Builder locations through `elementor/theme/register_locations` when the supplied manager supports `register_all_core_location()`. Templates call the guarded `SasanZare\saz_render_elementor_location()` helper and render a minimal fallback when no template handles the location. Elementor page content remains rendered through WordPress `the_content()`.

Elementor Pro is not installed in the observed plugin inventory, so Pro Theme Builder behavior is unverified. Elementor's editor shell opened, but the existing sample page preview stayed blank because its Persian permalink returned the 404 fallback. See the [foundation decision](../decisions/elementor-first-class-theme.md).

# WooCommerce

The theme declares WooCommerce and standard product-gallery support only when WooCommerce is loaded. It does not copy WooCommerce templates or access order storage directly. Future order-aware plugin behavior must use WooCommerce APIs and maintain HPOS compatibility. WooCommerce 11.2.1 is active; shop, cart, and account routes loaded in the admin browser, checkout redirected to the empty cart, and the store remains in "coming soon" mode.

# Presentation, RTL, and Accessibility

`theme.json` declares the current WordPress schema version without global visual styles. Elementor Global Styles remain the primary authoring layer. Base CSS is limited to box sizing, responsive media, overflow safety, and a visible-on-focus skip link. RTL layout uses direction-aware browser behavior and logical CSS properties; `rtl.css` has no physical-direction overrides.

The theme removes WordPress's frontend emoji detection script and emoji styles, including for embeds. Emoji characters remain Unicode text and are rendered by the browser and device fonts.

The installed Elementor 4.3.5 frontend modules and WooCommerce 11.2.1 scripts declare dependencies on WordPress's `jquery` handle. WordPress resolves that handle to `jquery-core` and `jquery-migrate`; do not dequeue these core handles globally. The dependency is included when a queued script requests it.

WordPress emits `global-styles-inline-css` from its merged core, theme, and custom style data, then adds styles for blocks during rendering. Core hooks this on the frontend through `wp_enqueue_scripts` and `wp_footer`; it is not limited to the dashboard or logged-in users. The generated CSS includes preset variables and core block layout/button rules. Keep this runtime output for public visitors too; a copied static stylesheet could become stale when styles or rendered blocks change.

Fallback templates include WordPress document hooks, semantic header/main/footer landmarks, an assigned primary menu when available, translation-ready labels, and an empty-content state.
