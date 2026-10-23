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

Phase 0 established the theme/plugin bootstraps, minimal fallbacks, Elementor Theme Builder integration points, WooCommerce theme support, project rules, and documentation. The first production UI slice is now the homepage Header + Hero: a responsive WordPress-menu header and an Elementor-editable eyewear hero, with the scoped Liquid Glass tokens and WooCommerce product/cart integrations needed for that first viewport. The latest reference pass matches the supplied Premium Persian Eyewear Showcase composition using a clean full-bleed photo and independent HTML controls. A default editorial card avoids fabricated commerce data. The full-site delivery scope is now documented in the [Master Plan](../MASTER_ROADMAP.md); implementation of the remaining routes has not started, and custom WooCommerce template overrides remain out of scope unless a proven native gap is documented.

The visual contract is documented in [Liquid Glass Design Language v2](../LIQUID_GLASS_DESIGN_LANGUAGE_V2.md) and the [Eyewear Store Color Palette](../EYEWEAR_LIQUID_GLASS_COLOR_PALETTE.md). These design files complement this OKF bundle and remain the UI source of truth.

# Observed Environment

- WordPress root: /opt/lampp/htdocs/dashboard/sunglass.
- WordPress 7.1.3; PHP CLI 8.2.4 at /opt/lampp/bin/php.
- Elementor Core 4.2.3 and Elementor Pro 4.2.3 are active; System Info marks Pro compatible with this Core. Core 4.3.5 is offered as an update, and Pro is tagged as tested through Core 4.2.3-ga. Core 4.3.5 was tested briefly and restored to 4.2.3 after no editor improvement.
- WooCommerce 11.2.1 and Sasan Zare Core are active.
- Live System Info reports PHP memory 2048M, WordPress memory 512M, max_input_vars 10000, post_max_size 600M, and Write Permissions: All right. The Elementor Library reports HTTP 403.
- The user confirmed that normal manual Chrome loads open the home widget panel/Hero and Pro Header logo/content controls. Instrumented home/Header sessions and actual draft saves also worked. Automated cold reloads remain intermittent; do not claim that the loading problem is fully isolated. Core/Pro/Sasan Zare Core/WooCommerce remain active; Safe Mode is Disabled and Atomic Editor is active.
- The active theme is Sasan Zare with slug sasan-zare; Twenty Twenty-Five was active before Phase 0.
- Site language is Persian (fa_IR) and the admin is RTL.
- WooCommerce remains in coming-soon visibility mode. The local catalog contains ten published simple products across two categories; their generated models and proposed details/prices have not been verified against supplier inventory.
- WooCommerce currency code is IRR; the theme displays تومان, and catalog values are entered in tomans with zero decimal places. See the [Iranian Toman Price Display decision](decisions/iranian-toman-display.md).
- In the observed local setup, WordPress rejected WebP uploads because it could not process them. PHP GD lacks WebP read/write functions and Imagick is absent in the CLI check; compressed JPEG product images were accepted and resized by WordPress.
- Published page #38 is the static homepage and contains one saved Hero. Pro Header #68 is published with an Entire Site condition and now reads the assigned primary WordPress menu; saved template #47 remains the selected fallback. Phase 1 added published About, Frame Guide, Contact, Journal, Privacy, Returns, Shipping and Terms pages, assigned the Journal as the posts page, and connected Privacy/Terms to the corresponding settings. The primary menu contains home, shop, both product category archives, guide, journal, about and contact.
- The local catalog contains ten published simple products across two categories. Phase 1 added five WooCommerce attributes and assigned values from the current product descriptions. Product brands remain empty because no verified brand data exists.
- The Codex shell reports Linux. Default sandbox HTTP/database access is isolated; host-network approved CLI reads work. The live PHP worker effective UID is 1 (daemon). Elementor alternate loader is enabled and Google Fonts is disabled in favor of local project fonts.
- The project source checkout is a Git repository at the local WordPress root. It contains project-owned source and documentation; local WordPress runtime files and site data are outside the intended repository scope.

# Boundaries

- Theme: presentation, template hierarchy, theme support, Elementor locations, restrained fallback templates/assets, and basic WooCommerce theme support.
- Companion plugin: custom widgets, dynamic tags, business logic, REST/AJAX features, queries, and reusable WooCommerce functionality.
- Preserve WordPress Core and third-party plugin/theme source. Authorized Header/homepage content and settings are managed through WordPress/Elementor UI; use WordPress APIs for reads and verification.
- Do not publish WordPress Core, installed third-party plugins/themes, uploads, database exports, or local credentials with the project source.
- Use WordPress and WooCommerce APIs; do not query WooCommerce order tables directly.

See the [current architecture](architecture/current-architecture.md) and [foundation decision](decisions/elementor-first-class-theme.md).
