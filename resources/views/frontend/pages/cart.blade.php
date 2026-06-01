@extends('frontend.layouts.main')
@section('title', 'Cart')

@push('styles')
<style>
/* Premium Gaming HUD Cart Styles with Theme-Consistent Styling */
.cart-section {
    padding: 64px 0 96px !important;
    background-color: #f6f7f2 !important; /* Cyberpunk light gray background */
    background-image: 
        radial-gradient(circle at 50% 50%, rgba(223, 255, 0, 0.04) 0%, transparent 80%),
        repeating-linear-gradient(90deg, rgba(8, 10, 12, 0.015) 0 1px, transparent 1px 40px),
        repeating-linear-gradient(0deg, rgba(8, 10, 12, 0.015) 0 1px, transparent 1px 40px) !important;
    position: relative !important;
    min-height: 70vh;
}

.cart-continue {
    margin-bottom: 32px !important;
}

.cart-continue-btn {
    display: inline-flex !important;
    align-items: center !important;
    gap: 8px !important;
    background: #0b0d10 !important; /* Premium Obsidian dark mode button */
    border: 1px solid #0b0d10 !important;
    border-radius: 12px !important;
    color: #dfff00 !important; /* Acid Lime text */
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

.cart-continue-btn:hover {
    background: #dfff00 !important;
    color: #0b0d10 !important;
    border-color: #dfff00 !important;
    box-shadow: 0 8px 20px rgba(223, 255, 0, 0.25) !important;
    transform: translateY(-1px) !important;
}

.cart-continue-btn svg {
    width: 16px !important;
    height: 16px !important;
    stroke: currentColor !important;
}

/* Cart Grid */
.cart-grid {
    display: grid !important;
    grid-template-columns: 1fr 380px !important;
    gap: 36px !important;
    align-items: start !important;
}

@media (max-width: 991px) {
    .cart-grid {
        grid-template-columns: 1fr !important;
        gap: 32px !important;
    }
}

/* Cart Table */
.cart-table {
    background: #ffffff !important;
    border-radius: 16px !important;
    border: 1px solid rgba(8, 10, 12, 0.08) !important;
    box-shadow: 0 10px 30px rgba(8, 10, 12, 0.02) !important;
    overflow: hidden !important;
}

.cart-table-head,
.cart-table-row {
    display: grid !important;
    grid-template-columns: 1fr 180px 140px 120px !important;
    gap: 18px !important;
    align-items: center !important;
    padding: 18px 26px !important;
}

.cart-table-head {
    background: #0b0d10 !important;
    border-bottom: 2px solid #6d7f00 !important;
    padding: 16px 26px !important;
}

.cart-th {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 11px !important;
    font-weight: 800 !important;
    letter-spacing: 1px !important;
    text-transform: uppercase !important;
    color: #dfff00 !important;
}

.cart-th-center {
    text-align: center !important;
}

.cart-table-row {
    border-bottom: 1px solid rgba(8, 10, 12, 0.06) !important;
    transition: background 0.3s ease !important;
}

.cart-table-row:last-child {
    border-bottom: none !important;
}

.cart-table-row:hover {
    background: rgba(109, 127, 0, 0.03) !important;
}

.cart-col-product {
    display: flex !important;
    align-items: center !important;
    gap: 16px !important;
}

.cart-col {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
}

@media (max-width: 768px) {
    .cart-table-head {
        display: none !important;
    }

    .cart-table-row {
        grid-template-columns: 1fr auto !important;
        gap: 10px 14px !important;
        padding: 16px !important;
        align-items: start !important;
    }

    .cart-col-product {
        grid-column: 1 / -1 !important;
    }

    .cart-col-price {
        justify-content: flex-start !important;
    }
}

.cart-product-image {
    width: 84px !important;
    height: 60px !important;
    border-radius: 10px !important;
    overflow: hidden !important;
    background: #f6f7f2 !important;
    border: 1px solid rgba(8, 10, 12, 0.06) !important;
}

.cart-product-image img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
}

.cart-product-points-only {
    display: flex !important;
    flex-direction: column !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 6px !important;
    background: rgba(109, 127, 0, 0.06) !important;
    border: 2px dashed rgba(109, 127, 0, 0.25) !important;
}

.cart-product-points-only svg {
    width: 18px !important;
    height: 18px !important;
    color: #6d7f00 !important;
}

.cart-product-points-only .points-badge {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 9.5px !important;
    font-weight: 800 !important;
    color: #6d7f00 !important;
    text-transform: uppercase !important;
}

.cart-product-title {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 15px !important;
    font-weight: 800 !important;
    color: #0b0d10 !important;
    margin: 0 !important;
    line-height: 1.25 !important;
    text-align: left !important;
}

.cart-product-price {
    font-size: 13px !important;
    color: rgba(11, 13, 16, 0.5) !important;
    font-weight: 600 !important;
    text-align: center !important;
    white-space: nowrap !important;
}

.cart-product-price span {
    color: #6d7f00 !important;
    font-weight: 700 !important;
}

.cart-product-total {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 18px !important;
    font-weight: 900 !important;
    color: #0b0d10 !important;
    line-height: 1 !important;
    white-space: nowrap !important;
}

/* Mobile labels for table cells */
.cart-cell-label {
    display: none !important;
}

@media (max-width: 768px) {
    .cart-cell-label {
        display: inline-block !important;
        font-family: 'Chakra Petch', sans-serif !important;
        font-size: 10px !important;
        font-weight: 800 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.5px !important;
        color: rgba(11, 13, 16, 0.4) !important;
        margin-right: 6px !important;
    }
}

.cart-remove-btn {
    display: inline-flex !important;
    align-items: center !important;
    gap: 6px !important;
    background: rgba(239, 68, 68, 0.06) !important;
    border: 1px solid rgba(239, 68, 68, 0.18) !important;
    color: #ef4444 !important;
    padding: 7px 12px !important;
    border-radius: 8px !important;
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 10.5px !important;
    font-weight: 800 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
    text-decoration: none !important;
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
    cursor: pointer !important;
}

.cart-remove-btn:hover {
    background: #ef4444 !important;
    color: #ffffff !important;
    border-color: #ef4444 !important;
    box-shadow: 0 4px 12px rgba(239, 68, 68, 0.15) !important;
}

.cart-remove-btn svg {
    width: 14px !important;
    height: 14px !important;
    stroke: currentColor !important;
}

/* Empty Cart State */
.cart-empty {
    text-align: center !important;
    padding: 64px 32px !important;
    background: #ffffff !important;
    border-radius: 24px !important;
    border: 1px solid rgba(8, 10, 12, 0.08) !important;
    box-shadow: 0 15px 45px rgba(8, 10, 12, 0.02) !important;
}

.cart-empty-icon {
    width: 90px !important;
    height: 90px !important;
    background: rgba(223, 255, 0, 0.15) !important;
    border-radius: 50% !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    margin: 0 auto 24px !important;
}

.cart-empty-icon svg {
    width: 44px !important;
    height: 44px !important;
    color: #6d7f00 !important;
}

.cart-empty h3 {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 24px !important;
    font-weight: 800 !important;
    color: #0b0d10 !important;
    text-transform: uppercase !important;
    margin-bottom: 12px !important;
}

.cart-empty p {
    color: rgba(11, 13, 16, 0.5) !important;
    font-size: 14.5px !important;
    margin-bottom: 28px !important;
}

.cart-empty-btn {
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
    box-shadow: 0 4px 15px rgba(8, 10, 12, 0.05) !important;
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
}

.cart-empty-btn:hover {
    background: #dfff00 !important;
    color: #0b0d10 !important;
    border-color: #dfff00 !important;
    box-shadow: 0 8px 25px rgba(223, 255, 0, 0.25) !important;
    transform: translateY(-2px) !important;
}

/* Cart Summary Sidebar */
.cart-summary {
    position: sticky !important;
    top: 104px !important;
    background: #ffffff !important;
    border-radius: 24px !important;
    border: 1px solid rgba(8, 10, 12, 0.08) !important;
    box-shadow: 0 15px 45px rgba(8, 10, 12, 0.02) !important;
    overflow: hidden !important;
}

.cart-summary .cart-summary-header {
    background: #0b0d10 !important;
    padding: 24px !important;
    text-align: center !important;
    border-bottom: 2px solid #6d7f00 !important;
}

.cart-summary .cart-summary-header .cart-summary-title {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 18px !important;
    font-weight: 800 !important;
    color: #dfff00 !important; /* Force Acid Lime title */
    margin: 0 !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 10px !important;
    text-transform: uppercase !important;
    letter-spacing: 1px !important;
}

.cart-summary .cart-summary-header .cart-summary-title svg {
    width: 20px !important;
    height: 20px !important;
    color: #dfff00 !important;
    stroke: #dfff00 !important;
}

.cart-summary-body {
    padding: 28px !important;
}

.cart-summary-items {
    display: flex !important;
    flex-direction: column !important;
    gap: 16px !important;
    margin-bottom: 24px !important;
    padding-bottom: 24px !important;
    border-bottom: 1px solid rgba(8, 10, 12, 0.06) !important;
}

.cart-summary-item {
    display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
}

.cart-summary-item-label {
    font-size: 13.5px !important;
    font-weight: 600 !important;
    color: rgba(11, 13, 16, 0.5) !important;
}

.cart-summary-item-value {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 14.5px !important;
    font-weight: 800 !important;
    color: #0b0d10 !important;
}

.cart-summary-totals {
    display: flex !important;
    flex-direction: column !important;
    gap: 12px !important;
    margin-bottom: 28px !important;
}

.cart-summary-row {
    display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
}

.cart-summary-row.total {
    padding-top: 18px !important;
    border-top: 2px solid rgba(8, 10, 12, 0.06) !important;
}

.cart-summary-row.total .label {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 16px !important;
    font-weight: 800 !important;
    color: #0b0d10 !important;
    text-transform: uppercase !important;
}

.cart-summary-row.total .value {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 28px !important;
    font-weight: 900 !important;
    color: #6d7f00 !important;
    line-height: 1 !important;
}

.cart-checkout-btn {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 10px !important;
    width: 100% !important;
    background: #0b0d10 !important;
    border: 1px solid #0b0d10 !important;
    color: #dfff00 !important;
    padding: 16px 24px !important;
    border-radius: 12px !important;
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 14.5px !important;
    font-weight: 800 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
    text-decoration: none !important;
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
    cursor: pointer !important;
    box-shadow: 0 6px 20px rgba(8, 10, 12, 0.15) !important;
}

.cart-checkout-btn:hover {
    background: #dfff00 !important;
    color: #0b0d10 !important;
    border-color: #dfff00 !important;
    box-shadow: 0 10px 25px rgba(223, 255, 0, 0.25) !important;
    transform: translateY(-2px) !important;
}

.cart-checkout-btn svg {
    width: 18px !important;
    height: 18px !important;
    stroke: currentColor !important;
}

.cart-continue-shopping {
    display: block !important;
    text-align: center !important;
    margin-top: 18px !important;
    color: rgba(11, 13, 16, 0.5) !important;
    font-size: 13.5px !important;
    font-weight: 700 !important;
    text-decoration: none !important;
    transition: color 0.3s ease !important;
}

.cart-continue-shopping:hover {
    color: #6d7f00 !important;
    text-decoration: underline !important;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .cart-section {
        padding: 40px 0 64px !important;
    }
    
    .cart-summary {
        position: static !important;
    }
}
</style>
@endpush

@section('main-content')

<div class="about-title-band">
    <!-- HUD Visual Effects -->
    <div class="about-hud-grid"></div>
    <div class="about-hud-glow"></div>
    <div class="about-hud-decor border-t"></div>
    <div class="about-hud-decor border-b"></div>
    
    <div class="container position-relative z-1">
        <h1 class="about-hud-title mb-3 animate-fade-in-up">
            {{ __('common.your_cart') }}
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

<!-- Cart Section -->
<section class="cart-section contact-cart-page">
    <div class="container">

        @if(Helper::cartCount())
            <div class="cart-continue">
                <a href="{{ route('product-lists') }}" class="cart-continue-btn">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M19 12H5M12 19l-7-7 7-7"/>
                    </svg>
                    {{ __('common.continue_shopping') }}
                </a>
            </div>
            
            <div class="cart-grid">
                <!-- Cart Products Table -->
                <div class="cart-table">
                    <div class="cart-table-head">
                        <span class="cart-th">{{ __('common.product') }}</span>
                        <span class="cart-th cart-th-center">{{ __('common.price') }}</span>
                        <span class="cart-th cart-th-center">{{ __('common.total') }}</span>
                        <span class="cart-th cart-th-center">{{ __('common.remove') }}</span>
                    </div>
                    @foreach(Helper::getAllProductFromCart() as $key => $cart)
                        @php
                            $user_id = auth()->check() ? auth()->id() : session('guest');
                            $cartItem = App\Models\Cart::where('user_id', $user_id)->where('order_id', null)->where('id', $cart->id)->first();
                            $points = $cartItem ? $cartItem->points : 0;
                            $hasProduct = !empty($cart['photo']) && $cart['photo'] !== null;
                        @endphp
                        <div class="cart-table-row">
                            <div class="cart-col-product">
                                @if($hasProduct)
                                <div class="cart-product-image">
                                    <img src="{{ asset($cart['photo']) }}" alt="{{ $cart['title'] }}" onerror="this.style.display='none'">
                                </div>
                                @else
                                <div class="cart-product-image cart-product-points-only">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                                    </svg>
                                    <span class="points-badge">{{ $points }} {{ __('common.points') }}</span>
                                </div>
                                @endif
                                <h3 class="cart-product-title">{{ $cart['title'] }}</h3>
                            </div>
                            <div class="cart-col cart-col-price">
                                <span class="cart-product-price">
                                    {{ $points }} {{ __('common.points') }} ×
                                    <span>{{ Helper::getCurrencySymbol(session('currency')) }}{{ number_format($cart['price'], session('currency')=='JPY' ? 0 : 2) }}</span>
                                </span>
                            </div>
                            <div class="cart-col cart-col-total">
                                <span class="cart-cell-label">{{ __('common.total') }}:</span>
                                <span class="cart-product-total">
                                    {{ Helper::getCurrencySymbol(session('currency')) }}{{ number_format($cart['amount'], session('currency')=='JPY' ? 0 : 2) }}
                                </span>
                            </div>
                            <div class="cart-col cart-col-action">
                                <a href="{{ route('cart-delete', $cart->id) }}" class="cart-remove-btn">
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
                    @endforeach
                </div>

                <!-- Cart Summary Sidebar -->
                <div class="cart-summary">
                    <div class="cart-summary-header">
                        <h3 class="cart-summary-title">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="9" cy="21" r="1"/>
                                <circle cx="20" cy="21" r="1"/>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                            </svg>
                            {{ __('common.cart_summary') }}
                        </h3>
                    </div>
                    <div class="cart-summary-body">
                        <div class="cart-summary-items">
                            <div class="cart-summary-item">
                                <span class="cart-summary-item-label">{{ __('common.items') }}</span>
                                <span class="cart-summary-item-value">{{ Helper::cartCount() }}</span>
                            </div>
                            <div class="cart-summary-item">
                                <span class="cart-summary-item-label">{{ __('common.total_points') }}:</span>
                                <span class="cart-summary-item-value">
                                    @php
                                        $totalPoints = 0;
                                        $user_id = auth()->check() ? auth()->id() : session('guest');
                                        foreach(Helper::getAllProductFromCart() as $cart) {
                                            $cartItem = App\Models\Cart::where('user_id', $user_id)->where('order_id', null)->where('id', $cart->id)->first();
                                            $totalPoints += $cartItem ? ($cartItem->points ?? 0) : 0;
                                        }
                                        echo $totalPoints;
                                    @endphp
                                </span>
                            </div>
                        </div>

                        <div class="cart-summary-totals">
                           
                            
                            <div class="cart-summary-row total">
                                <span class="label">{{ __('common.total') }}:</span>
                                <span class="value">{{ Helper::getCurrencySymbol(session('currency')) }}{{ number_format(Helper::totalCartPrice(), session('currency')=='JPY' ? 0 : 2) }}</span>
                            </div>
                        </div>

                        <a href="{{ route('checkout') }}" class="cart-checkout-btn">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                            </svg>
                            {{ __('common.proceed_to_checkout') }}
                        </a>

                        <a href="{{ route('product-lists') }}" class="cart-continue-shopping">
                            {{ __('common.continue_shopping') }}
                        </a>
                    </div>
                </div>
            </div>
        @else
            <!-- Empty Cart State -->
            <div class="cart-empty">
                <div class="cart-empty-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="9" cy="21" r="1"/>
                        <circle cx="20" cy="21" r="1"/>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                    </svg>
                </div>
                <h3>{{ __('common.no_cart_available') }}</h3>
                <p>{{ __('common.empty_cart_message') }}</p>
                <a href="{{ route('product-lists') }}" class="cart-empty-btn">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                    {{ __('common.browse_products') }}
                </a>
            </div>
        @endif
    </div>
</section>

@endsection
