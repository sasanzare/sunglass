# Liquid Glass Design Language — Web/Product System

**Version 2.0 · 2026-10-18**  
**System ID:** `liquid-glass-web-v2`  
**Status:** Stable design contract for production web interfaces  
**Reference specimen:** `Liquid Glass Kit` · 736×920 artboard  

---

## 0. Purpose, scope, and source of truth

This document is the reusable visual, interaction, accessibility, responsive, and implementation contract for products that should share the custom **Liquid Glass** language established by the supplied Liquid Glass Kit.

It is written for:

- product and UI designers;
- front-end engineers;
- WordPress / Elementor implementers;
- React, Next.js, Vue, Svelte, Tailwind, and vanilla HTML/CSS teams;
- code-generating AI agents such as Codex, Claude Code, Antigravity, Cursor, and similar tools.

A product may change its brand colors, typography family, content, imagery, icon family, information architecture, and domain vocabulary. It must preserve the material behavior, hierarchy, interaction grammar, accessibility floor, and component logic defined here unless a page override explicitly documents a deviation.

### 0.1 What changed in Version 2.0

Version 2.0 keeps the original material identity but upgrades the design language into a production design system. The major additions are:

1. a **priority-ordered UX quality model** so visual fidelity never overrides accessibility or interaction;
2. a **three-layer token architecture**: Primitive → Semantic → Component;
3. explicit **Design Dials** for variance, motion, and density;
4. **Master + page override** governance for multi-page products;
5. content-resilient rules for zoom, localization, long labels, chips, and interrupted motion;
6. stronger performance rules for blur, filters, images, layout stability, and low-power fallbacks;
7. stronger state contracts for forms, navigation, loading, errors, disabled controls, and async feedback;
8. first-class **RTL / Persian** implementation guidance;
9. a formal AI-agent workflow compatible with the reasoning model used by `ui-ux-pro-max-skill`;
10. measurable pre-delivery and visual-regression checks.

### 0.2 Relationship to UI/UX Pro Max

The external `ui-ux-pro-max-skill` is used as **design intelligence**, not as a replacement for this document. Its product, style, color, typography, landing, UX, icon, animation, and stack-specific recommendations may adapt the system to a project. This document remains the visual/material source of truth.

When external guidance conflicts with this contract, use this precedence:

1. user/project requirements and legal/accessibility requirements;
2. page-specific override;
3. this Master Liquid Glass contract;
4. verified UI/UX Pro Max product/UX/stack guidance;
5. general framework defaults.

Do not silently replace Liquid Glass with another style simply because a recommendation engine ranks another style higher.

### 0.3 Important naming note

This is a **custom web/product design language** named Liquid Glass. It is not automatically a pixel-faithful implementation of Apple platform UI. If a project explicitly requires Apple-platform fidelity, treat that as a separate compatibility profile and verify against current Apple Human Interface Guidelines. For ordinary websites, preserve this document's custom visual signature instead.

---

# 1. Design intent

Liquid Glass should feel like a calm physical object resting above a softly lit surface. The interface is tactile without becoming decorative noise. The system combines optical softness with strong information hierarchy.

Every effect must support at least one of these six jobs:

1. **Hierarchy** — size, contrast, position, and emphasis identify the next useful action.
2. **Material** — translucency, rims, refraction, and blur explain the surface.
3. **Depth** — contact and cast shadows separate layers and imply elevation.
4. **Feedback** — motion and state changes make controls feel tangible and predictable.
5. **Legibility** — the material never weakens text, icon, or control clarity.
6. **Adaptability** — the language survives different products, breakpoints, locales, themes, and stacks.

Use the language for dashboards, workspaces, commerce, editorial products, creative tools, portals, and marketing pages. The information architecture may change; the material grammar should remain recognizable.

---

# 2. Non-negotiable visual signature

A production screen belongs to this design language only when most of the following are visible as a coherent system:

- One dominant rounded glass shell, hero surface, or clearly defined glass grouping anchors the viewport.
- Light reads from **upper-left toward lower-right**.
- Glass surfaces combine translucent fill, bright upper/left rim, restrained inner highlight, and soft depth.
- A short contact shadow and a longer lower-right cast shadow are visually distinct.
- Primary actions use a saturated brand treatment; secondary actions use a separate supporting accent.
- White or near-opaque controls may sit above colored glass when text entry or high-confidence action clarity is required.
- Iridescent borders are hairline accents, not the main source of contrast.
- Corners are generous and systematic; pills are reserved for compact actions, filters, states, and segmented controls.
- Refraction is concentrated in hero, feature, promo, or high-emphasis surfaces — never on every card.
- The page remains calm: no noisy texture, hard black shadow, excessive glow, competing neon accents, or random gradient vocabulary.
- Motion is physical and restrained; it communicates state or elevation rather than acting as decoration.
- The experience remains usable with blur, gradients, animation, and decorative refraction disabled.

## 2.1 Anti-signatures

The following break the system unless explicitly documented:

- flat cards mixed randomly with glossy skeuomorphic cards;
- different light directions on adjacent components;
- arbitrary radii per component;
- raw hex colors scattered through component code;
- glass applied to long-form reading surfaces where contrast becomes unstable;
- placeholder-only forms;
- hover-only interaction;
- animated blur on large scrolling regions;
- permanent rainbow borders around ordinary components;
- multiple equally strong CTAs in one local task group;
- fixed desktop coordinates used as a production responsive layout.

---

# 3. Quality priorities — resolve conflicts in this order

A beautiful glass effect does not outrank a usable interface. When requirements conflict, evaluate them in this order:

| Priority | Category | Minimum expectation | Common failure to avoid |
| ---: | --- | --- | --- |
| 1 | Accessibility | readable contrast, keyboard use, visible focus, semantic names | removing focus, unreadable text on refraction |
| 2 | Touch & interaction | ≥44×44px primary hit areas, clear pressed/loading feedback | hover-only controls, ambiguous icon actions |
| 3 | Performance | stable layout, efficient images, bounded filters/animation | layout shift, animated large blur regions |
| 4 | Style consistency | one material grammar and one light model | mixing unrelated visual systems |
| 5 | Layout & responsive | mobile-first reflow, no accidental horizontal scroll | shrinking a desktop artboard to mobile |
| 6 | Typography & color | semantic tokens, readable type scale, controlled line length | tiny body text, raw color literals |
| 7 | Motion | meaningful, interruptible, reduced-motion safe | same duration everywhere, decorative motion overload |
| 8 | Forms & feedback | visible labels, local errors, progress and success states | placeholder-only fields, errors only at page top |
| 9 | Navigation | predictable hierarchy and active state | overloaded navigation, unclear back behavior |
| 10 | Charts & data | labels, tooltips/summary, non-color distinctions | meaning conveyed by hue alone |

**Rule:** If a visual flourish threatens a higher-priority category, reduce or remove the flourish.

---

# 4. Design Dials

The material grammar stays stable while three dials adapt the system to product context.

## 4.1 Variance — composition boldness

`--lg-variance: 1..10`

| Range | Behavior |
| --- | --- |
| 1–3 | centered, calm, highly aligned, minimal asymmetry |
| 4–7 | balanced Liquid Glass default, controlled asymmetry |
| 8–10 | bolder editorial/Bento composition, larger scale contrast, stronger offsets |

Default: **5**.

High variance may change composition, not component semantics. Do not use high variance to justify inconsistent spacing or random card sizes.

## 4.2 Motion — animation intensity

`--lg-motion: 1..10`

| Range | Behavior |
| --- | --- |
| 1–3 | hover, press, focus, switch/thumb motion only |
| 4–7 | standard reveal/stagger and local spatial transitions |
| 8–10 | advanced choreography, scroll-linked or FLIP-style transitions, only where justified |

Default: **4** for product UI, **5** for marketing pages.

Even at 10, motion must remain interruptible and honor `prefers-reduced-motion`.

## 4.3 Density — information compactness

`--lg-density: 1..10`

| Range | Spacing character | Typical use |
| --- | --- | --- |
| 1–3 | spacious | brand/marketing, luxury commerce |
| 4–7 | standard | storefronts, SaaS, general web apps |
| 8–10 | compact | dense dashboards and data tools |

Default: **5**.

Density may reduce spacing but must not reduce interactive hit areas below the accessibility floor.

---

# 5. Visual grammar

## 5.1 Canvas and scene

The reference scene uses a warm neutral wall, a broad upper-left ambient light, and a cool diagonal architectural shadow from the upper-right.

Recommended layers, back to front:

1. base canvas color;
2. low-frequency ambient light;
3. optional architectural shadow or brand image;
4. distant color spill;
5. glass shell;
6. component cast shadows;
7. glass surfaces and content;
8. local highlight / iridescent hairline.

The shell must separate from the background without requiring a hard dark outline.

**Legibility invariant:** content must remain understandable if all scene gradients are removed.

## 5.2 Material hierarchy

Use four material families:

| Material | Typical use | Fill | Rim | Blur | Depth |
| --- | --- | --- | --- | --- | --- |
| **Shell glass** | app frame, hero shell, modal group | white/brand tint at ~.08–.24 | 1–1.5px bright rim | 8–16px | long soft cast |
| **Clear glass** | rows, chips, tabs, toggles, quiet cards | ~.12–.50 | 1px bright rim | 6–10px | short + medium cast |
| **Refracted glass** | hero card, promo, featured product/action | colored gradients + local caustics | white/iridescent hairline | 8–14px | colored spill + neutral cast |
| **Opaque highlight** | input, selected thumb, CTA, knob | white → warm-white gradient | ~1px | none/optional | short contact shadow |

A page does **not** become more Liquid Glass by increasing the number of glass cards. Material hierarchy is more important than material quantity.

## 5.3 Light and depth

Global light direction: upper-left → lower-right.

Use:

- 1–2px bright top rim;
- faint bright left rim;
- restrained lower inner glow;
- immediate contact shadow under the object;
- longer cast shadow translated approximately `24–40px` right and `24–40px` down, blurred `12–20px` for the reference scale.

The long cast shadow belongs to a wrapper/elevation layer when possible, allowing the object and shadow to respond consistently to lift/press interactions.

## 5.4 Refraction budget

Refraction is a scarce emphasis resource.

Recommended maximum at one desktop viewport:

- 1 dominant refracted hero/feature surface;
- 1 secondary refracted callout;
- 2–4 small iridescent hairline accents;
- ordinary rows/cards remain clear glass or opaque highlight.

Avoid animated chromatic blur behind body text.

## 5.5 Surface quiet zones

Every surface containing text needs a local quiet zone. A quiet zone is an area where luminance and color variation remain small enough that the text contrast does not fluctuate during interaction.

For rich promo/hero cards:

- push caustics toward corners and outer edges;
- reserve a calm text area;
- place CTA text on an opaque/semi-opaque local surface if the background is dynamic.

---

# 6. Token architecture — Primitive → Semantic → Component

Version 2.0 replaces a mostly flat token model with a three-layer architecture.

```text
Primitive tokens
(raw values; never encode product meaning)
        ↓
Semantic tokens
(role and intent; theme-aware)
        ↓
Component tokens
(local contract; no raw values in component rules)
```

## 6.1 Primitive tokens

Examples:

```css
:root {
  --lg-violet-700: #5d47e2;
  --lg-violet-600: #6c55ea;
  --lg-violet-500: #8467ef;
  --lg-violet-300: #a68df6;

  --lg-teal-600: #38bda8;
  --lg-teal-400: #56cfba;
  --lg-teal-200: #97e3d4;

  --lg-neutral-950: #101012;
  --lg-neutral-900: #131316;
  --lg-neutral-800: #26262b;
  --lg-neutral-600: #55555e;
  --lg-neutral-500: #7a7884;

  --lg-warm-050: #f8f5f2;
  --lg-warm-100: #f4f1ee;
  --lg-warm-200: #e9e0d7;

  --lg-green-500: #2fbf55;
  --lg-red-500: #c84d68;
  --lg-amber-500: #bd7a2d;
}
```

Primitive names describe color/scale, not purpose.

## 6.2 Semantic tokens

```css
:root {
  --color-canvas: var(--lg-warm-200);
  --color-fg: var(--lg-neutral-900);
  --color-fg-strong: var(--lg-neutral-950);
  --color-fg-soft: var(--lg-neutral-800);
  --color-muted: var(--lg-neutral-600);
  --color-muted-soft: var(--lg-neutral-500);

  --color-primary: var(--lg-violet-600);
  --color-primary-strong: var(--lg-violet-700);
  --color-primary-soft: var(--lg-violet-300);
  --color-on-primary: #fff;

  --color-secondary: var(--lg-teal-400);
  --color-secondary-strong: var(--lg-teal-600);
  --color-secondary-soft: var(--lg-teal-200);
  --color-on-secondary: #fff;

  --color-success: var(--lg-green-500);
  --color-danger: var(--lg-red-500);
  --color-warning: var(--lg-amber-500);

  --color-focus: color-mix(in srgb, var(--color-primary) 62%, transparent);
  --color-selection: color-mix(in srgb, var(--color-primary) 16%, transparent);
  --color-disabled-fg: rgb(38 38 43 / .42);
}
```

Semantic names describe what the color **does**.

## 6.3 Component tokens

```css
:root {
  --button-primary-bg: var(--gradient-primary);
  --button-primary-fg: var(--color-on-primary);
  --button-primary-radius: var(--radius-pill);
  --button-primary-shadow: var(--shadow-contact);

  --field-bg: var(--gradient-highlight);
  --field-fg: var(--color-fg-soft);
  --field-radius: var(--radius-xl);

  --card-glass-bg: var(--gradient-surface);
  --card-glass-rim: var(--rim-glass);
  --card-glass-radius: var(--radius-lg);
}
```

**Hard rule:** components should not introduce arbitrary raw values when an existing token can represent the role.

---

# 7. Foundation tokens

## 7.1 Gradient roles

```css
:root {
  --gradient-primary:
    linear-gradient(90deg,
      var(--color-primary-strong),
      var(--color-primary) 58%,
      var(--color-primary-soft));

  --gradient-secondary:
    linear-gradient(90deg,
      var(--color-secondary),
      var(--color-secondary-soft));

  --gradient-surface:
    linear-gradient(150deg,
      rgb(255 255 255 / .50),
      rgb(255 255 255 / .22) 52%,
      rgb(255 255 255 / .32));

  --gradient-highlight:
    linear-gradient(180deg,
      rgb(255 255 255 / .96),
      rgb(250 247 244 / .86));

  --gradient-iridescent:
    conic-gradient(from 200deg,
      var(--lg-violet-300),
      #f4a8d9 18%,
      #fff 34%,
      var(--lg-teal-200) 52%,
      #8f86ff 74%,
      var(--lg-violet-300));
}
```

Use one dominant gradient per normal component. Rich feature surfaces may add a limited number of radial color sources.

## 7.2 Spacing

Use a 4px base grid.

```css
:root {
  --space-1: 4px;
  --space-2: 8px;
  --space-3: 12px;
  --space-4: 16px;
  --space-5: 20px;
  --space-6: 24px;
  --space-8: 32px;
  --space-10: 40px;
  --space-12: 48px;
  --space-16: 64px;
  --space-20: 80px;
  --space-24: 96px;
}
```

Density profiles may remap semantic spacing aliases, not the primitive 4px rhythm.

## 7.3 Radius hierarchy

```css
:root {
  --radius-xs: 8px;
  --radius-sm: 10px;
  --radius-md: 16px;
  --radius-lg: 22px;
  --radius-xl: 28px;
  --radius-shell: 36px;
  --radius-pill: 999px;
  --radius-circle: 50%;
}
```

Reference hierarchy:

- shell: 36px;
- feature cards: 22–24px;
- pills/rows: 26–29px;
- circular controls: 50%.

## 7.4 Typography

Use a neutral sans-serif with a high x-height. Inter is the Latin reference. For Persian products, use a tested Persian/Arabic family that preserves comparable weight and x-height behavior; see §18.

```css
:root {
  --font-sans: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", sans-serif;

  --text-xs-size: 12px;
  --text-xs-line: 16px;
  --text-sm-size: 14px;
  --text-sm-line: 20px;
  --text-md-size: 16px;
  --text-md-line: 24px;
  --text-lg-size: 20px;
  --text-lg-line: 28px;
  --text-xl-size: 24px;
  --text-xl-line: 32px;
  --text-display-size: clamp(32px, 5vw, 64px);
  --text-display-line: 1.04;

  --weight-regular: 400;
  --weight-medium: 500;
  --weight-semibold: 600;
  --weight-bold: 700;
}
```

Production body text should normally begin at **16px**. Compact metadata may be smaller, but essential body copy should not be compressed simply to preserve a screenshot composition.

For large Latin headings, `letter-spacing: -0.01em` may be used. Do not copy negative Latin tracking values directly to Persian/Arabic type.

## 7.5 Blur, rim, and elevation

```css
:root {
  --blur-glass: blur(8px) saturate(105%);
  --blur-glass-strong: blur(12px) saturate(112%);

  --rim-glass:
    inset 0 1.5px 0 rgb(255 255 255 / .95),
    inset 1.5px 0 1px rgb(255 255 255 / .45),
    inset 0 -1.5px 1px rgb(255 255 255 / .55),
    inset 0 0 18px rgb(255 255 255 / .12),
    0 1px 2px rgb(60 45 40 / .06);

  --shadow-contact: 0 2px 6px rgb(60 45 40 / .14);
  --shadow-cast: 28px 34px 14px rgb(62 50 44 / .28);
  --shadow-float:
    32px 40px 46px rgb(78 64 56 / .24),
    8px 10px 14px rgb(78 64 56 / .10);
}
```

Use `filter: drop-shadow()` only for isolated SVG/transparent shapes where `box-shadow` is semantically wrong.

## 7.6 Motion

```css
:root {
  --ease-liquid: cubic-bezier(.30, .70, .20, 1);
  --duration-instant: 100ms;
  --duration-fast: 160ms;
  --duration-standard: 300ms;
  --duration-slow: 450ms;
}
```

Guidance:

- hover: usually 160–300ms;
- press: visually immediate, normally ≤160ms;
- switch/tab spatial movement: ~300–450ms;
- complex reveal: only when motion dial justifies it;
- exit may be slightly faster than entrance;
- motion must not delay the actual semantic state update.

## 7.7 Control and focus metrics

```css
:root {
  --control-min: 44px;
  --focus-width: 2px;
  --focus-offset: 3px;
}
```

Do not shrink a hit area because the visible glyph is small. The visible icon may be 16–24px while the interactive target remains ≥44px.

## 7.8 Layering / z-index

Use named layers, not arbitrary `z-index: 9999` values.

```css
:root {
  --z-base: 0;
  --z-raised: 10;
  --z-sticky: 30;
  --z-popover: 50;
  --z-modal: 70;
  --z-toast: 90;
}
```

Decorative refraction must not block pointer events.

---

# 8. Layout and composition

## 8.1 Reference specimen geometry

The original specimen is a 736×920 artboard. Its shell is approximately 615×673px at `(60,125)` and uses an asymmetric 40/60 rhythm.

Reference anchors:

- shell inset ≈ 33px;
- left controls ≈ 212–225px wide;
- right feature region ≈ 298px wide;
- title ≈ 24px, about 31px from shell top;
- major vertical anchors around 87, 174, 258, 349, 437, and 570px relative to the shell.

These are specimen measurements, **not production responsive coordinates**.

## 8.2 Production grid

Desktop baseline:

- 12-column grid;
- 24px gutters;
- 32px outer padding;
- main task: 7–8 columns;
- utility/secondary task: 4–5 columns;
- ≥24px between independent surface groups.

Marketing pages may use full-width sections while preserving a constrained content column and one dominant glass anchor per viewport.

## 8.3 Responsive behavior

Recommended starting breakpoints: 640px, 768px, 1024px, but behavior should be content-driven.

Rules:

- mobile first;
- reflow, do not uniformly scale the desktop canvas;
- no accidental horizontal scrolling;
- 20–24px shell padding on narrow screens;
- shell radius may reduce to 24–28px on mobile;
- secondary columns move below the primary task;
- decorative desktop chrome may disappear on mobile;
- text remains at accessible size;
- allow vertical scrolling whenever content exceeds the viewport.

## 8.4 Content resilience

Design for unpredictable content, not demo strings.

- headings may wrap naturally; do not depend on a particular final word staying on one line;
- essential text must reflow at narrow widths, browser zoom, text scaling, and custom text spacing;
- long URLs, SKUs, order IDs, and identifiers need safe wrapping rules;
- chips/tags should wrap, scroll in an explicitly operable region, or use an accessible `+n` disclosure;
- truncation is acceptable only when the complete value remains available by an accessible path;
- dynamic badges must reserve enough width to avoid layout jumps;
- price and quantity UI should be tested with long localized number formats.

Useful CSS:

```css
.lg-safe-text {
  overflow-wrap: anywhere;
  word-break: normal;
}

.lg-chip-row {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-2);
}
```

---

# 9. Component contract format

Every component specification should define:

1. **Role**
2. **Anatomy**
3. **Material family**
4. **Size and spacing**
5. **States**
6. **Responsive behavior**
7. **Accessibility semantics**
8. **Performance notes**
9. **RTL behavior**

Minimum state matrix:

| Property | Default | Hover | Focus | Active | Disabled | Loading/Selected if relevant |
| --- | --- | --- | --- | --- | --- | --- |
| fill | stable | small luminance shift | stable | darker/pressed | muted | semantic state |
| rim | subtle | brighter | + focus ring | reduced | muted | semantic state |
| shadow | normal | slightly longer | normal | compressed | minimal | stable |
| transform | none | lift ~1px | none | press/compress | none | state-specific |
| cursor | pointer/text | same | same | same | not-allowed/default | progress if needed |

Never define only `default` and `hover`.

---

# 10. Core component contracts

## 10.1 Glass shell / page frame

**Role:** dominant physical container for the main task.

**Material:** Shell glass.

**Rules:**

- use `--radius-shell`;
- desktop internal padding usually 28–36px;
- one major floating shadow, not several competing shadows;
- clip decorative caustics, not meaningful focus rings;
- content contrast must remain valid independent of scene imagery.

## 10.2 Primary button

**Role:** one high-confidence action in a local task group.

**Material:** saturated gradient + polished rim.

**Rules:**

- ≥44px hit height;
- 14–16px semibold label minimum;
- white/on-primary text only if contrast is sufficient;
- generally one primary button per local decision group;
- press compresses; hover slightly lifts.

## 10.3 Secondary action

Secondary does **not** mean a visually weaker duplicate. It should represent a distinct supporting action. Use the cool/warm accent family and maintain readable contrast.

## 10.4 Icon button / FAB

- visual circle 44–56px when possible;
- meaningful `aria-label` / accessible name required;
- do not use unlabeled nonstandard icons;
- tooltip is supplementary, not the accessible name;
- opaque highlight is preferred behind dark icons when glass becomes noisy.

## 10.5 Input / search field

- opaque or near-opaque highlight surface above glass;
- explicit visible label for forms; a search field may use a contextual accessible label plus placeholder;
- placeholder is not the only instruction;
- focus ring must appear outside the decorative rim;
- errors belong near the field and are programmatically associated.

## 10.6 Glass card

- clear glass by default;
- 16–24px padding;
- 16–24px radius;
- selected card uses one dominant selection channel plus a secondary cue;
- do not simultaneously add thick brand border, bright glow, colored fill, and large checkmark unless the state would otherwise be ambiguous.

## 10.7 List/search result row

- 44–56px minimum interactive height when clickable;
- stable label baseline;
- trailing action remains within an obvious hit region;
- selected state does not cause layout shift;
- long text can wrap or truncate with accessible full value.

## 10.8 Chip / filter / badge

- pill geometry;
- interactive chips use button/checkbox semantics;
- selected state uses more than color alone;
- chip labels should stay intact when practical;
- chip collections wrap or provide explicit overflow handling;
- badge meaning is never hue-only.

## 10.9 Toggle / switch

- custom switch must expose programmatic checked state;
- knob movement uses the liquid easing curve;
- on/off difference uses position + fill/rim/icon/label, not color only;
- semantic state changes immediately, even if animation is interrupted.

## 10.10 Segmented tabs

- use real tab semantics when changing sibling panels;
- support ArrowLeft/ArrowRight and Home/End when implemented as ARIA tabs;
- animate the thumb, not the label position;
- selected label remains high-contrast;
- motion interruption must resolve to the latest selected tab.

## 10.11 Promo / feature card

- richer refraction allowed;
- one heading, one supporting message, one primary local action;
- text sits in a quiet zone;
- CTA may use an opaque highlight button;
- animated gradient is not required and is discouraged behind text.

## 10.12 Navigation shell

For glass navigation bars:

- preserve clear active state;
- use blur only where content remains readable while scrolling;
- sticky headers must not obscure keyboard focus targets;
- mobile navigation should not exceed practical item limits; move secondary items to a menu/drawer;
- respect safe-area insets where relevant.

## 10.13 Commerce product card

For e-commerce adaptations:

- product image remains the primary visual, not the glass effect;
- title and price use a quiet legible area;
- sale/availability badges do not rely on color only;
- card click target must not conflict with nested wishlist/add-to-cart actions;
- keep CTA hierarchy clear: product detail vs. add-to-cart vs. wishlist;
- variable products show attributes without overloading the card.

## 10.14 Hero section

A Liquid Glass hero should have:

- one dominant content thesis;
- one primary CTA and at most one secondary CTA;
- one major material anchor (glass copy panel, feature card, or product-stage overlay);
- decorative refraction biased away from body copy;
- responsive crop/safe zones for imagery;
- no critical text baked into raster imagery.

---

# 11. Interaction and state model

Every interactive control must define applicable states from:

- default;
- hover;
- focus-visible;
- pressed/active;
- disabled;
- selected/checked;
- loading;
- success;
- warning;
- error;
- expanded/collapsed.

## 11.1 Two-channel state rule

When color carries state, add at least one other channel:

- color + icon;
- fill + position;
- border + text;
- shape + label;
- color + aria/programmatic state.

## 11.2 Base interaction recipe

```css
.liquid-control {
  transition:
    transform var(--duration-standard) var(--ease-liquid),
    filter var(--duration-standard) var(--ease-liquid),
    box-shadow var(--duration-standard) var(--ease-liquid),
    background-color var(--duration-fast) linear;
}

@media (hover: hover) {
  .liquid-control:hover {
    transform: translateY(-1px);
    filter: brightness(1.04) saturate(1.05);
  }
}

.liquid-control:active {
  transform: translateY(1px) scale(.985);
  filter: brightness(.97);
}

.liquid-control:focus-visible {
  outline: var(--focus-width) solid var(--color-focus);
  outline-offset: var(--focus-offset);
}

@media (prefers-reduced-motion: reduce) {
  .liquid-control {
    transition-duration: 0.01ms;
  }
}
```

## 11.3 Rapid interaction / interruption

Animation is subordinate to state correctness.

If the user rapidly toggles, tabs, filters, opens/closes, or navigates:

- cancel or retarget outdated animation;
- final visual state must match final semantic state;
- focus must not be lost;
- stale async content must not overwrite newer state;
- never queue decorative animations that make the UI feel delayed.

---

# 12. Forms and feedback

## 12.1 Labels

Use persistent visible labels for important forms. Placeholder-only forms are not allowed.

## 12.2 Validation

- validate at a useful time, not on every keystroke when it becomes distracting;
- place error text near the field;
- connect error/help text with `aria-describedby` where appropriate;
- when submit fails, provide an error summary for multi-field forms and move/focus logically if needed;
- preserve entered data.

## 12.3 Loading

- asynchronous actions provide immediate feedback;
- avoid disabling the entire interface when only one region is loading;
- reserve dimensions for content to avoid layout shift;
- skeletons should match likely content geometry and must not become permanent shimmer decoration.

## 12.4 Success

Do not rely only on a green flash. Use text, icon, persistent state, or a meaningful next action.

---

# 13. Navigation and information architecture

The glass material does not determine information architecture.

Rules:

- navigation hierarchy must be predictable before styling;
- current location has a visible and programmatic active state;
- browser/back behavior should remain natural on the web;
- deep-linkable states should use URLs where appropriate;
- avoid hidden navigation that exists only for visual cleanliness;
- do not use a carousel as a substitute for critical navigation.

---

# 14. Accessibility contract

Accessibility is part of the material definition, not a later audit.

## 14.1 Contrast

Target WCAG AA for text and meaningful icons against the **rendered local surface**. Glass contrast must be tested against the actual scene, not only the nominal background token.

When contrast varies because of imagery/refraction:

- increase local opacity;
- add a quiet backing layer;
- move the text;
- reduce caustic intensity.

Do not fix contrast by adding permanent text shadow as the only technique.

## 14.2 Keyboard

- logical tab order;
- visible focus on every interactive control;
- no focus trap except intentional modal patterns;
- sticky glass bars must not obscure focused content;
- tab/switch/menu semantics must match behavior.

## 14.3 Touch / pointer

- primary touch targets ≥44×44px;
- maintain meaningful spacing between independent targets;
- do not make hover the only way to reveal an essential action.

## 14.4 Motion

Honor `prefers-reduced-motion`. Reduced motion should remove nonessential movement while preserving state changes and spatial clarity.

## 14.5 Forced colors / high contrast

Decorative rims and gradients may disappear. Controls must remain distinguishable through semantic borders, text, native controls, or explicit forced-color rules.

## 14.6 Zoom and text scaling

Test at least:

- 200% browser zoom;
- narrow viewport + large text;
- user line/letter/word spacing overrides when feasible.

Essential content must not clip or overlap.

---

# 15. Performance and resilience

Glass can be expensive. Performance is part of quality.

## 15.1 Blur budget

- prefer a small number of larger intentional glass regions rather than dozens of separately composited blur surfaces;
- avoid animating `backdrop-filter` over large areas;
- do not put heavy blur on every scrolling card;
- reduce blur/refraction on low-power or small-screen profiles if necessary.

## 15.2 Animation performance

Prefer animation of `transform` and `opacity`. Avoid frequent animation of layout properties such as width/height/top/left when a transform can represent the same visual change.

Do not add `will-change` globally; use it only when profiling justifies it.

## 15.3 Images

- use responsive image sizing;
- modern formats such as WebP/AVIF when supported by the publishing stack;
- specify dimensions/aspect ratio to reduce CLS;
- lazy-load below-the-fold media when appropriate;
- never lazy-load the primary LCP hero image without understanding the performance impact.

## 15.4 Layout stability

Reserve space for:

- hero media;
- product images;
- async badges/prices;
- font loading where metrics differ;
- dynamic alerts/toasts that should not push key content unexpectedly.

## 15.5 Backdrop-filter fallback

```css
@supports not ((backdrop-filter: blur(1px)) or (-webkit-backdrop-filter: blur(1px))) {
  .liquid-surface {
    background: rgb(246 241 237 / .92);
  }
}
```

The fallback should look intentional, not broken.

---

# 16. Dark mode

Do not invert the light theme mechanically.

Dark Liquid Glass should:

- retain a readable light rim;
- use a darker but visible shell fill;
- reduce white opacity where it becomes foggy;
- recalculate text and icon contrast;
- restrain saturated caustics to avoid neon overload;
- maintain visible focus independent of background color.

Dark mode changes semantic tokens, not component structure.

Example:

```css
[data-theme="dark"] {
  --color-canvas: #111217;
  --color-fg: #f6f6f8;
  --color-fg-strong: #ffffff;
  --color-fg-soft: #ddddE5;
  --color-muted: #a7a7b2;

  --gradient-surface:
    linear-gradient(150deg,
      rgb(255 255 255 / .16),
      rgb(255 255 255 / .06) 52%,
      rgb(255 255 255 / .10));
}
```

---

# 17. Implementation architecture

Separate four concerns:

1. **Primitive tokens** — raw values;
2. **Semantic tokens** — product roles and theme meanings;
3. **Material primitives** — glass, highlight, rim, shadow, refraction utilities;
4. **Semantic components** — button, field, card, product card, nav, row, chip, switch, tabs, promo, etc.

## 17.1 Reusable surface primitive

```css
.liquid-surface {
  position: relative;
  isolation: isolate;
  background: var(--card-glass-bg, var(--gradient-surface));
  border: 1px solid rgb(255 255 255 / .72);
  border-radius: var(--card-glass-radius, var(--radius-lg));
  box-shadow: var(--card-glass-rim, var(--rim-glass));
  -webkit-backdrop-filter: var(--blur-glass);
  backdrop-filter: var(--blur-glass);
}

.liquid-surface::before {
  content: "";
  position: absolute;
  inset: 3px;
  border: 1px solid rgb(255 255 255 / .32);
  border-radius: inherit;
  pointer-events: none;
}
```

## 17.2 Wrapper cast shadow

```css
.liquid-elevation {
  position: relative;
}

.liquid-elevation::after {
  content: "";
  position: absolute;
  inset: 0;
  z-index: -1;
  border-radius: inherit;
  background: var(--shadow-color, rgb(62 50 44 / .28));
  transform: translate(
    var(--shadow-x, 28px),
    var(--shadow-y, 34px)
  );
  filter: blur(var(--shadow-blur, 14px));
  pointer-events: none;
}
```

## 17.3 Iridescent hairline

Prefer a pseudo-element/mask so the interior surface remains independently controllable. Do not add extra DOM nodes only to draw a border when CSS can do it cleanly.

## 17.4 Progressive enhancement

The semantic interface should work first. Then add:

1. semantic HTML / native controls;
2. responsive layout;
3. color and type;
4. base glass material;
5. rim/elevation;
6. refraction;
7. motion.

A failure at a later layer must not break an earlier one.

---

# 18. RTL and Persian localization contract

Liquid Glass must be direction-aware.

## 18.1 Use logical properties

Prefer:

```css
.card {
  padding-inline: var(--space-5);
  margin-inline-start: var(--space-3);
  border-start-start-radius: var(--radius-lg);
}
```

Avoid hardcoding `left`/`right` in production components unless the position is intentionally physical rather than logical.

## 18.2 Direction-sensitive icons

Mirror only directional/navigation icons where meaning changes with reading direction. Do **not** mirror universal symbols such as search, plus, play, camera, or brand marks without a specific reason.

## 18.3 Persian typography

- choose a Persian font with complete weights actually used by the product;
- test numerals, punctuation, mixed Latin/Persian terms, price strings, and email/URL fields;
- do not apply Latin negative letter-spacing values blindly;
- maintain readable line-height; Persian glyphs often need more vertical room than tightly set Latin UI type;
- preserve at least 16px equivalent for essential body copy.

## 18.4 Mixed direction content

Use appropriate `dir="auto"`, `<bdi>`, or isolated fields for IDs, phone numbers, email addresses, URLs, SKU codes, and mixed-script user content.

## 18.5 Persian commerce

Test:

- تومان / ریال formatting;
- Persian and Latin digits according to product policy;
- long product names;
- variable attributes;
- sale price + previous price + discount badge;
- mobile CTA order in RTL.

---

# 19. Theming contract

A theme may change:

- brand hue;
- accent hue;
- canvas temperature;
- image/illustration style;
- typography family;
- density profile;
- motion profile;
- page composition within the variance rules.

A theme should **not** change without a documented system update:

- material layering order;
- global light direction;
- radius hierarchy;
- minimum interaction target size;
- focus behavior;
- accessibility priority;
- Primitive → Semantic → Component token separation;
- calm tactile motion language.

Before building an entire theme, validate at least:

1. primary button;
2. opaque field;
3. clear glass row/card;
4. selected chip/switch;
5. refracted promo/hero surface;
6. focus state;
7. dark/fallback surface where applicable.

---

# 20. Master + page override governance

For real products, persist the design language hierarchically.

Recommended structure:

```text
design-system/
  liquid-glass/
    MASTER.md
    pages/
      home.md
      shop.md
      product.md
      cart.md
      dashboard.md
```

## 20.1 `MASTER.md`

Contains global non-negotiables, tokens, material rules, component contracts, accessibility floor, and shared motion behavior.

## 20.2 Page override

A page file may override only what is necessary, for example:

- hero composition;
- density;
- local accent color;
- page-specific component variants;
- animation intensity;
- content hierarchy.

A page override must state **what it overrides and why**. Silence means Master wins.

## 20.3 Precedence

```text
User/legal/accessibility requirements
        ↓
Page override
        ↓
Liquid Glass MASTER
        ↓
Verified external design intelligence
        ↓
Framework defaults
```

## 20.4 Safe updates

Never regenerate/overwrite an existing Master blindly. Read it first. Preserve project-specific decisions. Force replacement requires explicit authorization.

---

# 21. UI/UX Pro Max integration workflow for agents

Use external design intelligence to adapt the system to a product, not to replace it.

## 21.1 Step 1 — Analyze the project

Determine:

- product type;
- target audience and usage context;
- page type;
- style keywords;
- brand colors/assets;
- locale/direction;
- implementation stack;
- current design-system files;
- performance/accessibility constraints.

Do not assume the stack. Detect it from project files when possible.

## 21.2 Step 2 — Generate product-level design intelligence

For a new page or project, use the repository's design-system search mode.

Example pattern:

```bash
python <ui-ux-pro-max>/scripts/search.py \
  "<product type> <industry> <2-5 style/context terms>" \
  --design-system \
  -p "<Project Name>"
```

Use short, single-intent queries. Do not send private project data to external services.

## 21.3 Step 3 — Supplement only the unresolved concerns

Use focused domains such as:

- `product` — product pattern;
- `style` — visual style compatibility;
- `color` — semantic palette;
- `typography` / `google-fonts` — type pairing;
- `landing` — marketing page structure;
- `ux` — accessibility, forms, navigation, layout resilience;
- `icons` — semantic icon choices;
- `gsap` — advanced motion when justified;
- `chart` — data visualization;
- stack mode — framework-specific implementation.

Do not run broad searches for every category when the Master already makes the decision.

## 21.4 Step 4 — Merge, do not overwrite

Translate verified recommendations into:

- semantic color token overrides;
- type tokens;
- page composition rules;
- component variants;
- Design Dial values;
- page-specific overrides.

Never copy raw recommendation output directly into production without checking it against this Master.

## 21.5 Step 5 — Validate

Run the QA checklist in §24 and record any item that could not be verified.

---

# 22. AI implementation contract

Use this block at the top of a design-to-code task:

> Implement the interface using **Liquid Glass Design Language v2.0**. Treat the supplied `MASTER.md` as the visual/material source of truth and any page-specific file as an explicit override. Build semantic, accessible, responsive HTML/components first; then apply the Liquid Glass material layer. Preserve the upper-left light direction, translucent surfaces, bright rim, short contact shadow, longer lower-right cast shadow, generous radius hierarchy, restrained iridescent accents, and calm tactile motion. Use Primitive → Semantic → Component tokens; do not scatter raw hex/radius/shadow values through components. Use one clear primary action per local task group and one dominant visual anchor per viewport. Use grid/flex/container behavior for production layouts; fixed artboard coordinates are allowed only for reference-specimen reproduction. Support keyboard, visible focus, touch targets ≥44px, reduced motion, zoom/text reflow, `backdrop-filter` fallback, and RTL if the project is Persian/Arabic. Motion is interruptible and must never outrun semantic state. If external UI/UX recommendations are used, merge them as product/page overrides rather than replacing this design language. Before finishing, run the visual, interaction, accessibility, responsive, performance, RTL, and engineering QA checks and report unverified items honestly.

## 22.1 Agent behavior rules

The implementing agent should:

- inspect existing project files before choosing stack-specific patterns;
- reuse existing components/tokens when compatible;
- avoid unnecessary dependencies;
- not rewrite unrelated sections of the site;
- preserve CMS/Elementor editability when required;
- keep content editable rather than baking text into images;
- make small verified changes rather than uncontrolled visual rewrites;
- compare against supplied reference imagery where pixel fidelity is required;
- report compromises caused by browser/CMS constraints.

---

# 23. Reference-specimen and visual-regression workflow

The supplied HTML/CSS specimen uses a fixed 736×920 artboard and an optional reference overlay. That approach is useful for verifying the **specimen**, but not for production layout.

Recommended workflow for pixel-match tasks:

1. render at the exact reference viewport;
2. capture screenshot;
3. overlay at ~50% opacity or use difference blending;
4. correct geometry first;
5. correct type metrics second;
6. correct material/blur/rims third;
7. correct shadow/refraction last;
8. retest focus, keyboard, mobile, and reduced motion after visual tuning.

Do not sacrifice production semantics to achieve a screenshot match.

---

# 24. Pre-delivery QA checklist

## 24.1 Critical — must pass

### Accessibility

- [ ] Body/essential text contrast is verified against the rendered local surface.
- [ ] Every interactive control is keyboard reachable.
- [ ] Focus is clearly visible and not clipped/obscured.
- [ ] Icon-only actions have accessible names.
- [ ] Color is not the only carrier of state/meaning.
- [ ] Touch targets are at least 44×44px for primary controls.
- [ ] Reduced-motion mode is usable.
- [ ] 200% zoom does not hide essential content.

### Interaction

- [ ] Default, focus, pressed, disabled, and relevant selected/loading/error states exist.
- [ ] Rapid repeated interactions end in the correct semantic state.
- [ ] Async actions show timely progress/feedback.
- [ ] Forms retain user data after validation errors.

### Responsive

- [ ] No accidental horizontal scroll at supported widths.
- [ ] Desktop columns reflow rather than scale down as a canvas.
- [ ] Long labels and identifiers do not break layout.
- [ ] Navigation remains operable on narrow screens.

## 24.2 High priority — should pass

### Performance

- [ ] Large scrolling regions are not covered by unnecessary animated blur.
- [ ] Images reserve layout space and use appropriate responsive formats/sizes.
- [ ] No obvious CLS from media, price, badges, fonts, or async regions.
- [ ] Motion prefers transform/opacity where practical.
- [ ] `backdrop-filter` fallback looks intentional.

### Visual system

- [ ] Upper-left → lower-right light direction is consistent.
- [ ] Shell/clear/refracted/opaque materials have distinct roles.
- [ ] Primary and secondary actions are visually distinct.
- [ ] Iridescent accents remain thin and purposeful.
- [ ] Radius and spacing use shared tokens.
- [ ] One dominant visual anchor exists per viewport.
- [ ] Text sits in quiet zones on refracted surfaces.

## 24.3 Engineering

- [ ] Primitive, semantic, and component tokens are separated.
- [ ] Components do not scatter raw brand hex values.
- [ ] Component names describe semantics rather than only appearance.
- [ ] Decorative layers use `pointer-events: none` where appropriate.
- [ ] Decorative elements are hidden from accessibility APIs when appropriate.
- [ ] No duplicate material primitive exists for the same role.
- [ ] z-index values use a documented layer scale.
- [ ] The implementation reports unverified browser/performance checks honestly.

## 24.4 RTL / Persian

- [ ] `dir="rtl"` layout is intentionally tested, not achieved only by text alignment.
- [ ] Logical CSS properties are used for direction-sensitive spacing/positioning.
- [ ] Directional icons mirror correctly; universal symbols do not.
- [ ] Mixed Persian/Latin/numeric content renders in correct order.
- [ ] Persian font weights and line-height are verified.
- [ ] Price, discount, quantity, and product-attribute strings fit mobile layouts.

## 24.5 CMS / WordPress when applicable

- [ ] Content fields remain editable in the CMS/Elementor.
- [ ] Global design tokens are centralized instead of copied into many widgets.
- [ ] Custom CSS selectors are scoped and stable.
- [ ] Theme/plugin updates do not require editing generated core files where avoidable.
- [ ] Decorative effects do not prevent normal editor interaction.

---

# 25. Reference mapping from the supplied specimen

The current Liquid Glass Kit maps to the generalized contracts as follows:

| Specimen class/component | Design-system role |
| --- | --- |
| `panel` / `panel__glass` | Shell glass |
| `btn--primary` | Primary action |
| `btn--secondary` | Secondary action |
| `fab` / `bubble` | Icon action / utility action |
| `field` / `search` | Opaque input surface |
| `ws-card` | Clear glass card |
| `tabs` | Segmented tabs |
| `search-card` | Refracted feature surface |
| `search-row` | List/result row |
| `chip` | Filter / compact state |
| `toggle` | Switch |
| `promo` | Refracted promo/callout |
| `.el::before` | Separated cast-shadow layer |
| `::after` iridescent masks | Hairline spectral accent |

The specimen uses fixed coordinates because it is a controlled visual reference. Production pages should preserve these roles while using responsive layout primitives.

---

# 26. Recommended project profiles

| Profile | Variance | Motion | Density | Refraction | Best fit |
| --- | ---: | ---: | ---: | --- | --- |
| Luxury commerce | 5–7 | 4–6 | 3–5 | medium/high | fashion, eyewear, beauty, premium retail |
| General storefront | 4–6 | 3–5 | 5–6 | medium | e-commerce catalogs |
| SaaS workspace | 4–6 | 3–5 | 5–7 | low/medium | productivity, admin tools |
| Dense dashboard | 3–5 | 2–4 | 8–10 | low | analytics, internal ops |
| Creative portfolio | 7–9 | 6–8 | 2–4 | high | creative/brand work |
| Editorial/content | 3–5 | 2–4 | 3–5 | low | blogs, magazines, reading-heavy pages |

These are starting profiles, not mandatory templates.

---

# 27. Versioning

Increment **major** when changing any of:

- material grammar;
- token architecture;
- radius hierarchy;
- interaction model;
- accessibility contract;
- precedence/governance rules.

Increment **minor** when adding:

- a component contract;
- a semantic token;
- a new page/profile guideline;
- a new verified integration rule without breaking existing behavior.

Increment **patch** for:

- wording corrections;
- token value corrections that do not change intended semantics;
- clarifications and examples.

## 27.1 Changelog

### 2.0 · 2026-10-18

- Added three-layer token architecture.
- Added priority-ordered UX quality model.
- Added variance/motion/density design dials.
- Added Master + page override governance.
- Added performance and content-resilience rules.
- Added forms, navigation, commerce, hero, loading, and rapid-interaction contracts.
- Added RTL/Persian contract.
- Added agent workflow and UI/UX Pro Max integration guidance.
- Expanded QA into critical, performance, engineering, RTL, and CMS checks.
- Kept original Liquid Glass visual identity and reference mapping.

### 1.0 · 2026-10-14

- Initial reusable Liquid Glass visual and interaction contract based on the supplied Liquid Glass Kit.

---

# Appendix A — Suggested source-of-truth files

For a production repository:

```text
design-system/liquid-glass/MASTER.md       # this document
styles/tokens.primitives.css               # raw values
styles/tokens.semantic.css                 # themes / roles
styles/tokens.components.css               # component aliases
styles/liquid-materials.css                # glass primitives
components/                                # semantic components
design-system/liquid-glass/pages/          # page overrides
```

If the project already has a design-token or theme architecture, map this system into that architecture instead of creating a second competing token system.

---

# Appendix B — External design-intelligence provenance

Version 2.0 was expanded after reviewing the public repository:

- `nextlevelbuilder/ui-ux-pro-max-skill`
- its UI/UX skill workflow and priority categories;
- design-system guidance for three-layer tokens and component states;
- design-system generation and Master/page override pattern;
- product/style/color/typography/landing/UX/icon/motion/stack search workflow;
- guidance on content-resilient text, chips/badges, accessibility, rapid interaction, performance, and responsive behavior.

The external repository is used as a reasoning and workflow reference. The concrete material values and visual signature in this file remain grounded in the supplied Liquid Glass Kit and its HTML/CSS implementation.

Repository: https://github.com/nextlevelbuilder/ui-ux-pro-max-skill

---

# Appendix C — Short agent preamble

Use this when the full Master is already present in the repository:

> Read `design-system/liquid-glass/MASTER.md` completely before editing UI. If `design-system/liquid-glass/pages/<page>.md` exists, treat it as a scoped override. Preserve the Liquid Glass material grammar and token architecture; do not invent a second style system. Accessibility, interaction, performance, and responsive correctness outrank decorative fidelity. Detect the actual stack from the repository before using stack-specific patterns. Reuse current components/tokens where possible. After implementation, run the Master QA checklist and explicitly report any item you could not verify.

