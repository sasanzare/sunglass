# Project Handoff

## Last Updated

2026-10-23

## Project Summary

Persian/RTL WordPress storefront with the classic `sasan-zare` theme, `sasan-zare-core` companion plugin, Elementor presentation, and WooCommerce commerce data. The OKF bundle retains version 0.2.

## Current Objective

Maintain and execute the full-site Elementor Pro + WooCommerce storefront master plan while preserving the verified Header + Hero baseline. The detailed plan is in `docs/MASTER_ROADMAP.md`; P1 requirements, information architecture and the content contract are complete. The next implementation slice is P2 WooCommerce data foundation.

## Current Phase or Milestone

Header + Hero remains complete for normal manual use: home #38 is published/static, Pro Header #68 (`هدر اصلی دیدآرا`) is published with an Entire Site condition, and the storefront displays one Header and one Hero. P1 is complete for the local runtime content slice: the primary menu is assigned and selected by #68, eight Persian pages are published, two editorial posts exist, five WooCommerce attributes are populated on the ten published products, and the P0 route/content matrix is in `docs/okf/requirements/p1-content-contract.md`. Automated cold reloads can still stall under browser control; preserve that limitation and do not infer a single root cause.

## Repository State

- Repository path: /opt/lampp/htdocs/dashboard/sunglass
- Current branch: main
- Base or starting commit: 379a4cbc93e149f1174cd2562bbe20dbcec82258
- Current HEAD: 379a4cbc93e149f1174cd2562bbe20dbcec82258
- Working tree status: dirty; 2,681 tracked nondeleted changes, 870 tracked deleted paths and 448 untracked paths at the latest count.
- Staged changes: 0.
- Unstaged changes: many pre-existing source, documentation, runtime and user plugin-reinstall changes; preserve them. Current repair changes are listed below.
- Untracked files: include user-installed Pro, uploads, runtime files and the new licensed Ace subset. Do not stage or clean wholesale.

## Completed Work

- Expanded `docs/MASTER_ROADMAP.md` into the full-site phased implementation plan and added the OKF roadmap concepts under `docs/okf/roadmap/`. Updated the OKF root index, project overview, and knowledge log. This was documentation-only; no runtime storefront implementation was claimed.

- Existing Header widget controls logo/alt, brand/tagline, WordPress menu or Elementor links, search and header-action visibility. Pro Header #68 now contains it and has condition `include/general`.
- Published page #38 contains one Eyewear Hero. Removed its duplicate Header container, set its container padding to 0, published it and selected it in WordPress Reading settings.
- Header #68 has a full-width container with padding 0. Added a scoped header CSS rule to avoid applying the admin-bar offset twice inside the Elementor Header widget.
- Added Hero controls for decorative caption, editorial card image/alt/title/model/link and guide introduction/items. Existing defaults preserve the approved appearance; real product data/prices still use WooCommerce APIs, and the editorial fallback retains its style-inspiration label.
- Added a pinned local copy of Elementor's existing Ace 1.43.2 dependency, through project-plugin editor hooks. Verified npm SHA-512 integrity and 20 file SHA-256 checksums; kept the BSD license/provenance. No Core/Pro source was edited during this repair.
- Elementor alternate loader is Enabled (`1`, originally empty/Disabled); Google Fonts is Disabled (`0`, originally `1`). The editor uses its built-in font fallback and the storefront retains local IranSansX fonts.
- Draft #50 received a temporary Hero/title edit, saved successfully and verified in normal preview, then had the widget and its container removed and saved. Its final data is `[]`, content empty, status draft.
- Temporary PHP metadata endpoint and editor diagnostic JS/enqueue were removed. No preview retry/watchdog was implemented.
- Read the fingerprint-verified project mistakes log; it is outside the current writable roots and was not changed. Added the persistence/template-type lesson to AGENTS.md.

## Work in Progress

No unfinished implementation remains in P1. Normal manual home and Header loading are user-confirmed; actual editor saves and public rendering were observed. The newly added content was saved through WordPress/WooCommerce APIs and public route checks returned 200. A separate fresh automated UI write/reopen test of the new pages and attribute controls was not completed because automated cold loads intermittently stalled.

No temporary runtime diagnostics or iframe retry/watchdog remain. Next work is P2 WooCommerce data foundation: confirm product completeness, shipping/payment settings, currency behavior and cart totals through normal admin/frontend flows.

## Remaining Work

- Header + Hero and P1 content-contract acceptance are satisfied for normal manual/public route use. Retain the automated-reload, remote-library and updater-permission limits as known environment issues.
- P2 must confirm product completeness, gateway/shipping configuration, IRR/toman behavior and cart totals; no payment gateway is active now.
- P4–P10 still need the Elementor templates and commerce utility surfaces listed in the roadmap.
- Business owner inputs remain: approved logo, contact details, verified brands, final legal copy, shipping rules, payment gateway and any warranty/claims.
- Keep the existing home #38, Pro Header #68, fallback #47, unrelated drafts and pre-existing runtime changes intact.

## Exact Next Steps

1. Validate the new OKF requirements documents, relative links, PHP source lint and public route matrix.
2. Start P2 with a read-only WooCommerce settings/product completeness audit before editing commerce data.
3. Preserve fallback #47, unrelated drafts and all pre-existing source/runtime changes.
4. Do not add speculative iframe recovery code to compensate for automation behavior when normal manual loading works.

## Files Created

- wp-content/plugins/sasan-zare-core/assets/vendor/ace/1.43.2/ — 20 unmodified JS assets, LICENSE, SHA256SUMS and README.md.
- docs/okf/decisions/local-elementor-editor-assets.md.
- docs/okf/roadmap/index.md.
- docs/okf/roadmap/master-plan.md.
- docs/okf/requirements/index.md.
- docs/okf/requirements/p1-content-contract.md.
- Temporary runtime diagnostics were created and removed; only verification scripts/source backups remain under /tmp.

## Files Modified

- wp-content/plugins/sasan-zare-core/includes/class-elementor.php.
- wp-content/plugins/sasan-zare-core/includes/class-homepage-hero.php.
- wp-content/plugins/sasan-zare-core/includes/widgets/class-eyewear-hero-widget.php.
- wp-content/plugins/sasan-zare-core/includes/views/homepage-hero.php.
- wp-content/themes/sasan-zare/assets/css/header.css.
- docs/MASTER_ROADMAP.md.
- AGENTS.md, README.md, HANDOFF.md, relevant OKF architecture/overview/decision/index/log documents.
- The user's wp-config.php memory change and user-reinstalled Core/Pro files remain pre-existing state; they were not edited during this repair.
- Runtime content created in P1 is stored in WordPress/WooCommerce data, not in project-owned source: pages 84–91, posts for the new journal articles, menu `منوی اصلی دیدآرا`, five product attributes, product assignments, and Elementor metadata updates for #38/#68.

## Important Architecture and Design Decisions

- Preserve classic PHP template hierarchy and `the_content()`. Elementor owns current page/header authoring; the theme and plugin share semantic fallbacks.
- Pro Header locations take priority over the selected saved-template fallback #47. Keep the global Header out of homepage content.
- Use WooCommerce APIs for actual products/prices/cart quantities. Editorial content is editable but retains the style-inspiration note and no invented price.
- Match only Ace 1.43.2's known CDN sources in editor context; other versions/sources pass through. Do not patch installed third-party code.
- A standalone `elementor-preview` route is not a valid saved-content test. Use the normal WordPress preview or live page and inspect actual document type/assignment.

## Commands Executed

- Read instructions, README, HANDOFF, relevant OKF documents, memory context, Git state and the fingerprinted project mistakes log.
- Ran read-only WordPress/WooCommerce inventory scripts for pages, menus, Elementor conditions, products, media, taxonomies, attributes, settings and gateways.
- Created Phase 1 pages, posts, menu, product attributes and Elementor bindings through WordPress/WooCommerce APIs; bound privacy/terms pages to native settings with the local administrator context.
- Authored the full-site master plan, added the OKF roadmap concepts, updated OKF navigation/overview/log, and refreshed this handoff checkpoint.
- Validated OKF root/version and concept frontmatter, all relative links in the changed documentation, and `git diff --check` for the changed files.
- Ran the project PHP syntax check across all theme/plugin PHP files; all 27 files passed.
- Used Chrome/WordPress UI for editor tests, draft saves/cleanup, Header creation/publication/conditions and static-front-page assignment.
- Downloaded official ace-builds 1.43.2 from npm with host-network approval; verified package integrity and extracted an unmodified subset.
- Ran PHP lint across all 27 project theme/plugin PHP files; all passed.
- Ran a host-network approved WordPress API check from /tmp/sunglass-editor-content-verify.php: eight control/output/escaping/semantics assertions passed without saving data.
- Verified vendor SHA256SUMS and targeted git diff --check. Checked changed OKF frontmatter structure and relative links; PyYAML is unavailable.
- A host-network HTTP HEAD request to the local preview returned 200 with no X-Frame-Options or CSP restriction. Default sandbox localhost/DB access fails; approved host-network reads work.
- tar --compare of restored Core 4.2.3 against its pre-test archive passed again.
- Sampled public HTTP checks returned 200 for home, shop, both product-category archives, frame guide and journal, and a separate check returned 200 for a real product permalink; homepage evidence included `DR-707`, `دریا`, menu category links and the guide/journal links.

## Validation and Test Results

- Storefront DOM: Pro Header document ID 68, page document ID 38, exactly one Hero widget and one Header widget.
- Normal preview verified a changed Hero heading saved on #50. The later cleanup was verified both in normal preview and metadata (`[]`, empty content, draft).
- Header #68 metadata: publish, type header, one Header widget, condition `include/general`. #47 remains the saved-template fallback.
- Home #38 metadata: publish, one Hero; WordPress Reading is static page 38. Header and Hero container padding/width were saved through Elementor. Phase 1 Hero metadata now uses product 31 (`DR-707`), real shop/guide URLs and neutral benefit copy. Pro Header #68 now uses `navigation_source=wordpress`, `wordpress_menu=primary`.
- Phase 1 runtime content: pages 84–91 are published for About, Guide, Contact, Journal, Privacy, Returns, Shipping and Terms; Journal is the posts page; Privacy and Terms are assigned to their native settings. Primary menu ID 58 has eight items. Five WooCommerce attributes are assigned across all ten published products.
- Frontend at the observed 1280px browser: Hero width 1265px with x=0, header inner width about 1192px, correct logged-in offset, and no duplicated page Header. The guide opened and closed with Escape.
- Eight WordPress API assertions passed: new controls, escaped title/alt/guide fields, custom model/link/caption, retained inspiration label and no editorial price.
- All 27 PHP syntax checks and all 20 Ace file checksums passed. Targeted whitespace checks passed. Changed OKF concepts have structurally valid frontmatter and resolving relative links.
- The user separately confirmed manual home loading opens the panel/Hero and manual Header #68 loading opens logo/content controls. Automated cold reloads remain intermittent. New control registration/rendering was API-verified; no independent fresh automated UI write/reopen check of those new fields was completed.

## Known Issues and Blockers

- The automated browser sometimes stays on the loading overlay while its iframe remains about:blank. Successful manual loading and real editor saves have also been demonstrated; the exact difference is unknown.
- The browser URL policy rejected opening chrome://extensions because only HTTP/HTTPS are allowed. Do not work around that restriction through native/profile/CDP access. The user supplied a screenshot showing ChatGPT, DeepSeek RTL Support, GoFullPage and Google Docs Offline; no ad blocker is visible in that portion, and the list is not proven complete.
- Direct CDN/font URL visits returned ERR_BLOCKED_BY_CLIENT, but this may involve tool URL policy and does not prove an installed blocker caused Elementor's issue.
- Elementor Library HTTP 403 and the user-supplied Pro license/proxy modifications remain known. Avoid its remote library; user authorized continuing with this copy.
- WordPress updater chmod/copy failure is separate. The live PHP UID is 1 (daemon), the installed Core is open:open and staged files had nobody ownership; another updater repair needs scoped ownership evidence.
- Draft #36 is an empty e-form. Destination drafts #50/#52/#54/#56 remain unpublished and not linked as public blank destinations.

## Risks and Assumptions

- Preserve all pre-existing Git changes and runtime data. Do not reset, clean, stage or commit broadly.
- Root mode 755 and System Info write checks do not prove the updater can chmod files it does not own. Do not recursively make the site world-writable.
- Do not ask for another php.ini memory increase based on current evidence: WordPress 512M and PHP 2048M were verified.
- Core 4.3.5 was loaded briefly during the earlier authorized test; automatic version/migration checks may have run. No database rollback was performed.
- Source-level/API tests do not prove every UI/browser/device path. Retain the cold-load and final UI verification limits above.

## Database or Migration State

- Authorized UI changes: home #38 published/static, duplicate Header removed, Pro Header #68 published with Entire Site condition, layout spacing adjusted, and two Elementor settings changed as recorded.
- #50 is again empty/unpublished. #52/#54/#56 remain empty drafts. #36 e-form, #44 section and #45 page remain preserved drafts. #47 is published and selected as fallback.
- No manual SQL edit or schema migration occurred during this repair. Phase 1 content and taxonomy writes used WordPress/WooCommerce APIs; no database migration was performed. The legal option binding initially hit Elementor's CLI access guard, then succeeded with the existing local administrator context.
- Earlier database snapshot: /home/open/Downloads/sunglass/sunglass.sql (1,928,978 bytes, mode 600, SHA-256 b66216349667889943a096775184d070463d34310feb73e0d0cd3a8984074d1f). It is not an overwrite-ready restore dump.

## Configuration and Environment Notes

- WordPress 7.1.3; PHP 8.2.4; Elementor Core/Pro 4.2.3; WooCommerce 11.2.1; Sasan Zare Core 0.1.0.
- WP_MEMORY_LIMIT=512M is the user's wp-config.php change; PHP memory 2048M, max_input_vars 10000 and post_max_size 600M were observed.
- Safe Mode Disabled, Atomic Editor active and all four plugins active. Alternate loader=1; Google Fonts=0. Theme-local IranSansX fonts remain in use.
- Root open:open mode 755; .htaccess nobody:nogroup mode 644; installed Core open:open directory 775/main file 664. The live PHP effective UID 1 maps to daemon.
- Local HTTP and database reads require host-network approval in this environment; their default-sandbox failure does not mean the live services are down.

## Uncommitted or Partially Applied Changes

All work remains unstaged; no branch change, commit, push or history rewrite occurred. Preserve the 2,681 modified, 870 deleted and 448 untracked paths at the latest count. Current source changes are coherent and linted; normal manual acceptance is complete, with automated reload limits recorded above. Temporary diagnostic runtime files/hooks were removed.

## Recovery or Rollback Notes

- Source backup before local editor assets: /tmp/sunglass-class-elementor-before-local-assets-ffuwkiya.php. Hero/header-CSS backups: /tmp/sunglass-editable-content-before-ab5mbe6e.
- Restoring Reading to Latest posts (previous page_on_front=0) and removing Header #68's condition or returning it to draft restores the earlier fallback workflow; #47 remains selected. Use normal WordPress UI and preserve drafts/revisions.
- To undo diagnostic settings, alternate loader was originally Disabled/empty and Google Fonts Enabled/1.
- Core archive: /tmp/sunglass-elementor-core-4.2.3-pre-4.3.5-20261019.tar, 96,471,040 bytes, SHA-256 cbd074c6f54093ef4efea32ff92622cc30eb9058d654c2366f6cec380fb61730. Current Core compares successfully.
- Preserved live tree /tmp/sunglass-elementor-core-4.2.3-live-tree-20261019, tested 4.3.5 tree /tmp/sunglass-elementor-core-4.3.5-tested-20261019, and staged package wp-content/upgrade/elementor.4.3.5 remain present.
- Frontend proof screenshot: /tmp/sunglass-elementor-front-1792403552282.jpg.

## Related Documentation

- README.md — current editing workflow.
- AGENTS.md and DESIGN.md — scope, implementation boundaries and approved appearance.
- docs/okf/index.md; architecture/current-architecture.md; decisions/elementor-editable-header.md; decisions/local-elementor-editor-assets.md.
- Official Elementor loader guidance: https://elementor.com/help/server-configuration-conflicts/.

## Notes for the Next Agent

Do not repeat the missing-Hero inference from an iframe-only URL, treat #36 as a Header, or assume #47 is unassigned. The current frontend is home #38 + Pro Header #68, both saved/published. The user confirmed both manual home and Header loading. This milestone is complete for normal manual use; automated loading remains a documented limit. The queued full-site prompt may start after the final documentation checks. No iframe retry/watchdog was added after the positive manual report. Do not weaken browser security or circumvent the chrome:// URL policy. The correct project mistakes log was reviewed but is outside the current writable roots; no replacement was created.
