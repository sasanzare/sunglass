# DESIGN.md — Didara / Sasan Zare Eyewear

Version 1.0 · 2026-10-19 · Approved visual direction: **Warm Optical Liquid Glass**

## 1. Start here

Use this file with the user's attached target image and current task. It is a standalone implementation brief for GPT-6 Luna or another coding model. It captures the approved header/hero style, not a generic design inspiration list.

**Your job:** implement the requested section in the existing project, compare the rendered result with the target image, and correct visible differences. Deliver working source, not only an explanation or a mockup.

For visual decisions:

1. Follow the user's current explicit request and corrections.
2. Match the attached target image's composition, content placement, and visual hierarchy.
3. Use this file for materials, typography, colors, motion, responsive behavior, and implementation boundaries.
4. Reuse existing approved components/assets. Keep unaffected sections unchanged.

A new screenshot changes the target composition; it does not authorize an unrelated redesign or server/configuration work. If the user explicitly requests a different visual style, follow that request and document the change.

This file reduces ambiguity; it does not guarantee a particular model's output quality. Code, fonts, and image assets still need to be accessible to the implementing model. With only a screenshot and no image-editing capability, exact photographic reconstruction may be blocked; report that specific limitation.

## 2. The visual identity in ten rules

1. Warm porcelain/ivory scene, realistic eyewear photography, soft daylight from the upper left.
2. Clear translucent glass with bright thin rims, a small contact shadow, and a softer lower-right cast shadow.
3. Deep optical ink for text; iris violet for the primary action and a short highlighted phrase.
4. Mint is a supporting accent, usually on small service icons. Champagne is a rare detail.
5. Generous rounded geometry; CTA/search controls are pills. Keep large text surfaces visually quiet.
6. Editorial composition: an intentional image/text balance, open space, and one dominant visual anchor.
7. Persian/RTL typography with correct local fonts and isolated Latin model/SKU text.
8. Real HTML text, controls, menus, product data, and logo; photography is a separate asset.
9. Restrained motion: brief entrances, tactile controls, one gently floating product card.
10. Stable, readable content after entrance; keyboard, touch, reduced motion, and responsive layouts remain usable.

Avoid generic purple gradient backgrounds, opaque white cards everywhere, blue SaaS dashboards, oversaturated glass, heavy blur over text, emoji icons, and continuous movement of every element.

## 3. Assets: resolve these before styling

Distinguish **reference screenshot**, **clean scene photo**, and **transparent product cutout**. They have different jobs.

| Input | Use | Do not do |
| --- | --- | --- |
| User screenshot | Measure layout, relative scale, crop, materials, type and hierarchy | Set the entire screenshot as the page background and place duplicate UI over it |
| Clean scene/photo | Full-bleed photographic scene, with focal point preserved | Keep baked-in text, navigation, CTA, or product-card UI |
| Product cutout | Independent product image inside live HTML card | Substitute a rough SVG or emoji for available product photography |
| Existing fonts/logo/icons | Preserve approved visual identity | Replace them with a convenient generic system |

Existing project assets, relative to the repository root:

- `wp-content/plugins/sasan-zare-core/assets/images/eyewear-scene-reference.jpg` — clean approved scene, 1672×941.
- `wp-content/plugins/sasan-zare-core/assets/images/eyewear-frame-reference.png` — transparent editorial optical frame.
- `wp-content/themes/sasan-zare/assets/fonts/IranSans/` — supplied IranSansX / IranSansXFaNum WOFF2 faces.
- The older `eyewear-editorial-hero.jpg` is retained history; the current default uses `eyewear-scene-reference.jpg`.

For a new target image, reuse suitable project assets first. If a new clean plate is needed, use available image-editing/generation tools to remove only baked-in UI while preserving the subject, pose, lighting, scene, and crop. Inspect the result. Save a project-local copy and reference that copy. Do not regenerate an already approved photo unnecessarily.

If a required asset is unavailable, state exactly which asset is missing. Continue independent layout work; do not disguise an unrelated stock image or a screenshot background as a completed match.

## 4. Tokens: copy the values, reuse the existing names

In this repository, `assets/css/design-system.css` in the theme is the token source. Reuse it; do not create a second competing token system. The following compact recipe also makes this document usable outside the repository.

```css
:root {
  --color-canvas: #f1ede8;
  --color-canvas-light: #f8f6f3;
  --color-fg-strong: #141418;
  --color-fg: #29282f;
  --color-muted: #6e6b74;
  --color-primary: #6553e8;
  --color-primary-strong: #4d3bc7;
  --color-primary-soft: #a99af6;
  --color-secondary: #52cdb8;
  --color-secondary-soft: #a7e8dc;
  --color-luxury: #c6a46a;
  --color-on-primary: #fff;
  --saz-reference-ink: #17162f;
  --saz-font-sans: "IRANSansXFaNum", "IRANSansX", Tahoma, sans-serif;
  --saz-font-latin: "IRANSansX", Arial, sans-serif;
  --saz-ease-liquid: cubic-bezier(.3, .7, .2, 1);
  --saz-gradient-glass: linear-gradient(150deg,
    rgb(255 255 255 / 58%), rgb(255 255 255 / 24%) 52%, rgb(255 255 255 / 38%));
  --saz-reference-panel-surface: linear-gradient(140deg,
    rgb(255 255 255 / 48%), rgb(255 255 255 / 24%) 50%, rgb(255 255 255 / 35%));
  --saz-reference-product-surface: linear-gradient(130deg,
    rgb(255 255 255 / 54%), rgb(255 255 255 / 27%) 58%, rgb(255 255 255 / 47%));
  --saz-reference-heading-gradient: linear-gradient(180deg, #7950ee, #4b25c6);
  --saz-reference-cta-gradient: linear-gradient(170deg,
    #9467ff 0%, #713df4 42%, #693cf3 66%, #a68aff 100%);
  --saz-rim-glass: inset 0 1.5px 0 rgb(255 255 255 / 92%),
    inset 1px 0 1px rgb(255 255 255 / 48%),
    inset 0 -1px 1px rgb(255 255 255 / 45%), 0 1px 2px rgb(41 40 47 / 8%);
}
```

Spacing scale: **4, 8, 12, 16, 20, 24, 32, 40, 48px**. Typical control radius: pill; small card: 16–24px; large panel: 34–64px. Match the target's relative proportions instead of applying one radius to everything.

### Glass construction

```css
.saz-glass-example {
  position: relative;
  border: 1px solid rgb(255 255 255 / 80%);
  background: var(--saz-reference-panel-surface);
  box-shadow: var(--saz-rim-glass), 20px 28px 38px rgb(41 40 47 / 10%);
  -webkit-backdrop-filter: blur(10px) saturate(104%);
  backdrop-filter: blur(10px) saturate(104%);
}
```

Use a second inset rim only on important glass objects. Decorative pseudo-elements use `pointer-events: none`. Increase surface opacity behind essential text when the underlying photo compromises contrast. On mobile use a calmer surface, approximately white 82% to ivory 92%. Without backdrop-filter support, use near-opaque ivory. Do not animate large blur/filter regions.

## 5. Typography and icons

| Element | Approved starting point | Weight / behavior |
| --- | --- | --- |
| Desktop hero heading | `clamp(32px, 3.55vw, 76px)` | 800; line-height 1.42; short violet phrase |
| Mobile hero heading | `clamp(29px, 7.6vw, 48px)` | Line-height 1.6; wrap naturally |
| Hero description | `clamp(16px, 1.36vw, 28px)` | 400; line-height 1.7 desktop / 2 mobile |
| Desktop navigation | `clamp(12px, .98vw, 20px)` | 600; keep normal labels on one line |
| Hero action | `clamp(14px, 1.13vw, 23px)` | 600; mobile 16px |
| Editorial card title | `clamp(12px, 1.04vw, 22px)` | 700; compact display only |
| Latin eyebrow | Small, spaced uppercase | Latin family; tracking around .35em |

- Persian content uses `IRANSansXFaNum`; Latin model names/SKUs use `IRANSansX` with `dir="ltr"` or `<bdi>`.
- Persian letter spacing stays **0**. Do not apply Latin tracking to Persian headings.
- Main body copy stays at least 16px; small card metadata is an exception, not the page-wide body style.
- Load real supplied weights with `font-display: swap`; do not synthesize a missing weight or silently replace the font.
- Use the existing inline SVG set: 24×24 viewBox, about 1.7px stroke, round caps/joins. No emoji substitutes.
- Default primary targets are at least 44×44px. Preserve visible focus rings outside the glass rim.

## 6. Approved header + hero specimen

These are approximate visual anchors from the original **1672×941** screenshot, not a claim of measured pixel identity. Coordinates start at the scene's top-left, excluding browser chrome and the WordPress admin toolbar.

| Object | Approximate x / y | Approximate width / height |
| --- | --- | --- |
| Floating header | 48 / 30 | 1587 / 97 |
| Right hero glass panel | 937 / 189 | 699 / 611 |
| Floating product card | 632 / 255 | 249 / 340 |
| Primary hero action | 1278 / 535 | 313 / 88 |

### Structure

```text
Full-bleed photographic scene
├── Floating header, above the scene
│   └── RTL order: brand → navigation → search → account / wishlist / cart
├── Left visual field, about 56% of desktop width
│   ├── Woman / foreground glasses / glass pedestal in the photo
│   └── Independent HTML product card, near the visual field's right edge
└── Right glass panel, about 44% before outer spacing
    └── Eyebrow → heading → description → two actions → three benefits
```

Implementation anchors for this specimen:

- Scene height: `max(56.28vw, 660px)`; photo fills the scene with `object-fit: cover`.
- Desktop grid: `56% 44%`, physical image-left/panel-right. The grid can use LTR placement while panel text remains RTL.
- Header width: `calc(100% - 5.74vw)`; top spacing about `1.8vw`; height about `5.8vw`.
- Right panel top margin: `11.25vw`; outer right gap: `2.15vw`; padding roughly `3.12vw 2.75vw 2.8vw`.
- Panel radius: `clamp(38px, 3.8vw, 76px)`; large white rim; restrained shadow.
- Actions: two columns `1.1fr 1fr`, narrow gap; primary on the RTL start side. Primary height about `5.25vw`, secondary about `4.8vw`, minimum 54px.
- Product card: near 28% from the visual field's top; width about 26.5% of that field, not of the whole page.
- Product card base angle: `perspective(900px) rotateY(-14deg) rotateZ(-2deg)`.
- Benefits: delivery, authenticity, consultation; three columns, mint / iris / mint icon discs, fine separators.

Do not place the photo in a separate rounded rectangle next to a second opaque rectangle. The approved effect depends on one continuous photographic scene behind the independent glass UI.

### Content / commerce behavior

Use actual WordPress menus, custom logos, configured copy, and WooCommerce product/cart data when present. Preserve already configured identity and content.

Without a selected real product, the current card uses `عینک طبی مون‌بلانک`, `Montblanc MB0340`, a catalog link `کشف فریم دلخواه شما`, and the visible label `پیشنهاد استایل`. This is editorial inspiration, not inventory. Do not copy the screenshot's example price or cart count into production data. A real product supplies its own image, price, attributes, and permalink.

A default frame-guide action opens an accessible native dialog; a configured URL keeps its own destination. Unavailable wishlist behavior stays clearly unavailable. Never display administrator setup instructions inside the shopper-facing hero.

## 7. Responsive behavior

| CSS width | Required adaptation |
| --- | --- |
| ≥1200px | Full desktop navigation; image-left/panel-right composition; heading normally one line if copy matches specimen |
| 768–1199px | Compact header with mobile navigation and a separate search row; approximately 50/50 visual/panel layout; legible controls |
| ≤767px | Image first, content panel below; single-column actions and benefits; native menu dialog; natural document flow |

For the approved phone composition, use a 12px outer panel margin, around 30px / 22px panel padding, 34px radius, 16px body copy, and 58px CTA height. The scene's crop should preserve the face and eyewear; the existing phone image focal position is approximately `20% 50%`. Hide the decorative English side caption on narrow screens.

Adapt spacing and wrapping before reducing font sizes. Keep essential text visible at 200% zoom. Do not scale the whole desktop artboard down or use fixed desktop heights that clip mobile content. Recheck a long Persian title and mixed Persian/Latin strings.

## 8. Motion contract

Use `cubic-bezier(.3,.7,.2,1)` for tactile UI transitions. Keep the photo and main text panel stationary after entrance. Only the featured glass card has continuous idle motion.

| Element | Motion | Timing / limit |
| --- | --- | --- |
| Header | Fade + arrive from 12px above | 560ms, once |
| Eyebrow / heading / description / actions / benefits | Fade + rise 12px | 520ms; delays 0 / 60 / 120 / 180 / 240ms |
| Navigation | Lift | 2px, 160–260ms |
| Logo rings | Small separation | About 2px, 260ms |
| Search focus | Rim/glow + small magnifier response | 160–280ms; input stays immediately usable |
| Primary CTA | Local sheen + arrow moves toward action direction | Arrow 3px; sheen about 500ms |
| Secondary / benefit icons | Small lift and rotation | 2–3px / 5°, 240ms |
| Product card idle | Float vertically | 0 to -5px, 6s ease-in-out |
| Product card hover/focus | Lift + scale + stronger shadow | -10px / 1.025; 240–300ms |
| Product card mouse tilt | Follow pointer relative to base angle | X ±6°, Y ±8° |
| Guide / mobile drawer | Short fade/spatial entrance | 280ms; native state/focus updates immediately |

Pointer tilt calculation, using bounds cached at entry:

```text
u = clamp((pointerX - left) / width, 0, 1)
v = clamp((pointerY - top) / height, 0, 1)
rotateX = (0.5 - v) * 12 degrees
rotateYDelta = (u - 0.5) * 16 degrees
finalY = -14 degrees + rotateYDelta
lightPosition = (u * 100%, v * 100%)
```

Batch pointer writes with requestAnimationFrame. Do not recalculate a moving transformed boundary every frame. Clear temporary tilt/light properties on exit, cancellation, blur, scroll, resize, and preference changes. Use delegated handlers when components can be inserted by Elementor.

Required behavior:

- Enable decorative animation only under `prefers-reduced-motion: no-preference`.
- Fine hover / mouse is required for tilt and pointer-only embellishments; touch controls still work without them.
- Reduced motion removes nonessential animations/transitions and keeps all content visible.
- Disabled controls stay still. Keyboard focus is visible and does not depend on hover.
- Keep default CSS content visible. Entrance keyframes may start transparent; avoid a persistent `opacity: 0` class that requires JavaScript to reveal essential content.
- Use backward-only entrance fill or remove the completed animation state. Focus should cancel an entrance that would move the target.
- Do not add GSAP/animation libraries, heavy scroll parallax, moving paragraphs, or a shimmer loop on every button for this style.

## 9. Extending the style to a newly requested section

The header/hero is the approved specimen. Other pages are not yet implemented. The following are design defaults for future authorized work, not claims that those pages exist:

| New component | Carry forward | Adapt to its task |
| --- | --- | --- |
| Collection/product grid | Same tokens, fonts, rims, discreet hover | Consistent image aspect ratio; stable titles/prices; practical card density |
| Product detail | Same imagery treatment, ink, violet primary action | Large clear gallery, readable attributes and purchase controls |
| Filters/search/forms | Same pills, focus glow, small icons | Near-opaque input surfaces; labels and visible errors; no floating tilt |
| Cart/checkout | Same typography and restrained accents | Stable rows, strong readability, clear totals; no decorative idle movement |

For a new image, follow its section structure. Do not repeat the woman/hero layout everywhere. Reuse established header and shared components instead of creating slightly different copies. Use one dominant CTA per local decision group.

## 10. Implementation map and protected boundaries

In this WordPress project:

| Responsibility | Existing location |
| --- | --- |
| Tokens/fonts | `wp-content/themes/sasan-zare/assets/css/design-system.css` |
| Header markup/style/interaction | Theme `template-parts/fallback/header.php`, `assets/css/header.css`, `assets/js/site-header.js` |
| Shared hero view | `wp-content/plugins/sasan-zare-core/includes/views/homepage-hero.php` |
| Hero defaults/assets/data | Plugin `includes/class-homepage-hero.php` |
| Hero styling/motion | Plugin `assets/css/homepage-hero.css`, `assets/js/homepage-hero.js` |
| Elementor controls | Plugin `includes/widgets/class-eyewear-hero-widget.php` (`saz-eyewear-hero`) |
| Theme fallback | `wp-content/themes/sasan-zare/front-page.php` |

Keep the classic theme, `SasanZare` / `SasanZare\Core` namespaces, `saz-` CSS classes, and existing translation domains. Keep reusable functionality in the companion plugin. Preserve Elementor editability, WordPress hooks, WooCommerce APIs, and neutral `theme.json`.

Read applicable AGENTS/HANDOFF and relevant OKF before editing. Preserve existing user changes. Do not replace the project with a React/Next/Vite scaffold or an unrelated component system. Do not add a dependency for an effect that CSS and the existing script can handle.

Do not edit WordPress Core, third-party themes/plugins, uploads, site content, database values, server settings, `.htaccess`, or `wp-config.php` for visual work. Other pages are unfinished; an unfinished destination is not permission to repair routing. Do not commit, stage, push, or change branches without explicit authorization.

When editing elsewhere, preserve that project's architecture and use these visual rules without importing this repository's WordPress structure unnecessarily.

## 11. Execution sequence: use this order

1. **Inspect:** read this file, target image, applicable instructions, current source, and assets. Identify the exact requested scope.
2. **Map:** write a short implementation note listing major blocks, image crop, approximate proportions, reusable files, and asset gaps. Do not stop at the plan.
3. **Compose:** implement photographic placement and major layout first. Use real semantic HTML for UI.
4. **Type:** load fonts, match scale/line-height, RTL order, wraps, and spacing.
5. **Material:** tune glass opacity, rim, shadow, CTA gradient, and icon discs. Keep text contrast stable.
6. **Interact:** add only the relevant motions from section 8; preserve links, modal behavior, focus, touch, and reduced motion.
7. **Compare:** render at the target image's CSS width. Inspect a screenshot. Fix the largest remaining differences in this order: asset/crop → geometry → typography → material → motion detail.
8. **Validate:** check desktop/phone, keyboard, overflow, image loading, relevant syntax, and console output. Repeat only where a new edit or observed failure warrants it.
9. **Deliver:** update HANDOFF/affected OKF and give a concise report with changed files, observed checks, screenshot, and specific remaining limitations.

Ask only for a blocking missing input that cannot be inferred or found. Continue independent authorized work while it is missing. Do not invent a photo, product price, verification result, or user approval.

## 12. Acceptance checks and common corrections

- [ ] Target composition/crop is recognizable before decorative effects are considered.
- [ ] There is one continuous scene where the target shows one; UI is not baked into it.
- [ ] Large box edges, alignment, headline wrapping, and CTA order have been compared at the same CSS viewport.
- [ ] Correct font faces load; Persian spacing and mixed-direction text remain correct.
- [ ] Glass reads as translucent with a bright rim, not as a flat opaque rectangle or a fogged blur block.
- [ ] Inputs/links/modals remain usable; Escape closes modals and focus returns to the trigger.
- [ ] Desktop, tablet, phone, touch fallback, and reduced-motion behavior were checked or explicitly marked unverified.
- [ ] After entrance, no essential content stays hidden. Disabled actions do not animate.
- [ ] `document.documentElement.scrollWidth <= document.documentElement.clientWidth` at tested widths.
- [ ] No fabricated commerce state, new console failures, or unauthorized configuration changes.

For this specimen, useful test widths are **1672, 1280, 820, and 390px**. Account for the WordPress admin toolbar and scrollbar before comparing scene coordinates. If geometry is intended to match exactly, aim for major edges within a few CSS pixels, then verify actual differences. Do not claim pixel-perfect identity, accessibility compliance, or test success without evidence.

| Visible failure | Correct next action |
| --- | --- |
| Everything feels wrong despite correct colors | Recheck image crop and major proportions before tweaking effects |
| Heading wraps unexpectedly | Verify font loading, panel content width, padding and font size; wrap on mobile instead of shrinking body text |
| Glass is too opaque | Adjust surface alpha and rim; preserve text contrast |
| Text is hard to read | Increase the text surface's opacity; reduce visual noise behind it |
| Card shakes under the cursor | Cache initial bounds, clamp angles, batch writes, reset on exit |
| Mobile layout clips | Remove inherited desktop height/width constraints; stack and allow natural flow |
| Styles seem unchanged | Inspect asset URL/version and computed rules; check duplicate overrides before adding more CSS |
| An unfinished page returns an error | Record the out-of-scope destination; continue requested visual work |

## 13. Ready-to-paste task prompt

Replace the bracketed scope, attach the target image and this DESIGN.md, and give the model access to the project/assets. For this repository, no extra design document is required to understand this brief.

```text
Implement [the exact page or section requested] in the existing project.
Read the attached DESIGN.md completely and inspect the attached reference image.
Use the image for composition and this document for the approved visual language.
Reuse existing fonts, clean imagery, components, tokens and project architecture.
Keep already-approved sections unchanged unless this task explicitly includes them.

First identify the relevant files and assets, then implement the result directly.
Match image crop, major proportions, typography and spacing before glass details
and animation. All interface text and controls must remain real, usable HTML.
Apply only appropriate motions from the document, with reduced-motion and touch
fallbacks. Preserve actual commerce data and configured content.

Do not change server settings, .htaccess, wp-config.php, database state, unrelated
pages or dependencies. Do not stop after giving a plan. If an essential photo is
missing, name it and complete independent work without pretending the match is done.

Render and compare with the image at the same CSS viewport when browser tools are
available. Correct observed differences; test mobile, focus, dialogs and overflow.
If browser tools are unavailable, finish source checks and state what remains unverified.
Update the handoff/docs required by the project. Report changes, observed checks,
a screenshot when available, and real limitations. Respond to the user in Persian.
```

Optional Persian task line: `فقط [نام بخش] را مطابق عکس پیاده‌سازی کن؛ زبان طراحی DESIGN.md و بخش‌های تأییدشده را حفظ کن و نتیجه را در مرورگر مقایسه کن.`

## 14. Provenance and maintenance

Visual values and component behavior were distilled from the current Sasan Zare source and the user-approved reference/interaction work. New-page patterns in section 9 are defaults for future tasks. No execution with GPT-6 Luna is claimed by this document.

The explicit role, instructions, examples, and context structure follows [official OpenAI prompting guidance](https://developers.openai.com/api/docs/guides/prompt-engineering). The requested target is [GPT-6 Luna](https://developers.openai.com/api/docs/models/gpt-6-luna); the visual brief remains model-independent.

This file is the compact project profile of the longer [Liquid Glass material reference](docs/LIQUID_GLASS_DESIGN_LANGUAGE_V2.md) and [eyewear palette](docs/EYEWEAR_LIQUID_GLASS_COLOR_PALETTE.md). Those are optional deeper references, not required attachments for the portable brief. In-repository implementation details and verification history live in [current architecture](docs/okf/architecture/current-architecture.md) and [HANDOFF](HANDOFF.md).

Keep DESIGN.md updated when the user approves a meaningful design-system change. Do not silently replace these concrete recipes with a new aesthetic.
