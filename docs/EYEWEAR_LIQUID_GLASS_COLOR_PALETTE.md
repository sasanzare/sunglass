# Eyewear Store Color Palette — Liquid Glass

**Project:** Persian Eyewear E-commerce  
**Stack:** WordPress + Elementor + WooCommerce  
**Design System:** Liquid Glass Design Language v2.0  
**Palette Name:** Optical Iris  
**Status:** Recommended Production Palette

---

## 1. Design Direction

The color system is designed for a premium eyewear storefront using the Liquid Glass visual language.

The palette should feel:

- Premium
- Fashion-oriented
- Optical / precise
- Contemporary
- Calm
- Neutral enough to let eyewear products remain the primary visual focus
- Compatible with translucent glass surfaces, controlled refraction, and soft lighting
- Suitable for Persian RTL interfaces

The UI should not compete with product photography. Neutral surfaces dominate the layout, while saturated brand colors are reserved for actions, active states, selected elements, and controlled refracted accents.

---

# 2. Core Brand Palette

| Role | Name | HEX | Primary Use |
|---|---|---|---|
| Canvas | Warm Porcelain | `#F1EDE8` | Main website background |
| Canvas Light | Soft Ivory | `#F8F6F3` | Light sections and calm content zones |
| Text Strong | Optical Black | `#141418` | Main headings and high-emphasis text |
| Text | Graphite | `#29282F` | Body text |
| Muted | Stone Gray | `#6E6B74` | Metadata, secondary labels, descriptions |
| Primary | Iris Violet | `#6553E8` | Main CTA, links, active states |
| Primary Strong | Deep Iris | `#4D3BC7` | Hover / pressed primary state |
| Primary Soft | Soft Iris | `#A99AF6` | Refraction, glow, subtle selected surfaces |
| Secondary | Optical Mint | `#52CDB8` | Secondary action and supporting accent |
| Secondary Strong | Deep Mint | `#2BAE98` | Secondary hover / active state |
| Secondary Soft | Frost Mint | `#A7E8DC` | Refraction and glass highlights |
| Luxury Accent | Champagne | `#C6A46A` | Very limited premium accents |
| Success | Emerald | `#2FAE69` | Success, availability, positive state |
| Warning | Amber | `#C38335` | Warning and caution states |
| Danger | Berry Red | `#C84D68` | Errors, destructive states, sale emphasis |
| Surface White | Pure White | `#FFFFFF` | Opaque controls and high-confidence surfaces |

---

# 3. Recommended Visual Ratio

Use the palette approximately with the following visual balance:

- **70% Neutral surfaces**
  - `#F8F6F3`
  - `#F1EDE8`
  - translucent white glass

- **15% Dark typography / controls**
  - `#141418`
  - `#29282F`

- **10% Primary Iris Violet**
  - `#6553E8`
  - `#4D3BC7`
  - `#A99AF6`

- **4% Optical Mint**
  - `#52CDB8`
  - `#2BAE98`
  - `#A7E8DC`

- **≤1% Champagne**
  - `#C6A46A`

Champagne should remain a scarce premium accent and must not become a competing primary brand color.

---

# 4. Primitive Color Tokens

```css
:root {
  /* Neutral */
  --eyewear-neutral-950: #141418;
  --eyewear-neutral-900: #29282F;
  --eyewear-neutral-600: #6E6B74;

  /* Warm canvas */
  --eyewear-warm-050: #F8F6F3;
  --eyewear-warm-100: #F1EDE8;

  /* Iris violet */
  --eyewear-iris-700: #4D3BC7;
  --eyewear-iris-600: #6553E8;
  --eyewear-iris-300: #A99AF6;

  /* Optical mint */
  --eyewear-mint-700: #2BAE98;
  --eyewear-mint-500: #52CDB8;
  --eyewear-mint-200: #A7E8DC;

  /* Premium */
  --eyewear-champagne-500: #C6A46A;

  /* Status */
  --eyewear-success-500: #2FAE69;
  --eyewear-warning-500: #C38335;
  --eyewear-danger-500: #C84D68;

  --eyewear-white: #FFFFFF;
}
```

---

# 5. Semantic Color Tokens

```css
:root {
  --color-canvas: var(--eyewear-warm-100);
  --color-canvas-light: var(--eyewear-warm-050);

  --color-fg-strong: var(--eyewear-neutral-950);
  --color-fg: var(--eyewear-neutral-900);
  --color-muted: var(--eyewear-neutral-600);

  --color-primary: var(--eyewear-iris-600);
  --color-primary-strong: var(--eyewear-iris-700);
  --color-primary-soft: var(--eyewear-iris-300);
  --color-on-primary: #FFFFFF;

  --color-secondary: var(--eyewear-mint-500);
  --color-secondary-strong: var(--eyewear-mint-700);
  --color-secondary-soft: var(--eyewear-mint-200);
  --color-on-secondary: #141418;

  --color-luxury: var(--eyewear-champagne-500);

  --color-success: var(--eyewear-success-500);
  --color-warning: var(--eyewear-warning-500);
  --color-danger: var(--eyewear-danger-500);

  --color-surface-opaque: var(--eyewear-white);
}
```

---

# 6. Brand Gradients

## 6.1 Primary CTA Gradient

```css
--gradient-primary:
  linear-gradient(
    90deg,
    #4D3BC7 0%,
    #6553E8 58%,
    #A99AF6 100%
  );
```

Recommended for:

- Add to cart
- Checkout
- Hero CTA
- Important account actions
- Selected high-confidence actions

---

## 6.2 Secondary Gradient

```css
--gradient-secondary:
  linear-gradient(
    90deg,
    #2BAE98 0%,
    #52CDB8 55%,
    #A7E8DC 100%
  );
```

Recommended for:

- Secondary CTA
- Supporting promotional action
- Small selected states
- Controlled filter / feature accents

---

## 6.3 Refracted Feature Gradient

```css
--gradient-refraction:
  linear-gradient(
    135deg,
    #6553E8 0%,
    #A99AF6 35%,
    #A7E8DC 72%,
    #52CDB8 100%
  );
```

Use sparingly.

Recommended maximum within one desktop viewport:

- 1 dominant refracted Hero / feature surface
- 1 secondary refracted callout
- a small number of spectral hairline details

Do not use this gradient behind long body text.

---

# 7. Glass Surface Recipe

The default storefront card should remain clear glass rather than saturated brand glass.

```css
--gradient-glass:
  linear-gradient(
    150deg,
    rgb(255 255 255 / 0.52),
    rgb(255 255 255 / 0.22) 52%,
    rgb(255 255 255 / 0.34)
  );
```

Recommended base canvas:

```css
background-color: #F1EDE8;
```

Example:

```css
.liquid-product-card {
  background: var(--gradient-glass);
  border: 1px solid rgb(255 255 255 / 0.72);
  backdrop-filter: blur(8px) saturate(105%);
  -webkit-backdrop-filter: blur(8px) saturate(105%);
}
```

---

# 8. Product Card Color Rules

Product imagery must remain the main visual element.

Recommended product card behavior:

### Background
- Clear translucent glass

### Product title
- `#141418`

### Price
- `#29282F`

### Old price
- `#6E6B74`

### Discount
- `#C84D68`

### Available / in stock
- `#2FAE69`
- Must also include text or icon; do not communicate availability through color alone

### Wishlist
Default:
- `#29282F`

Selected:
- `#C84D68`

### Add to Cart
- Primary Iris gradient

---

# 9. WooCommerce State Mapping

| WooCommerce State | Color |
|---|---|
| Regular Price | `#29282F` |
| Main Product Price | `#141418` |
| Sale Price | `#C84D68` |
| Old Price | `#6E6B74` |
| In Stock | `#2FAE69` |
| Low Stock | `#C38335` |
| Out of Stock | `#C84D68` |
| Coupon / Success | `#2FAE69` |
| Validation Error | `#C84D68` |
| Notice | `#6553E8` |
| Selected Variation | `#6553E8` |
| Secondary Variation Accent | `#52CDB8` |

---

# 10. Elementor Global Colors

Create the following Global Colors in Elementor Site Settings.

```text
Primary             #6553E8
Primary Strong      #4D3BC7
Primary Soft        #A99AF6

Secondary           #52CDB8
Secondary Strong    #2BAE98
Secondary Soft      #A7E8DC

Luxury Accent       #C6A46A

Text Strong         #141418
Text                #29282F
Text Muted          #6E6B74

Canvas              #F1EDE8
Canvas Light        #F8F6F3
Surface White       #FFFFFF

Success             #2FAE69
Warning             #C38335
Danger              #C84D68
```

---

# 11. Recommended Elementor Naming

For maintainability, use semantic names instead of visual-only names.

Recommended:

```text
Global / Primary
Global / Primary Strong
Global / Primary Soft

Global / Secondary
Global / Secondary Strong
Global / Secondary Soft

Global / Luxury

Global / Text Strong
Global / Text
Global / Text Muted

Global / Canvas
Global / Canvas Light
Global / Surface White

State / Success
State / Warning
State / Danger
```

Avoid widget-level arbitrary HEX values when a semantic global color already exists.

---

# 12. Header

Recommended header colors:

### Header surface
Translucent white glass:

```css
background: rgb(255 255 255 / 0.52);
```

### Navigation
Default:

```text
#29282F
```

Active / Hover:

```text
#6553E8
```

### Search
Opaque or near-opaque warm white surface.

```text
#FFFFFF
```

or

```text
rgb(255 255 255 / 0.90)
```

### Cart badge
Primary:

```text
#6553E8
```

Text:

```text
#FFFFFF
```

---

# 13. Hero Section

Recommended color composition:

### Background
```text
#F1EDE8
```

### Headline
```text
#141418
```

### Supporting text
```text
#6E6B74
```

### Primary CTA
Iris Violet gradient

### Secondary CTA
Clear glass or Optical Mint treatment

### Decorative refraction
Combination of:

```text
#6553E8
#A99AF6
#A7E8DC
#52CDB8
```

Refraction should stay away from paragraph text and important price information.

---

# 14. Luxury Accent Rules

Champagne:

```text
#C6A46A
```

Use only for premium details such as:

- Premium Collection
- Limited Edition
- Exclusive frame collection
- Fine separator / hairline
- Small premium icon
- Decorative hero detail

Do not use Champagne for:

- normal body text
- every CTA
- every card border
- general navigation
- large background blocks

---

# 15. Accessibility Rules

Liquid Glass surfaces can change perceived contrast depending on the scene underneath them.

Therefore:

1. Test text contrast against the rendered surface, not only the nominal background token.
2. Keep essential text in visually quiet zones.
3. Increase surface opacity when text contrast becomes unstable.
4. Do not rely on hue alone for state.
5. Add text, icons, position, border, or programmatic state where required.
6. Maintain visible keyboard focus.
7. Primary interactive targets should remain at least 44×44px.

---

# 16. Persian / RTL Considerations

For the Persian storefront:

- Test prices containing تومان / ریال.
- Test both Persian and Latin numerals according to project policy.
- Test sale price + previous price + discount badge together.
- Test long Persian product names.
- Test mixed Persian / Latin frame model names.
- Do not reduce text size merely to preserve a visual composition.
- Keep essential UI text at approximately 16px or larger where practical.
- Ensure selected and active states remain understandable without relying only on color.

---

# 17. Dark Mode — Future Direction

If dark mode is added later, do not simply invert the palette.

Suggested starting canvas:

```text
#111217
```

Suggested dark surfaces should preserve:

- light glass rims
- restrained Violet / Mint refraction
- readable white / near-white typography
- non-neon brand accents
- visible focus states

Dark mode should override semantic tokens while preserving component structure.

---

# 18. Recommended Design Dials for This Project

For this eyewear store:

```text
Variance: 6 / 10
Motion:   5 / 10
Density:  4 / 10
```

Profile:

```text
Luxury Commerce
```

Intent:

- moderate editorial asymmetry
- restrained tactile motion
- spacious premium storefront layout
- medium/high refraction only in high-emphasis areas

---

# 19. Final Brand Combination

The core visual identity is:

```text
Warm Porcelain
+
Optical Black
+
Iris Violet
+
Optical Mint
+
Champagne
```

### Brand feeling

**Premium · Fashion · Optical · Contemporary · Calm · Futuristic**

The strongest recurring brand color is:

```text
#6553E8 — Iris Violet
```

The supporting accent is:

```text
#52CDB8 — Optical Mint
```

The main canvas is:

```text
#F1EDE8 — Warm Porcelain
```

The main text is:

```text
#141418 — Optical Black
```

The limited premium accent is:

```text
#C6A46A — Champagne
```

---

# 20. Implementation Rule

Keep the Liquid Glass design system architecture:

```text
Primitive Tokens
      ↓
Semantic Tokens
      ↓
Component Tokens
```

Do not scatter raw HEX values throughout Elementor widgets or WooCommerce component CSS.

Global colors should be centralized, and component-level styles should reference semantic roles.

---

**Palette Version:** 1.0  
**Design System Compatibility:** Liquid Glass Design Language v2.0  
**Target Platform:** WordPress + Elementor + WooCommerce  
