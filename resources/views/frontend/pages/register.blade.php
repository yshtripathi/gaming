@extends('frontend.layouts.main')
@section('title', 'Register')

@section('main-content')
<section class="polygamez-auth-page auth-register-page">
    <div class="container">
        <div class="auth-shell">
            <div class="auth-form-panel">
                <div class="auth-kicker">{{ __('common.register') }}</div>
                <h1>{{ __('common.sign_up_now') }}</h1>
                <p>{{ __('common.enter_details') }}</p>

                <form name="frmRegister" id="frmRegister" action="{{ route('register.submit') }}" method="post">
                    @csrf

                    <div class="auth-field">
                        <label for="name">{{ __('common.name') }}</label>
                        <div class="auth-input-wrap">
                            <input type="text" name="name" id="name" placeholder="{{ __('common.name') }}" class="form-control" required>
                            <i class="fal fa-user"></i>
                        </div>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="auth-field">
                        <label for="email">{{ __('common.email') }}</label>
                        <div class="auth-input-wrap">
                            <input type="email" name="email" id="email" placeholder="{{ __('common.email') }}" class="form-control" required>
                            <i class="fal fa-envelope"></i>
                        </div>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="auth-field-grid">
                        <div class="auth-field">
                            <label for="password">{{ __('common.password') }}</label>
                            <div class="auth-input-wrap">
                                <input type="password" name="password" id="password" placeholder="{{ __('common.password') }}" class="form-control" required>
                                <i class="fal fa-lock"></i>
                            </div>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="auth-field">
                            <label for="password_confirmation">{{ __('common.confirm_password') }}</label>
                            <div class="auth-input-wrap">
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="{{ __('common.confirm_password') }}" class="form-control" required>
                                <i class="fal fa-shield-check"></i>
                            </div>
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
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
                        <span>{{ __('common.create_account') }}</span>
                        <i class="fal fa-user-plus"></i>
                    </button>
                </form>

                <div class="auth-switch-link">
                    <p>{{ __('common.already_have_an_account') }} <a href="{{ route('login.form') }}">{{ __('common.log_in') }}</a></p>
                </div>
            </div>

            <aside class="auth-visual-panel">
                <a class="auth-home-link" href="{{ route('home') }}">
                    <i class="fal fa-arrow-left"></i>
                    <span>{{ __('common.home') }}</span>
                </a>
                <div class="auth-visual-art">
                    <img src="{{ asset('assets/media/banner/side-image.png') }}" alt="{{ __('common.register') }}">
                </div>
                <div class="auth-support-card">
                    <div>
                        <span>{{ __('common.join_community') }}</span>
                        <strong>{{ __('common.register_feature_instant') }}</strong>
                    </div>
                    <i class="fal fa-gamepad"></i>
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection
