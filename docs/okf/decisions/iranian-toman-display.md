---
type: Decision
title: Iranian Toman Price Display
description: Use WooCommerce's IRR currency code with a toman display symbol and toman-denominated product values.
tags:
  - woocommerce
  - currency
  - iran
status: active
---

# Decision

Configure the Iranian store with WooCommerce currency code `IRR`, display `تومان` as the currency symbol, and enter product prices as toman amounts with zero decimal places.

# Context

The installed WooCommerce currency selector provides Iranian rial (`IRR`) but no separate toman option. The local store is intended to operate in Iran, where catalog prices are conventionally presented in tomans.

# Rationale

The built-in `IRR` code avoids inventing a nonstandard currency code, while the theme's `woocommerce_currency_symbol` filter provides the requested toman label. WooCommerce does not expose a dashboard setting for a custom symbol, so the theme owns this display adaptation.

# Consequences and Limits

- The store base country is Iran; no street address, province, tax rate, or shipping configuration is inferred from that setting.
- Product numeric values represent tomans, even though WooCommerce's internal currency code remains `IRR`.
- No payment gateway is installed in the observed local plugin set. Any future gateway must be checked for IRR-versus-toman amount conversion before transactions are enabled.
- See [current architecture](../architecture/current-architecture.md) for the implementation location and related commerce behavior.
