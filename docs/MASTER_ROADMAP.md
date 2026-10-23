# Sasan Zare Full-Site Master Plan

**Status:** Execution plan for the full Elementor Pro + WooCommerce storefront
**Date:** 2026-10-23
**Design profile:** Luxury Commerce · Variance 6 · Motion 5 · Density 4
**Primary language:** Persian RTL, with isolated Latin model/SKU values
**Visual system:** Warm Optical Liquid Glass / Optical Iris

This document turns the approved Header + Hero foundation into a complete, dynamic storefront plan. It is a delivery contract for the next phases; it does not claim that the phases below have already been implemented.

## 1. Verified baseline

- The repository root is `/opt/lampp/htdocs/dashboard/sunglass`.
- The project-owned source is the classic PHP theme `wp-content/themes/sasan-zare/` and the companion plugin `wp-content/plugins/sasan-zare-core/`.
- Elementor Pro and Elementor Core 4.2.3 are active locally; WooCommerce 11.2.1 and Sasan Zare Core are active. The installed Pro source exposes WooCommerce archive, product, cart, checkout, My Account, menu-cart, Loop Builder, Theme Builder conditions, and dynamic-tag modules.
- Homepage `خانه` #38 is the published static front page with one `Eyewear Hero`. Pro Header `هدر اصلی دیدآرا` #68 is published with an Entire Site condition. Saved template #47 remains the Elementor Free fallback.
- `Sasan Zare Header` is the project header widget. `Eyewear Hero` is the project hero widget. Both use real Elementor controls; the hero can read a selected WooCommerce product through public WooCommerce APIs.
- The current design tokens, IranSansX fonts, clean scene image, separate frame image, motion rules, RTL rules, and Optical Iris palette are already documented in `DESIGN.md`, `docs/LIQUID_GLASS_DESIGN_LANGUAGE_V2.md`, and `docs/EYEWEAR_LIQUID_GLASS_COLOR_PALETTE.md`.
- The current checkout/catalog data is local runtime data. Product names, prices, stock, images, legal copy, menus, and business promises must be treated as editable site data, not hard-coded design content.
- The working tree contains extensive pre-existing runtime, third-party, and documentation changes. Each phase must preserve unrelated changes and must not edit WordPress Core, Elementor/Pro source, WooCommerce source, uploads, `wp-config.php`, or the database except for an explicitly authorized safe UI/configuration action.

## 2. Product outcome

Deliver a complete Persian eyewear storefront whose visual language is continuous from the existing Header + Hero, while every shopper-facing value that can change is controlled through WordPress, Elementor, WooCommerce, menus, or documented project settings.

The finished site must provide:

1. A reusable Elementor Theme Builder system for global header, footer, announcements, menus, notices, product loops, archives, products, and commerce utility surfaces.
2. WooCommerce-native dynamic catalog, product, cart, checkout, and account behavior, including price, sale, stock, SKU, attributes, reviews, notices, totals, and cart fragments.
3. Responsive RTL pages that remain readable and operable at desktop, laptop, tablet, mobile, keyboard focus, 200% zoom, reduced motion, reduced transparency, and high contrast.
4. A controlled Liquid Glass material hierarchy: one focal refracted surface per viewport, clear/tinted utility surfaces, quiet text zones, stable geometry, adaptive opacity, and graceful blur/tint fallback.
5. A repeatable import/export and QA path so another installation can receive the project-owned theme/plugin, Elementor templates, global settings, menus, and demo content without importing secrets or local machine state.

## 3. Explicit boundaries

In scope: project-owned theme/plugin source, Elementor templates and global settings, WooCommerce configuration/content entered through normal WordPress UI, reusable dynamic components, responsive/RTL/accessibility/performance/SEO compatibility, and release documentation.

Out of scope unless separately authorized: editing WordPress Core or third-party plugin source, copying WooCommerce templates into the theme, direct order-table queries, a second design system, server/permalink rewrites, payment-gateway conversion changes, wishlist/compare functionality without an approved dependency, remote template-library imports, secrets, local paths in source, and publishing or pushing Git changes.

## 4. Dynamic architecture contract

### 4.1 Source-of-truth layers

| Layer | Owns | Examples |
| --- | --- | --- |
| WordPress core/content | Pages, posts, menus, media, site identity, reading settings | Home assignment, navigation labels, blog posts, legal pages |
| WooCommerce | Products, taxonomies, prices, stock, attributes, reviews, cart, checkout, account endpoints | Product title/image/price/SKU, related products, totals |
| Elementor Site Settings | Global colors, typography, button defaults, breakpoints, spacing conventions | Optical Iris globals, font choices, responsive defaults |
| Elementor Theme Builder | Global/header/footer/archive/single templates and display conditions | Entire Site header, Product Archive, Single Product, Search, 404 |
| Elementor page/template content | Editorial composition and page-specific copy/media | Home sections, About, Contact, Frame Guide |
| `sasan-zare` theme | Semantic fallback hierarchy, enqueueing, theme support, safe fallback markup | Fallback header/footer/content, RTL and base CSS |
| `sasan-zare-core` plugin | Reusable widgets, dynamic behavior, WooCommerce/Elementor integrations | Existing Header/Hero, only future widgets that native Elementor cannot provide |

### 4.2 Binding rules

- Bind product fields through Elementor WooCommerce widgets/dynamic tags or WooCommerce APIs: title, permalink, images, gallery, price, sale, stock, SKU, attributes, categories, rating, reviews, related/upsell/cross-sell products, and add-to-cart.
- Bind archives through the current query and Elementor archive/loop widgets. Do not duplicate product queries in templates when a native widget or documented hook provides the data.
- Bind navigation through assigned WordPress menus; use the existing project header controls and theme fallback when a menu is absent.
- Bind cart quantity, fragments, notices, totals, checkout fields, and account endpoints through WooCommerce. Keep HPOS compatibility and avoid direct order storage access.
- Keep editorial copy editable in Elementor or WordPress content. Never turn a reference image, screenshot, example price, stock count, or cart count into production data.
- Use project PHP/JS only for semantic behavior that survives a theme switch or cannot be expressed safely by native Elementor/WooCommerce. Every new custom control needs an escaping, fallback, accessibility, and persistence check.

### 4.3 Template priority and fallback

1. Published Elementor Pro Theme Builder template with an exact condition.
2. Published saved Elementor template selected through the existing theme fallback slot where applicable.
3. Project theme semantic fallback.
4. WordPress/WooCommerce native output.

No template may leave a route blank. A fallback must remain usable if Elementor is disabled, WooCommerce is unavailable, a product field is empty, a menu is unassigned, or a browser cannot render SVG refraction.

## 5. Page and route inventory

### 5.1 Required launch surfaces

| Route/surface | Elementor implementation | Dynamic data | Priority |
| --- | --- | --- | --- |
| Home | Static page + Elementor content; global Header/Footer | Hero settings, featured product, selected collections, categories, editorial sections, menus | P0 |
| Shop / all products | Product Archive or archive page with Products/Loop Grid | Current query, filters/sort, product loop, pagination, notices | P0 |
| Product category archive | Product Archive conditions by product category | Term name/description/image, current category products, counts | P0 |
| Single product | Single Product template | Gallery, title, SKU, price, sale, stock, attributes, variations, add-to-cart, tabs, reviews, related products | P0 |
| Cart | Cart widget/template + notices + mini-cart | Cart items, quantities, fragments, coupons, shipping estimate, totals | P0 |
| Checkout | Checkout widget/template + notices | Customer fields, shipping/billing, payment methods, order review, validation | P0 |
| My Account | My Account widget/template | Login/register, dashboard, orders, downloads, addresses, account details, logout | P0 |
| Search results | Search Results template | WordPress/WooCommerce query, result type, empty state | P0 |
| 404 | 404 Theme Builder template | Recovery navigation, shop CTA, search, recent/featured products | P0 |
| Blog index/archive | Archive template or Elementor archive page | Posts, categories, pagination, featured image, author/date | P1 |
| Blog single | Single Post template | Title, content, author/date, taxonomy, related posts, share links | P1 |
| About / brand story | Elementor page template | Editable story, values, team/atelier media, CTA | P1 |
| Contact / consultation | Elementor page + approved form integration | Contact details, hours, map/link, consultation form, success/error states | P1 |
| Frame guide / services | Elementor page or reusable guide template | Editable face-shape guidance, care, lens/service information | P1 |
| Shipping / returns / privacy / terms | WordPress pages, linked from footer and checkout | Legal/business copy maintained by site owner | P0 |

### 5.2 Optional surfaces requiring a separate decision

- Wishlist, compare, quick view, product swatches beyond WooCommerce attributes, live filtering, loyalty, subscriptions, booking, and WhatsApp/CRM integrations require an approved dependency or project-owned scope. Do not simulate them with static buttons.
- Brand directory and collection landing pages are valuable P1/P2 additions only after product taxonomy and collection ownership are agreed.
- Order tracking can be exposed through WooCommerce account/order flows or an approved extension; do not build a parallel order system.

## 6. Reusable template and component map

### Global chrome

- Header: existing `Sasan Zare Header`, Pro Theme Builder priority, menu/search/account/cart data, mobile dialog, visible focus.
- Announcement bar: optional tinted/opaque strip driven by a single editable setting or Elementor template; no permanent decorative glass layer.
- Footer: menus, shop/help/legal links, contact details, trust marks, newsletter/form integration if approved, social links, payment/shipping information only when configured.
- Utility surfaces: search overlay, mobile drawer, mini-cart, Woo notices, breadcrumb, skip link, loading/empty/error states.

### Commerce primitives

- Product loop card: prefer Elementor Loop Builder + WooCommerce dynamic tags. Add a project widget only when the card needs behavior unavailable in the native loop.
- Product gallery: native WooCommerce/Elementor product images with ratio-locked media, zoom/lightbox only where it remains performant.
- Price/status cluster: price, sale, stock, SKU, availability text; preserve IRR code and the approved تومان display convention.
- CTA group: add-to-cart, view details, checkout, continue shopping, account actions; all states need loading, disabled, success/error feedback.
- Filters/sort/pagination: use native query controls or an approved filter integration; never create fake filter controls that do not change the query.

### Editorial/content primitives

- Section shell, eyebrow, heading, rich text, media frame, glass callout, trust/benefit strip, collection rail, FAQ/accordion, testimonial/editorial card, guide dialog/page, contact panel, and empty state.
- Reuse existing tokens and semantic classes. Add project widgets only when the element has reusable data/behavior and a clear fallback.

## 7. Liquid Glass implementation contract

- Keep content primary. Use glass for header/navigation, hero/feature panels, controls, popovers, product cards, selected states, and commerce utility surfaces; keep long-form reading and dense product data calmer.
- Use the existing primitive → semantic → component token chain. Do not add a second token system or scatter raw colors in Elementor custom CSS.
- Preserve the Warm Porcelain canvas, Optical Black text, Iris primary, Mint support, and rare Champagne accent. Product photography remains the dominant visual anchor.
- Use regular glass for panels/bars, clear glass over rich media with a dimming/quiet text zone, and tinted glass for primary actions/selected/noisy surfaces. Avoid glass inside glass.
- For any future true refracted surface, use the Liquid Glass skill's measured inverse-lens map and per-surface SVG filter. Cache maps by shape/tuning; never regenerate on pointer movement. Use CSS blur/tint fallback when unsupported.
- Mark runnable surfaces with `data-lg-role="stage|focus|dock|rail"` when implementing measurable Liquid Glass surfaces. Verify geometry with real `getBoundingClientRect()` checks.
- Motion is local and interruptible: hover/press/focus/selection, short entrances, one restrained featured-card float. Respect `prefers-reduced-motion`, reduced transparency, increased contrast, touch, and keyboard use.

## 8. Execution phases and gates

Every phase uses the same loop: inspect current state → implement the smallest coherent slice → validate in normal Elementor preview/public route → update affected OKF/HANDOFF → stop at the gate. Recommended execution model: **GPT-6 Luna, high reasoning**, one phase objective at a time. A phase is not complete because source files exist; its acceptance gate must pass.

### P0 — Baseline, safety, and decision lock (current foundation)

**Outcome:** Preserve and freeze the verified Header + Hero baseline before adding routes.

- Reconfirm repository root, Git state, HANDOFF, OKF, mistakes log, active theme/plugin, Elementor assignments, WooCommerce status, and current backups.
- Record page/template IDs only as runtime notes; never hard-code them into source.
- Confirm no Core/third-party/upload/config edits are included in project-owned changes.

**Gate:** Home #38, Header #68, fallback #47, current design tokens, fonts, assets, and known editor-loading limits are documented. No broad cleanup or reset is allowed.

### P1 — Requirements, information architecture, and content contract

**Status:** Complete on 2026-10-23 for the local runtime content slice. The route/content contract and evidence are in [`docs/okf/requirements/p1-content-contract.md`](okf/requirements/p1-content-contract.md).

**Outcome:** Final sitemap, navigation labels, page ownership, product taxonomy, legal pages, and content checklist.

- Approve the route inventory above and mark required vs optional surfaces.
- Define product categories, attributes (frame type, gender/use, color, material, lens, brand), collection rules, and archive empty states.
- Define home content blocks and source for every field: Elementor, WordPress, WooCommerce, or approved integration.
- Identify missing copy, imagery, logo, legal text, contact data, shipping/returns policy, and real product media.

**Completed evidence:** The local site now has a primary WordPress menu, published About/Guide/Contact/Journal/Privacy/Returns/Shipping/Terms pages, two Persian editorial posts, five WooCommerce attributes assigned to the ten published products, and a Hero/Header binding to real routes and a real product. Missing owner inputs and later-template gaps remain listed in the OKF P1 contract.

**Gate:** Passed for requirements/content discovery. No new page or Hero field uses an invented price, supplier brand, address, phone number, payment promise or fixed delivery promise; the P0 content matrix exists and records every remaining owner input.

### P2 — Dynamic data model and WooCommerce foundation

**Outcome:** Stable product/catalog data that templates can consume.

- Audit the local catalog and normalize product titles, descriptions, short descriptions, images, SKUs, prices, sale windows, stock, taxonomies, attributes, shipping classes, and visibility.
- Confirm WooCommerce pages/endpoints, currency convention, tax/shipping/payment settings, notices, and account behavior through normal admin/frontend flows.
- Keep IRR internally and تومان display policy as documented; verify gateway amount conversion before any payment activation.
- Define the minimum product completeness rule before a product appears in featured/collection sections.

**Gate:** A real product edit changes the relevant archive/card/single-product outputs without template editing; cart totals and price formatting are observed on a normal frontend route.

### P3 — Elementor global configuration and design tokens

**Outcome:** One global visual system usable by every template.

- Set Elementor Global Colors and Fonts from the Optical Iris palette and local IranSansX families.
- Define content width, page gutters, spacing scale, radius hierarchy, button/input defaults, focus ring, breakpoints, and z-index/layer conventions.
- Establish regular/clear/tinted glass recipes and fallback states. Keep `theme.json` neutral and Elementor as the visual authoring layer.
- Create naming conventions for templates, globals, loops, and reusable parts.

**Gate:** A global color/font change is visible in at least Header, Hero, one product card, and one form without local overrides fighting it.

### P4 — Global Header, navigation, footer, and utility layer

**Outcome:** Site chrome is reusable and route-aware.

- Keep the existing dynamic Header widget and Pro Header assignment; refine only where cross-page requirements expose a gap.
- Build Footer and optional announcement bar with menus/site identity/contact/legal links.
- Add search, mobile drawer, mini-cart, Woo notices, breadcrumbs, skip link, focus return, and empty/error states as reusable parts.
- Define header variants only if a route needs a documented variant; avoid duplicate global headers.

**Gate:** Header/Footer render once on home, archive, product, cart, checkout, account, search, blog, and 404 routes; menu edits, logo edits, and cart changes appear dynamically.

### P5 — Homepage beyond the current Hero

**Outcome:** A complete conversion-oriented home page that follows the Hero's harmony.

Recommended sections, each with a defined dynamic source:

1. hero (existing, preserve);
2. featured/new product loop;
3. category or collection rail;
4. editorial brand/optical story block;
5. frame-fit/consultation guide;
6. trust/service strip using editable business claims;
7. selected brands or collection showcase when taxonomy exists;
8. testimonials/UGC only when real approved content exists;
9. blog/editorial teaser;
10. final shop/consultation CTA and global footer.

Use native Products/Categories/Loop widgets first. Keep one focal surface per viewport, ratio-lock media, and avoid turning every section into a floating glass card.

**Gate:** Home can be edited in Elementor, product/category changes flow into its dynamic sections, no invented commerce values appear, and desktop/tablet/mobile public routes pass layout checks.

### P6 — Core content pages

**Outcome:** About, Contact/Consultation, Frame Guide/Services, and legal pages form a coherent content layer.

- Build reusable page shells with calm clear glass and high-contrast reading surfaces.
- Add accessible form states and an approved form integration only after its storage/notification behavior is known.
- Link policies from Footer and checkout; keep legal text in WordPress pages, not CSS or PHP.

**Gate:** Content owners can edit copy/media without template code; forms have visible labels, success/error states, spam strategy, and a verified destination.

### P7 — Blog, search, archives, and 404

**Outcome:** Editorial discovery and failure routes are designed, dynamic, and recoverable.

- Build Blog Archive, Category/Tag archive as needed, Single Post, Search Results, and 404 templates.
- Use WordPress query context, pagination, featured images, dates/authors, related content, and honest empty states.
- Keep search results visually consistent with product archives while distinguishing post/product result types.

**Gate:** Published content changes archive/search output; empty search, empty archive, missing image, and 404 routes remain useful.

### P8 — Shop, category archives, filtering, and collection discovery

**Outcome:** Catalog browsing is production-ready.

- Build Product Archive and category archive conditions using Elementor Pro archive/loop widgets.
- Add sort, pagination, breadcrumbs, category image/description, product count, sale/stock states, and responsive grid/list rules.
- Choose filters only after confirming native capability or approving one compatible integration. Filter controls must change the actual query and have a mobile drawer.
- Add brand/collection landing pages only when taxonomy ownership and product assignment are ready.

**Gate:** Category, sale, out-of-stock, search, empty, pagination, and mobile filter states are observed with real WooCommerce data.

### P9 — Single Product and product storytelling

**Outcome:** A high-confidence dynamic product detail experience.

- Build gallery, title, price/sale, rating, SKU, stock, attributes/variations, add-to-cart, notices, shipping/returns summary, tabs/accordions, related/upsell/cross-sell, and reviews.
- Keep product media ratio-locked and product data sharp; use refracted glass only for a focal callout or CTA group.
- Verify variable product states, invalid selections, out-of-stock, sale expiry, review empty state, and add-to-cart feedback.

**Gate:** Editing one product's image/price/stock/attribute/review changes the public product route and connected loops; cart receives the correct item and quantity.

### P10 — Cart, Checkout, Account, and transactional states

**Outcome:** Commerce utility pages are usable, dynamic, and trustworthy.

- Build Cart, Checkout, Order Received, My Account dashboard/endpoints, login/register, lost password, and logout states through WooCommerce/Elementor widgets.
- Keep notices, coupon, shipping, payment, validation, loading, and failure states visible and localized.
- Test guest and authenticated paths, quantity changes, fragments, back navigation, refresh, and mobile keyboard/input behavior.

**Gate:** A real add-to-cart → cart → checkout → order/failed payment path is observed with the configured gateway state. If payment is not configured, stop at a clearly documented non-production checkout gate.

### P11 — Custom Elementor widgets and dynamic features

**Outcome:** Close only proven gaps in native Elementor/WooCommerce.

Potential project-owned components, in priority order:

- reusable Frame Guide/Consultation component based on the existing accessible guide;
- reusable Trust/Service strip if its data needs structured controls;
- reusable product/collection card only if Loop Builder cannot supply the required behavior;
- adaptive filter drawer or wishlist integration only after a dependency decision;
- dynamic tags or REST/AJAX endpoints only when a documented use case requires them.

Every custom widget must provide controls, dynamic tags where meaningful, escaping, responsive settings, keyboard states, fallback output, editor persistence proof, and PHP lint. Do not add a widget simply to wrap native Elementor markup.

**Gate:** Each component has a real use case, documented owner/data source, and a measurable fallback; no duplicated native widget behavior is introduced.

### P12 — Responsive, RTL, accessibility, and interaction QA

**Outcome:** The site works as a Persian RTL storefront, not a scaled desktop screenshot.

- Verify at wide desktop, laptop, tablet, 390px mobile, 200% zoom, keyboard-only, touch, reduced motion, reduced transparency, and high contrast.
- Check Persian/Latin/numeric order, price/discount/quantity wrapping, long product names, menu focus, dialog Escape/focus return, form errors, and visible focus rings.
- Check Liquid Glass surfaces against dark, bright, saturated, photographic, patterned, and high-frequency backgrounds. Confirm fallback is legible without SVG refraction.
- Measure collision-sensitive surfaces; no accidental horizontal scroll or layout shift.

**Gate:** Critical accessibility and interaction checks pass before polish is accepted. Visual fidelity never overrides readable text, stable controls, or keyboard operation.

### P13 — Performance and asset optimization

**Outcome:** Premium visuals remain responsive on normal devices.

- Optimize image dimensions/formats accepted by the actual local pipeline; reserve media space to prevent layout shift.
- Keep refraction/filter surfaces bounded; cache maps by shape; throttle adaptive sampling; pause expensive effects offscreen.
- Load scripts/styles only where needed; preserve jQuery when Elementor/WooCommerce declares it; do not dequeue dynamic WordPress global styles.
- Verify font loading, image loading, console errors, interaction latency, and route transitions.

**Gate:** No obvious CLS, broken lazy-loaded media, filter-induced stutter, or route-wide asset bloat. Report checks that cannot be measured in this environment.

### P14 — SEO and structured-data compatibility

**Outcome:** Templates preserve WordPress/WooCommerce semantics and are ready for an approved SEO layer.

- Keep one meaningful H1 per route, semantic landmarks, breadcrumbs, canonical/query behavior, indexability decisions, Open Graph image/content sources, and product structured-data compatibility.
- Do not duplicate schema generated by WooCommerce or an SEO plugin. Verify rendered HTML and metadata on real routes.

**Gate:** Product/archive/post metadata is coherent, no template strips required WooCommerce/SEO hooks, and no schema duplication is introduced.

### P15 — Security, code quality, and maintainability audit

**Outcome:** Project-owned changes are safe to maintain.

- Run PHP lint, `git diff --check`, focused source scans, escaping/nonce/capability review for any new endpoints, and dependency/provenance review.
- Confirm no secrets, credentials, local XAMPP paths, direct order queries, Core edits, copied templates, or unscoped global dequeues.
- Review template conditions, fallbacks, translation domains, RTL, HPOS compatibility, and editor save behavior.

**Gate:** All project-owned PHP passes lint; unresolved environment limits are written in HANDOFF and release notes rather than hidden.

### P16 — Demo content, export, and installation package

**Outcome:** A clean, repeatable site package can be installed without local runtime leakage.

- Prepare Elementor kit/templates/global settings export, menus, widgets, theme/plugin source, and documented WooCommerce setup.
- Separate demo content from real catalog/business data. Exclude Core, third-party plugins/themes, uploads, database dumps, `wp-config.php`, credentials, and machine-specific files.
- Document required plugin versions, activation order, import order, URL regeneration, cache regeneration, and rollback.

**Gate:** Import/export is tested in a disposable or approved staging environment and the resulting templates have correct conditions and dynamic bindings.

### P17 — Final release QA and handoff

**Outcome:** A reviewable, recoverable storefront release.

- Run the route matrix, responsive/RTL/accessibility matrix, commerce transaction matrix, Liquid Glass visual/geometry checks, performance checks, and security/source checks.
- Recheck live Elementor persistence through normal preview/public routes; do not use a standalone editor iframe as proof.
- Update README, AGENTS, HANDOFF, OKF concepts/log, installation notes, known issues, and rollback notes.
- Deliver a release report with exact files, commands, observed routes, screenshots where available, and unverified limits.

**Gate:** All P0 routes pass, remaining P1/P2 items have explicit status/owner, and the repository is left cleanly documented without broad staging, commit, push, or destructive cleanup.

## 9. Per-phase acceptance matrix

Every completed phase must answer these questions with evidence:

| Area | Required proof |
| --- | --- |
| Dynamic behavior | A real content/product/menu/settings edit changed the intended output without template code edits |
| Elementor persistence | Normal preview or published URL shows saved content; editor-only iframe is not used as sole proof |
| Commerce | WooCommerce APIs/widgets provide price, stock, cart, notices, totals, and account state |
| Liquid Glass | Material role, focal surface, quiet text zone, states, and fallback are intentional |
| Responsive/RTL | Desktop, tablet, mobile, long Persian/Latin content, no overflow |
| Accessibility | Semantics, keyboard focus, labels, Escape/focus return, contrast, reduced motion/transparency |
| Performance | Media dimensions, bounded effects, cache/throttle behavior, console and layout stability |
| Source safety | No Core/third-party edits, no secrets/local paths, no copied Woo templates, PHP lint |
| Documentation | HANDOFF and affected OKF docs match the actual state; mistakes log updated only for reusable lessons |

## 10. Operating rules for GPT-6 Luna phase execution

Use one narrow phase objective per run with the prompt pattern below:

```text
Continue the Sasan Zare storefront master plan at phase [PX].
Read AGENTS.md, HANDOFF.md, docs/okf/index.md, docs/MASTER_ROADMAP.md,
the relevant OKF concepts, DESIGN.md, and the current project mistakes log.
Inspect the real Elementor/WooCommerce state before editing.
Implement only the phase gate and preserve all unrelated changes.
Use native Elementor/WooCommerce first; add project code only for a proven gap.
Keep the Warm Optical Liquid Glass system, RTL, accessibility, and dynamic data rules.
Validate through the normal public/preview route and focused source checks.
Update HANDOFF and affected OKF documents before stopping.
Report exact changes, tests, observed limitations, and the next gate in Persian.
```

The model should stop at the phase gate, save a HANDOFF checkpoint, and continue in a later run. Do not start a dependent phase while its prerequisite data, template condition, or acceptance evidence is missing.

## 11. Risks and decision points

- **Elementor editor instability:** manual editor loading currently works but automated cold reloads can stall. Treat normal preview/public rendering and saved metadata as the persistence proof; do not add speculative iframe watchdog code.
- **Provenance/licensing:** the installed Pro copy contains user-supplied modifications and remote-library limitations. Do not depend on remote templates; document the exact installed state before export.
- **Local media pipeline:** WebP processing is not available in the observed CLI environment. Optimize to formats the site can actually process and verify each upload in Media Library.
- **Payment conversion:** the IRR/toman display convention is documented, but gateway amount conversion remains a separate verification gate before production payments.
- **Filters/wishlist/forms:** do not promise behavior until a native capability or approved integration is identified and tested.
- **Runtime drift:** IDs, product data, menu assignments, plugin versions, and page conditions can change. Read them from the current site at each phase; do not hard-code observed IDs.

## 12. Current next step

The next authorized implementation slice is **P1: Requirements, information architecture, and content contract**. Its deliverable is a reviewed content matrix and route/condition map, not a new storefront page. After P1 passes, proceed to P2 data readiness, then P3 global Elementor settings before building the remaining homepage sections.
