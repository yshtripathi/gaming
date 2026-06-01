@extends('frontend.layouts.main')
@section('title', $product_detail->title)
@section('description', $product_detail->summary)

@section('main-content')
@php
    $photo = array_filter(explode(',', $product_detail->photo));
    $mainPhoto = $photo[0] ?? 'assets/media/blogs/bd-1.png';
    $displayPrice = Helper::getProductPriceByCurrency(session('currency'), $product_detail);
    $relatedProducts = $product_detail->rel_prods->where('id', '!=', $product_detail->id)->take(4);
@endphp

<section class="pg-product-detail-page">
    <div class="container">
        <div class="pg-product-breadcrumb">
            <a href="{{ route('home') }}">{{ __('common.home') }}</a>
            <span>/</span>
            <span>{{ $product_detail->title }}</span>
        </div>

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
