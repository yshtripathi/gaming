<!-- Footer Area Start  -->
<style>
/* Gaming Footer Styles */
.gaming-footer {
    background: var(--ws-bg-dark, #0D0D1A);
    position: relative;
    overflow: hidden;
}

.gaming-footer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--ws-primary, #8B5CF6), var(--ws-accent, #A855F7), #c084fc, var(--ws-primary, #8B5CF6));
}

/* Newsletter Section */
.footer-newsletter-section {
    position: relative;
    padding: 60px 0 50px;
    background: linear-gradient(135deg, rgba(124, 58, 237, 0.15) 0%, rgba(15, 15, 35, 0.95) 100%);
    border-bottom: 1px solid rgba(124, 58, 237, 0.2);
}

.newsletter-container {
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
    position: relative;
    z-index: 2;
}

.newsletter-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, var(--ws-primary), var(--ws-accent));
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    box-shadow: 0 0 30px rgba(124, 58, 237, 0.5);
    transition: all 0.4s ease;
}

.footer-newsletter-section:hover .newsletter-icon {
    transform: scale(1.1) translateY(-5px);
    box-shadow: 0 0 50px rgba(124, 58, 237, 0.7), 0 15px 40px rgba(0, 0, 0, 0.3);
}

.newsletter-icon svg {
    width: 32px;
    height: 32px;
    color: white;
}

.newsletter-title {
    font-family: 'Chakra Petch', sans-serif;
    font-size: 32px;
    font-weight: 700;
    color: var(--ws-text-primary);
    margin-bottom: 12px;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.newsletter-subtitle {
    font-size: 16px;
    color: var(--ws-text-muted);
    margin-bottom: 28px;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
}

.newsletter-form {
    display: flex;
    gap: 12px;
    max-width: 500px;
    margin: 0 auto;
}

.newsletter-input {
    flex: 1;
    padding: 16px 20px;
    background: rgba(26, 31, 54, 0.8);
    border: 2px solid rgba(124, 58, 237, 0.3);
    border-radius: 14px;
    color: var(--ws-text-primary);
    font-size: 15px;
    transition: all 0.3s ease;
}

.newsletter-input:focus {
    outline: none;
    border-color: var(--ws-primary);
    box-shadow: 0 0 20px rgba(124, 58, 237, 0.3);
    background: rgba(26, 31, 54, 1);
}

.newsletter-input::placeholder {
    color: rgba(160, 174, 192, 0.5);
}

.newsletter-btn {
    padding: 16px 28px;
    background: linear-gradient(135deg, var(--ws-primary), var(--ws-accent));
    border: none;
    border-radius: 14px;
    color: white;
    font-family: 'Chakra Petch', sans-serif;
    font-size: 14px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 8px 25px rgba(124, 58, 237, 0.4);
}

.newsletter-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(124, 58, 237, 0.6);
}

.newsletter-btn svg {
    width: 18px;
    height: 18px;
}

.newsletter-success {
    display: none;
    padding: 16px 24px;
    background: rgba(34, 197, 94, 0.15);
    border: 1px solid rgba(34, 197, 94, 0.3);
    border-radius: 12px;
    color: #22c55e;
    margin-top: 20px;
    font-size: 14px;
}

.newsletter-success.show {
    display: inline-block;
    animation: fadeInUp 0.4s ease;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Pop-out effect on hover */
.footer-newsletter-section:hover {
    background: linear-gradient(135deg, rgba(124, 58, 237, 0.25) 0%, rgba(15, 15, 35, 0.98) 100%);
}

.footer-newsletter-section::after {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%) scaleY(0);
    width: 100%;
    height: 100%;
    background: radial-gradient(ellipse at center top, rgba(124, 58, 237, 0.15) 0%, transparent 70%);
    transition: all 0.4s ease;
    pointer-events: none;
}

.footer-newsletter-section:hover::after {
    transform: translateX(-50%) scaleY(1);
}

/* Main Footer Grid */
.footer-main-grid {
    padding: 60px 0;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 40px;
}

@media (max-width: 992px) {
    .footer-main-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 576px) {
    .footer-main-grid {
        grid-template-columns: 1fr;
    }
    
    .newsletter-form {
        flex-direction: column;
    }
    
    .newsletter-btn {
        justify-content: center;
    }
}

/* Footer Widget Cards */
.footer-widget {
    background: rgba(26, 31, 54, 0.5);
    border: 1px solid rgba(124, 58, 237, 0.15);
    border-radius: 20px;
    padding: 32px;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.footer-widget::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--ws-primary), var(--ws-accent));
    opacity: 0;
    transition: opacity 0.3s ease;
}

.footer-widget:hover {
    transform: translateY(-5px);
    border-color: rgba(124, 58, 237, 0.4);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3), 0 0 30px rgba(124, 58, 237, 0.1);
}

.footer-widget:hover::before {
    opacity: 1;
}

/* Footer Logo */
.footer-logo {
    display: block !important;
    margin-bottom: 20px !important;
}

.footer-logo img {
    max-height: 80px !important;
    height: 80px !important;
    width: auto !important;
    max-width: 300px !important;
    object-fit: contain !important;
    filter: drop-shadow(0 0 15px rgba(139, 92, 246, 0.4));
    transition: filter 0.3s ease;
}

.footer-logo:hover img {
    filter: drop-shadow(0 0 25px rgba(139, 92, 246, 0.6));
}

/* Widget Titles */
.footer-widget-title {
    font-family: 'Chakra Petch', sans-serif;
    font-size: 18px;
    font-weight: 700;
    color: var(--ws-text-primary);
    margin-bottom: 24px;
    text-transform: uppercase;
    letter-spacing: 1px;
    position: relative;
    padding-bottom: 12px;
}

.footer-widget-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 40px;
    height: 3px;
    background: linear-gradient(90deg, var(--ws-primary), var(--ws-accent));
    border-radius: 2px;
}

/* Footer Links */
.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    margin-bottom: 12px;
}

.footer-links a {
    display: flex;
    align-items: center;
    gap: 10px;
    color: var(--ws-text-muted);
    text-decoration: none;
    font-size: 14px;
    transition: all 0.3s ease;
    padding: 8px 12px;
    border-radius: 8px;
    margin: 0 -12px;
}

.footer-links a:hover {
    color: var(--ws-primary-light);
    background: rgba(124, 58, 237, 0.1);
    padding-left: 16px;
}

.footer-links a svg {
    width: 16px;
    height: 16px;
    opacity: 0.6;
    transition: all 0.3s ease;
}

.footer-links a:hover svg {
    opacity: 1;
    transform: translateX(3px);
}

/* Contact Widget */
.footer-contact-item {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    margin-bottom: 18px;
    padding: 12px;
    background: rgba(124, 58, 237, 0.05);
    border-radius: 12px;
    transition: all 0.3s ease;
}

.footer-contact-item:hover {
    background: rgba(124, 58, 237, 0.12);
    transform: translateX(5px);
}

.footer-contact-icon {
    width: 40px;
    height: 40px;
    min-width: 40px;
    background: linear-gradient(135deg, rgba(124, 58, 237, 0.3), rgba(168, 85, 247, 0.2));
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.footer-contact-icon svg {
    width: 18px;
    height: 18px;
    color: var(--ws-primary);
}

.footer-contact-content h6 {
    font-size: 13px;
    font-weight: 600;
    color: var(--ws-text-muted);
    margin-bottom: 4px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.footer-contact-content p,
.footer-contact-content a {
    font-size: 14px;
    color: var(--ws-text-primary);
    margin: 0;
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-contact-content a:hover {
    color: var(--ws-primary-light);
}

/* Social Links */
.footer-social {
    display: flex;
    gap: 12px;
    margin-top: 24px;
}

.footer-social a {
    width: 42px;
    height: 42px;
    background: rgba(124, 58, 237, 0.15);
    border: 1px solid rgba(124, 58, 237, 0.3);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--ws-text-muted);
    transition: all 0.3s ease;
}

.footer-social a:hover {
    background: linear-gradient(135deg, var(--ws-primary), var(--ws-accent));
    border-color: transparent;
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(124, 58, 237, 0.4);
}

.footer-social a svg {
    width: 18px;
    height: 18px;
}

/* Copyright Section */
.footer-copyright {
    padding: 24px 0;
    background: rgba(13, 13, 26, 0.8);
    border-top: 1px solid rgba(124, 58, 237, 0.15);
}

.copyright-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-left: 20px;
    flex-wrap: wrap;
    gap: 16px;
}

.copyright-text {
    color: var(--ws-text-muted);
    font-size: 14px;
}

.copyright-text a {
    color: var(--ws-primary-light);
    text-decoration: none;
    transition: color 0.3s ease;
}

.copyright-text a:hover {
    color: var(--ws-accent);
}

.payment-icons img {
    height: 28px;
    opacity: 0.8;
   
    transition: all 0.3s ease;
}

.payment-icons img:hover {
    opacity: 1;
    filter: grayscale(0%);
}

/* Glow decoration */
.footer-glow {
    position: absolute;
    width: 300px;
    height: 300px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(124, 58, 237, 0.15) 0%, transparent 70%);
    pointer-events: none;
}

.footer-glow-1 {
    top: 20%;
    left: -100px;
}

.footer-glow-2 {
    bottom: 20%;
    right: -100px;
}

/* Polygamez fresh footer */
.gaming-footer {
    background: #0b0d10 !important;
    color: #f8fafc !important;
}

.gaming-footer::before {
    height: 6px !important;
    background: linear-gradient(90deg, #dfff00, #ffffff, #ff2a2a, #dfff00) !important;
}

.footer-newsletter-section {
    background: #dfff00 !important;
    border-bottom: 0 !important;
    padding: 44px 0 !important;
}

.newsletter-icon {
    background: #0b0d10 !important;
    border-radius: 16px !important;
    box-shadow: 0 18px 38px rgba(0,0,0,0.18) !important;
}

.newsletter-title {
    color: #0b0d10 !important;
    letter-spacing: 0 !important;
}

.newsletter-input {
    background: #ffffff !important;
    color: #0b0d10 !important;
    border: 2px solid rgba(8,10,12,0.14) !important;
    border-radius: 12px !important;
}

.newsletter-btn {
    background: #0b0d10 !important;
    color: #dfff00 !important;
    border-radius: 12px !important;
    box-shadow: none !important;
}

.footer-main-grid {
    padding: 54px 0 !important;
    gap: 22px !important;
}

.footer-widget {
    background: #15171b !important;
    border: 1px solid rgba(255,255,255,0.08) !important;
    border-radius: 18px !important;
    box-shadow: none !important;
}

.footer-widget:hover {
    transform: translateY(-4px);
    border-color: rgba(223,255,0,0.45) !important;
}

.footer-widget-title,
.footer-contact-content h6 {
    color: #dfff00 !important;
}

.footer-links a,
.footer-contact-content p,
.footer-contact-content a,
.copyright-text {
    color: rgba(255,255,255,0.74) !important;
}

.footer-links a:hover,
.footer-contact-content a:hover,
.copyright-text a {
    color: #dfff00 !important;
}

.footer-links a svg,
.footer-contact-icon svg {
    color: #dfff00 !important;
    stroke: #dfff00 !important;
}

.footer-contact-icon {
    background: rgba(223,255,0,0.12) !important;
}

.footer-copyright {
    background: #08090b !important;
    border-top: 1px solid rgba(255,255,255,0.08) !important;
}

.footer-glow {
    background: radial-gradient(circle, rgba(223,255,0,0.14) 0%, transparent 70%) !important;
}
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
    src="{{ url('assets/media/logo-polygamez-tight.png') }}"
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
                    <img src="{{url('/assets/images/payment.png')}}" alt="payment-icon">
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

setTimeout(function() {
  $('.alert').slideUp();
}, 5000);

// Navbar scroll effect
$(window).scroll(function() {
  if ($(this).scrollTop() > 50) {
    $('#navbar').addClass('scrolled');
  } else {
    $('#navbar').removeClass('scrolled');
  }
  
  // Back to top button
  if ($(this).scrollTop() > 500) {
    $('#backto-top').addClass('show');
  } else {
    $('#backto-top').removeClass('show');
  }
});

// Mobile menu toggle
$('#mobileToggle').click(function() {
  $('#mobileNav').addClass('active');
  $('#sideCartOverlay').addClass('active');
  $('body').css('overflow', 'hidden');
});

$('#mobileNavClose, #sideCartOverlay').click(function() {
  $('#mobileNav').removeClass('active');
  $('#sideCartOverlay').removeClass('active');
  $('body').css('overflow', '');
});

// Mobile games menu toggle
$('#mobileGamesToggle').click(function(e) {
  e.preventDefault();
  $('#mobileGamesMenu').slideToggle();
});

// Side cart toggle
$('.sideCartToggler').click(function() {
  $('#sideCartWrapper').addClass('active');
  $('#sideCartOverlay').addClass('active');
  $('body').css('overflow', 'hidden');
});

$('.sideMenuCls2, #sideCartOverlay').click(function() {
  $('#sideCartWrapper').removeClass('active');
  $('#sideCartOverlay').removeClass('active');
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

// Scroll reveal animation
function revealOnScroll() {
  $('.reveal').each(function() {
    var windowHeight = $(window).height();
    var elementTop = $(this).offset().top;
    var elementVisible = 150;
    
    if (elementTop < windowHeight - elementVisible) {
      $(this).addClass('active');
    }
  });
}

$(window).scroll(revealOnScroll);
revealOnScroll();
</script>
          
</body>
</html>
