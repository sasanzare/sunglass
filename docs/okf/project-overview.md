---
type: Project Overview
title: Sasan Zara Project Overview
description: Scope and local environment for the Sasan Zare theme and Sasan Zara Core plugin.
tags:
  - wordpress
  - elementor
  - woocommerce
  - rtl
status: active
---

# Purpose

Sasan Zare is an original, Elementor-first classic WordPress theme foundation for a Persian RTL WooCommerce site. Sasan Zara Core is reserved for reusable integrations and business functionality that should survive a theme switch.

The project-owned source is published in the [sasanzare/sunglass repository](https://github.com/sasanzare/sunglass). That repository contains the custom theme, companion plugin, and project documentation; it is not a copy of the local WordPress runtime.

# Scope

The current milestone is Phase 0 infrastructure. It establishes theme/plugin bootstraps, minimal fallbacks, Elementor Theme Builder integration points, WooCommerce theme support, project rules, and documentation. Final store design, custom Elementor widgets, custom WooCommerce templates, and business features are not part of Phase 0.

# Observed Environment

- WordPress root: `/opt/lampp/htdocs/dashboard/sunglass`.
- WordPress 7.1.3; PHP CLI 8.2.4 at `/opt/lampp/bin/php`.
- Elementor 4.3.5 is active. Elementor Pro is not installed or listed in the local plugin inventory.
- WooCommerce 11.2.1 and Sasan Zara Core are active.
- The active theme is Sasan Zare with slug `sasan-zare`; Twenty Twenty-Five was active before Phase 0.
- Site language is Persian (`fa_IR`) and the admin is RTL.
- WooCommerce is in "coming soon" visibility mode; the shop currently contains no products.
- The existing Elementor sample page is marked as Elementor content in wp-admin, but its Persian public permalink currently returns the theme's 404 fallback, leaving the editor preview canvas blank.
- The Codex shell reports Linux. Shell access to the local HTTP/database ports is restricted; the WordPress site remains reachable from the logged-in browser.
- The local WordPress root has an empty, read-only `.git/` directory in this XAMPP environment; the project source repository is hosted separately on GitHub.

# Boundaries

- Theme: presentation, template hierarchy, theme support, Elementor locations, restrained fallback templates/assets, and basic WooCommerce theme support.
- Companion plugin: custom widgets, dynamic tags, business logic, REST/AJAX features, queries, and reusable WooCommerce functionality.
- Do not modify WordPress Core, third-party plugin/theme source, site content, or database data except explicitly requested safe theme/plugin activation.
- Do not publish WordPress Core, installed third-party plugins/themes, uploads, database exports, or local credentials with the project source.
- Use WordPress and WooCommerce APIs; do not query WooCommerce order tables directly.

See the [current architecture](architecture/current-architecture.md) and [foundation decision](decisions/elementor-first-class-theme.md).
