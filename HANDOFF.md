# Project Handoff

## Last Updated

2026-10-19

## Project Summary

Persian/RTL WordPress project with the classic `sasan-zare` theme and `sasan-zare-core` companion plugin. Elementor owns editable presentation; WooCommerce provides commerce data. The project knowledge layer is `docs/okf/`, version 0.2.

## Current Objective

Complete the local WooCommerce catalog with ten eyewear products, product photos, Persian copy, and toman-denominated prices. Keep storefront layout work out of scope. Apply the user's Iran/Fars and Toman requirements to store configuration.

## Current Phase or Milestone

Complete. Ten simple WooCommerce products (IDs 25–34) are published with Persian titles/descriptions, unique SKUs, toman prices, categories, featured JPEGs, and image alt text. The dashboard showed All (10) and Published (10). WooCommerce uses code `IRR`, the active theme displays `تومان`, decimal places are 0, and the base location is Iran — Fars; these values persisted after reload. WordPress rejected WebP because this PHP installation cannot process it, so optimized JPEGs were uploaded. Product/catalog work did not change storefront layout; the site remains in Coming Soon mode.

## Repository State

- Repository path: `/opt/lampp/htdocs/dashboard/sunglass`
- Current branch: `main`
- Base or starting commit: `bdd15b226d719f6e71554227bd1018042cb0c5f6`
- Current HEAD: `bdd15b226d719f6e71554227bd1018042cb0c5f6`
- Working tree status: Pre-existing unstaged/untracked source and documentation were preserved. This task additionally modifies the currency symbol integration, AGENTS/OKF/HANDOFF, WordPress settings/product data, and requested media under uploads. No commits, pushes, branch changes, or staging.
- Staged changes: None.
- Unstaged changes: Pre-existing project instructions/handoff/roadmap/OKF, theme assets/helpers/header/setup/WooCommerce files, and plugin bootstrap/Elementor integration, plus this task's currency-symbol change and documentation updates. Some changes predate this task; preserve them.
- Untracked files: Pre-existing design documents, fonts, front-page template, theme CSS/JS, shared hero PHP/CSS/JS/images/widget, and an older generated WooCommerce fatal log, plus `docs/okf/decisions/iranian-toman-display.md` and user-requested WordPress media under `wp-content/uploads/2026/`. Do not stage uploads or the unrelated pre-existing files.
- `.htaccess`: Absent, matching task baseline. The temporary file created during link testing was removed at the user's direction; `git status --short -- .htaccess` is empty.

## Completed Work

- Current catalog task checkpoint: confirmed WooCommerce has no Toman currency option, selected its `IRR` code, added a theme filter to display `تومان`, set zero decimal places, and changed the store base location to Iran — Fars. Reopened settings and verified all values persisted. No shipping, tax, payment, or street-address fields were changed.
- Generated ten distinct eyewear product images. Converted them from PNG to 1024×1024 WebP at quality 82; validated each output's format and dimensions. Files total about 225 KB and are in `/tmp/sunglass-products-20261019` for dashboard upload.
- WordPress rejected those WebP files because this PHP runtime cannot read WebP; verified GD lacks WebP functions and Imagick is absent. Converted the same ten images to 1024×1024 progressive JPEG (quality 84), total 470,922 bytes, then uploaded through the dashboard. Media library now contains all ten named JPEGs plus an extra `arya-ay808-1.jpg` duplicate created by a late upload. No media was deleted.
- Created the `عینک آفتابی` (`sunglasses`) and `فریم طبی` (`optical-frames`) product categories through the dashboard.
- Published and checked products `SZ-CS101`, `SZ-SH202`, and `SZ-MK303`: Persian title/short and long descriptions, toman price, correct sunglasses category, featured JPEG, and image alt text are present.
- Published and checked products `SZ-AR404` and `SZ-NL505` with their assigned JPEGs, toman prices, unique SKUs, Persian copy, category, and image alt text. Numeric stock management remains disabled because no real quantities were provided.
- Published and checked `SZ-KV606`, `SZ-DR707`, `SZ-AY808`, `SZ-RN909`, and `SZ-EM010`; all ten products now appear in the dashboard list with status Published, the expected SKU/category/price, and the corresponding image and alt text.
- Catalog price summary (all toman): CS101 2,690,000; SH202 3,490,000; MK303 2,450,000; AR404 2,850,000; NL505 3,250,000; KV606 2,990,000; DR707 3,150,000; AY808 2,350,000; RN909 2,790,000; EM010 2,250,000.
- Added a project instruction to verify completion of every WordPress media upload before navigating away. One duplicate Arya attachment remains: product AY808 uses `arya-ay808-1.jpg`; `arya-ay808.jpg` is unattached. No media was deleted.
- Added the Iranian currency convention to AGENTS and OKF and documented the unresolved future payment-gateway conversion check.

- Latest documentation task: created root `DESIGN.md` version 1.0, a standalone visual implementation contract with a ready-to-paste task prompt. Includes approved materials/tokens, geometry, typography/RTL, asset map, responsive rules, motion table/formula, extension defaults, protected boundaries, execution sequence, and acceptance/correction checklist.
- Rechecked current source, typography/assets, project instructions and relevant OKF. Read the verified project mistakes log without modifying it. Consulted official OpenAI prompting documentation and the requested GPT-6 Luna model page; the brief's design values come from local source and user-approved work.
- Linked the contract from AGENTS, README, OKF index, and current architecture; recorded the meaningful documentation change in the OKF log. No new OKF version or runtime behavior change.

- Latest header/hero motion task: changed only the theme header CSS, shared plugin hero CSS, and affected handoff/OKF documents. No PHP, JavaScript, dependencies, site data, or server settings changed.
- Header enters over 560ms; hero elements enter over 520ms with 60ms stagger steps (last group starts at 240ms). Animation uses opacity/translation with backward fill only, so finished content returns to its normal static state. Keyboard focus cancels entrance on the relevant header/action group.
- Added a 2px navigation lift, subtle logo-ring separation, available-action icon response, and a search focus glow. Disabled actions no longer receive hover/press motion.
- Added a localized primary-button sheen and 3px arrow movement, small secondary/benefit icon movement, and 280ms guide/mobile-menu entry. Existing modal semantics, Escape, and focus return remain intact.
- Desktop observed entrance opacity/stagger values, search focus, navigation lift, CTA sheen/arrow, benefit icon movement, and guide opening. Mobile 390px menu opening/Escape/focus return passed without horizontal overflow.
- Backups: `/tmp/sunglass-header-before-motion.css`, `/tmp/sunglass-hero-before-section-motion.css`. Final screenshot: `/tmp/sunglass-header-hero-motion.jpg`.

- Latest card-motion task: updated only hero CSS/JS plus this handoff and affected OKF docs. Added a 6-second, 5px idle float, 10px hover lift, 1.025 scale, bounded ±6°/±8° pointer tilt, and pointer-following glass reflection. Effects preserve the original -14° Y/-2° Z reference angle.
- Pointer bounds are cached on entry to avoid transform feedback; updates use requestAnimationFrame, and exit/cancel/blur/scroll/resize/preference changes clear temporary properties. Delegation supports later-rendered Elementor cards. Touch/reduced-motion contexts retain the static card.
- Browser verification: hover highlight/lift, changing tilt values while moving between card positions, and cleared inline properties after exit; no captured warnings/errors or horizontal overflow.
- Current-task backups: `/tmp/sunglass-hero-before-card-motion.js` and `/tmp/sunglass-hero-before-card-motion.css`. Hover screenshot: `/tmp/sunglass-floating-card.jpg`.

- Inspected repository instructions, README, handoff, relevant OKF concepts, source, supplied design documents/reference, Git state, and the live homepage.
- Verified and read the project-specific mistakes log using its matching path fingerprint.
- Preserved existing project-owned source and OKF docs in `/tmp/sunglass-before-reference-match.tar` before edits.
- Replaced the split image/panel treatment with a full-bleed photographic scene and independently rendered HTML interface matching the reference composition.
- Generated a clean 1672×941 scene without baked-in interface elements and a separate transparent black optical-frame image; copied final assets into the plugin. Preserved the earlier editorial photo.
- Reworked glass panel proportions, heading, violet CTA, benefits, editorial product card, header, and responsive crop. Retained supplied IranSansX families.
- Added the reference Didara wordmark fallback for the generic site title, preserving custom logos and explicitly configured names; added `saz_reference_brand_name` override filter.
- Added useful navigation fallback links while retaining an assigned WordPress primary menu as authoritative.
- Replaced the administrator-facing empty-product message with a labeled style-inspiration card. Actual selected products retain their WooCommerce name/image/SKU/price/permalink; no fake price or cart count is introduced.
- Added an accessible frame guide for the default secondary action, a delegated hero script, and Elementor script dependency. Custom secondary destinations remain supported.
- Added file modification versions for changed CSS and hero JS to invalidate browser caches.
- Browser-verified 1672px, 1280px, 820px, and 390px layouts, image loading, fonts, guide interaction, mobile menu interaction, and focus return.
- A temporary `.htaccess` introduced while testing the shop destination was fully removed after the user's scope clarification. No server/permalink changes remain.
- Updated AGENTS and OKF with reference behavior, commerce/editorial distinctions, and the user's homepage-only scope correction.

## Work in Progress

No implementation work remains for the current request. All ten product records and the currency settings have been verified in the dashboard. Keep source/docs/media unstaged and uncommitted.

## Remaining Work

- Before actual retail launch, confirm the generated product models, descriptions, proposed prices, and frame specifications against real supplier information; set actual stock quantities. WooCommerce currently displays its default in-stock status while numeric stock management is disabled.
- No payment gateway is installed in the observed local plugin set. Check that a future gateway treats the `IRR` code and toman-denominated numbers correctly before enabling transactions.
- Other storefront pages have not been built; the user explicitly confirmed this. Do not treat their unfinished destinations as authorization for server/permalink work.
- The site remains in Coming Soon mode. No public storefront product route or Elementor editor behavior was tested or changed in this task.
- Selecting a featured product for the homepage, assigning a custom menu/logo, enabling wishlist behavior, and editing Elementor content remain separate work.

## Exact Next Steps

For future retail readiness: reconcile the ten generated catalog entries with actual supplier data and available quantities, then configure and verify payment-gateway handling for toman amounts under WooCommerce currency code `IRR`. Public storefront work remains a separate request.

Earlier implementation follow-ups:

1. Review the updated homepage visually against the supplied reference.
2. If further visual adjustments are requested, edit the existing shared renderer/assets and preserve current user changes.
3. Build other storefront pages only when separately requested. Do not reintroduce `.htaccess` or server changes for this task.
4. After future edits, rerun PHP lint, bundled Node syntax checks, `git diff --check`, and relevant browser QA.

## Files Created

Current catalog task: `docs/okf/decisions/iranian-toman-display.md`; WordPress media and generated derivatives are under `wp-content/uploads/2026/10/` (10 used catalog images plus one unused duplicate Arya image). Generated WebP and JPEG working files are in `/tmp/sunglass-products-20261019` and `/tmp/sunglass-products-jpeg-20261019`; they are not repository source assets.

Latest documentation task: `DESIGN.md` only.

This task:
- `wp-content/plugins/sasan-zare-core/assets/images/eyewear-scene-reference.jpg`
- `wp-content/plugins/sasan-zare-core/assets/images/eyewear-frame-reference.png`
- `wp-content/plugins/sasan-zare-core/assets/js/homepage-hero.js`
- Temporary visual evidence: `/tmp/sunglass-reference-desktop.jpg`
- Temporary recovery archive: `/tmp/sunglass-before-reference-match.tar`

The pre-existing untracked hero renderer/widget/front-page/CSS/fonts and design documents were not newly created by this task. The temporary `.htaccess` no longer exists.

## Files Modified

Current catalog task: `AGENTS.md`, `HANDOFF.md`, `docs/okf/project-overview.md`, `docs/okf/architecture/current-architecture.md`, `docs/okf/decisions/index.md`, `docs/okf/log.md`, `wp-content/themes/sasan-zare/inc/woocommerce.php`, WooCommerce settings/product records, and Media Library attachments.

Latest documentation task: `AGENTS.md`, `README.md`, `HANDOFF.md`, `docs/okf/index.md`, `docs/okf/architecture/current-architecture.md`, and `docs/okf/log.md`. Existing design-reference documents and runtime source were preserved.

Latest header/hero motion task: `wp-content/themes/sasan-zare/assets/css/header.css`, `wp-content/plugins/sasan-zare-core/assets/css/homepage-hero.css`, `HANDOFF.md`, `docs/okf/architecture/current-architecture.md`, and `docs/okf/log.md`.

Latest card-motion task: `wp-content/plugins/sasan-zare-core/assets/css/homepage-hero.css`, `assets/js/homepage-hero.js`, `HANDOFF.md`, `docs/okf/architecture/current-architecture.md`, and `docs/okf/log.md`. No PHP, theme/configuration, site content, or database changes in this task.

This task:
- `AGENTS.md`, `HANDOFF.md`
- `docs/okf/index.md`, `project-overview.md`, `architecture/current-architecture.md`, `log.md`
- Theme: `assets/css/design-system.css`, `assets/css/header.css`, `inc/assets.php`, `inc/helpers.php`, `template-parts/fallback/header.php`
- Plugin: `assets/css/homepage-hero.css`, `includes/class-homepage-hero.php`, `includes/views/homepage-hero.php`, `includes/widgets/class-eyewear-hero-widget.php`

Other Git changes predate this task and were preserved.

## Important Architecture and Design Decisions

- Preserve the classic theme/plugin boundary, namespaces, prefixes, translation domains, Elementor content, neutral `theme.json`, and WooCommerce APIs.
- For Iran, keep WooCommerce currency code `IRR`, show the currency symbol as `تومان`, enter catalog amounts in tomans, and use zero decimal places. Payment-gateway conversion must be checked before accepting payments.
- The catalog contains ten published simple products in `عینک آفتابی` and `فریم طبی`. Stock quantities were not supplied; stock management is disabled and WooCommerce's default in-stock status remains.
- Use a clean photographic plate with independent live HTML UI; never flatten the entire screenshot into the hero.
- Use WordPress primary-menu/custom-logo settings when configured. Reference navigation and wordmark are presentation fallbacks, without database writes.
- Default product imagery/model text is explicitly style inspiration. Prices/inventory/product attributes belong to real WooCommerce data. Decorative swatches appear only on the editorial fallback.
- Missing secondary URL uses the built-in native frame guide; configured URLs retain their own destinations.
- Keep other pages and server/permalink configuration out of this task, as explicitly clarified by the user.

## Commands Executed

- Catalog task: inspected repository guidance/OKF/mistakes ownership, active WooCommerce settings and installed currency options; created a backup of `inc/woocommerce.php`; generated ten product images; converted PNG inputs to 1024×1024 WebP with Python Pillow (quality 82), then converted to progressive JPEG at quality 84 after WordPress rejected WebP; ran PHP lint on the changed integration file and `git diff --check`.
- Catalog settings were changed and verified through the local WordPress/WooCommerce dashboard. The saved values are `IRR`, 0 decimal places, and `IR:FRS` (Iran — Fars); the current label is `ریال ایران (تومان) — IRR`.
- Final checks: full PHP lint over both owned source directories, `git diff --check`, a simple OKF decision frontmatter/link check, final product list count, and per-product dashboard checks. No automated test suite was added or run.

- Documentation task: inspected root/branch/HEAD/status, current instructions/handoff/README/OKF, design-system/header/hero source, supplied font/image paths, and the verified project-specific mistakes log.
- Read official OpenAI prompting guidance and GPT-6 Luna model documentation; no API invocation or model comparison/evaluation was performed.

- Header/hero motion task: inspected applicable guidance, handoff, relevant OKF/design motion rules, mistakes log, current branch/HEAD/status; backed up the two affected stylesheets and ran whitespace/CSS structure/OKF-link checks.
- Browser QA used native pointer/focus interactions and read-only computed styles. Right-click then Escape exercised link hover without navigating to unfinished pages. Rechecked guide and mobile-menu Escape/focus return, restored the browser viewport, and saved a screenshot.

- Card-motion task: re-read applicable instructions/handoff/OKF and the verified mistakes log; inspected branch/HEAD/status, backed up hero CSS/JS, and ran bundled Node syntax check, CSS brace check, and Git whitespace check.
- Browser reloaded the live homepage; pointer was moved to two non-link positions on the card and then outside it. Read computed styles/CSS variables and console output, and saved the hover screenshot.

- Git root/status/branch/history/HEAD inspections, staged-diff check, and `git diff --check`.
- Source/docs/reference-image reads; project-specific mistakes fingerprint verification.
- `tar -cf /tmp/sunglass-before-reference-match.tar AGENTS.md HANDOFF.md docs/okf wp-content/themes/sasan-zare wp-content/plugins/sasan-zare-core`.
- Built-in image generation for the clean scene and transparent frame, PHP GD JPEG conversion, and local asset copies. WebP conversion was attempted but GD lacks `imagewebp`; JPEG was used instead.
- Full PHP lint with `find ... -name '*.php' -print0 | xargs -0 -n1 /opt/lampp/bin/php -l` over both owned source directories.
- Bundled Node `--check` for `homepage-hero.js` and the existing `site-header.js`.
- Python checks for OKF root version placement, three concept frontmatter structures, 15 internal links, and CSS brace balance. Full YAML/CSS parsers are not installed in system or bundled runtimes.
- Browser navigation/reloads, viewport QA, read-only layout/image/font inspection, guide/menu open and Escape tests, console review, and screenshot saving.
- Read Apache module/override settings while diagnosing a link; no global Apache configuration was edited. Temporary root `.htaccess` was created then removed; absence and clean path-specific Git status were confirmed.

## Validation and Test Results

- Catalog task: PHP syntax validation passed for all 27 theme/plugin PHP files; `git diff --check` passed. The OKF decision frontmatter and relative architecture link check passed. Pillow confirmed the ten JPEG upload inputs are 1024×1024, progressive JPEG, 37,441–55,516 bytes (470,922 bytes total). The dashboard reports All (10) / Published (10); all rows have unique SKUs, Toman prices, correct categories, and corresponding JPEGs with alt text. Currency/country settings persisted on reload. Numeric stock management is off; displayed in-stock status is WooCommerce's default. No test suite was run.

- Documentation task: PASS for UTF-8, 14 numbered sections, balanced code fences, 11 referenced source/asset locations, 32 relative Markdown links across design/guidance/OKF, unchanged OKF 0.2 version placement, and `git diff --check`. Runtime tests were not run because only Markdown changed. No Luna model execution/evaluation was performed.

- Header/hero motion: PASS for CSS brace balance and `git diff --check`; no formal CSS parser/linter is installed. No PHP/JS changed, so those earlier checks were not repeated.
- Browser observed staggered entrance opacities with 0/60/120/180/240ms delays, navigation Y=-2px, primary sheen opacity 1 with arrow translation -3px, and benefit translation Y=-3px / rotation -5deg.
- Search focus visibly changed shadow and magnifier transform. Guide/mobile drawer exposed their intended entry animation names; Escape closed each, with mobile `aria-expanded` reset and focus restored.
- Desktop 1280px and mobile 390px rendered without horizontal overflow. Final desktop console contained no captured warning/error entries; the viewport was restored to 1280px and `/tmp/sunglass-header-hero-motion.jpg` was saved. Both dialogs were closed. Reduced-motion behavior is source-verified, not OS-emulated.

- Card-motion JavaScript syntax: PASS with bundled Node `--check`; CSS brace balance and `git diff --check`: PASS.
- Live pointer test: hover became true, highlight appeared, tilt changed to `-1.47deg` / `5.61deg` at the second test position; leaving cleared all pointer inline properties and hover became false. Idle `saz-card-float` animation remained active.
- Final console: no captured warning/error entries. CSS viewport 1280px, document width 1265px (scrollbar accounted for), no horizontal overflow.
- No PHP was modified, so earlier PHP lint was not rerun. Reduced-motion/touch rules are present but OS/device emulation was not performed.

- PHP: PASS, all 26 theme/plugin PHP files.
- JavaScript syntax: PASS, both project scripts using the bundled Node binary.
- Git whitespace: PASS.
- OKF: PASS for simple frontmatter structure, root-only `okf_version: "0.2"`, and all 15 relative links. This is not a full YAML-parser/schema certification.
- CSS: Balanced braces; visually inspected in Chrome. No standalone CSS linter/parser available.
- Browser widths: 1672px, 1280px, 820px, 390px; no horizontal overflow observed.
- Main/transparent frame images: loaded successfully. Fonts: `document.fonts.status` was `loaded`.
- Frame guide: opens; Escape closes and returns focus to trigger.
- Mobile menu: opens with `aria-expanded=true`; Escape closes, restores `false`, and returns focus to trigger.
- Final default 1280×632 browser: loaded expected homepage with no captured warning/error console entries. Explicit viewport overrides were reset.
- Screenshot saved at `/tmp/sunglass-reference-desktop.jpg`; includes the unchanged existing post/footer below the hero.
- Other-page link testing does not constitute completed page design. No routing changes remain after the explicit user rollback request.

## Known Issues and Blockers

- WebP upload is unsupported by this XAMPP PHP runtime (`GD` has no WebP functions; Imagick is absent). The requested product images were uploaded as optimized JPEG instead.
- Media Library has two Arya image attachments; product AY808 uses `arya-ay808-1.jpg`, and `arya-ay808.jpg` remains unattached. It was left in place; no media was deleted.
- No numeric stock quantities were provided. Stock management remains disabled, so WooCommerce displays its default in-stock status.
- Product model names, model descriptions/specifications, prices, and photos were generated for this local catalog and have not been verified against a supplier or physical stock.
- The site remains in Coming Soon mode. Public storefront product routes, payment behavior, and the Elementor editor were not tested or changed in this task.
- No payment gateway is installed in the observed local plugin set. Future gateway amount conversion for toman values under `IRR` needs verification.
- Other storefront pages remain outside the user's requested scope.
- No full YAML parser or CSS linter is installed. Available structural and browser checks are reported above.
- The project-specific external mistakes log is readable but outside writable sandbox roots. It was reviewed and left unchanged; no substitute was created.

## Risks and Assumptions

- New product names, descriptions, dimensions/material details, prices, and generated images are proposed catalog data, not independently verified physical products. Reconcile them with actual supplier information before retail sales.
- Numeric stock was intentionally not invented; the default WooCommerce in-stock status still applies while stock management is disabled.
- WooCommerce stores currency code `IRR` while amounts and symbol are in tomans. A future payment gateway may require conversion; test before taking payments.
- Preserve all pre-existing uncommitted files, user-supplied design docs/fonts, unrelated site content, and the older generated uploads log.

## Database or Migration State

No schema migration was performed. WordPress now contains ten published simple products (IDs 25–34) and two product categories created through the admin UI. WooCommerce settings changed to `IR:FRS`, `IRR`, and zero decimal places. Ten catalog JPEG images plus one duplicate attachment are in the Media Library. No product order, customer, tax, shipping, or payment data was changed.

## Configuration and Environment Notes

- PHP CLI: `/opt/lampp/bin/php`; the installed PHP GD and Imagick configuration cannot process WebP.
- WooCommerce 11.2.1 and WordPress 7.1.3 were observed in the local dashboard. WooCommerce uses `IRR` with display symbol `تومان`, zero decimals, and base location Iran — Fars.
- The local store remains marked Coming Soon. Store address, tax, shipping, and payment settings were not changed.
- Root `.htaccess` is absent, as at task start. Do not recreate it without a separate request.
- Project-specific mistakes log: `/home/open/Desktop/All Projects/Mistakes/sunglass/mistakes.md`; verified SHA-256 fingerprint `bdeab98ad2cc1dbf186cf3f1e7f03ea28b4881f599d083a9481d96b2892163c3`.

## Uncommitted or Partially Applied Changes

All source and documentation edits remain unstaged and uncommitted alongside the pre-existing user work. The requested media appears under the currently untracked `wp-content/uploads/2026/` tree and must not be staged/committed. The ten product records and WooCommerce settings are saved in the local site database. No partial product record remains.

## Recovery or Rollback Notes

The current currency integration source backup is `/tmp/sunglass-woocommerce-before-toman-20261019.php`. Generated originals remain under `/home/open/.codex/generated_images/01a150cf-fec8-7cd2-84b0-4f0ec86497b2/`; optimized WebP/JPEG working files remain in `/tmp/sunglass-products-20261019` and `/tmp/sunglass-products-jpeg-20261019`. The task-start archive is `/tmp/sunglass-before-reference-match.tar`; inspect selected files before any restore because it contains pre-existing user work. Do not reset Git or overwrite the checkout. The live catalog/settings are database state; no database backup was created.

## Related Documentation

- `DESIGN.md` — standalone visual implementation contract and ready-to-paste task prompt.

- `AGENTS.md`, `README.md`
- `docs/okf/index.md`, `docs/okf/architecture/current-architecture.md`, `docs/okf/decisions/elementor-first-class-theme.md`, `docs/okf/decisions/iranian-toman-display.md`
- `docs/LIQUID_GLASS_DESIGN_LANGUAGE_V2.md`, `docs/EYEWEAR_LIQUID_GLASS_COLOR_PALETTE.md`
- `docs/MASTER_ROADMAP.md`, `docs/PHASE_0_BOOTSTRAP_REPORT.md`

## Notes for the Next Agent

The current catalog request is complete. Preserve the full existing Git worktree and keep the product records in WordPress, not in theme templates. Before retail use, reconcile generated product details/prices and set real stock quantities; verify future gateway conversion for Toman values under `IRR`. The user did not request storefront rendering, and the local store remains Coming Soon. For future batch media uploads, verify every item completed before navigating away; one unattached duplicate Arya image remains from an early queue navigation.
