@extends('frontend.layouts.main')
@section('title', 'Order Failed')
@push('styles')
<style>
/* Order Failed Hero Banner */
.order-failed-hero {
    position: relative;
    min-height: 350px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background: var(--ws-bg-dark);
    margin-top: 80px;
}

.order-failed-hero-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('../media/blogs/bd-1.png') center/cover no-repeat;
    opacity: 0.2;
}

.order-failed-hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(239, 68, 68, 0.15) 0%, rgba(15, 15, 35, 0.95) 50%, rgba(239, 68, 68, 0.1) 100%);
}

.order-failed-particles {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    overflow: hidden;
}

.failed-particle {
    position: absolute;
    width: 8px;
    height: 8px;
    background: #ef4444;
    border-radius: 50%;
    opacity: 0;
    animation: float-failed 6s ease-in-out infinite;
}

.failed-particle:nth-child(1) { left: 10%; top: 20%; animation-delay: 0s; }
.failed-particle:nth-child(2) { left: 25%; top: 60%; animation-delay: 1s; }
.failed-particle:nth-child(3) { left: 50%; top: 30%; animation-delay: 0.5s; }
.failed-particle:nth-child(4) { left: 70%; top: 70%; animation-delay: 1.5s; }
.failed-particle:nth-child(5) { left: 85%; top: 25%; animation-delay: 2s; }
.failed-particle:nth-child(6) { left: 40%; top: 80%; animation-delay: 0.8s; }

@keyframes float-failed {
    0%, 100% {
        transform: translateY(0) translateX(0) scale(1);
        opacity: 0;
    }
    25% {
        opacity: 0.8;
    }
    50% {
        transform: translateY(-40px) translateX(20px) scale(1.5);
        opacity: 1;
        box-shadow: 0 0 20px #ef4444;
    }
    75% {
        opacity: 0.6;
    }
}

.order-failed-content {
    position: relative;
    z-index: 10;
    text-align: center;
    padding: 60px 20px;
}

.failed-icon {
    width: 100px;
    height: 100px;
    background: linear-gradient(135deg, #ef4444, #dc2626);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 24px;
    box-shadow: 0 0 50px rgba(239, 68, 68, 0.6);
    animation: pulse-failed 2s ease-in-out infinite;
}

@keyframes pulse-failed {
    0%, 100% {
        box-shadow: 0 0 50px rgba(239, 68, 68, 0.6);
        transform: scale(1);
    }
    50% {
        box-shadow: 0 0 80px rgba(239, 68, 68, 0.9), 0 0 100px rgba(239, 68, 68, 0.4);
        transform: scale(1.05);
    }
}

.failed-icon svg {
    width: 50px;
    height: 50px;
    color: white;
}

.order-failed-title {
    font-family: 'Chakra Petch', sans-serif;
    font-size: 42px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 3px;
    margin-bottom: 12px;
    background: linear-gradient(135deg, #ef4444 0%, #f87171 50%, #fca5a5 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    filter: drop-shadow(0 0 20px rgba(239, 68, 68, 0.5));
}

.order-failed-subtitle {
    font-size: 18px;
    color: var(--ws-text-muted);
    margin-bottom: 0;
}

/* Order Details Card */
.order-failed-body {
    padding: 60px 0;
    background: var(--ws-bg-dark);
    min-height: 60vh;
}

.order-failed-card {
    background: var(--ws-bg-card);
    border: 1px solid rgba(239, 68, 68, 0.3);
    border-radius: 24px;
    padding: 48px;
    position: relative;
    overflow: hidden;
    max-width: 700px;
    margin: 0 auto;
}

.order-failed-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #ef4444, #dc2626, #ef4444);
    background-size: 200% 100%;
    animation: gradient-slide 3s ease infinite;
}

@keyframes gradient-slide {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.order-error-box {
    background: rgba(239, 68, 68, 0.1);
    border: 1px solid rgba(239, 68, 68, 0.3);
    border-radius: 16px;
    padding: 24px;
    margin-bottom: 32px;
    text-align: center;
}

.order-error-label {
    font-size: 14px;
    color: var(--ws-text-muted);
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 8px;
    font-weight: 600;
}

.order-error-message {
    font-family: 'Chakra Petch', sans-serif;
    font-size: 18px;
    font-weight: 700;
    color: #ef4444;
    text-shadow: 0 0 20px rgba(239, 68, 68, 0.5);
}

.order-message {
    text-align: center;
    margin-bottom: 32px;
}

.order-message h3 {
    font-family: 'Chakra Petch', sans-serif;
    font-size: 24px;
    color: var(--ws-text-primary);
    margin-bottom: 16px;
}

.order-message h5 {
    font-size: 16px;
    color: var(--ws-text-muted);
    line-height: 1.6;
    margin-bottom: 12px;
}

.order-message ul {
    list-style: none;
    padding: 0;
    margin: 16px 0;
    text-align: left;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
}

.order-message ul li {
    padding: 8px 0;
    color: var(--ws-text-muted);
    font-size: 15px;
    line-height: 1.6;
    border-bottom: 1px solid rgba(239, 68, 68, 0.1);
}

.order-message ul li:before {
    content: '• ';
    color: #ef4444;
    margin-right: 10px;
    font-weight: 700;
}

.order-message p {
    font-size: 15px;
    color: var(--ws-text-muted);
    margin-top: 16px;
}

.order-message a {
    color: var(--ws-primary);
    text-decoration: none;
    transition: all 0.3s ease;
}

.order-message a:hover {
    text-decoration: underline;
}

.order-failed-actions {
    display: flex;
    gap: 16px;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-failed-gaming {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 16px 32px;
    background: linear-gradient(135deg, #ef4444, #dc2626);
    border: none;
    border-radius: 14px;
    color: white;
    font-family: 'Chakra Petch', sans-serif;
    font-size: 15px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    box-shadow: 0 10px 30px rgba(239, 68, 68, 0.4);
}

.btn-failed-gaming:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(239, 68, 68, 0.6);
}

.btn-secondary-failed {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 16px 32px;
    background: transparent;
    border: 2px solid rgba(239, 68, 68, 0.5);
    border-radius: 14px;
    color: #f87171;
    font-family: 'Chakra Petch', sans-serif;
    font-size: 15px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
}

.btn-secondary-failed:hover {
    background: rgba(239, 68, 68, 0.1);
    border-color: #ef4444;
    transform: translateY(-3px);
}

@media (max-width: 768px) {
    .order-failed-hero {
        min-height: 280px;
        margin-top: 70px;
    }

    .order-failed-title {
        font-size: 28px;
        letter-spacing: 2px;
    }

    .order-failed-card {
        padding: 32px 24px;
        margin: 0 16px;
    }

    .order-error-message {
        font-size: 16px;
    }

    .failed-icon {
        width: 80px;
        height: 80px;
    }

    .failed-icon svg {
        width: 40px;
        height: 40px;
    }

    .order-failed-actions {
        flex-direction: column;
    }

    .btn-failed-gaming,
    .btn-secondary-failed {
        width: 100%;
        justify-content: center;
    }
}
</style>
@endpush

@section('main-content')

<!-- Order Failed Hero -->
<div class="order-failed-hero">
    <div class="order-failed-hero-bg"></div>
    <div class="order-failed-hero-overlay"></div>
    <div class="order-failed-particles">
        <div class="failed-particle"></div>
        <div class="failed-particle"></div>
        <div class="failed-particle"></div>
        <div class="failed-particle"></div>
        <div class="failed-particle"></div>
        <div class="failed-particle"></div>
    </div>
    <div class="order-failed-content">
        <div class="failed-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </div>
        <h1 class="order-failed-title">{{ __('common.payment_unsuccessful') }}</h1>
        <p class="order-failed-subtitle">{{ __('common.payment_error') }}</p>
    </div>
</div>

<!-- Order Failed Body -->
<div class="order-failed-body">
    <div class="container">
        <div class="order-failed-card">
            <div class="order-error-box">
                <div class="order-error-label">{{ __('common.payment_status') }}</div>
                <div class="order-error-message">FAILED</div>
            </div>

            <div class="order-message">
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

            <div class="order-failed-actions">
                
                <a href="{{ route('home') }}" class="btn-secondary-failed">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    {{ __('common.go_to_homepage') }}
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Back To Top -->
<div id="back-to-top" class="back-to-top">
    <a href="#"><i class="fas fa-angle-up"></i></a>
</div>

@endsection