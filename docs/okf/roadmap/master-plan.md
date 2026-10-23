---
type: Project Roadmap
title: Sasan Zare Full-Site Master Plan
description: Phased plan for a dynamic Persian Elementor Pro and WooCommerce eyewear storefront.
tags:
  - roadmap
  - architecture
  - elementor
  - woocommerce
  - liquid-glass
status: active
---

# Purpose

The project is moving from a verified dynamic Header + Hero to a complete storefront. The roadmap defines the required routes, source-of-truth layers, native Elementor/WooCommerce-first implementation rule, Liquid Glass material constraints, and acceptance gates for each phase.

## Current status

The Header + Hero milestone is complete for normal manual use. Phase 1 is also complete for the local requirements/content slice: the primary menu, Persian content/legal pages, editorial posts, WooCommerce product attributes, P0 content matrix and missing-owner-input checklist are recorded in [`../requirements/p1-content-contract.md`](../requirements/p1-content-contract.md). Homepage `خانه` #38 contains the `Eyewear Hero`; Pro Header `هدر اصلی دیدآرا` #68 is published with an Entire Site condition and reads the assigned WordPress menu; saved template #47 remains the fallback. Elementor archive/single templates, payment, shipping and final legal approval remain later-phase work.

## Delivery contract

- Use WordPress content, WooCommerce data, Elementor Site Settings/Theme Builder, and project-owned theme/plugin code as separate source-of-truth layers.
- Prefer native Elementor Pro WooCommerce widgets, Loop Builder, dynamic tags, and Theme Builder conditions. Add custom project widgets only for a proven gap.
- Keep the Warm Optical Liquid Glass system, Persian RTL typography, accessible focus/keyboard behavior, reduced-motion/transparency fallbacks, and measured refraction rules.
- Prove dynamic behavior with real content edits and normal public/preview routes. A standalone Elementor editor iframe is not persistence proof.
- Preserve unrelated working-tree changes and never edit Core, third-party plugin source, uploads, secrets, or local machine configuration.

## Phase sequence

P0 baseline and safety → P1 requirements/content contract → P2 WooCommerce data foundation → P3 Elementor global design settings → P4 global chrome → P5 complete homepage → P6 core content pages → P7 blog/search/404 → P8 shop and archives → P9 single product → P10 cart/checkout/account → P11 custom widgets only where needed → P12 RTL/responsive/accessibility QA → P13 performance → P14 SEO compatibility → P15 security/code quality → P16 export/install package → P17 final release QA.

See [`docs/MASTER_ROADMAP.md`](../../MASTER_ROADMAP.md) for the full route matrix, phase deliverables, acceptance gates, risks, and the GPT-6 Luna high-reasoning execution prompt.
