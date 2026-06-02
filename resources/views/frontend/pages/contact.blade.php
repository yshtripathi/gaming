@extends('frontend.layouts.main')
@section('title', 'Contact Us')

@push('styles')
<style>
/* Validation / required-field messages — warning amber (matches checkout) */
#contact_form .text-danger,
#contact_form label.error {
    display: block;
    font-size: 12px;
    font-weight: 600;
    color: #b45309 !important; /* warning amber */
    margin-top: 6px;
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
            <h1 class="about-hud-title mb-3 animate-fade-in-up">{{ __('common.contact_us') }}</h1>
            
            <div class="about-hud-breadcrumb-capsule animate-fade-in-up delay-1">
                <a href="{{ route('home') }}" class="hud-breadcrumb-link">
                    <i class="fas fa-home me-2"></i>{{ __('common.home') }}
                </a>
                <span class="hud-breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
                <span class="hud-breadcrumb-current">{{ __('common.contact_us') }}</span>
            </div>
        </div>
    </div>

<section class="polygamez-contact-page">
    <div class="container">
        <div class="contact-shell">
            <div class="contact-form-panel">
                <div class="contact-kicker">{{ __('common.contact_hero_title') }}</div>
                <h1>{{ __('common.send_us_message') }}</h1>
                <p>{{ __('common.fill_contact_form') }}</p>

                {{-- Flash messages & validation errors are rendered globally in the header (frontend.layouts.header) --}}

                <form id="contact_form" method="POST" action="{{ route('contact.send') }}" class="contact-form9">
                    @csrf

                    <div class="contact-field-grid">
                        <div class="contact-field">
                            <label for="name">{{ __('common.enter_name') }}</label>
                            <div class="contact-input-wrap">
                                <input type="text" name="name" id="name" placeholder="{{ __('common.enter_name') }}" class="form-control required" >
                                <i class="fal fa-user"></i>
                            </div>
                        </div>

                        <div class="contact-field">
                            <label for="email">{{ __('common.enter_email') }}</label>
                            <div class="contact-input-wrap">
                                <input type="email" name="email" id="email" placeholder="{{ __('common.enter_email') }}" class="form-control required" >
                                <i class="fal fa-envelope"></i>
                            </div>
                        </div>
                    </div>

                    <div class="contact-field-grid">
                        <div class="contact-field">
                            <label for="phone">{{ __('common.phone') }}</label>
                            <div class="contact-input-wrap">
                                <input type="number" name="phone" id="phone" placeholder="{{ __('common.phone') }}" class="form-control required" >
                                <i class="fal fa-phone"></i>
                            </div>
                        </div>

                        <div class="contact-field">
                            <label for="subject">{{ __('common.enter_subject') }}</label>
                            <div class="contact-input-wrap">
                                <input type="text" name="subject" id="subject" placeholder="{{ __('common.enter_subject') }}" class="form-control required" >
                                <i class="fal fa-gamepad"></i>
                            </div>
                        </div>
                    </div>

                    <div class="contact-field">
                        <label for="message">{{ __('common.enter_message') }}</label>
                        <div class="contact-input-wrap contact-textarea-wrap">
                            <textarea name="message" id="message" placeholder="{{ __('common.enter_message') }}" class="form-control required" ></textarea>
                            <i class="fal fa-comment-dots"></i>
                        </div>
                    </div>

                    @if(env('ENABLE_CAPTCHA', true))
                        <div class="contact-captcha-row">
                            <div class="contact-input-wrap">
                                <input type="text" id="captcha" name="captcha" autocomplete="off" class="form-control" placeholder="{{ __('common.fill_captcha') }}" >
                                <i class="fal fa-shield-check"></i>
                            </div>
                            <div class="contact-captcha-image">
                                @captcha
                            </div>
                        </div>
                        @error('captcha')
                            <span class="text-danger contact-captcha-error">{{ __('common.captcha_error') }}</span>
                        @enderror
                    @endif

                    <button type="submit" class="contact-submit-btn">
                        <span>{{ __('common.send_message') }}</span>
                        <i class="fal fa-paper-plane"></i>
                    </button>
                </form>
            </div>

            <aside class="contact-visual-panel">
                <a class="contact-home-link" href="{{ route('home') }}">
                    <i class="fal fa-arrow-left"></i>
                    <span>{{ __('common.home') }}</span>
                </a>

                <div class="contact-visual-art">
                    <img src="{{ asset('assets/media/banner/side-image.webp') }}" alt="{{ __('common.contact_hero_title') }}">
                </div>

                <div class="contact-support-card">
                    <div>
                        <span>{{ __('common.lets_get_in_touch') }}</span>
                        <strong>{{ __('common.contact_feature_response') }}</strong>
                    </div>
                    <i class="fal fa-headset"></i>
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="{{ url('assets/js/vendor/jquery-validator.js') }}"></script>
<script>
$(document).ready(function () {
    $("#contact_form").validate({
        rules: {
            name: "required",
            email: { required: true, email: true },
            phone: { required: true, minlength: 10 },
            subject: "required",
            message: "required",
            @if(env('ENABLE_CAPTCHA', true))
            captcha: "required",
            @endif
        },
        messages: {
            name: "{{ __('common.name_required') }}",
            email: "{{ __('common.email_required') }}",
            phone: {
                required: "{{ __('common.phone_required') }}",
                minlength: "{{ __('common.phone_min') }}"
            },
            subject: "{{ __('common.subject_required') }}",
            message: "{{ __('common.message_required') }}",
            captcha: "{{ __('common.fill_it') }}"
        },
        errorPlacement: function (error, element) {
            error.addClass('text-danger');
            error.css('display', 'block');
            if (element.attr('id') === 'captcha') {
                error.insertAfter(element.closest('.contact-captcha-row'));
            } else {
                var wrap = element.closest('.contact-input-wrap');
                error.insertAfter(wrap.length ? wrap : element);
            }
        }
    });
});
</script>
@endpush
