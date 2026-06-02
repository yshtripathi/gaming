@extends('frontend.layouts.main')

@php
    if (request()->routeIs('product-lists')) {
        $category = null;
    }

    if (isset($category)) {
        if (is_object($category) && method_exists($category, 'first')) {
            $category = $category->first();
        }
        if (!is_object($category) || !isset($category->title)) {
            $category = null;
        }
    }
@endphp

@if(isset($category->title) && $category->title)
    @section('title', $category->title)
    @section('description', $category->summary)
@else
    @section('title', 'Games Offered')
    @section('description', 'Games Offered')
@endif

@push('styles')
<style>
/* Product Grid Page - Light themed HUD Styling */
.product-grid-section {
    padding: 64px 0 96px !important;
    background: transparent !important;
}

.product-grid-header {
    margin-bottom: 32px !important;
    border-left: 3px solid #6d7f00 !important;
    padding-left: 16px !important;
}

.product-grid-header h2 {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 32px !important;
    font-weight: 900 !important;
    color: #0b0d10 !important;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin: 0;
}

/* Catalog Sidebar and Pills Adjustments */
.product-catalog-layout .category-filter-bar {
    background: #ffffff !important;
    border: 1px solid rgba(8, 10, 12, 0.08) !important;
    box-shadow: 0 15px 45px rgba(8, 10, 12, 0.03) !important;
    backdrop-filter: none !important;
}

.product-catalog-layout .category-pill {
    background: #f6f7f2 !important;
    border: 1px solid rgba(8, 10, 12, 0.06) !important;
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
}

.product-catalog-layout .category-pill:hover,
.product-catalog-layout .category-pill.active {
    background: #0b0d10 !important;
    border-color: #0b0d10 !important;
    color: #ffffff !important;
    box-shadow: 0 10px 25px rgba(8, 10, 12, 0.15) !important;
}

/* Premium Product Card Redesign */
.product-card-new {
    background: #ffffff !important;
    border: 1px solid rgba(8, 10, 12, 0.07) !important;
    border-radius: 20px !important;
    box-shadow: 0 10px 30px rgba(8, 10, 12, 0.02) !important;
    overflow: hidden;
    transition: all 0.35s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.product-card-new:hover {
    transform: translateY(-6px) !important;
    border-color: #6d7f00 !important;
    box-shadow: 
        0 20px 40px rgba(8, 10, 12, 0.05),
        0 0 20px rgba(223, 255, 0, 0.12) !important;
}

.product-card-image {
    position: relative;
    width: 100%;
    aspect-ratio: 16/10;
    overflow: hidden;
    background: #f6f7f2;
}

.product-card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
}

.product-card-new:hover .product-card-image img {
    transform: scale(1.06) !important;
}

.product-card-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, transparent 40%, rgba(8, 10, 12, 0.72) 100%) !important;
    display: flex;
    align-items: flex-end;
    justify-content: flex-start;
    padding: 16px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.product-card-new:hover .product-card-overlay {
    opacity: 1 !important;
}

.product-card-play {
    display: inline-flex !important;
    align-items: center !important;
    gap: 8px !important;
    background: #dfff00 !important;
    color: #0b0d10 !important;
    padding: 8px 18px !important;
    border-radius: 999px !important;
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 11.5px !important;
    font-weight: 800 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 15px rgba(223, 255, 0, 0.25) !important;
}

.product-card-body {
    padding: 22px !important;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}

.product-card-title {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 17.5px !important;
    font-weight: 800 !important;
    color: #0b0d10 !important;
    margin: 0 0 16px 0 !important;
    line-height: 1.35 !important;
    height: 48px;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.product-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 18px !important;
    border-top: 1px solid rgba(8, 10, 12, 0.05) !important;
    margin-top: auto;
}

.product-card-price {
    display: flex;
    flex-direction: column;
}

.product-card-price-label {
    font-size: 10px !important;
    font-weight: 700;
    color: rgba(8, 10, 12, 0.45) !important;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.product-card-price-value {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 20px !important;
    font-weight: 900 !important;
    color: #0b0d10 !important;
    line-height: 1.1;
    margin-top: 2px;
}

.product-card-btn {
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 8px !important;
    background: #0b0d10 !important;
    border: 1px solid rgba(8, 10, 12, 0.1) !important;
    border-radius: 12px !important;
    color: #dfff00 !important;
    padding: 10px 18px !important;
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 12.5px !important;
    font-weight: 800 !important;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(8, 10, 12, 0.05) !important;
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
}

.product-card-btn:hover {
    background: #dfff00 !important;
    color: #0b0d10 !important;
    border-color: #dfff00 !important;
    box-shadow: 0 8px 20px rgba(223, 255, 0, 0.25) !important;
    transform: translateY(-1px) !important;
}

.product-card-btn svg {
    width: 14px !important;
    height: 14px !important;
    stroke: currentColor !important;
}

/* View All and empty states styling */
.view-all-container {
    margin-top: 48px;
}

.view-all-btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: #0b0d10 !important;
    border: 1px solid rgba(8, 10, 12, 0.1) !important;
    color: #dfff00 !important;
    padding: 14px 36px !important;
    border-radius: 999px !important;
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 14px !important;
    font-weight: 800 !important;
    text-transform: uppercase;
    letter-spacing: 1px;
    box-shadow: 0 10px 25px rgba(8, 10, 12, 0.1) !important;
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
}

.view-all-btn:hover {
    background: #dfff00 !important;
    color: #0b0d10 !important;
    border-color: #dfff00 !important;
    box-shadow: 0 12px 30px rgba(223, 255, 0, 0.3) !important;
    transform: translateY(-2px) !important;
}

.view-all-btn svg {
    width: 18px !important;
    height: 18px !important;
    stroke: currentColor !important;
}

.no-products {
    background: #ffffff !important;
    border: 1px solid rgba(8, 10, 12, 0.08) !important;
    border-radius: 20px !important;
    box-shadow: 0 15px 45px rgba(8, 10, 12, 0.03) !important;
    padding: 64px 32px !important;
}

.no-products-icon {
    background: rgba(223, 255, 0, 0.15) !important;
    width: 80px;
    height: 80px;
}

.no-products-icon svg {
    color: #6d7f00 !important;
    width: 40px;
    height: 40px;
}

.no-products h3 {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 22px !important;
    font-weight: 800 !important;
    color: #0b0d10 !important;
    text-transform: uppercase;
}

.no-products p {
    color: rgba(8, 10, 12, 0.5) !important;
    font-size: 14.5px !important;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(12px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Category Spotlight Section */
.category-spotlight-section {
    padding: 64px 0 24px !important;
    background: transparent !important;
}

.category-spotlight-card {
    background: #ffffff !important;
    border: 1px solid rgba(8, 10, 12, 0.08) !important;
    border-radius: 24px !important;
    box-shadow: 0 15px 45px rgba(8, 10, 12, 0.03) !important;
    padding: 48px !important;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 32px;
    position: relative;
}

@media (max-width: 768px) {
    .category-spotlight-card {
        padding: 28px !important;
        gap: 24px;
    }
}

.category-spotlight-media {
    position: relative;
    border-radius: 18px;
    overflow: hidden;
    width: 100%;
    max-width: 680px;
    aspect-ratio: 16/9;
    border: 1px solid rgba(8, 10, 12, 0.08);
    box-shadow: 0 10px 30px rgba(8, 10, 12, 0.05);
}

.category-spotlight-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.category-spotlight-card:hover .category-spotlight-media img {
    transform: scale(1.05);
}

.category-spotlight-content {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.spotlight-title {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 36px !important;
    font-weight: 900 !important;
    color: #0b0d10 !important;
    text-transform: uppercase;
    letter-spacing: -0.5px;
    margin: 0 0 16px 0;
    line-height: 1.15;
    text-align: center;
}

@media (max-width: 768px) {
    .spotlight-title {
        font-size: 28px !important;
    }
}

.spotlight-summary {
    font-size: 16.5px !important;
    line-height: 1.65 !important;
    color: rgba(8, 10, 12, 0.72) !important;
    margin: 0 auto;
    max-width: 760px;
    text-align: center;
}

.product-catalog-layout.no-sidebar-landing {
    grid-template-columns: 1fr !important;
}

/* Premium Responsive 3-Column Horizontal Grid of Smaller Cards */
.product-catalog-layout .products-grid {
    display: grid !important;
    grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
    gap: 24px !important;
    max-width: 100% !important;
    margin: 0 !important;
}

.product-catalog-layout .products-grid.show-all-packs {
    display: grid !important;
    grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
    gap: 24px !important;
    max-width: 100% !important;
    margin: 0 !important;
}

/* Compact Premium Cards */
.product-catalog-layout .product-card-new {
    padding: 20px !important;
    border-radius: 18px !important;
    background: #ffffff !important;
    border: 1px solid rgba(8, 10, 12, 0.07) !important;
    box-shadow: 0 10px 30px rgba(8, 10, 12, 0.02) !important;
    display: flex !important;
    flex-direction: column !important;
    height: 100% !important;
    transition: all 0.35s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
}

.product-catalog-layout .product-card-new:hover {
    transform: translateY(-6px) !important;
    border-color: #6d7f00 !important;
    box-shadow: 
        0 20px 40px rgba(8, 10, 12, 0.05),
        0 0 20px rgba(223, 255, 0, 0.12) !important;
}

.product-catalog-layout .product-card-title {
    font-size: 16px !important;
    font-weight: 800 !important;
    color: #0b0d10 !important;
    margin: 0 0 14px 0 !important;
    line-height: 1.35 !important;
    height: 44px !important;
    overflow: hidden;
    display: -webkit-box !important;
    -webkit-line-clamp: 2 !important;
    -webkit-box-orient: vertical !important;
    text-align: left !important;
}

.product-catalog-layout .product-card-image {
    border-radius: 12px !important;
    overflow: hidden;
    margin: 0 0 16px 0 !important;
    width: 100% !important;
    background: #f6f7f2 !important;
    aspect-ratio: auto !important;
}

.product-catalog-layout .product-card-image img {
    width: 100% !important;
    height: auto !important;
    object-fit: contain !important;
    display: block !important;
}

.product-catalog-layout .product-card-body {
    padding: 0 !important;
    display: flex !important;
    flex-direction: column !important;
    flex-grow: 1 !important;
}

.product-catalog-layout .product-card-summary {
    font-size: 13.5px !important;
    line-height: 1.55 !important;
    color: rgba(8, 10, 12, 0.6) !important;
    margin: 0 0 20px 0 !important;
    white-space: normal !important;
    overflow: hidden !important;
    display: -webkit-box !important;
    -webkit-line-clamp: 3 !important;
    -webkit-box-orient: vertical !important;
    text-align: left !important;
}

.product-catalog-layout .product-card-footer {
    padding-top: 16px !important;
    border-top: 1px solid rgba(8, 10, 12, 0.06) !important;
    margin-top: auto !important;
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
}

/* Explore and Add to Cart Action Buttons */
.product-card-actions {
    display: flex !important;
    align-items: center !important;
    gap: 10px !important;
}

.product-explore-btn {
    display: inline-flex !important;
    align-items: center !important;
    gap: 6px !important;
    background: transparent !important;
    border: 1px solid rgba(8, 10, 12, 0.12) !important;
    border-radius: 10px !important;
    color: #0b0d10 !important;
    padding: 8px 14px !important;
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 11.5px !important;
    font-weight: 800 !important;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    cursor: pointer;
    text-decoration: none !important;
    transition: all 0.3s ease !important;
}

.product-explore-btn:hover {
    background: #0b0d10 !important;
    border-color: #0b0d10 !important;
    color: #dfff00 !important;
}

.product-explore-btn i {
    font-size: 11px !important;
}

.product-card-new.d-none-filtered {
    display: none !important;
}

/* Responsive Grid Adapters */
@media (max-width: 1400px) {
    .product-catalog-layout .products-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
        gap: 20px !important;
    }
}

@media (max-width: 768px) {
    .product-catalog-layout .products-grid {
        grid-template-columns: 1fr !important;
        gap: 16px !important;
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
            @if(isset($category->title) && $category->title)
                {{ $category->title }}
            @else
                Games Offered
            @endif
        </h1>
        
        <div class="about-hud-breadcrumb-capsule animate-fade-in-up delay-1">
            <a href="{{ route('home') }}" class="hud-breadcrumb-link">
                <i class="fas fa-home me-2"></i>{{ __('common.home') }}
            </a>
            <span class="hud-breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
            <span class="hud-breadcrumb-current">
                @if(isset($category->title) && $category->title)
                    {{ $category->title }}
                @else
                    Games Offered
                @endif
            </span>
        </div>
    </div>
</div>

@if(isset($category) && $category)
<section class="category-spotlight-section">
    <div class="container">
        <div class="category-spotlight-card">
            <div class="category-spotlight-media animate-fade-in-up">
                <img src="{{ isset($catphoto) && $catphoto ? asset($catphoto) : (isset($category->photo) && $category->photo ? asset($category->photo) : asset('assets/media/blogs/bd-1.png')) }}" alt="{{ $category->title }}">
            </div>
            <div class="category-spotlight-content animate-fade-in-up delay-1">
                <h2 class="spotlight-title">{{ $category->title }}</h2>
                @if($category->summary)
                    <p class="spotlight-summary">{{ $category->summary }}</p>
                @endif
            </div>
        </div>
    </div>
</section>
@endif

<!-- Product Grid Section -->
<section class="product-grid-section" id="products">
    <div class="container">
        <div class="product-grid-header">
            <h2>
                @if(isset($category->title) && $category->title)
                    {{ __('common.services') }}
                @else
                    Games Offered
                @endif
            </h2>
            <!-- <p>{{ __('common.browse_services') }}</p> -->
        </div>
        
        @if((!isset($category) || !$category) || count($products))
            @php
                $allCategories = Helper::productCategoryList("all")->where('is_parent', 1);
            @endphp
            <div class="product-catalog-layout {{ !isset($category) || !$category ? 'no-sidebar-landing' : '' }}">
                @if(isset($category) && $category)
                    <aside class="category-filter-bar">
                        <div class="category-pills">
                            <a href="{{ route('product-lists') }}" class="category-pill {{ !isset($category) || !$category ? 'active' : '' }}">
                                <span>01</span>
                                {{ __('common.all_packs') }}
                            </a>
                            @foreach($allCategories as $index => $cat)
                                @php
                                    $isActive = isset($category) && $category && $category->id === $cat->id;
                                @endphp
                                <a href="{{ route('product-cat', $cat->slug) }}" class="category-pill {{ $isActive ? 'active' : '' }}">
                                    <span>{{ str_pad($index + 2, 2, '0', STR_PAD_LEFT) }}</span>
                                    {{ $cat->title }}
                                </a>
                            @endforeach
                        </div>
                    </aside>
                @endif

                <div class="products-grid">
                    @if(!isset($category) || !$category)
                        <!-- Main Catalog Landing Page: Show all Games (Categories) -->
                        @foreach($allCategories as $cat)
                            @php
                                $catPhoto = 'assets/media/blogs/bd-1.png';
                                if (!empty($cat->photo)) {
                                    if (filter_var($cat->photo, FILTER_VALIDATE_URL)) {
                                        $catPhoto = $cat->photo;
                                    } else {
                                        $catPhoto = asset($cat->photo);
                                    }
                                }
                            @endphp
                            <div class="product-card-new">
                                <h3 class="product-card-title">{{ $cat->title }}</h3>
                                
                                <div class="product-card-image">
                                    <a href="{{ route('product-cat', $cat->slug) }}" class="product-card-image-link">
                                        <img src="{{ $catPhoto }}" alt="{{ $cat->title }}">
                                    </a>
                                </div>
                                
                                <div class="product-card-body">
                                    <div class="category-services-count mb-2" style="font-size: 12px !important; color: #6d7f00 !important; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; text-align: left;">
                                        {{ Helper::productCountByCategory($cat->id) }} {{ __('common.services') }}
                                    </div>
                                    
                                    @if($cat->summary)
                                        <p class="product-card-summary" style="margin-bottom: 20px !important;">{{ $cat->summary }}</p>
                                    @endif
                                    
                                    <div class="product-card-footer" style="padding-top: 16px !important; border-top: 1px solid rgba(8, 10, 12, 0.06) !important; margin-top: auto !important; display: flex !important; align-items: center !important; justify-content: flex-end !important;">
                                        <a href="{{ route('product-cat', $cat->slug) }}" class="product-explore-btn">
                                            {{ __('common.explore') }}
                                            <i class="fal fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Specific Category Catalog: Show products inside this Category -->
                        @foreach($products as $product)
                            <div class="product-card-new">
                                <h3 class="product-card-title">{{ $product->title }}</h3>
                                
                                <div class="product-card-image">
                                    @php 
                                        $photo = isset($product->photo) ? explode(',', $product->photo) : ['assets/media/blogs/bd-1.png'];
                                    @endphp
                                    <a href="{{ route('product-detail', $product->slug) }}" class="product-card-image-link">
                                        <img src="{{ asset($photo[0]) }}" alt="{{ $product->title }}">
                                    </a>
                                </div>
                                
                                <div class="product-card-body">
                                    @if($product->summary)
                                        <p class="product-card-summary">{{ $product->summary }}</p>
                                    @endif
                                    
                                    <div class="product-card-footer">
                                        <div class="product-card-price">
                                            <span class="product-card-price-label">{{ __('common.points') }}</span>
                                            <span class="product-card-price-value">{{ number_format(Helper::getProductPriceByCurrency('USD', $product), 0) }}</span>
                                        </div>
                                        <div class="product-card-actions">
                                            <a href="{{ route('product-detail', $product->slug) }}" class="product-explore-btn">
                                                {{ __('common.explore') }}
                                                <i class="fal fa-arrow-right"></i>
                                            </a>
                                            <form action="{{route('single-add-to-cart')}}" method="POST" class="m-0">
                                                @csrf
                                                <input type="hidden" name="quant[1]" class="qty-input" value="1">
                                                <input type="hidden" name="slug" value="{{$product->slug}}">
                                                <button type="submit" class="product-card-btn">
                                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        <circle cx="9" cy="21" r="1"/>
                                                        <circle cx="20" cy="21" r="1"/>
                                                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                                                    </svg>
                                                    {{ __('common.add_to_cart') }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

        @else
            <div class="no-products">
                <div class="no-products-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M16 16s-1.5-2-4-2-4 2-4 2"/>
                        <line x1="9" y1="9" x2="9.01" y2="9"/>
                        <line x1="15" y1="9" x2="15.01" y2="9"/>
                    </svg>
                </div>
                <h3>{{ __('common.there_are_no_products') }}</h3>
                <p>Check back soon for new services!</p>
            </div>
        @endif
    </div>
</section>

@push('scripts')
<script>
// Compact and premium page setup
</script>
@endpush

@endsection
