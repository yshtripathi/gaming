@extends('frontend.layouts.main')
@section('title', 'Cart')

@push('styles')
<style>
/* Cart Hero Section */
.cart-hero {
    position: relative;
    padding: 100px 0 60px;
    background: linear-gradient(135deg, var(--ws-bg-dark, #0D0D1A) 0%, #1a1040 50%, var(--ws-bg-dark, #0D0D1A) 100%);
    overflow: hidden;
    margin-top: 80px;
}

.cart-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(ellipse at 20% 50%, rgba(124, 58, 237, 0.15) 0%, transparent 50%),
        radial-gradient(ellipse at 80% 50%, rgba(168, 85, 247, 0.1) 0%, transparent 50%);
    pointer-events: none;
}

.cart-hero-content {
    position: relative;
    z-index: 1;
    text-align: center;
}

.cart-hero-title {
    font-family: 'Chakra Petch', sans-serif;
    font-size: 48px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 4px;
    background: linear-gradient(135deg, var(--ws-primary, #8B5CF6), var(--ws-accent, #A855F7), #c084fc);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-shadow: 0 0 40px rgba(124, 58, 237, 0.5);
    margin-bottom: 16px;
}

.cart-hero-subtitle {
    font-size: 14px;
    color: var(--ws-text-muted, #A0AEC0);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
}

.cart-hero-subtitle a {
    color: var(--ws-text-muted, #A0AEC0);
    text-decoration: none;
    transition: color 0.3s ease;
}

.cart-hero-subtitle a:hover {
    color: var(--ws-primary, #8B5CF6);
}

.cart-hero-subtitle span {
    color: var(--ws-primary, #8B5CF6);
}

/* Cart Layout */
.cart-section {
    padding: 60px 0;
    background: var(--ws-bg-dark);
    min-height: 70vh;
}

.cart-grid {
    display: grid;
    grid-template-columns: 1fr 400px;
    gap: 40px;
    align-items: start;
}

@media (max-width: 1200px) {
    .cart-grid {
        grid-template-columns: 1fr 340px;
        gap: 30px;
    }
}

@media (max-width: 992px) {
    .cart-grid {
        grid-template-columns: 1fr;
    }
}

/* Cart Products Column */
.cart-products {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

/* Cart Product Card */
.cart-product-card {
    display: grid;
    grid-template-columns: 140px 1fr auto;
    gap: 24px;
    align-items: center;
    background: var(--ws-bg-card);
    border-radius: 20px;
    padding: 24px;
    border: 1px solid var(--ws-border-light);
    transition: all 0.3s ease;
}

.cart-product-card:hover {
    border-color: var(--ws-primary);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}

@media (max-width: 768px) {
    .cart-product-card {
        grid-template-columns: 100px 1fr;
        gap: 16px;
    }
    
    .cart-product-actions {
        grid-column: 1 / -1;
        justify-content: flex-end !important;
    }
}

.cart-product-image {
    width: 140px;
    height: 100px;
    border-radius: 16px;
    overflow: hidden;
    background: var(--ws-bg-dark);
}

.cart-product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.cart-product-points-only {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 8px;
    background: rgba(124, 58, 237, 0.1);
    border: 2px dashed rgba(124, 58, 237, 0.3);
}

.cart-product-points-only svg {
    width: 32px;
    height: 32px;
    color: var(--ws-primary-light);
}

.cart-product-points-only .points-badge {
    font-size: 12px;
    font-weight: 700;
    color: var(--ws-primary-light);
    text-align: center;
}

.cart-product-info {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.cart-product-title {
    font-size: 18px;
    font-weight: 700;
    color: var(--ws-text-primary) !important;
    line-height: 1.3;
}

.cart-product-meta {
    display: flex;
    align-items: center;
    gap: 16px;
    flex-wrap: wrap;
}

.cart-product-price {
    font-size: 14px;
    color: var(--ws-text-muted);
}

.cart-product-price span {
    color: var(--ws-primary-light);
    font-weight: 600;
}

.cart-product-quantity {
    display: flex;
    align-items: center;
    gap: 12px;
}

.cart-qty-btn {
    width: 32px;
    height: 32px;
    background: rgba(124, 58, 237, 0.1);
    border: 1px solid rgba(124, 58, 237, 0.3);
    border-radius: 8px;
    color: var(--ws-primary-light);
    font-size: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
}

.cart-qty-btn:hover {
    background: var(--ws-primary);
    color: white;
}

.cart-qty-value {
    font-size: 16px;
    font-weight: 600;
    color: var(--ws-text-primary);
    min-width: 30px;
    text-align: center;
}

.cart-product-actions {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 12px;
    justify-content: center;
}

.cart-product-total {
    font-size: 24px;
    font-weight: 700;
    color: var(--ws-primary-light) !important;
}

.cart-remove-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(239, 68, 68, 0.1);
    border: 1px solid rgba(239, 68, 68, 0.3);
    color: #ef4444;
    padding: 10px 16px;
    border-radius: 10px;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    cursor: pointer;
}

.cart-remove-btn:hover {
    background: #ef4444;
    color: white;
    border-color: #ef4444;
}

.cart-remove-btn svg {
    width: 16px;
    height: 16px;
}

/* Empty Cart State */
.cart-empty {
    text-align: center;
    padding: 80px 40px;
    background: var(--ws-bg-card);
    border-radius: 24px;
    border: 1px solid var(--ws-border-light);
}

.cart-empty-icon {
    width: 120px;
    height: 120px;
    background: rgba(124, 58, 237, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 30px;
}

.cart-empty-icon svg {
    width: 60px;
    height: 60px;
    color: var(--ws-primary);
}

.cart-empty h3 {
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 16px;
    color: var(--ws-text-primary) !important;
}

.cart-empty p {
    color: var(--ws-text-muted);
    margin-bottom: 30px;
    max-width: 400px;
    margin-left: auto;
    margin-right: auto;
}

.cart-empty-btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: linear-gradient(135deg, var(--ws-primary), var(--ws-accent));
    color: white;
    padding: 16px 32px;
    border-radius: 12px;
    font-size: 15px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
}

.cart-empty-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(124, 58, 237, 0.4);
    color: white;
}

/* Cart Summary Sidebar */
.cart-summary {
    position: sticky;
    top: 100px;
    background: var(--ws-bg-card);
    border-radius: 24px;
    border: 1px solid var(--ws-border-light);
    overflow: hidden;
}

.cart-summary-header {
    background: linear-gradient(135deg, var(--ws-primary), var(--ws-accent));
    padding: 24px;
    text-align: center;
}

.cart-summary-title {
    font-size: 20px;
    font-weight: 700;
    color: white;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.cart-summary-title svg {
    width: 24px;
    height: 24px;
}

.cart-summary-body {
    padding: 30px;
}

.cart-summary-items {
    display: flex;
    flex-direction: column;
    gap: 16px;
    margin-bottom: 24px;
    padding-bottom: 24px;
    border-bottom: 1px solid var(--ws-border-light);
}

.cart-summary-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.cart-summary-item-label {
    font-size: 14px;
    color: var(--ws-text-muted);
}

.cart-summary-item-value {
    font-size: 14px;
    font-weight: 600;
    color: var(--ws-text-secondary);
}

.cart-summary-item-value.free {
    color: #22c55e;
}

.cart-summary-totals {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-bottom: 30px;
}

.cart-summary-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.cart-summary-row .label {
    font-size: 14px;
    color: var(--ws-text-muted);
}

.cart-summary-row .value {
    font-size: 16px;
    font-weight: 600;
    color: var(--ws-text-secondary);
}

.cart-summary-row.total {
    padding-top: 16px;
    border-top: 2px solid var(--ws-border-light);
}

.cart-summary-row.total .label {
    font-size: 16px;
    font-weight: 700;
    color: var(--ws-text-primary);
}

.cart-summary-row.total .value {
    font-size: 28px;
    font-weight: 900;
    color: var(--ws-primary-light) !important;
}

.cart-checkout-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    width: 100%;
    background: linear-gradient(135deg, var(--ws-primary), var(--ws-accent));
    color: white;
    padding: 18px 24px;
    border-radius: 14px;
    font-size: 16px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    text-decoration: none;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    box-shadow: 0 0 30px rgba(124, 58, 237, 0.4);
}

.cart-checkout-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 40px rgba(124, 58, 237, 0.6);
    color: white;
}

.cart-checkout-btn svg {
    width: 20px;
    height: 20px;
}

.cart-continue-shopping {
    display: block;
    text-align: center;
    margin-top: 20px;
    color: var(--ws-text-muted);
    font-size: 14px;
    text-decoration: none;
    transition: color 0.3s ease;
}

.cart-continue-shopping:hover {
    color: var(--ws-primary-light);
}

/* Secure checkout badge */
.cart-secure-badge {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    margin-top: 20px;
    padding: 12px;
    background: rgba(34, 197, 94, 0.1);
    border-radius: 10px;
    color: #22c55e;
    font-size: 12px;
    font-weight: 600;
}

.cart-secure-badge svg {
    width: 16px;
    height: 16px;
}

/* Continue Shopping Link */
.cart-continue {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.cart-continue-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--ws-text-muted);
    font-size: 14px;
    text-decoration: none;
    transition: color 0.3s ease;
}

.cart-continue-btn:hover {
    color: var(--ws-primary-light);
}

.cart-continue-btn svg {
    width: 18px;
    height: 18px;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .cart-hero-title {
        font-size: 32px;
        letter-spacing: 3px;
    }
    
    .cart-section {
        padding: 40px 0;
    }
    
    .cart-product-card {
        padding: 16px;
    }
    
    .cart-summary {
        position: static;
    }
}

</style>
@endpush

@section('main-content')
<!-- Cart Section -->
<section class="cart-section contact-cart-page">
    <div class="container">
        <div class="cart-page-heading">
            <div>
                <div class="cart-page-kicker">{{ __('common.cart_summary') }}</div>
                <h1>{{ __('common.your_cart') }}</h1>
            </div>
            <div class="cart-page-breadcrumb">
                <a href="{{ route('home') }}">{{ __('common.home') }}</a>
                <span>/</span>
                <span>{{ __('common.cart') }}</span>
            </div>
        </div>

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
                <!-- Cart Products Column -->
                <div class="cart-products">
                    @foreach(Helper::getAllProductFromCart() as $key => $cart)
                        @php
                            $user_id = auth()->check() ? auth()->id() : session('guest');
                            $cartItem = App\Models\Cart::where('user_id', $user_id)->where('order_id', null)->where('id', $cart->id)->first();
                            $points = $cartItem ? $cartItem->points : 0;
                            $hasProduct = !empty($cart['photo']) && $cart['photo'] !== null;
                        @endphp
                        <div class="cart-product-card">
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
                            <div class="cart-product-info">
                                <h3 class="cart-product-title">{{ $cart['title'] }}</h3>
                                <div class="cart-product-meta">
                                    <div class="cart-product-price">
                                        {{ $points }} {{ __('common.points') }} × 
                                        <span>{{ Helper::getCurrencySymbol(session('currency')) }}{{ number_format($cart['price'], session('currency')=='JPY' ? 0 : 2) }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-product-actions">
                                <div class="cart-product-total">
                                    {{ Helper::getCurrencySymbol(session('currency')) }}{{ number_format($cart['amount'], session('currency')=='JPY' ? 0 : 2) }}
                                </div>
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

                        <div class="cart-secure-badge">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                            </svg>
                            Secure Checkout
                        </div>
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
