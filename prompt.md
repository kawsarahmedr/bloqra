# Build the Bloqra Block Theme

## Goal
Create a modern, professional **WordPress block theme** named **Bloqra** (slug: `bloqra`) that I will publish on the WordPress.org theme repository. It is a free companion theme for my free Bloqra Gutenberg blocks plugin (https://wordpress.org/plugins/bloqra/), and its job is to look polished the moment it's activated and attract quality users toward the Bloqra ecosystem.

## Reference themes (already in my local themes directory — do NOT search the internet)
Before writing any code, analyze these two themes that live in the same `wp-content/themes/` directory:

1. **`pluginever`** — this is my structural and coding-style benchmark. Study its file/folder organization, `theme.json` patterns, template and template-part structure, naming conventions, and `functions.php` approach. Build Bloqra the same professional way: clean structure, no extra/dead code, every file justified.

2. **`twentytwentyfive`** — study specifically how it makes the theme fully **previewable without installation** (the WordPress.org live preview / Site Editor showing a populated, designed homepage out of the box). Replicate whatever mechanism it uses (starter content / front-page pattern / screenshot composition) so Bloqra previews and first-install experience match that quality.

## Requirements
- Modern, professional default design on first activation — not a blank canvas. The homepage should immediately showcase a well-designed layout that highlights what Bloqra blocks can do.
- Block theme (FSE) built on `theme.json` + block templates and parts. No bloat, no dead code, professional structure modeled on `pluginever`.
- Properly internationalized, escaped, and ready for WordPress.org submission (text domain `bloqra`, GPL-compatible).
- WooCommerce support included and styled to match the theme.

## Templates / pages needed
- Front page
- Blog
- About
- Contact
- WooCommerce (only if WooCommerce is active): Shop, My Account, Cart, Checkout

## Process
Analyze both reference themes first, then propose the structure briefly, then build the complete theme. Match `pluginever`'s conventions for everything structural, and match `twentytwentyfive`'s no-install preview behavior.

Create a complete color palate (Primary color is: #5511F8;) and typography scheme in `theme.json` that looks modern and professional, and ensure all templates and template parts use these styles consistently. The homepage should feature a hero section, a features/services section, a blog excerpt section, and a call-to-action. The blog page should list recent posts with featured images. The about page should have a clean layout for text and images. The contact page should include a simple contact form (using a block pattern). WooCommerce templates should be styled to match the overall design of the theme.
