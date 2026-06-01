@extends('frontend.layouts.main')
@section('title', $page_data->page_title)

@push('styles')
<style>
/* Legal Page Hero Banner */
.legal-hero-banner {
    position: relative;
    min-height: 350px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background: var(--ws-bg-dark);
    margin-top: 80px;
}

.legal-hero-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(30, 30, 60, 0.9) 0%, rgba(15, 15, 35, 0.95) 100%);
    opacity: 0.8;
}

.legal-hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(124, 58, 237, 0.15) 0%, rgba(15, 15, 35, 0.8) 100%);
}

/* Animated Particles */
.legal-hero-particles {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    overflow: hidden;
}

.legal-particle {
    position: absolute;
    width: 4px;
    height: 4px;
    background: var(--ws-primary-light);
    border-radius: 50%;
    opacity: 0.5;
    animation: float-legal-particle 12s ease-in-out infinite;
}

.legal-particle:nth-child(1) { left: 10%; top: 20%; animation-delay: 0s; }
.legal-particle:nth-child(2) { left: 25%; top: 70%; animation-delay: 2s; }
.legal-particle:nth-child(3) { left: 50%; top: 40%; animation-delay: 4s; }
.legal-particle:nth-child(4) { left: 75%; top: 80%; animation-delay: 1s; }
.legal-particle:nth-child(5) { left: 90%; top: 30%; animation-delay: 3s; }

@keyframes float-legal-particle {
    0%, 100% { transform: translateY(0) scale(1); opacity: 0.5; }
    50% { transform: translateY(-30px) scale(1.5); opacity: 1; }
}

.legal-hero-content {
    position: relative;
    z-index: 10;
    text-align: center;
    padding: 60px 20px;
}

.legal-hero-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, var(--ws-primary), var(--ws-accent));
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 24px;
    box-shadow: 0 0 40px rgba(124, 58, 237, 0.4);
    animation: pulse-glow-legal 3s ease-in-out infinite;
}

@keyframes pulse-glow-legal {
    0%, 100% { box-shadow: 0 0 40px rgba(124, 58, 237, 0.4); transform: scale(1); }
    50% { box-shadow: 0 0 60px rgba(124, 58, 237, 0.7); transform: scale(1.05); }
}

.legal-hero-icon svg {
    width: 35px;
    height: 35px;
    color: white;
}

.legal-hero-title {
    font-size: 48px;
    font-weight: 800;
    font-family: 'Chakra Petch', sans-serif !important;
    text-transform: uppercase;
    letter-spacing: 4px;
    margin-bottom: 16px;
    background: linear-gradient(135deg, var(--ws-text-primary) 0%, var(--ws-primary-light) 50%, var(--ws-accent-light) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    filter: drop-shadow(0 0 30px rgba(124, 58, 237, 0.5));
}

.legal-hero-subtitle {
    font-size: 16px;
    color: var(--ws-text-muted);
    margin-bottom: 24px;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
}

.legal-hero-breadcrumb {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: rgba(26, 26, 46, 0.8);
    backdrop-filter: blur(10px);
    padding: 10px 20px;
    border-radius: 50px;
    border: 1px solid var(--ws-border-light);
}

.legal-hero-breadcrumb a,
.legal-hero-breadcrumb span {
    color: var(--ws-text-muted);
    font-size: 13px;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
}

.legal-hero-breadcrumb a:hover {
    color: var(--ws-primary-light);
}

.legal-hero-breadcrumb .separator {
    color: var(--ws-primary);
    font-weight: 600;
}

/* Page Content Styling */
.page-content-wrapper {
    padding: 60px 0;
    background: var(--ws-bg-dark);
    min-height: 60vh;
}

.page-content-inner {
    background: var(--ws-bg-card);
    border-radius: 20px;
    padding: 50px;
    border: 1px solid var(--ws-border-light);
}

.page-content-inner h1,
.page-content-inner h2,
.page-content-inner h3 {
    color: var(--ws-text-primary) !important;
    font-weight: 700;
    margin-bottom: 20px;
}

.page-content-inner p {
    color: var(--ws-text-secondary);
    line-height: 1.8;
    margin-bottom: 16px;
}

.page-content-inner ul,
.page-content-inner ol {
    color: var(--ws-text-secondary);
    padding-left: 24px;
    margin-bottom: 20px;
}

.page-content-inner li {
    margin-bottom: 10px;
    line-height: 1.7;
}

.page-content-inner a {
    color: var(--ws-primary-light);
    text-decoration: none;
    transition: color 0.3s ease;
}

.page-content-inner a:hover {
    color: var(--ws-accent-light);
}

@media (max-width: 768px) {
    .legal-hero-banner {
        min-height: 280px;
    }
    
    .legal-hero-title {
        font-size: 32px;
        letter-spacing: 2px;
    }
    
    .page-content-inner {
        padding: 30px 20px;
    }
}
</style>
@endpush

@section('main-content')
<!-- Legal Page Hero Banner -->
<div class="legal-hero-banner">
    <div class="legal-hero-bg"></div>
    <div class="legal-hero-overlay"></div>
    <div class="legal-hero-particles">
        <div class="legal-particle"></div>
        <div class="legal-particle"></div>
        <div class="legal-particle"></div>
        <div class="legal-particle"></div>
        <div class="legal-particle"></div>
    </div>
    <div class="container">
        <div class="legal-hero-content">
            <div class="legal-hero-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                    <polyline points="14 2 14 8 20 8"/>
                    <line x1="16" y1="13" x2="8" y2="13"/>
                    <line x1="16" y1="17" x2="8" y2="17"/>
                    <polyline points="10 9 9 9 8 9"/>
                </svg>
            </div>
            <h1 class="legal-hero-title">{{ $page_data->page_title }}</h1>
          
            <div class="legal-hero-breadcrumb">
                <a href="{{ route('home') }}">{{ __('common.home') }}</a>
                <span class="separator">/</span>
                <span>{{ $page_data->page_title }}</span>
            </div>
        </div>
    </div>
</div>

<!-- Page Content -->
<div class="page-content-wrapper">
    <div class="container">
        <div class="page-content-inner">
            {!! $page_data->page_desc !!}
        </div>
    </div>
</div>

@endsection