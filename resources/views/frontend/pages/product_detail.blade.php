@extends('frontend.layouts.main')
@section('title', $product_detail->title)
@section('description', $product_detail->summary)

@push('styles')
<style>
/* Premium Gaming HUD Product Detail Styles */
.pg-product-detail-page {
    padding: 64px 0 96px;
    background: transparent;
}

.pg-product-breadcrumb {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 32px;
    font-family: 'Chakra Petch', sans-serif;
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.pg-product-breadcrumb a {
    color: rgba(11, 13, 16, 0.6);
    text-decoration: none;
    transition: color 0.3s;
}

.pg-product-breadcrumb a:hover {
    color: #6d7f00;
}

.pg-product-breadcrumb span {
    color: rgba(11, 13, 16, 0.3);
}

.pg-product-layout {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 48px;
    align-items: start;
    margin-bottom: 64px;
}

@media (max-width: 991px) {
    .pg-product-layout {
        grid-template-columns: 1fr;
        gap: 32px;
    }
}

/* Gallery Styling */
.pg-product-gallery {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.pg-product-main-image {
    background: #ffffff;
    border: 1px solid rgba(8, 10, 12, 0.07);
    border-radius: 24px;
    box-shadow: 0 15px 45px rgba(8, 10, 12, 0.02);
    overflow: hidden;
    aspect-ratio: 16/10;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

.pg-product-main-image img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    background: #f6f7f2;
}

.pg-product-thumbs {
    display: flex;
    gap: 12px;
    overflow-x: auto;
    padding: 4px 0 12px 0;
}

.pg-product-thumb {
    width: 84px;
    height: 84px;
    flex-shrink: 0;
    border-radius: 14px;
    border: 2px solid transparent;
    background: #ffffff;
    padding: 3px;
    overflow: hidden;
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(8, 10, 12, 0.02);
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.pg-product-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 9px;
}

.pg-product-thumb:hover,
.pg-product-thumb.active {
    border-color: #6d7f00;
    transform: translateY(-2px) scale(1.04);
}

/* Panel Styling */
.pg-product-panel {
    background: #ffffff;
    border: 1px solid rgba(8, 10, 12, 0.07);
    border-radius: 24px;
    padding: 36px;
    box-shadow: 0 15px 45px rgba(8, 10, 12, 0.02);
    display: flex;
    flex-direction: column;
    gap: 24px;
}

@media (max-width: 576px) {
    .pg-product-panel {
        padding: 24px;
    }
}

.pg-product-kicker {
    align-self: flex-start;
    background: rgba(223, 255, 0, 0.15);
    border: 1px solid rgba(109, 127, 0, 0.15);
    color: #6d7f00;
    padding: 6px 14px;
    border-radius: 999px;
    font-family: 'Chakra Petch', sans-serif;
    font-size: 11px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.pg-product-panel h1 {
    font-family: 'Chakra Petch', sans-serif;
    font-size: 30px;
    font-weight: 900;
    color: #0b0d10;
    margin: 0;
    line-height: 1.2;
    text-transform: uppercase;
}

.pg-product-price {
    display: flex;
    flex-direction: column;
    background: #f6f7f2;
    border-left: 4px solid #6d7f00;
    padding: 16px 20px;
    border-radius: 0 16px 16px 0;
}

.pg-product-price span {
    font-size: 11px;
    font-weight: 700;
    color: rgba(11, 13, 16, 0.45);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.pg-product-price strong {
    font-family: 'Chakra Petch', sans-serif;
    font-size: 32px;
    font-weight: 900;
    color: #0b0d10;
    line-height: 1.1;
    margin-top: 4px;
}

.pg-product-summary {
    font-size: 15px;
    line-height: 1.6;
    color: rgba(11, 13, 16, 0.65);
    margin: 0;
}

/* Cart Button */
.pg-product-cart-btn {
    width: 100%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    background: #0b0d10;
    border: none;
    border-radius: 16px;
    color: #dfff00;
    padding: 18px 24px;
    font-family: 'Chakra Petch', sans-serif;
    font-size: 14.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    cursor: pointer;
    box-shadow: 0 10px 25px rgba(11, 13, 16, 0.1);
    transition: all 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.pg-product-cart-btn:hover {
    background: #dfff00;
    color: #0b0d10;
    box-shadow: 0 15px 30px rgba(223, 255, 0, 0.25);
    transform: translateY(-2px);
}

.pg-product-cart-btn i {
    font-size: 16px;
}

/* Accordion Info Cards */
.pg-product-info-card {
    border: 1px solid rgba(8, 10, 12, 0.07);
    border-radius: 16px;
    overflow: hidden;
    background: #ffffff;
    transition: border-color 0.3s ease;
}

.pg-product-info-card:focus-within,
.pg-product-info-card:hover {
    border-color: rgba(109, 127, 0, 0.25);
}

.pg-product-accordion-toggle {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 18px 24px;
    background: transparent;
    border: none;
    cursor: pointer;
    font-family: 'Chakra Petch', sans-serif;
    font-size: 13.5px;
    font-weight: 800;
    color: #0b0d10;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.pg-product-accordion-toggle i {
    font-size: 14px;
    color: rgba(11, 13, 16, 0.35);
    transition: transform 0.3s ease;
}

.pg-product-accordion-toggle.active i {
    transform: rotate(180deg);
    color: #6d7f00;
}

.pg-product-accordion-panel {
    display: none;
    padding: 0 24px 20px;
    font-size: 14px;
    line-height: 1.6;
    color: rgba(11, 13, 16, 0.6);
}

.pg-product-accordion-panel.active {
    display: block;
}

.pg-product-accordion-panel p {
    margin: 0 0 12px 0;
}

.pg-product-accordion-panel p:last-child {
    margin-bottom: 0;
}

/* Optional Training / Range Slider Styling */
.pg-training-toggle-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    margin-bottom: 16px;
}

.pg-training-toggle-row p {
    font-size: 13px;
    line-height: 1.5;
    color: rgba(11, 13, 16, 0.45);
    margin: 0;
}

.optional-training-toggle {
    position: relative;
    display: inline-block;
    width: 52px;
    height: 28px;
    flex-shrink: 0;
}

.optional-training-toggle input {
    opacity: 0;
    width: 0;
    height: 0;
}

.optional-training-slider {
    position: absolute;
    cursor: pointer;
    inset: 0;
    background-color: rgba(8, 10, 12, 0.08);
    transition: .4s;
    border-radius: 34px;
}

.optional-training-slider:before {
    position: absolute;
    content: "";
    height: 20px;
    width: 20px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    transition: .4s;
    border-radius: 50%;
    box-shadow: 0 2px 8px rgba(8, 10, 12, 0.12);
}

.optional-training-toggle input:checked + .optional-training-slider {
    background-color: #6d7f00;
}

.optional-training-toggle input:checked + .optional-training-slider:before {
    transform: translateX(24px);
}

.training-slider-section {
    background: #f6f7f2;
    border-radius: 14px;
    padding: 18px;
    margin-top: 16px;
    display: flex;
    flex-direction: column;
    gap: 16px;
    transition: all 0.3s ease;
}

.training-slider-section.hidden {
    display: none !important;
}

.training-slider-label {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.training-slider-title {
    font-family: 'Chakra Petch', sans-serif;
    font-size: 11.5px;
    font-weight: 800;
    color: #0b0d10;
    text-transform: uppercase;
}

.training-slider-value {
    font-family: 'Chakra Petch', sans-serif;
    font-size: 13.5px;
    font-weight: 900;
    color: #6d7f00;
    background: #ffffff;
    padding: 4px 10px;
    border-radius: 8px;
    border: 1px solid rgba(109, 127, 0, 0.12);
}

.training-slider-wrapper {
    position: relative;
    padding: 10px 0;
}

.training-slider {
    -webkit-appearance: none;
    width: 100%;
    height: 6px;
    border-radius: 3px;
    background: rgba(8, 10, 12, 0.08);
    outline: none;
}

.training-slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: #0b0d10;
    border: 3px solid #dfff00;
    cursor: pointer;
    box-shadow: 0 4px 10px rgba(11, 13, 16, 0.15);
    transition: transform 0.1s ease;
}

.training-slider::-webkit-slider-thumb:hover {
    transform: scale(1.15);
}

.training-slider-tooltip {
    position: absolute;
    top: -24px;
    transform: translateX(-50%);
    background: #0b0d10;
    color: #dfff00;
    font-family: 'Chakra Petch', sans-serif;
    font-size: 11px;
    font-weight: 800;
    padding: 3px 8px;
    border-radius: 6px;
    pointer-events: none;
    opacity: 0;
    transition: opacity 0.2s ease;
}

.training-slider-wrapper:hover .training-slider-tooltip {
    opacity: 1;
}

.pg-training-price {
    font-family: 'Chakra Petch', sans-serif;
    font-size: 12.5px;
    font-weight: 800;
    color: #0b0d10;
    text-transform: uppercase;
    text-align: right;
}

.pg-training-price span {
    font-size: 16px;
    color: #6d7f00;
    font-weight: 900;
    margin-left: 4px;
}

.pg-product-readmore {
    display: inline-flex;
    align-items: center;
    color: #6d7f00;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    margin-top: 12px;
}

.pg-product-readmore:hover {
    text-decoration: underline;
}

/* Shipping Grid */
.pg-product-shipping-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    border-top: 1px solid rgba(8, 10, 12, 0.05);
    padding-top: 24px;
    margin-top: 8px;
}

.pg-product-shipping-grid div {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    background: #f6f7f2;
    padding: 12px 16px;
    border-radius: 12px;
}

.pg-product-shipping-grid i {
    font-size: 16px;
    color: #6d7f00;
}

.pg-product-shipping-grid span {
    font-size: 12px;
    font-weight: 800;
    color: #0b0d10;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Steps and What you Get section */
.pg-product-detail-bands {
    display: flex;
    flex-direction: column;
    gap: 48px;
    margin-bottom: 64px;
}

.pg-detail-band {
    background: #ffffff;
    border: 1px solid rgba(8, 10, 12, 0.07);
    border-radius: 24px;
    padding: 40px;
    box-shadow: 0 15px 45px rgba(8, 10, 12, 0.02);
}

@media (max-width: 576px) {
    .pg-detail-band {
        padding: 24px;
    }
}

.pg-detail-band h2 {
    font-family: 'Chakra Petch', sans-serif;
    font-size: 22px;
    font-weight: 900;
    color: #0b0d10;
    text-transform: uppercase;
    margin: 0 0 20px 0;
    border-left: 4px solid #6d7f00;
    padding-left: 12px;
}

.pg-detail-band p {
    font-size: 14.5px;
    line-height: 1.7;
    color: rgba(11, 13, 16, 0.6);
    margin: 0;
}

.pg-steps-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 24px;
    margin-top: 28px;
}

@media (max-width: 768px) {
    .pg-steps-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
}

.pg-steps-grid > div {
    background: #f6f7f2;
    border: 1px solid rgba(8, 10, 12, 0.05);
    border-radius: 16px;
    padding: 24px;
    display: flex;
    flex-direction: column;
    gap: 12px;
    position: relative;
    overflow: hidden;
}

.pg-steps-grid strong {
    font-family: 'Chakra Petch', sans-serif;
    font-size: 36px;
    font-weight: 900;
    color: rgba(109, 127, 0, 0.1);
    line-height: 1;
    position: absolute;
    top: 16px;
    right: 20px;
}

.pg-steps-grid span {
    font-family: 'Chakra Petch', sans-serif;
    font-size: 13.5px;
    font-weight: 800;
    color: #0b0d10;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.pg-steps-grid p {
    font-size: 13px;
    line-height: 1.6;
    color: rgba(11, 13, 16, 0.5);
    margin: 0;
}

/* Related Products */
.pg-related-products {
    border-top: 1px solid rgba(8, 10, 12, 0.05);
    padding-top: 48px;
}

.pg-related-products h2 {
    font-family: 'Chakra Petch', sans-serif;
    font-size: 22px;
    font-weight: 900;
    color: #0b0d10;
    text-transform: uppercase;
    margin-bottom: 28px;
    border-left: 4px solid #6d7f00;
    padding-left: 12px;
}

.pg-related-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 24px;
}

@media (max-width: 991px) {
    .pg-related-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }
}

@media (max-width: 576px) {
    .pg-related-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }
}

.pg-related-card {
    background: #ffffff;
    border: 1px solid rgba(8, 10, 12, 0.07);
    border-radius: 18px;
    padding: 16px;
    display: flex;
    flex-direction: column;
    gap: 12px;
    text-decoration: none;
    box-shadow: 0 10px 30px rgba(8, 10, 12, 0.02);
    transition: all 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.pg-related-card:hover {
    transform: translateY(-4px);
    border-color: #6d7f00;
    box-shadow: 0 15px 35px rgba(8, 10, 12, 0.04);
}

.pg-related-card img {
    width: 100%;
    aspect-ratio: 16/10;
    object-fit: cover;
    border-radius: 12px;
    background: #f6f7f2;
}

.pg-related-card span {
    font-family: 'Chakra Petch', sans-serif;
    font-size: 14px;
    font-weight: 800;
    color: #0b0d10;
    line-height: 1.35;
    height: 38px;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.pg-related-card strong {
    font-family: 'Chakra Petch', sans-serif;
    font-size: 15.5px;
    font-weight: 900;
    color: #6d7f00;
}
</style>
@endpush

@section('main-content')
@php
    $photo = array_filter(explode(',', $product_detail->photo));
    $mainPhoto = $photo[0] ?? 'assets/media/blogs/bd-1.png';
    $displayPrice = Helper::getProductPriceByCurrency(session('currency'), $product_detail);
    $relatedProducts = \App\Models\Product::where('cat_id', $product_detail->cat_id)
        ->where('id', '!=', $product_detail->id)
        ->where('status', 'active')
        ->take(4)
        ->get();
@endphp

<div class="about-title-band">
    <!-- HUD Visual Effects -->
    <div class="about-hud-grid"></div>
    <div class="about-hud-glow"></div>
    <div class="about-hud-decor border-t"></div>
    <div class="about-hud-decor border-b"></div>
    
    <div class="container position-relative z-1">
        <h1 class="about-hud-title mb-3 animate-fade-in-up">
            {{ $product_detail->title }}
        </h1>
        
        <div class="about-hud-breadcrumb-capsule animate-fade-in-up delay-1">
            <a href="{{ route('home') }}" class="hud-breadcrumb-link">
                <i class="fas fa-home me-2"></i>{{ __('common.home') }}
            </a>
            @if(isset($product_detail->cat_info) && $product_detail->cat_info)
                @php
                    $categoryTitle = is_array($product_detail->cat_info) ? ($product_detail->cat_info['title'] ?? '') : ($product_detail->cat_info->title ?? '');
                    $categorySlug = is_array($product_detail->cat_info) ? ($product_detail->cat_info['slug'] ?? '') : ($product_detail->cat_info->slug ?? '');
                @endphp
                @if(!empty($categoryTitle) && !empty($categorySlug))
                    <span class="hud-breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
                    <a href="{{ route('product-cat', $categorySlug) }}" class="hud-breadcrumb-link">
                        {{ $categoryTitle }}
                    </a>
                @endif
            @endif
            <span class="hud-breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
            <span class="hud-breadcrumb-current">{{ $product_detail->title }}</span>
        </div>
    </div>
</div>

<section class="pg-product-detail-page">
    <div class="container">

        <div class="pg-product-layout">
            <div class="pg-product-gallery">
                <div class="pg-product-main-image">
                    <img id="pg-product-main-image" src="{{ asset($mainPhoto) }}" alt="{{ $product_detail->title }}">
                </div>

                @if(count($photo) > 1)
                    <div class="pg-product-thumbs">
                        @foreach($photo as $index => $image)
                            <button type="button" class="pg-product-thumb {{ $index === 0 ? 'active' : '' }}" data-image="{{ asset($image) }}">
                                <img src="{{ asset($image) }}" alt="{{ $product_detail->title }}">
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>

            <aside class="pg-product-panel">
                <span class="pg-product-kicker">{{ __('common.product') }}</span>
                <h1>{{ $product_detail->title }}</h1>

                <div class="pg-product-price">
                    <span>{{ __('common.points') }}</span>
                    <strong>{{ number_format($displayPrice, 0) }}</strong>
                </div>

                <p class="pg-product-summary">{{ $product_detail->summary }}</p>

                <form action="{{ route('single-add-to-cart') }}" method="POST" class="pg-product-cart-form">
                    @csrf
                    <input type="hidden" name="quant[1]" class="qty-input" value="1">
                    <input type="hidden" name="slug" value="{{ $product_detail->slug }}">
                    <input type="hidden" name="hours" id="hours-input" value="0">

                    <button type="submit" class="pg-product-cart-btn">
                        {{ __('common.add_to_cart') }}
                        <i class="fal fa-shopping-cart"></i>
                    </button>
                </form>

                <div class="pg-product-info-card">
                    <button type="button" class="pg-product-accordion-toggle active" data-target="pg-description-panel">
                        <span>{{ __('common.description') }}</span>
                        <i class="fal fa-chevron-up"></i>
                    </button>
                    <div class="pg-product-accordion-panel active" id="pg-description-panel">
                        {!! $product_detail->description !!}
                    </div>
                </div>

                <div class="pg-product-info-card">
                    <button type="button" class="pg-product-accordion-toggle" data-target="pg-training-panel">
                        <span>{{ __('common.optional_training_add_on') }}</span>
                        <i class="fal fa-chevron-down"></i>
                    </button>
                    <div class="pg-product-accordion-panel" id="pg-training-panel">
                        <div class="pg-training-toggle-row">
                            <p>{{ __('common.training_subtitle') }}</p>
                            <label class="optional-training-toggle">
                                <input type="checkbox" id="addon">
                                <span class="optional-training-slider"></span>
                            </label>
                        </div>

                        <div class="training-slider-section hidden" id="training-slider-section">
                            <div class="training-slider-label">
                                <span class="training-slider-title">{{ __('common.please_choose_number_of_hours') }}</span>
                                <span class="training-slider-value"><span id="training-hours">0</span> {{ __('common.hours') }}</span>
                            </div>
                            <div class="training-slider-wrapper">
                                <span class="training-slider-tooltip" id="training-tooltip">0</span>
                                <input type="range" min="0" max="10" value="0" class="training-slider" id="training-slider">
                            </div>
                            <div class="pg-training-price">
                                {{ __('common.points') }}: <span id="training-price">0</span>
                            </div>
                        </div>

                        <a href="#training-details" class="pg-product-readmore">{{ __('common.read_more') }}</a>
                    </div>
                </div>

                <div class="pg-product-shipping-grid">
                    <div>
                        <i class="fal fa-bolt"></i>
                        <span>{{ __('common.quick_delivery') }}</span>
                    </div>
                    <div>
                        <i class="fal fa-lock-alt"></i>
                        <span>{{ __('common.secure_process') }}</span>
                    </div>
                </div>
            </aside>
        </div>

        <div class="pg-product-detail-bands" id="training-details">
            <div class="pg-detail-band">
                <h2>{{ __('common.what_you_get') }}</h2>
                <p>{{ __('common.training_intro_1') }}</p>
            </div>
            <div class="pg-detail-band">
                <h2>{{ __('common.how_it_works') }}</h2>
                <div class="pg-steps-grid">
                    <div>
                        <strong>01</strong>
                        <span>{{ __('common.step_1_title') }}</span>
                        <p>{{ __('common.step_1_desc') }}</p>
                    </div>
                    <div>
                        <strong>02</strong>
                        <span>{{ __('common.step_2_title') }}</span>
                        <p>{{ __('common.step_2_desc') }}</p>
                    </div>
                    <div>
                        <strong>03</strong>
                        <span>{{ __('common.step_3_title') }}</span>
                        <p>{{ __('common.step_3_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>

        @if($relatedProducts->count())
            <section class="pg-related-products">
                <h2>{{ __('common.products') }}</h2>
                <div class="pg-related-grid">
                    @foreach($relatedProducts as $related)
                        @php
                            $relatedPhoto = explode(',', $related->photo);
                        @endphp
                        <a href="{{ route('product-detail', $related->slug) }}" class="pg-related-card">
                            <img src="{{ asset($relatedPhoto[0] ?? 'assets/media/blogs/bd-1.png') }}" alt="{{ $related->title }}">
                            <span>{{ $related->title }}</span>
                            <strong>{{ __('common.points') }} {{ number_format(Helper::getProductPriceByCurrency(session('currency'), $related), 0) }}</strong>
                        </a>
                    @endforeach
                </div>
            </section>
        @endif
    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const mainImage = document.getElementById('pg-product-main-image');
    document.querySelectorAll('.pg-product-thumb').forEach(function(button) {
        button.addEventListener('click', function() {
            document.querySelectorAll('.pg-product-thumb').forEach(function(item) {
                item.classList.remove('active');
            });
            this.classList.add('active');
            if (mainImage) {
                mainImage.src = this.getAttribute('data-image');
            }
        });
    });

    document.querySelectorAll('.pg-product-accordion-toggle').forEach(function(button) {
        button.addEventListener('click', function() {
            const target = document.getElementById(this.getAttribute('data-target'));
            if (!target) return;
            const isActive = target.classList.toggle('active');
            this.classList.toggle('active', isActive);
            const icon = this.querySelector('i');
            if (icon) {
                icon.classList.toggle('fa-chevron-up', isActive);
                icon.classList.toggle('fa-chevron-down', !isActive);
            }
        });
    });

    const addonCheckbox = document.getElementById('addon');
    const trainingSliderSection = document.getElementById('training-slider-section');
    
    if (addonCheckbox && trainingSliderSection) {
        addonCheckbox.addEventListener('change', function() {
            trainingSliderSection.classList.toggle('hidden', !this.checked);
        });
    }
    
    const trainingSlider = document.getElementById('training-slider');
    const trainingTooltip = document.getElementById('training-tooltip');
    const trainingHours = document.getElementById('training-hours');
    const trainingPrice = document.getElementById('training-price');
    const hoursInput = document.getElementById('hours-input');
    
    if (trainingSlider) {
        const trainingPricePerHour = 20;
        
        function updateTrainingSlider() {
            const value = parseInt(trainingSlider.value);
            trainingTooltip.textContent = value;
            trainingHours.textContent = value;
            trainingPrice.textContent = value * trainingPricePerHour;
            if (hoursInput) {
                hoursInput.value = value;
            }
            const percent = (value - trainingSlider.min) / (trainingSlider.max - trainingSlider.min);
            trainingTooltip.style.left = (percent * trainingSlider.offsetWidth) + 'px';
        }
        
        trainingSlider.addEventListener('input', updateTrainingSlider);
        updateTrainingSlider();
    }
    
    document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
        anchor.addEventListener('click', function(e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
});
</script>
@endpush
