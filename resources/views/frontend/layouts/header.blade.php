<style>
/* =====================================================================
   PolyGamez header — clean light theme, full-width, one bar.
   Built on app.css :root palette. Deep selectors win over app.css's own
   deep header selectors (clip-path blocks / hidden icons). JS hooks kept:
   .sideCartToggler / .sideMenuCls2 -> .sideCart-wrapper.show,
   .hamburger-menu -> .mobile-navar.active & .bar.animate,
   .has-children slideToggle + .icon-arrow.open.
   ===================================================================== */

/* ---------- Preloader ---------- */
#preloader {
    position: fixed;
    inset: 0;
    background: var(--bg, #f6f7f2);
    display: flex; align-items: center; justify-content: center;
    z-index: 99999;
    transition: opacity 0.5s ease, visibility 0.5s ease;
}
.preloader-content {
    text-align: center;
    background: var(--text, #0b0d10);
    border-radius: 24px; padding: 34px 42px;
    box-shadow: 0 28px 70px rgba(8, 10, 12, 0.18);
}
.preloader-logo { margin-bottom: 18px; }
.preloader-logo img {
    width: 76px; height: 76px; object-fit: contain;
    border-radius: 18px; background: #fff; padding: 8px;
    box-shadow: 0 18px 38px rgba(8, 10, 12, 0.22);
}
.preloader-spinner { margin-bottom: 15px; }
.spinner-ring {
    width: 50px; height: 50px;
    border: 3px solid rgba(223, 255, 0, 0.22);
    border-top-color: var(--primary, #dfff00);
    border-radius: 50%; animation: spin 1s linear infinite; margin: 0 auto;
}
.preloader-text {
    color: #fff; font-family: "Chakra Petch", sans-serif;
    font-size: 14px; letter-spacing: 2px; text-transform: uppercase; margin: 0;
}
@keyframes spin { to { transform: rotate(360deg); } }

/* ---------- Header shell: ONE full-width light glass bar ---------- */
header.large-screens,
header.large-screens nav,
header.small-screen {
    background: rgba(255, 255, 255, 0.94) !important;
    border-bottom: 1px solid var(--border-light, rgba(8, 10, 12, 0.08)) !important;
    box-shadow: 0 12px 30px rgba(8, 10, 12, 0.06);
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
}
header.large-screens nav { box-shadow: none; border-bottom: none; }
/* full width */
header.large-screens .container,
header.small-screen .container {
    max-width: 100% !important;
    width: 100% !important;
    padding-left: 44px !important;
    padding-right: 44px !important;
}
header.large-screens .navbar {
    min-height: 84px;
    width: 100%;
    align-items: center !important;
}
/* vertically centered, spread across the bar */
header.large-screens nav .navbar-collapse {
    width: 100%;
    align-items: center !important;
    gap: 18px;
}

/* ---------- Brand: flat, no box, no click flash ---------- */
header.large-screens nav .navbar-collapse .navbar-brand,
header.large-screens .navbar-brand,
header.small-screen .navbar-brand,
.navbar-brand:hover,
.navbar-brand:focus,
.navbar-brand:active {
    width: auto !important;
    background: transparent !important;
    background-image: none !important;
    border: none !important;
    box-shadow: none !important;
    outline: none !important;
    -webkit-tap-highlight-color: transparent !important;
    border-radius: 0 !important;
    padding: 0 !important;
    margin: 0 !important;
}
header.large-screens nav .navbar-collapse .navbar-brand img,
.navbar-brand img {
    height: 70px !important;
    width: auto !important;
    max-width: 300px !important;
    display: block !important;
    object-fit: contain !important;
}
header.small-screen .navbar-brand img { height: 58px !important; max-width: 220px !important; }

/* ---------- Main menu: transparent row, lime pill on hover/active ---------- */
header.large-screens nav .navbar-collapse .navbar-nav.mainmenu {
    display: flex; align-items: center; flex-wrap: wrap; justify-content: center;
    background: transparent !important;
    border: none !important; box-shadow: none !important;
    border-radius: 0 !important; padding: 0 !important; margin: 0;
    gap: 4px;
}
header.large-screens nav .navbar-collapse .navbar-nav.mainmenu > li { list-style: none; }
/* base link (covers HOME/ABOUT/GAMES + CONTACT, which has no main-menu-item class) */
header.large-screens nav .navbar-collapse .navbar-nav.mainmenu > li > a {
    display: inline-flex; align-items: center; gap: 6px;
    background: transparent !important;
    color: var(--text, #0b0d10) !important;
    border-radius: 999px !important;
    padding: 10px 18px !important;
    font-size: 13px !important;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    text-decoration: none;
    transition: var(--transition, all 0.25s ease);
}
header.large-screens nav .navbar-collapse .navbar-nav.mainmenu > li > a:hover,
header.large-screens nav .navbar-collapse .navbar-nav.mainmenu > li.active > a,
header.large-screens nav .navbar-collapse .navbar-nav.mainmenu > li > a.active {
    background: var(--primary, #dfff00) !important;
    color: var(--text, #0b0d10) !important;
}
/* KILL app.css angular clip-path "block" pseudo-elements */
header.large-screens nav .navbar-collapse .navbar-nav .menu-item a.main-menu-item::before,
header.large-screens nav .navbar-collapse .navbar-nav .menu-item a.main-menu-item::after,
header.large-screens nav .navbar-collapse .navbar-nav .menu-item:first-child a.main-menu-item:hover::before,
header.large-screens nav .navbar-collapse .navbar-nav .menu-item:first-child a.main-menu-item.active::before,
header.large-screens nav .navbar-collapse .navbar-nav .menu-item:last-child a.main-menu-item:hover::before,
header.large-screens nav .navbar-collapse .navbar-nav .menu-item:last-child a.main-menu-item.active::before {
    display: none !important;
    content: none !important;
    background: transparent !important;
    clip-path: none !important;
    -webkit-clip-path: none !important;
}
/* stop app.css square lime hover on non-pill links (icons handled below) */
header.large-screens nav .navbar-collapse .navbar-nav .right-content .menu-item a:hover { background-color: transparent !important; }
.navbar .mainmenu > li > a .fa-caret-down { color: inherit; font-size: 10px; }

/* ---------- Dropdowns / submenus (dark, lime hover) ---------- */
header.large-screens nav .navbar-collapse .navbar-nav .menu-item.has-children .submenu,
.navbar .submenu,
.navbar .dropdown-menu {
    background: #101114 !important;
    border: 1px solid rgba(223, 255, 0, 0.18) !important;
    border-radius: 16px !important;
    padding: 8px !important;
    box-shadow: 0 24px 60px rgba(8, 10, 12, 0.22) !important;
    min-width: 200px;
}
header.large-screens nav .navbar-collapse .navbar-nav .menu-item.has-children .submenu li,
.navbar .submenu li,
.navbar .dropdown-menu li { list-style: none; margin: 0 0 2px; transform: none !important; opacity: 1 !important; }
header.large-screens nav .navbar-collapse .navbar-nav .menu-item.has-children .submenu li a,
.navbar .submenu li a,
.navbar .dropdown-menu li a {
    display: block;
    padding: 10px 14px !important;
    background: transparent !important;
    border-radius: 10px !important;
    color: rgba(255, 255, 255, 0.78) !important;
    font-size: 13px !important;
    font-weight: 500;
    text-transform: none !important;
    text-decoration: none;
    transition: var(--transition, all 0.25s ease);
}
header.large-screens nav .navbar-collapse .navbar-nav .menu-item.has-children .submenu li a:hover,
.navbar .submenu li a:hover,
.navbar .dropdown-menu li a:hover,
.dropdown-item:hover {
    background: var(--primary, #dfff00) !important;
    color: var(--text, #0b0d10) !important;
}
/* Right-side dropdowns open right-aligned so they don't overflow */
header.large-screens nav .navbar-collapse .navbar-nav.right-content li.menu-item.has-children > .submenu {
    left: auto !important;
    right: 0 !important;
}
/* Game mega menu: 2-col grid */
.game-mega-menu {
    display: grid !important;
    grid-template-columns: repeat(2, minmax(160px, 1fr));
    gap: 2px 12px;
    min-width: 360px !important;
    max-width: 480px !important;
}
.game-mega-menu li a { white-space: normal; word-wrap: break-word; }

/* ---------- Right content: currency / language chips ---------- */
header.large-screens nav .navbar-collapse .navbar-nav.right-content {
    display: flex; align-items: center; gap: 12px; margin: 0;
}
header.large-screens nav .navbar-collapse .navbar-nav.right-content li.menu-item > a.main-menu-item {
    display: inline-flex; align-items: center; gap: 6px;
    background: var(--surface-2, #f0f2e9) !important;
    border: 1px solid var(--border, rgba(8, 10, 12, 0.12)) !important;
    border-radius: 999px !important;
    color: var(--text, #0b0d10) !important;
    padding: 10px 14px !important;
    font-size: 12px !important;
    font-weight: 600;
    text-transform: uppercase;
    text-decoration: none;
    white-space: nowrap;
    transition: var(--transition, all 0.25s ease);
}
header.large-screens nav .navbar-collapse .navbar-nav.right-content li.menu-item > a.main-menu-item:hover {
    background: var(--primary, #dfff00) !important;
    border-color: var(--primary, #dfff00) !important;
    color: var(--text, #0b0d10) !important;
}

/* ---------- Icon buttons (cart + account) — dark circles ---------- */
header.large-screens nav .navbar-collapse .right-content li.icon {
    background: transparent !important;
    clip-path: none !important;
    -webkit-clip-path: none !important;
    text-align: center;
}
header.large-screens nav .navbar-collapse .right-content li.icon a,
header.large-screens nav .navbar-collapse .navbar-nav.right-content li.menu-item > a.header-icon-btn {
    width: 44px !important; height: 44px !important; min-width: 44px !important;
    padding: 0 !important;
    background: var(--text, #0b0d10) !important;
    border: 1px solid var(--text, #0b0d10) !important;
    border-radius: 50% !important;
    color: #fff !important;
    display: inline-flex !important; align-items: center !important; justify-content: center !important;
    position: relative;
    transition: var(--transition, all 0.25s ease);
}
header.large-screens nav .navbar-collapse .right-content li.icon a:hover,
header.large-screens nav .navbar-collapse .navbar-nav.right-content li.menu-item > a.header-icon-btn:hover {
    background: var(--primary, #dfff00) !important;
    border-color: var(--primary, #dfff00) !important;
    color: var(--text, #0b0d10) !important;
    transform: translateY(-2px);
}
header.large-screens nav .navbar-collapse .right-content li.icon a svg,
header.large-screens nav .navbar-collapse .navbar-nav.right-content li.menu-item > a.header-icon-btn svg {
    width: 20px !important; height: 20px !important;
    stroke: currentColor !important; fill: none !important; color: inherit !important;
}
header.large-screens nav .navbar-collapse .right-content li.icon a .badge-uinfo {
    position: absolute; top: -4px; right: -4px;
    background: var(--primary, #dfff00) !important; color: var(--text, #0b0d10) !important;
    font-size: 10px; font-weight: 700; min-width: 16px; height: 16px;
    border-radius: 50%; display: flex; align-items: center; justify-content: center;
    padding: 0 4px; box-shadow: 0 0 0 2px #fff;
}

/* ---------- Credits chip (logged-in) ---------- */
.custom-jpont { list-style: none; }
.custom-jpont a {
    display: inline-block;
    background: var(--primary, #dfff00) !important;
    color: var(--text, #0b0d10) !important;
    border-radius: 999px; padding: 10px 16px; font-weight: 800; font-size: 12px;
    text-decoration: none;
    box-shadow: var(--glow-primary, 0 14px 34px rgba(195, 226, 0, 0.28));
}

/* ---------- Mobile header ---------- */
header.small-screen .hamburger-menu .bar,
header.small-screen .hamburger-menu .bar:before,
header.small-screen .hamburger-menu .bar:after {
    background: var(--text, #0b0d10) !important;
}
header.small-screen .mobile-navar { background: #fff !important; }
header.small-screen .mobile-navar ul li a,
.mobile-icon-btn {
    background: var(--surface-2, #f4f5ef) !important;
    color: var(--text, #0b0d10) !important;
    border: 1px solid var(--border-light, rgba(8, 10, 12, 0.08)) !important;
}
header.small-screen .mobile-navar ul li a {
    display: block; padding: 14px 20px; border-radius: 10px; margin-bottom: 4px;
}
header.small-screen .mobile-navar ul li a:hover,
header.small-screen .mobile-navar ul li a.active,
header.small-screen .mobile-navar ul li.has-children.active > a,
.mobile-icon-btn:hover {
    background: var(--text, #0b0d10) !important;
    color: var(--primary, #dfff00) !important;
    clip-path: none !important;
    -webkit-clip-path: none !important;
}
.mobile-icons-row {
    display: flex !important; gap: 10px; padding: 15px !important;
    border-bottom: 1px solid var(--border-light, rgba(8, 10, 12, 0.08)) !important;
    margin-bottom: 10px;
}
.mobile-icon-btn {
    display: flex !important; align-items: center; gap: 8px;
    padding: 10px 15px !important; border-radius: 10px !important; font-size: 14px !important; text-decoration: none;
}
.mobile-icon-btn .badge { background: var(--accent, #ff2a2a); color: #fff; font-size: 11px; padding: 2px 6px; border-radius: 10px; }

/* ====================================================================
   Side cart — PolyGamez fresh HUD panel
   Flex-column panel: dark header bar, scrolling item list, pinned footer.
   JS hooks preserved: .sideCart-wrapper(.show) / .sidemenu-content /
   .sideMenuCls2(.closeButton). Beats app.css + theme.css (loaded last).
   ==================================================================== */

/* Translucent dim backdrop — page stays visible behind the panel */
.sideCart-wrapper.offcanvas-wrapper {
    background: rgba(8, 10, 12, 0.5) !important;
    -webkit-backdrop-filter: blur(3px);
    backdrop-filter: blur(3px);
}

/* Panel shell: flex column so the list scrolls and the footer pins */
.sideCart-wrapper .sidemenu-content {
    width: 420px !important;
    max-width: 92vw !important;
    padding: 0 !important;
    background: var(--bg, #f6f7f2) !important;
    background-image: none !important;
    overflow: hidden !important;
    display: flex !important;
    flex-direction: column !important;
    box-shadow: -24px 0 60px rgba(8, 10, 12, 0.28);
}
.sideCart-wrapper .widget.widget_shopping_cart {
    display: flex; flex-direction: column;
    flex: 1 1 auto; min-height: 0; margin: 0 !important; padding: 0 !important;
}

/* ---- Dark header bar ---- */
.sideCart-wrapper .widget_title {
    position: relative; flex: 0 0 auto;
    margin: 0 !important; padding: 26px 26px 22px !important;
    background: var(--text, #0b0d10) !important; color: #fff !important;
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 17px !important; font-weight: 800 !important;
    text-transform: uppercase; letter-spacing: 1.5px;
    display: flex; align-items: center; gap: 10px; border: none !important;
}
.sideCart-wrapper .widget_title::before {
    content: "\f07a"; /* fa-shopping-cart */
    font-family: "Font Awesome 5 Free", "Font Awesome 5 Pro", sans-serif; font-weight: 900;
    color: var(--primary, #dfff00); font-size: 18px;
}
.sideCart-wrapper .widget_title::after {
    content: ""; position: absolute; left: 26px; bottom: 0;
    width: 46px; height: 3px; background: var(--primary, #dfff00);
}

/* ---- Scrollable item list ---- */
.sideCart-wrapper .widget_shopping_cart_content {
    display: flex; flex-direction: column; flex: 1 1 auto; min-height: 0;
}
.sideCart-wrapper .cart_list {
    flex: 1 1 auto; min-height: 0; overflow-y: auto;
    list-style: none; margin: 0; padding: 18px 18px 6px;
}
.sideCart-wrapper .cart_list::-webkit-scrollbar { width: 6px; }
.sideCart-wrapper .cart_list::-webkit-scrollbar-track { background: transparent; }
.sideCart-wrapper .cart_list::-webkit-scrollbar-thumb { background: rgba(8, 10, 12, 0.18); border-radius: 3px; }
.sideCart-wrapper .cart_list::-webkit-scrollbar-thumb:hover { background: var(--primary-ink, #5d7100); }

/* ---- Item card ---- */
.sideCart-wrapper .mini_cart_item {
    position: relative; list-style: none;
    background: var(--surface, #ffffff) !important;
    border: 1px solid var(--border-light, rgba(8, 10, 12, 0.08)) !important;
    border-radius: 16px !important; padding: 16px !important; margin: 0 0 12px !important;
    box-shadow: 0 4px 16px rgba(8, 10, 12, 0.04);
    transition: all 0.25s ease;
}
.sideCart-wrapper .mini_cart_item:hover {
    border-color: var(--primary, #dfff00) !important;
    box-shadow: 0 14px 30px rgba(8, 10, 12, 0.08);
}
/* remove (trash) chip — force inside the card (beats app.css left:95%/top:50%) */
.sideCart-wrapper .mini_cart_item > .remove {
    position: absolute !important; top: 12px !important; right: 12px !important;
    left: auto !important; transform: none !important; z-index: 2;
    width: 30px; height: 30px; border-radius: 9px;
    display: flex !important; align-items: center; justify-content: center;
    background: rgba(255, 42, 42, 0.08); border: 1px solid rgba(255, 42, 42, 0.2);
    color: var(--accent, #ff2a2a) !important; text-decoration: none; font-size: 13px;
    transition: all 0.2s ease;
}
.sideCart-wrapper .mini_cart_item > .remove:hover {
    background: var(--accent, #ff2a2a); color: #fff !important;
    border-color: var(--accent, #ff2a2a); transform: rotate(8deg);
}

/* product row */
.sideCart-wrapper .prductsde_info { display: flex; align-items: flex-start; gap: 14px; text-decoration: none; padding-right: 34px; }
.sideCart-wrapper .prductsde_info > a { flex: 0 0 auto; }
.sideCart-wrapper .prductsde_info img {
    width: 72px; height: 72px; border-radius: 14px; object-fit: cover;
    border: 1px solid var(--border-light, rgba(8, 10, 12, 0.08));
    background: var(--surface-2, #f0f2e9);
}
.sideCart-wrapper .cart-product-info { display: flex; flex-direction: column; width: 100%; min-width: 0; align-items: flex-start; }
.sideCart-wrapper .cart-product-title {
    color: var(--text, #0b0d10) !important; font-family: 'Chakra Petch', sans-serif !important;
    font-weight: 800; font-size: 15px; line-height: 1.3; margin: 0 0 8px;
}
/* base points line ( number + ) */
.sideCart-wrapper .cart-product-info > p.text-white,
.sideCart-wrapper .text-white { color: var(--text-muted, #68707a) !important; font-size: 12px; font-weight: 600; }
.sideCart-wrapper .cart-product-info > p.text-white { margin: 0 0 6px; }

/* points pill */
.sideCart-wrapper .cart-total-points {
    display: inline-flex; align-items: center; gap: 5px; align-self: flex-start; margin: 4px 0 0 !important;
    background: var(--primary, #dfff00); color: var(--text, #0b0d10) !important;
    font-family: 'Chakra Petch', sans-serif !important; font-weight: 800; font-size: 13px;
    padding: 5px 12px; border-radius: 999px; line-height: 1;
}

/* training hours chip */
.car-hours-group {
    position: relative; display: block; margin-top: 8px; width: 100%;
    background: var(--surface-2, #f0f2e9); border: 1px dashed rgba(109, 127, 0, 0.4);
    border-radius: 12px; padding: 10px 14px;
}
.car-hours-group h5 {
    color: var(--primary-ink, #5d7100) !important; font-family: 'Chakra Petch', sans-serif !important;
    font-weight: 800; font-size: 14px; margin: 0 0 2px;
}
.car-hours-group p { color: var(--text-muted, #68707a) !important; font-size: 12px; margin: 0; }
.car-hours-group .training-remove {
    position: absolute; top: -9px; right: -9px; width: 22px; height: 22px; border-radius: 50%;
    background: var(--text, #0b0d10); color: #fff !important; text-align: center; line-height: 20px;
    text-decoration: none; font-weight: 700; font-size: 13px;
    box-shadow: 0 2px 8px rgba(8, 10, 12, 0.25); transition: all 0.2s ease;
}
.car-hours-group .training-remove:hover { background: var(--accent, #ff2a2a); transform: scale(1.1); }

/* non-game (points) item — centered, balanced padding, clear of the remove chip */
.sideCart-wrapper .mini_cart_item:has(.cart-info) { padding: 18px 18px !important; }
.sideCart-wrapper .cart-info {
    padding: 6px 20px 4px !important; text-align: center;
    color: var(--text, #0b0d10) !important;
    font-weight: 800; font-size: 16px; font-family: 'Chakra Petch', sans-serif !important;
}
.sideCart-wrapper .cart-info p { color: var(--text-muted, #68707a) !important; font-size: 13px; font-weight: 600; margin: 4px 0 0; }

/* ---- Pinned footer (total + CTAs) ---- */
.sideCart-wrapper .sidecart-footer {
    flex: 0 0 auto; padding: 18px;
    background: var(--surface, #ffffff);
    border-top: 1px solid var(--border-light, rgba(8, 10, 12, 0.08));
    box-shadow: 0 -10px 30px rgba(8, 10, 12, 0.05);
}
.sideCart-wrapper .total {
    display: flex; align-items: center; justify-content: space-between;
    background: var(--text, #0b0d10) !important; border: none !important;
    border-radius: 14px; padding: 16px 20px; margin: 0 0 14px !important; width: 100%;
}
.sideCart-wrapper .total strong {
    color: rgba(255, 255, 255, 0.7) !important; font-family: 'Chakra Petch', sans-serif !important;
    font-size: 12px; text-transform: uppercase; letter-spacing: 1.5px; margin: 0;
}
.sideCart-wrapper .total .amount {
    color: var(--primary, #dfff00) !important; font-family: 'Chakra Petch', sans-serif !important;
    font-weight: 900; font-size: 22px; white-space: nowrap;
}
/* CTA buttons — full width, notched HUD style */
.sideCart-wrapper .buttons { display: flex; gap: 10px; margin: 0 !important; }
.sideCart-wrapper .buttons .cus-btn {
    flex: 1 1 0; width: auto !important; margin: 0 !important; min-width: 0;
    justify-content: center; text-align: center;
    background: var(--primary, #dfff00) !important; color: var(--text, #0b0d10) !important;
    border: none !important; padding: 14px 16px !important; font-size: 13px !important;
    font-family: 'Chakra Petch', sans-serif !important; font-weight: 800 !important;
    text-transform: uppercase; letter-spacing: 0.5px;
    transition: all 0.2s ease !important; box-shadow: 0 10px 24px rgba(195, 226, 0, 0.28);
}
.sideCart-wrapper .buttons .cus-btn::before { display: none !important; }
.sideCart-wrapper .buttons .cus-btn:hover,
.sideCart-wrapper .buttons .cus-btn:focus,
.sideCart-wrapper .buttons .cus-btn:active {
    background: var(--text, #0b0d10) !important; color: var(--primary, #dfff00) !important;
    box-shadow: 0 12px 28px rgba(8, 10, 12, 0.25); transform: translateY(-2px);
}

/* ---- Close button (lime chip, reads on dark header + light empty state) ---- */
.sideCart-wrapper .closeButton {
    position: absolute !important; top: 20px !important; right: 22px !important; z-index: 6;
    width: 36px; height: 36px; border-radius: 10px; padding: 0 !important;
    display: flex; align-items: center; justify-content: center;
    background: var(--primary, #dfff00) !important; border: none !important;
    color: var(--text, #0b0d10) !important; font-size: 16px; line-height: 1;
    box-shadow: 0 4px 12px rgba(8, 10, 12, 0.22); transition: all 0.2s ease;
}
.sideCart-wrapper .closeButton:hover { background: #ffffff !important; color: var(--text, #0b0d10) !important; transform: rotate(90deg); }

/* ---- Empty state (only the title is present) ---- */
.sideCart-wrapper .widget_shopping_cart > .widget_title:only-child {
    background: var(--bg, #f6f7f2) !important; color: var(--text-muted, #68707a) !important;
    justify-content: center; text-align: center; letter-spacing: 1px;
    padding: 90px 26px !important; font-size: 15px !important;
}
.sideCart-wrapper .widget_shopping_cart > .widget_title:only-child::before {
    display: block; margin: 0 auto 14px; font-size: 32px;
}
.sideCart-wrapper .widget_shopping_cart > .widget_title:only-child::after { display: none; }

/* ---------- Back to top ---------- */
.back-to-top { background: var(--primary, #dfff00); color: var(--text, #0b0d10); }

/* ---------- Breakpoints ---------- */
@media (max-width: 1199px) {
    header.large-screens { display: none !important; }
    header.small-screen { display: block !important; }
}
@media (min-width: 1200px) {
    header.small-screen { display: none !important; }
    header.large-screens { display: block !important; }
}
</style>
<body>
  <!-- Preloader-->
  <div id="preloader">
    <div class="preloader-content">
      <div class="preloader-logo">
        <img src="{{ asset('assets/media/favicon.webp') }}" alt="Polygamez">
      </div>
      <div class="preloader-spinner">
        <div class="spinner-ring"></div>
      </div>
      <p class="preloader-text">Loading...</p>
    </div>
  </div>
  <!-- Back To Top Start -->
  <a href="#main-wrapper" id="backto-top" class="back-to-top"><i class="fas fa-angle-up"></i></a>
  <!-- Main Wrapper Start -->
  <div id="main-wrapper" class="main-wrapper overflow-hidden">

    <!-- Header Area Start -->
    <header class="large-screens">
      <div class="container">
        <nav class="navbar navbar-expand-lg">
          <div class="collapse navbar-collapse justify-content-between">

            <a class="navbar-brand" href="{{route('home')}}" style="display: inline-block !important; padding: 0 !important;">
    <img
        alt="Polygamez"
        src="{{url('assets/media/logo.webp')}}"
        style="height: 74px !important; width: auto !important; max-width: 300px !important; object-fit: contain !important; display: block !important; padding: 0 !important; margin: 0 !important;"
    >
</a>

            <ul class="navbar-nav mainmenu">
              <li class="menu-item has-children">
                <a href="{{route('home')}}" class="main-menu-item {{ request()->routeIs('home') ? 'active' : '' }}">{{__('common.home')}}</a>  </li> 
                 <li class="menu-item has-children">
                <a href="{{route('about-us')}}" class="main-menu-item {{ request()->routeIs('about-us') ? 'active' : '' }}">{{__('common.about')}}</a>  </li> 
                 
              <li class="menu-item has-children">

    <a href="javascript:void(0);" class="main-menu-item" style="min-width:80px;">
      {{__('common.games')}}
        <i class="fas fa-caret-down ms-1"></i>
    </a>

    <ul class="submenu game-mega-menu">

        @php 
            $categories = Helper::productCategoryList("all");
        @endphp

        @foreach($categories as $cat_info)
            <li class="menu-item">
                <a href="{{ route('product-cat', $cat_info->slug) }}">
                    {{ $cat_info->title }}
                </a>
            </li>
        @endforeach

    </ul>

</li>
               <li class="menu-item has-children"><a href="{{route('contact')}}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">{{__('common.contact_us')}}</a></li>
             
            </ul>
            @auth
    @php
        $points = DB::table('users')
            ->where('id', auth()->id())
            ->value('points')?? 0;
    @endphp

    <li style="list-style:none;" class="custom-jpont">
        <a href="javascript:void(0)">
            <span>{{ __('common.credits') }}: <b class="dash-epnt1" >{{ $points }}</b></span>
        </a>
    </li>
@endauth

            <ul class="navbar-nav right-content unstyled"> 
               <li class="menu-item has-children d-none d-md-block">
                <a href="javascript:void(0);" class="main-menu-item ">
                  {{Helper::getCurrencySymbol(session('currency')).' '.session('currency')}}
                     @php  $currencies = Helper::CurrenciesList();  @endphp
                    
                    <i class="fas fa-caret-down m-1"></i></a>
                <ul class="submenu">
    @foreach($currencies as $currency) 
<li><a class="dropdown-item" href="{{ route('change.currency', $currency->code) }}">{{$currency->symbol." ".$currency->code}}</a></li>
                            @endforeach
                </ul>
              </li>

              <li class="menu-item has-children d-none d-md-block">
                <a href="javascript:void(0);" class="main-menu-item " style="min-width:80px;">
                         @php
                                if(session('app_locale') == 'ja') {
                                    echo 'JA';
                                } else {
                                    echo 'EN';
                                }
                            @endphp

                    <i class="fas fa-caret-down m-1"></i></a>
                <ul class="submenu">
         <li><a href="{{ route('change.language', 'en') }}">EN</a></li>
        <li><a href="{{ route('change.language', 'ja') }}">JA</a></li>
                </ul>
              </li>

                    <!-- Cart Icon -->
              <li class="icon position-relative sideCartToggler">
                <a href="javascript:void(0)" class="header-icon-btn cart-icon-btn" aria-label="Shopping Cart">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="9" cy="21" r="1"/>
                        <circle cx="20" cy="21" r="1"/>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                    </svg>
                    <span class="badge-uinfo">{{ Helper::totalCartQuantity() }}</span>
                </a>
            </li>
            
            <!-- User/Profile Icon with Dropdown -->
            @if(Auth::check() && Auth::user()->role=='user')
                <li class="menu-item has-children">
                    <a href="{{route('user')}}" class="header-icon-btn" aria-label="My Account">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('user')}}">{{ __('common.my_account') ?? 'My Account' }}</a></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('common.logout') ?? 'Logout' }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            @else
                <li class="menu-item has-children">
                    <a href="javascript:void(0)" class="header-icon-btn" aria-label="Account">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('login.form')}}">{{ __('common.login') }}</a></li>
                        <li><a href="{{route('register.form')}}">{{ __('common.register') }}</a></li>
                    </ul>
                </li>
            @endif
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <header class="small-screen">
      <div class="container">
        <div class="mobile-menu">
<a class="navbar-brand" href="{{route('home')}}" style="display: inline-block !important; padding: 0 !important;">
    <img
        src="{{url('assets/media/logo.webp')}}"
        alt="Polygamez"
        style="height: 62px !important; width: auto !important; max-width: 250px !important; object-fit: contain !important; display: block !important; padding: 0 !important; margin: 0 !important;"
    >
</a>
          <div class="hamburger-menu">
            <div class="bar"></div>
          </div>
        </div>
        <nav class="mobile-navar d-xl-none">
          <ul>
            <li class="mobile-icons-row">
              <a href="#" class="mobile-icon-btn" onclick="document.querySelector('.sideCart-wrapper').classList.add('show'); return false;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <circle cx="9" cy="21" r="1"></circle>
                  <circle cx="20" cy="21" r="1"></circle>
                  <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
                <span>Cart</span>
                <span class="badge">{{Helper::cartCount()}}</span>
              </a>
              @if(Auth::check() && Auth::user()->role=='user')
                <a href="{{route('user')}}" class="mobile-icon-btn">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                  </svg>
                  <span>Account</span>
                </a>
              @else
                <a href="{{route('login.form')}}" class="mobile-icon-btn">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                  </svg>
                  <span>Login</span>
                </a>
              @endif
            </li>
 
           

              <li class="has-children active"><a href="{{route('home')}}">{{__('common.home')}}</a>  </li>
            <li class="has-children">{{__('common.games')}} <span class="icon-arrow"></span>

               @php 
            $categories = Helper::productCategoryList("all");
        @endphp
        <ul class="childern">
           @foreach($categories as $cat_info)
            <li class="menu-item">
                <a href="{{ route('product-cat', $cat_info->slug) }}">
                    {{ $cat_info->title }}
                </a>
            </li>
          @endforeach
      </ul>
            </li>
              <li class="has-children"><a href="{{route('about-us')}}">{{__('common.about_us')}}</a></li>  
             <li class=" has-children"><a href="{{route('database')}}">{{__('common.database')}}</a></li> 
                <li class=" has-children"> <a href="{{route('contact')}}">{{__('common.contact_us')}}</a></li>
                <li class="has-children">  {{Helper::getCurrencySymbol(session('currency')).' '.session('currency')}}
                     @php  $currencies = Helper::CurrenciesList();  @endphp <span class="icon-arrow"></span>
         <ul class="children">
              
        @foreach($currencies as $currency) 
          <li><a class="dropdown-item" href="{{ route('change.currency', $currency->code) }}">{{$currency->symbol." ".$currency->code}}</a></li>
                            @endforeach
            </li>
</ul>
</li>

             <li class="has-children">
                <a href="javascript:void(0);" >
                         @php
                                if(session('app_locale') == 'ja') {
                                    echo 'JA';
                                } else {
                                    echo 'EN';
                                }
                            @endphp 
                    
                   <span class="icon-arrow"></span></a>
                <ul class="children">
         <li><a href="{{ route('change.language', 'en') }}">EN</a></li>
        <li><a href="{{ route('change.language', 'ja') }}">JA</a></li>
                </ul>
              </li>
              @if(Auth::check() && Auth::user()->role=='user')
              <li><a href="{{route('user')}}"><i class="fal fa-address-card"></i></a></li>
                  @else
                <li><a href="{{route('login.form')}}"><i class="fal fa-user"></i></a></li>
                 @endif
</ul>
                

          </ul>
        </nav>
      </div>
    </header>
        <!--==============================
    Cart Side bar
    ============================== -->
   <div class="sideCart-wrapper offcanvas-wrapper ">
    <div class="sidemenu-content">
        <button class="closeButton border-theme bg-theme-hover sideMenuCls2">
            <i class="far fa-times"></i>
        </button>

        <div class="widget widget_shopping_cart">

        @if(Helper::cartCount())

            @php
                $hasGameProduct = false;
            @endphp

            <h3 class="widget_title">{{__('common.shopping_cart')}}</h3>

            <div class="widget_shopping_cart_content">
                <ul class="cart_list">

                @foreach(Helper::getAllProductFromCart() as $key=>$cart)

                    @if(isset($cart->product['id']) && $cart->product['id'] < 1000)
                        @php $hasGameProduct = true; @endphp

                        <li class="mini_cart_item">

                            <a href="{{ route('cart-delete',$cart->id) }}" class="remove">
                                <i class="fal fa-trash-alt"></i>
                            </a>

                            @php
                                $photo = explode(',', $cart->product['photo']);
                        $product_detail= App\Models\Product::getProductBySlug($cart->product->slug);                                                    
                            $a=$cart['price']-$product_detail->price;
                            $perhour = 20;                        
                            
                          $basic=$product_detail->price;
                          $hours=$cart->hours;       
                            @endphp

                            <div class="prductsde_info">

    <a href="{{ route('product-detail',$cart->product->slug) }}">
        <img src="{{ url($photo[0]) }}" alt="Cart Image">
    </a>

    <div class="cart-product-info">

        <p class="cart-product-title">
            {{ $cart->product['title'] }}
        </p>

        @if($hours > 0)

            <p class="mb-0 text-white">
                <span>{{number_format($basic,0)}} +</span>
            </p>

            <div class="car-hours-group">

                <a href="{{ route('trainingdelete', $cart->id) }}"
                   class="training-remove">
                    ×
                </a>

                <h5>
                    {{$hours}} {{ __('common.hours') }}
                </h5>

                <p class="text-white mb-0">
                    ( {{$hours}} X {{number_format($perhour,0)}} )
                </p>

            </div>

        @endif

        <p class="cart-total-points mb-0">
            = {{number_format($cart['price'],0)}} {{ __('common.points') }}
        </p>

    </div>

</div>

                        </li>

                    @else

                        <li class="mini_cart_item">

                            <a href="{{ route('cart-delete',$cart->id) }}" class="remove">
                                <i class="fal fa-trash-alt"></i>
                            </a>

                            @php
                                $user_id = auth()->check() ? auth()->id() : session('guest');
                                $points = App\Models\Cart::where('user_id', $user_id)
                                            ->where('order_id',null)
                                            ->pluck('points')
                                            ->first();
                            @endphp

                            <div class="cart-info">
                                {{ $points.' '.__('common.points') }}

                                <p class="mb-0">
                                     =  {{ Helper::getCurrencySymbol(session('currency')) }}
                                    {{number_format($cart['price'], session('currency')=='JPY' ? 0 : 2)}}
                                </p>
                            </div>

                        </li>

                    @endif

                @endforeach

                </ul>


                {{-- PINNED FOOTER: total + CTAs --}}
                <div class="sidecart-footer">

                    {{-- TOTAL --}}
                    <div class="total">

                        @php
                            $total_amount = Helper::totalCartPrice();

                            if(session()->has('coupon')) {
                                $total_amount -= Session::get('coupon')['value'];
                            }
                        @endphp

                        <strong>{{__('common.total')}}:</strong>

                        @if($hasGameProduct)
                            <span class="amount">{{ number_format($total_amount,0) }} {{ __('common.points') }}</span>
                        @else
                            <span class="amount">{{ Helper::getCurrencySymbol(session('currency')) }} {{ number_format($total_amount,0) }}</span>
                        @endif
                    </div>


                    {{-- BUTTON SECTION --}}
                    <div class="buttons">

                        @if($hasGameProduct)
                            <a href="{{ route('gamecart') }}" class="cus-btn primary">
                                {{ __('common.purchase_services') }}
                            </a>
                        @else
                            <a href="{{ route('cart') }}" class="cus-btn primary">
                                {{__('common.view_cart')}}
                            </a>

                            <a href="{{ route('checkout') }}" class="cus-btn primary">
                                {{__('common.checkout')}}
                            </a>
                        @endif

                    </div>

                </div>

            </div>

        @else

            <div class="widget_title">
                {{ __('common.no_cart_available') }}
            </div>

        @endif

        </div>
    </div>
</div>
</body>
</html>
