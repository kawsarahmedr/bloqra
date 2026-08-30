<!--
Title: WooCommerce
Slug: woocommerce
Permalink: https://beautifulplugins.com/themes/bloqra/docs/woocommerce/
SEO Title: Using WooCommerce with the Bloqra WordPress Theme
Meta Description: Set up a WooCommerce store with Bloqra — styled shop, product, cart, checkout and account pages, plus the product templates the theme provides.
-->

# WooCommerce

Bloqra supports WooCommerce out of the box. Install and activate WooCommerce and the store pages
pick up the theme's colors, typography and spacing automatically — there is nothing to configure.

## Setting up your store

1. Install WooCommerce from **Appearance → Bloqra → Useful Plugins**, or from
   **Plugins → Add New**.
2. Run the WooCommerce setup wizard (store address, currency, shipping, payments).
3. Add products under **Products → Add New**.

WooCommerce creates the Shop, Cart, Checkout and My Account pages for you during setup.

## What Bloqra provides

- **Shop and archive pages** — a product grid using the theme's card styling.
- **Single product pages** — a product template matched to the theme layout.
- **Cart, checkout and account pages** — form fields, buttons, notices and tables restyled to
  match Bloqra.
- **Product gallery** — zoom, lightbox and slider are all enabled.

The store stylesheet loads only on WooCommerce pages, so the rest of your site stays lean.

## Editing store templates

Product templates are edited like any other, in **Appearance → Editor → Templates**:

- **Product** — the single product page.
- **Products** — the shop and product archive listing.

You can add patterns above or below the product content, change the layout width, or drop in a
call-to-action band using the **Section: Soft** style.

Some WooCommerce screens (cart, checkout, my account) are rendered by WooCommerce's own blocks or
shortcodes. Edit those on the corresponding *page* under **Pages**, not in the Site Editor.

## Product images

WooCommerce manages its own image sizes — set them under
**WooCommerce → Settings → Products → Display**, not in the Site Editor. Upload product
images at 1000 px or larger on the long edge and let WooCommerce crop them.

## Common questions

**Do I need a WooCommerce-specific child theme?**
No. Bloqra's store styling ships with the theme and updates with it.

**Can I use a different product layout?**
Yes. Edit the Product template in the Site Editor, or use WooCommerce's own product blocks to
compose a custom layout.

**Will store styling survive a Bloqra update?**
Yes. Anything you edit in the Site Editor is stored in the database, separate from theme files.

## Next step

Head to [Bloqra Blocks](https://beautifulplugins.com/themes/bloqra/docs/bloqra-blocks/) to add more
building blocks to the editor.
