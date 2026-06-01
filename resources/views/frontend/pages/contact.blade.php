@extends('frontend.layouts.main')
@section('title', 'Contact Us')

@section('main-content')
<section class="polygamez-contact-page">
    <div class="container">
        <div class="contact-shell">
            <div class="contact-form-panel">
                <div class="contact-kicker">{{ __('common.contact_hero_title') }}</div>
                <h1>{{ __('common.send_us_message') }}</h1>
                <p>{{ __('common.fill_contact_form') }}</p>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form id="contact_form" method="POST" action="{{ route('contact.send') }}" class="contact-form9">
                    @csrf

                    <div class="contact-field-grid">
                        <div class="contact-field">
                            <label for="name">{{ __('common.enter_name') }}</label>
                            <div class="contact-input-wrap">
                                <input type="text" name="name" id="name" placeholder="{{ __('common.enter_name') }}" class="form-control required" required>
                                <i class="fal fa-user"></i>
                            </div>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="contact-field">
                            <label for="email">{{ __('common.enter_email') }}</label>
                            <div class="contact-input-wrap">
                                <input type="email" name="email" id="email" placeholder="{{ __('common.enter_email') }}" class="form-control required" required>
                                <i class="fal fa-envelope"></i>
                            </div>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="contact-field-grid">
                        <div class="contact-field">
                            <label for="phone">{{ __('common.phone') }}</label>
                            <div class="contact-input-wrap">
                                <input type="number" name="phone" id="phone" placeholder="{{ __('common.phone') }}" class="form-control required" required>
                                <i class="fal fa-phone"></i>
                            </div>
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="contact-field">
                            <label for="subject">{{ __('common.enter_subject') }}</label>
                            <div class="contact-input-wrap">
                                <input type="text" name="subject" id="subject" placeholder="{{ __('common.enter_subject') }}" class="form-control required" required>
                                <i class="fal fa-gamepad"></i>
                            </div>
                        </div>
                    </div>

                    <div class="contact-field">
                        <label for="message">{{ __('common.enter_message') }}</label>
                        <div class="contact-input-wrap contact-textarea-wrap">
                            <textarea name="message" id="message" placeholder="{{ __('common.enter_message') }}" class="form-control required" required></textarea>
                            <i class="fal fa-comment-dots"></i>
                        </div>
                    </div>

                    @if(env('ENABLE_CAPTCHA', true))
                        <div class="contact-captcha-row">
                            <div class="contact-input-wrap">
                                <input type="text" id="captcha" name="captcha" autocomplete="off" class="form-control" placeholder="{{ __('common.fill_captcha') }}" required>
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
                    <img src="{{ asset('assets/media/banner/side-image.png') }}" alt="{{ __('common.contact_hero_title') }}">
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
