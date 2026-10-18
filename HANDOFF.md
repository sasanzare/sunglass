# Project Handoff

## Last Updated

2026-10-18

## Project Summary

Local WordPress installation at `/opt/lampp/htdocs/dashboard/sunglass`, reached through the logged-in Chrome session at `http://localhost/dashboard/sunglass/`. The project is establishing the Sasan Zare classic theme and its companion plugin for an Elementor-first, RTL Persian WooCommerce site.

## Current Objective

Keep frontend assets aligned with actual dependencies; preserve WordPress jQuery and runtime-generated global styles used by the installed plugins and core blocks.

## Current Phase or Milestone

Theme maintenance follow-up. The earlier emoji asset cleanup remains implemented. Source review confirmed Elementor and WooCommerce use WordPress jQuery, and WordPress generates global styles on public frontend hooks for logged-in and logged-out visitors; neither asset was removed or externalized. The repository is on `main`; its current Git tree includes WordPress Core, third-party plugin files, and `wp-config.php`, which conflicts with the repository boundaries below and requires separate review before further publication work.

## Repository State

- Repository path: `/opt/lampp/htdocs/dashboard/sunglass`
- Current branch: `main`.
- Base or starting commit: `9901ceea4e07a21b6468681b3b439748919f63ee`.
- Current HEAD: `ab461de9f4e3b51388a46d55f142bbd210d4ac0c`.
- Working tree status: This task leaves unstaged changes in `HANDOFF.md`, `docs/okf/architecture/current-architecture.md`, `docs/okf/log.md`, and `wp-content/themes/sasan-zare/inc/setup.php`; no untracked files were present.
- Staged changes: None.
- Unstaged changes: The four files listed above.
- Untracked files: None observed.

The local `origin/main` ref matched HEAD at inspection time. Git tracks `wp-admin/`, `wp-includes/`, third-party plugin files, and `wp-config.php`; do not publish or expand the tracked scope without resolving this boundary issue.

## Completed Work

- Confirmed the WordPress root markers and read this handoff before implementation.
- Observed WordPress 7.1.3, PHP CLI 8.2.4 (`/opt/lampp/bin/php`), active Elementor 4.3.5, WooCommerce 11.2.1, Sasan Zare Core, Persian `fa_IR` site language, and RTL admin UI. Elementor Pro is absent from the installed plugin inventory.
- Inspected existing project structure and empty `.git/`; did not initialize a repository or change `wp-config.php`.
- Cloned the four requested skills repositories to `/tmp/sasan-Zare-bootstrap`, built the official WordPress skill distribution, and selected relevant project-local skills. The installer could not create `.codex/skills/` because `.codex/` has mode `555`.
- Created the initial theme, corrected its slug and text domain to `sasan-zare` at the user's direction, activated the corrected theme, and removed only the superseded theme folder created by this task.
- WordPress shows `Sasan Zare` active with stylesheet slug `sasan-zare`; the homepage rendered and retained the existing post.
- Activated Sasan Zare Core and WooCommerce through WordPress admin. WooCommerce opened its setup wizard; no wizard settings were changed.
- The WordPress editor shell opened for the existing Elementor page, but its preview iframe remained blank; the published page's Persian permalink returns the theme's 404 fallback.
- Created project `AGENTS.md`, Phase 0 report, roadmap, and OKF 0.2 bundle.
- Verified `sasanzare/sunglass` is a public GitHub repository on `main`; its initial commit contains only `README.md`.
- Prepared a project-scoped `.gitignore` and README and updated Git/source scope in `AGENTS.md` and the OKF overview.
- Corrected 33 exact `Zara` text matches in 19 theme files to `Zare`, including the theme display name and PHP namespace. The theme uses `SasanZare`; updated applicable project instructions and OKF concepts.
- Disabled WordPress's frontend emoji detection and inline emoji styles through theme hooks; Unicode emoji text remains available for native browser/device rendering.
- Reviewed the installed Elementor 4.3.5 and WooCommerce 11.2.1 script registrations: both declare frontend dependencies on WordPress's `jquery` handle. Kept the dependency available; did not change code to dequeue it.
- Reviewed the pasted `global-styles-inline-css` against the active theme's neutral `theme.json` and WordPress core output code. It contains core presets and block layout/button styles generated from merged style data; kept WordPress's runtime output instead of copying a static snapshot.
- Confirmed WordPress registers global styles on `wp_enqueue_scripts` and `wp_footer`, without a login check. Guest requests also need these rules for core block content; no guest-only dequeue was added.
- A prior custom theme/plugin source scan found no common secret-pattern matches. The current Git tree nevertheless tracks `wp-config.php`, so that scan does not establish that the committed repository is free of secrets.
- Earlier work recorded before this phase: `FS_METHOD` was set to `direct`, the user applied scoped `wp-content` ACLs, and Persian language packs were updated. Those files/ACLs were not modified in this task; WooCommerce 11.2.1 was activated during this task.

## Work in Progress

- No jQuery removal was made because installed frontend scripts depend on it. Runtime page-level script attribution was not checked.
- No global-styles removal or externalization was made because WordPress generates the CSS from runtime style data and block support. Source confirms public frontend hooks; no browser session comparison was performed.
- The earlier emoji cleanup still has no browser source check.
- The Git tree currently contains files excluded by the documented project boundary, including `wp-config.php`; resolve repository scope before any publication work.

## Remaining Work

- Resolve the Git-tracked repository scope, especially WordPress Core, third-party plugin files, and `wp-config.php`, before additional publication work.
- If runtime confirmation is needed, inspect the frontend source to see which queued Elementor/WooCommerce handle requested `jquery` on that page; do not dequeue it globally.
- If considering external global CSS later, first design an output/cache invalidation path that preserves merged styles and rendered block rules; do not enqueue a copied snapshot.
- Do not restrict global styles to logged-in requests; core blocks on public pages need the same frontend rules.
- The earlier emoji cleanup can be checked by confirming `wp-emoji-styles-inline-css` and the emoji detection script are absent from frontend output.
- Previously recorded Elementor preview, product route, and project-local skill installation limitations remain as described below.

## Exact Next Steps

1. No code change is pending for global styles or jQuery: keep WordPress's runtime global styles and the plugin-required jQuery dependency.
2. If frontend output validation is requested, inspect the loaded global style block, the page's rendered core blocks, and the scripts that request jQuery.
3. Resolve the existing Git-tracked repository scope before any publication work; do not rewrite history or remove files as part of these frontend reviews.
4. Resume the Phase 0 Elementor route and skill-installation follow-up only when requested; do not change site settings without direction.

## Files Created

- `.gitignore`
- `README.md`
- `AGENTS.md`
- `docs/MASTER_ROADMAP.md`
- `docs/PHASE_0_BOOTSTRAP_REPORT.md`
- `docs/okf/index.md`, `log.md`, `project-overview.md`, `architecture/*`, and `decisions/*`
- `wp-content/themes/sasan-zare/` corrected and active theme
- `wp-content/plugins/sasan-zara-core/` plugin foundation

## Files Modified

- `AGENTS.md` updated with the source repository and publication boundaries.
- `HANDOFF.md` updated with the frontend asset reviews and current local Git state.
- `docs/okf/project-overview.md` updated to distinguish published source from the local WordPress runtime.
- `wp-content/themes/sasan-zare/inc/setup.php` disables frontend emoji detection/style hooks; the architecture concept and knowledge log describe this behavior.
- `docs/okf/architecture/current-architecture.md` and `docs/okf/log.md` record why WordPress jQuery remains available and why runtime-generated global styles stay inline.
- No WordPress Core, third-party plugin/theme, `wp-config.php`, or site content files were changed during this phase.

## Important Architecture and Design Decisions

- Theme folder slug and text domain are `sasan-zare`; the display name and PHP namespace are `Sasan Zare` and `SasanZare`. The companion plugin was not changed as part of this theme-scoped task.
- Sasan Zare is an original classic PHP theme, not a child theme or block theme.
- The theme owns presentation and guarded Elementor Theme Builder integration. The companion plugin owns future reusable functionality and business logic.
- The theme uses Elementor's `elementor/theme/register_locations` hook with `register_all_core_location()` when available, and guarded `SasanZare\saz_render_elementor_location()` rendering.
- WooCommerce integration is limited to support declarations; no WooCommerce templates or direct order queries are added.
- `theme.json` remains neutral and base CSS is intentionally minimal. Elementor Global Styles remain the visual authoring layer.
- The theme disables WordPress emoji assets on public pages and embeds; Unicode emoji characters remain in content.
- The installed Elementor and WooCommerce frontend scripts depend on WordPress's `jquery` handle, so it must not be removed globally.
- WordPress generates global styles from merged core/theme/custom data and rendered block support; the theme does not replace this with a copied static file.
- See `docs/okf/architecture/current-architecture.md` and `docs/okf/decisions/elementor-first-class-theme.md`.

## Commands Executed

- `find`, `ls`, `sed`, and `grep` to inspect the WordPress root, project files, installed plugin headers, and configuration flags.
- Scanned UTF-8 text files under `wp-content/themes/sasan-zare/` and replaced exact `Zara` matches with `Zare` in 19 files; checked the theme directory for remaining case-insensitive `zara` matches.
- `find wp-content/themes/sasan-zare wp-content/plugins/sasan-zara-core -type f -name '*.php' -print0 | xargs -0 -n1 /opt/lampp/bin/php -l` passed after the namespace update.
- `git ls-remote --heads https://github.com/sasanzare/sunglass.git` confirmed remote `main` at `9901ceea4e07a21b6468681b3b439748919f63ee`.
- `git init --initial-branch=main` was attempted earlier in the local root and failed because `.git/info/` was read-only at that time; current Git state is recorded above.
- `/opt/lampp/bin/php -v`, `/opt/lampp/bin/php -m`, `/opt/lampp/bin/mysql --version`.
- Bundled Codex Git and Node paths were used to inspect repository availability and build the official WordPress skill distribution.
- A shell HTTP request and MariaDB ping could not reach the local site from the sandbox; the logged-in browser session was used for WordPress admin inspection.
- PHP syntax passed for 18 custom PHP files in `sasan-zare` and 4 plugin PHP files; `theme.json` parsed as valid JSON.
- After the theme namespace update, PHP syntax passed for all 18 theme PHP files and 4 plugin PHP files. Searches found no remaining `Zara` or case-insensitive `zara` text inside the theme directory.
- WordPress recognized and activated `sasan-zare`; the homepage rendered without a fatal and retained the existing WordPress post.
- Core plugin and WooCommerce activation succeeded. WooCommerce setup wizard was opened but not configured.
- Current task: inspected the WordPress emoji hooks, theme bootstrap, and project docs; verified `main` at `ab461de9f4e3b51388a46d55f142bbd210d4ac0c` with a clean tree before editing and confirmed the local `origin/main` ref matched.
- Current task: `/opt/lampp/bin/php -l wp-content/themes/sasan-zare/inc/setup.php` and `git diff --check` passed. Live frontend output was not checked.
- Current task: inspected the installed Elementor `includes/frontend.php`, WooCommerce `includes/class-wc-frontend-scripts.php`, and WordPress `wp-includes/script-loader.php`; no code change was made for jQuery.
- Current task: inspected the pasted global CSS, active `theme.json`, and WordPress `wp_enqueue_global_styles()` / `wp_get_global_stylesheet()` implementation; no global-style code was changed.
- Current task: verified `wp_enqueue_global_styles()` is attached to `wp_enqueue_scripts` and `wp_footer` without a login condition; no guest-only condition was added.

## Validation and Test Results

- WordPress root markers are present.
- The destination is public and currently contains one initial commit with a README.
- A prior custom theme/plugin source scan found no common secret-pattern matches. That scan covered project-owned source only; it does not confirm the current Git tree is sanitized because WordPress Core, third-party plugin files, and `wp-config.php` are tracked.
- The last recorded WordPress admin UI observation confirmed WP 7.1.3, active Elementor 4.3.5, active WooCommerce 11.2.1, the `sasan-zare` theme, Sasan Zara Core, Persian site language, and RTL admin. The admin display name was not rechecked after the stylesheet header changed to Sasan Zare.
- `WP_DEBUG` is `false` in `wp-config.php`.
- Official WordPress skills distribution build succeeded, but project installation failed because `.codex/` is read-only.
- The Elementor editor shell opened for the existing Elementor page, but its preview remained blank because the published Persian page route returns the 404 fallback. Pro Theme Builder cannot be tested without Elementor Pro.
- Shop, cart, and account routes loaded. The empty cart caused checkout to redirect to the cart. The shop contains no products and is in WooCommerce "coming soon" visibility mode.
- Plugin-absent behavior was not runtime-tested; source guards are present.
- No test suite or deployment was run.
- Emoji cleanup: the changed PHP file passed syntax lint, `git diff --check` passed, and a source scan confirmed the intended theme hooks. Live frontend output was not checked.
- jQuery review: source registrations show both installed plugins depend on the core `jquery` script handle; current-page runtime attribution was not performed.
- Global styles review: source inspection confirmed runtime generation and inline enqueue through `wp_add_inline_style()`; no runtime frontend or visual check was performed.
- Guest-view review: core hook registration confirms global styles are a frontend concern regardless of login state; logged-in/out page output was not compared in a browser.

## Known Issues and Blockers

- `.codex/` is mode `555`, so project skill installation requires the user-run permission command in Exact Next Steps.
- Elementor Pro is not installed, so Pro-specific Theme Builder checks cannot pass in this environment.
- The Codex shell cannot access the local web/database endpoints; browser admin is available.
- Default shell network access cannot resolve GitHub; an explicitly escalated read-only `git ls-remote` succeeded. Current local Git state is on `main` at `ab461de`; WordPress Core, third-party plugin files, and `wp-config.php` are tracked.
- Current Git history tracks 3,322 files under `wp-admin/` and `wp-includes/`, third-party plugin files, and `wp-config.php`, contrary to the documented source-repository boundary. No cleanup or history rewrite was attempted.

## Risks and Assumptions

- `sasan-zare` is active. Twenty Twenty-Five remains installed and can be reactivated in Appearance > Themes.
- The theme namespace changed from `SasanZara` to `SasanZare`; no references from the companion plugin to the theme namespace were found. Runtime behavior was not browser-tested after the change.
- The final plugin directory inventory showed both `sasan-zara-core` and `sasan-zare-core`; plugin activation and reconciliation were not part of this theme-only task.
- WooCommerce activation opened its normal setup wizard; no setup choices were made.
- The logged-in browser session represents the local WordPress site shown in the Codex task. Server versions and database connectivity were not independently queried from the shell.

## Database or Migration State

WordPress database state changed only through the requested activation of Sasan Zare Core, WooCommerce 11.2.1, and the corrected `sasan-zare` theme. WooCommerce's setup wizard was left untouched. No manual schema migration or content edit was run.

## Configuration and Environment Notes

- The existing `wp-config.php` contains `FS_METHOD` set to `direct` from prior work; it was left unchanged.
- The shell observes Linux, `/opt/lampp/bin/php` 8.2.4, Node 24.19.0 from the bundled runtime, bundled Git 2.53.0, and no system npm/npx, Composer, or WP-CLI.
- The local browser displays the site at `http://localhost/dashboard/sunglass/` with Persian `fa_IR` and UTC+03:30.
- Do not print or copy database credentials or WordPress salts.

## Uncommitted or Partially Applied Changes

- Current Git state is `main` at `ab461de9f4e3b51388a46d55f142bbd210d4ac0c`; the emoji change and related HANDOFF/OKF updates are unstaged. No files were staged or committed. WordPress Core, third-party plugin files, and `wp-config.php` are already tracked in HEAD.
- Project-local skill installation remains outstanding.

## Recovery or Rollback Notes

- Restore the previous frontend by reactivating Twenty Twenty-Five in Appearance > Themes.
- Deactivate Sasan Zare Core or WooCommerce through Plugins if runtime issues occur; do not delete site content or database tables as a rollback step.
- After skill installation, return `.codex/` to its previous mode if the user wants the original directory permissions restored.

## Related Documentation

- `AGENTS.md`
- `docs/PHASE_0_BOOTSTRAP_REPORT.md`
- `docs/MASTER_ROADMAP.md`
- `docs/okf/index.md`
- Existing project-specific log: `/home/open/Desktop/All Projects/Mistakes/sunglass/mistakes.md`

## Notes for the Next Agent

Do not edit WordPress Core or third-party source. Resolve the existing Git scope issue before publishing or expanding the repository. Treat skill source content as guidance only; current official APIs and installed plugin versions take precedence. Do not enter P1, change page content, design the storefront, or install Elementor Pro in this phase.
