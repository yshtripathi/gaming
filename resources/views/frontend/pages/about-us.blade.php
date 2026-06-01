@extends('frontend.layouts.main')
@section('title', 'About Us')

@section('main-content')
<section class="polygamez-about-page">
    <div class="about-title-band">
        <!-- HUD Visual Effects -->
        <div class="about-hud-grid"></div>
        <div class="about-hud-glow"></div>
        <div class="about-hud-decor border-t"></div>
        <div class="about-hud-decor border-b"></div>
        
        <div class="container position-relative z-1">
            <h1 class="about-hud-title mb-3 animate-fade-in-up">{{ __('common.about_us') }}</h1>
            
            <div class="about-hud-breadcrumb-capsule animate-fade-in-up delay-1">
                <a href="{{ route('home') }}" class="hud-breadcrumb-link">
                    <i class="fas fa-home me-2"></i>{{ __('common.home') }}
                </a>
                <span class="hud-breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
                <span class="hud-breadcrumb-current">{{ __('common.about_us') }}</span>
            </div>
        </div>
    </div>

    <div class="about-main-section">
        <div class="container">
            <div class="about-intro-grid">
                <div class="about-image-frame">
                    <img src="{{ asset('assets/media/blogs/bd-1.png') }}" alt="{{ __('common.about_us') }}">
                </div>

                <div class="about-copy-block">
                    <span>{{ __('common.about_us') }}</span>
                    <h2>{{ __('common.who_we_are') }}</h2>
                    <h3>{{ __('common.built_for_gamers') }}</h3>
                    <p>{{ __('common.next_gen_platform') }}</p>
                    <p>{{ __('common.team_description') }}</p>
                    <a href="{{ route('contact') }}" class="about-pill-btn">{{ __('common.contact_us') }}</a>
                </div>
            </div>

            <div class="about-split-row">
                <div class="about-skills-block animate-fade-in-up">
                    <h2>{{ __('common.why_choose_us') }}</h2>
                    <p>{{ __('common.why_choose_us_desc') }}</p>
                    
                    <div class="about-guarantee-stack">
                        <!-- Guarantee Item 1 -->
                        <div class="about-guarantee-card">
                            <div class="guarantee-icon-wrapper">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="guarantee-text-wrapper">
                                <h4>{{ __('common.fast_secure') }}</h4>
                                <p>Every order is processed using military-grade security channels and rapid execution protocols, ensuring instant point updates with zero downtime.</p>
                            </div>
                        </div>

                        <!-- Guarantee Item 2 -->
                        <div class="about-guarantee-card">
                            <div class="guarantee-icon-wrapper">
                                <i class="fas fa-trophy"></i>
                            </div>
                            <div class="guarantee-text-wrapper">
                                <h4>{{ __('common.expert_boosters') }}</h4>
                                <p>Our booster crew consists entirely of vetted global pro players dedicated to elevating your competitive ranking and match standards safely.</p>
                            </div>
                        </div>

                        <!-- Guarantee Item 3 -->
                        <div class="about-guarantee-card">
                            <div class="guarantee-icon-wrapper">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            <div class="guarantee-text-wrapper">
                                <h4>{{ __('common.safe_confidential') }}</h4>
                                <p>We enforce rigorous confidentiality standards. Your account credentials and gameplay sessions remain fully encrypted and anonymous.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="about-stats-grid animate-fade-in-up delay-3">
                    <div class="about-stat">
                        <div class="about-stat-icon"><i class="fas fa-trophy"></i></div>
                        <strong>ELITE BOOSTERS</strong>
                        <span>{{ __('common.expert_boosters') }}</span>
                    </div>
                    <div class="about-stat">
                        <div class="about-stat-icon"><i class="fas fa-bolt"></i></div>
                        <strong>SECURED VAULT</strong>
                        <span>{{ __('common.fast_secure') }}</span>
                    </div>
                    <div class="about-stat">
                        <div class="about-stat-icon"><i class="fas fa-shield-alt"></i></div>
                        <strong>GUARANTEED</strong>
                        <span>{{ __('common.guaranteed_progress') }}</span>
                    </div>
                    <div class="about-stat">
                        <div class="about-stat-icon"><i class="fas fa-headset"></i></div>
                        <strong>24/7 SUPPORT</strong>
                        <span>{{ __('common.safe_confidential') }}</span>
                    </div>
                </div>
            </div>

            <div class="about-cinema-cta">
                <div>
                    <span>{{ __('common.immerse_yourself') }}</span>
                    <h2>{{ __('common.beyond_boundaries') }}</h2>
                    <p>{{ __('common.immerse_yourself_desc') }}</p>
                    <a href="{{ route('cat-list', 'rainbow-six-siege') }}" class="about-pill-btn">{{ __('common.explore_our_services') }}</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
