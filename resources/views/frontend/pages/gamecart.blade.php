@extends('frontend.layouts.main')
@section('title', 'Cart')

@push('styles')
<style>
/* Premium Gaming HUD Game Cart - Vertical Card Layout */
.gamecart-section {
    padding: 64px 0 96px !important;
    background-color: #f6f7f2 !important;
    background-image:
        radial-gradient(circle at 50% 50%, rgba(223, 255, 0, 0.04) 0%, transparent 80%),
        repeating-linear-gradient(90deg, rgba(8, 10, 12, 0.015) 0 1px, transparent 1px 40px),
        repeating-linear-gradient(0deg, rgba(8, 10, 12, 0.015) 0 1px, transparent 1px 40px) !important;
    position: relative !important;
    min-height: 70vh !important;
}

/* Top bar: credits */
.gamecart-topbar {
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    flex-wrap: wrap !important;
    gap: 16px !important;
    margin-bottom: 32px !important;
}

.gamecart-continue-btn {
    display: inline-flex !important;
    align-items: center !important;
    gap: 8px !important;
    background: #0b0d10 !important;
    border: 1px solid #0b0d10 !important;
    border-radius: 12px !important;
    color: #dfff00 !important;
    padding: 12px 24px !important;
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 13px !important;
    font-weight: 800 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
    text-decoration: none !important;
    box-shadow: 0 4px 15px rgba(8, 10, 12, 0.12) !important;
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
}

.gamecart-continue-btn:hover {
    background: #dfff00 !important;
    color: #0b0d10 !important;
    border-color: #dfff00 !important;
    box-shadow: 0 8px 20px rgba(223, 255, 0, 0.25) !important;
    transform: translateY(-1px) !important;
}

.gamecart-continue-btn svg {
    width: 16px !important;
    height: 16px !important;
    stroke: currentColor !important;
}

.gamecart-credits {
    display: inline-flex !important;
    align-items: center !important;
    gap: 10px !important;
    background: #ffffff !important;
    border: 1px solid rgba(8, 10, 12, 0.08) !important;
    border-radius: 12px !important;
    padding: 12px 20px !important;
    box-shadow: 0 4px 15px rgba(8, 10, 12, 0.04) !important;
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 13px !important;
    font-weight: 700 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
    color: rgba(11, 13, 16, 0.55) !important;
}

.gamecart-credits svg {
    width: 18px !important;
    height: 18px !important;
    color: #6d7f00 !important;
}

.gamecart-credits b {
    font-size: 16px !important;
    font-weight: 900 !important;
    color: #6d7f00 !important;
}

/* Layout grid */
.gamecart-grid {
    display: grid !important;
    grid-template-columns: 1fr 360px !important;
    gap: 36px !important;
    align-items: start !important;
}

@media (max-width: 991px) {
    .gamecart-grid {
        grid-template-columns: 1fr !important;
        gap: 32px !important;
    }
}

/* Cards grid */
.gamecart-items {
    display: grid !important;
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)) !important;
    gap: 22px !important;
}

/* Vertical product card */
.game-card {
    display: flex !important;
    flex-direction: column !important;
    background: #ffffff !important;
    border-radius: 18px !important;
    border: 1px solid rgba(8, 10, 12, 0.08) !important;
    box-shadow: 0 10px 30px rgba(8, 10, 12, 0.02) !important;
    overflow: hidden !important;
    transition: all 0.35s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
}

.game-card:hover {
    transform: translateY(-4px) !important;
    border-color: #6d7f00 !important;
    box-shadow:
        0 18px 40px rgba(8, 10, 12, 0.06),
        0 0 24px rgba(109, 127, 0, 0.08) !important;
}

.game-card-media {
    position: relative !important;
    width: 100% !important;
    aspect-ratio: 16 / 10 !important;
    overflow: hidden !important;
    background: #f6f7f2 !important;
}

.game-card-media img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    transition: transform 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
}

.game-card:hover .game-card-media img {
    transform: scale(1.05) !important;
}

.game-card-points-badge {
    position: absolute !important;
    top: 12px !important;
    right: 12px !important;
    display: inline-flex !important;
    align-items: center !important;
    gap: 6px !important;
    background: rgba(11, 13, 16, 0.85) !important;
    backdrop-filter: blur(4px) !important;
    border: 1px solid rgba(223, 255, 0, 0.4) !important;
    border-radius: 8px !important;
    padding: 6px 12px !important;
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 13px !important;
    font-weight: 900 !important;
    color: #dfff00 !important;
}

.game-card-points-badge svg {
    width: 14px !important;
    height: 14px !important;
    color: #dfff00 !important;
}

.game-card-body {
    display: flex !important;
    flex-direction: column !important;
    gap: 14px !important;
    padding: 20px !important;
    flex: 1 !important;
}

.game-card-title {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 17px !important;
    font-weight: 800 !important;
    color: #0b0d10 !important;
    margin: 0 !important;
    line-height: 1.3 !important;
    text-decoration: none !important;
    transition: color 0.3s ease !important;
}

.game-card-title:hover {
    color: #6d7f00 !important;
}

.game-card-points-label {
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    padding-bottom: 14px !important;
    border-bottom: 1px solid rgba(8, 10, 12, 0.06) !important;
}

.game-card-points-label .label {
    font-size: 12.5px !important;
    font-weight: 600 !important;
    color: rgba(11, 13, 16, 0.5) !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
}

.game-card-points-label .value {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 18px !important;
    font-weight: 900 !important;
    color: #6d7f00 !important;
}

/* Optional training block */
.game-training {
    position: relative !important;
    background: rgba(109, 127, 0, 0.06) !important;
    border: 1px dashed rgba(109, 127, 0, 0.35) !important;
    border-radius: 12px !important;
    padding: 14px 16px !important;
}

.game-training-title {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 13.5px !important;
    font-weight: 800 !important;
    color: #4d5a00 !important;
    margin: 0 0 8px 0 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.3px !important;
    padding-right: 22px !important;
}

.game-training-calc {
    font-size: 13px !important;
    font-weight: 700 !important;
    color: #0b0d10 !important;
    margin: 0 0 4px 0 !important;
}

.game-training-total {
    font-size: 12px !important;
    font-weight: 600 !important;
    color: rgba(11, 13, 16, 0.55) !important;
}

.game-training-total b {
    color: #6d7f00 !important;
    font-weight: 800 !important;
}

.game-training-remove {
    position: absolute !important;
    top: -9px !important;
    right: -9px !important;
    width: 24px !important;
    height: 24px !important;
    border-radius: 50% !important;
    background: #6d7f00 !important;
    color: #ffffff !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    text-decoration: none !important;
    font-size: 11px !important;
    box-shadow: 0 2px 8px rgba(109, 127, 0, 0.3) !important;
    transition: all 0.25s ease !important;
}

.game-training-remove svg {
    width: 12px !important;
    height: 12px !important;
    stroke: currentColor !important;
}

.game-training-remove:hover {
    background: #ef4444 !important;
    color: #ffffff !important;
    transform: scale(1.1) !important;
}

/* Card footer / remove */
.game-card-footer {
    margin-top: auto !important;
    padding-top: 4px !important;
}

.game-card-remove {
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 8px !important;
    width: 100% !important;
    background: rgba(239, 68, 68, 0.06) !important;
    border: 1px solid rgba(239, 68, 68, 0.18) !important;
    color: #ef4444 !important;
    padding: 10px 14px !important;
    border-radius: 10px !important;
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 11.5px !important;
    font-weight: 800 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
    text-decoration: none !important;
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
    cursor: pointer !important;
}

.game-card-remove:hover {
    background: #ef4444 !important;
    color: #ffffff !important;
    border-color: #ef4444 !important;
    box-shadow: 0 4px 12px rgba(239, 68, 68, 0.15) !important;
}

.game-card-remove svg {
    width: 14px !important;
    height: 14px !important;
    stroke: currentColor !important;
}

/* Summary sidebar */
.gamecart-summary {
    position: sticky !important;
    top: 104px !important;
    background: #ffffff !important;
    border-radius: 24px !important;
    border: 1px solid rgba(8, 10, 12, 0.08) !important;
    box-shadow: 0 15px 45px rgba(8, 10, 12, 0.02) !important;
    overflow: hidden !important;
}

.gamecart-summary-header {
    background: #0b0d10 !important;
    padding: 24px !important;
    text-align: center !important;
    border-bottom: 2px solid #6d7f00 !important;
}

.gamecart-summary-title {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 18px !important;
    font-weight: 800 !important;
    color: #dfff00 !important;
    margin: 0 !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 10px !important;
    text-transform: uppercase !important;
    letter-spacing: 1px !important;
}

.gamecart-summary-title svg {
    width: 20px !important;
    height: 20px !important;
    stroke: #dfff00 !important;
}

.gamecart-summary-body {
    padding: 28px !important;
}

.gamecart-summary-row {
    display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
}

.gamecart-summary-row.items {
    padding-bottom: 18px !important;
    margin-bottom: 18px !important;
    border-bottom: 1px solid rgba(8, 10, 12, 0.06) !important;
}

.gamecart-summary-row .label {
    font-size: 13.5px !important;
    font-weight: 600 !important;
    color: rgba(11, 13, 16, 0.5) !important;
}

.gamecart-summary-row .value {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 14.5px !important;
    font-weight: 800 !important;
    color: #0b0d10 !important;
}

.gamecart-summary-row.total {
    padding-top: 18px !important;
    margin-top: 18px !important;
    border-top: 2px solid rgba(8, 10, 12, 0.06) !important;
}

.gamecart-summary-row.total .label {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 15px !important;
    font-weight: 800 !important;
    color: #0b0d10 !important;
    text-transform: uppercase !important;
}

.gamecart-summary-row.total .value {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 26px !important;
    font-weight: 900 !important;
    color: #6d7f00 !important;
    line-height: 1 !important;
}

.gamecart-summary-row.total .value small {
    font-size: 12px !important;
    font-weight: 700 !important;
    color: rgba(11, 13, 16, 0.4) !important;
    margin-left: 4px !important;
}

.gamecart-purchase-btn {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 10px !important;
    width: 100% !important;
    margin-top: 28px !important;
    background: #0b0d10 !important;
    border: 1px solid #0b0d10 !important;
    color: #dfff00 !important;
    padding: 16px 24px !important;
    border-radius: 12px !important;
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 14px !important;
    font-weight: 800 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
    text-decoration: none !important;
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
    cursor: pointer !important;
    box-shadow: 0 6px 20px rgba(8, 10, 12, 0.15) !important;
}

.gamecart-purchase-btn:hover {
    background: #dfff00 !important;
    color: #0b0d10 !important;
    border-color: #dfff00 !important;
    box-shadow: 0 10px 25px rgba(223, 255, 0, 0.25) !important;
    transform: translateY(-2px) !important;
}

.gamecart-purchase-btn svg {
    width: 18px !important;
    height: 18px !important;
    stroke: currentColor !important;
}

/* Empty state */
.gamecart-empty {
    text-align: center !important;
    padding: 64px 32px !important;
    background: #ffffff !important;
    border-radius: 24px !important;
    border: 1px solid rgba(8, 10, 12, 0.08) !important;
    box-shadow: 0 15px 45px rgba(8, 10, 12, 0.02) !important;
}

.gamecart-empty-icon {
    width: 90px !important;
    height: 90px !important;
    background: rgba(223, 255, 0, 0.15) !important;
    border-radius: 50% !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    margin: 0 auto 24px !important;
}

.gamecart-empty-icon svg {
    width: 44px !important;
    height: 44px !important;
    color: #6d7f00 !important;
}

.gamecart-empty h3 {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 24px !important;
    font-weight: 800 !important;
    color: #0b0d10 !important;
    text-transform: uppercase !important;
    margin-bottom: 12px !important;
}

.gamecart-empty p {
    color: rgba(11, 13, 16, 0.5) !important;
    font-size: 14.5px !important;
    margin-bottom: 28px !important;
}

.gamecart-empty-btn {
    display: inline-flex !important;
    align-items: center !important;
    gap: 10px !important;
    background: #0b0d10 !important;
    border: 1px solid rgba(8, 10, 12, 0.1) !important;
    color: #dfff00 !important;
    padding: 14px 28px !important;
    border-radius: 12px !important;
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 13.5px !important;
    font-weight: 800 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
    text-decoration: none !important;
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
}

.gamecart-empty-btn:hover {
    background: #dfff00 !important;
    color: #0b0d10 !important;
    border-color: #dfff00 !important;
    transform: translateY(-2px) !important;
}

@media (max-width: 768px) {
    .gamecart-section {
        padding: 40px 0 64px !important;
    }
    .gamecart-summary {
        position: static !important;
    }
    .gamecart-items {
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)) !important;
    }
}
</style>
@endpush

@section('main-content')
<main>
    <!-- Page Header Band -->
    <div class="about-title-band">
        <div class="about-hud-grid"></div>
        <div class="about-hud-glow"></div>
        <div class="about-hud-decor border-t"></div>
        <div class="about-hud-decor border-b"></div>

        <div class="container position-relative z-1">
            <h1 class="about-hud-title mb-3 animate-fade-in-up">
                {{ __('common.cart') }}
            </h1>

            <div class="about-hud-breadcrumb-capsule animate-fade-in-up delay-1">
                <a href="{{ route('home') }}" class="hud-breadcrumb-link">
                    <i class="fas fa-home me-2"></i>{{ __('common.home') }}
                </a>
                <span class="hud-breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
                <span class="hud-breadcrumb-current">{{ __('common.cart') }}</span>
            </div>
        </div>
    </div>

    <!-- Game Cart Section -->
    <section class="gamecart-section">
        <div class="container">
            @php
                $points = DB::table('users')->where('id', auth()->user()->id)->pluck('points')->first();
            @endphp

            <!-- Top bar -->
            <div class="gamecart-topbar">
                <a href="{{ route('home') }}" class="gamecart-continue-btn">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M19 12H5M12 19l-7-7 7-7"/>
                    </svg>
                    {{ __('common.continue_shopping') }}
                </a>

                @auth
                <span class="gamecart-credits">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                    </svg>
                    {{ __('common.available_credits') }}: <b class="dash-epnt">{{ $points }}</b>
                </span>
                @endauth
            </div>

            @if(Helper::cartCount())
                <div class="gamecart-grid">
                    <!-- Cards -->
                    <div class="gamecart-items">
                        @foreach(Helper::getAllProductFromCart()->where('order_id', null) as $key => $cart)
                            @php
                                $photo = explode(',', $cart->product['photo']);
                                $product_detail = App\Models\Product::getProductBySlug($cart->product->slug);
                                $m = Helper::getProductPriceByCurrency(session('currency'), $cart->product);

                                if(session('currency') == 'HKD') {
                                    $a = $cart['price'] - $product_detail->price_hk;
                                    $hours = $a / 257; $basic = $product_detail->price_hk;
                                    $perhour = 257;
                                }
                                elseif(session('currency') == 'JPY') {
                                    $a = $cart['price'] - $product_detail->price_jp;
                                    $hours = $a / 5000; $basic = $product_detail->price_jp;
                                    $perhour = 5000;
                                }
                                elseif(session('currency') == 'USD') {
                                    $a = $cart['price'] - $product_detail->price;
                                    $hours = $a / 20; $basic = $product_detail->price;
                                    $perhour = 20;
                                }

                                $a = $cart['price'] - $product_detail->price;
                                $hours = $a / 20; $basic = $product_detail->price;
                                $perhour = 20;
                            @endphp

                            <div class="game-card">
                                <div class="game-card-media">
                                    <a href="{{ route('product-detail', $cart->product->slug) }}">
                                        <img src="{{ asset($photo[0]) }}" alt="{{ $cart->product['title'] }}" onerror="this.style.display='none'">
                                    </a>
                                    <span class="game-card-points-badge">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                                        </svg>
                                        {{ number_format($cart['price'], 0) }}
                                    </span>
                                </div>

                                <div class="game-card-body">
                                    <a href="{{ route('product-detail', $cart->product->slug) }}" class="game-card-title">
                                        {{ $cart->product['title'] }}
                                    </a>

                                    <div class="game-card-points-label">
                                        <span class="label">{{ __('common.points') }}</span>
                                        <span class="value">{{ number_format($cart['price'], 0) }}</span>
                                    </div>

                                    @if($a > 0)
                                    <div class="game-training">
                                        <a href="{{ route('trainingdelete', $cart->id) }}" class="game-training-remove" title="{{ __('common.remove') }}">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round">
                                                <line x1="18" y1="6" x2="6" y2="18"/>
                                                <line x1="6" y1="6" x2="18" y2="18"/>
                                            </svg>
                                        </a>
                                        <h5 class="game-training-title">{{ $hours }} {{ __('common.hours') }}</h5>
                                        <p class="game-training-calc">{{ number_format($basic, 0) }} + ( {{ $hours }} × {{ number_format($perhour, 0) }} )</p>
                                        <span class="game-training-total">{{ __('common.total') }} = <b>{{ number_format($cart['price'], 0) }} {{ __('common.points') }}</b></span>
                                    </div>
                                    @endif

                                    <div class="game-card-footer">
                                        <a href="{{ route('cart-delete', $cart->id) }}" class="game-card-remove">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <polyline points="3 6 5 6 21 6"/>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                                <line x1="10" y1="11" x2="10" y2="17"/>
                                                <line x1="14" y1="11" x2="14" y2="17"/>
                                            </svg>
                                            {{ __('common.remove') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Summary -->
                    <div class="gamecart-summary">
                        <div class="gamecart-summary-header">
                            <h3 class="gamecart-summary-title">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="9" cy="21" r="1"/>
                                    <circle cx="20" cy="21" r="1"/>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                                </svg>
                                {{ __('common.cart_summary') }}
                            </h3>
                        </div>
                        <div class="gamecart-summary-body">
                            @php
                                $total_amount = Helper::totalCartPrice();
                            @endphp
                            <div class="gamecart-summary-row items">
                                <span class="label">{{ __('common.items') }}</span>
                                <span class="value">{{ Helper::cartCount() }}</span>
                            </div>
                            @auth
                            <div class="gamecart-summary-row">
                                <span class="label">{{ __('common.available_credits') }}</span>
                                <span class="value">{{ number_format($points, 0) }}</span>
                            </div>
                            @endauth
                            <div class="gamecart-summary-row total">
                                <span class="label">{{ __('common.total') }} {{ __('common.points') }}</span>
                                <span class="value">{{ number_format($total_amount, 0) }}<small>{{ __('common.points') }}</small></span>
                            </div>

                            <a href="{{ route('buygame') }}" class="gamecart-purchase-btn">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                </svg>
                                {{ __('common.purchase_services') }}
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <!-- Empty State -->
                <div class="gamecart-empty">
                    <div class="gamecart-empty-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="9" cy="21" r="1"/>
                            <circle cx="20" cy="21" r="1"/>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                        </svg>
                    </div>
                    <h3>{{ __('common.no_cart_available') }}</h3>
                    <a href="{{ route('home') }}" class="gamecart-empty-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                        {{ __('common.continue_shopping') }}
                    </a>
                </div>
            @endif
        </div>
    </section>
</main>
@endsection
