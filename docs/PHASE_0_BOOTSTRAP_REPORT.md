# Phase 0 Bootstrap Report

## Status

**PARTIAL — source scaffolding, corrected theme activation, plugin activation, and basic frontend/WooCommerce checks are complete.** Project-local skills remain blocked by `.codex/` permissions, and the Elementor preview canvas did not load because an existing Persian page route returns 404.

## Detected Environment

- WordPress root: `/opt/lampp/htdocs/dashboard/sunglass`
- Operating system observed by the Codex shell: Linux. The local browser reaches the WordPress site at `http://localhost/dashboard/sunglass/`; the underlying host OS was not independently verified.
- WordPress: 7.1.3
- PHP CLI: 8.2.4 at `/opt/lampp/bin/php`
- MariaDB client: 10.4.28 distribution; the server is serving the site in the browser, but its server version was not queried.
- Node.js: 24.19.0 from the bundled Codex runtime. System `node`, `npm`, and `npx` are unavailable; bundled `pnpm` is 11.25.0.
- Git: bundled executable 2.53.0. The project root is not a Git repository; `.git/` is empty. Composer and WP-CLI are unavailable.
- WordPress site language: Persian (`fa_IR`); the admin interface is RTL. `WP_DEBUG` is `false`.
- Site timezone: UTC+03:30.
- Shell access to the local HTTP/database ports is restricted; the logged-in Chrome admin session remains available for site checks.

## WordPress Components

- Active theme before Phase 0 activation: Twenty Twenty-Five. Current active theme: Sasan Zara (`sasan-zare`).
- Elementor: 4.3.5, active.
- Elementor Pro: not installed or listed; Theme Builder Pro verification is deferred.
- WooCommerce: 11.2.1, activated through WordPress admin; the setup wizard opened and was left untouched.
- Sasan Zara Core: foundation plugin created and activated through WordPress admin.

## Skills

The official WordPress, specialized Elementor, Lonsdale supplemental, and official WooCommerce skills repositories were cloned under `/tmp/sasan-zara-bootstrap`. The official WordPress skill distribution was built and relevant skill names were inspected. Installation to `.codex/skills/` is blocked because the existing project `.codex/` directory has mode `555` and the official installer cannot create its `skills/` subdirectory. No permission was changed. User action requested: `chmod u+w /opt/lampp/htdocs/dashboard/sunglass/.codex`.

Selected official WordPress skills: `wordpress-router`, `wp-project-triage`, `wp-wpcli-and-ops`, `wp-performance`, `wp-phpstan`, `wp-env`, `wp-playground`, `wp-rest-api`, `wp-plugin-development`, and `wp-block-themes`.

Selected supplemental skills: full `wp-elementor-skill/` bundle; classic theme structure, template hierarchy, accessibility, assets, i18n, loop/template parts, navigation, WooCommerce theme support; Elementor deprecation guidance; and WooCommerce HPOS compatibility. The official WooCommerce repository currently offers extension-focused skills unrelated to this theme-only foundation, so none were selected.

## Files Created

- `AGENTS.md`
- `docs/MASTER_ROADMAP.md`
- `docs/PHASE_0_BOOTSTRAP_REPORT.md`
- `docs/okf/` project knowledge bundle
- `wp-content/themes/sasan-zare/` corrected and active classic theme
- `wp-content/plugins/sasan-zara-core/` companion plugin foundation

## Validation

- WordPress root markers (`wp-admin/`, `wp-content/`, `wp-includes/`, `wp-config.php`, `wp-load.php`) were present.
- WordPress version, active theme, active Elementor version, WooCommerce version/status, Persian site language, and RTL admin were observed in the local WordPress admin UI.
- PHP syntax passed for all 18 theme PHP files and 4 plugin PHP files. `theme.json` parsed as valid JSON.
- WordPress recognized and activated `sasan-zare`; the homepage rendered the fallback and retained the existing post. The admin remained accessible.
- Sasan Zara Core, Elementor 4.3.5, and WooCommerce 11.2.1 are active.
- WooCommerce shop, cart, and account routes loaded. Checkout redirected to the empty cart. The shop had no products and showed WooCommerce's "coming soon" visibility notice.
- The Elementor editor shell opened for an existing page marked as Elementor content, but its preview iframe remained blank because the page's Persian permalink returned the theme's 404 fallback. Elementor Pro is absent, so Theme Builder behavior is deferred.
- Plugin-absent behavior was reviewed in source but not runtime-tested.
- No WordPress Core or third-party plugin/theme source files were intentionally modified.

## Warnings and Blockers

- Project-local skills cannot be installed until `.codex/` is writable.
- The shell cannot reach the local HTTP/database service, though WordPress admin is available in Chrome.
- Elementor Pro is absent; Pro-only Theme Builder behavior cannot be validated.
- The active site is in WooCommerce "coming soon" visibility mode, and the store currently has no products.
- An existing published Persian page permalink returns the theme's 404 fallback. This prevents a live Elementor preview check; no permalink or site visibility setting was changed.
- At the user's correction, the theme slug and text domain are now `sasan-zare`; the public display name remains `Sasan Zara`, and companion plugin remains `sasan-zara-core`.
- The root is not a Git repository, so no branch, commit, or tracked working-tree state exists to report.
- The project-specific mistakes log at `/home/open/Desktop/All Projects/Mistakes/sunglass/mistakes.md` was reviewed and its fingerprint matches this root; it was not modified. That path is outside writable roots.

## Recommended Phase 1 Starting Point

After Phase 0 validation, audit current WordPress content, Elementor documents, WooCommerce configuration, and existing frontend requirements without changing page content. Record the verified page/template contracts before starting the design system.
