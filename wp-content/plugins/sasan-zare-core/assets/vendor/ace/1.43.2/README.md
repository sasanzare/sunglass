# Ace editor assets

Unmodified browser assets from `ace-builds` **1.43.2**, the existing dependency version registered by Elementor Core 4.2.3. Sasan Zare Core serves these files only for the Elementor editor's matching `ace` and `ace-language-tools` CDN URLs. A future upstream version is left unchanged until its assets are reviewed.

- Upstream: https://github.com/ajaxorg/ace-builds
- Official package: https://registry.npmjs.org/ace-builds/-/ace-builds-1.43.2.tgz
- Package SHA-256: `6e69953fed943f3e9e76871ef60b119646899314cb155bddad024cc121e58149`
- The package SHA-512 integrity was checked against the npm version metadata before extraction.
- License: BSD-3-Clause; see [LICENSE](LICENSE).
- File checksums: [SHA256SUMS](SHA256SUMS).

The subset includes the core, language tools, CSS/HTML/JavaScript/JSON/text/XML modes and snippets, their available workers, and the dark theme used by Elementor. Ace loads these supporting files relative to its local script URL. Add matching upstream assets if another integration introduces an additional language or theme; do not substitute a different version.
