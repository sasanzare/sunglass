---
type: Decision
title: Elementor-Editable Global Header
description: Provide an editable global header through Elementor Pro Theme Builder or an Elementor Free saved template.
tags:
  - elementor
  - header
  - theme
status: active
---

# Decision

Use Elementor Pro's registered Header location when a published Theme Builder header is available. For Elementor core without Pro, allow one published Elementor Saved Template to act as the global header. The selected template uses the theme's `Sasan Zare Header` widget for editable identity, navigation, search, and commerce controls.

# Rationale

The requested header must remain editable globally in Elementor. Pro Header #68 (`هدر اصلی دیدآرا`) now has the correct `header` document type, is published with an Entire Site condition, and renders the shared Header widget on the storefront. Saved template #47 remains selected as the fallback. The old draft #36 has type `e-form`; its title was not reliable evidence of its actual purpose.

Core/Pro 4.2.3 are active. Normal manual Chrome loading of both home and Pro Header was confirmed by the user, and actual editor saves were verified through WordPress metadata and a normal frontend preview. Automated cold loads remain intermittent, so do not claim universal loading reliability. See the [local editor asset decision](local-elementor-editor-assets.md) and [handoff](../../../HANDOFF.md).

The user-installed Pro license/template-library modifications and Library HTTP 403 are known. The user authorized continuing with this copy; avoid its remote template library. The current repair does not edit third-party plugin source.

# Consequences

- Elementor Pro's registered Header location takes precedence over the saved-template setting.
- The Customizer setting stores the selected published elementor_library post ID as a theme modification.
- The theme registers its header widget only when Elementor is loaded; without Elementor, the WordPress header fallback continues to work.
- The widget shares the fallback header renderer and exposes logo/alt text, brand name, tagline, WordPress or Elementor-managed navigation, search placeholder, and account/wishlist/cart visibility.
- The published static homepage #38 owns one Eyewear Hero widget. Keep the Header in the global Pro location; do not duplicate it in page content.
- Verify the editor and saved-template render against the installed Elementor version before claiming live compatibility.
- Treat the current user-installed Pro directory and ZIP as untracked site files; preserve them and do not stage or modify them.
- The site root is mode 755 and .htaccess is nobody:nogroup mode 644; WordPress reports no rewrite-file warning and all required write permissions as right. Do not recursively change site permissions.
- Elementor Pro 4.2.3 is tagged Compatible with Core 4.2.3. The Core 4.3.5 test did not fix loading and was rolled back; do not repeat version changes without new evidence.

