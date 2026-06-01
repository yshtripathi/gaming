<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>@yield('title', 'Gaming Fusion | Multi-Game Boosting &amp; Elite Progression Services')</title>
   <meta name="description" content="Boost your rank, power up your skills, and unlock exclusive rewards across all top multiplayer games. Gaming Fusion delivers fast, secure, and reliable boosting.">
   <meta name="keywords" content="game boosting, multi-game boost, rank boosting, gaming services, battle pass completion, unlock farming, pro gamers">
    
<meta property="og:title" content="Gaming Fusion | The Ultimate Boosting Hub">
<meta property="og:description" content="Your destination for fast progress and peak performance in every game you play.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://www.gaming-fusion.com">
<meta property="og:image" content="https://www.gaming-fusion.com/storage/photos/category/41.webp">
<meta property="og:site_name" content="Gaming Fusion">
<meta property="og:locale" content="en_US">   
    
<meta name="robots" content="index, follow">
  <!-- Favicon -->
    <meta name="favicon"  content="{{ asset('assets/media/favicon-polygamez.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/media/favicon-polygamez.png') }}">
  <!-- All CSS files -->
  <link rel="stylesheet" href="{{url('assets/css/vendor/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/css/vendor/font-awesome.css')}}">
  <link rel="stylesheet" href="{{url('assets/css/vendor/slick.css')}}">
  <link rel="stylesheet" href="{{url('assets/css/vendor/slick-theme.css')}}">
  <link rel="stylesheet" href="{{url('assets/css/vendor/aksVideoPlayer.css')}}">
  <link rel="stylesheet" href="{{url('assets/css/app.css')}}">
   <link rel="stylesheet" href="{{url('assets/css/animate.css')}}">
   <link rel="stylesheet" href="{{url('assets/css/theme.css')}}"><!-- Theme Override - Must be loaded last -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;1,400&amp;family=Orbitron:wght@400;600;700;800;900&amp;family=Chakra+Petch:wght@300;400;500;600;700&amp;display=swap">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
   <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-3X49SHWXWY"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-3X49SHWXWY');
</script>
</head>
<style>
/* Navigation - Even spacing, text glow on hover only */
.navbar .mainmenu {
    display: flex;
    align-items: center;
    gap: 4px;
    flex-wrap: wrap;
    justify-content: center;
    margin: 0;
    padding: 0;
}

.navbar .mainmenu > li {
    list-style: none;
    display: flex;
    align-items: center;
}

.navbar .mainmenu > li > a.main-menu-item {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: transparent !important;
    border: none;
    color: rgba(255, 255, 255, 0.7);
    padding: 20px 14px;
    border-radius: 0;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    position: relative;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Text glow only on hover - no background */
.navbar .mainmenu > li > a.main-menu-item:hover {
    background: transparent !important;
    border: none !important;
    box-shadow: none !important;
    color: white !important;
    text-shadow: 0 0 15px rgba(139, 92, 246, 0.8), 0 0 30px rgba(139, 92, 246, 0.4);
}

/* Active state - underline only */
.navbar .mainmenu > li.active > a.main-menu-item {
    background: transparent !important;
    border: none !important;
    box-shadow: none !important;
    color: white !important;
    text-shadow: 0 0 15px rgba(139, 92, 246, 0.8), 0 0 30px rgba(139, 92, 246, 0.4);
}

.cart-product-info{
    display:flex;
    flex-direction:column;
    width:100%;
}

.cart-product-title{
    color:#fff !important;
    font-size:16px;
    font-weight:700;
    margin-bottom:6px;
}

.cart-total-points{
    color:#fff;
    margin-top:8px;
    text-align:left;
}

.sideCart-wrapper .prductsde_info{
    display:flex;
    align-items:flex-start;
    gap:12px;
}

.sideCart-wrapper .prductsde_info img{
    width:60px;
    height:60px;
    object-fit:cover;
    border-radius:12px;
}

.car-hours-group{
    position:relative;
    background:#29a01e;
    padding:10px 14px;
    border-radius:8px;
    margin-top:8px;
    display:inline-block;
    min-width:240px;
}

.car-hours-group h5{
    color:#fff;
    font-size:15px;
    margin-bottom:4px;
}

.training-remove{
    position:absolute;
    top:-6px;
    right:-6px;
    width:20px;
    height:20px;
    border-radius:50%;
    background:#48c72f;
    color:#fff !important;
    text-align:center;
    line-height:20px;
    text-decoration:none;
    font-weight:700;
}

.navbar .mainmenu > li.active > a.main-menu-item::after {
    content: '';
    position: absolute;
    bottom: 12px;
    left: 14px;
    right: 14px;
    height: 2px;
    background: linear-gradient(90deg, var(--ws-primary), var(--ws-accent));
    border-radius: 2px;
    box-shadow: 0 0 10px rgba(139, 92, 246, 0.6);
}

/* Dropdown Submenu Gaming Theme */
.navbar .submenu,
.navbar .dropdown-menu {
    background: var(--ws-bg-card, #1A1F36) !important;
    backdrop-filter: blur(10px);
    border: 1px solid var(--ws-border-light, rgba(160, 174, 192, 0.2)) !important;
    border-radius: 12px !important;
    padding: 8px !important;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4) !important;
    min-width: 180px;
}

.navbar .submenu li,
.navbar .dropdown-menu li {
    list-style: none;
    margin-bottom: 2px;
}

.navbar .submenu li a,
.navbar .dropdown-menu li a {
    display: block;
    padding: 10px 14px !important;
    background: transparent;
    border-radius: 8px;
    color: var(--ws-text-muted, #A0AEC0) !important;
    font-size: 13px;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
}

.navbar .submenu li a:hover {
    background: var(--ws-primary, #8B5CF6) !important;
    color: white !important;
}

/* Transparent Header */
header.large-screens {
    background: transparent !important;
    box-shadow: none !important;
}

header.large-screens nav {
    background: transparent !important;
}

/* Header Icon Buttons - Even spacing */
.header-icon-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: transparent !important;
    border: 1px solid rgba(255, 255, 255, 0.15) !important;
    border-radius: 50%;
    color: var(--ws-text-primary) !important;
    transition: all 0.3s ease;
    text-decoration: none;
}

.header-icon-btn:hover {
    background: var(--ws-primary, #8B5CF6) !important;
    border-color: var(--ws-primary, #8B5CF6) !important;
    color: white !important;
    box-shadow: 0 0 15px rgba(124, 58, 237, 0.5);
    transform: translateY(-2px);
}

.header-icon-btn svg {
    width: 20px;
    height: 20px;
}

/* Override app.css blue icon color */
header.large-screens nav .navbar-collapse .right-content li i,
header.large-screens nav .navbar-collapse .right-content li i:hover,
.sideCartToggler i, .sideCartToggler i:hover,
.sideCartToggler svg, .sideCartToggler svg:hover {
    color: white !important;
}

/* Cart Icon - Match reference exactly */
header.large-screens nav .navbar-collapse .right-content li.icon,
header.large-screens nav .navbar-collapse .right-content li.icon.sideCartToggler {
    background: transparent !important;
    clip-path: none !important;
    -webkit-clip-path: none !important;
    text-align: center !important;
}

header.large-screens nav .navbar-collapse .right-content li.icon a,
header.large-screens nav .navbar-collapse .right-content li.icon.sideCartToggler a {
    width: auto !important;
    height: auto !important;
    padding: 0 !important;
}

/* Header link hover - remove blue box */
header.large-screens nav .navbar-collapse .navbar-nav .menu-item a:hover,
header.large-screens nav .navbar-collapse .navbar-nav .menu-item.has-children .submenu li a:hover,
header.large-screens nav .navbar-collapse .right-content li a:hover,
header.large-screens nav .navbar-collapse .navbar-nav .menu-item.has-children:hover .submenu li a:hover,
header.large-screens nav .navbar-collapse .navbar-nav .menu-item.has-children .children li a:hover {
    background-color: transparent !important;
    color: #8B5CF6 !important;
}

/* Currency & Language dropdown hover - Override app.css blue */
header.large-screens nav .navbar-collapse .right-content .submenu li a:hover,
header.large-screens nav .navbar-collapse .right-content .children li a:hover,
header.large-screens nav .navbar-collapse .right-content .submenu li a:focus,
header.large-screens nav .navbar-collapse .right-content .children li a:focus,
.navbar .submenu li a:hover,
.navbar .dropdown-menu li a:hover,
header.large-screens nav .navbar-collapse .navbar-nav .menu-item.has-children .submenu li a:hover {
    background: rgba(139, 92, 246, 0.2) !important;
    color: white !important;
    background-color: transparent !important;
    outline: none !important;
    box-shadow: none !important;
    -webkit-box-shadow: none !important;
}

/* Remove blue outline from currency/language dropdown triggers */
header.large-screens nav .navbar-collapse .right-content > li > a:hover,
header.large-screens nav .navbar-collapse .right-content > li > a:focus,
header.large-screens nav .navbar-collapse .right-content > li > a:active {
    background: transparent !important;
    outline: none !important;
    box-shadow: none !important;
    -webkit-box-shadow: none !important;
    border: none !important;
}

.cart-icon-btn {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    width: 40px !important;
    height: 40px !important;
    background: #2D2D2D !important;
    border: none !important;
    border-radius: 50% !important;
    color: white !important;
    transition: all 0.3s ease !important;
    position: relative !important;
    padding: 0 !important;
    box-shadow: 0 2px 8px rgba(0,0,0,0.3);
}

.cart-icon-btn svg {
    width: 18px !important;
    height: 18px !important;
    stroke: white !important;
    fill: none !important;
}

.cart-icon-btn:hover {
    background: #3D3D3D !important;
    transform: scale(1.05);
}

.cart-icon-btn .badge-uinfo {
    position: absolute !important;
    top: -4px !important;
    right: -4px !important;
    background: #FF33A8 !important;
    color: white !important;
    font-size: 10px !important;
    font-weight: 700 !important;
    min-width: 16px !important;
    height: 16px !important;
    border-radius: 50% !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    padding: 0 4px !important;
    border: 2px solid #0D0D1A !important;
}

/* Cart Sidebar Gaming Theme */
.sideCart-wrapper {
    background: var(--ws-bg-dark, #0D0D1A) !important;
}

.sideCart-wrapper .sidemenu-content {
    background: var(--ws-bg-dark, #0D0D1A) !important;
    padding: 30px;
}

.sideCart-wrapper .widget_title {
    color: var(--ws-text-primary, white) !important;
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 24px;
    padding-bottom: 16px;
    border-bottom: 2px solid var(--ws-border-light, rgba(160, 174, 192, 0.2));
}

.sideCart-wrapper .cart_list {
    max-height: 400px;
    overflow-y: auto;
    padding-right: 10px;
}

.sideCart-wrapper .cart_list::-webkit-scrollbar {
    width: 6px;
}

.sideCart-wrapper .cart_list::-webkit-scrollbar-track {
    background: rgba(124, 58, 237, 0.1);
    border-radius: 3px;
}

.sideCart-wrapper .cart_list::-webkit-scrollbar-thumb {
    background: var(--ws-primary, #8B5CF6);
    border-radius: 3px;
}

.sideCart-wrapper .mini_cart_item {
    background: var(--ws-bg-card, #1A1F36) !important;
    border: 1px solid var(--ws-border-light, rgba(160, 174, 192, 0.2)) !important;
    border-radius: 16px !important;
    padding: 16px !important;
    margin-bottom: 12px !important;
    position: relative;
    transition: all 0.3s ease;
}

.sideCart-wrapper .mini_cart_item:hover {
    border-color: var(--ws-primary, #8B5CF6) !important;
    box-shadow: 0 0 20px rgba(124, 58, 237, 0.2);
}

.sideCart-wrapper .mini_cart_item .remove {
    position: absolute;
    top: 12px;
    right: 12px;
    
    
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
   
}

 

.sideCart-wrapper .prductsde_info {
    display: flex;
    align-items: center;
    gap: 12px;
    text-decoration: none;
    color: white !important;
}

.sideCart-wrapper .prductsde_info img {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    object-fit: cover;
}

.sideCart-wrapper .prductsde_info p {
    color: var(--ws-text-primary, white) !important;
    font-weight: 600;
    font-size: 14px;
    margin: 0;
}

.sideCart-wrapper .cart-info {
    text-align: center;
    color: var(--ws-primary-light, #A855F7) !important;
    font-weight: 700;
    font-size: 16px;
    padding left: 2px;
}

.sideCart-wrapper .total {
    background: var(--ws-bg-card, #1A1F36);
    border: 1px solid var(--ws-border-light, rgba(160, 174, 192, 0.2));
    border-radius: 16px;
    padding: 20px;
    text-align: center;
    min-width: 100%;
    width: 100%;
}

.sideCart-wrapper .total strong {
    color: var(--ws-text-muted, #A0AEC0) !important;
    font-size: 14px;
}

.sideCart-wrapper .total .amount {
    display: inline-block !important;
    margin-top: 8px;
    font-size: 28px;
    font-weight: 900;
    color: var(--ws-primary-light, #A855F7) !important;
    white-space: nowrap !important;
    width: auto !important;
    max-width: 100% !important;
}

.sideCart-wrapper .buttons .cus-btn {
    background: var(--ws-primary, #8B5CF6) !important;
    color: white !important;
    border-radius: 12px;
    padding: 14px 24px;
    font-weight: 700;
    border: none;
    box-shadow: 0 0 20px rgba(124, 58, 237, 0.4);
}

.sideCart-wrapper .buttons .cus-btn:hover,
.sideCart-wrapper .buttons .cus-btn:focus,
.sideCart-wrapper .buttons .cus-btn:active {
    background: var(--ws-primary, #8B5CF6) !important;
    color: white !important;
    box-shadow: 0 0 20px rgba(124, 58, 237, 0.4) !important;
    transition: none !important;
}

.sideCart-wrapper .closeButton {
    background: var(--ws-primary, #8B5CF6) !important;
    border: none !important;
    color: white !important;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 0 20px rgba(124, 58, 237, 0.4);
}

/* Game Mega Menu - Grid layout */
.game-mega-menu {
    display: grid;
    grid-template-columns: repeat(2, minmax(180px, 1fr));
    gap: 4px 16px;
    min-width: 380px !important;
    max-width: 500px !important;
    padding: 12px;
}

.game-mega-menu li {
    list-style: none;
    min-width: 0;
}

.game-mega-menu li a {
    display: block;
    padding: 8px 4px;
    white-space: normal;
    word-wrap: break-word;
    overflow: hidden;
    text-overflow: ellipsis;
    color: var(--ws-text-muted, #A0AEC0) !important;
}

.game-mega-menu li a:hover {
    color: var(--ws-primary-light) !important;
}

.navbar .mainmenu > li.menu-item.has-children > .submenu {
    position: absolute;
    top: 100%;
    left: 0;
    margin-top: 10px;
    min-width: 180px;
    z-index: 1000;
}

/* Position account menu submenus to the left */
.navbar-nav.right-content li.menu-item.has-children > .submenu {
    left: -180px !important;
    right: auto !important;
    position: absolute !important;
    top: 100% !important;
    margin-top: 10px !important;
    min-width: 180px !important;
    z-index: 10001 !important;
}

.navbar-nav.right-content li.menu-item.has-children:hover > .submenu {
    display: block !important;
}

.navbar .mainmenu > li.menu-item.has-children > .submenu li a {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 14px !important;
    color: var(--ws-text-muted, #A0AEC0) !important;
}

.navbar .mainmenu > li.menu-item.has-children > .submenu li a:hover {
    background: var(--ws-primary, #8B5CF6) !important;
    color: white !important;
}

/* Dropdown caret color */
.navbar .mainmenu > li > a .fa-caret-down {
    color: inherit;
    font-size: 10px;
}

/* Remove Bootstrap dropdown blue */
.dropdown-menu,
.navbar .dropdown-menu {
    --bs-dropdown-link-hover-bg: var(--ws-primary, #8B5CF6) !important;
}

.dropdown-item:hover {
    background-color: var(--ws-primary, #8B5CF6) !important;
    color: white !important;
}

/* Mobile menu */
.mobile-navar ul li a {
    background: var(--ws-bg-card, #1A1F36);
    border-bottom: 1px solid var(--ws-border-light, rgba(160, 174, 192, 0.2));
    padding: 14px 20px;
    color: var(--ws-text-primary, white) !important;
}

.mobile-navar ul li a:hover {
    background: var(--ws-primary, #8B5CF6);
}

/* Logo Styling - Large Size */
.navbar-brand {
    display: inline-block !important;
    padding: 0 !important;
    margin: 0 !important;
    height: auto !important;
}

.navbar-brand img {
    height: 100px !important;
    width: auto !important;
    max-width: 300px !important;
    display: block !important;
    object-fit: contain !important;
    margin: 0 !important;
    padding: 0 !important;
}

header.small-screen .navbar-brand img {
    height: 90px !important;
    max-width: 280px !important;
}

/* Mobile menu active state - Gaming theme */
.mobile-navar ul li.active > a,
.mobile-navar ul li a.active,
.mobile-navar ul li.has-children.active > a {
    background: var(--ws-primary, #8B5CF6) !important;
    color: white !important;
    clip-path: none !important;
    -webkit-clip-path: none !important;
    position: relative;
}

.mobile-navar ul li.active > a::before,
.mobile-navar ul li a.active::before {
    display: none !important;
}

/* Global Preloader - Gaming Theme */
#preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: var(--ws-bg-dark, #0D0D1A);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 99999;
    transition: opacity 0.5s ease, visibility 0.5s ease;
}

#preloader.loaded {
    opacity: 0;
    visibility: hidden;
}

.preloader-content {
    text-align: center;
}


.preloader-logo {
    color: var(--ws-primary, #8B5CF6);
    margin-bottom: 20px;
    animation: pulse-glow 2s ease-in-out infinite;
}


.preloader-spinner {
    margin-bottom: 15px;
}


.spinner-ring {
    width: 50px;
    height: 50px;
    border: 3px solid rgba(139, 92, 246, 0.2);
    border-top-color: var(--ws-primary, #8B5CF6);
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin: 0 auto;
}


.preloader-text {
    color: var(--ws-text-muted, #A0AEC0);
    font-family: 'Chakra Petch', sans-serif;
    font-size: 14px;
    letter-spacing: 2px;
    text-transform: uppercase;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

@keyframes pulse-glow {
    0%, 100% { 
        filter: drop-shadow(0 0 10px rgba(139, 92, 246, 0.5));
    }
    50% { 
        filter: drop-shadow(0 0 25px rgba(139, 92, 246, 0.9));
    }
}

/* Hide preloader when page loads */
body.loaded #preloader {
    opacity: 0;
    visibility: hidden;
}

/* Mobile Icons Row - Cart & User inside hamburger */
.mobile-icons-row {
    display: flex !important;
    gap: 10px;
    padding: 15px !important;
    border-bottom: 1px solid var(--ws-border-light) !important;
    margin-bottom: 10px;
}


.mobile-icon-btn {
    display: flex !important;
    align-items: center;
    gap: 8px;
    background: var(--ws-bg-card) !important;
    padding: 10px 15px !important;
    border-radius: 8px !important;
    color: var(--ws-text-primary) !important;
    font-size: 14px !important;
    border: 1px solid var(--ws-border-light) !important;
}

.mobile-icon-btn:hover {
    background: var(--ws-primary) !important;
    color: white !important;
}

.mobile-icon-btn .badge {
    background: var(--ws-accent);
    color: white;
    font-size: 11px;
    padding: 2px 6px;
    border-radius: 10px;
}

/* Small Screen Header Gaming Theme */
header.small-screen {
    background: var(--ws-bg-dark) !important;
    border-bottom: 1px solid var(--ws-border-light) !important;
}

header.small-screen .hamburger-menu .bar {
    background: var(--ws-text-primary) !important;
}

header.small-screen .hamburger-menu .bar:before,
header.small-screen .hamburger-menu .bar:after {
    background: var(--ws-text-primary) !important;
}

header.small-screen .mobile-navar {
    background: var(--ws-bg-dark) !important;
}

header.small-screen .mobile-navar ul li a {
    color: var(--ws-text-primary) !important;
    border-bottom: 1px solid var(--ws-border-light) !important;
}

header.small-screen .mobile-navar ul li a:hover,
header.small-screen .mobile-navar ul li a.active,
header.small-screen .mobile-navar ul li.has-children.active > a {
    background: var(--ws-primary) !important;
    color: white !important;
    clip-path: none !important;
}

/* Polygamez fresh light header */
header.large-screens,
header.large-screens nav,
header.small-screen {
    background: rgba(255,255,255,0.94) !important;
    border-bottom: 1px solid rgba(8, 10, 12, 0.08) !important;
    box-shadow: 0 18px 45px rgba(8, 10, 12, 0.08) !important;
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
}

header.large-screens .navbar {
    min-height: 84px;
}

header.large-screens .navbar-collapse {
    gap: 22px;
}

header.large-screens .navbar-brand img,
header.small-screen .navbar-brand img {
    height: 74px !important;
    max-width: 300px !important;
    border-radius: 14px;
    filter: none !important;
}

header.large-screens .navbar-brand,
header.small-screen .navbar-brand {
    background: #ffffff !important;
    border: 1px solid rgba(8,10,12,0.10) !important;
    border-radius: 18px !important;
    padding: 7px 12px !important;
    box-shadow: 0 14px 34px rgba(8,10,12,0.12) !important;
}

.navbar .mainmenu {
    background: #0b0d10 !important;
    border: 1px solid rgba(8, 10, 12, 0.08);
    border-radius: 999px;
    gap: 2px !important;
    padding: 6px !important;
    box-shadow: 0 14px 34px rgba(0,0,0,0.14);
}

.navbar .mainmenu > li > a.main-menu-item,
.large-screens .navbar-nav.mainmenu > li > a,
.large-screens .navbar-nav.right-content > li > a {
    color: rgba(255,255,255,0.82) !important;
    padding: 11px 15px !important;
    border-radius: 999px !important;
    text-shadow: none !important;
    font-size: 12px !important;
    letter-spacing: 0 !important;
}

.navbar .mainmenu > li > a.main-menu-item:hover,
.navbar .mainmenu > li.active > a.main-menu-item,
.large-screens .navbar-nav.mainmenu > li > a.active {
    background: #dfff00 !important;
    color: #0b0d10 !important;
    text-shadow: none !important;
}

.large-screens .navbar-nav.mainmenu > li > a.main-menu-item,
.large-screens .navbar-nav.mainmenu > li > a.main-menu-item.active,
.large-screens .navbar-nav.mainmenu > li > a.main-menu-item:hover {
    box-shadow: none !important;
    filter: none !important;
    text-shadow: none !important;
}

.navbar .mainmenu > li.active > a.main-menu-item::after,
.large-screens .navbar-nav.mainmenu > li.active > a::after {
    display: none !important;
}

.navbar .submenu,
.navbar .dropdown-menu,
.navbar .mainmenu > li.menu-item.has-children > .submenu {
    background: #101114 !important;
    border: 1px solid rgba(223,255,0,0.18) !important;
    border-radius: 16px !important;
    box-shadow: 0 24px 60px rgba(0,0,0,0.22) !important;
}

.navbar .submenu li a,
.navbar .dropdown-menu li a,
.navbar .mainmenu > li.menu-item.has-children > .submenu li a {
    color: rgba(255,255,255,0.76) !important;
    border-radius: 10px !important;
}

.navbar .submenu li a:hover,
.navbar .mainmenu > li.menu-item.has-children > .submenu li a:hover {
    background: #dfff00 !important;
    color: #0b0d10 !important;
}

.header-icon-btn,
.large-screens .header-icon-btn,
.large-screens .cart-icon-btn {
    background: #0b0d10 !important;
    border: 1px solid #0b0d10 !important;
    color: #ffffff !important;
    width: 42px !important;
    height: 42px !important;
}

.header-icon-btn svg,
.large-screens .header-icon-btn svg {
    width: 20px !important;
    height: 20px !important;
    stroke: currentColor !important;
}

.header-icon-btn:hover,
.large-screens .header-icon-btn:hover,
.large-screens .cart-icon-btn:hover {
    background: #dfff00 !important;
    border-color: #dfff00 !important;
    color: #0b0d10 !important;
    box-shadow: 0 10px 24px rgba(195,226,0,0.34) !important;
}

.large-screens .cart-icon-btn:hover svg {
    stroke: #0b0d10 !important;
}

.large-screens .navbar-nav.right-content > li > a.main-menu-item,
.large-screens .navbar-nav.right-content > li.menu-item > a.main-menu-item,
.large-screens .navbar-nav.right-content .navbar-nav.right-content > li > a.main-menu-item {
    background: #f4f5ef !important;
    border: 1px solid rgba(8,10,12,0.12) !important;
    border-radius: 999px !important;
    color: #0b0d10 !important;
    padding: 11px 14px !important;
    box-shadow: none !important;
    text-shadow: none !important;
}

.large-screens .navbar-nav.right-content > li > a.main-menu-item:hover,
.large-screens .navbar-nav.right-content .navbar-nav.right-content > li > a.main-menu-item:hover {
    background: #dfff00 !important;
    border-color: #dfff00 !important;
    color: #0b0d10 !important;
}

.large-screens .navbar-nav.right-content > li > a.main-menu-item,
.large-screens .navbar-nav.right-content > li > a.main-menu-item.active,
.large-screens .navbar-nav.right-content > li > a.main-menu-item:focus,
.large-screens .navbar-nav.right-content > li > a.main-menu-item:active,
.large-screens .navbar-nav.right-content .navbar-nav.right-content > li > a.main-menu-item,
.large-screens .navbar-nav.right-content .navbar-nav.right-content > li > a.main-menu-item.active,
.large-screens .navbar-nav.right-content .navbar-nav.right-content > li > a.main-menu-item:focus,
.large-screens .navbar-nav.right-content .navbar-nav.right-content > li > a.main-menu-item:active {
    background-image: none !important;
    text-shadow: none !important;
    box-shadow: none !important;
    filter: none !important;
}

.large-screens .header-icon-btn svg,
.large-screens .cart-icon-btn svg,
.header-icon-btn svg,
.cart-icon-btn svg {
    color: inherit !important;
    stroke: currentColor !important;
    opacity: 1 !important;
}

.large-screens .cart-icon-btn .badge-uinfo,
.cart-icon-btn .badge-uinfo {
    background: #dfff00 !important;
    color: #0b0d10 !important;
    box-shadow: 0 0 0 2px #ffffff !important;
}

.custom-jpont a {
    background: #dfff00 !important;
    color: #0b0d10 !important;
    border-radius: 999px;
    padding: 12px 16px !important;
    font-weight: 800;
}

#preloader {
    background: #f6f7f2 !important;
}

.preloader-content {
    background: #0b0d10;
    border-radius: 24px;
    padding: 34px 42px;
    box-shadow: 0 28px 70px rgba(0,0,0,0.18);
}

.preloader-logo {
    color: #dfff00 !important;
}

.preloader-logo img {
    width: 76px;
    height: 76px;
    object-fit: contain;
    border-radius: 18px;
    background: #ffffff;
    padding: 8px;
    box-shadow: 0 18px 38px rgba(0,0,0,0.22);
}

.spinner-ring {
    border-color: rgba(223,255,0,0.22) !important;
    border-top-color: #dfff00 !important;
}

.preloader-text {
    color: #ffffff !important;
}

header.small-screen .hamburger-menu .bar,
header.small-screen .hamburger-menu .bar:before,
header.small-screen .hamburger-menu .bar:after {
    background: #0b0d10 !important;
}

header.small-screen .mobile-navar {
    background: #ffffff !important;
}

header.small-screen .mobile-navar ul li a,
.mobile-icon-btn {
    background: #f4f5ef !important;
    color: #0b0d10 !important;
    border-color: rgba(8,10,12,0.08) !important;
}

header.small-screen .mobile-navar ul li a:hover,
header.small-screen .mobile-navar ul li a.active,
header.small-screen .mobile-navar ul li.has-children.active > a,
.mobile-icon-btn:hover {
    background: #0b0d10 !important;
    color: #dfff00 !important;
}

@media (max-width: 1199px) {
    header.large-screens {
        display: none !important;
    }
    header.small-screen {
        display: block !important;
    }
}

@media (min-width: 1200px) {
    header.small-screen {
        display: none !important;
    }
    header.large-screens {
        display: block !important;
    }
}
</style>
<body>
  <!-- Preloader-->
  <div id="preloader">
    <div class="preloader-content">
      <div class="preloader-logo">
        <img src="{{ asset('assets/media/favicon-polygamez.png') }}" alt="Polygamez">
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
        src="{{url('assets/media/logo-polygamez-tight.png')}}"
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
             <!-- <li class="menu-item has-children"><a href="{{ route('cat-list', 'action-rpgs') }}">{{__('common.action_rpgs')}}</a></li>  
             <li class="menu-item has-children"><a href="{{ route('cat-list', 'esports') }}">{{__('common.esports')}}</a></li> 
              <li class="menu-item has-children"><a href="{{ route('cat-list', 'sandbox') }}">{{__('common.sandbox')}}</a></li>  -->
                <!--<li class="menu-item has-children"><a href="{{ route('cat-list', 'strategy') }}">{{__('common.strategy')}}</a></li> -->
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
               <ul class="navbar-nav right-content unstyled"> 
               <li class="menu-item has-children">
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
                        <!-- <li><a href="{{route('user')}}">{{ __('common.orders') ?? 'Orders' }}</a></li> -->
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
        src="{{url('assets/media/logo-polygamez-tight.png')}}"
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
              <a href="#" class="mobile-icon-btn" onclick="document.querySelector('.sideCart-wrapper').classList.add('open'); return false;">
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
              <!--<li class=" has-children"> <a href="faq.php">{{__('common.faqs')}}</a> </li> -->
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

                            <!-- <span class="quantity">
                                {{ Helper::getCurrencySymbol(session('currency')) }}
                                {{number_format($cart['amount'], session('currency')=='JPY' ? 0 : 2)}}
                            </span> -->

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

                            <div class="cart-info" style="padding-left: 10px;">
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


                {{-- TOTAL --}}
                <div class="total mb-4">

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
                <div class="buttons d-flex justify-content-center">

                    @if($hasGameProduct)
                        <a href="{{ route('gamecart') }}" class="cus-btn primary me-3" style="background: #8B5CF6 !important; color: white !important; transition: none !important; cursor: pointer !important;">
                            {{ __('common.purchase_services') }}
                        </a>
                    @else
                        <a href="{{ route('cart') }}" class="cus-btn primary me-3" style="background: #8B5CF6 !important; color: white !important; transition: none !important; cursor: pointer !important;">
                            {{__('common.view_cart')}}
                        </a>

                        <a href="{{ route('checkout') }}" class="cus-btn primary" style="background: #8B5CF6 !important; color: white !important; transition: none !important; cursor: pointer !important;">
                            {{__('common.checkout')}}
                        </a>
                    @endif

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
