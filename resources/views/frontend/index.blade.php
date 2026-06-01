@extends('frontend.layouts.main')

@section('main-content')

    <!-- Hero Banner start -->
    <div class="hero-banner-1">
      <video class="hero-video" autoplay muted loop playsinline>
        <source src="{{asset('assets/images/hero.mp4')}}" type="video/mp4">
      </video>
      <div class="hero-bg-overlay"></div>
      <div class="hero-bg-effects">
        <div class="hero-glow hero-glow-1"></div>
        <div class="hero-glow hero-glow-2"></div>
        <div class="hero-glow hero-glow-3"></div>
      </div>
      <div class="container position-relative h-100">
        <div class="row align-items-center h-100">
          <div class="col-lg-7">
            <div class="content">
              <div class="hero-badge mb-4">
                <span class="live-dot"></span>
                <span>{{ __('common.gaming_zone') }}</span>
              </div>
              <h1 class="mb-4 color-white">
                {{ __('common.game_on') }}<br>
                <span class="gradient-text">{{ __('common.challenges') }}</span>
              </h1>
              <p class="hero-subtitle mb-0" style="max-width:600px">{{ __('common.boost_your_rank1') }}<br>{{ __('common.boost_your_rank2') }}<br> {{ __('common.boost_your_rank3') }}</p>
              <div class="btn-block mt-4">
                <a href="{{route('register.form')}}" class="cus-btn primary">{{ __('common.join_now') }}<i class="fas fa-chevron-right"></i></a>
                <a href="#points-topup" class="cus-btn points">{{ __('common.points_topup_title') }}<i class="fas fa-bolt"></i></a>
                <a href="{{route('about-us')}}" class="cus-btn sec">{{ __('common.read_more') }}<i class="far fa-book-open"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="hero-showcase">
              <div class="hero-showcase-card hero-showcase-main">
                <img src="{{asset('assets/media/banner/side-image.png')}}" alt="{{ __('common.gaming_zone') }}" loading="eager">
              </div>
              <div class="hero-showcase-pill hero-pill-top">{{ __('common.fast_secure') }}</div>
              <div class="hero-showcase-pill hero-pill-bottom">{{ __('common.instant_delivery') }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Hero Banner End -->

    <!-- Main Content Start -->
    <div class="page-content">
      
      <!-- Game Streams Grid Start - Functional Carousel -->
      <section class="game-grid-section">
        <div class="container">
          <div class="section-header">
            <div>
              <span class="section-tag">{{ __('common.gaming_zone') }}</span>
              <h2>{{ __('common.game_streams') }}</h2>
            </div>
            <a href="{{ route('product-grids') }}" class="category-more-cta">
              {{ __('common.browse_categories') }}
              <i class="fas fa-arrow-right"></i>
            </a>
          </div>
          
          @php
            $categories = Helper::productCategoryList("all");
            $allCategories = $categories->reverse()->values();
          @endphp
          
          <!-- Carousel Container -->
          <div class="game-carousel-wrapper" id="gameCarousel">
            <div class="game-carousel-track">
              
              <!-- Page 1: Games 1-4 -->
              <div class="game-carousel-page active" data-page="1">
                <div class="gear-carousel">
                  <div class="gear-main">
                    <a href="{{route('product-cat', $allCategories[0]->slug ?? '#')}}" class="gear-big">
                      <div class="gear-image">
                        @if(isset($allCategories[0]))
                          <img src="{{url($allCategories[0]->photo)}}" alt="{{$allCategories[0]->title}}" loading="lazy">
                        @endif
                      </div>
                      <div class="gear-overlay"></div>
                      <div class="gear-content">
                        <span class="gear-badge">01</span>
                        <h3>{{$allCategories[0]->title ?? 'Game 1'}}</h3>
                        <span class="gear-cta">{{__('common.explore')}} <i class="fas fa-arrow-right"></i></span>
                      </div>
                    </a>
                  </div>
                  <div class="gear-stack">
                    <div class="gear-top">
                      @if(isset($allCategories[1]))
                      <a href="{{route('product-cat', $allCategories[1]->slug)}}" class="gear-small">
                        <div class="gear-image">
                          <img src="{{url($allCategories[1]->photo)}}" alt="{{$allCategories[1]->title}}" loading="lazy">
                        </div>
                        <div class="gear-overlay"></div>
                        <div class="gear-content">
                          <span class="gear-badge">02</span>
                          <h3>{{$allCategories[1]->title}}</h3>
                          <span class="gear-cta">{{__('common.explore')}} <i class="fas fa-arrow-right"></i></span>
                        </div>
                      </a>
                      @endif
                      @if(isset($allCategories[2]))
                      <a href="{{route('product-cat', $allCategories[2]->slug)}}" class="gear-small">
                        <div class="gear-image">
                          <img src="{{url($allCategories[2]->photo)}}" alt="{{$allCategories[2]->title}}" loading="lazy">
                        </div>
                        <div class="gear-overlay"></div>
                        <div class="gear-content">
                          <span class="gear-badge">03</span>
                          <h3>{{$allCategories[2]->title}}</h3>
                          <span class="gear-cta">{{__('common.explore')}} <i class  ="fas fa-arrow-right"></i></span>
                        </div>
                      </a>
                      @endif
                    </div>
                    <div class="gear-bottom">
                      @if(isset($allCategories[3]))
                      <a href="{{route('product-cat', $allCategories[3]->slug)}}" class="gear-horizontal">
                        <div class="gear-image">
                          <img src="{{url($allCategories[3]->photo)}}" alt="{{$allCategories[3]->title}}" loading="lazy">
                        </div>
                        <div class="gear-overlay"></div>
                        <div class="gear-content">
                          <span class="gear-badge">04</span>
                          <h3>{{$allCategories[3]->title}}</h3>
                          <span class="gear-cta">{{__('common.explore')}} <i class="fas fa-arrow-right"></i></span>
                        </div>
                      </a>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Page 2: Games 5-8 -->
              <div class="game-carousel-page" data-page="2">
                <div class="gear-carousel">
                  <div class="gear-main">
                    @if(isset($allCategories[4]))
                    <a href="{{route('product-cat', $allCategories[4]->slug)}}" class="gear-big">
                      <div class="gear-image">
                        <img src="{{url($allCategories[4]->photo)}}" alt="{{$allCategories[4]->title}}" loading="lazy">
                      </div>
                      <div class="gear-overlay"></div>
                      <div class="gear-content">
                        <span class="gear-badge">05</span>
                        <h3>{{$allCategories[4]->title}}</h3>
                        <span class="gear-cta">{{__('common.explore')}} <i class="fas fa-arrow-right"></i></span>
                      </div>
                    </a>
                    @endif
                  </div>
                  <div class="gear-stack">
                    <div class="gear-top">
                      @if(isset($allCategories[5]))
                      <a href="{{route('product-cat', $allCategories[5]->slug)}}" class="gear-small">
                        <div class="gear-image">
                          <img src="{{url($allCategories[5]->photo)}}" alt="{{$allCategories[5]->title}}" loading="lazy">
                        </div>
                        <div class="gear-overlay"></div>
                        <div class="gear-content">
                          <span class="gear-badge">06</span>
                          <h3>{{$allCategories[5]->title}}</h3>
                          <span class="gear-cta">{{__('common.explore')}} <i class="fas fa-arrow-right"></i></span>
                        </div>
                      </a>
                      @endif
                      @if(isset($allCategories[6]))
                      <a href="{{route('product-cat', $allCategories[6]->slug)}}" class="gear-small">
                        <div class="gear-image">
                          <img src="{{url($allCategories[6]->photo)}}" alt="{{$allCategories[6]->title}}" loading="lazy">
                        </div>
                        <div class="gear-overlay"></div>
                        <div class="gear-content">
                          <span class="gear-badge">07</span>
                          <h3>{{$allCategories[6]->title}}</h3>
                          <span class="gear-cta">{{__('common.explore')}} <i class="fas fa-arrow-right"></i></span>
                        </div>
                      </a>
                      @endif
                    </div>
                    <div class="gear-bottom">
                      @if(isset($allCategories[7]))
                      <a href="{{route('product-cat', $allCategories[7]->slug)}}" class="gear-horizontal">
                        <div class="gear-image">
                          <img src="{{url($allCategories[7]->photo)}}" alt="{{$allCategories[7]->title}}" loading="lazy">
                        </div>
                        <div class="gear-overlay"></div>
                        <div class="gear-content">
                          <span class="gear-badge">08</span>
                          <h3>{{$allCategories[7]->title}}</h3>
                          <span class="gear-cta">{{__('common.explore')}} <i class="fas fa-arrow-right"></i></span>
                        </div>
                      </a>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Page 3: Games 9-12 -->
              <div class="game-carousel-page" data-page="3">
                <div class="gear-carousel">
                  <div class="gear-main">
                    @if(isset($allCategories[8]))
                    <a href="{{route('product-cat', $allCategories[8]->slug)}}" class="gear-big">
                      <div class="gear-image">
                        <img src="{{url($allCategories[8]->photo)}}" alt="{{$allCategories[8]->title}}" loading="lazy">
                      </div>
                      <div class="gear-overlay"></div>
                      <div class="gear-content">
                        <span class="gear-badge">09</span>
                        <h3>{{$allCategories[8]->title}}</h3>
                        <span class="gear-cta">{{__('common.explore')}} <i class="fas fa-arrow-right"></i></span>
                      </div>
                    </a>
                    @endif
                  </div>
                  <div class="gear-stack">
                    <div class="gear-top">
                      @if(isset($allCategories[9]))
                      <a href="{{route('product-cat', $allCategories[9]->slug)}}" class="gear-small">
                        <div class="gear-image">
                          <img src="{{url($allCategories[9]->photo)}}" alt="{{$allCategories[9]->title}}" loading="lazy">
                        </div>
                        <div class="gear-overlay"></div>
                        <div class="gear-content">
                          <span class="gear-badge">10</span>
                          <h3>{{$allCategories[9]->title}}</h3>
                          <span class="gear-cta">{{__('common.explore')}} <i class="fas fa-arrow-right"></i></span>
                        </div>
                      </a>
                      @endif
                      @if(isset($allCategories[10]))
                      <a href="{{route('product-cat', $allCategories[10]->slug)}}" class="gear-small">
                        <div class="gear-image">
                          <img src="{{url($allCategories[10]->photo)}}" alt="{{$allCategories[10]->title}}" loading="lazy">
                        </div>
                        <div class="gear-overlay"></div>
                        <div class="gear-content">
                          <span class="gear-badge">11</span>
                          <h3>{{$allCategories[10]->title}}</h3>
                          <span class="gear-cta">{{__('common.explore')}} <i class="fas fa-arrow-right"></i></span>
                        </div>
                      </a>
                      @endif
                    </div>
                    <div class="gear-bottom">
                      @if(isset($allCategories[11]))
                      <a href="{{route('product-cat', $allCategories[11]->slug)}}" class="gear-horizontal">
                        <div class="gear-image">
                          <img src="{{url($allCategories[11]->photo)}}" alt="{{$allCategories[11]->title}}" loading="lazy">
                        </div>
                        <div class="gear-overlay"></div>
                        <div class="gear-content">
                          <span class="gear-badge">12</span>
                          <h3>{{$allCategories[11]->title}}</h3>
                          <span class="gear-cta">{{__('common.explore')}} <i class="fas fa-arrow-right"></i></span>
                        </div>
                      </a>
                      @endif
                    </div>
                  </div>
                </div>
              </div>

              <!-- Page 4: Games 13-16 -->
              <div class="game-carousel-page" data-page="4">
                <div class="gear-carousel">
                  <div class="gear-main">
                    @if(isset($allCategories[12]))
                    <a href="{{route('product-cat', $allCategories[12]->slug)}}" class="gear-big">
                      <div class="gear-image">
                        <img src="{{url($allCategories[12]->photo)}}" alt="{{$allCategories[12]->title}}" loading="lazy">
                      </div>
                      <div class="gear-overlay"></div>
                      <div class="gear-content">
                        <span class="gear-badge">13</span>
                        <h3>{{$allCategories[12]->title}}</h3>
                        <span class="gear-cta">{{__('common.explore')}} <i class  ="fas fa-arrow-right"></i></span>
                      </div>
                    </a>
                    @endif
                  </div>
                  <div class="gear-stack">
                    <div class="gear-top">
                      @if(isset($allCategories[13]))
                      <a href="{{route('product-cat', $allCategories[13]->slug)}}" class="gear-small">
                        <div class="gear-image">
                          <img src="{{url($allCategories[13]->photo)}}" alt="{{$allCategories[13]->title}}" loading="lazy">
                        </div>
                        <div class="gear-overlay"></div>
                        <div class="gear-content">
                          <span class="gear-badge">14</span>
                          <h3>{{$allCategories[13]->title}}</h3>
                          <span class="gear-cta">{{__('common.explore')}} <i class  ="fas fa-arrow-right"></i></span>
                        </div>
                      </a>
                      @endif
                      @if(isset($allCategories[14]))
                      <a href="{{route('product-cat', $allCategories[14]->slug)}}" class="gear-small">
                        <div class="gear-image">
                          <img src="{{url($allCategories[14]->photo)}}" alt="{{$allCategories[14]->title}}" loading="lazy">
                        </div>
                        <div class="gear-overlay"></div>
                        <div class="gear-content">
                          <span class="gear-badge">15</span>
                          <h3>{{$allCategories[14]->title}}</h3>
                          <span class="gear-cta">{{__('common.explore')}} <i class="fas fa-arrow-right"></i></span>
                        </div>
                      </a>
                      @endif
                    </div>
                    <div class="gear-bottom">
                      @if(isset($allCategories[15]))
                      <a href="{{route('product-cat', $allCategories[15]->slug)}}" class="gear-horizontal">
                        <div class="gear-image">
                          <img src="{{url($allCategories[15]->photo)}}" alt="{{$allCategories[15]->title}}" loading="lazy">
                        </div>
                        <div class="gear-overlay"></div>
                        <div class="gear-content">
                          <span class="gear-badge">16</span>
                          <h3>{{$allCategories[15]->title}}</h3>
                          <span class="gear-cta">{{__('common.explore')}} <i class="fas fa-arrow-right"></i></span>
                        </div>
                      </a>
                      @endif
                    </div>
                  </div>
                </div>
              </div>

              <!-- Page 5: Games 17-20 -->
              <div class="game-carousel-page" data-page="5">
                <div class="gear-carousel">
                  <div class="gear-main">
                    @if(isset($allCategories[16]))
                    <a href="{{route('product-cat', $allCategories[16]->slug)}}" class="gear-big">
                      <div class="gear-image">
                        <img src="{{url($allCategories[16]->photo)}}" alt="{{$allCategories[16]->title}}" loading="lazy">
                      </div>
                      <div class="gear-overlay"></div>
                      <div class="gear-content">
                        <span class="gear-badge">17</span>
                        <h3>{{$allCategories[16]->title}}</h3>
                        <span class="gear-cta">{{__('common.explore')}} <i class="fas fa-arrow-right"></i></span>
                      </div>
                    </a>
                    @endif
                  </div>
                  <div class="gear-stack">
                    <div class="gear-top">
                      @if(isset($allCategories[17]))
                      <a href="{{route('product-cat', $allCategories[17]->slug)}}" class="gear-small">
                        <div class="gear-image">
                          <img src="{{url($allCategories[17]->photo)}}" alt="{{$allCategories[17]->title}}" loading="lazy">
                        </div>
                        <div class="gear-overlay"></div>
                        <div class="gear-content">
                          <span class="gear-badge">18</span>
                          <h3>{{$allCategories[17]->title}}</h3>
                          <span class="gear-cta">{{__('common.explore')}} <i class="fas fa-arrow-right"></i></span>
                        </div>
                      </a>
                      @endif
                      @if(isset($allCategories[18]))
                      <a href="{{route('product-cat', $allCategories[18]->slug)}}" class="gear-small">
                        <div class="gear-image">
                          <img src="{{url($allCategories[18]->photo)}}" alt="{{$allCategories[18]->title}}" loading="lazy">
                        </div>
                        <div class="gear-overlay"></div>
                        <div class="gear-content">
                          <span class="gear-badge">19</span>
                          <h3>{{$allCategories[18]->title}}</h3>
                          <span class="gear-cta">{{__('common.explore')}} <i class="fas fa-arrow-right"></i></span>
                        </div>
                      </a>
                      @endif
                    </div>
                    <div class="gear-bottom">
                      @if(isset($allCategories[19]))
                      <a href="{{route('product-cat', $allCategories[19]->slug)}}" class="gear-horizontal">
                        <div class="gear-image">
                          <img src="{{url($allCategories[19]->photo)}}" alt="{{$allCategories[19]->title}}" loading="lazy">
                        </div>
                        <div class="gear-overlay"></div>
                        <div class="gear-content">
                          <span class="gear-badge">20</span>
                          <h3>{{$allCategories[19]->title}}</h3>
                          <span class="gear-cta">{{__('common.explore')}} <i class="fas fa-arrow-right"></i></span>
                        </div>
                      </a>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            
            <!-- Navigation Controls -->
            <div class="game-carousel-nav">
              <button class="carousel-nav-btn prev-btn" onclick="goToSlide(-1)">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
                <span>{{ __('common.previous') }}</span>
              </button>
              <div class="carousel-dots">
                <span class="dot active" onclick="goToSlide(1)"></span>
                <span class="dot" onclick="goToSlide(2)"></span>
                <span class="dot" onclick="goToSlide(3)"></span>
                <span class="dot" onclick="goToSlide(4)"></span>
                <span class="dot" onclick="goToSlide(5)"></span>
              </div>
              <button class="carousel-nav-btn next-btn" onclick="goToSlide(1)">
                <span>{{ __('common.next') }}</span>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
              </button>
            </div>
          </div>
          
          
        </div>
      </section>
      <!-- Game Streams Grid End -->
      <!-- Features Section - Bento Grid -->
      <section class="features-section">
        <div class="container">
          <div class="section-header text-center">
            <h2>{{ __('common.why_choose_us') }}</h2>
            <p class="section-subtitle">{{ __('common.why_choose_us_desc') }}</p>
          </div>
          
          <div class="bento-grid">
            <!-- Feature 1 - Large Card -->
            <div class="bento-card bento-large">
              <div class="bento-icon">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                </svg>
              </div>
              <h3>{{ __('common.fast_secure') }}</h3>
              <p>{{ __('common.fast_secure_desc') }}</p>
              <div class="bento-glow"></div>
            </div>
            
            <!-- Feature 2 - Medium Card -->
            <div class="bento-card bento-medium">
              <div class="bento-icon">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <circle cx="12" cy="12" r="10"></circle>
                  <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                  <line x1="9" y1="9" x2="9.01" y2="9"></line>
                  <line x1="15" y1="9" x2="15.01" y2="9"></line>
                </svg>
              </div>
              <h3>{{ __('common.expert_boosters') }}</h3>
              <p>{{ __('common.expert_boosters_desc') }}</p>
            </div>
            
            <!-- Feature 3 - Medium Card -->
            <div class="bento-card bento-medium">
              <div class="bento-icon">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                  <polyline points="17 6 23 6 23 12"></polyline>
                </svg>
              </div>
              <h3>{{ __('common.guaranteed_progress') }}</h3>
              <p>{{ __('common.guaranteed_progress_desc') }}</p>
            </div>
            
            <!-- Feature 4 - Wide Card -->
            <div class="bento-card bento-wide">
              <div class="bento-icon">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                  <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
              </div>
              <div class="bento-content">
                <h3>{{ __('common.safe_confidential') }}</h3>
                <p>{{ __('common.safe_confidential_desc') }}</p>
              </div>
              <div class="bento-badge">24/7</div>
            </div>
            
            <!-- Feature 5 - Standard Card -->
            <div class="bento-card">
              <div class="bento-icon">
                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                  <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
              </div>
              <h4>{{ __('common.instant_delivery') }}</h4>
              <p>{{ __('common.instant_delivery_desc') }}</p>
            </div>
            
            <!-- Feature 6 - Standard Card -->
            <div class="bento-card">
              <div class="bento-icon">
                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                  <path d="M2 17l10 5 10-5"></path>
                  <path d="M2 12l10 5 10-5"></path>
                </svg>
              </div>
              <h4>{{ __('common.multi_game_support') }}</h4>
              <p>{{ __('common.multi_game_support_desc') }}</p>
            </div>
          </div>
        </div>
      </section>
      <!-- Features Section End -->

      <!-- Points Top-Up Section -->
      <section class="bp-topup-section" id="points-topup">
        <div class="container">
          <!-- Disclaimer -->
          <div class="bp-topup-disclaimer">
            <p>{{ __('common.disclaimer') }}</p>
          </div>

          <!-- Header -->
          <div class="bp-topup-header text-center">
            <h2>{{ __('common.points_topup_title') }}</h2>
            <p class="bp-topup-tagline">{{ __('common.points_topup_tagline') }}</p>
          </div>

          <!-- Intro -->
          <div class="bp-topup-intro text-center">
            <p>{{ __('common.points_topup_intro_1') }}</p>
            <p>{{ __('common.points_topup_intro_2') }}</p>
          </div>

          <!-- Main Content: Tier Table Left, Calculator Right - Equal Height -->
          <div class="row bp-equal-height">
            <!-- Left Column: Bonus Tier Table -->
            <div class="col-lg-6">
              <!-- Bonus Table Card -->
              <div class="bp-card h-100">
                <h4 class="bp-card-title">{{ __('common.bonus_tier_title') }}</h4>
                <div class="table-responsive">
                  <table class="bp-bonus-table">
                    <thead>
                      <tr>
                        <th>{{ __('common.bonus_table_range') }} ({{ Helper::getCurrencySymbol(session('currency'))}})</th>
                        <th>{{ __('common.bonus_table_multiplier') }}</th>
                        <th>{{ __('common.bonus_table_benefit') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{ session('currency') == 'JPY' ? '¥1 – ¥100,000' : (session('currency') == 'HKD' ? 'HK$ 1 – HK$ 5,000' : '$1 - $630') }}</td>
                        <td>1× {{ __('common.label_points') }}</td>
                        <td>{{ __('common.bonus_standard') }}</td>
                      </tr>
                      <tr>
                        <td>{{ session('currency') == 'JPY' ? '¥100,001 – ¥300,000' : (session('currency') == 'HKD' ? 'HK$ 5,001 – HK$ 15,000' : '$631 - $1,880') }}</td>
                        <td>1.5× {{ __('common.label_points') }}</td>
                        <td>{{ __('common.bonus_50_extra') }}</td>
                      </tr>
                      <tr>
                        <td>{{ session('currency') == 'JPY' ? '¥300,001 – ¥500,000' : (session('currency') == 'HKD' ? 'HK$ 15,001 – HK$ 25,000' : '$1,881 - $3,125') }}</td>
                        <td>2× {{ __('common.label_points') }}</td>
                        <td>{{ __('common.bonus_100_extra') }}</td>
                      </tr>
                      <tr>
                        <td>{{ session('currency') == 'JPY' ? __('common.500,001_and_above') : (session('currency') == 'HKD' ? __('common.25000_and_above') : __('common.3125_and_above')) }}</td>
                        <td>5× {{ __('common.label_points') }}</td>
                        <td>{{ __('common.bonus_400_extra') }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <strong class="bp-note">{{ __('common.bonus_note') }}</strong>
                <div class="bp-how-steps bp-how-steps-inline">
                  <div class="bp-how-step">
                    <div class="bp-how-number">01</div>
                    <span>{{ __('common.choose_amount') }}</span>
                  </div>
                  <div class="bp-how-connector"></div>
                  <div class="bp-how-step">
                    <div class="bp-how-number">02</div>
                    <span>{{ __('common.auto_calculate') }}</span>
                  </div>
                  <div class="bp-how-connector"></div>
                  <div class="bp-how-step">
                    <div class="bp-how-number">03</div>
                    <span>{{ __('common.complete_payment') }}</span>
                  </div>
                  <div class="bp-how-connector"></div>
                  <div class="bp-how-step">
                    <div class="bp-how-number">04</div>
                    <span>{{ __('common.instant_delivery') }}</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Right Column: Calculator -->
            <div class="col-lg-6">
              <div class="bp-card bp-calculator-card h-100">
                <div class="text-center mb-4">
                  <h4>{{ __('common.start_recharge_title') }}</h4>
                  <p>{{ __('common.start_recharge_text') }}</p>
                </div>

                <form action="{{route('points-add-to-cart')}}" method="POST">
                  @csrf
                  <input type="hidden" name="quant[1]" value="1">
                  <input type="hidden" name="slug" value="points">

                  <div class="mb-4">
                    <label class="form-label">{{ __('common.label_amount') }}</label>
                    <input type="number" class="form-control"
                           placeholder="{{ __('common.placeholder_amount', ['currency' => Helper::getCurrencySymbol(session('currency'))]) }}"
                           min="1" name="price" id="price" required>
                  </div>

                  <!-- Points Calculation -->
                  <div class="bp-calc-results">
                    <div class="bp-calc-row">
                      <span class="bp-calc-label">{{ __('common.label_points') }}</span>
                      <input type="number" class="bp-calc-input" id="points" readonly>
                    </div>
                    <div class="bp-calc-row">
                      <span class="bp-calc-label">{{ __('common.bonus_points') }}</span>
                      <input type="number" class="bp-calc-input" id="bonus_points" readonly>
                    </div>
                    <div class="bp-calc-row bp-calc-total">
                      <span class="bp-calc-label">{{ __('common.total_points') }}</span>
                      <input type="number" name="points" class="bp-calc-input" id="total_points" readonly>
                    </div>
                  </div>

                  <div class="text-center mt-4">
                    <button class="bp-btn-primary w-100" type="submit">
                      {{ __('common.add_cart') }}
                      <i class="fal fa-shopping-cart"></i>
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
      </section>
      <!-- Points Top-Up Section End -->

    </div>
    <!-- Main Content End -->

@endsection

@push('scripts')
<script>
// Game Carousel Navigation
var currentSlide = 1;
var totalSlides = 5;

function goToSlide(direction) {
    if (direction === -1) {
        currentSlide = currentSlide > 1 ? currentSlide - 1 : totalSlides;
    } else if (direction === 1) {
        currentSlide = currentSlide < totalSlides ? currentSlide + 1 : 1;
    } else {
        currentSlide = direction;
    }
    
    // Update pages
    document.querySelectorAll('.game-carousel-page').forEach(function(page) {
        page.classList.remove('active');
    });
    document.querySelector('.game-carousel-page[data-page="' + currentSlide + '"]').classList.add('active');
    
    // Update dots
    document.querySelectorAll('.carousel-dots .dot').forEach(function(dot, index) {
        dot.classList.toggle('active', index + 1 === currentSlide);
    });
    
    // Update button states
    document.querySelector('.prev-btn').style.opacity = currentSlide === 1 ? '0.5' : '1';
    document.querySelector('.next-btn').style.opacity = currentSlide === totalSlides ? '0.5' : '1';
}

$(document).ready(function() {
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
