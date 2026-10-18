---
type: Decision
title: Elementor-First Classic Theme and Separate Core Plugin
description: Use a minimal classic PHP theme for presentation and a companion plugin for reusable functionality.
tags:
  - architecture
  - elementor
  - theme
  - plugin
status: active
---

# Decision

Build Sasan Zare as an original classic PHP theme that delegates page and template presentation to Elementor wherever available, with small accessible WordPress fallbacks. Keep reusable functionality and business logic in the separate Sasan Zare Core plugin.

# Rationale

The project requires Elementor-editable layouts, minimal theme-side visual lock-in, WooCommerce compatibility, and functionality that can survive a theme switch. A thin theme integration layer preserves WordPress template behavior while avoiding a proprietary page builder or broad WooCommerce template overrides.

# Consequences

- Register Elementor core Theme Builder locations through the supported theme-location API and guard rendering when Elementor Pro is absent.
- Keep theme CSS and `theme.json` neutral so Elementor Global Styles remain authoritative.
- Keep WooCommerce integration to native theme support and APIs; do not duplicate WooCommerce templates during bootstrap.
- Keep widgets, dynamic tags, data/query features, and business rules in the companion plugin. The first production widget is `saz-eyewear-hero`, with its shared renderer also used by the theme's empty-homepage fallback.
- Validate editor and Theme Builder behavior against the installed versions before claiming compatibility.
