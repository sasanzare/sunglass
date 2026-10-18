# Sasan Zare Project Instructions

## Purpose and Boundaries

This WordPress installation contains the original `sasan-zare` classic PHP theme and the `sasan-Zare-core` companion plugin. The theme owns presentation, template fallbacks, editor/theme integration, and basic WooCommerce support. The plugin owns reusable functionality and business logic that must survive a theme switch. Phase 0 is infrastructure only; do not add final storefront layouts or custom widgets yet.

Do not edit WordPress Core, existing third-party themes or plugins, uploads, or site content. Do not add WooCommerce template overrides, direct order-table queries, secrets, local URLs, or XAMPP machine paths to theme/plugin source. Preserve the existing `wp-config.php` and database except for explicitly requested safe plugin/theme activation.

## Architecture Rules

- Keep this a classic PHP theme with `functions.php` as a loader and templates in the WordPress template hierarchy.
- Use the `SasanZare` namespace in the theme and retain `SasanZare\Core` in the companion plugin; use `saz_` PHP/hook prefixes, `saz-` CSS classes, and the `sasan-zare` theme text domain. Use `sasan-Zare-core` for plugin translations.
- Let Elementor own presentation through page content and Theme Builder locations. Fall back to minimal semantic templates when Elementor or Elementor Pro is absent.
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

- PHP syntax: `find wp-content/themes/sasan-zare wp-content/plugins/sasan-Zare-core -type f -name '*.php' -print0 | xargs -0 -n1 /opt/lampp/bin/php -l`
- Check WordPress behavior through the local admin/frontend when the browser session is available. Do not claim editor, activation, or WooCommerce route checks unless actually observed.
- No Composer, WP-CLI, npm, or npx command is installed in the shell observed for this project. PHP lint is the available source check; no automated test suite exists yet.
- Source repository: [sasanzare/sunglass](https://github.com/sasanzare/sunglass). The local XAMPP installation may have an empty, read-only `.git` directory; verify Git state before relying on local Git commands.
- Keep the repository focused on project-owned theme/plugin source and documentation. Do not commit WordPress Core, installed third-party plugins/themes, uploads, database exports, `wp-config.php`, or credentials.

## Project Knowledge

- Read [HANDOFF.md](HANDOFF.md) before continuing work.
- Start with [the OKF bundle index](docs/okf/index.md); consult its architecture and decision documents for theme changes.
- The Phase 0 report and phase roadmap are in `docs/PHASE_0_BOOTSTRAP_REPORT.md` and `docs/MASTER_ROADMAP.md`.
- Protect WordPress configuration, site data, and local credentials. Deployment and release preparation are outside Phase 0; use current official WordPress and WooCommerce guidance before those phases.
