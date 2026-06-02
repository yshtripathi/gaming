# Theme — Burgundy Prestige V2

> Cinematic • Premium • Burgundy-forward dark theme for the game-boosting landing page.
> This is the **locked theme** for the single-page conversion (see `SINGLE-PAGE-CONVERSION-PLAN.md` §6 palette decision).
>
> **Aesthetic direction: animated anime / Japanese (和風) — same burgundy palette.**
> Think a premium dark *neo-Japanese* gaming site: ink + brush, sakura, torii, seigaiha
> waves, manga energy (speed lines, slashes, halftone) — all recolored into burgundy & gold.
> Motion is a first-class part of the theme, not decoration. Details in §"Anime/JP layer".

## Color usage ratio (60 / 20 / 15 / 5)

Apply colors by surface area, not evenly:

| Share | Role | Colors |
|---|---|---|
| **60%** | Backgrounds | `--bg-primary` / `--bg-secondary` / `--bg-tertiary`, surfaces, footer |
| **20%** | Burgundy accent | `--primary` family (buttons, links, borders-active, glows) |
| **15%** | Typography | `--text-primary` / `--text-secondary` / `--text-muted` |
| **5%**  | Gold accent | `--accent` (sparingly — premium highlights only) |

Keep gold rare. Burgundy is the brand presence; gold is a finishing touch.

## CSS Variables

```css
:root {

  /* ===== BACKGROUNDS (60%) ===== */
  --bg-primary:        #1E1818;
  --bg-secondary:      #241C1C;
  --bg-tertiary:       #2C2222;

  --surface:           #2A2020;
  --surface-hover:     #352727;
  --surface-elevated:  #402D2D;

  --footer-bg:         #181313;

  /* ===== BRAND / BURGUNDY (20%) ===== */
  --primary:           #B13F3F;
  --primary-hover:     #C85050;
  --primary-active:    #983333;
  --primary-soft:      #D46A6A;
  --primary-light:     #E48A8A;

  /* Premium gold accent (5%) */
  --accent:            #C89A48;
  --accent-hover:      #D9AC5A;

  /* ===== TEXT (15%) ===== */
  --text-primary:      #FAF7F7;
  --text-secondary:    #E2D5D5;
  --text-muted:        #B8A7A7;
  --text-disabled:     #8E7B7B;

  /* ===== BORDERS ===== */
  --border:            #4A3434;
  --border-hover:      #6A4646;
  --border-active:     #B13F3F;

  /* ===== STATUS ===== */
  --success:           #4D8A63;
  --warning:           #D7A54A;
  --danger:            #C94A4A;
  --info:              #7A869A;

  /* ===== SHADOWS ===== */
  --shadow-sm:  0 4px 20px rgba(0,0,0,.15);
  --shadow-md:  0 10px 30px rgba(0,0,0,.25);
  --shadow-lg:  0 20px 50px rgba(0,0,0,.35);

  /* Burgundy glow */
  --glow-primary: 0 0 40px rgba(177,63,63,.35);
}
```

## Component conventions

**Typography**
- `.hero-title` — `clamp(4rem,8vw,10rem)`, weight 800, line-height .9, letter-spacing -.05em
- `.section-title` — `clamp(2.5rem,4vw,4rem)`, weight 700
- `.card-title` — 1.4rem, weight 600
- `.text-accent` — uses `--primary` (burgundy highlight)
- `p` — `--text-secondary`, line-height 1.8
- `.small-text` — `--text-muted`

**Buttons**
- `.btn-primary` — `--primary` bg, white text; hover → `--primary-hover` + `translateY(-3px)` + `--glow-primary`
- `.btn-secondary` — transparent, `1px solid --primary`; hover → `rgba(177,63,63,.15)` bg, `--primary-hover` border

**Cards** — `--surface` bg, `--border`; hover → `--surface-hover`, `--primary` border, `translateY(-6px)`, `--glow-primary`

**Inputs** — `--surface` bg, `--border`; focus → `--primary` border + `0 0 0 4px rgba(177,63,63,.15)`

**Nav links** — `--text-secondary`; hover → `--text-primary`; `.active` → `--primary`

**Section backgrounds** (alternate primary/secondary/tertiary for rhythm):
`.hero-section` → bg-primary · `.games-section` → bg-secondary · `.services-section` → bg-tertiary · `.why-us-section` → bg-secondary · `.topup-section` → bg-tertiary · `.video-section` → bg-secondary · `.contact-section` → bg-primary · `.footer` → footer-bg

**Overlays**
- `.hero-overlay` — `linear-gradient(135deg, rgba(177,63,63,.40) 0%, rgba(177,63,63,.15) 40%, transparent 100%)`
- `.game-banner-overlay` — `linear-gradient(to top, rgba(30,24,24,.95), rgba(30,24,24,.50), transparent)`

**Scrollbar / selection** — 10px track on `--bg-primary`, thumb `--primary` (hover `--primary-hover`); `::selection` → `--primary` bg, white text.

---

## Anime / Japanese (和風) layer — animated

The *style* on top of the palette. Goal: a premium **neo-Japanese gaming** feel — ink &
brush, sakura, torii, waves, subtle manga energy — **never** changing the burgundy/gold
colors. Stays elegant, not a costume; motion is intentional and light on mobile.

### Design tokens to add

```css
:root {
  /* Anime/JP accent surfaces — derived from the burgundy palette, no new hues */
  --ink:           #181313;            /* sumi ink — deepest bg, brush strokes */
  --washi:         rgba(250,247,247,.04); /* faint paper texture overlay */
  --sakura:        var(--primary-light);  /* #E48A8A petals */
  --sakura-soft:   var(--primary-soft);   /* #D46A6A petals (depth) */
  --seal-gold:     var(--accent);         /* #C89A48 hanko/seal + kanji accents */
  --slash:         var(--primary-hover);  /* #C85050 speed-line / slash glow */

  /* Motion */
  --ease-jp:       cubic-bezier(.16,1,.3,1);  /* soft, decisive settle */
  --dur-reveal:    .7s;
  --dur-hover:     .3s;
}
```

### Typography (add these Google Fonts in `head.blade.php`)
- **Display / headings:** `Shippori Mincho B1` — elegant Japanese mincho serif, premium.
  Pair with the existing Latin display (`Chakra Petch`/`Orbitron`) for game copy.
- **Brush accent (sparing):** `Yuji Syuku` or `Zen Antique` for short Japanese phrases,
  section kickers, the logo lockup — never body text.
- **Katakana/kanji kickers:** small label above each section title (e.g. ゲーム / 強化 /
  連絡), `--seal-gold`, letter-spaced, low opacity. Decorative, always paired with English.

### Visual motifs (all recolored to the palette)
- **Seigaiha 青海波 waves** — repeating wave arcs as faint section dividers / footer top,
  drawn in `--border`/`--primary` via CSS `radial-gradient` or inline SVG.
- **Sumi-e brush strokes** — burgundy ink underlines/dividers under titles; `.text-accent`
  words get a hand-painted brush highlight (SVG stroke or `mask`).
- **Sakura petals** — `--sakura` / `--sakura-soft` petals, used as falling particles (see
  motion) and as static scatter accents. Burgundy-tinted, never pink-pure.
- **Torii / shrine arch** — subtle line-art motif framing the hero or "How It Works" steps.
- **Hanko seal (印)** — circular gold stamp (`--seal-gold`) as a badge / "verified booster"
  / CTA accent. Slight rotation, looks pressed-in.
- **Manga energy** — radial **speed lines** and diagonal **slash** panels on hero & card
  hovers; optional **halftone/screentone** dot texture at low opacity on dark panels.
- **Washi paper grain** — `--washi` noise overlay on big backgrounds for warmth.

### Animation system
Keep it CSS-first (keyframes + IntersectionObserver reveals). No scroll-jacking. Honor
`@media (prefers-reduced-motion: reduce)` — disable particles/auto-motion, keep instant.

| Name | Where | Behavior |
|---|---|---|
| `petal-fall` | hero / section backdrops | sakura petals drift + rotate down, looped, low count (~10–14), GPU `transform` only |
| `ink-reveal` | section enter | title/word masked by a brush wipe that "paints" in left→right (`--dur-reveal`, `--ease-jp`) |
| `brush-underline` | section titles, links | SVG stroke draws on (`stroke-dashoffset`) on enter / hover |
| `slash-in` | hero CTA, card hover | quick diagonal light streak (`--slash`) sweeps across |
| `speed-lines` | hero, hover states | radial lines fade/scale from center on hover or load |
| `seal-press` | hanko badges, submit success | gold seal scales down + slight rotate, like a stamp press |
| `glow-pulse` | primary CTAs, live dots | gentle `--glow-primary` breathing |
| `fade-slide-up` | generic reveal | the default subtle entrance (reuse existing `sal`/`animate.css`) |
| `float-y` | floating cards / petals / lanterns | slow vertical bob, looped |

**Rules of restraint:** one "hero" motion per section, the rest subtle. Durations short
(`.3–.7s`). Particles capped and paused off-screen. Everything degrades to static with
reduced-motion. Lazy-load motifs below the fold; keep it 60fps on mobile.

### Where each motif lands (landing page)
- **Hero** — torii line-art + speed-lines behind title, `ink-reveal` headline, gold
  katakana kicker, slow sakura `petal-fall`, `slash-in` on the primary CTA.
- **Games (#games)** — cards with halftone hover, `slash-in` streak, brush-underline title.
- **How It Works (#how-it-works)** — 3 steps as hanko-stamped circles, `seal-press` on
  enter, connected by a sumi-e brush line.
- **Points Top-Up (#points-topup)** — `glow-pulse` on the calculate/CTA, seigaiha divider.
- **Cinematic Video** — keep as-is, add a thin seigaiha frame + gold corner accents.
- **Contact (#contact)** — washi paper card, `seal-press` on successful submit.
- **Footer** — seigaiha wave top border, faint sakura scatter.
