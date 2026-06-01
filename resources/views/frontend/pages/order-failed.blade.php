@extends('frontend.layouts.main')
@section('title', 'Order Failed')
@push('styles')
<style>
/* Order Failed - Gaming HUD Theme */
.order-result-section {
    padding: 64px 0 96px !important;
    background-color: #f6f7f2 !important;
    background-image:
        radial-gradient(circle at 50% 50%, rgba(223, 255, 0, 0.04) 0%, transparent 80%),
        repeating-linear-gradient(90deg, rgba(8, 10, 12, 0.015) 0 1px, transparent 1px 40px),
        repeating-linear-gradient(0deg, rgba(8, 10, 12, 0.015) 0 1px, transparent 1px 40px) !important;
    position: relative !important;
    min-height: 60vh !important;
}

.order-result-card {
    max-width: 720px !important;
    margin: 0 auto !important;
    background: #ffffff !important;
    border: 1px solid rgba(8, 10, 12, 0.08) !important;
    border-radius: 24px !important;
    box-shadow: 0 15px 45px rgba(8, 10, 12, 0.04) !important;
    overflow: hidden !important;
    position: relative !important;
}

.order-result-card::before {
    content: '' !important;
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    right: 0 !important;
    height: 4px !important;
    background: linear-gradient(90deg, #ef4444, #dc2626, #ef4444) !important;
    background-size: 200% 100% !important;
    animation: result-gradient-slide 3s ease infinite !important;
}

@keyframes result-gradient-slide {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.order-result-head {
    text-align: center !important;
    padding: 48px 40px 32px !important;
}

.order-result-icon {
    width: 96px !important;
    height: 96px !important;
    border-radius: 50% !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    margin: 0 auto 24px !important;
    background: linear-gradient(135deg, #ef4444, #dc2626) !important;
    box-shadow: 0 0 40px rgba(239, 68, 68, 0.35) !important;
    animation: result-pulse-failed 2.4s ease-in-out infinite !important;
}

@keyframes result-pulse-failed {
    0%, 100% { box-shadow: 0 0 40px rgba(239, 68, 68, 0.35); transform: scale(1); }
    50% { box-shadow: 0 0 60px rgba(239, 68, 68, 0.55); transform: scale(1.04); }
}

.order-result-icon svg {
    width: 44px !important;
    height: 44px !important;
    color: #ffffff !important;
    stroke: #ffffff !important;
}

.order-result-title {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 30px !important;
    font-weight: 900 !important;
    text-transform: uppercase !important;
    letter-spacing: 2px !important;
    color: #0b0d10 !important;
    margin: 0 0 10px !important;
}

.order-result-title span {
    color: #dc2626 !important;
}

.order-result-subtitle {
    font-size: 15px !important;
    color: rgba(11, 13, 16, 0.55) !important;
    margin: 0 !important;
}

.order-result-body {
    padding: 0 40px 48px !important;
}

/* Status box */
.order-status-box {
    background: rgba(239, 68, 68, 0.07) !important;
    border: 1px solid rgba(239, 68, 68, 0.25) !important;
    border-radius: 16px !important;
    padding: 22px !important;
    margin-bottom: 28px !important;
    text-align: center !important;
}

.order-status-label {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 12px !important;
    color: rgba(11, 13, 16, 0.5) !important;
    text-transform: uppercase !important;
    letter-spacing: 2px !important;
    margin-bottom: 8px !important;
    font-weight: 700 !important;
}

.order-status-value {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 24px !important;
    font-weight: 900 !important;
    color: #dc2626 !important;
    text-transform: uppercase !important;
    letter-spacing: 1px !important;
}

.order-result-message {
    text-align: center !important;
    margin-bottom: 32px !important;
}

.order-result-message h3 {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 22px !important;
    font-weight: 800 !important;
    color: #0b0d10 !important;
    margin-bottom: 14px !important;
}

.order-result-message h5 {
    font-size: 15px !important;
    color: rgba(11, 13, 16, 0.6) !important;
    line-height: 1.6 !important;
    margin-bottom: 10px !important;
}

.order-result-message ul {
    list-style: none !important;
    padding: 0 !important;
    margin: 16px auto !important;
    text-align: left !important;
    max-width: 460px !important;
}

.order-result-message ul li {
    padding: 10px 0 !important;
    color: rgba(11, 13, 16, 0.65) !important;
    font-size: 14.5px !important;
    line-height: 1.6 !important;
    border-bottom: 1px solid rgba(8, 10, 12, 0.06) !important;
}

.order-result-message ul li:before {
    content: '' !important;
    display: inline-block !important;
    width: 7px !important;
    height: 7px !important;
    background: #ef4444 !important;
    border-radius: 50% !important;
    margin-right: 12px !important;
    vertical-align: middle !important;
}

.order-result-message p {
    font-size: 14.5px !important;
    color: rgba(11, 13, 16, 0.55) !important;
    margin-top: 14px !important;
}

.order-result-message a {
    color: #6d7f00 !important;
    font-weight: 700 !important;
    text-decoration: none !important;
    transition: all 0.3s ease !important;
}

.order-result-message a:hover {
    text-decoration: underline !important;
}

/* Actions */
.order-result-actions {
    display: flex !important;
    gap: 14px !important;
    justify-content: center !important;
    flex-wrap: wrap !important;
}

.btn-result-primary {
    display: inline-flex !important;
    align-items: center !important;
    gap: 10px !important;
    padding: 15px 30px !important;
    background: #0b0d10 !important;
    border: 1px solid #0b0d10 !important;
    border-radius: 12px !important;
    color: #dfff00 !important;
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 13.5px !important;
    font-weight: 800 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
    text-decoration: none !important;
    box-shadow: 0 6px 20px rgba(8, 10, 12, 0.15) !important;
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
}

.btn-result-primary:hover {
    background: #dfff00 !important;
    color: #0b0d10 !important;
    border-color: #dfff00 !important;
    box-shadow: 0 10px 25px rgba(223, 255, 0, 0.25) !important;
    transform: translateY(-2px) !important;
}

.btn-result-secondary {
    display: inline-flex !important;
    align-items: center !important;
    gap: 10px !important;
    padding: 15px 30px !important;
    background: transparent !important;
    border: 1px solid rgba(8, 10, 12, 0.18) !important;
    border-radius: 12px !important;
    color: #0b0d10 !important;
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 13.5px !important;
    font-weight: 800 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
    text-decoration: none !important;
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
}

.btn-result-secondary:hover {
    border-color: #6d7f00 !important;
    color: #6d7f00 !important;
    transform: translateY(-2px) !important;
}

.btn-result-primary svg,
.btn-result-secondary svg {
    width: 18px !important;
    height: 18px !important;
    stroke: currentColor !important;
}

@media (max-width: 768px) {
    .order-result-section { padding: 40px 0 64px !important; }
    .order-result-card { margin: 0 16px !important; }
    .order-result-head { padding: 36px 24px 24px !important; }
    .order-result-body { padding: 0 24px 36px !important; }
    .order-result-title { font-size: 24px !important; }
    .order-status-value { font-size: 20px !important; }
    .order-result-actions { flex-direction: column !important; }
    .btn-result-primary, .btn-result-secondary { width: 100% !important; justify-content: center !important; }
}
</style>
@endpush

@section('main-content')

<!-- Page Header Band -->
<div class="about-title-band">
    <div class="about-hud-grid"></div>
    <div class="about-hud-glow"></div>
    <div class="about-hud-decor border-t"></div>
    <div class="about-hud-decor border-b"></div>

    <div class="container position-relative z-1">
        <h1 class="about-hud-title mb-3 animate-fade-in-up">
            {{ __('common.payment_unsuccessful') }}
        </h1>

        <div class="about-hud-breadcrumb-capsule animate-fade-in-up delay-1">
            <a href="{{ route('home') }}" class="hud-breadcrumb-link">
                <i class="fas fa-home me-2"></i>{{ __('common.home') }}
            </a>
            <span class="hud-breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
            <span class="hud-breadcrumb-current">{{ __('common.payment_unsuccessful') }}</span>
        </div>
    </div>
</div>

<!-- Order Failed Body -->
<section class="order-result-section">
    <div class="container">
        <div class="order-result-card">
            <div class="order-result-head">
                <div class="order-result-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>
                <h1 class="order-result-title">{{ __('common.payment_unsuccessful') }}</h1>
                <p class="order-result-subtitle">{{ __('common.payment_error') }}</p>
            </div>

            <div class="order-result-body">
                <div class="order-status-box">
                    <div class="order-status-label">{{ __('common.payment_status') }}</div>
                    <div class="order-status-value">FAILED</div>
                </div>

                <div class="order-result-message">
                    <h3>{{ __('common.payment_failure_message') }}</h3>
                    <h5>{{ __('common.what_you_can_do') }}</h5>
                    <ul>
                        <li>{{ __('common.check_payment_details') }}</li>
                        <li>{{ __('common.contact_bank') }}</li>
                        <li>{{ __('common.try_different_payment') }}</li>
                    </ul>

                    <h5 style="margin-top: 24px;">{{ __('common.need_assistance') }}</h5>
                    <p>{{ __('common.reach_out') }} <a href="mailto:{{ $misc['Company Email'] ?? __('common.company_email') }}">{{ $misc['Company Email'] ?? __('common.company_email') }}</a>. {{ __('common.we_are_here') }}</p>
                </div>

                <div class="order-result-actions">
                    <a href="{{ route('home') }}" class="btn-result-primary">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        {{ __('common.go_to_homepage') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Back To Top -->
<div id="back-to-top" class="back-to-top">
    <a href="#"><i class="fas fa-angle-up"></i></a>
</div>

@endsection
