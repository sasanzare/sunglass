# Sasan Zare Project Instructions

## Purpose and Boundaries

This WordPress installation contains the original `sasan-zare` classic PHP theme and the `sasan-zare-core` companion plugin. The theme owns presentation, template fallbacks, editor/theme integration, and basic WooCommerce support. The plugin owns reusable functionality and business logic that must survive a theme switch. Phase 0 established the project foundation. The currently authorized production UI scope is the homepage Header + Hero, including only the shared design-system support and Elementor integration required for that section. Keep other storefront areas out of scope.

Do not edit WordPress Core, existing third-party themes or plugins, uploads, or site content. Do not add WooCommerce template overrides, direct order-table queries, secrets, local URLs, or XAMPP machine paths to theme/plugin source. Preserve the existing `wp-config.php` and database except for explicitly requested safe plugin/theme activation.

## Architecture Rules

- Keep this a classic PHP theme with `functions.php` as a loader and templates in the WordPress template hierarchy.
- Use the `SasanZare` namespace in the theme and retain `SasanZare\Core` in the companion plugin; use `saz_` PHP/hook prefixes, `saz-` CSS classes, and the `sasan-zare` theme text domain. Use `sasan-Zare-core` for plugin translations.
- Let Elementor own presentation through page content and Theme Builder locations. For Elementor Free, the saved-template header slot and `Sasan Zare Header` widget provide editable global header content; fall back to the semantic theme header when no template is selected.
- Keep the reference photo free of baked-in UI. The default editorial card must remain labeled as style inspiration; prices/cart counts come only from WooCommerce. Assigned menus and custom logos override reference fallbacks.
- Keep `theme.json` neutral. Elementor Global Styles and the editor own visual design.
- Use WooCommerce APIs and hooks, keep HPOS compatibility in mind, and do not copy WooCommerce templates without a demonstrated need.
- Escape output, use WordPress translation APIs, retain RTL support, and preserve keyboard-accessible landmarks and focus behavior.

## Skill Authority

1. Official WordPress documentation and `WordPress/agent-skills`
2. Official WooCommerce documentation and official WooCommerce skills
3. Elementor official developer documentation
4. Specialized `WordPress-Elementor-Skill`
5. Lonsdale supplemental skills
6. Existing project conventions

Current official APIs and the versions installed on this site take precedence over any conflicting community guidance.

## Commands and Validation

- PHP syntax: `find wp-content/themes/sasan-zare wp-content/plugins/sasan-zare-core -type f -name '*.php' -print0 | xargs -0 -n1 /opt/lampp/bin/php -l`
- Other storefront pages have not been designed yet. Their incomplete destinations do not authorize server, permalink, or database changes during homepage visual work.
- Check WordPress behavior through the local admin/frontend when the browser session is available. Do not claim editor, activation, or WooCommerce route checks unless actually observed.
- Verify Elementor persistence with the normal WordPress preview (`preview=true`) or the published URL. The editor-only `elementor-preview` iframe URL may be empty when opened alone. Confirm the actual template type and header assignment before relying on a template's title or a stale browser tab.
- For batch media uploads through WordPress, verify each expected attachment has completed in the Media Library before leaving the upload page; do not re-upload while the queue may still be active.
- No Composer, WP-CLI, npm, or npx command is installed in the shell observed for this project. PHP lint is the available source check; no automated test suite exists yet.
- Source repository: [sasanzare/sunglass](https://github.com/sasanzare/sunglass). Verify Git state at the actual repository root before making claims or changes.
- Keep the repository focused on project-owned theme/plugin source and documentation. Do not commit WordPress Core, installed third-party plugins/themes, uploads, database exports, `wp-config.php`, or credentials.

## Project Knowledge

- Read [HANDOFF.md](HANDOFF.md) before continuing work.
- Start with [the OKF bundle index](docs/okf/index.md); consult its architecture and decision documents for theme changes.
- For Iranian product pricing, retain WooCommerce's `IRR` code, display `تومان` through the theme's currency-symbol filter, and enter product prices in toman units. Payment-gateway amount conversion remains unverified; see [the currency decision](docs/okf/decisions/iranian-toman-display.md).
- Use [DESIGN.md](DESIGN.md) as the compact, standalone implementation profile with the current target image. It records the approved style, concrete recipes, motion, responsive rules, and a reusable task prompt; it does not authorize new pages or configuration work.
- For the authorized Header + Hero work, use [the Liquid Glass design language](docs/LIQUID_GLASS_DESIGN_LANGUAGE_V2.md), [the eyewear palette](docs/EYEWEAR_LIQUID_GLASS_COLOR_PALETTE.md), and the user-supplied visual reference. The hero copy is edited through the `Eyewear Hero` Elementor widget; the header can use an Elementor Pro Theme Builder header or an Elementor saved template containing `Sasan Zare Header`, selected under Appearance → Customize → Elementor Header.
- The Phase 0 report and phase roadmap are in `docs/PHASE_0_BOOTSTRAP_REPORT.md` and `docs/MASTER_ROADMAP.md`.
- Protect WordPress configuration, site data, and local credentials. Deployment and release preparation are outside Phase 0; use current official WordPress and WooCommerce guidance before those phases.
