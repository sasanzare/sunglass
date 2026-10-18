# Sunglass

Sasan Zare's WordPress source project: a classic PHP theme (`sasan-zare`) and its companion plugin (`sasan-zare-core`). Elementor handles page presentation when installed; the theme provides minimal WordPress fallbacks. The plugin is reserved for reusable behavior that should survive a theme switch.

## Repository scope

This repository contains the project-owned theme and plugin, project guidance, and documentation. It is not a backup or export of the local WordPress site.

WordPress Core, installed third-party plugins and themes, uploads, database contents, local configuration, and credentials are excluded. In particular, do not commit `wp-config.php` or site data.

## Install

Copy `wp-content/themes/sasan-zare/` and `wp-content/plugins/sasan-zare-core/` into the matching directories of an existing WordPress installation. Activate the theme and companion plugin in WordPress. Elementor and WooCommerce integrations are guarded so their absence does not prevent the theme or plugin from loading.

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
