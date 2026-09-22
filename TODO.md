# Bloqra — open items

> The admin dashboard plan that used to live here shipped in **1.0.4** (menu, tab registry,
> Dashboard, Useful Plugins, Changelog, welcome notice, admin CSS/JS, readme backfill). That
> plan has been removed — the code in `includes/admin/` is the record now. What follows is
> only what is still outstanding.
>
> *Trimmed 2026-09-22 against the 1.0.5 tree.*

---

## 1. Starter Templates tab — built, waiting on the plugin

`includes/admin/page-starter-templates.php` is complete: hero, six feature tiles reusing the
bundled icons, and all three CTA states (`Install` / `Activate` / `Launch`) resolved through
`get_cta()`. Nothing about the tab needs writing.

**Blocked on:** the `bloqra-starter-templates` plugin is not published. Verified 2026-09-22 —
`api.wordpress.org/plugins/info/1.0/bloqra-starter-templates.json` returns **404**, while the
blocks plugin (`bloqra`) returns 200.

> ⚠️ **The tab is enabled right now.** `'enabled' => true` for `starter-templates` in
> `Bloqra\Admin\get_tabs()` (`includes/admin.php:80`), and the "flip when it ships" reminder
> comment was removed alongside it, so the change reads as deliberate rather than accidental.
> The Install button still cannot work against a 404 slug. Either publish the plugin or set
> this back to `false` before the next release.

Verify when enabling:

- [ ] `PLUGIN_SLUG` and `PLUGIN_FILE` match what was actually published
- [ ] `admin_url( 'themes.php?page=' . PLUGIN_SLUG )` is the plugin's real screen
- [ ] All three CTA states render correctly against the live plugin

## 2. Useful Plugins — optional enrichment

The tab renders from a static array with no network call, which is why it is instant and works
offline. The plan noted an optional follow-up that was never built: lazy-load each card's icon
and rating from `plugins_api()` behind a ~12-hour transient.

Only worth doing if the cards look bare in practice. It trades the current offline guarantee for
polish, so it is genuinely optional — not a gap.

## 3. Plugin → theme cross-link (plugin-side work)

With the Bloqra blocks plugin installed there are two "Bloqra" admin destinations, and the
top-level one is more prominent. The agreed fix lives **entirely in the plugin**: when
`get_template() === 'bloqra'`, the plugin adds a "Theme Dashboard" submenu pointing at
`themes.php?page=bloqra`.

Recorded here only so the decision is not lost. **The theme must never link to, mention or detect
the plugin** — the cross-link is strictly plugin → theme, which is also the direction that
actually solves the problem. Nothing to do in this repo.

## 4. Standing constraint — constant prefixes

Theme constants stay in the `BLOQRA_THEME_*` namespace, never bare `BLOQRA_*`. The blocks plugin
owns `BLOQRA_VERSION`, `BLOQRA_FILE`, `BLOQRA_PATH`, `BLOQRA_URL` and `BLOQRA_ASSETS_*`; a bare
name here collides the day both are active. Currently respected throughout.

If a menu-placement escape hatch is ever added, it is `BLOQRA_THEME_ADMIN_TOP_LEVEL` for the same
reason. It has not been implemented and is not needed.

---

## Superseded decisions

Two constraints from the original plan no longer hold. Noting them so they are not re-applied:

- **"No mention of the Bloqra blocks plugin anywhere until .org approval."** Reversed in practice —
  *Bloqra Blocks* is now the first card on the Useful Plugins tab
  (`includes/admin/page-plugins.php:37`).
- **"The theme ships a designed homepage out of the box."** Superseded in 1.0.5: `front-page.html`
  was removed because it overrode Settings > Reading. The homepage now ships as the
  `bloqra/page-home` pattern, applied to a page of the user's choosing.
