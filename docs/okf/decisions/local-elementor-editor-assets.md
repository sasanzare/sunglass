---
type: Decision
title: Local Elementor Editor Dependencies
description: Serve Elementor's pinned Ace dependency locally and retain clear limits on editor-loading claims.
tags:
  - elementor
  - assets
  - operations
status: active
---

# Decision

Sasan Zare Core maps the installed Elementor editor's Ace 1.43.2 CDN URLs to the same unmodified version stored in the companion plugin. Register the URL filter through `elementor/editor/before_enqueue_scripts`; preserve the script handles and dependencies. Other versions and unrelated script URLs pass through unchanged.

The optional editor-only Google Roboto stylesheet becomes a dependency alias, allowing Elementor's built-in system-font fallback. The storefront's supplied IranSansX fonts remain local. Elementor's Google Fonts option is disabled on the local site, and its alternate loader is enabled.

# Rationale and limits

Elementor Core 4.2.3 registers Ace and its language tools on an external CDN. Local hosting removes that network dependency. Direct visits to the external asset URLs were blocked in the browser session, but this alone does not establish that an ad blocker caused the editor failure; the browser tool also applies URL policy.

Home and Pro Header editors became fully usable during instrumented sessions, and real draft saves were verified. Later automated clean reloads still stalled. The user subsequently confirmed that manual Chrome loading opens both the home panel/Hero and Pro Header logo/content controls. The local asset change and loader settings have not established a single cause for the automated loading difference. Keep this limitation explicit in [the handoff](../../../HANDOFF.md).

# Provenance and maintenance

- Official package: [ace-builds 1.43.2](https://registry.npmjs.org/ace-builds/1.43.2), from [Ajax.org's repository](https://github.com/ajaxorg/ace-builds).
- npm SHA-512 integrity matched before extraction. Package SHA-256: `6e69953fed943f3e9e76871ef60b119646899314cb155bddad024cc121e58149`.
- The 20-file subset includes required modes, snippets, workers, and Elementor's dark theme. All copied files matched their recorded SHA-256 checksums.
- [Vendor provenance and license](../../../wp-content/plugins/sasan-zare-core/assets/vendor/ace/1.43.2/README.md).
- Review this mapping when Elementor changes its dependency version; do not silently substitute an older Ace build.

# Verification rules

- Test cold editor loading, actual edits, saves, and a fresh normal frontend/WordPress preview separately.
- Do not use a standalone `elementor-preview` iframe URL as proof that saved content is missing.
- Read the actual document type and assignment; a template's title can be misleading. The old draft #36 is an `e-form`, while Pro Header #68 has type `header`.
- The default shell sandbox cannot reach the local web/database service. Host-network approved reads can; do not infer a live service outage from an isolated-shell failure.

# References

- [Elementor server configuration conflicts](https://elementor.com/help/server-configuration-conflicts/) describes the alternate loader.
- [Slow editor troubleshooting](https://elementor.com/help/troubleshooting-a-slow-loading-elementor-editor/) lists browser, theme/plugin and loader checks.
