# Bloqra — Admin Dashboard Plan

> Planning document for the Bloqra theme admin area (menu + Dashboard, Useful Plugins,
> Changelog, and a future Starter Templates page).
> **Status: awaiting verification. No code written yet.**

---

## 0. Decisions I need from you before implementation

### 0.1 Menu placement — **resolved: `add_theme_page()`, under Appearance**

**Decision: `Appearance → Bloqra` via `add_theme_page()`.** The top-level `Bloqra` slot belongs to
the Bloqra blocks plugin (see §9). This was decided after establishing that a commercial plugin
sharing the `bloqra` slug will want that slot — which makes the split obvious.

Why this is the right division:

- **No collision, no coordination.** Theme and plugin never both register a top-level `bloqra`
  menu, so there is no hook-priority race, no `$admin_page_hooks` guard and no slug-ownership
  contract spanning two codebases. An entire class of bugs is designed out rather than guarded.
- **Clean commercial boundary.** The theme stays free forever with zero upsell; all pro messaging
  lives in the plugin. This is the strongest posture for .org theme review, which scrutinises
  upsells in themes far more than plugin review does. (Note Astra's *theme* dashboard shows a
  "PRO VERSION" badge in its hero — Bloqra's carries none, so we are more conservative.)
- **Matches the reference themes.** Kadence and Blocksy both use `add_theme_page()`
  (Blocksy at `admin/dashboard/core.php:177`) — a reviewer-familiar shape.
- **No PHPCS friction.** `add_theme_page()` does not trip
  `WPThemeReview.PluginTerritory.NoAddAdminPages`, so no `phpcs:ignore` comments are needed
  anywhere. (Astra needs one on every menu call — `admin/includes/class-astra-menu.php:211`.)

**What it costs:** the WP admin menu is only two levels deep, so `Bloqra` under Appearance cannot
have children. The Dashboard / Useful Plugins / Changelog tabs are **in-page only**, exactly like
Kadence and Blocksy. The in-page tab strip was already the primary navigation in this plan, so
nothing else changes.

*For the record: Theme Check permits all three of `add_theme_page`, `add_menu_page` and
`add_submenu_page` (`theme-check/checks/class-admin-menu-check.php` whitelists them; only other
`add_*_page` variants raise a RECOMMENDED notice). Top-level would have been allowed — it is being
declined on architecture grounds, not compliance ones.*

### 0.2 Other open questions

| # | Question | My default if you do not specify |
|---|---|---|
| 1 | Docs / support / community URLs to link to | `beautifulplugins.com/docs/bloqra/`, `/support/`, wp.org support forum, wp.org review link |
| 2 | Hero right-hand visual | A bundled original SVG illustration (small, no license risk) rather than a video thumbnail |
| 3 | Show a dismissible "welcome" admin notice after theme activation | Yes — dismissible, once per user, `edit_theme_options` only |
| 4 | Useful Plugins list — my picks below (§4.2), or your own list? | My picks |
| 5 | Starter Templates tab visible now as "coming soon", or hidden until the plugin ships | Hidden (registry entry ready, one line to enable) |

---

## 1. Goals & constraints

**Goals**

1. A single branded admin area for the theme: `Bloqra` → Dashboard / Useful Plugins / Changelog.
2. Dashboard leads with an Astra-style hero, then Site Editor shortcut cards and a help sidebar
   (Kadence/Blocksy layout), adapted for a **block theme** — so shortcuts point at the Site
   Editor, not the Customizer (Bloqra is FSE; it has no Customizer panels).
3. Useful Plugins: curated wp.org plugin cards with real Install / Activate buttons.
4. Changelog: rendered from `readme.txt` so there is exactly one source of truth.
5. Starter Templates: architecture ready, page added when the plugin exists.

**Hard constraints (carried over from existing theme conventions)**

- **No mention of the Bloqra blocks plugin anywhere** until .org approval — that includes the
  Useful Plugins list and any "companion plugin" wording. The admin area must read as a
  standalone core-block theme.
- Prefix everything `bloqra_` / `BLOQRA_` — functions, variables, hooks, CSS classes
  (`.bloqra-admin-*`), script/style handles, option and transient keys.
- Procedural style with typed signatures, matching `includes/core.php` and `includes/scripts.php`
  (no classes — the theme has none today).
- PHP 7.4 floor: no `str_contains`, no union types, no 8.x-only syntax.
- Every string translatable, textdomain `bloqra`, escaped at output (`esc_html__`, `esc_attr__`,
  `esc_url`, `wp_kses_post`).
- No external asset requests (fonts, CDN images). Everything bundled locally.
- CSS/JS follow the existing minified pattern: `admin.css` + `admin.min.css`, served minified
  unless `SCRIPT_DEBUG` (same rule as `includes/scripts.php`).
- Must stay Theme Check / PHPCS-WPCS clean.

---

## 2. File & directory plan

```
functions.php                              (edit) load the admin bootstrap when is_admin()
includes/admin.php                         (new)  bootstrap: constants, requires, tab registry
includes/admin/menu.php                    (new)  menu registration + router + page shell
includes/admin/helpers.php                 (new)  shared render helpers (hero, card, sidebar, tabs)
includes/admin/page-dashboard.php          (new)  Dashboard tab content
includes/admin/page-plugins.php            (new)  Useful Plugins tab content
includes/admin/page-changelog.php          (new)  Changelog tab content + readme.txt parser
includes/admin/page-starter-templates.php  (new)  stub for the future plugin (registered, disabled)
includes/admin/plugin-actions.php          (new)  install/activate AJAX handlers + status helpers
includes/admin/notice.php                  (new)  dismissible post-activation welcome notice
assets/css/admin.css                       (new)  source stylesheet
assets/css/admin.min.css                   (new)  generated, served by default
assets/js/admin.js                         (new)  tabs a11y, plugin install/activate, notice dismiss
assets/images/admin/bloqra-logo.svg        (new)  original mark for the page header
assets/images/admin/hero.svg               (new)  original hero illustration
.distignore                                (edit) add TODO.md so it is not shipped in the ZIP
readme.txt                                 (edit) backfill missing changelog entries (see §4.3)
```

Rationale for the `includes/admin/` subfolder: `includes/` currently holds four flat feature
files; the admin area is ~8 files and would drown them. One `includes/admin.php` entry point keeps
`functions.php` as short as it is today.

---

## 3. Architecture

### 3.1 Loading

- `functions.php` requires `includes/admin.php` only inside `is_admin()` — zero front-end cost.
- `includes/admin.php` defines `BLOQRA_THEME_ADMIN` (dir path), requires the admin files, and
  exposes the tab registry.
- Assets enqueue on `admin_enqueue_scripts`, gated to the Bloqra screens only (compare the passed
  `$hook_suffix` against the stored page hooks) — plus a tiny always-loaded rule set for the
  welcome notice.

### 3.2 Tab registry (the extensibility spine)

A single filterable array, `bloqra_admin_get_tabs()` → filter `bloqra_admin_tabs`, where each
entry carries: `slug`, `label`, `callback`, `capability`, `priority`, `enabled`.

Registered tabs:

| slug | label | file | enabled |
|------|-------|------|---------|
| `dashboard` | Dashboard | `page-dashboard.php` | yes |
| `plugins` | Useful Plugins | `page-plugins.php` | yes |
| `changelog` | Changelog | `page-changelog.php` | yes |
| `starter-templates` | Starter Templates | `page-starter-templates.php` | **no** (§4.4) |

This means adding Starter Templates later is flipping one `enabled` flag. The same registry drives
both the in-page tab strip and the admin submenu items.

### 3.3 Menu & routing

- Registered with `add_theme_page()` → one page at `themes.php?page=bloqra`, with `&tab=<slug>`
  selecting the tab. First tab is the default.
- A single `Appearance → Bloqra` sidebar entry. The admin menu is only two levels deep, so there
  are **no submenu children** — the tab registry drives the **in-page tab strip only**, exactly
  like Kadence and Blocksy.
- The page slug is `bloqra`, but under the `themes.php` parent — it never occupies the top-level
  `bloqra` slot, so it cannot collide with the plugin (§9).
- Capability: `edit_theme_options` for the page; `install_plugins` / `activate_plugins` checked
  separately for the plugin buttons.
- Tab strip is `role="tablist"` markup built from real links (works without JS); JS only adds
  arrow-key navigation.

### 3.4 Page shell (every tab shares it)

Mirrors the Blocksy/Kadence chrome:

```
+--------------------------------------------------------------+
|  [logo] Bloqra          "modern block theme..."     [v1.0.3]  |  <- branded header bar
|                    [ Dashboard | Useful Plugins | Changelog ] |  <- tab strip
+---------------------------------------+----------------------+
|  tab content (main column)            |  help sidebar        |
+---------------------------------------+----------------------+
```

- WP admin notices are relocated into the shell (or suppressed on our screens) so third-party
  plugin nags do not break the layout — the same trick Kadence and Blocksy use.
- The sidebar is optional per tab (Changelog renders full width, like Blocksy's).

---

## 4. Page-by-page content

### 4.1 Dashboard

**A. Hero** (modelled on `Astra-welcome-hero-section.png`: two columns, text left, visual right,
white card on a light ground)

- Left: `Hello {display_name}` eyebrow · `Welcome to Bloqra!` heading · short description pulled
  from the theme's `style.css` Description header (no duplicated copy to maintain) · primary
  button **Open Site Editor** (`site-editor.php`) · text link **Browse Documentation**.
- Right: bundled original SVG illustration (a stylised block-layout collage in the theme's violet
  palette). Not `screenshot.png` — that file is 190 KB and the wrong aspect ratio.
- Version chip top-right of the page header (like Kadence's `1.5.2` badge), from
  `BLOQRA_THEME_VERSION`.

**B. "Customize your site"** — 6 cards, 3-up grid (Kadence "Customize Your Site" / Blocksy
"Customizer Shortcuts", but pointed at FSE destinations):

| Card | Description | Links to |
|------|-------------|----------|
| Styles & Colors | Switch style variation or edit the palette, typography and spacing. | Site Editor → Styles |
| Site Identity | Upload a logo, set the site title, tagline and site icon. | Site Editor / General Settings |
| Header & Footer | Edit the header and footer template parts. | Site Editor → Patterns → Template Parts |
| Navigation | Build the menu shown in the header. | Site Editor → Navigation |
| Templates | Front page, blog, single, archive, 404 and the sidebar variants. | Site Editor → Templates |
| Patterns | The curated Bloqra pattern library — hero, features, CTA, About, Contact. | Site Editor → Patterns |

Card links go through one helper so every Site Editor deep link (`site-editor.php?path=...`) is
defined in a single place — those paths shift between WP releases, and I will verify each one
against the local site during implementation.

**C. "Next steps" checklist** — 4 lightweight items with live state where it is cheap to detect:
set a static front page, upload a logo, pick a style variation, edit the front page. Each row is a
link; completed rows show a check. State is read-only (nothing stored).

**D. Sidebar** (right column, matching Kadence/Blocksy):

- **Documentation** — "Guides for every part of the theme." → Browse docs
- **Support** — "Stuck? We are happy to help." → Support / wp.org forum
- **Rate Bloqra** — 5-star prompt → wp.org review page (only once the theme is live on .org)
- **Style variations** — a reminder that Midnight / Emerald / Sunset / Editorial exist, with a
  link straight to the Styles panel

Filters: `bloqra_admin_dashboard_cards`, `bloqra_admin_sidebar_boxes`.

### 4.2 Useful Plugins

Layout copied from `Blocksy-usefull-plugins.png`: 3-up card grid, each card = title, 2–3 line
description, and a footer action button on a tinted strip.

**Proposed list** (all free on wordpress.org, all genuinely useful for a block theme; nothing
authored by us, per the no-cross-promo rule):

| Plugin | Why it is here |
|--------|----------------|
| Bloqra Blocks | Our own free Gutenberg blocks plugin |
| AI Content Writer | AI-assisted content generation |
| Sokket MCP Server | Connect Claude ChatGPT to your site for AI content generation |
| Image Generator | AI-assisted image generation |
| Send Emails | Email newsletter / Automation for WordPress |
| WooCommerce | The theme already ships styled shop/product/cart templates |

Per-card button state machine, driven by real detection:

`Install` → `Installing...` → `Activate` → `Activating...` → `Active` (button disabled)

**Mechanics**

- Status detection from `get_plugins()` + `is_plugin_active()`, keyed by plugin file path.
- Install uses **core's own updater JS** (`wp_enqueue_script('updates')` +
  `wp_enqueue_script('plugin-install')`) — no bespoke download code and no bundled plugin ZIPs
  (bundling is a .org violation).
- Activation via a custom `wp_ajax_bloqra_activate_plugin` handler: nonce +
  `current_user_can('activate_plugins')` + validate the slug against our allow-list before acting.
- Users without `install_plugins` see a disabled button with an "Ask an administrator" hint
  instead of a broken action.
- Plugin metadata (name, slug, file, description) is a static PHP array filtered through
  `bloqra_admin_useful_plugins` — no wordpress.org API call on page load, so the page is instant
  and works offline. (Optional later: lazy-load icons/ratings via `plugins_api` behind a 12-hour
  transient.)

### 4.3 Changelog

Layout from `Blocksy-changelog.png`: a legend row, then per-version blocks with the version number
left and the release date right, and one badge per line.

- **Source of truth: `readme.txt`.** A parser reads the `== Changelog ==` section, splits on
  `= 1.0.3 =` headings and returns `[version => [lines]]`. Cached in a transient keyed by
  `BLOQRA_THEME_VERSION` so parsing happens once per release; `SCRIPT_DEBUG` bypasses the cache.
- **Badges:** entries may optionally be written as `* [New] ...`, `* [Fix] ...`,
  `* [Improvement] ...` in `readme.txt`. The parser strips the tag and renders a coloured dot plus
  label; untagged lines render neutral. This stays perfectly readable on the wp.org theme page, so
  there is no cost to the .org listing.
- **Dates:** optional `= 1.0.3 - 2026-08-13 =` heading suffix, rendered right-aligned and localised
  via `date_i18n`; omitted cleanly when absent.
- Newest version first; versions after the first three collapse behind a "Show older versions"
  toggle (progressive enhancement — all versions stay in the DOM for no-JS).

**Housekeeping this exposes:** `readme.txt` currently documents only `1.0.0` and `1.0.2`, but
`style.css` is at `1.0.3` — `1.0.1` and `1.0.3` are missing. I will backfill them from git history
(`b225fbe`, `d870b35`, `3ffaf5b`, `d0560fc`, `d3cb7af`) as part of this work.

### 4.4 Starter Templates (built now, shown later)

Content designed from `Astra-started-templates.png` + `Kadence-starter-templates.png`:

- Centred hero: icon, headline, one-paragraph pitch, primary CTA.
- Preview image band.
- 6 feature tiles (icon + title + blurb) — the theme already ships six icon SVGs in
  `assets/images/` (speed, design, patterns, responsive, access, shop) that fit exactly.
- Repeat CTA at the bottom.

**Three CTA states**, resolved by a single `bloqra_starter_templates_status()` helper:

1. Plugin not installed → **Install Starter Templates** (same install flow as §4.2)
2. Installed, inactive → **Activate**
3. Active → **Launch Starter Templates** (deep link into the plugin's own screen)

The tab stays `enabled => false` in the registry until the plugin is published; flipping that flag
is the only change needed then.

---

## 5. Supporting work

### 5.1 Welcome notice

Dismissible admin notice after theme activation (`after_switch_theme` sets a flag): "Thanks for
installing Bloqra — head to the Bloqra dashboard to get started." Shown only to users with
`edit_theme_options`, hidden on the Bloqra screens themselves, dismissal stored in user meta (so it
is per-user, not global), and permanent — never re-nag.

### 5.2 Styling

- Scoped under `.bloqra-admin` so nothing leaks into other admin screens.
- Uses the theme's violet (`#5511F8`) for primary actions and neutral greys for surfaces —
  visually a sibling of the front end, while respecting WP admin conventions (button sizes, focus
  rings, `@media (prefers-reduced-motion)`).
- **Logical CSS properties throughout** (`margin-inline-start`, `padding-inline`) so RTL works
  without a separate `admin-rtl.css` — consistent with the theme's `rtl-language-support` tag.
- Responsive: 3-up → 2-up → 1-up grid; sidebar drops below the main column under ~1200px; usable at
  the WP admin's 782px mobile breakpoint.
- Respects `admin_color` schemes enough not to look broken on Midnight, Ectoplasm, etc.
- `admin.min.css` generated with the same node one-liner used for `style.min.css`, banner kept.

### 5.3 Docs / metadata touch-ups

- `readme.txt`: backfill `1.0.1` and `1.0.3`, adopt the `[New]/[Fix]/[Improvement]` tag style going
  forward, and add a changelog entry for this feature.
- `.distignore`: add `TODO.md`.
- No `style.css` header changes needed.

---

## 6. Implementation phases

| Phase | Deliverable | Depends on |
|-------|-------------|-----------|
| **1** | Bootstrap: `includes/admin.php`, menu + registry + page shell + asset enqueue. Renders an empty tabbed page. | §0.1 answered |
| **2** | Dashboard: hero, card grid, next steps, sidebar. Verify every Site Editor deep link on the local site. | 1 |
| **3** | Admin CSS + JS: full styling, responsive, RTL, a11y, minified build. | 1–2 |
| **4** | Useful Plugins: metadata array, status detection, install/activate wiring, capability fallbacks. | 1, 3 |
| **5** | Changelog: `readme.txt` parser, badges, dates, caching, collapse toggle, readme backfill. | 1, 3 |
| **6** | Welcome notice, `.distignore`, final polish. | 1–5 |
| **7** | Starter Templates stub (disabled). Enabled in a later release. | 1, 3 |

Suggested merge order: 1 → 2 → 3 → 5 → 4 → 6 → 7 (Changelog before Plugins because it is
self-contained and has no AJAX surface).

---

## 7. Verification checklist (run before calling it done)

**Functional**

- [ ] Menu appears in the chosen location; all three submenu items deep-link to the right tab
- [ ] Every Site Editor / settings link resolves correctly on WP 6.7 **and** the current 7.x
- [ ] Plugin cards show the correct state for: not installed / installed-inactive / active
- [ ] Install and Activate both work, and the button state updates without a page reload
- [ ] Changelog renders every version from `readme.txt`, newest first, badges correct
- [ ] Welcome notice appears once, dismisses permanently, and is per user

**Security & standards**

- [ ] `edit_theme_options` guards the page; `install_plugins`/`activate_plugins` guard the actions
- [ ] Nonce on every AJAX request; slug validated against the allow-list server side
- [ ] All output escaped; all input sanitized
- [ ] PHPCS (WPCS) clean; Theme Check plugin passes with no new errors or warnings
- [ ] PHP 7.4 compatible
- [ ] No front-end queries or assets added — confirm with a front-end load

**Presentation**

- [ ] Readable at 1440 / 1280 / 1024 / 782 / 480 px
- [ ] RTL correct (switch the site to `ar` or `he`)
- [ ] Keyboard navigable; visible focus rings; tab strip has correct ARIA
- [ ] Does not break under the Midnight admin colour scheme
- [ ] All strings translatable; no untranslated hardcoded copy
- [ ] Nothing anywhere references the Bloqra blocks plugin

**Local site notes:** test at `https://wpthemes.test/` (`curl -sk`). No wp-cli — MySQL directly via
`mysql -uroot -proot wpthemes`. The pattern transient gotcha does not apply here; this work does
not touch `patterns/`.

---

## 8. Explicitly out of scope

- Any theme **options/settings** storage — this is an informational dashboard, not a settings
  screen. (Also the safer .org posture: presentation belongs in the Site Editor.)
- Bundling plugin ZIPs, or any forced/required plugin install
- **Any upsell, pro badge or commercial messaging.** The theme is free forever. All pro
  positioning lives in the Bloqra blocks plugin (§9) — this is a deliberate stance, not an
  oversight, and it should survive future edits.
- Onboarding wizard / demo content import — that is the Starter Templates plugin's job
- Customizer panels — Bloqra is FSE only

---

## 9. Coexistence with the Bloqra blocks plugin

The theme and the "Bloqra – Gutenberg Blocks" plugin (v1.5.2) share the `bloqra` slug. Verified
against the installed plugin, the two only overlap in one place, and the menu split resolves it.

### 9.1 Division of the admin area

| | Owns | Registers with | Commercial messaging |
|---|---|---|---|
| **Plugin** | top-level `Bloqra` menu | `add_menu_page()` | Pro upgrade banner lives here |
| **Theme** | `Appearance → Bloqra` | `add_theme_page()` | **None, ever** |

Neither side needs to know the other exists at registration time. No hook-priority ordering, no
`$admin_page_hooks` guard, no shared slug contract.

### 9.2 Discoverability, and the one-directional cross-link

With the plugin installed there are two Bloqra destinations, and a user hunting for theme settings
may click the prominent top-level one first. Mitigation, **implemented plugin-side only**:

- When `get_template() === 'bloqra'`, the plugin adds a "Theme Dashboard" submenu pointing at
  `themes.php?page=bloqra`. `add_submenu_page()` accepts a file/URL in the slug position — the same
  mechanism Astra uses for its "Customize" item. It is a link, not a page registration, so there is
  no ordering dependency whatsoever.
- **The theme never links to, mentions or detects the plugin.** The cross-link is strictly
  plugin → theme. This preserves the standing rule (§1) that the theme reads as fully standalone
  until .org approval — and it happens to be the direction that solves the problem.
- Without the plugin installed, no top-level menu exists at all, so theme-only users have exactly
  one destination and zero ambiguity.

### 9.3 Namespace collisions — checked, no action needed

| Surface | Plugin | Theme | Verdict |
|---|---|---|---|
| Constants | `BLOQRA_VERSION`, `BLOQRA_FILE`, `BLOQRA_PATH`, `BLOQRA_URL`, `BLOQRA_ASSETS_*` | `BLOQRA_THEME_*` | ✅ Distinct |
| Functions | fully namespaced (`Bloqra\`, `Bloqra\Blocks\`), zero global `bloqra_*` | global `bloqra_*` | ✅ Cannot clash |
| Text domain | `bloqra` | `bloqra` | ⚠️ Both merge into `$l10n['bloqra']`. Legal — theme and plugin slugs are separate namespaces on .org — and benign unless identical msgids need different translations. Accepted; no restructuring. |

**One naming rule this imposes:** theme constants must stay in the `BLOQRA_THEME_*` space, never
bare `BLOQRA_*`, or they will collide the day the plugin defines the same name. The menu-placement
escape hatch is therefore `BLOQRA_THEME_ADMIN_TOP_LEVEL`, not `BLOQRA_ADMIN_TOP_LEVEL`.

---

*Written 2026-08-25. Nothing implemented yet — waiting on your review. §0.1 and §9 are settled;
§0.2 is still open.*
