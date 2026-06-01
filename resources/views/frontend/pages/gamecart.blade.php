@extends('frontend.layouts.main')
@section('title', 'Cart')
@section('main-content')
	<main>
    <!-- Page Header Section -->
    <section class="pageheader-section" >
        <div class="container">
            <div class="section-wrapper text-center text-uppercase">
                <h2 class="pageheader-title">{{ __('common.cart') }}</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">
                                {{ __('common.home') }} <span class="ficon"> / </span>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('common.cart') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!-- Cart Section -->
    <div class="shop-cart padding-top padding-bottom">
        <div class="container">
            <div class="row m-0 section-wrapper">
                 @php
        $points=DB::table('users')->where('id',auth()->user()->id)->pluck('points')->first();
                    
                @endphp
                <p>
       @auth
                    
                    
                    
                    
       <span class="text-end" style="float: right;">{{ __('common.available_credits') }}: <b class="dash-epnt">{{$points}} </b></span>
                    @else
                    @endauth
                    </p>           
                <div class="col-md-9 col-12">
                    <div class="cart-top table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cat-product">{{ __('common.product') }}</th>
                                    <th class="cat-price">{{ __('common.points') }}</th>
                                    <!--<th class="cat-quantity">{{ __('common.quantity') }}</th>-->
                                    <!--<th class="cat-toprice">{{ __('common.avilable') }}</th>-->
                                    <th class="cat-edit">{{ __('common.remove') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(Helper::cartCount())
@foreach(Helper::getAllProductFromCart()->where('order_id',null) as $key => $cart)
   @php $photo = explode(',', $cart->product['photo']);
$product_detail= App\Models\Product::getProductBySlug($cart->product->slug); 
                    
$m=Helper::getProductPriceByCurrency(session('currency'), $cart->product);
                                
                    if(session('currency') == 'HKD') {
        $a=$cart['price']-$product_detail->price_hk;
        $hours=$a/257; $basic=$product_detail->price_hk; 
        $perhour=257;                        
                                    }
                                    elseif(session('currency') == 'JPY') {
        $a=$cart['price']-$product_detail->price_jp;
            $hours=$a/5000; $basic=$product_detail->price_jp;
            $perhour=5000;                    
                                    }
                                   elseif(session('currency') == 'USD') {
        $a=$cart['price']-$product_detail->price;
            $hours=$a/20; $basic=$product_detail->price; 
            $perhour=20;                    
                                    }                             
                         
     $a=$cart['price']-$product_detail->price;
            $hours=$a/20; $basic=$product_detail->price; 
            $perhour=20;                      
                        @endphp                             
                                
                                        <tr>
                                            <td class="product-item cat-product">
                                                <div class="p-thumb">
                                                    
                                                    <a href="{{ route('product-detail',$cart->product->slug) }}"><img src="{{ asset($photo[0]) }}" alt="{{ $cart->product['title'] }}"></a>
                                                    
                                                </div>
                                                <div class="p-content">
                                                    <a href="#">{{ $cart->product['title'] }}</a>
@if($a>0)                   
    <div class="product-hours-group" style="position:relative; background:#29a01e; padding:14px 16px; border-radius:10px; margin-top:12px; display:inline-block; min-width:280px;"><h5 style=" color:#fff;  font-size:18px;  font-weight:700;  margin-bottom:6px; "> {{$hours}} {{ __('common.hours') }} optional training </h5> <a href="{{ route('trainingdelete', $cart->id) }}" style="
    position:absolute;
    top:-8px;
    right:-8px;
    width:24px;
    height:24px;
    border-radius:50%;
    background:#48c72f;
    color:#fff !important;
    text-align:center;
    line-height:24px;
    text-decoration:none;
    font-size:12px;
"><i class="icofont-close"></i></a>  
            <p class="mb-0" style="
    color:#000;
    font-size:18px;
    font-weight:700;
">{{number_format($basic, 0)}} + ( {{$hours}} X  {{number_format($perhour, 0)}} )</p> {{ __('common.total') }} =   {{number_format($cart['price'], 0)}} {{ __('common.points') }}  </div>
@endif                                                      
                                                </div>
                                            </td>
                                            <td class="cat-price" >
                                                
                                         {{number_format($cart['price'], 0)}}         
                                             
                                            </td>
                                            <!--
                                            <td class="cat-quantity" >
                                                <div class="cart-plus-minus">
                                                    <div class="dec qtybutton">-</div>
                                                    <input class="cart-plus-minus-box" type="text" value="{{ $cart->quantity }}" disabled>
                                                    <div class="inc qtybutton">+</div>
                                                </div>
                                            </td>
                                            -->
                                            
                                            <td class="cat-edit">
                                                <a href="{{ route('cart-delete', $cart->id) }}">
                                                   <i class="fal fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                     <tr>
                                    <td><h4 style="text-transform: uppercase;">{{ __('common.total') }} {{ __('common.points') }}:</h4></td>
                                    @php
                                $total_amount = Helper::totalCartPrice();
                            @endphp
                                    <td><h4 style="text-transform: uppercase;">{{number_format($total_amount, 0)}}</h4></td>
                                    <td>
                                        
                                   
                                    </td></tr>
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            {{ __('common.no_cart_available') }}
                                            <a href="{{ route('home') }}" style="color:#97F311;">
                                                {{ __('common.continue_shopping') }}
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Cart Totals -->
                <div class="col-lg-3 col-12">
                  @if(Helper::cartCount())
                    <a href="{{ route('buygame') }}" class="simple-cart-btn m-2">
                {{ __('common.purchase_services') }}
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
@push('styles')
	
@endpush

