<!--
Title: Styles & colors
Slug: styles-and-colors
Permalink: https://beautifulplugins.com/themes/bloqra/docs/styles-and-colors/
SEO Title: Bloqra Style Variations, Colors, Typography and Block Styles
Meta Description: Switch between the Midnight, Emerald, Sunset and Editorial style variations, edit the Bloqra palette and typography, and use the built-in block and section styles.
-->

# Styles & colors

Bloqra's design lives in `theme.json`, which means you can restyle the entire site — colors,
fonts, spacing — from **Appearance → Editor → Styles** without writing CSS.

## Style variations

Open **Styles** (the half-shaded circle icon) and click **Browse styles**. Bloqra includes the
default violet look plus four variations:

- **Midnight** — a dark palette with light text.
- **Emerald** — a green palette.
- **Sunset** — a warm orange and amber palette.
- **Editorial** — a serif typography preset for content-first, magazine-style sites.

Clicking one changes the whole site instantly. Switching again is non-destructive, and any manual
edits you made on top are kept separately, so you can always click **Reset to defaults** in the
Styles panel to get back to a clean variation.

## The color palette

Bloqra's palette is a full tonal scale rather than a handful of loose colors:

- **Primary 50 → 900** — the brand ramp, from the lightest tint to the deepest shade.
- **Neutral 50 → 900** — greys used for text, borders and backgrounds.
- **Primary**, **Primary dark**, **Accent**, **Accent soft**, **White** — the semantic shortcuts
  used across templates and patterns.
- Gradients: **Primary accent**, **Primary glow** and **Soft light**.

Edit them under **Styles → Colors → Palette**. Because every pattern and block style references
these presets by name, changing *Primary 600* recolors buttons, links and accents across the site
in one move.

> Pick colors from the palette rather than the custom color picker. Preset colors follow style
> variations and future updates; a hard-coded hex does not.

## Typography

Under **Styles → Typography** you can set the font family, size and line height for text, links,
headings, captions and buttons.

Bloqra ships three font family presets — **Sans**, **Serif** and **Mono** — built from system font
stacks, so there are no external font files to load and nothing slows your site down. Font sizes
are fluid: they scale smoothly between mobile and desktop instead of jumping at breakpoints.

## Spacing and layout

The spacing scale runs **2XS → 2XL** and is used by every pattern for consistent rhythm. Content
width defaults to 720 px, wide blocks to 1200 px; both are editable under **Styles → Layout**.

## Block styles

Select a block in the editor and open the **Styles** tab in the block sidebar. Bloqra adds:

| Style | Available on | What it does |
|---|---|---|
| **Subheading** | Paragraph, Heading | Small uppercase eyebrow text above a headline |
| **Card** | Group | White card with border, rounded corners and a soft shadow |
| **Checklist** | List | Replaces bullets with checkmarks in a colored circle |
| **Pill** | Paragraph | Compact rounded badge, good for tags and labels |
| **Gradient** | Separator | A short gradient bar instead of a plain line |

## Section styles

Group and Columns blocks also get two full-width section styles:

- **Section: Dark** — dark background with light text and generous padding.
- **Section: Soft** — a tinted background for alternating page sections.

Use them to break a long page into visually distinct bands without touching CSS.

## Adding custom CSS

For anything the Styles panel cannot express, use **Appearance → Editor → Styles → Additional
CSS**. Custom CSS added there survives theme updates.

## Next step

Head to [Patterns](https://beautifulplugins.com/themes/bloqra/docs/patterns/) to build pages from
Bloqra's ready-made sections.
