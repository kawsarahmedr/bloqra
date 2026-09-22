# Bloqra — open items

> The admin dashboard plan that used to live here shipped in **1.0.4** (menu, tab registry,
> Dashboard, Useful Plugins, Changelog, welcome notice, admin CSS/JS, readme backfill). That
> plan has been removed — the code in `includes/admin/` is the record now. What follows is
> only what is still outstanding.
>
> *Trimmed 2026-09-23 against the 1.0.5 tree; the Starter Templates tab shipped once its plugin was published.*

---

## 1. Useful Plugins — optional enrichment

The tab renders from a static array with no network call, which is why it is instant and works
offline. The plan noted an optional follow-up that was never built: lazy-load each card's icon
and rating from `plugins_api()` behind a ~12-hour transient.

Only worth doing if the cards look bare in practice. It trades the current offline guarantee for
polish, so it is genuinely optional — not a gap.

## 2. Plugin → theme cross-link (plugin-side work)

With the Bloqra blocks plugin installed there are two "Bloqra" admin destinations, and the
top-level one is more prominent. The agreed fix lives **entirely in the plugin**: when
`get_template() === 'bloqra'`, the plugin adds a "Theme Dashboard" submenu pointing at
`themes.php?page=bloqra`.

Recorded here only so the decision is not lost. **The theme must never link to, mention or detect
the plugin** — the cross-link is strictly plugin → theme, which is also the direction that
actually solves the problem. Nothing to do in this repo.

## 3. Standing constraint — constant prefixes

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
