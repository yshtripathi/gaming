
@extends('frontend.layouts.main')
@section('main-content')
@section('title', $product_detail->title)
@section('description', $product_detail->summary)
<div class="nk-main">
<!-- START: Breadcrumbs -->
<div class="nk-gap-1"></div>
<div class="container">
   <ul class="nk-breadcrumbs">
      <li><a href="{{route('home')}}">{{ __('common.home') }}</a></li>
      <li><span class="fa fa-angle-right"></span></li>
      <li><a href="">{{ __('common.service') }}</a></li>
      <li><span class="fa fa-angle-right"></span></li>
      <li><a href="">{{$product_detail->title}}</a></li>
      <li><span class="fa fa-angle-right"></span></li>
      <li><span>{{ __('common.product_detail') }}</span></li>
   </ul>
</div>
<div class="nk-gap-1"></div>
<!-- END: Breadcrumbs -->
<div class="product-detail">
   <div class="container">
      <div class="row vertical-gap">
         <div class="col-lg-12 col-12">
            <div class="nk-store-product">
               <div class="row vertical-gap">
                  <div class="col-md-6">
                     <!-- START: Product Photos -->                                  
                     <div class="nk-gallery-item-box">
                           @php 
                                $photo = explode(',', $product_detail->photo);
                            @endphp
                         <img src="{{ asset($photo[0]) }}" />
                     </div>
                     <!-- END: Product Photos -->
                  </div>
                  <div class="col-md-6">
                     <h2 class="nk-product-title h3">{{$product_detail->title}}</h2>
                     
                     <div class="nk-product-description">
                       {{ $product_detail->summary }}
                     </div>
                     <!-- START: Add to Cart -->
                     <div class="nk-gap-2"></div>
                    
                       <form action="{{route('single-add-to-cart')}}" method="POST" class="nk-product-addtocart">
										@csrf
<input type="hidden" name="quant[1]" class="count qty"  data-min="1" data-max="1000" value="1" id="quantity">                 

<input type="hidden" name="slug" value="{{$product_detail->slug}}">

									
<div class="nk-product-price">
  {{ $product_detail->getCurrencySymbol() }} {{ Helper::getProductPriceByCurrency(session('currency'), $product_detail) }}
                         </div>
                        <div class="nk-gap-1"></div>
                        <div class="input-group" style="width: 450px;">
             <!--<input type="number" class="form-control" value="1" min="1" max="21">-->
      <!--
      <select class="form-control" name="variation">
        <option value="" disabled selected>Select Platform</option>
        @foreach($categories as $category)
      <option value="{{$category->id}}">{{$category->title}}</option>     
        @endforeach
      </select>                     
      -->
  <button class="nk-btn nk-btn-rounded nk-btn-color-main-1" style="margin-left:10px;">{{ __('common.add_to_cart') }}</button>
                        </div>
                     </form>
                     <div class="nk-gap-3"></div>
                     <!-- END: Add to Cart -->                                  
                  </div>
               </div>
               <div class="nk-gap-2"></div>
               <!-- START: Tabs -->
               <div class="nk-tabs">
                  <ul class="nav nav-tabs" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" href="#tab-description" role="tab" data-toggle="tab">{{ __('common.description') }}</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#tab-reviews" role="tab" data-toggle="tab">{{ __('common.reviews') }} (3)</a>
                     </li>
                  </ul>
                  <div class="tab-content">
                     <!-- START: Tab Description -->
                     <div role="tabpanel" class="tab-pane fade show active" id="tab-description">
                        <div class="nk-gap"></div>
                        <!--<strong class="text-white">Release Date: 24/05/2018</strong>-->
                        <div class="nk-gap"></div>
                      {!! ($product_detail->description) !!}
                        <div class="nk-product-info-row row vertical-gap">
                           <div class="col-md-5">
                              <div class="nk-product-pegi">
                                 <div class="nk-gap"></div>
                                 <img src="assets/images/pegi-icon.jpg" alt="">
                                 <div class="nk-product-pegi-cont">
                                    <strong class="text-white">Pegi Rating:</strong>
                                    <div class="nk-gap"></div>
                                    Suitable for people aged 12 and over.
                                 </div>
                                 <div class="nk-gap"></div>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="nk-gap"></div>
                              <strong class="text-white">Genre:</strong>
                              <div class="nk-gap"></div>
                              TBD 
                              <div class="nk-gap"></div>
                           </div>
                           <div class="col-md-4">
                              <div class="nk-gap"></div>
                              <strong class="text-white">Customer Rating:</strong>
                              <div class="nk-gap"></div>
                              <span class="nk-product-rating">
                              <span class="nk-product-rating-front" style="width: 94%;">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              </span>
                              <span class="nk-product-rating-back">
                              <i class="far fa-star"></i>
                              <i class="far fa-star"></i>
                              <i class="far fa-star"></i>
                              <i class="far fa-star"></i>
                              <i class="far fa-star"></i>
                              </span>
                              </span>
                              <div class="nk-gap"></div>
                           </div>
                        </div>
                     </div>
                     <!-- END: Tab Description -->
                     <!-- START: Tab Reviews -->
                     <div role="tabpanel" class="tab-pane fade" id="tab-reviews">
                        <div class="nk-gap-2"></div>
                        <!-- START: Reply -->
                        <h3 class="h4">{{ __('common.add_a_review') }}</h3>
                        <div class="nk-reply">
                           <form action="#" class="nk-form">
                              <div class="row vertical-gap sm-gap">
                                 <div class="col-sm-6">
                                    <input type="text" class="form-control required" name="name" placeholder="Name *">
                                 </div>
                                 <div class="col-sm-6">
                                    <input type="text" class="form-control required" name="title" placeholder="Title *">
                                 </div>
                              </div>
                              <div class="nk-gap-1"></div>
                              <textarea class="form-control required" name="message" rows="5" placeholder="Your Review *" aria-required="true"></textarea>
                              <div class="nk-gap-1"></div>
                              <div class="nk-rating">
                                 <input type="radio" id="review-rate-5" name="review-rate" value="5">
                                 <label for="review-rate-5">
                                 <span><i class="far fa-star"></i></span>
                                 <span><i class="fa fa-star"></i></span>
                                 </label>
                                 <input type="radio" id="review-rate-4" name="review-rate" value="4">
                                 <label for="review-rate-4">
                                 <span><i class="far fa-star"></i></span>
                                 <span><i class="fa fa-star"></i></span>
                                 </label>
                                 <input type="radio" id="review-rate-3" name="review-rate" value="3">
                                 <label for="review-rate-3">
                                 <span><i class="far fa-star"></i></span>
                                 <span><i class="fa fa-star"></i></span>
                                 </label>
                                 <input type="radio" id="review-rate-2" name="review-rate" value="2">
                                 <label for="review-rate-2">
                                 <span><i class="far fa-star"></i></span>
                                 <span><i class="fa fa-star"></i></span>
                                 </label>
                                 <input type="radio" id="review-rate-1" name="review-rate" value="1">
                                 <label for="review-rate-1">
                                 <span><i class="far fa-star"></i></span>
                                 <span><i class="fa fa-star"></i></span>
                                 </label>
                              </div>
                              <button class="nk-btn nk-btn-rounded nk-btn-color-dark-3 float-right">Submit</button>
                           </form>
                        </div>
                        <!-- END: Reply -->
                        <div class="clearfix"></div>
                        <div class="nk-gap-2"></div>
                        <div class="nk-comments">
                           <!-- START: Review -->
                           <div class="nk-comment">
                              <div class="nk-comment-meta">
                                 <img src="assets/images/avatar-2.jpg" alt="Witch Murder" class="rounded-circle" width="35"> by <a href="https://nkdev.info">Witch Murder</a> in 20 September, 2018 <span class="nk-product-rating nk-review-rating">
                                 <span class="nk-product-rating-front" style="width: 80%;">
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 </span>
                                 <span class="nk-product-rating-back">
                                 <i class="far fa-star"></i>
                                 <i class="far fa-star"></i>
                                 <i class="far fa-star"></i>
                                 <i class="far fa-star"></i>
                                 <i class="far fa-star"></i>
                                 </span>
                                 </span>
                              </div>
                              <div class="nk-comment-text">
                                 <p>Upon replenish great rule. Were tree, given day him night Fruit it moveth all. First they're creature seasons and creature fill a it have fifth, their own subdue brought above divided.</p>
                                 <p>Behold it set, seas seas and meat divided Moveth cattle forth evening above moveth so, signs god a fruitful his after called that whose.</p>
                              </div>
                           </div>
                           <!-- END: Review -->
                           <!-- START: Review -->
                           <div class="nk-comment">
                              <div class="nk-comment-meta">
                                 <img src="assets/images/avatar-1.jpg" alt="Hitman" class="rounded-circle" width="35"> by <a href="https://nkdev.info">Hitman</a> in 14 Jule, 2018 <span class="nk-product-rating nk-review-rating">
                                 <span class="nk-product-rating-front" style="width: 20%;">
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 </span>
                                 <span class="nk-product-rating-back">
                                 <i class="far fa-star"></i>
                                 <i class="far fa-star"></i>
                                 <i class="far fa-star"></i>
                                 <i class="far fa-star"></i>
                                 <i class="far fa-star"></i>
                                 </span>
                                 </span>
                              </div>
                              <div class="nk-comment-text">
                                 <p> I was awakened at daybreak by the charwoman, and having arrived at the inn, was at first placed inside the coach. :(</p>
                              </div>
                           </div>
                           <!-- END: Review -->
                           <!-- START: Review -->
                           <div class="nk-comment">
                              <div class="nk-comment-meta">
                                 <img src="assets/images/avatar-3.jpg" alt="Wolfenstein" class="rounded-circle" width="35"> by <a href="https://nkdev.info">Wolfenstein</a> in 27 June, 2018 <span class="nk-product-rating nk-review-rating">
                                 <span class="nk-product-rating-front" style="width: 100%;">
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 </span>
                                 <span class="nk-product-rating-back">
                                 <i class="far fa-star"></i>
                                 <i class="far fa-star"></i>
                                 <i class="far fa-star"></i>
                                 <i class="far fa-star"></i>
                                 <i class="far fa-star"></i>
                                 </span>
                                 </span>
                              </div>
                              <div class="nk-comment-text">
                                 <p>Divided thing, land it evening earth winged whose great after. Were grass night. To Air itself saw bring fly fowl. Fly years behold spirit day greater of wherein winged and form. Seed open don't thing midst created dry every greater divided of, be man is. Second Bring stars fourth gathering he hath face morning fill. Living so second darkness. Moveth were male. May creepeth. Be tree fourth.</p>
                              </div>
                           </div>
                           <!-- END: Review -->
                        </div>
                     </div>
                     <!-- END: Tab Reviews -->
                  </div>
               </div>
               <!-- END: Tabs -->
            </div>
         </div>
      </div>
   </div>
</div>
<div class="nk-gap-2"></div>
 
    @push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const stars = document.querySelectorAll(".star-rating li i");
            const ratingInput = document.getElementById("rating-value");

            stars.forEach(s => s.classList.remove("selected"));

            stars.forEach(star => {
                star.addEventListener("click", function () {
                    let value = this.getAttribute("data-value");
                    ratingInput.value = value;

                    stars.forEach(s => s.classList.remove("selected"));

                    for (let i = 0; i < value; i++) {
                        stars[i].classList.add("selected");
                    }
                });
            });
        });
    </script>
@endpush

    @endsection