# Sunglass

Sasan Zare's WordPress source project: a classic PHP theme (`sasan-zare`) and its companion plugin (`sasan-zare-core`). Elementor handles page presentation when installed; the theme provides minimal WordPress fallbacks. The plugin is reserved for reusable behavior that should survive a theme switch.

## Repository scope

This repository contains the project-owned theme and plugin, project guidance, and documentation. It is not a backup or export of the local WordPress site.

WordPress Core, installed third-party plugins and themes, uploads, database contents, local configuration, and credentials are excluded. In particular, do not commit `wp-config.php` or site data.

## Install

Copy `wp-content/themes/sasan-zare/` and `wp-content/plugins/sasan-zare-core/` into the matching directories of an existing WordPress installation. Activate the theme and companion plugin in WordPress. Elementor and WooCommerce integrations are guarded so their absence does not prevent the theme or plugin from loading.

## Edit the homepage header and hero with Elementor

1. In **Elementor → Theme Builder → Header**, edit the published global Header and select **Sasan Zare Header**. Its controls edit the logo/alt text, brand name, tagline, navigation links or WordPress menu, search placeholder, and header actions. Publish the Header with an **Entire Site** condition.
2. Edit the assigned homepage with Elementor and select **Eyewear Hero**. **Hero Content** edits the main copy, scene image, buttons, benefits, caption, and selected WooCommerce product. **Style inspiration card** edits the fallback card image, model, title, and link. **Frame guide** edits the guide introduction and items.
3. Product names, images, SKUs and prices for a selected real product come from WooCommerce. The fallback card remains labeled as style inspiration and does not invent prices.
4. Verify saved changes through the normal WordPress preview or published page. The `elementor-preview` URL is an editor iframe endpoint and may appear empty when opened alone.

On the current local site, `خانه` #38 is the published static homepage and `هدر اصلی دیدآرا` #68 is the Pro Header. Normal manual home/Header loading is user-confirmed. Automated cold reloads can remain intermittent; see [HANDOFF.md](HANDOFF.md) for the verification limits.

With Elementor Free, create a published Saved Template containing **Sasan Zare Header** and select it in **Appearance → Customize → Elementor Header**. A published Pro Header takes priority. Existing saved template #47 remains the local fallback.

If no Elementor header template is selected, the existing WordPress custom logo, site identity, primary menu, WooCommerce account/cart, and semantic theme fallback remain in use.

The companion plugin serves the editor's existing Ace 1.43.2 dependency locally through scoped WordPress hooks. Its source, checksums and BSD license are included under `assets/vendor/ace/1.43.2/`; see the [editor asset decision](docs/okf/decisions/local-elementor-editor-assets.md).

## Project guidance

- [Standalone design contract and reusable implementation prompt](DESIGN.md)
- [Agent instructions](AGENTS.md)
- [Project handoff](HANDOFF.md)
- [Phase 0 report](docs/PHASE_0_BOOTSTRAP_REPORT.md)
- [Master roadmap](docs/MASTER_ROADMAP.md)
- [OKF knowledge bundle](docs/okf/index.md)

## PHP syntax check

From the repository root:

```sh
find wp-content/themes/sasan-zare wp-content/plugins/sasan-zare-core -type f -name '*.php' -print0 | xargs -0 -n1 php -l
```
