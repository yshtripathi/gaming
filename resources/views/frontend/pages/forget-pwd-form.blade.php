@extends('frontend.layouts.main')
@section('title', 'Forgot Password')

@section('main-content')
    <div class="about-title-band">
        <!-- HUD Visual Effects -->
        <div class="about-hud-grid"></div>
        <div class="about-hud-glow"></div>
        <div class="about-hud-decor border-t"></div>
        <div class="about-hud-decor border-b"></div>
        
        <div class="container position-relative z-1">
            <h1 class="about-hud-title mb-3 animate-fade-in-up">{{ __('common.forget_password') }}</h1>
            
            <div class="about-hud-breadcrumb-capsule animate-fade-in-up delay-1">
                <a href="{{ route('home') }}" class="hud-breadcrumb-link">
                    <i class="fas fa-home me-2"></i>{{ __('common.home') }}
                </a>
                <span class="hud-breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
                <span class="hud-breadcrumb-current">{{ __('common.forget_password') }}</span>
            </div>
        </div>
    </div>

<section class="polygamez-auth-page auth-forgot-page">
    <div class="container">
        <div class="auth-shell auth-shell-compact">
            <div class="auth-form-panel">
                <div class="auth-kicker">{{ __('common.forget_password') }}</div>
                <h1>{{ __('common.reset_password') }}</h1>
                <p>{{ __('common.enter_email_reset') }}</p>

                <form name="frmForgot" id="frmForgot" action="{{ route('password.email') }}" method="post">
                    @csrf

                    <div class="auth-field">
                        <label for="email">{{ __('common.email') }}</label>
                        <div class="auth-input-wrap">
                            <input type="email" name="email" id="email" placeholder="{{ __('common.email') }}" value="{{ old('email') }}" class="form-control" required>
                            <i class="fal fa-envelope"></i>
                        </div>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    @if(env('ENABLE_CAPTCHA', true))
                        <div class="auth-captcha-row">
                            <div class="auth-input-wrap">
                                <input type="text" id="captcha" name="captcha" autocomplete="off" class="form-control" placeholder="{{ __('common.fill_captcha') }}" required>
                                <i class="fal fa-key"></i>
                            </div>
                            <div class="auth-captcha-image">@captcha</div>
                        </div>
                        @error('captcha')
                            <span class="text-danger auth-captcha-error">{{ __('common.captcha_error') }}</span>
                        @enderror
                    @endif

                    <button type="submit" class="auth-submit-btn">
                        <span>{{ __('common.submit') }}</span>
                        <i class="fal fa-paper-plane"></i>
                    </button>
                </form>

                <div class="auth-switch-link">
                    <p>{{ __('common.remember_password') }} <a href="{{ route('login.form') }}">{{ __('common.back_to_login') }}</a></p>
                </div>
            </div>

            <aside class="auth-visual-panel">
                <a class="auth-home-link" href="{{ route('home') }}">
                    <i class="fal fa-arrow-left"></i>
                    <span>{{ __('common.home') }}</span>
                </a>
                <div class="auth-visual-art">
                    <img src="{{ asset('assets/media/banner/side-image.webp') }}" alt="{{ __('common.forget_password') }}">
                </div>
                <div class="auth-support-card">
                    <div>
                        <span>{{ __('common.recover_account') }}</span>
                        <strong>{{ __('common.forgot_feature_security') }}</strong>
                    </div>
                    <i class="fal fa-lock-alt"></i>
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection
