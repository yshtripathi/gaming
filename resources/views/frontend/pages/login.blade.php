@extends('frontend.layouts.main')
@section('title', 'Login')

@section('main-content')
    <div class="about-title-band">
        <!-- HUD Visual Effects -->
        <div class="about-hud-grid"></div>
        <div class="about-hud-glow"></div>
        <div class="about-hud-decor border-t"></div>
        <div class="about-hud-decor border-b"></div>
        
        <div class="container position-relative z-1">
            <h1 class="about-hud-title mb-3 animate-fade-in-up">{{ __('common.login') }}</h1>
            
            <div class="about-hud-breadcrumb-capsule animate-fade-in-up delay-1">
                <a href="{{ route('home') }}" class="hud-breadcrumb-link">
                    <i class="fas fa-home me-2"></i>{{ __('common.home') }}
                </a>
                <span class="hud-breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
                <span class="hud-breadcrumb-current">{{ __('common.login') }}</span>
            </div>
        </div>
    </div>

<section class="polygamez-auth-page auth-login-page">
    <div class="container">
        <div class="auth-shell">
            <div class="auth-form-panel">
                <div class="auth-kicker">{{ __('common.login') }}</div>
                <h1>{{ __('common.sign_in_to_account') }}</h1>
                <p>{{ __('common.enter_credentials') }}</p>

                {{-- Flash messages are rendered globally in the header (frontend.layouts.header) --}}

                <form name="frmLogin" id="frmLogin" action="{{ route('login.submit') }}" method="post">
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

                    <div class="auth-field">
                        <label for="password">{{ __('common.password') }}</label>
                        <div class="auth-input-wrap">
                            <input type="password" name="password" id="password" placeholder="{{ __('common.password') }}" value="{{ old('password') }}" class="form-control" required>
                            <i class="fal fa-lock"></i>
                        </div>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="auth-options">
                        <label class="auth-check" for="remember">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span>{{ __('common.remember_me') }}</span>
                        </label>
                        <a href="{{ route('forgetpwd.form') }}">{{ __('common.forgot_password_link') }}</a>
                    </div>

                    <button type="submit" class="auth-submit-btn">
                        <span>{{ __('common.login') }}</span>
                        <i class="fal fa-arrow-right"></i>
                    </button>
                </form>

                <div class="auth-switch-link">
                    <p>{{ __('common.dont_have_account') }} <a href="{{ route('register.form') }}">{{ __('common.create_account_link') }}</a></p>
                </div>
            </div>

            <aside class="auth-visual-panel">
                <a class="auth-home-link" href="{{ route('home') }}">
                    <i class="fal fa-arrow-left"></i>
                    <span>{{ __('common.home') }}</span>
                </a>
                <div class="auth-visual-art">
                    <img src="{{ asset('assets/media/banner/side-image.webp') }}" alt="{{ __('common.login') }}">
                </div>
                <div class="auth-support-card">
                    <div>
                        <span>{{ __('common.welcome_back_player') }}</span>
                        <strong>{{ __('common.login_feature_track') }}</strong>
                    </div>
                    <i class="fal fa-user-shield"></i>
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection
