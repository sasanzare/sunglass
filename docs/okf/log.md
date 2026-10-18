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
