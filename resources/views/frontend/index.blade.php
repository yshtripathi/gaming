@extends('frontend.layouts.main')

@section('main-content')

    <!-- Section 1: Hero Banner (Home) -->
    <div class="hero-banner-1">
      <div class="hero-geometric-bg"></div>
      <div class="hero-bg-effects">
        <div class="hero-glow hero-glow-1"></div>
        <div class="hero-glow hero-glow-2"></div>
        <div class="hero-glow hero-glow-3"></div>
      </div>
      <div class="container position-relative h-100">
        <div class="row align-items-center h-100">
          <div class="col-lg-7">
            <div class="content">
              <div class="hero-badge mb-4 animate-fade-in-up">
                <span class="live-dot"></span>
                <span>{{ __('common.gaming_zone') }}</span>
              </div>
              <h1 class="mb-4 color-white animate-fade-in-up delay-1">
                {{ __('common.game_on') }}<br>
                <span class="gradient-text">{{ __('common.challenges') }}</span>
              </h1>
              <p class="hero-subtitle mb-0 animate-fade-in-up delay-2" style="max-width:600px">
                {{ __('common.boost_your_rank1') }}<br>
                {{ __('common.boost_your_rank2') }}<br>
                {{ __('common.boost_your_rank3') }}
              </p>
              <div class="btn-block mt-4 animate-fade-in-up delay-3">
                <a href="{{route('register.form')}}" class="cus-btn primary">{{ __('common.join_now') }}<i class="fas fa-chevron-right"></i></a>
                <a href="#points-topup" class="cus-btn points">{{ __('common.points_topup_title') }}<i class="fas fa-bolt"></i></a>
                <a href="{{route('about-us')}}" class="cus-btn sec">{{ __('common.read_more') }}<i class="far fa-book-open"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-5 animate-fade-in-up delay-4">
            <div class="hero-showcase">
              <div class="hero-showcase-card hero-showcase-main">
                <img src="{{asset('assets/media/banner/side-image.webp')}}" alt="{{ __('common.gaming_zone') }}" loading="eager">
              </div>
              <div class="hero-showcase-pill hero-pill-top">{{ __('common.fast_secure') }}</div>
              <div class="hero-showcase-pill hero-pill-bottom">{{ __('common.instant_delivery') }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Hero Banner End -->

    <!-- Main Content Start (Shares grid overlay and background radial lights) -->
      
      <!-- Section 2: Why Choose Us (Asymmetrical Staggered Deck Layout) -->
      <section class="features-section">
        <div class="container">
          <div class="section-header text-center">
            <span class="section-tag-glow">{{ __('common.gaming_zone') }}</span>
            <h2>{{ __('common.why_choose_us') }}</h2>
            <p class="section-subtitle">{{ __('common.why_choose_us_desc') }}</p>
          </div>
          
          <div class="features-deck-layout">
            
            <!-- Feature Card 1 -->
            <div class="feature-deck-card fd-card-1">
              <div class="fd-card-header">
                <span class="fd-number">01</span>
                <div class="fd-icon-box">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                  </svg>
                </div>
              </div>
              <div class="fd-card-body">
                <h3>{{ __('common.fast_secure') }}</h3>
                <p>{{ __('common.fast_secure_desc') }}</p>
              </div>
              <div class="fd-card-glow"></div>
            </div>
            
            <!-- Feature Card 2 -->
            <div class="feature-deck-card fd-card-2">
              <div class="fd-card-header">
                <span class="fd-number">02</span>
                <div class="fd-icon-box">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                    <line x1="9" y1="9" x2="9.01" y2="9"></line>
                    <line x1="15" y1="9" x2="15.01" y2="9"></line>
                  </svg>
                </div>
              </div>
              <div class="fd-card-body">
                <h3>{{ __('common.expert_boosters') }}</h3>
                <p>{{ __('common.expert_boosters_desc') }}</p>
              </div>
              <div class="fd-card-glow"></div>
            </div>
            
            <!-- Feature Card 3 -->
            <div class="feature-deck-card fd-card-3">
              <div class="fd-card-header">
                <span class="fd-number">03</span>
                <div class="fd-icon-box">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                    <polyline points="17 6 23 6 23 12"></polyline>
                  </svg>
                </div>
              </div>
              <div class="fd-card-body">
                <h3>{{ __('common.guaranteed_progress') }}</h3>
                <p>{{ __('common.guaranteed_progress_desc') }}</p>
              </div>
              <div class="fd-card-glow"></div>
            </div>
            
            <!-- Feature Card 4 -->
            <div class="feature-deck-card fd-card-4">
              <div class="fd-card-header">
                <span class="fd-number">04</span>
                <div class="fd-icon-box">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                  </svg>
                </div>
                <div class="fd-badge">24/7 SERVICE</div>
              </div>
              <div class="fd-card-body">
                <h3>{{ __('common.safe_confidential') }}</h3>
                <p>{{ __('common.safe_confidential_desc') }}</p>
              </div>
              <div class="fd-card-glow"></div>
            </div>
            
            <!-- Feature Card 5 -->
            <div class="feature-deck-card fd-card-5">
              <div class="fd-card-header">
                <span class="fd-number">05</span>
                <div class="fd-icon-box">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                  </svg>
                </div>
              </div>
              <div class="fd-card-body">
                <h3>{{ __('common.instant_delivery') }}</h3>
                <p>{{ __('common.instant_delivery_desc') }}</p>
              </div>
              <div class="fd-card-glow"></div>
            </div>
            
            <!-- Feature Card 6 -->
            <div class="feature-deck-card fd-card-6">
              <div class="fd-card-header">
                <span class="fd-number">06</span>
                <div class="fd-icon-box">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                    <path d="M2 17l10 5 10-5"></path>
                    <path d="M2 12l10 5 10-5"></path>
                  </svg>
                </div>
              </div>
              <div class="fd-card-body">
                <h3>{{ __('common.multi_game_support') }}</h3>
                <p>{{ __('common.multi_game_support_desc') }}</p>
              </div>
              <div class="fd-card-glow"></div>
            </div>
            
          </div>
        </div>
      </section>
      <!-- Features Section End -->

      <!-- Section 3: Gaming Featured (High-End Swiper Thumbs Gallery) -->
      <section class="game-grid-section">
        <div class="container">
          <div class="section-header">
            <div>
              <span class="section-tag">{{ __('common.gaming_zone') }}</span>
              <h2>{{ __('common.game_streams') }}</h2>
            </div>
            <a href="{{ route('product-lists') }}" class="category-more-cta">
              {{ __('common.browse_categories') }}
              <i class="fas fa-arrow-right"></i>
            </a>
          </div>
          
          @php
            $categories = Helper::productCategoryList("all");
            $allCategories = $categories->reverse()->values();
          @endphp
          
          <!-- Large Showcase swiper -->
          <div class="swiper mySwiper2 pg-swiper-showcase mb-4">
            <div class="swiper-wrapper">
              @foreach($allCategories as $index => $cat)
                <div class="swiper-slide">
                  <div class="pg-slide-showcase-card">
                    <div class="pg-slide-image-col">
                      <img src="{{ url($cat->photo) }}" alt="{{ $cat->title }}">
                      <span class="pg-slide-index-badge">0{{ $index + 1 }}</span>
                    </div>
                    <div class="pg-slide-details-col">
                      <span class="pg-category-tag">CATEGORY STREAMS</span>
                      <h3>{{ $cat->title }}</h3>
                      <p class="pg-details-summary">
                        Explore customized rank booster packages, safe dynamic transactions, and elite profiles under the {{ $cat->title }} category. Secure your instant delivery now.
                      </p>
                      <div class="pg-details-actions">
                        <a href="{{ route('product-cat', $cat->slug) }}" class="category-more-cta">
                          EXPLORE PRODUCTS
                          <i class="fas fa-arrow-right"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
            
            <!-- Custom Swiper Buttons -->
            <div class="swiper-button-next pg-swiper-btn-next"></div>
            <div class="swiper-button-prev pg-swiper-btn-prev"></div>
          </div>
          
          <!-- Thumbs Gallery swiper -->
          <div thumbsSlider="" class="swiper mySwiper pg-swiper-thumbs mt-4">
            <div class="swiper-wrapper">
              @foreach($allCategories as $cat)
                <div class="swiper-slide pg-thumb-slide">
                  <div class="pg-thumb-card">
                    <img src="{{ url($cat->photo) }}" alt="{{ $cat->title }}">
                    <span class="pg-thumb-title">{{ $cat->title }}</span>
                  </div>
                </div>
              @endforeach
            </div>
          </div>

        </div>
      </section>
      <!-- Game Streams Grid End -->

      <!-- Section 4: Point System (Cyber Cockpit & Points Calculator) -->
      <section class="bp-topup-section" id="points-topup">
        <div class="container">
          <!-- Disclaimer Alert Capsule -->
          <div class="bp-disclaimer-wrapper mb-5">
            <div class="bp-disclaimer-glow-border"></div>
            <div class="bp-disclaimer-content">
              <span class="bp-disclaimer-badge">
                <i class="fas fa-exclamation-triangle"></i> NOTICE
              </span>
              <p class="bp-disclaimer-text">{{ __('common.disclaimer') }}</p>
            </div>
          </div>

          <!-- Title & Badges -->
          <div class="bp-section-header text-center mb-5">
            <div class="bp-header-badge mb-3">
              <span class="live-dot font-pulsing"></span>
              <span>POINT VAULT SYSTEM</span>
            </div>
            <h2 class="bp-main-title mb-3">
              {{ __('common.points_topup_title') }}
            </h2>
            <div class="bp-title-separator">
              <span class="sep-line"></span>
              <span class="sep-dot"></span>
              <span class="sep-line"></span>
            </div>
            <div class="bp-topup-intro-deck mt-4">
              <p class="bp-intro-lead">{{ __('common.points_topup_intro_1') }}</p>
              <p class="bp-intro-sub">{{ __('common.points_topup_intro_2') }}</p>
            </div>
          </div>

          <!-- Interactive Cockpit area -->
          <div class="row bp-equal-height g-4">
            <!-- Left Card: Multipliers Table & Process Roadmap -->
            <div class="col-lg-6">
              <div class="bp-tier-card h-100">
                <div class="bp-card-corner-decor"></div>
                
                <div class="bp-card-header-block mb-4">
                  <div class="bp-card-header-icon">
                    <i class="fas fa-gift"></i>
                  </div>
                  <div>
                    <h4 class="bp-card-title-new mb-1">{{ __('common.bonus_tier_title') }}</h4>
                    <p class="bp-card-subtitle-new">Maximize your recharge power</p>
                  </div>
                </div>

                <!-- Premium Bonus Table -->
                <div class="bp-table-container mb-4">
                  <table class="bp-premium-table">
                    <thead>
                      <tr>
                        <th>{{ __('common.bonus_table_range') }} ({{ Helper::getCurrencySymbol(session('currency'))}})</th>
                        <th>{{ __('common.bonus_table_multiplier') }}</th>
                        <th>{{ __('common.bonus_table_benefit') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- Tier 1 -->
                      <tr class="bp-tier-row tier-1">
                        <td class="bp-col-range">
                          <span class="range-badge">
                            {{ session('currency') == 'JPY' ? '¥1 – ¥100,000' : (session('currency') == 'HKD' ? 'HK$ 1 – HK$ 5,000' : '$1 - $630') }}
                          </span>
                        </td>
                        <td class="bp-col-multiplier">
                          <span class="multiplier-pill">1×</span>
                        </td>
                        <td class="bp-col-benefit">
                          <span class="benefit-badge standard">{{ __('common.bonus_standard') }}</span>
                        </td>
                      </tr>
                      <!-- Tier 2 -->
                      <tr class="bp-tier-row tier-2">
                        <td class="bp-col-range">
                          <span class="range-badge">
                            {{ session('currency') == 'JPY' ? '¥100,001 – ¥300,000' : (session('currency') == 'HKD' ? 'HK$ 5,001 – HK$ 15,000' : '$631 - $1,880') }}
                          </span>
                        </td>
                        <td class="bp-col-multiplier">
                          <span class="multiplier-pill boost-1">1.5×</span>
                        </td>
                        <td class="bp-col-benefit">
                          <span class="benefit-badge silver">{{ __('common.bonus_50_extra') }}</span>
                        </td>
                      </tr>
                      <!-- Tier 3 -->
                      <tr class="bp-tier-row tier-3">
                        <td class="bp-col-range">
                          <span class="range-badge">
                            {{ session('currency') == 'JPY' ? '¥300,001 – ¥500,000' : (session('currency') == 'HKD' ? 'HK$ 15,001 – HK$ 25,000' : '$1,881 - $3,125') }}
                          </span>
                        </td>
                        <td class="bp-col-multiplier">
                          <span class="multiplier-pill boost-2">2×</span>
                        </td>
                        <td class="bp-col-benefit">
                          <span class="benefit-badge gold">{{ __('common.bonus_100_extra') }}</span>
                        </td>
                      </tr>
                      <!-- Tier 4 -->
                      <tr class="bp-tier-row tier-4">
                        <td class="bp-col-range">
                          <span class="range-badge">
                            {{ session('currency') == 'JPY' ? __('common.500,001_and_above') : (session('currency') == 'HKD' ? __('common.25000_and_above') : __('common.3125_and_above')) }}
                          </span>
                        </td>
                        <td class="bp-col-multiplier">
                          <span class="multiplier-pill boost-3">5×</span>
                        </td>
                        <td class="bp-col-benefit">
                          <span class="benefit-badge hyper">{{ __('common.bonus_400_extra') }}</span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <div class="bp-note-box mb-4">
                  <i class="fas fa-info-circle text-danger"></i>
                  <span class="bp-note-text">{{ __('common.bonus_note') }}</span>
                </div>

                <!-- Process Steps -->
                <div class="bp-process-flow mt-auto">
                  <div class="bp-flow-heading mb-3">Recharge Process Timeline</div>
                  <div class="bp-timeline-container">
                    <div class="bp-timeline-line"></div>
                    <div class="bp-timeline-steps">
                      <!-- Step 1 -->
                      <div class="bp-t-step">
                        <div class="bp-t-number">01</div>
                        <div class="bp-t-label">{{ __('common.choose_amount') }}</div>
                      </div>
                      <!-- Step 2 -->
                      <div class="bp-t-step">
                        <div class="bp-t-number">02</div>
                        <div class="bp-t-label">{{ __('common.auto_calculate') }}</div>
                      </div>
                      <!-- Step 3 -->
                      <div class="bp-t-step">
                        <div class="bp-t-number">03</div>
                        <div class="bp-t-label">{{ __('common.complete_payment') }}</div>
                      </div>
                      <!-- Step 4 -->
                      <div class="bp-t-step">
                        <div class="bp-t-number">04</div>
                        <div class="bp-t-label">{{ __('common.instant_delivery') }}</div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <!-- Right Card: Cyber calculator block -->
            <div class="col-lg-6">
              <div class="bp-cyber-calc-card h-100">
                <div class="bp-cyber-scan-line"></div>
                <div class="bp-cyber-grid-overlay"></div>
                
                <div class="bp-card-header-block mb-4">
                  <div class="bp-card-header-icon calculator-icon">
                    <i class="fas fa-calculator"></i>
                  </div>
                  <div>
                    <h4 class="bp-card-title-new mb-1 text-white">{{ __('common.start_recharge_title') }}</h4>
                    <p class="bp-card-subtitle-new text-muted">{{ __('common.start_recharge_text') }}</p>
                  </div>
                </div>

                <form action="{{route('points-add-to-cart')}}" method="POST" class="bp-calc-form">
                  @csrf
                  <input type="hidden" name="quant[1]" value="1">
                  <input type="hidden" name="slug" value="points">

                  <!-- Input Container -->
                  <div class="bp-input-container mb-4">
                    <div class="bp-input-header d-flex justify-content-between align-items-center mb-2">
                      <label class="bp-input-label text-white mb-0">{{ __('common.label_amount') }}</label>
                      <span class="bp-input-status-pulse"></span>
                    </div>
                    <div class="bp-input-cyber-wrapper">
                      <div class="bp-currency-indicator">
                        {{ Helper::getCurrencySymbol(session('currency')) }}
                      </div>
                      <input type="number" class="bp-cyber-input"
                             placeholder="{{ __('common.placeholder_amount', ['currency' => Helper::getCurrencySymbol(session('currency'))]) }}"
                             min="1" name="price" id="price" required>
                      <div class="bp-cyber-input-border"></div>
                    </div>
                  </div>

                  <!-- Digital displays cockpit -->
                  <div class="bp-digital-cockpit mb-4">
                    <div class="bp-cockpit-glow"></div>
                    <div class="bp-cockpit-header d-flex justify-content-between mb-3">
                      <span class="bp-cockpit-title"><i class="fas fa-chart-line"></i> VALUATION ENGINE</span>
                      <span class="bp-cockpit-model">v2.1</span>
                    </div>
                    
                    <!-- Row 1: Base Points -->
                    <div class="bp-cockpit-row mb-3">
                      <div class="bp-row-meta">
                        <span class="bp-row-indicator"></span>
                        <span class="bp-row-name">{{ __('common.label_points') }}</span>
                      </div>
                      <div class="bp-row-input-wrap">
                        <input type="number" class="bp-cockpit-display" id="points" readonly value="0">
                        <span class="bp-row-unit">PTS</span>
                      </div>
                    </div>

                    <!-- Row 2: Bonus Points -->
                    <div class="bp-cockpit-row mb-3">
                      <div class="bp-row-meta">
                        <span class="bp-row-indicator bonus-indicator"></span>
                        <span class="bp-row-name">{{ __('common.bonus_points') }}</span>
                      </div>
                      <div class="bp-row-input-wrap bonus-display-wrap">
                        <input type="number" class="bp-cockpit-display bonus" id="bonus_points" readonly value="0">
                        <span class="bp-row-unit">PTS</span>
                      </div>
                    </div>

                    <div class="bp-cockpit-separator mb-3"></div>

                    <!-- Row 3: Total Scoreboard Readout -->
                    <div class="bp-scoreboard-panel">
                      <div class="bp-scoreboard-bg"></div>
                      <div class="bp-scoreboard-header d-flex justify-content-between align-items-center mb-2">
                        <span class="bp-scoreboard-label">{{ __('common.total_points') }}</span>
                        <span class="bp-scoreboard-glow-dot animate-pulse"></span>
                      </div>
                      <div class="bp-scoreboard-value-wrap">
                        <i class="fas fa-bolt bp-bolt-icon"></i>
                        <input type="number" name="points" class="bp-scoreboard-display" id="total_points" readonly value="0">
                        <span class="bp-scoreboard-unit">PTS</span>
                      </div>
                    </div>
                  </div>

                  <!-- Checkout Action -->
                  <div class="bp-checkout-wrapper">
                    <button class="bp-cyber-submit-btn" type="submit">
                      <span class="btn-shine"></span>
                      <span class="btn-text">
                        {{ __('common.add_cart') }} <i class="fas fa-shopping-cart ms-2"></i>
                      </span>
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
      </section>
      <!-- Points Top-Up Section End -->

      <!-- Section 5: Cinematic Video Showcase (cinema-showcase-section) -->
      <section class="cinema-showcase-section">
        <div class="container">
          <div class="cinema-card-frame">
            <div class="cinema-glow-underlay"></div>
            <div class="row align-items-center g-5 position-relative z-1">
              <!-- Left Side: Cinematic Action Text -->
              <div class="col-lg-5 col-md-12">
                <div class="cinema-text-block">
                  <div class="cinema-badge mb-3">
                    <span class="live-dot font-pulsing"></span>
                    <span>CINEMATIC PREVIEW</span>
                  </div>
                  <h2 class="cinema-title mb-4">
                    EXPLORE THE<br>
                    <span class="gradient-lime-text">NEW FRONTIER</span>
                  </h2>
                  <p class="cinema-description mb-4">
                    Immerse yourself in elite gameplay, custom rank boosters, and a premium gaming vault. Watch the cinematic walkthrough and explore our extensive catalog of products and features.
                  </p>
                  
                  <!-- Sci-Fi Bullet nodes -->
                  <ul class="cinema-bullets mb-5">
                    <li>
                      <span class="bullet-node"><i class="fas fa-check"></i></span>
                      <span class="bullet-label">Premium Catalog of Custom Upgrades</span>
                    </li>
                    <li>
                      <span class="bullet-node"><i class="fas fa-check"></i></span>
                      <span class="bullet-label">Instant Secured Point Exchange Vault</span>
                    </li>
                    <li>
                      <span class="bullet-node"><i class="fas fa-check"></i></span>
                      <span class="bullet-label">24/7 Live Dedicated Support Crew</span>
                    </li>
                  </ul>

                  <!-- Dynamic link pointing to the grids layout -->
                  <a href="{{ route('product-lists') }}" class="cinema-cta-btn">
                    <span class="btn-glow-bar"></span>
                    <span class="btn-text-content">
                      EXPLORE IT <i class="fas fa-compass ms-2"></i>
                    </span>
                  </a>
                </div>
              </div>

              <!-- Right Side: widescreen cinema frame element -->
              <div class="col-lg-7 col-md-12">
                <div class="cinema-video-container">
                  <div class="cinema-decor-corner corner-tl"></div>
                  <div class="cinema-decor-corner corner-tr"></div>
                  <div class="cinema-decor-corner corner-bl"></div>
                  <div class="cinema-decor-corner corner-br"></div>
                  <div class="cinema-video-glare"></div>
                  
                  <!-- Autoplay looping muted playsinline video -->
                  <video class="cinema-video-element" autoplay muted loop playsinline>
                    <source src="{{ asset('assets/images/hero-video.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                  </video>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    <!-- Main Content End -->

@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />
<style>
/* Swiper Custom Theme Styling */
.pg-swiper-showcase {
    width: 100%;
    border-radius: 28px;
    background: #ffffff;
    border: 1px solid rgba(8,10,12,0.08);
    box-shadow: 0 24px 64px rgba(8, 10, 12, 0.06);
    overflow: hidden;
}

.pg-slide-showcase-card {
    display: grid;
    grid-template-columns: 550px 1fr;
    min-height: 350px;
    width: 100%;
}

.pg-slide-image-col {
    position: relative;
    width: 550px;
    height: 350px;
    overflow: hidden;
}

.pg-slide-image-col img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.pg-slide-showcase-card:hover .pg-slide-image-col img {
    transform: scale(1.04);
}

.pg-slide-index-badge {
    position: absolute;
    top: 24px;
    left: 24px;
    background: #0b0d10;
    color: #dfff00;
    font-family: 'Orbitron', 'Chakra Petch', sans-serif;
    font-weight: 800;
    font-size: 13px;
    padding: 6px 14px;
    border-radius: 999px;
    letter-spacing: 1px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.28);
}

.pg-slide-details-col {
    padding: 44px 48px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: left;
    background: #ffffff;
}

.pg-category-tag {
    display: inline-block;
    background: rgba(223, 255, 0, 0.12);
    color: #5d7100;
    border: 1px solid rgba(223, 255, 0, 0.22);
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    padding: 6px 12px;
    border-radius: 6px;
    margin-bottom: 16px;
    width: max-content;
}

.pg-slide-details-col h3 {
    font-size: clamp(26px, 3.5vw, 36px) !important;
    font-weight: 900 !important;
    color: #0b0d10 !important;
    margin: 0 0 16px;
    line-height: 1.1;
}

.pg-details-summary {
    color: #4a515b !important;
    font-size: 15px;
    line-height: 1.7;
    margin: 0 0 28px;
    max-width: 580px;
}

.pg-details-actions {
    display: flex;
    align-items: center;
}

.pg-swiper-thumbs {
    width: 100%;
    padding: 10px 0 !important;
    overflow: visible !important;
}

.pg-thumb-slide {
    cursor: pointer;
    opacity: 0.45;
    transition: opacity 0.3s cubic-bezier(0.165, 0.84, 0.44, 1), transform 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.pg-thumb-slide:hover {
    opacity: 0.8;
}

.mySwiper .swiper-slide-thumb-active {
    opacity: 1 !important;
}

.pg-thumb-card {
    background: #ffffff;
    border: 1px solid rgba(8,10,12,0.08);
    border-radius: 20px;
    padding: 10px;
    display: flex;
    align-items: center;
    gap: 14px;
    box-shadow: 0 10px 24px rgba(8,10,12,0.04);
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.pg-thumb-card img {
    width: 68px;
    height: 48px;
    object-fit: cover;
    border-radius: 10px;
    border: 1px solid rgba(0,0,0,0.05);
}

.pg-thumb-title {
    font-size: 12px;
    font-weight: 800;
    color: #34383f;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 140px;
}

.mySwiper .swiper-slide-thumb-active .pg-thumb-card {
    border-color: #dfff00;
    background: #0b0d10;
    box-shadow: 0 14px 28px rgba(195, 226, 0, 0.22);
    transform: scale(1.02);
}

.mySwiper .swiper-slide-thumb-active .pg-thumb-title {
    color: #ffffff;
}

/* Customize Swiper Navigation Buttons */
.pg-swiper-btn-next,
.pg-swiper-btn-prev {
    color: #0b0d10 !important;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(8px);
    width: 48px;
    height: 48px;
    border-radius: 50%;
    border: 1px solid rgba(8,10,12,0.08);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.pg-swiper-btn-next:after,
.pg-swiper-btn-prev:after {
    font-size: 15px !important;
    font-weight: 900;
}

.pg-swiper-btn-next:hover,
.pg-swiper-btn-prev:hover {
    background: #dfff00;
    border-color: #dfff00;
    transform: scale(1.08);
}

/* Responsiveness */
@media (max-width: 1199px) {
    .pg-slide-showcase-card {
        grid-template-columns: 460px 1fr;
    }
    .pg-slide-image-col {
        width: 460px;
        height: 350px;
    }
}

@media (max-width: 991px) {
    .pg-slide-showcase-card {
        grid-template-columns: 1fr;
    }
    .pg-slide-image-col {
        width: 100%;
        height: 320px;
    }
    .pg-slide-details-col {
        padding: 34px 28px;
    }
}

/* Points Top-Up Section Refresh Styling */
.bp-topup-section {
    position: relative;
    padding: 100px 0 !important;
    background: #f6f7f2 !important;
}

/* Premium Disclaimer Notice Banner */
.bp-disclaimer-wrapper {
    position: relative;
    border-radius: 16px;
    background: rgba(244, 63, 94, 0.05);
    padding: 1px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(244, 63, 94, 0.03);
}

.bp-disclaimer-glow-border {
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, transparent, rgba(244, 63, 94, 0.3), transparent);
    z-index: 0;
    animation: flowLight 4s linear infinite;
}

.bp-disclaimer-content {
    position: relative;
    z-index: 1;
    background: #ffffff;
    border-radius: 15px;
    padding: 16px 24px;
    display: flex;
    align-items: center;
    gap: 16px;
}

.bp-disclaimer-badge {
    background: #ff4a5a;
    color: #ffffff;
    font-size: 10px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 1px;
    padding: 5px 12px;
    border-radius: 4px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    white-space: nowrap;
}

.bp-disclaimer-text {
    margin: 0 !important;
    color: #4a515b !important;
    font-size: 13px !important;
    font-weight: 600;
}

/* Header & Badges */
.bp-header-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(8, 10, 12, 0.04);
    border: 1px solid rgba(8, 10, 12, 0.06);
    padding: 6px 14px;
    border-radius: 999px;
    font-size: 11px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #0b0d10;
}

.bp-main-title {
    color: #0b0d10 !important;
    font-size: clamp(32px, 4.5vw, 48px) !important;
    font-weight: 900 !important;
    text-transform: uppercase;
    letter-spacing: -0.5px;
}

.bp-title-separator {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    margin: 16px auto;
}

.bp-title-separator .sep-line {
    width: 60px;
    height: 2px;
    background: linear-gradient(90deg, transparent, #0b0d10, transparent);
}

.bp-title-separator .sep-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #dfff00;
    border: 1.5px solid #0b0d10;
}

.bp-topup-intro-deck {
    max-width: 760px;
    margin: 0 auto;
}

.bp-intro-lead {
    font-size: 17px !important;
    line-height: 1.6 !important;
    color: #34383f !important;
    font-weight: 600;
    margin-bottom: 10px !important;
}

.bp-intro-sub {
    font-size: 14px !important;
    color: #68707a !important;
    margin-bottom: 0 !important;
}

/* Left Card: Bonus Tiers & Roadmap */
.bp-tier-card {
    background: #ffffff !important;
    border: 1px solid rgba(8, 10, 12, 0.08) !important;
    border-radius: 32px !important;
    padding: 44px !important;
    box-shadow: 0 24px 60px rgba(8, 10, 12, 0.05) !important;
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
}

.bp-card-corner-decor {
    position: absolute;
    top: 0;
    right: 0;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 40px 40px 0;
    border-color: transparent #dfff00 transparent transparent;
}

.bp-card-header-block {
    display: flex;
    align-items: center;
    gap: 16px;
}

.bp-card-header-icon {
    width: 52px;
    height: 52px;
    border-radius: 16px;
    background: #0b0d10;
    color: #dfff00;
    font-size: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 10px 20px rgba(8, 10, 12, 0.15);
}

.bp-card-title-new {
    color: #0b0d10 !important;
    font-size: 22px !important;
    font-weight: 900 !important;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.bp-card-subtitle-new {
    font-size: 13px !important;
    color: #68707a !important;
    margin: 0 !important;
}

/* Premium Table Layout */
.bp-table-container {
    border-radius: 20px;
    border: 1px solid rgba(8, 10, 12, 0.08);
    overflow: hidden;
    background: #ffffff;
}

.bp-premium-table {
    width: 100%;
    border-collapse: collapse;
}

.bp-premium-table th {
    background: #0b0d10;
    color: #ffffff;
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 11px !important;
    font-weight: 800 !important;
    text-transform: uppercase;
    letter-spacing: 1px;
    padding: 16px 20px;
    border: none;
}

.bp-premium-table td {
    padding: 18px 20px;
    border-bottom: 1px solid rgba(8, 10, 12, 0.06);
    vertical-align: middle;
    transition: all 0.25s ease;
}

.bp-tier-row:last-child td {
    border-bottom: none;
}

.bp-tier-row:hover td {
    background: rgba(223, 255, 0, 0.03);
}

.bp-col-range {
    font-weight: 800;
    color: #0b0d10 !important;
}

.range-badge {
    font-size: 14px;
}

.multiplier-pill {
    background: #0b0d10;
    color: #ffffff;
    font-family: 'Orbitron', 'Chakra Petch', sans-serif;
    font-size: 13px;
    font-weight: 800;
    padding: 4px 12px;
    border-radius: 999px;
    display: inline-block;
    border: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.06);
    transition: all 0.3s ease;
}

.multiplier-pill.boost-1 {
    background: #0b0d10;
    color: #dfff00;
    border-color: rgba(223, 255, 0, 0.2);
}

.multiplier-pill.boost-2 {
    background: #0b0d10;
    color: #dfff00;
    border-color: rgba(223, 255, 0, 0.4);
    box-shadow: 0 4px 14px rgba(223, 255, 0, 0.15);
}

.multiplier-pill.boost-3 {
    background: #dfff00;
    color: #0b0d10;
    border-color: #dfff00;
    box-shadow: 0 4px 18px rgba(195, 226, 0, 0.3);
}

.bp-tier-row:hover .multiplier-pill.boost-3 {
    transform: scale(1.08) rotate(-2deg);
}

.benefit-badge {
    font-size: 11px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 4px 10px;
    border-radius: 6px;
    display: inline-block;
}

.benefit-badge.standard {
    background: rgba(8, 10, 12, 0.05);
    color: #68707a;
}

.benefit-badge.silver {
    background: rgba(22, 25, 30, 0.08);
    color: #0b0d10;
}

.benefit-badge.gold {
    background: rgba(223, 255, 0, 0.12);
    color: #5d7100;
}

.benefit-badge.hyper {
    background: #0b0d10;
    color: #dfff00;
    font-weight: 900;
}

/* Note box */
.bp-note-box {
    display: flex;
    align-items: center;
    gap: 10px;
    background: rgba(255, 74, 90, 0.04);
    border: 1px solid rgba(255, 74, 90, 0.08);
    border-radius: 12px;
    padding: 12px 18px;
}

.bp-note-text {
    font-size: 11.5px;
    font-weight: 700;
    color: #ff4a5a !important;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Roadmap Flow */
.bp-process-flow {
    border-top: 1px dashed rgba(8, 10, 12, 0.12);
    padding-top: 24px;
}

.bp-flow-heading {
    font-family: 'Chakra Petch', sans-serif;
    font-size: 12px;
    font-weight: 800;
    color: #0b0d10;
    text-transform: uppercase;
    letter-spacing: 0.8px;
}

.bp-timeline-container {
    position: relative;
    width: 100%;
}

.bp-timeline-line {
    position: absolute;
    top: 18px;
    left: 4%;
    width: 92%;
    height: 2px;
    background: linear-gradient(90deg, #0b0d10 0%, #dfff00 50%, #0b0d10 100%);
    opacity: 0.25;
    z-index: 0;
}

.bp-timeline-steps {
    display: flex;
    justify-content: space-between;
    position: relative;
    z-index: 1;
}

.bp-t-step {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    width: 22%;
}

.bp-t-number {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: #0b0d10;
    color: #ffffff;
    font-family: 'Orbitron', 'Chakra Petch', sans-serif;
    font-size: 12px;
    font-weight: 800;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid #ffffff;
    box-shadow: 0 6px 15px rgba(8, 10, 12, 0.15);
    margin-bottom: 10px;
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.bp-t-step:hover .bp-t-number {
    background: #dfff00;
    color: #0b0d10;
    transform: scale(1.15);
    box-shadow: 0 8px 20px rgba(195, 226, 0, 0.35);
}

.bp-t-label {
    font-size: 11px;
    font-weight: 800;
    color: #68707a;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    line-height: 1.3;
}

/* Right Column: Cyber Cockpit Panel */
.bp-cyber-calc-card {
    background: #0b0d10 !important;
    border: 1px solid rgba(223, 255, 0, 0.15) !important;
    border-radius: 32px !important;
    padding: 44px !important;
    box-shadow: 0 32px 80px rgba(0, 0, 0, 0.48) !important;
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
}

.bp-cyber-scan-line {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, transparent 50%, rgba(223, 255, 0, 0.02) 50%), linear-gradient(90deg, rgba(223, 255, 0, 0.01), transparent);
    background-size: 100% 4px, 4px 100%;
    z-index: 0;
    pointer-events: none;
}

.bp-cyber-grid-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle at 85% 15%, rgba(223, 255, 0, 0.08), transparent 45%);
    z-index: 0;
    pointer-events: none;
}

.bp-cyber-calc-card .bp-card-header-block {
    position: relative;
    z-index: 1;
}

.calculator-icon {
    background: #dfff00;
    color: #0b0d10;
    box-shadow: 0 10px 24px rgba(195, 226, 0, 0.3);
}

.bp-cyber-calc-card .bp-card-subtitle-new {
    color: rgba(255, 255, 255, 0.5) !important;
}

/* Form Styles */
.bp-calc-form {
    position: relative;
    z-index: 1;
    margin-top: 12px;
}

.bp-input-label {
    font-size: 12px !important;
    font-weight: 800 !important;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #ffffff !important;
}

.bp-input-status-pulse {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #dfff00;
    box-shadow: 0 0 10px #dfff00;
    display: inline-block;
    animation: statusPulse 1.8s infinite;
}

/* Custom Input Box */
.bp-input-cyber-wrapper {
    position: relative;
    height: 60px;
    display: flex;
    align-items: center;
    background: rgba(255, 255, 255, 0.03);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 16px;
    overflow: hidden;
    padding: 0 20px;
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.bp-currency-indicator {
    font-family: 'Orbitron', 'Chakra Petch', sans-serif;
    color: #dfff00;
    font-size: 20px;
    font-weight: 900;
    margin-right: 14px;
    user-select: none;
}

.bp-cyber-input {
    flex: 1;
    background: transparent !important;
    border: none !important;
    outline: none !important;
    color: #ffffff !important;
    font-family: 'Orbitron', 'Chakra Petch', sans-serif;
    font-size: 22px !important;
    font-weight: 900 !important;
    padding: 0 !important;
    width: 100%;
}

.bp-cyber-input::placeholder {
    color: rgba(255, 255, 255, 0.2) !important;
    font-size: 15px;
    font-weight: 600;
    font-family: 'Chakra Petch', sans-serif;
}

.bp-cyber-input-border {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0%;
    height: 2px;
    background: #dfff00;
    transition: width 0.4s ease;
}

.bp-input-cyber-wrapper:focus-within {
    border-color: rgba(223, 255, 0, 0.3);
    background: rgba(255, 255, 255, 0.05);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.bp-input-cyber-wrapper:focus-within .bp-cyber-input-border {
    width: 100%;
}

/* Digital Cockpit Breakdown */
.bp-digital-cockpit {
    position: relative;
    background: rgba(255, 255, 255, 0.02);
    border: 1px solid rgba(255, 255, 255, 0.06);
    border-radius: 24px;
    padding: 24px;
    overflow: hidden;
}

.bp-cockpit-glow {
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(223, 255, 0, 0.02) 0%, transparent 60%);
    pointer-events: none;
}

.bp-cockpit-header {
    font-family: 'Orbitron', sans-serif;
    font-size: 10px;
    font-weight: 800;
    color: rgba(255, 255, 255, 0.3);
    letter-spacing: 1.5px;
}

.bp-cockpit-model {
    color: #dfff00;
}

.bp-cockpit-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: rgba(255, 255, 255, 0.01);
    border: 1px solid rgba(255, 255, 255, 0.03);
    border-radius: 12px;
    padding: 10px 16px;
}

.bp-row-meta {
    display: flex;
    align-items: center;
    gap: 8px;
}

.bp-row-indicator {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
}

.bp-row-indicator.bonus-indicator {
    background: #ff4a5a;
    box-shadow: 0 0 6px #ff4a5a;
}

.bp-row-name {
    font-size: 12px;
    font-weight: 800;
    color: rgba(255, 255, 255, 0.6);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.bp-row-input-wrap {
    display: flex;
    align-items: center;
    gap: 6px;
}

.bp-cockpit-display {
    width: 140px;
    text-align: right;
    background: transparent !important;
    border: none !important;
    outline: none !important;
    font-family: 'Orbitron', 'Chakra Petch', sans-serif;
    color: #ffffff !important;
    font-size: 17px !important;
    font-weight: 800 !important;
    padding: 0 !important;
}

.bp-cockpit-display.bonus {
    color: #ff4a5a !important;
}

.bp-row-unit {
    font-family: 'Orbitron', sans-serif;
    font-size: 10px;
    font-weight: 800;
    color: rgba(255, 255, 255, 0.2);
}

.bp-cockpit-separator {
    height: 1px;
    border-top: 1px dashed rgba(255, 255, 255, 0.1);
}

/* Scoreboard Panel */
.bp-scoreboard-panel {
    position: relative;
    background: rgba(223, 255, 0, 0.04);
    border: 1px solid rgba(223, 255, 0, 0.15);
    border-radius: 16px;
    padding: 16px 20px;
    overflow: hidden;
}

.bp-scoreboard-bg {
    position: absolute;
    inset: 0;
    background: repeating-linear-gradient(0deg, rgba(223, 255, 0, 0.01) 0px, rgba(223, 255, 0, 0.01) 1px, transparent 1px, transparent 4px);
    z-index: 0;
}

.bp-scoreboard-header {
    position: relative;
    z-index: 1;
}

.bp-scoreboard-label {
    font-size: 11px;
    font-weight: 900;
    color: #dfff00;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.bp-scoreboard-glow-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #dfff00;
    box-shadow: 0 0 10px #dfff00;
}

.bp-scoreboard-value-wrap {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    gap: 10px;
}

.bp-bolt-icon {
    font-size: 22px;
    color: #dfff00;
    animation: lightningFlicker 3s infinite;
}

.bp-scoreboard-display {
    flex: 1;
    background: transparent !important;
    border: none !important;
    outline: none !important;
    font-family: 'Orbitron', 'Chakra Petch', sans-serif;
    color: #dfff00 !important;
    font-size: 30px !important;
    font-weight: 900 !important;
    padding: 0 !important;
    text-shadow: 0 0 15px rgba(223, 255, 0, 0.4);
    width: 100%;
}

.bp-scoreboard-unit {
    font-family: 'Orbitron', sans-serif;
    font-size: 12px;
    font-weight: 900;
    color: #dfff00;
    opacity: 0.6;
}

/* Submit CTA button */
.bp-cyber-submit-btn {
    position: relative;
    width: 100%;
    height: 56px;
    border-radius: 16px;
    border: none;
    background: #dfff00;
    color: #0b0d10;
    font-family: 'Chakra Petch', sans-serif;
    font-size: 15px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 16px 36px rgba(195, 226, 0, 0.24);
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.bp-cyber-submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 20px 48px rgba(195, 226, 0, 0.38);
    background: #e6ff33;
}

.bp-cyber-submit-btn:active {
    transform: translateY(1px);
}

.btn-shine {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
    transition: all 0.6s ease;
}

.bp-cyber-submit-btn:hover .btn-shine {
    left: 100%;
}

/* Animations */
@keyframes flowLight {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

@keyframes statusPulse {
    0% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.4); opacity: 0.5; }
    100% { transform: scale(1); opacity: 1; }
}

@keyframes lightningFlicker {
    0%, 100% { opacity: 1; filter: drop-shadow(0 0 5px rgba(223, 255, 0, 0.8)); }
    45% { opacity: 1; }
    50% { opacity: 0.4; }
    55% { opacity: 0.8; }
    60% { opacity: 0.2; }
    65% { opacity: 1; }
}

/* responsive overrides */
@media (max-width: 991px) {
    .bp-timeline-line {
        display: none;
    }
    .bp-timeline-steps {
        flex-direction: column;
        gap: 16px;
        align-items: flex-start;
    }
    .bp-t-step {
        width: 100%;
        flex-direction: row;
        gap: 14px;
        text-align: left;
    }
    .bp-t-number {
        margin-bottom: 0;
    }
    .bp-tier-card, .bp-cyber-calc-card {
        padding: 28px !important;
    }
}

/* Cinematic Video Showcase Section Refreshed */
.cinema-showcase-section {
    position: relative;
    padding: 80px 0 100px !important;
}

.cinema-card-frame {
    position: relative;
    background: #0b0d10 !important;
    border: 1px solid rgba(223, 255, 0, 0.15) !important;
    border-radius: 32px !important;
    padding: 56px !important;
    box-shadow: 0 32px 80px rgba(0, 0, 0, 0.36) !important;
    overflow: hidden;
}

.cinema-glow-underlay {
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(223, 255, 0, 0.05) 0%, transparent 60%);
    pointer-events: none;
    z-index: 0;
}

.cinema-text-block {
    position: relative;
    z-index: 2;
}

.cinema-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.04);
    border: 1px solid rgba(255, 255, 255, 0.08);
    padding: 6px 14px;
    border-radius: 999px;
    font-size: 11px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #ffffff;
}

.cinema-title {
    color: #ffffff !important;
    font-size: clamp(30px, 4vw, 42px) !important;
    font-weight: 900 !important;
    line-height: 1.15;
    text-transform: uppercase;
    letter-spacing: -0.5px;
}

.gradient-lime-text {
    background: linear-gradient(135deg, #ffffff 30%, #dfff00 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.cinema-description {
    color: rgba(255, 255, 255, 0.6) !important;
    font-size: 15px !important;
    line-height: 1.6 !important;
}

.cinema-bullets {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.cinema-bullets li {
    display: flex;
    align-items: center;
    gap: 12px;
}

.bullet-node {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background: rgba(223, 255, 0, 0.12);
    border: 1px solid rgba(223, 255, 0, 0.3);
    color: #dfff00;
    font-size: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 0 10px rgba(223, 255, 0, 0.1);
}

.bullet-label {
    font-size: 13.5px;
    font-weight: 700;
    color: rgba(255, 255, 255, 0.85) !important;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.cinema-cta-btn {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    height: 56px;
    padding: 0 34px;
    border-radius: 16px;
    border: none;
    background: #dfff00;
    color: #0b0d10 !important;
    font-family: 'Chakra Petch', sans-serif;
    font-size: 14px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    overflow: hidden;
    box-shadow: 0 16px 36px rgba(195, 226, 0, 0.24);
    cursor: pointer;
    text-decoration: none !important;
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.cinema-cta-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 20px 48px rgba(195, 226, 0, 0.38);
    background: #e6ff33;
}

.cinema-cta-btn:active {
    transform: translateY(1px);
}

/* Widescreen Video Frame */
.cinema-video-container {
    position: relative;
    width: 100%;
    aspect-ratio: 16/9;
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.08);
    overflow: hidden;
    box-shadow: 0 24px 64px rgba(0, 0, 0, 0.5);
    background: #000000;
}

.cinema-decor-corner {
    position: absolute;
    width: 12px;
    height: 12px;
    border-color: #dfff00;
    border-style: solid;
    z-index: 2;
    pointer-events: none;
    opacity: 0.85;
}

.corner-tl { top: 12px; left: 12px; border-width: 2px 0 0 2px; }
.corner-tr { top: 12px; right: 12px; border-width: 2px 2px 0 0; }
.corner-bl { bottom: 12px; left: 12px; border-width: 0 0 2px 2px; }
.corner-br { bottom: 12px; right: 12px; border-width: 0 2px 2px 0; }

.cinema-video-glare {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.08) 0%, transparent 50%);
    z-index: 1;
    pointer-events: none;
}

.cinema-video-element {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.cinema-video-container:hover .cinema-video-element {
    transform: scale(1.03);
}

/* Responsive overrides */
@media (max-width: 991px) {
    .cinema-card-frame {
        padding: 34px !important;
    }
    .cinema-video-container {
        margin-top: 24px;
    }
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
<script>
$(document).ready(function() {
  // Initialize Swiper Thumbs Gallery Slider
  var swiper = new Swiper(".mySwiper", {
    loop: false,
    spaceBetween: 12,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
    breakpoints: {
      320: { slidesPerView: 2, spaceBetween: 8 },
      575: { slidesPerView: 3, spaceBetween: 10 },
      768: { slidesPerView: 4, spaceBetween: 12 },
      1200: { slidesPerView: 5, spaceBetween: 16 }
    }
  });
  
  var swiper2 = new Swiper(".mySwiper2", {
    loop: false,
    spaceBetween: 10,
    navigation: {
      nextEl: ".pg-swiper-btn-next",
      prevEl: ".pg-swiper-btn-prev",
    },
    thumbs: {
      swiper: swiper,
    },
  });

  var currency = "{{ session('currency') }}";
  
  function basicpoints(truepoints){
    truepoints = parseFloat(truepoints);
    if (currency === "HKD") {
      truepoints = truepoints / 8;
    } else if (currency === "JPY") {
      truepoints = truepoints / 160;
    }
    return Math.floor(truepoints);
  }
  
  function calpoints(truepoints){
    truepoints = parseFloat(truepoints);
    if (currency === "HKD") {
      switch (true) {
        case (truepoints > 1 && truepoints < 5001):
          truepoints = truepoints;
          break;
        case (truepoints > 5000 && truepoints < 15001):
          truepoints = Math.floor(truepoints * 1.5);
          break;
        case (truepoints > 15000 && truepoints < 25001):
          truepoints = Math.floor(truepoints * 2);
          break;
        case (truepoints >= 25001):
          truepoints = Math.floor(truepoints * 5);
          break;
        default:
          truepoints = truepoints;
          break;
      }
      truepoints = truepoints / 8;
    } else if (currency === "JPY") {
      switch (true) {
        case (truepoints > 1 && truepoints < 100001):
          truepoints = truepoints;
          break;
        case (truepoints > 100000 && truepoints < 300001):
          truepoints = Math.floor(truepoints * 1.5);
          break;
        case (truepoints > 300000 && truepoints < 500001):
          truepoints = Math.floor(truepoints * 2);
          break;
        case (truepoints >= 500001):
          truepoints = Math.floor(truepoints * 5);
          break;
        default:
          truepoints = truepoints;
          break;
      }
      truepoints = truepoints / 160;
    } else if (currency === "USD") {
      switch (true) {
        case (truepoints > 1 && truepoints < 631):
          truepoints = truepoints;
          break;
        case (truepoints > 630 && truepoints < 1881):
          truepoints = Math.floor(truepoints * 1.5);
          break;
        case (truepoints > 1880 && truepoints < 3126):
          truepoints = Math.floor(truepoints * 2);
          break;
        case (truepoints >= 3125):
          truepoints = Math.floor(truepoints * 5);
          break;
        default:
          truepoints = truepoints;
          break;
      }
    }
    return Math.floor(truepoints);
  }
  
  $('#price').on('keyup', function() {
    var value = $(this).val();
    $('#points').val(basicpoints(value));
    $('#bonus_points').val(calpoints(value) - basicpoints(value));
    $('#total_points').val(calpoints(value));
  });
  
  if ($('#price').val()) {
    $('#price').trigger('keyup');
  }
});
</script>
@endpush
