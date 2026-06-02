# Single-Page Game Boosting Website — Conversion Plan

> **Goal:** Convert the current multi-page Laravel site into a **single scrolling landing
> page** for game boosting, while **keeping cart, checkout, login/register, and the
> admin/user dashboards as real separate pages**.
>
> **Approach:** Mostly Blade + navigation editing. No backend rewrite, no JS SPA.
> The Laravel backend (forms, orders, points top-up, admin) stays intact.
>
> **Theme:** Locked to **Burgundy Prestige V2** (cinematic, premium, burgundy-forward dark
> theme). Full spec — CSS variables, component conventions, section backgrounds — lives in
> [`THEME.md`](THEME.md). Color usage ratio: **Backgrounds 60% · Burgundy 20% · Typography
> 15% · Gold 5%**.

---

## 0. Scope decision (locked)

- **Chosen:** *Landing page + keep checkout.*
- The homepage (`resources/views/frontend/index.blade.php`) becomes the whole public
  site. Everything informational lives there as scroll sections.
- Transactional / authenticated flows stay as their own routed pages.

---

## 1. Current state (reference)

**Homepage** `resources/views/frontend/index.blade.php` (~1915 lines) already contains:
1. Hero banner (`#main-wrapper` top)
2. Why Choose Us (`.features-section`)
3. Gaming Featured (`.game-grid-section`)
4. Points Top-Up calculator (`#points-topup`)
5. Cinematic Video showcase (`.cinema-showcase-section`)

**Data already passed by `FrontendController@home()`** — reusable for new sections:
`featured`, `posts`, `banners`, `product_lists`, `category_lists`, `instructor_data`.

**Standalone pages that will be folded in:**
- `frontend/pages/about-us.blade.php` — `.polygamez-about-page` + guarantee items
- `frontend/pages/contact.blade.php` — `#contact_form`, POST → `route('contact.send')`
- Games / `product-cat` listing — services grid

**Nav** `frontend/layouts/header.blade.php` (~980 lines): Home / About / Games (mega-menu
of categories) / Contact — both desktop (`~L562-592`) and a mobile menu block.

**Footer** `frontend/layouts/footer.blade.php`: links to `home`, `about-us`, `contact`,
and `pages/{policy}` (delivery/privacy/refund/terms), plus company email.

---

## 2. Pages to KEEP as separate routes (do NOT fold in)

| Area | Routes / views |
|---|---|
| Cart | `cart`, `gamecart`, `cart-delete`, `cart.update` |
| Checkout & orders | `checkout`, `cart.order`, `cart.payment`, `order-success`, `order-failed`, `order.track` |
| Auth | `login.form`, `register.form`, password reset, socialite |
| Service detail | `product-detail/{slug}` (individual boosting service / order page) |
| Dashboards | entire `/admin` and `/user` route groups |
| Legal pages | `pages/{slug}` (privacy, refund, terms, delivery) — keep as real pages |

---

## 3. Work items

### 3.1 Add new homepage sections
Append to `index.blade.php` after the existing sections, each with an `id` anchor:

- [ ] `<section id="games">` — Games/Categories grid built from `$category_lists` /
      `$product_lists` (link each card to its existing `product-cat` / `product-detail`
      page). **Placed first, right after the Hero.**
- [ ] `<section id="how-it-works">` — **new section**: a simple step-by-step
      ("1. Pick your game → 2. Choose boost / top up points → 3. Sit back, track progress").
      Build from scratch (no existing source page).
- [ ] `<section id="contact">` — port `#contact_form`; keep `method="POST"
      action="{{ route('contact.send') }}"` and the jQuery validation block.
- [ ] *(optional)* `<section id="news">` — small "Latest News" strip from `$posts`
      instead of the full blog.

> **About:** not in the current page flow. Either drop `about-us.blade.php` entirely, or
> merge a short blurb/guarantee items into the **Why Choose Us** section. (See §6.)

> Note: move any page-specific CSS/JS from those pages into the homepage (or a shared
> stylesheet) so the folded sections render correctly.

### 3.2 Rewrite navigation → anchor scrolls
`frontend/layouts/header.blade.php` (desktop **and** mobile blocks):
- [ ] Home → top (`#main-wrapper` or `#`)
- [ ] Games mega-menu → `#games` (keep mega-menu visual, point items to `#games`)
- [ ] Add How It Works → `#how-it-works`
- [ ] Contact → `#contact`

- [ ] Keep cart / account icons pointing to their real routes.
- [ ] Add smooth scrolling (`scroll-behavior: smooth` in CSS, or small JS handler) and
      account for the fixed header height with `scroll-margin-top` on each section.

### 3.3 Update footer
`frontend/layouts/footer.blade.php`:
- [ ] `about-us` → `#about`, `contact` → `#contact`, Home → top.
- [ ] Leave legal `pages/{policy}` links as real pages.

### 3.4 Routes — **leave untouched** (no backend changes)
> ⚠️ **Strict rule:** we do **not** edit `routes/web.php`, controllers, models, or any
> PHP backend. (Supersedes the earlier "clean up routes" idea.)

- [ ] Do **NOT** remove or redirect the folded GET pages. `about-us`, `contact` (GET),
      and `faqs` stay live as routes — we simply **stop linking to them** from nav/footer.
      Old bookmarks keep working (no 404s, no redirects needed, no backend edits).
- [ ] All POST/action routes keep working unchanged: `contact.send` / `contact.store`,
      `subscribe`, `points-add-to-cart`, `single-add-to-cart`, and every cart/checkout/
      order route. We reuse them exactly as the existing forms call them.
- [ ] The catch-all `Route::get('{slug}', ...)` is untouched, so legal pages still resolve.

### 3.5 QA checklist
- [ ] All nav + footer anchors scroll to the right section (desktop + mobile).
- [ ] Contact form submits and validates as before.
- [ ] Points top-up calculator + add-to-cart still works.
- [ ] Cart → checkout → order flow unaffected.
- [ ] Login/register/admin/user dashboards unaffected.
- [ ] Removed routes return home (no 404s from old links/bookmarks).
- [ ] Mobile menu closes after an anchor is tapped.

---

## 3.6 Design direction — Burgundy Prestige V2, animated anime/Japanese

Theme is **locked** to **Burgundy Prestige V2** (see [`THEME.md`](THEME.md)). Aesthetic is
**animated neo-Japanese (和風)** — ink/brush, sakura, torii, seigaiha waves, subtle manga
energy (speed lines, slashes, halftone) — **all recolored into the burgundy/gold palette**
(no new hues). Premium and cinematic, but motion is restrained: no scroll-jacking, capped
particles, and full `prefers-reduced-motion` support. See the **"Anime / Japanese (和風)
layer"** section in `THEME.md` for the motif map, animation system, and fonts.

A **site-wide ambient video background** (`public/assets/images/background.mp4`, ~2 MB) sits
behind every page via the layout, heavily tinted burgundy/ink so the theme and text stay
dominant; sections go translucent over it. Poster fallback + reduced-motion + mobile
fallback are required. Full spec in `THEME.md` → "Global video background".

- [ ] **Apply the theme tokens first** — pull the CSS variables from `THEME.md` into the
      shared stylesheet, then style sections with the vars (no hard-coded hex). Respect the
      **60 / 20 / 15 / 5** ratio: backgrounds dominate, burgundy is the brand accent,
      gold (`--accent #C89A48`) stays rare (premium highlights only).
- [ ] **Simple scroll reveals** — sections gently **fade / slide up** as they enter the
      viewport. Reuse the project's existing `sal.css` (AOS-style) animations; keep
      durations short and subtle. No parallax, no scroll-jacking, no pinned sections.
- [ ] **Standard section flow** — normal stacked sections (not forced `100vh` per
      screen). Generous spacing and clear section headers (`.section-title`).
- [ ] **Alternate section backgrounds** for rhythm using the section classes from
      `THEME.md` (`bg-primary` / `bg-secondary` / `bg-tertiary`):
      Hero → primary · Games → secondary · Why Us → secondary · How It Works → tertiary ·
      Top-Up → tertiary · Video → secondary · Contact → primary · Footer → footer-bg.
- [ ] **Reuse the existing cinematic video section** roughly as-is — no new full-screen
      video hero required; re-skin to the burgundy palette.
- [ ] **Bold but tidy typography**, minimal copy per section. Use `.hero-title`,
      `.section-title`, `.card-title` conventions from `THEME.md`.
- [ ] **Burgundy glow accents** — buttons/cards lift on hover (`translateY`) with
      `--glow-primary`; `.text-accent` highlights key words in burgundy.
- [ ] **Sticky nav** that gains a solid/blurred burgundy-dark background on scroll (keep
      current header structure: logo + anchor links + cart/account icons). Active anchor
      link uses `--primary`.
- [ ] **Smooth anchor scrolling** (`scroll-behavior: smooth` + `scroll-margin-top` for
      the fixed header).

> Performance: lazy-load below-the-fold media; keep using `.webp` images (per recent
> commits). Keep animations light so the page stays fast on mobile.

---

## 4. Suggested section order on the page

```
Hero  →  Games/Categories (#games)  →  Why Choose Us  →  How It Works (#how-it-works)
     →  Points Top-Up (#points-topup)  →  Cinematic Video  →  Contact (#contact)  →  Footer
```

> **Footer** stays global — included via the layout (`frontend/layouts/footer.blade.php`),
> so it appears at the bottom of **every page** (landing page + all kept pages: cart,
> checkout, auth, dashboards, legal).

---

## 5. Effort estimate

Mostly Blade + nav editing — no backend rewrite.
- 3 new sections to build from scratch (Games grid, How It Works, optional News).
- 1 section ported (Contact).
- Header + footer nav rewrite.
- Route cleanup + redirects.

---

## 6. Open decisions before coding

1. **About:** drop `about-us.blade.php` entirely, or merge a short blurb into Why Choose Us?
2. **Blog:** drop entirely, or keep a "Latest News" strip? *(default: drop)*
3. **Instructors:** drop, or repurpose as a "Boosters/Team" section? *(default: drop)*
4. **Games section:** pull from product **categories** or individual **products**?
5. Keep the **mega-menu** styling for Games, or replace with a single `#games` link?
6. ~~**Palette:**~~ **RESOLVED** → **Burgundy Prestige V2** (dark base + burgundy accent +
   rare gold). Full spec in [`THEME.md`](THEME.md); ratio 60/20/15/5.

---

## 7. Ways of working (the workflow)

### 7.1 The one hard rule — frontend only
**We do NOT change backend code.** Off-limits, no exceptions without explicit sign-off:
- `routes/web.php` and any route definitions
- Controllers, models, requests, middleware, migrations, config, `.env`
- Any `.php` outside of Blade view markup

**In-scope (the only things we touch):**
- Blade views under `resources/views/frontend/**`
- CSS: primarily `public/assets/css/theme.css` (the global override, loaded last) and
  per-section styles
- Light vanilla JS / jQuery for nav scroll + scroll reveals (reusing existing libs:
  `sal.css`-style animations, slick, etc.)

> If a task *seems* to need a backend change, STOP and flag it — don't edit PHP logic.
> Almost everything here is achievable in Blade + CSS because the data and routes already
> exist (`FrontendController@home()` already passes `featured`, `posts`, `banners`,
> `product_lists`, `category_lists`, `instructor_data`).

### 7.2 How the re-skin actually works
The whole site is already themed by **`public/assets/css/theme.css`** (~6.7k lines,
currently a purple/rose "WarpStrike" theme) using `--ws-*` CSS variables applied with
`!important`, loaded **last** in `head.blade.php`. That is our lever:

- [ ] **Re-map the `--ws-*` variables** at the top of `theme.css` to Burgundy Prestige V2
      values (`--ws-primary` → `#B13F3F`, backgrounds → `#1E1818/#241C1C/#2C2222`, text →
      `#FAF7F7/#E2D5D5`, accent/gold → `#C89A48`, glows → burgundy rgba). Changing ~20
      variable definitions re-skins **the entire site at once** (landing + all kept pages).
- [ ] **Add the new component tokens/classes** from [`THEME.md`](THEME.md) for the new
      landing sections, layered on top of the var remap.
- [ ] No find-and-replace across 267 `--ws-*` usages — we keep the variable *names* and
      only change their *values*. Lowest risk, fully reversible.

### 7.3 Order of execution (phases)
Work in small, independently-verifiable phases. Don't start a phase until the prior one
renders correctly.

1. **Phase 0 — Theme swap.** Remap `theme.css` vars to burgundy. Verify the *existing*
   site (home + a kept page like checkout) looks right in burgundy before adding anything.
2. **Phase 1 — New sections in `index.blade.php`.** Build `#games`, `#how-it-works`,
   `#contact` (port the existing `#contact_form` markup + its jQuery validation), optional
   `#news`. One section per commit; reuse data already in scope.
3. **Phase 2 — Nav + footer → anchors.** Point Home/Games/How It Works/Contact to anchors
   in both desktop & mobile blocks; keep cart/account on real routes; sticky-nav scroll
   bg; `scroll-behavior: smooth` + `scroll-margin-top`.
4. **Phase 3 — Motion polish.** Subtle fade/slide-up reveals via the existing animation
   lib; burgundy glow hovers; lazy-load below-the-fold media.
5. **Phase 4 — QA pass.** Run the full §3.5 checklist.

### 7.4 Definition of done per change
- [ ] No `.php` edited except Blade markup. (Quick check: `git diff --name-only` shows
      only views/css/js.)
- [ ] Existing forms still POST to their original routes — markup `action`/`method`/field
      `name`s unchanged.
- [ ] Verified visually against the Burgundy Prestige V2 spec (`THEME.md`) and the
      60/20/15/5 ratio.
- [ ] Desktop + mobile checked; kept pages (cart/checkout/auth/dashboards/legal) unbroken.

### 7.5 Working agreement
- Small commits, one concern each; descriptive messages.
- Ask before any change that would touch backend or remove a route.
- Settle the remaining §6 open decisions (1–5) just-in-time, as each phase needs them.
