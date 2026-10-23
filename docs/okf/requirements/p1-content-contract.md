---
type: Requirements

title: Phase 1 Route and Content Contract

description: Runtime-backed sitemap, content ownership, product taxonomy contract, and launch checklist for the Sasan Zare storefront.
tags:
  - requirements
  - information-architecture
  - content
  - woocommerce
  - elementor
status: active
---

# Phase 1 outcome

Phase 1 was executed on 2026-10-23 against the local WordPress runtime. The public site now has a Persian primary navigation, publishable content pages, legal page records, a blog landing page, two editorial posts, product attributes, and a route/content matrix for the P0 surfaces in the master plan.

Runtime IDs are implementation notes only. Templates and source code must resolve pages, menus, terms, and products through WordPress or WooCommerce APIs.

# Source-of-truth rules

| Content | Owner | Rule |
| --- | --- | --- |
| Site identity, pages, posts, menus, media, reading settings | WordPress | Edit through WordPress content/settings; do not hard-code labels or URLs in PHP. |
| Product names, images, SKUs, prices, sale state, stock, categories, attributes, reviews | WooCommerce | Bind through native widgets/dynamic tags or public WooCommerce APIs. |
| Global colors, fonts, breakpoints, spacing and glass recipes | Elementor Site Settings + project tokens | Keep `theme.json` neutral and avoid a second token system. |
| Header and future route templates | Elementor Theme Builder | Use exact conditions and keep the semantic theme fallback. |
| Page-specific editorial composition | Elementor or WordPress page/post content | Every claim, image and CTA must be editable and traceable to its source. |
| Payment, shipping and account behavior | WooCommerce settings and active extensions | The current site has no active payment gateway; do not promise completed checkout until one is configured and tested. |

# Launch sitemap and content matrix

The following matrix covers every required P0 surface from the master plan. `Ready` means the route and base content exist; it does not mean the future Elementor template or commerce transaction QA is complete.

| Surface | Route | Current owner | Dynamic fields | Current state | P1 gap carried forward |
| --- | --- | --- | --- | --- | --- |
| Home | `/` | Static page + Pro Header + `Eyewear Hero` | Selected product, product price/image/SKU, menu, page copy | Ready; Hero points to published product `DR-707`, real shop URL and the new frame guide | Add dynamic product/category/editorial sections in P5. |
| Shop | `/shop/` | WooCommerce shop page | Current query, product loop, pagination, notices | Ready; 10 published simple products | Create/assign the Pro Product Archive template in P8. |
| Product category: sunglasses | `/product-category/sunglasses/` | WooCommerce `product_cat` archive | Term name/description, current products, counts | Ready; 7 products | Add archive template, filters and empty state in P8. |
| Product category: optical frames | `/product-category/optical-frames/` | WooCommerce `product_cat` archive | Term name/description, current products, counts | Ready; 3 products | Add archive template, filters and empty state in P8. |
| Single product | `/product/{slug}/` | WooCommerce single product fallback | Gallery, title, SKU, price, sale, stock, attributes, add-to-cart, tabs, reviews | Ready; 10 products have image, SKU, price, stock status and at least one description | Create/assign Pro Single Product template and verify cart state in P9. |
| Cart | `/cart/` | WooCommerce page | Items, quantities, fragments, coupons, shipping estimate, totals | Route exists and renders | No payment gateway or shipping method is active; complete settings and transaction QA in P10. |
| Checkout | `/checkout/` | WooCommerce page | Customer fields, shipping/billing, payment methods, review, validation | Route exists and renders | Configure an approved gateway and shipping rules before treating checkout as launch-ready. |
| My Account | `/my-account/` | WooCommerce page | Login/register, dashboard, orders, addresses, account details | Route exists and renders | Add Pro My Account template and test account endpoints in P10. |
| Search results | `/?s={query}&post_type=product` | WordPress/WooCommerce query | Query, result type, empty state | Search endpoint is available from the header | Add Search Results template and Persian empty state in P7. |
| 404 | any missing route | Theme fallback | Recovery navigation, shop CTA, search, recent products | Semantic theme fallback exists | Add Pro 404 template and test recovery links in P7. |
| Privacy | `/privacy/` | WordPress page | Editable policy copy | Published Persian page and assigned to WordPress privacy setting | Review with the business owner before public launch. |
| Returns | `/returns/` | WordPress page | Editable returns process | Published Persian page; avoids an invented fixed refund promise | Confirm final business rules before launch. |
| Shipping | `/shipping/` | WordPress page | Editable delivery and cost rules | Published Persian page; states that cost/time come from active WooCommerce settings | Configure and verify actual methods in P2/P10. |
| Terms | `/terms/` | WordPress page | Editable purchase/use terms | Published Persian page and assigned to WooCommerce terms setting | Review with the business owner before public launch. |

# Navigation and page ownership

The primary menu `منوی اصلی دیدآرا` is assigned to the `primary` theme location and selected by Pro Header #68 through the WordPress-menu source. Its labels are:

1. خانه → the static front page.
2. فروشگاه → the WooCommerce shop page.
3. عینک آفتابی → the `sunglasses` product category archive.
4. فریم طبی → the `optical-frames` product category archive.
5. راهنمای انتخاب فریم → the WordPress guide page.
6. مجله → the WordPress posts page.
7. درباره دیدآرا → the brand/story page.
8. تماس → the contact page.

No verified product brands exist yet, so the old draft `برندها` remains outside the primary menu. Brand terms must be created only after supplier or business data confirms them.

# Product taxonomy and completeness rule

Existing product categories are `عینک آفتابی` (7 published products) and `فریم طبی` (3 published products). Phase 1 added these global WooCommerce attributes and assigned values from the current product descriptions:

- `فرم فریم`: پانتو, مستطیلی, بیضی, منحنی, مربعی, ویفرر, گرد, خلبانی, گربه‌ای.
- `جنس فریم`: استات, فلز, پلیمر.
- `رنگ فریم`: the ten colors recorded in the product descriptions.
- `نوع استفاده`: طبی, آفتابی, زنانه, مردانه, یونیسکس, اسپرت.
- `نوع لنز`: نمایشی شفاف, خاکستری, دودی تیره, قهوه‌ای گرادیانی, سبز زیتونی.

A published product is complete enough for a catalog loop only when it has a title, primary image, SKU, regular/current price, stock status, one product category, and a short description. A gallery, verified brand, reviews, and optional measurements improve the product but are not invented when absent. The Hero's featured product is an explicit WooCommerce product selection; it does not depend on the WooCommerce featured flag.

# Content created in Phase 1

- About page: `درباره دیدآرا`.
- Frame guide: `راهنمای انتخاب فریم`.
- Contact page with explicit placeholders for business-approved phone, email and hours.
- Posts page: `مجله دیدآرا`, assigned as the WordPress posts page.
- Privacy, returns, shipping and terms pages with editable Persian copy; privacy and terms are assigned to their WordPress/WooCommerce settings.
- Two Persian editorial posts covering face-shape selection and eyewear care.

The copy intentionally avoids an unverified address, phone number, payment promise, fixed delivery promise, supplier brand claim, or fixed refund period. Those values are required before release and belong in the checklist below.

# Missing content and owner checklist

Before P2/P4/P5 release work, the site owner must provide or approve:

- An approved logo asset and alternative text; no custom logo is currently registered.
- Business contact email, phone, service hours and a verified response channel.
- Store/legal entity name and approved legal text for privacy, terms, shipping and returns.
- Shipping carriers, covered destinations, cost rules and delivery estimates.
- An approved payment gateway and its WooCommerce-compatible amount/currency behavior; no gateway is active now.
- Verified brand names and collection ownership; `product_brand` currently has no terms.
- Any missing product galleries, supplier-approved model details, measurements and warranty language.
- Consent and source for testimonials, UGC, team photography, newsletter and consultation forms.
- Final decision on whether the legacy sample page and old draft destinations should be archived after owner review.

# Acceptance evidence and limits

- WordPress API inventory on 2026-10-23 found 10 published simple products, 2 populated product categories, no pre-existing attributes, no primary menu, no custom logo, and no active payment gateway.
- Sampled normal HTTP requests returned `200` for the home, shop, both category archives, guide and journal; a separate normal request verified a real product permalink. The home HTML contains `DR-707`, `دریا`, the new guide link, journal link and category navigation.
- Elementor metadata shows the Hero's real `featured_product_id`, shop/guide URLs and neutral benefit copy; Pro Header #68 uses `navigation_source=wordpress` and `wordpress_menu=primary`.
- This phase does not certify Elementor Pro archive/single templates, payment completion, shipping calculation, responsive visual QA of the new text pages, legal approval, or final business contact data. Those belong to later gates and owner review.
