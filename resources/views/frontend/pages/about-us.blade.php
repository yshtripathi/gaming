@extends('frontend.layouts.main')
@section('title', 'About Us')

@section('main-content')
<section class="polygamez-about-page">
    <div class="about-title-band">
        <div class="container">
            <h1>{{ __('common.about_us') }}</h1>
            <div class="about-breadcrumb">
                <a href="{{ route('home') }}">{{ __('common.home') }}</a>
                <span>/</span>
                <span>{{ __('common.about_us') }}</span>
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
                <div class="about-skills-block">
                    <h2>{{ __('common.why_choose_us') }}</h2>
                    <p>{{ __('common.why_choose_us_desc') }}</p>

                    <div class="about-skill-list">
                        <div class="about-skill-item">
                            <div>
                                <span>{{ __('common.fast_secure') }}</span>
                                <strong>92%</strong>
                            </div>
                            <i style="width: 92%;"></i>
                        </div>
                        <div class="about-skill-item">
                            <div>
                                <span>{{ __('common.expert_boosters') }}</span>
                                <strong>88%</strong>
                            </div>
                            <i style="width: 88%;"></i>
                        </div>
                        <div class="about-skill-item">
                            <div>
                                <span>{{ __('common.safe_confidential') }}</span>
                                <strong>96%</strong>
                            </div>
                            <i style="width: 96%;"></i>
                        </div>
                    </div>
                </div>

                <div class="about-stats-grid">
                    <div class="about-stat">
                        <strong>20+</strong>
                        <span>{{ __('common.fast_secure') }}</span>
                    </div>
                    <div class="about-stat">
                        <strong>1,000+</strong>
                        <span>{{ __('common.guaranteed_progress') }}</span>
                    </div>
                    <div class="about-stat">
                        <strong>300+</strong>
                        <span>{{ __('common.safe_confidential') }}</span>
                    </div>
                    <div class="about-stat">
                        <strong>64</strong>
                        <span>{{ __('common.expert_boosters') }}</span>
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
