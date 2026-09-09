<!--
Title: Templates & the Site Editor
Slug: site-editor
Permalink: https://beautifulplugins.com/themes/bloqra/docs/site-editor/
SEO Title: Bloqra Templates, Template Parts and the Site Editor
Meta Description: What every Bloqra template does, how to edit the header, footer and sidebar template parts, and how to use the sidebar and no-title page templates.
-->

# Templates & the Site Editor

Bloqra has no theme options panel — everything is edited visually in
**Appearance → Editor**. This page explains what you will find there.

## Templates

Open **Appearance → Editor → Templates**. Bloqra ships these:

| Template | Used for |
|---|---|
| **Front Page** | The designed homepage: hero, logo strip, features, highlight, blog and CTA |
| **Blog Home** | The posts page when you set one under Settings → Reading |
| **Single Post** | A single blog post |
| **Page** | A standard page, with the title shown |
| **Archive** | Category, tag, author and date archives |
| **Search Results** | The search results listing |
| **404** | The "page not found" screen |
| **Index** | The fallback WordPress uses when nothing more specific matches |

Editing a template changes every page that uses it. To change a single page only, edit that page in
the post editor instead.

### Optional page and post templates

Three extra templates are available from the **Template** dropdown in the sidebar of the post or
page editor:

- **Page (No Title)** — a page with the title hidden, for landing pages that open with a hero.
- **Page (With Sidebar)** — a page with the Sidebar template part alongside the content.
- **Single Post (With Sidebar)** — the same, for a blog post.

## Template parts

Under **Appearance → Editor → Patterns → Template parts** you will find three:

- **Header** — logo, navigation and a call-to-action button. It is sticky, and on small screens the
  menu opens as a full-screen overlay.
- **Footer** — site title, links and copyright.
- **Sidebar** — search, recent posts and categories. Used by the two sidebar templates above.

Edit a part once and the change applies everywhere it appears.

## Adding a sidebar to your blog

The sidebar templates cover single posts and pages. To put a sidebar on the blog listing itself,
edit the **Blog Home** template, wrap the Query Loop in a Columns block and add the Sidebar
template part to the second column.

## Resetting a template

Made a mess? Select the template in the Site Editor, open the three-dot menu and choose
**Reset** (or **Clear customizations**). It returns to the version that ships with the theme.
Your posts and pages are untouched.

## Featured images

Bloqra registers a `bloqra-card` image size (720 × 480, cropped) used by the post grids on the
front page and blog. Upload featured images at least 1200 px wide so they stay sharp on large
screens.

## Back to top

A small back-to-top button appears once visitors scroll down, and disappears again at the top. It
is keyboard accessible and respects the reduced-motion setting. There is nothing to configure.

## Next step

Head to [Styles & colors](https://beautifulplugins.com/themes/bloqra/docs/styles-and-colors/) to
restyle the whole site from one screen.
