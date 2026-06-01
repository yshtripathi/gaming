@extends('frontend.layouts.main')

@if(isset($category->title) && $category->title)
    @section('title', $category->title)
    @section('description', $category->summary)
@else
    @section('title', 'All Game Category List')
    @section('description', 'All Game Category List')
@endif

@push('styles')
<style>
/* Product List Page Hero Banner */
.product-hero-banner {
    position: relative;
    min-height: 450px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background: var(--ws-bg-dark);
    margin-top: 80px;
}

.product-hero-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: url('{{ isset($catphoto) ? env("WEBSITE_URL") ."/". $catphoto : url("assets/media/blogs/bd-1.png") }}');
    background-size: cover;
    background-position: center;
    opacity: 0.5;
}

.product-hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(180deg, rgba(15, 15, 35, 0.7) 0%, rgba(15, 15, 35, 0.95) 100%);
}

.product-hero-particles {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    overflow: hidden;
}

.product-particle {
    position: absolute;
    width: 4px;
    height: 4px;
    background: var(--ws-primary-light);
    border-radius: 50%;
    opacity: 0.5;
    animation: float-product-particle 10s ease-in-out infinite;
}

.product-particle:nth-child(1) { left: 10%; top: 20%; animation-delay: 0s; }
.product-particle:nth-child(2) { left: 20%; top: 80%; animation-delay: 2s; }
.product-particle:nth-child(3) { left: 40%; top: 40%; animation-delay: 4s; }
.product-particle:nth-child(4) { left: 60%; top: 70%; animation-delay: 1s; }
.product-particle:nth-child(5) { left: 80%; top: 30%; animation-delay: 3s; }
.product-particle:nth-child(6) { left: 90%; top: 60%; animation-delay: 5s; }

@keyframes float-product-particle {
    0%, 100% { transform: translateY(0) scale(1); opacity: 0.5; }
    50% { transform: translateY(-40px) scale(1.5); opacity: 1; }
}

.product-hero-content {
    position: relative;
    z-index: 10;
    text-align: center;
    padding: 60px 20px;
}

.product-hero-title {
    font-size: 72px;
    font-weight: 900;
    font-family: 'Chakra Petch', sans-serif !important;
    text-transform: uppercase;
    letter-spacing: 8px;
    margin-bottom: 20px;
    background: linear-gradient(135deg, var(--ws-text-primary) 0%, var(--ws-primary-light) 50%, var(--ws-accent-light) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    filter: drop-shadow(0 0 40px rgba(124, 58, 237, 0.6));
    animation: title-glow 3s ease-in-out infinite;
}

@keyframes title-glow {
    0%, 100% { filter: drop-shadow(0 0 40px rgba(124, 58, 237, 0.6)); }
    50% { filter: drop-shadow(0 0 60px rgba(124, 58, 237, 0.9)); }
}

.product-hero-subtitle {
    font-size: 18px;
    color: var(--ws-text-muted);
    margin-bottom: 30px;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.product-hero-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: linear-gradient(135deg, var(--ws-primary), var(--ws-accent));
    color: white;
    padding: 16px 40px;
    border-radius: 50px;
    font-size: 16px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 0 30px rgba(124, 58, 237, 0.5);
}

.product-hero-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 40px rgba(124, 58, 237, 0.7);
    color: white;
}

/* Category Filter Pills */
.category-filter-bar {
    background: rgba(26, 26, 46, 0.95);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid var(--ws-border-light);
    padding: 16px 0;
    position: sticky;
    top: 80px;
    z-index: 100;
}

.category-pills {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
    justify-content: center;
}

.category-pill {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: transparent;
    border: 2px solid var(--ws-border-light);
    color: var(--ws-text-muted);
    padding: 10px 24px;
    border-radius: 50px;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    cursor: pointer;
}

.category-pill:hover,
.category-pill.active {
    background: var(--ws-primary);
    border-color: var(--ws-primary);
    color: white;
    box-shadow: 0 0 20px rgba(124, 58, 237, 0.5);
}

/* Product Grid Section */
.product-grid-section {
    padding: 60px 0;
    background: var(--ws-bg-dark);
}

.product-grid-header {
    text-align: center;
    margin-bottom: 50px;
}

.product-grid-header h2 {
    font-size: 36px;
    font-weight: 700;
    margin-bottom: 16px;
    color: var(--ws-text-primary) !important;
}

.product-grid-header p {
    color: var(--ws-text-muted);
    font-size: 16px;
}

/* Product Cards Grid */
.products-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

@media (max-width: 1200px) {
    .products-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .products-grid {
        grid-template-columns: 1fr;
    }
    
    .product-hero-title {
        font-size: 42px;
        letter-spacing: 4px;
    }
    
    .category-pills {
        justify-content: flex-start;
        overflow-x: auto;
        flex-wrap: nowrap;
        padding-bottom: 10px;
    }
    
    .category-pill {
        white-space: nowrap;
    }
}

/* Product Card */
.product-card-new {
    background: var(--ws-bg-card);
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid var(--ws-border-light);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    cursor: pointer;
}

.product-card-new:hover {
    transform: translateY(-10px) scale(1.02);
    border-color: var(--ws-primary);
    box-shadow: 
        0 20px 40px rgba(0, 0, 0, 0.4),
        0 0 30px rgba(124, 58, 237, 0.3);
}

.product-card-image {
    position: relative;
    width: 100%;
    aspect-ratio: 16/10;
    overflow: hidden;
}

.product-card-image-link {
    display: block;
    width: 100%;
    height: 100%;
}

.product-card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.product-card-new:hover .product-card-image img {
    transform: scale(1.1);
}

.product-card-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(15, 15, 35, 0.9) 0%, transparent 60%);
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.product-card-new:hover .product-card-overlay {
    opacity: 1;
}

.product-card-play {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--ws-primary), var(--ws-accent));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transform: scale(0);
    transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.product-card-new:hover .product-card-play {
    transform: scale(1);
}

.product-card-play svg {
    width: 24px;
    height: 24px;
    color: white;
    margin-left: 4px;
}

.product-card-body {
    padding: 24px;
}

.product-card-title {
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 12px;
    color: var(--ws-text-primary) !important;
    line-height: 1.3;
}

.product-card-features {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 20px;
}

.product-card-feature {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 12px;
    color: var(--ws-text-muted);
    background: rgba(124, 58, 237, 0.1);
    padding: 4px 10px;
    border-radius: 20px;
    border: 1px solid rgba(124, 58, 237, 0.2);
}

.product-card-feature svg {
    width: 12px;
    height: 12px;
    color: var(--ws-primary-light);
}

.product-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 16px;
    border-top: 1px solid var(--ws-border-light);
}

.product-card-price {
    display: flex;
    flex-direction: column;
}

.product-card-price-label {
    font-size: 12px;
    color: var(--ws-text-muted);
    text-transform: uppercase;
}

.product-card-price-value {
    font-size: 24px;
    font-weight: 700;
    color: var(--ws-primary-light) !important;
}

.product-card-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(135deg, var(--ws-primary), var(--ws-primary-dark));
    color: white;
    padding: 12px 20px;
    border-radius: 12px;
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
    text-decoration: none;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
}

.product-card-btn:hover {
    background: linear-gradient(135deg, var(--ws-accent), var(--ws-primary));
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(124, 58, 237, 0.4);
    color: white;
}

.product-card-btn svg {
    width: 16px;
    height: 16px;
}

/* No Products State */
.no-products {
    text-align: center;
    padding: 80px 20px;
}

.no-products-icon {
    width: 100px;
    height: 100px;
    background: rgba(124, 58, 237, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 24px;
}

.no-products-icon svg {
    width: 50px;
    height: 50px;
    color: var(--ws-primary);
}

.no-products h3 {
    font-size: 24px;
    color: var(--ws-text-primary) !important;
    margin-bottom: 12px;
}

.no-products p {
    color: var(--ws-text-muted);
}

/* View All Button */
.view-all-container {
    text-align: center;
    margin-top: 50px;
}

.view-all-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: transparent;
    border: 2px solid var(--ws-primary);
    color: var(--ws-primary-light);
    padding: 14px 40px;
    border-radius: 50px;
    font-size: 15px;
    font-weight: 600;
    text-transform: uppercase;
    text-decoration: none;
    transition: all 0.3s ease;
}

.view-all-btn:hover {
    background: var(--ws-primary);
    color: white;
    box-shadow: 0 0 30px rgba(124, 58, 237, 0.5);
}

.view-all-btn svg {
    width: 20px;
    height: 20px;
    transition: transform 0.3s ease;
}

.view-all-btn:hover svg {
    transform: translateX(5px);
}
</style>
@endpush

@section('main-content')
<!-- Product Hero Banner -->
<div class="product-hero-banner">
    <div class="product-hero-bg"></div>
    <div class="product-hero-overlay"></div>
    <div class="container">
        <div class="product-hero-content">
            <h1 class="product-hero-title">
                @if(isset($category->title) && $category->title)
                    {{ $category->title }}
                @else
                    All Games
                @endif
            </h1>
            <p class="product-hero-subtitle">
                @if(isset($category->summary) && $category->summary)
                    {{ $category->summary }}
                @else
                    {{ __('common.browse_services') }}
                @endif
            </p>
            <!-- <a href="#products" class="product-hero-btn">
                {{ __('common.quick_start') }}
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20">
                    <path d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
            </a> -->
        </div>
    </div>
</div>

<!-- Category Filter Bar -->
@php
    // Generate unique sub-categories from product titles
    $uniqueProducts = collect($products)->map(function($product) use ($category) {
        $title = $product->title;
        // Remove category name prefix if present
        if (isset($category->title) && strpos($title, $category->title . ' - ') === 0) {
            $title = Str::remove($category->title . ' - ', $title);
        }
        return $title;
    })->unique()->values();
@endphp

<!-- Product Grid Section -->
<section class="product-grid-section" id="products">
    <div class="container">
        <div class="product-grid-header">
            <h2>{{ __('common.services') }}</h2>
            <!-- <p>{{ __('common.browse_services') }}</p> -->
        </div>
        
        @if(count($products))
            <div class="product-catalog-layout">
                <aside class="category-filter-bar">
                    <div class="category-pills">
                        <a href="#" class="category-pill active" data-filter="all">
                            <span>01</span>
                            {{ __('common.all_packs') }}
                        </a>
                        @foreach($uniqueProducts as $index => $productName)
                            <a href="#" class="category-pill" data-filter="tab-{{ $index }}">
                                <span>{{ str_pad($index + 2, 2, '0', STR_PAD_LEFT) }}</span>
                                {{ $productName }}
                            </a>
                        @endforeach
                    </div>
                </aside>

                <div class="products-grid">
                    @foreach($products as $index => $product)
                        @php
                            $productSlug = Str::remove($category->title . ' - ', $product->title);
                            $filterClass = 'tab-' . $uniqueProducts->search($productSlug);
                            if ($filterClass === 'tab-') {
                                $filterClass = 'tab-' . $index;
                            }
                        @endphp
                        <div class="product-card-new" data-category="{{ $filterClass }}">
                            <div class="product-card-image">
                                @php 
                                    $photo = isset($product->photo) ? explode(',', $product->photo) : ['assets/media/blogs/bd-1.png'];
                                @endphp
                                <a href="{{ route('product-detail', $product->slug) }}" class="product-card-image-link">
                                    <img src="{{ asset($photo[0]) }}" alt="{{ $product->title }}">
                                    <div class="product-card-overlay">
                                        <div class="product-card-play">
                                            <span>{{ __('common.explore') }}</span>
                                            <i class="fal fa-arrow-right"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="product-card-body">
                                <h3 class="product-card-title">{{ $product->title }}</h3>
                                <!-- <div class="product-card-features">
                                    <span class="product-card-feature">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <polyline points="20 6 9 17 4 12"/>
                                        </svg>
                                        {{ __('common.guaranteed_drop') }}
                                    </span>
                                    <span class="product-card-feature">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                                        </svg>
                                        {{ __('common.all_difficulties') }}
                                    </span>
                                    <span class="product-card-feature">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <circle cx="12" cy="12" r="10"/>
                                            <path d="M12 6v6l4 2"/>
                                        </svg>
                                        {{ __('common.fast_completion') }}
                                    </span>
                                </div> -->
                                <div class="product-card-footer">
                                    <div class="product-card-price">
                                        <span class="product-card-price-label">{{ __('common.points') }}</span>
                                        <span class="product-card-price-value">{{ number_format(Helper::getProductPriceByCurrency('USD', $product), 0) }}</span>
                                    </div>
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
                    @endforeach
                </div>
            </div>
            
            @if(count($products) >= 6)
                <div class="view-all-container">
                    <a href="#" class="view-all-btn">
                        View All Services
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            @endif
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
document.addEventListener('DOMContentLoaded', function() {
    const pills = document.querySelectorAll('.category-pill');
    const cards = document.querySelectorAll('.product-card-new');

    pills.forEach(pill => {
        pill.addEventListener('click', function(e) {
            e.preventDefault();

            // Remove active class from all pills
            pills.forEach(p => p.classList.remove('active'));
            // Add active class to clicked pill
            this.classList.add('active');

            const filter = this.getAttribute('data-filter');

            cards.forEach(card => {
                if (filter === 'all') {
                    card.style.display = 'block';
                    card.style.animation = 'fadeIn 0.4s ease forwards';
                } else {
                    const cardCategory = card.getAttribute('data-category');
                    if (cardCategory === filter) {
                        card.style.display = 'block';
                        card.style.animation = 'fadeIn 0.4s ease forwards';
                    } else {
                        card.style.display = 'none';
                    }
                }
            });
        });
    });
});

// Add fadeIn animation
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
`;
document.head.appendChild(style);
</script>
@endpush

@endsection
