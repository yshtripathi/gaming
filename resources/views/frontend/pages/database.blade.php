
@extends('frontend.layouts.main')
@section('title', 'Database')
@push('styles')
<style>
/* Database Page Hero Banner - Gaming Theme */
.db-hero-banner {
    position: relative;
    min-height: 400px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background: var(--ws-bg-dark);
    margin-top: 80px;
}

.db-hero-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('../media/blogs/bd-1.png') center/cover no-repeat;
    opacity: 0.25;
}

.db-hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(124, 58, 237, 0.3) 0%, rgba(15, 15, 35, 0.9) 50%, rgba(124, 58, 237, 0.2) 100%);
}

.db-hero-content {
    position: relative;
    z-index: 10;
    text-align: center;
    padding: 60px 20px;
}

.db-hero-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--ws-primary), var(--ws-accent));
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 24px;
    box-shadow: 0 0 40px rgba(124, 58, 237, 0.5);
    animation: pulse-glow-db 2s ease-in-out infinite;
}

@keyframes pulse-glow-db {
    0%, 100% { 
        box-shadow: 0 0 40px rgba(124, 58, 237, 0.5);
        transform: scale(1);
    }
    50% { 
        box-shadow: 0 0 60px rgba(124, 58, 237, 0.8), 0 0 80px rgba(244, 63, 94, 0.4);
        transform: scale(1.05);
    }
}

.db-hero-icon svg {
    width: 40px;
    height: 40px;
    color: white;
}

.db-hero-title {
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

.db-hero-subtitle {
    font-size: 18px;
    color: var(--ws-text-muted);
    margin-bottom: 30px;
    font-weight: 400;
}

.db-hero-breadcrumb {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: rgba(26, 26, 46, 0.8);
    backdrop-filter: blur(10px);
    padding: 12px 24px;
    border-radius: 50px;
    border: 1px solid var(--ws-border-light);
}

.db-hero-breadcrumb a,
.db-hero-breadcrumb span {
    color: var(--ws-text-muted);
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
}

.db-hero-breadcrumb a:hover {
    color: var(--ws-primary-light);
}

.db-hero-breadcrumb span.active {
    color: var(--ws-primary-light);
    font-weight: 600;
}

@media (max-width: 768px) {
    .db-hero-banner {
        min-height: 300px;
        margin-top: 70px;
    }
    .db-hero-title {
        font-size: 36px;
    }
    .db-hero-icon {
        width: 60px;
        height: 60px;
    }
    .db-hero-icon svg {
        width: 30px;
        height: 30px;
    }
}

/* Database Page Content */
.db-detail {
    background: var(--ws-bg-darker);
    padding: 60px 0;
}

.db-detail .gt-shop-section {
    background: var(--ws-bg-dark);
}

/* Database Product Cards - Gaming Theme */
.db-detail .product-card {
    background: var(--ws-bg-card, #1A1F36);
    border: 1px solid var(--ws-border-light, rgba(160, 174, 192, 0.1));
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.3s ease;
}

/* Fix app.css button animation issue - keep gradient after animation */
.db-detail .product-card .cus-btn {
    background: linear-gradient(135deg, var(--ws-primary, #8B5CF6), var(--ws-accent, #f43f5e)) !important;
    border: none;
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    color: white !important;
    clip-path: none !important;
    -webkit-clip-path: none !important;
}

.db-detail .product-card .cus-btn::before {
    display: none !important;
}

.db-detail .product-card .cus-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 0 20px rgba(139, 92, 246, 0.5);
    background: linear-gradient(135deg, var(--ws-primary-dark, #7C3AED), var(--ws-accent, #f43f5e)) !important;
    color: white !important;
}
</style>
@endpush
@section('main-content')

<!-- Database Hero Banner -->
<section class="db-hero-banner">
    <div class="db-hero-bg"></div>
    <div class="db-hero-overlay"></div>
    <div class="db-hero-content">
        <div class="db-hero-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <ellipse cx="12" cy="5" rx="9" ry="3"/>
                <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/>
                <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/>
            </svg>
        </div>
        <h1 class="db-hero-title">{{ __('common.database') }}</h1>
        <p class="db-hero-subtitle">{{ __('common.product') }} Database</p>
        <div class="db-hero-breadcrumb">
            <a href="{{ route('home') }}"><i class="fal fa-home"></i>{{ __('common.home') }}</a>
            <span>/</span>
            <span class="active">{{ __('common.database') }}</span>
        </div>
    </div>
</section>
<div class="page-content">    
  <section class="db-detail pt-5 pb-5" >
    <div class="container">
                 <div class="gt-shop-section">
                        
                             <div class="row g-4 mb-2">
                               @php                        

                          if(isset($_GET['page']))
                          {
                          $page=$_GET['page']*40;
                          $skip=($_GET['page']-1)*40;
                          }
                          else {$page=40;$skip=0;}
                          
                  $products = Helper::getRandomProduct(480);
                          @endphp
                          
                           @if(count($products))
         @foreach($products as $product)

                        <div class="col-xl-4 col-lg-4 col-md-6 ">
                           <div class="product-card mb-30">                                     
                                     <div class="product-uimg mb-2">  
                                        @php 
                                        $photo=explode(',',$product->photo);
                                    @endphp
    <img src="{{ asset($photo[0]) }}" class="w-100 img-fluid"> 
                                       
                                     
  </div>
                               <a href="{{route('product-detail', $product->slug)}}"><h4 class="mb-12">{{$product->title}}  </h4></a>
                                        <div class="bottom-row">
    <p> {{ Str::limit($product->summary,120) }} </p>
                                            <div class="price">
                                                <h4> {{ $product->getCurrencySymbol() }} 
      {{number_format($product->price, session('currency')=='JPY' ? 0 : 2)}}                                                
                                                </h4>
                                            </div>
                                           
                                          
                                          <form action="{{route('single-add-to-cart')}}" method="POST">
                                          @csrf
                                          <input type="hidden" name="quant[1]" class="qty-input"  data-min="1" data-max="1000" value="1" id="quantity">
                                          <input type="hidden" name="slug" value="{{$product->slug}}">
<button name='submit' class="cus-btn primary">{{ __('common.add_to_cart') }}<i class="fal fa-shopping-cart"></i></button>
                                    </form>
                                        </div>
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