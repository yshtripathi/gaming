@extends('frontend.layouts.main')
@section('title', $page_data->page_title)

@push('styles')
<style>
/* Legal / CMS Page - Gaming HUD Theme */
.legal-section {
    padding: 64px 0 96px !important;
    background-color: #f6f7f2 !important;
    background-image:
        radial-gradient(circle at 50% 50%, rgba(223, 255, 0, 0.04) 0%, transparent 80%),
        repeating-linear-gradient(90deg, rgba(8, 10, 12, 0.015) 0 1px, transparent 1px 40px),
        repeating-linear-gradient(0deg, rgba(8, 10, 12, 0.015) 0 1px, transparent 1px 40px) !important;
    position: relative !important;
    min-height: 60vh !important;
}

.legal-content-card {
    max-width: 960px !important;
    margin: 0 auto !important;
    background: #ffffff !important;
    border: 1px solid rgba(8, 10, 12, 0.08) !important;
    border-radius: 24px !important;
    box-shadow: 0 15px 45px rgba(8, 10, 12, 0.03) !important;
    padding: 48px 52px !important;
    position: relative !important;
    overflow: hidden !important;
}

.legal-content-card::before {
    content: '' !important;
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    right: 0 !important;
    height: 4px !important;
    background: linear-gradient(90deg, #6d7f00, #dfff00, #6d7f00) !important;
}

/* Prose typography */
.legal-prose {
    color: rgba(11, 13, 16, 0.75) !important;
    font-size: 15.5px !important;
    line-height: 1.85 !important;
}

.legal-prose h1,
.legal-prose h2,
.legal-prose h3,
.legal-prose h4,
.legal-prose h5,
.legal-prose h6 {
    font-family: 'Chakra Petch', sans-serif !important;
    color: #0b0d10 !important;
    font-weight: 800 !important;
    line-height: 1.3 !important;
    margin: 32px 0 16px !important;
}

.legal-prose h1 { font-size: 30px !important; }
.legal-prose h2 { font-size: 25px !important; }
.legal-prose h3 { font-size: 21px !important; }
.legal-prose h4 { font-size: 18px !important; }
.legal-prose h5 { font-size: 16px !important; }
.legal-prose h6 { font-size: 14px !important; text-transform: uppercase !important; letter-spacing: 0.5px !important; }

.legal-prose h1:first-child,
.legal-prose h2:first-child,
.legal-prose h3:first-child {
    margin-top: 0 !important;
}

.legal-prose p {
    margin: 0 0 16px !important;
}

.legal-prose ul,
.legal-prose ol {
    padding-left: 24px !important;
    margin: 0 0 20px !important;
}

.legal-prose li {
    margin-bottom: 10px !important;
}

.legal-prose ul li::marker {
    color: #6d7f00 !important;
}

.legal-prose ol li::marker {
    color: #6d7f00 !important;
    font-weight: 700 !important;
}

.legal-prose a {
    color: #6d7f00 !important;
    font-weight: 700 !important;
    text-decoration: none !important;
    transition: color 0.3s ease !important;
}

.legal-prose a:hover {
    color: #0b0d10 !important;
    text-decoration: underline !important;
}

.legal-prose strong,
.legal-prose b {
    color: #0b0d10 !important;
    font-weight: 800 !important;
}

.legal-prose blockquote {
    margin: 24px 0 !important;
    padding: 16px 22px !important;
    background: rgba(109, 127, 0, 0.05) !important;
    border-left: 4px solid #6d7f00 !important;
    border-radius: 0 12px 12px 0 !important;
    color: rgba(11, 13, 16, 0.7) !important;
    font-style: italic !important;
}

.legal-prose img {
    max-width: 100% !important;
    height: auto !important;
    border-radius: 12px !important;
    margin: 16px 0 !important;
}

.legal-prose hr {
    border: none !important;
    border-top: 1px solid rgba(8, 10, 12, 0.1) !important;
    margin: 32px 0 !important;
}

/* Tables inside CMS content */
.legal-prose table {
    width: 100% !important;
    border-collapse: separate !important;
    border-spacing: 0 !important;
    margin: 24px 0 !important;
    border: 1px solid rgba(8, 10, 12, 0.1) !important;
    border-radius: 14px !important;
    overflow: hidden !important;
    font-size: 14.5px !important;
}

.legal-prose table thead th,
.legal-prose table th {
    background: #0b0d10 !important;
    color: #dfff00 !important;
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 12.5px !important;
    font-weight: 800 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
    text-align: left !important;
    padding: 14px 18px !important;
    border-bottom: 2px solid #6d7f00 !important;
    vertical-align: middle !important;
}

.legal-prose table td {
    padding: 13px 18px !important;
    border-bottom: 1px solid rgba(8, 10, 12, 0.07) !important;
    border-right: 1px solid rgba(8, 10, 12, 0.05) !important;
    color: rgba(11, 13, 16, 0.75) !important;
    vertical-align: top !important;
}

.legal-prose table td:last-child {
    border-right: none !important;
}

.legal-prose table tbody tr:last-child td {
    border-bottom: none !important;
}

.legal-prose table tbody tr:nth-child(even) {
    background: rgba(8, 10, 12, 0.02) !important;
}

.legal-prose table tbody tr:hover {
    background: rgba(109, 127, 0, 0.04) !important;
}

/* Responsive table wrapper */
.legal-prose .table-responsive,
.legal-prose figure.table {
    overflow-x: auto !important;
    -webkit-overflow-scrolling: touch !important;
    margin: 24px 0 !important;
}

.legal-prose .table-responsive table,
.legal-prose figure.table table {
    margin: 0 !important;
}

@media (max-width: 768px) {
    .legal-section { padding: 40px 0 64px !important; }
    .legal-content-card {
        margin: 0 16px !important;
        padding: 30px 22px !important;
    }
    .legal-prose { font-size: 14.5px !important; }
    .legal-prose table { display: block !important; overflow-x: auto !important; white-space: nowrap !important; }
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
            {{ $page_data->page_title }}
        </h1>

        <div class="about-hud-breadcrumb-capsule animate-fade-in-up delay-1">
            <a href="{{ route('home') }}" class="hud-breadcrumb-link">
                <i class="fas fa-home me-2"></i>{{ __('common.home') }}
            </a>
            <span class="hud-breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
            <span class="hud-breadcrumb-current">{{ $page_data->page_title }}</span>
        </div>
    </div>
</div>

<!-- Page Content -->
<section class="legal-section">
    <div class="container">
        <div class="legal-content-card">
            <div class="legal-prose">
                {!! $page_data->page_desc !!}
            </div>
        </div>
    </div>
</section>

@endsection
