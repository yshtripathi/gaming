
@extends('frontend.layouts.main')
@section('title', 'Categories of '.Request::route('slug').' :: '.env('APP_NAME'))
@push('styles')
<style>
/* Cat List Page Hero Banner - Gaming Theme */
.cat-hero-banner {
    position: relative;
    min-height: 400px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background: var(--ws-bg-dark);
    margin-top: 80px;
}

.cat-hero-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('../media/blogs/bd-1.png') center/cover no-repeat;
    opacity: 0.25;
}

.cat-hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(124, 58, 237, 0.3) 0%, rgba(15, 15, 35, 0.9) 50%, rgba(124, 58, 237, 0.2) 100%);
}

.cat-hero-content {
    position: relative;
    z-index: 10;
    text-align: center;
    padding: 60px 20px;
}

.cat-hero-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--ws-primary), var(--ws-accent));
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 24px;
    box-shadow: 0 0 40px rgba(124, 58, 237, 0.5);
    animation: pulse-glow-cat 2s ease-in-out infinite;
}

@keyframes pulse-glow-cat {
    0%, 100% { 
        box-shadow: 0 0 40px rgba(124, 58, 237, 0.5);
        transform: scale(1);
    }
    50% { 
        box-shadow: 0 0 60px rgba(124, 58, 237, 0.8), 0 0 80px rgba(244, 63, 94, 0.4);
        transform: scale(1.05);
    }
}

.cat-hero-icon svg {
    width: 40px;
    height: 40px;
    color: white;
}

.cat-hero-title {
    font-size: 56px;
    font-weight: 800;
    font-family: 'Chakra Petch', sans-serif !important;
    text-transform: uppercase;
    letter-spacing: 4px;
    margin-bottom: 12px;
    background: linear-gradient(135deg, var(--ws-text-primary) 0%, var(--ws-primary-light) 50%, var(--ws-accent-light) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    filter: drop-shadow(0 0 30px rgba(124, 58, 237, 0.5));
}

.cat-hero-subtitle {
    font-size: 18px;
    color: var(--ws-text-muted);
    margin-bottom: 30px;
    font-weight: 400;
}

.cat-hero-breadcrumb {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: rgba(26, 26, 46, 0.8);
    backdrop-filter: blur(10px);
    padding: 12px 24px;
    border-radius: 50px;
    border: 1px solid var(--ws-border-light);
}

.cat-hero-breadcrumb a,
.cat-hero-breadcrumb span {
    color: var(--ws-text-muted);
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
}

.cat-hero-breadcrumb a:hover {
    color: var(--ws-primary-light);
}

.cat-hero-breadcrumb span.active {
    color: var(--ws-primary-light);
    font-weight: 600;
}

@media (max-width: 768px) {
    .cat-hero-banner {
        min-height: 300px;
        margin-top: 70px;
    }
    .cat-hero-title {
        font-size: 36px;
    }
    .cat-hero-icon {
        width: 60px;
        height: 60px;
    }
    .cat-hero-icon svg {
        width: 30px;
        height: 30px;
    }
}

/* Cat List Page Content */
.db-detail {
    background: var(--ws-bg-darker);
    padding: 60px 0;
}

.db-detail .gt-shop-section {
    background: var(--ws-bg-dark);
}

/* Category Cards - Gaming Theme */
.db-detail .product-card {
    background: var(--ws-bg-card, #1A1F36);
    border: 1px solid var(--ws-border-light, rgba(160, 174, 192, 0.1));
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.3s ease;
    padding-bottom: 16px;
}

.db-detail .product-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(139, 92, 246, 0.2);
    border-color: var(--ws-primary, #8B5CF6);
}

.db-detail .product-card a {
    display: block;
    overflow: hidden;
    border-radius: 12px;
}

.db-detail .product-card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.db-detail .product-card:hover img {
    transform: scale(1.1);
}

.db-detail .product-card h4 {
    margin-top: 16px;
    text-align: center;
    font-family: 'Chakra Petch', sans-serif;
    color: var(--ws-text-primary, white) !important;
    font-size: 16px;
    padding: 0 12px;
}

.db-detail .product-card h4 a {
    color: var(--ws-text-primary, white) !important;
    text-decoration: none;
    transition: color 0.3s ease;
}

.db-detail .product-card h4 a:hover {
    color: var(--ws-primary, #8B5CF6) !important;
}
</style>
@endpush
@section('main-content')

<!-- Cat List Hero Banner -->
<section class="cat-hero-banner">
    <div class="cat-hero-bg"></div>
    <div class="cat-hero-overlay"></div>
    <div class="cat-hero-content">
        <div class="cat-hero-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="7" height="7"/>
                <rect x="14" y="3" width="7" height="7"/>
                <rect x="14" y="14" width="7" height="7"/>
                <rect x="3" y="14" width="7" height="7"/>
            </svg>
        </div>
        <h1 class="cat-hero-title">{{ Request::route('slug') }}</h1>
        <p class="cat-hero-subtitle">{{ __('common.products_details') }}</p>
        <div class="cat-hero-breadcrumb">
            <a href="{{ route('home') }}"><i class="fal fa-home"></i>{{ __('common.home') }}</a>
            <span>/</span>
            <span class="active">{{ Request::route('slug') }}</span>
        </div>
    </div>
</section>

<div class="page-content">
    <section class="db-detail pt-5 pb-5">
        <div class="container">
            <div class="gt-shop-section">
                <div class="row g-4 mb-2">
                               @php                        

                          if(isset($_GET['page']))
                          {
                          $page=$_GET['page']*25;
                          $skip=($_GET['page']-1)*25;
                          }
                          else {$page=25;$skip=0;}
                          
                  $products = Helper::getRandomProduct(101);
                          @endphp
                          
                                 
                                      @php
                    $categories = Helper::productCategoryList('All');
                                $take=20;$skip=0;
                               $catname=  Request::route('slug');
if($catname == 'action-rpgs') {
    $take = 5; $skip = 0;
} else if($catname == 'esports') {
    $take = 5; $skip = 5;
} else if($catname == 'sandbox') {
    $take = 5; $skip = 10;
} else if($catname == 'strategy') {
    $take = 20; $skip = 15;
}
 else {
    $take = 5; $skip = 0;
}

                                        @endphp
                               
                           @if(count($categories))
                     @foreach($categories->skip($skip)->take($take)->where('status','active') as $cat_info)

                        <div class="col-xl-4 col-lg-4 col-md-6 ">
                           <div class="product-card pb-2">   
                            <a href="{{route('product-cat',$cat_info->slug)}}">       
                               <img src="{{url($cat_info->photo)}}">
                              </a>           
                                <h4 class="text-center"><a href="{{route('product-cat',$cat_info->slug)}}">{{$cat_info->title}}</a>  </h4>
                               </div>              
                         </div>
                       @endforeach
                    @else
                        <h4 class="text-warning" style="margin:100px auto;">{{ __('common.there_are_no_products') }}</h4>
                    @endif    
                     </div>
                     <!-- end row section -->
                            
                     </div>
                      </div>
                      </section>
</div>

@endsection