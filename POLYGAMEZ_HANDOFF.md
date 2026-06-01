# PolyGamez — Project & Redesign Handoff

Context doc for continuing work in a new session. Covers the design system,
what's been redesigned, the conventions to follow, and known gotchas.

> Companion file: **`CSS_DESIGN_SYSTEM.md`** (deeper CSS/palette reference).

---

## 1. Project at a glance
- **Stack:** Laravel 10, PHP 8.1+, MySQL (DB name `xybera_boost`, local root/no-pass), XAMPP. Blade views. jQuery + Bootstrap 5 + Slick + WOW on the frontend.
- **Brand:** "PolyGamez" — a gaming store (games, boosting/training, points/credits).
- **Frontend layout:** `resources/views/frontend/layouts/main.blade.php` →
  `@include` header + `user.layouts.notification` (global toasts) + `@yield('main-content')` + footer.
- **Git:** repo initialized, pushed to `https://github.com/yshtripathi/gaming` (branch `main`).
  `.gitignore` excludes `.env`, `vendor/`, `node_modules/`, and `public/dbadmin/` (bundled phpMyAdmin, intentionally not committed).

---

## 2. THE DESIGN SYSTEM (PolyGamez — light theme)

Single source of truth = the `:root` palette in **`public/assets/css/app.css`** (top of file).

| Token | Value | Use |
|-------|-------|-----|
| `--primary` | `#dfff00` | Acid lime — buttons, fills, accents, active states |
| `--primary-light` | `#ecff56` | lighter lime |
| `--primary-dark` | `#b7d600` | darker lime |
| `--primary-ink` | `#5d7100` | lime as **text** (readable on light) |
| `--accent` | `#ff2a2a` | Red — errors, accent CTAs |
| `--accent-dark` | `#c91515` | dark red |
| `--bg` | `#f6f7f2` | page background (light) |
| `--surface` | `#ffffff` | cards / panels |
| `--surface-2` | `#f0f2e9` | insets / hover |
| `--text` | `#0b0d10` | near-black primary text (also used as the "dark" surface, e.g. footer/nav pills) |
| `--text-secondary` | `#34383f` | secondary text |
| `--text-muted` | `#68707a` | muted |
| `--border` / `--border-light` | `rgba(8,10,12,.12)` / `.08` | borders |

**Fonts (Google Fonts, loaded in header):** Space Grotesk (body default), Orbitron, Chakra Petch, Inter, Open Sans.

**Look:** light storefront, **dark footer** (`--text` bg) + dark nav pills with lime accents, red for errors/danger.

---

## 3. CSS files & load order
Loaded in `header.blade.php` `<head>`:
1. vendor: bootstrap, font-awesome, slick, slick-theme, aksVideoPlayer
2. **`assets/css/app.css`** — main sheet, owns the `:root` palette (light theme, ~7k lines)
3. `assets/css/animate.css`
4. **`assets/css/theme.css`** — override, **loaded LAST so it wins**. Most home-page section styling lives here.

> `theme.css` has TWO `:root` blocks: a legacy dark "WarpStrike" one at the top, then a **"POLYGAMEZ REFRESH"** block near the bottom that **redefines `--ws-*` to the lime/light values**. So legacy `var(--ws-*)` rules still render correctly (lime/light).

---

## 4. What has been redesigned this far

| Area | File | Status |
|------|------|--------|
| **app.css palette** | `public/assets/css/app.css` | Converted dark→light: added real `:root`, replaced ~422 hardcoded hex with `var(...)` by property role; defined legacy aliases (`--theme-color`, `--white-color`, etc.) |
| **Header** | `resources/views/frontend/layouts/header.blade.php` | Fully rewritten inline `<style>` — clean light glass bar, dark nav pills + lime active, black icon buttons, light chips, light side cart, light mobile menu. Full-width container, vertically centered. |
| **Footer** | `resources/views/frontend/layouts/footer.blade.php` | Dark footer + lime/red accents, lime-tinted card borders, lime titles (with `!important` to beat theme.css), payment icons on white chips. Dead JS/CSS removed. |
| **Global alerts / toasts** | `resources/views/user/layouts/notification.blade.php` | THE single global flash system (included via main layout). Redesigned: **top-center, drops in below header**, white card + circular color-coded icon. Handles `success/error/warning/info` + `loginerror` + validation `$errors`. Auto-dismiss 3s. |
| **Bootstrap `.alert`** | `theme.css` ~line 2237 | Themed (white card, colored left bar) — used by checkout's hidden alerts. |
| **Home page** | `resources/views/frontend/index.blade.php` | Already themed via theme.css. NOT yet cleaned (see Next steps). |

**Per-page alert markup removed** from `login.blade.php` and `contact.blade.php` (now handled globally by the toast).

---

## 5. CONVENTIONS — follow these when editing
1. **Use the app.css palette variables** (`var(--primary)`, `var(--text)`, …). Do **not** introduce new `--ws-*` usage or purple (`#8B5CF6`, `#7C3AED`, `#A855F7`, `rgba(139,92,246,…)`).
2. **app.css owns the palette**; `theme.css` is the last-loaded override.
3. **Inline header/footer `<style>` blocks load after app.css + theme.css**, so they win on equal specificity.
4. **Specificity gotcha:** app.css uses very deep selectors like
   `header.large-screens nav .navbar-collapse .navbar-nav .menu-item a` (and adds `clip-path` blocks + hidden icons). To override, **match that depth or use `!important`** — simple class selectors lose.
5. **theme.css forces `h1–h6 { color:#0b0d10 !important }`** (PolyGamez block). Any heading that must be light/lime needs `color: … !important`.
6. **Never break JS hooks / routes.** Preserve class names and `route()` calls. Key JS hooks:
   - Side cart: `.sideCartToggler` / `.sideMenuCls2` toggle `.sideCart-wrapper.show` (slide handled in `app.css .offcanvas-wrapper.show`); footer JS only adds body scroll-lock.
   - Mobile menu: `.hamburger-menu` toggles `.mobile-navar.active` + `.bar.animate`; `.has-children` slideToggles child `<ul>` + `.icon-arrow.open` (this is why deeply-nested `.has-children` wrappers get hidden on click — avoid that markup).
   - Toasts: `closeWsToast(id)` + auto-dismiss in `user/layouts/notification.blade.php`.
   - Home: `goToSlide()` carousel + points calculator in `index.blade.php` `@push('scripts')`.
7. **Editing technique used here:** for big inline `<style>` rewrites, write the new CSS to a temp file and splice it in via a Python regex replacing `<style>...</style>`, then delete the temp. Validate brace balance + Blade directive balance afterward.

---

## 6. Assets
- DB-uploaded images live under **`public/storage/photos/...`** (products, category) — referenced by DB columns (`products.photo`, `banners.photo`, `categories.photo`, `settings.logo/photo`, etc.). **Never delete based on a code-only search** — check the DB.
- Static theme assets live under **`public/assets/media/`** and **`public/assets/images/`**.
- Cleanups done: removed 153 unused files from `assets/media` (+ empty folders), `dba2.png` from `assets/images`, and `assets/kkk.png`. Remaining assets are all referenced.
- Logo: `assets/media/logo-polygamez-tight.png`; favicon: `assets/media/favicon-polygamez.png`; hero video: `assets/images/hero.mp4`.

---

## 7. Next steps / open items
- **Home page (`index.blade.php`) cleanup — NOT done.** Candidates:
  - The Game Streams carousel hardcodes **5 pages × 4 slots (~330 lines)** of near-identical HTML with `@if(isset($allCategories[n]))` guards → refactor into a Blade loop that chunks categories into pages of 4 (also fixes empty pages; make JS `totalSlides` dynamic).
  - Fix `class  =` typos (extra spaces) around the gear carousel arrows.
  - User was about to point out a **specific section that looks off/unthemed** — ask which section + what's wrong (or get a screenshot).
- Optionally migrate home-page section styling out of theme.css's `--ws-*` rules onto the app.css palette (large; only if desired).
- After visual sign-off, consider stripping now-redundant overrides from `theme.css`.

---

## 8. Verifying changes
- Hard-refresh (Ctrl+F5) after CSS edits (cached).
- Local app served via XAMPP (`C:\xampp\htdocs\gaminggg\app\public`).
- After Blade edits, check `@if/@endif`, `@foreach/@endforeach`, `@php/@endphp`, and CSS `{`/`}` balance.
