<!-- Footer Area Start  -->
<style>
/* =====================================================================
   PolyGamez footer — clean dark theme with lime/red accents.
   Built on the app.css :root palette (var(--primary)/--accent/--text...).
   No legacy --ws-* tokens, no purple. All class names & JS hooks kept
   (#subscribe-form, #newsletterSuccess.show, .reveal, etc.).
   Footer-local dark surface shades are literal on purpose — the light
   palette has no dark-surface tokens, and the footer is the one dark zone.
   ===================================================================== */

.gaming-footer {
    background: var(--text, #0b0d10);
    color: rgba(255, 255, 255, 0.80);
    position: relative;
    overflow: hidden;
}
.gaming-footer::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 5px;
    background: linear-gradient(90deg, var(--primary, #dfff00), #ffffff, var(--accent, #ff2a2a), var(--primary, #dfff00));
}

/* ---------- Newsletter (lime band) ---------- */
.footer-newsletter-section {
    position: relative;
    padding: 48px 0;
    background: var(--primary, #dfff00);
    border-bottom: 0;
}
.newsletter-container {
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
    position: relative;
    z-index: 2;
}
.newsletter-icon {
    width: 70px; height: 70px;
    background: var(--text, #0b0d10);
    border-radius: 16px;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 20px;
    box-shadow: 0 18px 38px rgba(8, 10, 12, 0.18);
    transition: transform 0.3s ease;
}
.footer-newsletter-section:hover .newsletter-icon { transform: translateY(-4px); }
.newsletter-icon svg { width: 32px; height: 32px; color: var(--primary, #dfff00); }
.newsletter-title {
    font-family: 'Chakra Petch', sans-serif;
    font-size: 30px; font-weight: 800;
    color: var(--text, #0b0d10);
    margin-bottom: 18px;
    text-transform: uppercase;
    letter-spacing: 0;
}
.newsletter-form { display: flex; gap: 12px; max-width: 520px; margin: 0 auto; }
.newsletter-input {
    flex: 1;
    padding: 15px 18px;
    background: #ffffff;
    border: 2px solid rgba(8, 10, 12, 0.14);
    border-radius: 12px;
    color: var(--text, #0b0d10);
    font-size: 15px;
    transition: all 0.25s ease;
}
.newsletter-input:focus {
    outline: none;
    border-color: var(--text, #0b0d10);
    box-shadow: 0 0 0 3px rgba(8, 10, 12, 0.12);
}
.newsletter-input::placeholder { color: rgba(11, 13, 16, 0.45); }
.newsletter-btn {
    padding: 15px 26px;
    background: var(--text, #0b0d10);
    border: none;
    border-radius: 12px;
    color: var(--primary, #dfff00);
    font-family: 'Chakra Petch', sans-serif;
    font-size: 14px; font-weight: 700;
    text-transform: uppercase; letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.25s ease;
    display: flex; align-items: center; gap: 8px;
}
.newsletter-btn:hover { transform: translateY(-2px); box-shadow: 0 12px 28px rgba(8, 10, 12, 0.25); }
.newsletter-btn svg { width: 18px; height: 18px; }
.newsletter-success {
    display: none;
    padding: 14px 22px;
    background: rgba(8, 10, 12, 0.12);
    border: 1px solid rgba(8, 10, 12, 0.2);
    border-radius: 12px;
    color: var(--text, #0b0d10);
    margin-top: 18px;
    font-size: 14px;
}
.newsletter-success.show { display: inline-block; animation: fadeInUp 0.4s ease; }
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(10px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* ---------- Main grid ---------- */
.footer-main-grid {
    padding: 54px 0;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
}
@media (max-width: 992px)  { .footer-main-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 576px)  {
    .footer-main-grid { grid-template-columns: 1fr; }
    .newsletter-form  { flex-direction: column; }
    .newsletter-btn   { justify-content: center; }
}

/* ---------- Widget cards ---------- */
.footer-widget {
    background: #15171b;
    border: 1px solid rgba(223, 255, 0, 0.28);
    border-radius: 18px;
    padding: 32px;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}
.footer-widget::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--primary, #dfff00), var(--accent, #ff2a2a));
    opacity: 0;
    transition: opacity 0.3s ease;
}
.footer-widget:hover {
    transform: translateY(-4px);
    border-color: rgba(223, 255, 0, 0.45);
}
.footer-widget:hover::before { opacity: 1; }

/* ---------- Logo ---------- */
.footer-logo { display: block !important; margin-bottom: 20px !important; }
.footer-logo img {
    max-height: 64px !important; height: 64px !important;
    width: auto !important; max-width: 260px !important;
    object-fit: contain !important;
    transition: transform 0.3s ease;
}
.footer-logo:hover img { transform: translateY(-2px); }

/* ---------- Widget titles ---------- */
.footer-widget-title {
    font-family: 'Chakra Petch', sans-serif;
    font-size: 18px; font-weight: 700;
    color: var(--primary, #dfff00) !important;
    margin-bottom: 22px;
    text-transform: uppercase; letter-spacing: 1px;
    position: relative; padding-bottom: 12px;
}
.footer-widget-title::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0;
    width: 40px; height: 3px;
    background: linear-gradient(90deg, var(--primary, #dfff00), var(--accent, #ff2a2a));
    border-radius: 2px;
}

/* ---------- Links ---------- */
.footer-links { list-style: none; padding: 0; margin: 0; }
.footer-links li { margin-bottom: 10px; }
.footer-links a {
    display: flex; align-items: center; gap: 10px;
    color: rgba(255, 255, 255, 0.74);
    text-decoration: none; font-size: 14px;
    transition: all 0.25s ease;
    padding: 8px 12px; border-radius: 8px; margin: 0 -12px;
}
.footer-links a:hover {
    color: var(--primary, #dfff00);
    background: rgba(223, 255, 0, 0.10);
    padding-left: 16px;
}
.footer-links a svg { width: 16px; height: 16px; color: var(--primary, #dfff00); stroke: var(--primary, #dfff00); opacity: 0.85; transition: all 0.25s ease; }
.footer-links a:hover svg { opacity: 1; transform: translateX(3px); }

/* ---------- Contact ---------- */
.footer-contact-item {
    display: flex; align-items: flex-start; gap: 14px;
    margin-bottom: 16px; padding: 12px;
    background: rgba(255, 255, 255, 0.04);
    border-radius: 12px;
    transition: all 0.25s ease;
}
.footer-contact-item:hover { background: rgba(223, 255, 0, 0.08); transform: translateX(4px); }
.footer-contact-icon {
    width: 40px; height: 40px; min-width: 40px;
    background: rgba(223, 255, 0, 0.12);
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
}
.footer-contact-icon svg { width: 18px; height: 18px; color: var(--primary, #dfff00); stroke: var(--primary, #dfff00); }
.footer-contact-content h6 {
    font-size: 13px; font-weight: 600;
    color: var(--primary, #dfff00) !important;
    margin-bottom: 4px;
    text-transform: uppercase; letter-spacing: 0.5px;
}
.footer-contact-content p,
.footer-contact-content a {
    font-size: 14px;
    color: rgba(255, 255, 255, 0.78);
    margin: 0; text-decoration: none;
    transition: color 0.25s ease;
}
.footer-contact-content a:hover { color: var(--primary, #dfff00); }

/* ---------- Copyright ---------- */
.footer-copyright {
    padding: 22px 0;
    background: #08090b;
    border-top: 1px solid rgba(255, 255, 255, 0.08);
}
.copyright-content {
    display: flex; align-items: center; justify-content: space-between;
    padding-left: 20px; flex-wrap: wrap; gap: 16px;
}
.copyright-text { color: rgba(255, 255, 255, 0.7); font-size: 14px; }
.copyright-text a { color: var(--primary, #dfff00); text-decoration: none; transition: color 0.25s ease; }
.copyright-text a:hover { color: var(--accent, #ff2a2a); }
.payment-icons img {
    height: 30px;
    background: #ffffff;
    padding: 6px 10px;
    border-radius: 8px;
    transition: transform 0.25s ease;
}
.payment-icons img:hover { transform: translateY(-2px); }

/* ---------- Glow decoration ---------- */
.footer-glow {
    position: absolute;
    width: 300px; height: 300px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(223, 255, 0, 0.12) 0%, transparent 70%);
    pointer-events: none;
}
.footer-glow-1 { top: 20%; left: -100px; }
.footer-glow-2 { bottom: 20%; right: -100px; }
</style>

<!-- Close main-wrapper from header -->
</div>

<footer class="gaming-footer">
    <!-- Decorative Glows -->
    <div class="footer-glow footer-glow-1"></div>
    <div class="footer-glow footer-glow-2"></div>
    
    <!-- Newsletter Section -->
    <div class="footer-newsletter-section">
        <div class="newsletter-container">
            <div class="newsletter-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                    <polyline points="22,6 12,13 2,6"></polyline>
                </svg>
            </div>
            <h3 class="newsletter-title">{{ __('common.subscribe_our_newsletter') }}</h3>
           
            <form action="#" id="subscribe-form" class="newsletter-form">
                <input type="email" id="newsletter-email" name="newsletter-email" required placeholder="{{ __('common.your_email') }}" class="newsletter-input">
                <button type="submit" class="newsletter-btn">
                    <span>{{ __('common.subscribe') }}</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg>
                </button>
            </form>
            <div class="newsletter-success" id="newsletterSuccess">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:16px;height:16px;vertical-align:middle;margin-right:8px;">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
                {{ __('common.success_message') }}
            </div>
        </div>
    </div>
    
    <!-- Main Footer Grid -->
    <div class="container">
        <div class="footer-main-grid">
            <!-- Column 1: Company Info -->
            <div class="footer-widget">
                <a href="{{route('home')}}" class="footer-logo" style="display: inline-block !important;">
<img
    src="{{ url('assets/media/logo.webp') }}"
    alt="Polygamez"
    style="height: 64px !important; width: auto !important; max-width: 260px !important; object-fit: contain !important; display: block !important;"
>
                </a>
                <h4 class="footer-widget-title">{{ __('common.company') }}</h4>
                <ul class="footer-links">
                    <li>
                        <a href="{{route('home')}}">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            {{ __('common.home') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('about-us')}}">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                            {{ __('common.about_us') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('contact')}}">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                            {{ __('common.contact_us') }}
                        </a>
                    </li>
                </ul>
                
            </div>
            
            <!-- Column 2: Quick Links -->
            <div class="footer-widget">
                <h4 class="footer-widget-title">{{ __('common.quick_links') }}</h4>
                <ul class="footer-links">
                
                    <li>
                        <a href="{{route('pages','delivery-policy')}}">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                            {{ __('common.delivery_policy') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('pages','privacy-policy')}}">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                            {{ __('common.privacy_policy') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('pages','refund-policy')}}">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>
                            {{ __('common.refund_policy') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('pages','terms-conditions')}}">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            {{ __('common.terms_conditions') }}
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Column 3: Contact Info -->
            <div class="footer-widget">
                <h4 class="footer-widget-title">{{ __('common.contact_us') }}</h4>
                <div class="footer-contact-item">
                    <div class="footer-contact-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                    </div>
                    <div class="footer-contact-content">
                        <h6>{{ __('common.location') }}</h6>
                        <p>{{ $misc['Company Address'] ?? __('common.company_address') }}</p>
                    </div>
                </div>
                <div class="footer-contact-item">
                    <div class="footer-contact-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                    </div>
                    <div class="footer-contact-content">
                        <h6>{{ __('common.email') }}</h6>
                        <a href="mailto:{{ $misc['Company Email'] ?? __('common.company_email') }}">
                            {{ $misc['Company Email'] ?? __('common.company_email') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Copyright Section -->
        <div class="footer-copyright">
            <div class="copyright-content">
                <p class="copyright-text">
                    © {{date('Y')}} <a href="{{route('home')}}">{{ $misc['Company Name'] ?? __('common.company_name') }}</a>. {{ __('common.all_right_reserved') }}
                </p>
                <div class="payment-icons">
                    <img src="{{url('/assets/images/payment.webp')}}" alt="payment-icon">
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End  -->          

<!-- Jquery Js -->
<script src="{{url('assets/js/vendor/jquery-3.6.3.min.js')}}"></script>
<script src="{{url('assets/js/vendor/bootstrap.min.js')}}"></script>
<script src="{{url('assets/js/vendor/slick.min.js')}}"></script>
<script src="{{url('assets/js/vendor/jquery-appear.js')}}"></script>
<script src="{{url('assets/js/vendor/jquery-validator.js')}}"></script>
<script src="{{url('assets/js/vendor/aksVideoPlayer.js')}}"></script>

<!-- Site Scripts -->
<script src="{{url('assets/js/app.js')}}"></script>
<script src="{{url('assets/js/wow.js')}}"></script>

<script>
new WOW().init();

// Auto-hide flash alerts
setTimeout(function() {
  $('.alert').slideUp();
}, 5000);

// Back-to-top button visibility on scroll
$(window).scroll(function() {
  if ($(this).scrollTop() > 500) {
    $('#backto-top').addClass('show');
  } else {
    $('#backto-top').removeClass('show');
  }
});

// Lock page scroll while the side cart is open (open/close handled in app.js)
$('.sideCartToggler').click(function() {
  $('body').css('overflow', 'hidden');
});
$('.sideMenuCls2').click(function() {
  $('body').css('overflow', '');
});

// Newsletter form
$('#subscribe-form').on('submit', function(e) {
  e.preventDefault();
  $('#newsletterSuccess').addClass('show');
  $(this)[0].reset();
  setTimeout(function() {
    $('#newsletterSuccess').removeClass('show');
  }, 4000);
});
</script>
          
</body>
</html>
