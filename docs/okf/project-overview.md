---
type: Project Overview
title: Sasan Zare Project Overview
description: Scope and local environment for the Sasan Zare theme and Sasan Zare Core plugin.
tags:
  - wordpress
  - elementor
  - woocommerce
  - rtl
status: active
---

# Purpose

Sasan Zare is an original, Elementor-first classic WordPress theme for a Persian RTL WooCommerce site. Sasan Zare Core owns reusable Elementor integrations and business functionality that should survive a theme switch.

The project-owned source is published in the [sasanzare/sunglass repository](https://github.com/sasanzare/sunglass). That repository contains the custom theme, companion plugin, and project documentation; it is not a copy of the local WordPress runtime.

# Scope

Phase 0 established the theme/plugin bootstraps, minimal fallbacks, Elementor Theme Builder integration points, WooCommerce theme support, project rules, and documentation. The first production UI slice is now the homepage Header + Hero: a responsive WordPress-menu header and an Elementor-editable eyewear hero, with the scoped Liquid Glass tokens and WooCommerce product/cart integrations needed for that first viewport. The latest reference pass matches the supplied Premium Persian Eyewear Showcase composition using a clean full-bleed photo and independent HTML controls. A default editorial card avoids fabricated commerce data. Other storefront pages and custom WooCommerce templates remain out of scope.

The visual contract is documented in [Liquid Glass Design Language v2](../LIQUID_GLASS_DESIGN_LANGUAGE_V2.md) and the [Eyewear Store Color Palette](../EYEWEAR_LIQUID_GLASS_COLOR_PALETTE.md). These design files complement this OKF bundle and remain the UI source of truth.

# Observed Environment

- WordPress root: `/opt/lampp/htdocs/dashboard/sunglass`.
- WordPress 7.1.3; PHP CLI 8.2.4 at `/opt/lampp/bin/php`.
- Elementor 4.3.5 is active. Elementor Pro is not installed or listed in the local plugin inventory.
- WooCommerce 11.2.1 and Sasan Zare Core were observed active.
- The active theme is Sasan Zare with slug `sasan-zare`; Twenty Twenty-Five was active before Phase 0.
- Site language is Persian (`fa_IR`) and the admin is RTL.
- WooCommerce remains in "coming soon" visibility mode. The local catalog now contains ten published simple products across two categories; their generated models and proposed details/prices have not been verified against supplier inventory.
- WooCommerce currency code is `IRR`; the theme displays `تومان`, and catalog values are entered in tomans with zero decimal places. See the [Iranian Toman Price Display decision](decisions/iranian-toman-display.md).
- In the observed local setup, WordPress rejected WebP uploads because it could not process them. PHP GD lacks WebP read/write functions and Imagick is absent in the CLI check; compressed JPEG product images were accepted and resized by WordPress.
- An earlier Elementor sample-page preview failed on its pretty permalink. It has not been retested in the reference pass. The user confirmed other pages remain unbuilt; server/permalink changes are outside the homepage scope.
- The Codex shell reports Linux. Shell access to the local HTTP/database ports is restricted; the WordPress site remains reachable from the logged-in browser.
- The project source checkout is a Git repository at the local WordPress root. It contains project-owned source and documentation; local WordPress runtime files and site data are outside the intended repository scope.

# Boundaries

- Theme: presentation, template hierarchy, theme support, Elementor locations, restrained fallback templates/assets, and basic WooCommerce theme support.
- Companion plugin: custom widgets, dynamic tags, business logic, REST/AJAX features, queries, and reusable WooCommerce functionality.
- Do not modify WordPress Core, third-party plugin/theme source, site content, or database data except explicitly requested safe theme/plugin activation.
- Do not publish WordPress Core, installed third-party plugins/themes, uploads, database exports, or local credentials with the project source.
- Use WordPress and WooCommerce APIs; do not query WooCommerce order tables directly.

See the [current architecture](architecture/current-architecture.md) and [foundation decision](decisions/elementor-first-class-theme.md).
