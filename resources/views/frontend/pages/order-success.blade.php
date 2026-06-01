@extends('frontend.layouts.main')
@section('title', 'Order Success')
@push('styles')
<style>
/* Order Success Hero Banner */
.order-success-hero {
    position: relative;
    min-height: 350px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background: var(--ws-bg-dark);
    margin-top: 80px;
}

.order-success-hero-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('../media/blogs/bd-1.png') center/cover no-repeat;
    opacity: 0.2;
}

.order-success-hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(34, 197, 94, 0.15) 0%, rgba(15, 15, 35, 0.95) 50%, rgba(34, 197, 94, 0.1) 100%);
}

.order-success-particles {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    overflow: hidden;
}

.success-particle {
    position: absolute;
    width: 8px;
    height: 8px;
    background: #22c55e;
    border-radius: 50%;
    opacity: 0;
    animation: float-success 6s ease-in-out infinite;
}

.success-particle:nth-child(1) { left: 10%; top: 20%; animation-delay: 0s; }
.success-particle:nth-child(2) { left: 25%; top: 60%; animation-delay: 1s; }
.success-particle:nth-child(3) { left: 50%; top: 30%; animation-delay: 0.5s; }
.success-particle:nth-child(4) { left: 70%; top: 70%; animation-delay: 1.5s; }
.success-particle:nth-child(5) { left: 85%; top: 25%; animation-delay: 2s; }
.success-particle:nth-child(6) { left: 40%; top: 80%; animation-delay: 0.8s; }

@keyframes float-success {
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
        box-shadow: 0 0 20px #22c55e;
    }
    75% {
        opacity: 0.6;
    }
}

.order-success-content {
    position: relative;
    z-index: 10;
    text-align: center;
    padding: 60px 20px;
}

.success-icon {
    width: 100px;
    height: 100px;
    background: linear-gradient(135deg, #22c55e, #16a34a);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 24px;
    box-shadow: 0 0 50px rgba(34, 197, 94, 0.6);
    animation: pulse-success 2s ease-in-out infinite;
}

@keyframes pulse-success {
    0%, 100% { 
        box-shadow: 0 0 50px rgba(34, 197, 94, 0.6);
        transform: scale(1);
    }
    50% { 
        box-shadow: 0 0 80px rgba(34, 197, 94, 0.9), 0 0 100px rgba(34, 197, 94, 0.4);
        transform: scale(1.05);
    }
}

.success-icon svg {
    width: 50px;
    height: 50px;
    color: white;
}

.order-success-title {
    font-family: 'Chakra Petch', sans-serif;
    font-size: 42px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 3px;
    margin-bottom: 12px;
    background: linear-gradient(135deg, #22c55e 0%, #4ade80 50%, #86efac 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    filter: drop-shadow(0 0 20px rgba(34, 197, 94, 0.5));
}

.order-success-subtitle {
    font-size: 18px;
    color: var(--ws-text-muted);
    margin-bottom: 0;
}

/* Order Details Card */
.order-success-body {
    padding: 60px 0;
    background: var(--ws-bg-dark);
    min-height: 60vh;
}

.order-success-card {
    background: var(--ws-bg-card);
    border: 1px solid rgba(34, 197, 94, 0.3);
    border-radius: 24px;
    padding: 48px;
    position: relative;
    overflow: hidden;
    max-width: 700px;
    margin: 0 auto;
}

.order-success-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #22c55e, #16a34a, #22c55e);
    background-size: 200% 100%;
    animation: gradient-slide 3s ease infinite;
}

@keyframes gradient-slide {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.order-invoice-box {
    background: rgba(34, 197, 94, 0.1);
    border: 1px solid rgba(34, 197, 94, 0.3);
    border-radius: 16px;
    padding: 24px;
    margin-bottom: 32px;
    text-align: center;
}

.order-invoice-label {
    font-size: 14px;
    color: var(--ws-text-muted);
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 8px;
    font-weight: 600;
}

.order-invoice-number {
    font-family: 'Chakra Petch', sans-serif;
    font-size: 28px;
    font-weight: 700;
    color: #4ade80;
    text-shadow: 0 0 20px rgba(74, 222, 128, 0.5);
    word-break: break-all;
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
}

.order-message p {
    font-size: 15px;
    color: var(--ws-text-muted);
    margin-top: 16px;
}

.order-success-actions {
    display: flex;
    gap: 16px;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-success-gaming {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 16px 32px;
    background: linear-gradient(135deg, #22c55e, #16a34a);
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
    box-shadow: 0 10px 30px rgba(34, 197, 94, 0.4);
}

.btn-success-gaming:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(34, 197, 94, 0.6);
}

.btn-secondary-gaming {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 16px 32px;
    background: transparent;
    border: 2px solid rgba(34, 197, 94, 0.5);
    border-radius: 14px;
    color: #4ade80;
    font-family: 'Chakra Petch', sans-serif;
    font-size: 15px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
}

.btn-secondary-gaming:hover {
    background: rgba(34, 197, 94, 0.1);
    border-color: #22c55e;
    transform: translateY(-3px);
}

@media (max-width: 768px) {
    .order-success-hero {
        min-height: 280px;
        margin-top: 70px;
    }
    
    .order-success-title {
        font-size: 28px;
        letter-spacing: 2px;
    }
    
    .order-success-card {
        padding: 32px 24px;
        margin: 0 16px;
    }
    
    .order-invoice-number {
        font-size: 22px;
    }
    
    .success-icon {
        width: 80px;
        height: 80px;
    }
    
    .success-icon svg {
        width: 40px;
        height: 40px;
    }
    
    .order-success-actions {
        flex-direction: column;
    }
    
    .btn-success-gaming,
    .btn-secondary-gaming {
        width: 100%;
        justify-content: center;
    }
}
</style>
@endpush

@section('main-content')
@php
use App\Models\Order;
$order = Order::where('trans_id', $transaction_id)->first();
@endphp

<!-- Order Success Hero -->
<div class="order-success-hero">
    <div class="order-success-hero-bg"></div>
    <div class="order-success-hero-overlay"></div>
    <div class="order-success-particles">
        <div class="success-particle"></div>
        <div class="success-particle"></div>
        <div class="success-particle"></div>
        <div class="success-particle"></div>
        <div class="success-particle"></div>
        <div class="success-particle"></div>
    </div>
    <div class="order-success-content">
        <div class="success-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
        </div>
        <h1 class="order-success-title">{{ __('common.order_successful') }}</h1>
        
    </div>
</div>

<!-- Order Success Body -->
<div class="order-success-body">
    <div class="container">
        <div class="order-success-card">
            <div class="order-invoice-box">
                <div class="order-invoice-label">{{ __('common.invoice_number') }}</div>
                <div class="order-invoice-number">{{ $transaction_id }}</div>
            </div>
            
            <div class="order-message">
                <h3>{{ __('common.thank_you_order') }}</h3>
                <h5>{{ __('common.order_confirmation') }} {{ $transaction_id }}</h5>
                <p>{{ __('common.team_contact') }}</p>
            </div>
            
            <div class="order-success-actions">
                @if($email_status=='inactive')
                <a href="{{route('order.pdf',$order->id)}}" class="btn-success-gaming">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                    </svg>
                    {{ __('common.download_invoice') }}
                </a>
                @endif
                <a href="{{ route('home') }}" class="btn-secondary-gaming">
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
