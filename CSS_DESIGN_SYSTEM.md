# CSS & Design System — `gaminggg` (PolyGamez)

Documentation of the frontend styling: which stylesheets load, the color
palette / theme, typography, and the design tokens used across the site.

> ⚠️ **Most important thing to know:** the project ships **two themes in one file**.
> `theme.css` first defines a **dark purple "WarpStrike"** theme, then at the
> bottom a **"PolyGamez Refresh"** block *redefines the same `:root` variables*.
> Because it is declared later, **the PolyGamez (light) theme is the one that
> actually renders.** Don't trust the colors at the top of `theme.css` — scroll
> to the `POLYGAMEZ REFRESH` section for the live values.

---

## 1. Stylesheet load order

The frontend layout (`resources/views/frontend/layouts/header.blade.php`) loads CSS in this order:

| # | File | Role |
|---|------|------|
| 1 | `assets/css/vendor/bootstrap.min.css` | Bootstrap grid/components (vendor) |
| 2 | `assets/css/vendor/font-awesome.css` | Icon font (vendor) |
| 3 | `assets/css/vendor/slick.css` + `slick-theme.css` | Carousels (vendor) |
| 4 | `assets/css/vendor/aksVideoPlayer.css` | Video player (vendor) |
| 5 | **`assets/css/app.css`** | **Main custom theme** (structure, layout, components) — ~7,000 lines |
| 6 | `assets/css/animate.css` | Animation utilities |
| 7 | **`assets/css/theme.css`** | **Theme override — loaded LAST, wins all conflicts** — ~5,950 lines |

> Fonts are pulled from **Google Fonts** in the `<head>`, not bundled.

**The two files that define the brand look are `app.css` and `theme.css`.**
Everything else is vendor / third-party. (Note: `resources/views/frontend/assets/css/styles.css`
is a large ~39k-line leftover theme file and is **not** linked by the active layout.)

---

## 2. Color palette

### 🟢 Active theme — "PolyGamez Refresh" (light storefront)

Defined in the `POLYGAMEZ REFRESH` block at the bottom of `theme.css`.
Concept: *light storefront, black surfaces, acid-lime actions.*

| Token | Value | Swatch / Use |
|-------|-------|------|
| `--ws-primary` | `#dfff00` | **Acid lime** — primary actions, highlights, CTAs |
| `--ws-primary-light` | `#ecff56` | Lighter lime (hover) |
| `--ws-primary-dark` | `#b7d600` | Darker lime (active/borders) |
| `--ws-secondary` | `#111318` | Near-black secondary |
| `--ws-accent` | `#ff2a2a` | **Red** — alerts, accent CTAs |
| `--ws-accent-light` | `#ff6262` | Light red |
| `--ws-accent-dark` | `#c91515` | Dark red |
| `--ws-bg-dark` | `#f6f7f2` | Page background (off-white) |
| `--ws-bg-darker` | `#ffffff` | White surfaces |
| `--ws-bg-card` | `#ffffff` | Card background |
| `--ws-bg-card-hover` | `#f0f2e9` | Card hover |
| `--ws-text-primary` | `#0b0d10` | Near-black headings/body |
| `--ws-text-secondary` | `#34383f` | Secondary text |
| `--ws-text-muted` | `#68707a` | Muted text |
| `--ws-text-light` | `#8b929c` | Light/disabled text |
| `--ws-border` | `rgba(8,10,12,.12)` | Default border |
| `--ws-border-light` | `rgba(8,10,12,.08)` | Subtle border |
| `--ws-glow-primary` | `0 14px 34px rgba(195,226,0,.28)` | Lime shadow/glow |
| `--ws-glow-accent` | `0 16px 34px rgba(255,42,42,.22)` | Red shadow/glow |

**Most-used raw hex in the active block:** `#0b0d10` (near-black, 68×),
`#dfff00` / `#efff00` (acid lime), `#ffffff` (white), `#f6f7f2` (off-white bg).

### ⚫ Legacy theme — "WarpStrike" (dark mode gaming) — *overridden, not rendered*

Defined in the top `:root` of `theme.css`. Kept for reference only.

| Token | Value | Note |
|-------|-------|------|
| `--ws-primary` | `#7C3AED` | Purple |
| `--ws-primary-light` | `#A78BFA` | Light purple |
| `--ws-primary-dark` | `#5B21B6` | Dark purple |
| `--ws-accent` | `#F43F5E` | Rose / CTA |
| `--ws-bg-dark` | `#0F0F23` | Dark navy bg |
| `--ws-bg-card` | `#1A1A2E` | Dark card |
| `--ws-text-primary` | `#FFFFFF` | White text |

---

## 3. Typography

Fonts loaded from Google Fonts (`header.blade.php`):

| Font | Weights | Typical use |
|------|---------|-------------|
| **Space Grotesk** | 300–700 | **Default body font** (`body { font-family: "Space Grotesk", sans-serif }`) |
| **Orbitron** | 400–900 | Display / gaming headings, numbers |
| **Chakra Petch** | 300–700 | Headings, buttons, tech/gamer accents |
| **Inter** | 300–700 | UI text in some overrides |
| **Open Sans** | 300–600 | Body fallback in places |

Icon font: **Font Awesome 5** (`font-awesome.css`).

---

## 4. Design tokens (effects & motion)

| Token | Value | Use |
|-------|-------|-----|
| `--ws-transition` | `all 0.3s ease` | Standard transitions |
| `--ws-transition-fast` | `all 0.15s ease` | Fast hover transitions |
| `--ws-glow-primary` / `--ws-glow-accent` | see palette | Card / button shadows & glows |

**Signature effects:**
- `.gradient-text` — gradient text fill: `linear-gradient(135deg, var(--ws-primary-light), var(--ws-accent))` clipped to text.
- Hero glows via `radial-gradient(circle, var(--ws-primary) ...)`.
- Lime/red drop-shadow glows on cards and CTAs.

---

## 5. Themed components (sections in `theme.css`)

The override file is organized into these labeled sections:

| Section | Lines | What it styles |
|---------|-------|----------------|
| Root Variables | 10 | Legacy WarpStrike tokens |
| Base Overrides | 49 | `html/body`, scrollbars |
| Navbar / Header | 78 | Top navigation |
| Hero Section | 279 | Homepage hero banner |
| Game Card | 752 | Product/game cards |
| Section Heading | 826 | Section titles |
| Features Section | 860 | Feature blocks |
| How It Works | 904 | Step-by-step block |
| Points Top-Up | 1014 | Points/credit purchase UI |
| Game Grid | 1183 | Product grid |
| Footer | 2140 | Site footer |
| Alerts & Notifications | 2235 | Toasts/alerts |
| Side Cart | 2256 | Slide-in cart |
| About Section | 2301 | About page |
| Mobile Navigation | 2360 | Mobile nav |
| Animations | 2382 | Keyframe animations |
| **PolyGamez Refresh** | **2659–end** | **Active light theme — overrides everything above** |

### Button classes
- `.cus-btn` — base custom button (defined in `app.css:1139`)
  - `.cus-btn.primary` — primary (lime) button with `::before` hover sweep
  - `.cus-btn.sec` — secondary button
  - `.cus-btn.points` — points/credit action button
- `.bp-btn-primary` — PolyGamez primary CTA (lime, in `theme.css`)
- `.category-more-cta`, `.carousel-nav-btn` — navigation CTAs

---

## 6. Quick reference for editing

- **Change brand colors:** edit the `:root` inside the `POLYGAMEZ REFRESH`
  block at the bottom of `public/assets/css/theme.css` (not the top one).
- **Change layout/structure:** `public/assets/css/app.css`.
- **`theme.css` always wins** over `app.css` (loaded last). Many rules use
  `!important`, so overrides usually need `!important` too.
- **Fonts:** edit the Google Fonts `<link>` tags in
  `resources/views/frontend/layouts/header.blade.php`.
- The legacy purple "WarpStrike" palette is dead code kept above the active
  block — safe to ignore, but removing it would require care since some
  non-`:root` rules in between still reference `var(--ws-*)` (which now
  resolve to the PolyGamez values).
