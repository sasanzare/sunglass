# Knowledge Bundle Update Log

## 2026-10-18

- **Initialization**: Created the Sasan Zara project knowledge bundle using OKF 0.2.
- **Documentation**: Recorded the Elementor-first classic theme and separate companion plugin architecture for Phase 0.
- **Correction**: Updated the theme folder slug and theme text domain to `sasan-zare` at the user's direction. The public display name and separate `sasan-zara-core` plugin slug remain unchanged; the corrected theme is active.
- **Theme naming**: Corrected the theme display name to Sasan Zare and its PHP namespace to `SasanZare`. The separate `sasan-zara-core` plugin keeps its existing name and `SasanZara\Core` namespace.
- **Status**: Activated Sasan Zara Core and WooCommerce. Confirmed the basic frontend and assigned WooCommerce routes; recorded the Elementor preview route limitation in the architecture document.
- **Theme behavior**: Disabled WordPress's frontend emoji detection and inline emoji styles through theme hooks; emoji characters remain Unicode text for native browser rendering.
- **Dependency review**: Confirmed the installed Elementor frontend and WooCommerce frontend scripts depend on WordPress's `jquery` handle. Kept jQuery enabled; global removal would break dependent features.
- **Global styles review**: Confirmed WordPress builds `global-styles-inline-css` from merged style data and block support at runtime. Kept core inline delivery rather than copying dynamic output into a static theme asset.
- **Frontend scope**: Confirmed core registers global styles on frontend hooks without a login check. The stylesheet is needed for public block content as well as logged-in frontend views; no guest-only dequeue was added.
- **First production UI slice**: Implemented the responsive WordPress fallback header and homepage hero using the supplied Liquid Glass v2 and Optical Iris palette. Added the `saz-eyewear-hero` Elementor widget, shared fallback renderer, WooCommerce-backed product card/cart count, and separate editorial media asset; live/editor verification limits are tracked in HANDOFF.md.
- **Initial browser verification**: The homepage hero and image rendered at a 1280px CSS viewport without horizontal overflow; cart count was 0 and no primary menu or featured product was configured. Elementor editor preview remained on its existing permalink 404/loading failure, and mobile interaction was not verified.
- **Typography integration**: Registered the supplied IranSansXFaNum weights for Persian UI text and IranSansX weights for Latin-only content. Browser `FontFaceSet` checks confirmed the required regular, semibold, and extra-bold faces load.
- **Project identity correction**: Current plugin source identifies the companion as Sasan Zare Core at `sasan-zare-core`, with the `SasanZare\Core` namespace. Earlier bootstrap log entries using Sasan Zara Core, `sasan-zara-core`, or `SasanZara\Core` do not describe the current checked-in plugin.

- **Reference composition**: Replaced the split hero treatment with a full-bleed UI-free scene, proportioned glass panel, reference wordmark/navigation fallback, separate transparent frame image, and an editorial product fallback without invented prices. Added a native frame guide while preserving custom Elementor URLs and dynamic WooCommerce details.
- **Responsive verification**: Inspected 1672px, 1280px, 820px, and 390px layouts, verified mobile menu and guide Escape/focus behavior, and checked loaded images/fonts and final frontend console output.
- **Scope clarification**: The user confirmed other pages are not built yet. Removed a temporary `.htaccess` introduced during link testing; no server/permalink changes remain. Keep subsequent work focused on the homepage Header + Hero.

- **Product card motion**: Added subtle idle floating, hover/focus lift, bounded mouse tilt, and a moving glass highlight in shared hero CSS/JS. Preserved reduced-motion/touch static presentation and original links. Live browser checks confirmed response and exit reset with no captured console errors.

- **Header/hero motion polish**: Added short staggered entrance, optical header/search feedback, CTA sheen/arrow movement, benefit icon feedback, and native modal entry using the existing stylesheets. Kept the photograph/panel stationary and gated decorative motion for reduced-motion/fine-hover contexts. Desktop and mobile browser checks passed; no server/data or dependency changes.

## 2026-10-19

- **Catalog seed and media format**: Added ten published WooCommerce products and two categories to the local database. The local media pipeline rejected WebP, so optimized JPEG product images were used; product records remain authoritative in WooCommerce and no storefront layout was changed.
- **Iranian currency convention**: Recorded the local pricing decision to retain WooCommerce's `IRR` code while displaying and entering toman values. Added a theme currency-symbol filter and documented the payment-gateway conversion caveat; no gateway integration was changed.
- **Portable design contract**: Added root DESIGN.md with the approved Warm Optical Liquid Glass style, self-contained tokens/recipes, reference geometry, asset and source map, typography/RTL, responsive behavior, motion limits, implementation sequence, acceptance checks, and a reusable task prompt. Linked it from project guidance and this bundle. Existing runtime files and configuration were not changed; no Luna execution or output quality guarantee is claimed.
