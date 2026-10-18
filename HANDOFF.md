# Project Handoff

## Last Updated

2026-10-18

## Project Summary

Local WordPress installation at `/opt/lampp/htdocs/dashboard/sunglass`, reached through the logged-in Chrome session at `http://localhost/dashboard/sunglass/`. The project is establishing the Sasan Zare classic theme and its companion plugin for an Elementor-first, RTL Persian WooCommerce site.

## Current Objective

Publish the project-owned Sasan Zare theme, companion plugin, and project documentation to `https://github.com/sasanzare/sunglass`. Keep the public repository free of WordPress Core, third-party plugin/theme source, uploads, site/database data, and local credentials.

## Current Phase or Milestone

Preparing the first source publication. The public GitHub repository exists on `main` with an initial README commit. A sanitized repository scope, `.gitignore`, README, and source documentation updates are prepared. The local repository is on `main` at the initial commit, but its working tree contains a preexisting README modification and untracked WordPress installation files; use a temporary clone for scoped publication.

## Repository State

- Repository path: `/opt/lampp/htdocs/dashboard/sunglass`
- Current branch: `main`.
- Base or starting commit: `9901ceea4e07a21b6468681b3b439748919f63ee`.
- Current HEAD: `9901ceea4e07a21b6468681b3b439748919f63ee`.
- Working tree status: `README.md` is modified; project documentation, theme/plugin source, and local WordPress files are untracked. Do not stage the whole tree.
- Staged changes: None.
- Unstaged changes: `README.md` (31 insertions, 2 deletions in the observed diff).
- Untracked files: `AGENTS.md`, `HANDOFF.md`, `docs/`, `wp-content/`, WordPress Core files, `wp-config.php`, and other local installation files.

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
- The custom theme/plugin source scan found no common secret-pattern matches; `wp-config.php` and the seven local uploads are excluded from the public source package.
- Earlier work recorded before this phase: `FS_METHOD` was set to `direct`, the user applied scoped `wp-content` ACLs, and Persian language packs were updated. Those files/ACLs were not modified in this task; WooCommerce 11.2.1 was activated during this task.

## Work in Progress

- Importing project-owned theme/plugin source and documentation into the existing public GitHub repository through a temporary clone.
- Install selected skills after `.codex/` becomes writable.
- Diagnose why the published Persian sample-page permalink resolves to 404 and blocks Elementor's preview canvas. Do not change permalink or site visibility settings without user direction.

## Remaining Work

- Push the prepared source commit to public `main` and verify the resulting tree.
- Project-local skills are not yet installed.
- The `sasan-zare` theme, WooCommerce, Sasan Zara Core, and Elementor were active in the last recorded admin observation. The theme display name was later updated to Sasan Zare; the admin UI was not rechecked afterward.
- PHP syntax and theme JSON checks passed for the final theme and plugin.
- Theme frontend, WordPress admin, WooCommerce shop/cart/account, and checkout redirect were checked. Elementor preview canvas and product route remain unverified; no products are present in the shop.
- Temporary repository clones remain under `/tmp/sasan-Zare-bootstrap` until skills are installed.

## Exact Next Steps

1. Clone GitHub `main` to `/tmp/sunglass-github-publish`.
2. Copy only `.gitignore`, `README.md`, `AGENTS.md`, `HANDOFF.md`, `docs/`, `wp-content/themes/sasan-zare/`, and `wp-content/plugins/sasan-zara-core/` into that clone.
3. Review the staged file list and verify configuration, WordPress Core, third-party code, uploads, and site data are absent.
4. Commit and push the source import to `origin/main`, then verify the published commit and tree.
5. Resume the existing Phase 0 skill-installation and Elementor route follow-up only when that work is requested; do not change site settings during repository publication.

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
- `HANDOFF.md` updated with the repository publication objective and current GitHub/local Git state.
- `docs/okf/project-overview.md` updated to distinguish published source from the local WordPress runtime.
- No WordPress Core, third-party plugin/theme, `wp-config.php`, or site content files were changed during this phase.

## Important Architecture and Design Decisions

- Theme folder slug and text domain are `sasan-zare`; the display name and PHP namespace are `Sasan Zare` and `SasanZare`. The companion plugin was not changed as part of this theme-scoped task.
- Sasan Zare is an original classic PHP theme, not a child theme or block theme.
- The theme owns presentation and guarded Elementor Theme Builder integration. The companion plugin owns future reusable functionality and business logic.
- The theme uses Elementor's `elementor/theme/register_locations` hook with `register_all_core_location()` when available, and guarded `SasanZare\saz_render_elementor_location()` rendering.
- WooCommerce integration is limited to support declarations; no WooCommerce templates or direct order queries are added.
- `theme.json` remains neutral and base CSS is intentionally minimal. Elementor Global Styles remain the visual authoring layer.
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

## Validation and Test Results

- WordPress root markers are present.
- The destination is public and currently contains one initial commit with a README.
- The custom theme/plugin scan found no common secret-pattern matches. `wp-config.php`, WordPress Core, third-party plugins/themes, and uploads are excluded from the planned commit.
- The last recorded WordPress admin UI observation confirmed WP 7.1.3, active Elementor 4.3.5, active WooCommerce 11.2.1, the `sasan-zare` theme, Sasan Zara Core, Persian site language, and RTL admin. The admin display name was not rechecked after the stylesheet header changed to Sasan Zare.
- `WP_DEBUG` is `false` in `wp-config.php`.
- Official WordPress skills distribution build succeeded, but project installation failed because `.codex/` is read-only.
- The Elementor editor shell opened for the existing Elementor page, but its preview remained blank because the published Persian page route returns the 404 fallback. Pro Theme Builder cannot be tested without Elementor Pro.
- Shop, cart, and account routes loaded. The empty cart caused checkout to redirect to the cart. The shop contains no products and is in WooCommerce "coming soon" visibility mode.
- Plugin-absent behavior was not runtime-tested; source guards are present.
- No test suite or deployment was run.

## Known Issues and Blockers

- `.codex/` is mode `555`, so project skill installation requires the user-run permission command in Exact Next Steps.
- Elementor Pro is not installed, so Pro-specific Theme Builder checks cannot pass in this environment.
- The Codex shell cannot access the local web/database endpoints; browser admin is available.
- Default shell network access cannot resolve GitHub; an explicitly escalated read-only `git ls-remote` succeeded. Current local Git state is available on `main` at the initial commit, with broad untracked local content.

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

- Current Git state is `main` at `9901ceea4e07a21b6468681b3b439748919f63ee`, with no staged changes, the preexisting modified `README.md`, and broad untracked project and WordPress content. The theme and documentation edits are within those untracked paths; a temporary clone will carry the scoped publication.
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

The exact `chmod u+w` request is pending. Continue independent validation while waiting. Treat skill source content as guidance only; current official APIs and the installed plugin versions take precedence. Do not enter P1, change page content, design the storefront, install Elementor Pro, or modify third-party source in this phase.
