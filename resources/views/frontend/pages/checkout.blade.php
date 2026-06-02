@extends('frontend.layouts.main')
@section('title', 'Checkout')
@push('styles')
<style>
/* Main Checkout Layout */
.checkout-page-wrapper {
    padding: 64px 0 84px !important;
    background: transparent !important;
    min-height: auto;
}

.checkout-grid {
    display: grid;
    grid-template-columns: 1fr 420px;
    gap: 40px;
    align-items: start;
}

@media (max-width: 1024px) {
    .checkout-grid {
        grid-template-columns: 1fr;
    }
}

/* Left Column - Forms */
.checkout-forms-column {
    display: flex;
    flex-direction: column;
    gap: 30px;
}

/* Gaming Card Styling */
.gaming-card {
    background: #ffffff !important;
    border: 1px solid rgba(8, 10, 12, 0.08) !important;
    border-radius: 20px !important;
    padding: 32px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 15px 45px rgba(8, 10, 12, 0.03) !important;
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.gaming-card-title {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 20px !important;
    font-weight: 800 !important;
    color: #0b0d10 !important;
    margin-bottom: 28px;
    display: flex;
    align-items: center;
    gap: 12px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.gaming-card-title svg {
    width: 24px;
    height: 24px;
    color: #6d7f00 !important;
}

/* Form Styling */
.checkout-form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 20px;
}

.checkout-form-row.full-width {
    grid-template-columns: 1fr;
}

@media (max-width: 768px) {
    .checkout-form-row {
        grid-template-columns: 1fr;
    }
}

.checkout-form-group {
    position: relative;
}

.checkout-form-group label {
    display: block;
    font-size: 13px;
    font-weight: 700;
    color: rgba(8, 10, 12, 0.72) !important;
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.checkout-form-group label .required-star {
    color: #ef4444;
    margin-left: 2px;
}

.checkout-input,
.checkout-select,
.checkout-textarea,
.payment-input {
    width: 100%;
    padding: 14px 18px;
    background: #f6f7f2 !important;
    border: 1px solid rgba(8, 10, 12, 0.08) !important;
    border-radius: 12px !important;
    color: #0b0d10 !important;
    font-size: 14.5px !important;
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.checkout-input:focus,
.checkout-select:focus,
.checkout-textarea:focus,
.payment-input:focus {
    outline: none !important;
    border-color: #6d7f00 !important;
    box-shadow: 0 0 0 4px rgba(223, 255, 0, 0.15) !important;
    background: #ffffff !important;
}

.checkout-input::placeholder,
.checkout-textarea::placeholder,
.payment-input::placeholder {
    color: rgba(8, 10, 12, 0.38) !important;
}

.checkout-select {
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%2334383f' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E") !important;
    background-repeat: no-repeat !important;
    background-position: right 14px center !important;
    background-size: 18px !important;
}

.checkout-select option {
    background: #ffffff !important;
    color: #0b0d10 !important;
    padding: 12px;
}

/* Checkbox Styling */
.checkout-checkbox-group {
    margin-top: 24px;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.checkout-checkbox {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    cursor: pointer;
    margin: 0;
}

.checkout-checkbox input[type="checkbox"] {
    display: none;
}

.checkout-checkbox .custom-check {
    width: 20px;
    height: 20px;
    min-width: 20px;
    border: 1px solid rgba(8, 10, 12, 0.15) !important;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
    margin-top: 2px;
    background: #f6f7f2 !important;
}

.checkout-checkbox input[type="checkbox"]:checked + .custom-check {
    background: #0b0d10 !important;
    border-color: #0b0d10 !important;
}

.checkout-checkbox .custom-check svg {
    width: 12px;
    height: 12px;
    color: #dfff00 !important;
    opacity: 0;
    transform: scale(0);
    transition: all 0.2s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.checkout-checkbox input[type="checkbox"]:checked + .custom-check svg {
    opacity: 1;
    transform: scale(1);
}

.checkout-checkbox .checkbox-label {
    font-size: 14px;
    color: rgba(8, 10, 12, 0.72) !important;
    line-height: 1.5;
}

.checkout-checkbox .checkbox-label a {
    color: #6d7f00 !important;
    font-weight: 700;
    text-decoration: none;
    transition: color 0.3s;
}

.checkout-checkbox .checkbox-label a:hover {
    color: #8da300 !important;
    text-decoration: underline;
}

.checkout-checkbox.error {
    padding: 8px 12px;
    border-radius: 8px;
    background: rgba(180, 83, 9, 0.06);
    border: 1px solid rgba(180, 83, 9, 0.28);
}

/* Payment Logos */
.payment-logos {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-top: 28px;
    padding-top: 24px;
    border-top: 1px solid rgba(8, 10, 12, 0.06) !important;
}

.payment-logos img {
    height: 28px;
    opacity: 0.9;
}

.dba-text {
    font-size: 13.5px;
    color: rgba(8, 10, 12, 0.72) !important;
    margin-top: 20px;
    padding: 16px;
    background: #f6f7f2 !important;
    border-radius: 12px;
    border-left: 3px solid #6d7f00 !important;
}

/* Right Column - Sticky Checkout Card */
.checkout-summary-column {
    position: sticky;
    top: 100px;
}

.checkout-summary-card {
    background: #ffffff !important;
    border: 1px solid rgba(8, 10, 12, 0.08) !important;
    border-radius: 20px !important;
    overflow: hidden;
    box-shadow: 0 15px 45px rgba(8, 10, 12, 0.03) !important;
    position: relative;
}

.checkout-summary-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: #6d7f00 !important;
}

.checkout-summary-header {
    padding: 28px 28px 20px;
    border-bottom: 1px solid rgba(8, 10, 12, 0.06) !important;
}

.checkout-summary-title {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 20px !important;
    font-weight: 800 !important;
    color: #0b0d10 !important;
    display: flex;
    align-items: center;
    gap: 10px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.checkout-summary-title svg {
    width: 22px;
    height: 22px;
    color: #6d7f00 !important;
}

/* Order Items */
.order-items-list {
    padding: 20px 28px;
    max-height: 280px;
    overflow-y: auto;
}

.order-items-list::-webkit-scrollbar {
    width: 6px;
}

.order-items-list::-webkit-scrollbar-track {
    background: rgba(223, 255, 0, 0.05);
    border-radius: 3px;
}

.order-items-list::-webkit-scrollbar-thumb {
    background: rgba(8, 10, 12, 0.15);
    border-radius: 3px;
}

.order-items-list::-webkit-scrollbar-thumb:hover {
    background: rgba(8, 10, 12, 0.25);
}

.order-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 14px 0;
    border-bottom: 1px solid rgba(8, 10, 12, 0.06) !important;
}

.order-item:last-child {
    border-bottom: none !important;
}

.order-item-info {
    display: flex;
    align-items: center;
    gap: 14px;
}

.order-item-icon {
    width: 48px;
    height: 48px;
    background: rgba(223, 255, 0, 0.15) !important;
    border: 1px solid rgba(223, 255, 0, 0.28) !important;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.order-item-icon svg {
    width: 24px;
    height: 24px;
    color: #6d7f00 !important;
}

.order-item-details h5 {
    font-size: 14px;
    font-weight: 700;
    color: #0b0d10 !important;
    margin-bottom: 2px;
}

.order-item-details span {
    font-size: 12px;
    color: rgba(8, 10, 12, 0.5) !important;
}

.order-item-price {
    font-size: 15px;
    font-weight: 800;
    color: #0b0d10 !important;
}

/* Order Total */
.order-total-section {
    padding: 20px 28px;
    background: #f6f7f2 !important;
    border-top: 1px solid rgba(8, 10, 12, 0.06) !important;
    border-bottom: 1px solid rgba(8, 10, 12, 0.06) !important;
}

.order-total-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.order-total-label {
    font-size: 14px;
    font-weight: 700;
    color: rgba(8, 10, 12, 0.72) !important;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.order-total-amount {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 20px !important;
    font-weight: 900 !important;
    color: #0b0d10 !important;
}

/* Payment Form */
.payment-form-section {
    padding: 28px;
}

.payment-form-title {
    font-size: 16px !important;
    font-weight: 800 !important;
    color: #0b0d10 !important;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.payment-form-title svg {
    width: 20px;
    height: 20px;
    color: #6d7f00 !important;
}

.payment-input-group {
    margin-bottom: 16px;
}

.payment-input-group label {
    display: block;
    font-size: 12px;
    font-weight: 700;
    color: rgba(8, 10, 12, 0.72) !important;
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.payment-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px;
}

.card-jninfo {
    display: flex;
    align-items: center;
    gap: 8px;
}

.card-jninfo .payment-input {
    flex: 1;
}

.lrqw-icn {
    color: rgba(8, 10, 12, 0.38) !important;
    font-size: 16px;
    font-weight: 600;
}

/* Captcha Section */
.captcha-section {
    display: flex;
    gap: 12px;
    margin-bottom: 20px;
}

.captcha-section .payment-input {
    flex: 1;
}

.captcha-box {
    width: 120px;
    height: 50px;
    background: #f6f7f2 !important;
    border: 1px solid rgba(8, 10, 12, 0.08) !important;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.captcha-box img {
    max-width: 100%;
    height: auto;
}

/* Place Order Button */
.place-order-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 100% !important;
    padding: 16px 32px !important;
    background: #0b0d10 !important;
    border: 1px solid rgba(8, 10, 12, 0.1) !important;
    border-radius: 14px !important;
    color: #dfff00 !important;
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 15px !important;
    font-weight: 800 !important;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    cursor: pointer;
    box-shadow: 0 10px 30px rgba(8, 10, 12, 0.15) !important;
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
}

.place-order-btn:hover {
    background: #dfff00 !important;
    color: #0b0d10 !important;
    border-color: #dfff00 !important;
    box-shadow: 0 15px 40px rgba(223, 255, 0, 0.3) !important;
    transform: translateY(-2px) !important;
}

/* Error / warning messages */
.text-danger,
#frmCheckout label.error {
    display: block;
    font-size: 12px;
    font-weight: 600;
    color: #b45309 !important; /* warning amber */
    margin-top: 8px;
}

/* Responsive */
@media (max-width: 1024px) {
    .checkout-summary-column {
        position: relative;
        top: 0;
    }
}

@media (max-width: 768px) {
    .gaming-card {
        padding: 24px 20px;
    }
    
    .checkout-summary-card {
        margin-top: 30px;
    }
    
    .payment-row {
        grid-template-columns: 1fr;
    }
}
</style>
@endpush

@section('main-content')

<div class="about-title-band">
    <!-- HUD Visual Effects -->
    <div class="about-hud-grid"></div>
    <div class="about-hud-glow"></div>
    <div class="about-hud-decor border-t"></div>
    <div class="about-hud-decor border-b"></div>
    
    <div class="container position-relative z-1">
        <h1 class="about-hud-title mb-3 animate-fade-in-up">{{ __('common.checkout') }}</h1>
        
        <div class="about-hud-breadcrumb-capsule animate-fade-in-up delay-1">
            <a href="{{ route('home') }}" class="hud-breadcrumb-link">
                <i class="fas fa-home me-2"></i>{{ __('common.home') }}
            </a>
            <span class="hud-breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
            <span class="hud-breadcrumb-current">{{ __('common.checkout') }}</span>
        </div>
    </div>
</div>

<!-- Main Checkout Content -->
<div class="checkout-page-wrapper checkout-contact-page">
    <div class="container">

        <form name="frmCheckout" id="frmCheckout" method="POST" action="{{route('cart.order')}}">
            @csrf
            <div class="checkout-grid">
                
                <!-- Left Column - Forms -->
                <div class="checkout-forms-column">
                    
                    <!-- Billing Details Card -->
                    <div class="gaming-card billing-card">
                        <h3 class="gaming-card-title">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            {{ __('common.billing_details') }}
                        </h3>
                        
                        @if (session('success'))
                            <div class="alert alert-success" style="display:none;">{{ session('success') }}</div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger" style="display:none;">{{ session('error') }}</div>
                        @endif
                        
                        <div class="checkout-form-row">
                            <div class="checkout-form-group">
                                <label>{{ __('common.first_name') }}<span class="required-star">*</span></label>
                                <input type="text" name="first_name" id="first_name" value="" placeholder="{{ __('common.first_name') }}" class="checkout-input">
                                @error('first_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="checkout-form-group">
                                <label>{{ __('common.last_name') }}<span class="required-star">*</span></label>
                                <input type="text" name="last_name" id="last_name" value="" placeholder="{{ __('common.last_name') }}" class="checkout-input">
                                @error('last_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="checkout-form-row">
                            <div class="checkout-form-group">
                                <label>{{ __('common.email') }}<span class="required-star">*</span></label>
                                <input name="email" type="email" id="email" value="{{ auth()->user()->email ?? '' }}" placeholder="{{ __('common.email') }}" class="checkout-input">
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="checkout-form-group">
                                <label>{{ __('common.phone') }}<span class="required-star">*</span></label>
                                <input type="number" name="phone" id="phone" placeholder="{{ __('common.phone') }}" value="{{ auth()->user()->phone ?? '' }}" class="checkout-input">
                                @error('phone')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="checkout-form-row full-width">
                            <div class="checkout-form-group">
                                <label>{{ __('common.address') }}<span class="required-star">*</span></label>
                                <input type="text" name="address1" id="address" value="{{ auth()->user()->address ?? '' }}" placeholder="{{ __('common.address') }}" class="checkout-input">
                                @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="checkout-form-row">
                            <div class="checkout-form-group">
                                <label>{{ __('common.town_city') }}<span class="required-star">*</span></label>
                                <input type="text" name="city" id="city" value="{{ auth()->user()->city ?? '' }}" placeholder="{{ __('common.town_city') }}" class="checkout-input">
                                @error('city')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="checkout-form-group">
                                <label>{{ __('common.zip_code') }}<span class="required-star">*</span></label>
                                <input type="text" name="post_code" id="post_code" pattern="[0-9]*" placeholder="{{ __('common.zip_code') }}" value="{{ auth()->user()->zip ?? '' }}" class="checkout-input">
                                @error('post_code')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="checkout-form-row">
                            <div class="checkout-form-group">
                                <label>{{ __('common.state') }}<span class="required-star">*</span></label>
                                <input type="text" name="state" id="state" value="{{ auth()->user()->state ?? '' }}" placeholder="{{ __('common.state') }}" class="checkout-input">
                                @error('state')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="checkout-form-group">
                                <label>{{ __('common.country') }}<span class="required-star">*</span></label>
                                <select name="country" id="country" class="checkout-select">
                                    <option value="">{{ __('common.select_country') }}</option>
                                    <option value="AF">Afghanistan</option>
                                    <option value="AX">Åland Islands</option>
                                    <option value="AL">Albania</option>
                                    <option value="DZ">Algeria</option>
                                    <option value="AS">American Samoa</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AQ">Antarctica</option>
                                    <option value="AG">Antigua and Barbuda</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AM">Armenia</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaijan</option>
                                    <option value="BS">Bahamas</option>
                                    <option value="BH">Bahrain</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BB">Barbados</option>
                                    <option value="BY">Belarus</option>
                                    <option value="BE">Belgium</option>
                                    <option value="BZ">Belize</option>
                                    <option value="BJ">Benin</option>
                                    <option value="BM">Bermuda</option>
                                    <option value="BT">Bhutan</option>
                                    <option value="BO">Bolivia</option>
                                    <option value="BA">Bosnia and Herzegovina</option>
                                    <option value="BW">Botswana</option>
                                    <option value="BV">Bouvet Island</option>
                                    <option value="BR">Brazil</option>
                                    <option value="IO">British Indian Ocean Territory</option>
                                    <option value="VG">British Virgin Islands</option>
                                    <option value="BN">Brunei</option>
                                    <option value="BG">Bulgaria</option>
                                    <option value="BF">Burkina Faso</option>
                                    <option value="BI">Burundi</option>
                                    <option value="KH">Cambodia</option>
                                    <option value="CM">Cameroon</option>
                                    <option value="CA">Canada</option>
                                    <option value="CV">Cape Verde</option>
                                    <option value="KY">Cayman Islands</option>
                                    <option value="CF">Central African Republic</option>
                                    <option value="TD">Chad</option>
                                    <option value="CL">Chile</option>
                                    <option value="CN">China</option>
                                    <option value="CX">Christmas Island</option>
                                    <option value="CC">Cocos [Keeling] Islands</option>
                                    <option value="CO">Colombia</option>
                                    <option value="KM">Comoros</option>
                                    <option value="CG">Congo - Brazzaville</option>
                                    <option value="CD">Congo - Kinshasa</option>
                                    <option value="CK">Cook Islands</option>
                                    <option value="CR">Costa Rica</option>
                                    <option value="CI">Côte d'Ivoire</option>
                                    <option value="HR">Croatia</option>
                                    <option value="CU">Cuba</option>
                                    <option value="CY">Cyprus</option>
                                    <option value="CZ">Czech Republic</option>
                                    <option value="DK">Denmark</option>
                                    <option value="DJ">Djibouti</option>
                                    <option value="DM">Dominica</option>
                                    <option value="DO">Dominican Republic</option>
                                    <option value="EC">Ecuador</option>
                                    <option value="EG">Egypt</option>
                                    <option value="SV">El Salvador</option>
                                    <option value="GQ">Equatorial Guinea</option>
                                    <option value="ER">Eritrea</option>
                                    <option value="EE">Estonia</option>
                                    <option value="ET">Ethiopia</option>
                                    <option value="FK">Falkland Islands</option>
                                    <option value="FO">Faroe Islands</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="FI">Finland</option>
                                    <option value="FR">France</option>
                                    <option value="GF">French Guiana</option>
                                    <option value="PF">French Polynesia</option>
                                    <option value="TF">French Southern Territories</option>
                                    <option value="GA">Gabon</option>
                                    <option value="GM">Gambia</option>
                                    <option value="GE">Georgia</option>
                                    <option value="DE">Germany</option>
                                    <option value="GH">Ghana</option>
                                    <option value="GI">Gibraltar</option>
                                    <option value="GR">Greece</option>
                                    <option value="GL">Greenland</option>
                                    <option value="GD">Grenada</option>
                                    <option value="GP">Guadeloupe</option>
                                    <option value="GU">Guam</option>
                                    <option value="GT">Guatemala</option>
                                    <option value="GG">Guernsey</option>
                                    <option value="GN">Guinea</option>
                                    <option value="GW">Guinea-Bissau</option>
                                    <option value="GY">Guyana</option>
                                    <option value="HT">Haiti</option>
                                    <option value="HM">Heard Island and McDonald Islands</option>
                                    <option value="HN">Honduras</option>
                                    <option value="HK">Hong Kong SAR China</option>
                                    <option value="HU">Hungary</option>
                                    <option value="IS">Iceland</option>
                                    <option value="IN">India</option>
                                    <option value="ID">Indonesia</option>
                                    <option value="IR">Iran</option>
                                    <option value="IQ">Iraq</option>
                                    <option value="IE">Ireland</option>
                                    <option value="IM">Isle of Man</option>
                                    <option value="IL">Israel</option>
                                    <option value="IT">Italy</option>
                                    <option value="JM">Jamaica</option>
                                    <option value="JP">Japan</option>
                                    <option value="JE">Jersey</option>
                                    <option value="JO">Jordan</option>
                                    <option value="KZ">Kazakhstan</option>
                                    <option value="KE">Kenya</option>
                                    <option value="KI">Kiribati</option>
                                    <option value="KW">Kuwait</option>
                                    <option value="KG">Kyrgyzstan</option>
                                    <option value="LA">Laos</option>
                                    <option value="LV">Latvia</option>
                                    <option value="LB">Lebanon</option>
                                    <option value="LS">Lesotho</option>
                                    <option value="LR">Liberia</option>
                                    <option value="LY">Libya</option>
                                    <option value="LI">Liechtenstein</option>
                                    <option value="LT">Lithuania</option>
                                    <option value="LU">Luxembourg</option>
                                    <option value="MO">Macau SAR China</option>
                                    <option value="MK">Macedonia</option>
                                    <option value="MG">Madagascar</option>
                                    <option value="MW">Malawi</option>
                                    <option value="MY">Malaysia</option>
                                    <option value="MV">Maldives</option>
                                    <option value="ML">Mali</option>
                                    <option value="MT">Malta</option>
                                    <option value="MH">Marshall Islands</option>
                                    <option value="MQ">Martinique</option>
                                    <option value="MR">Mauritania</option>
                                    <option value="MU">Mauritius</option>
                                    <option value="YT">Mayotte</option>
                                    <option value="MX">Mexico</option>
                                    <option value="FM">Micronesia</option>
                                    <option value="MD">Moldova</option>
                                    <option value="MC">Monaco</option>
                                    <option value="MN">Mongolia</option>
                                    <option value="ME">Montenegro</option>
                                    <option value="MS">Montserrat</option>
                                    <option value="MA">Morocco</option>
                                    <option value="MZ">Mozambique</option>
                                    <option value="MM">Myanmar [Burma]</option>
                                    <option value="NA">Namibia</option>
                                    <option value="NR">Nauru</option>
                                    <option value="NP">Nepal</option>
                                    <option value="NL">Netherlands</option>
                                    <option value="AN">Netherlands Antilles</option>
                                    <option value="NC">New Caledonia</option>
                                    <option value="NZ">New Zealand</option>
                                    <option value="NI">Nicaragua</option>
                                    <option value="NE">Niger</option>
                                    <option value="NG">Nigeria</option>
                                    <option value="NU">Niue</option>
                                    <option value="NF">Norfolk Island</option>
                                    <option value="MP">Northern Mariana Islands</option>
                                    <option value="KP">North Korea</option>
                                    <option value="NO">Norway</option>
                                    <option value="OM">Oman</option>
                                    <option value="PK">Pakistan</option>
                                    <option value="PW">Palau</option>
                                    <option value="PS">Palestinian Territories</option>
                                    <option value="PA">Panama</option>
                                    <option value="PG">Papua New Guinea</option>
                                    <option value="PY">Paraguay</option>
                                    <option value="PE">Peru</option>
                                    <option value="PH">Philippines</option>
                                    <option value="PN">Pitcairn Islands</option>
                                    <option value="PL">Poland</option>
                                    <option value="PT">Portugal</option>
                                    <option value="PR">Puerto Rico</option>
                                    <option value="QA">Qatar</option>
                                    <option value="RE">Réunion</option>
                                    <option value="RO">Romania</option>
                                    <option value="RU">Russia</option>
                                    <option value="RW">Rwanda</option>
                                    <option value="BL">Saint Barthélemy</option>
                                    <option value="SH">Saint Helena</option>
                                    <option value="KN">Saint Kitts and Nevis</option>
                                    <option value="LC">Saint Lucia</option>
                                    <option value="MF">Saint Martin</option>
                                    <option value="PM">Saint Pierre and Miquelon</option>
                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                    <option value="WS">Samoa</option>
                                    <option value="SM">San Marino</option>
                                    <option value="ST">São Tomé and Príncipe</option>
                                    <option value="SA">Saudi Arabia</option>
                                    <option value="SN">Senegal</option>
                                    <option value="RS">Serbia</option>
                                    <option value="SC">Seychelles</option>
                                    <option value="SL">Sierra Leone</option>
                                    <option value="SG">Singapore</option>
                                    <option value="SK">Slovakia</option>
                                    <option value="SI">Slovenia</option>
                                    <option value="SB">Solomon Islands</option>
                                    <option value="SO">Somalia</option>
                                    <option value="ZA">South Africa</option>
                                    <option value="GS">South Georgia</option>
                                    <option value="KR">South Korea</option>
                                    <option value="ES">Spain</option>
                                    <option value="LK">Sri Lanka</option>
                                    <option value="SD">Sudan</option>
                                    <option value="SR">Suriname</option>
                                    <option value="SJ">Svalbard and Jan Mayen</option>
                                    <option value="SZ">Swaziland</option>
                                    <option value="SE">Sweden</option>
                                    <option value="CH">Switzerland</option>
                                    <option value="SY">Syria</option>
                                    <option value="TW">Taiwan</option>
                                    <option value="TJ">Tajikistan</option>
                                    <option value="TZ">Tanzania</option>
                                    <option value="TH">Thailand</option>
                                    <option value="TL">Timor-Leste</option>
                                    <option value="TG">Togo</option>
                                    <option value="TK">Tokelau</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TT">Trinidad and Tobago</option>
                                    <option value="TN">Tunisia</option>
                                    <option value="TR">Turkey</option>
                                    <option value="TM">Turkmenistan</option>
                                    <option value="TC">Turks and Caicos Islands</option>
                                    <option value="TV">Tuvalu</option>
                                    <option value="UG">Uganda</option>
                                    <option value="UA">Ukraine</option>
                                    <option value="AE">United Arab Emirates</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="UY">Uruguay</option>
                                    <option value="UM">U.S. Minor Outlying Islands</option>
                                    <option value="VI">U.S. Virgin Islands</option>
                                    <option value="UZ">Uzbekistan</option>
                                    <option value="VU">Vanuatu</option>
                                    <option value="VA">Vatican City</option>
                                    <option value="VE">Venezuela</option>
                                    <option value="VN">Vietnam</option>
                                    <option value="WF">Wallis and Futuna</option>
                                    <option value="EH">Western Sahara</option>
                                    <option value="YE">Yemen</option>
                                    <option value="ZM">Zambia</option>
                                    <option value="ZW">Zimbabwe</option>
                                </select>
                                @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <!-- Additional Information Card -->
                    <div class="gaming-card additional-info-card">
                        <h3 class="gaming-card-title">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            {{ __('common.additional_information') }}
                        </h3>
                        
                        <div class="checkout-form-group">
                            <label>{{ __('common.notes') }}</label>
                            <textarea name="notes" placeholder="{{ __('common.notes_about_order') }}" class="checkout-textarea"></textarea>
                        </div>
                        
                        <div class="checkout-checkbox-group">
                            <label class="checkout-checkbox">
                                <input type="checkbox" id="terms" name="terms">
                                <span class="custom-check">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                </span>
                                <span class="checkbox-label">{{ __('common.agree_terms_text') }} <a href="{{ route('pages', 'terms-conditions') }}" target='_blank'>{{ __('common.terms_policy') }}</a></span>
                            </label>
                            
                            <label class="checkout-checkbox">
                                <input type="checkbox" id="privacy" name="privacy">
                                <span class="custom-check">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                </span>
                                <span class="checkbox-label">{{ __('common.agree_terms_text') }} <a href="{{ route('pages', 'privacy-policy') }}" target='_blank'>{{ __('common.privacy_policy') }}</a></span>
                            </label>
                            
                            <label class="checkout-checkbox">
                                <input type="checkbox" id="delivery" name="delivery">
                                <span class="custom-check">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                </span>
                                <span class="checkbox-label">{{ __('common.agree_terms_text') }} <a href="{{ route('pages', 'delivery-policy') }}" target='_blank'>{{ __('common.delivery_policy') }}</a></span>
                            </label>
                            
                            <label class="checkout-checkbox">
                                <input type="checkbox" id="refund" name="refund">
                                <span class="custom-check">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                </span>
                                <span class="checkbox-label">{{ __('common.agree_terms_text') }} <a href="{{ route('pages', 'refund-policy') }}" target='_blank'>{{ __('common.refund_policy') }}</a></span>
                            </label>
                        </div>
                        
                        <div class="dba-text">
                            <p class="m-0">{{ __('common.dba_text') }} <img src="{{ asset('assets/images/dba.webp') }}" alt="dba" style="width:70px;margin-bottom:3px;vertical-align:middle;"></p>
                        </div>
                        
                        <div class="payment-logos">
                            <img src="{{ asset('assets/images/payment.webp') }}" alt="Payment Methods">
                        </div>
                    </div>
                </div>
                
                <!-- Right Column - Sticky Checkout Summary -->
                <div class="checkout-summary-column">
                    <div class="checkout-summary-card">
                        <div class="checkout-summary-header">
                            <h3 class="checkout-summary-title">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                {{ __('common.your_order') }}
                            </h3>
                        </div>
                        
                        @php
                            $total_amount = Helper::totalCartPrice();
                            if(session()->has('coupon')) {
                                $total_amount -= Session::get('coupon')['value'];
                            }
                        @endphp
                        
                        <div class="order-items-list">
                            @if(Helper::getAllProductFromCart())
                            @foreach(Helper::getAllProductFromCart() as $key => $cart)
                            @php 
                                $user_id = auth()->check() ? auth()->id() : session('guest');
                                $points = App\Models\Cart::where('user_id', $user_id)->where('order_id',null)->pluck('points')->first();                            
                            @endphp
                            <div class="order-item">
                                <div class="order-item-info">
                                    <div class="order-item-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                    </div>
                                    <div class="order-item-details">
                                        <h5>{{ $points }} {{ __('common.points') }}</h5>
                                        <span>{{ $cart->quantity }} X {{ Helper::getCurrencySymbol(session('currency')) }}{{ number_format($cart['price'], session('currency')=='JPY' ? 0 : 2) }}</span>
                                    </div>
                                </div>
                                <div class="order-item-price">
                                    {{ Helper::getCurrencySymbol(session('currency')) }}{{ number_format($cart['price'] * $cart->quantity, session('currency')=='JPY' ? 0 : 2) }}
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        
                        <div class="order-total-section">
                            <div class="order-total-row">
                                <span class="order-total-label">{{ __('common.total') }}:</span>
                                <span class="order-total-amount">
                                    {{ Helper::getCurrencySymbol(session('currency')) }}{{ number_format($total_amount, session('currency')=='JPY' ? 0 : 2) }}
                                </span>
                            </div>
                        </div>
                        
                        <!-- Payment Details Section -->
                        <div class="payment-form-section">
                            <h4 class="payment-form-title">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                {{ __('common.card_details') }}
                            </h4>
                            
                            <div class="payment-input-group">
                                <label>{{ __('common.card_holder_name') }}</label>
                                <input type="text" name="name" id="name" class="payment-input" placeholder="{{ __('common.card_holder_name') }}">
                                <span id="card-name-error" class="text-danger"></span>
                            </div>
                            
                            <div class="payment-input-group">
                                <label>{{ __('common.card_number') }}</label>
                                <input type="text" name="card_number" id="card_number" class="payment-input cc-number" placeholder="•••• •••• •••• ••••">
                                <span id="card-number-error" class="text-danger"></span>
                            </div>
                            
                            <div class="payment-row">
                                <div class="payment-input-group">
                                    <label>{{ __('common.expiry_month') }}</label>
                                    <div class="card-jninfo">
                                        <input type="text" class="payment-input" name="expiry_month" id="expiry_month" placeholder="MM" inputmode="numeric" maxlength="2">
                                        <span>/</span>
                                        <input type="text" class="payment-input" name="expiry_year" id="expiry_year" placeholder="YYYY" inputmode="numeric" maxlength="4">
                                    </div>
                                    <span id="card-month-error" class="text-danger"></span>
                                    <span id="card-year-error" class="text-danger"></span>
                                </div>
                                <div class="payment-input-group">
                                    <label>{{ __('common.cvv') }}</label>
                                    <input id="cvv" name="cvv" type="tel" autocomplete="off" placeholder="••••" class="payment-input cc-cvc">
                                    <span id="card-cvv-error" class="text-danger"></span>
                                </div>
                            </div>
                              @if(env('ENABLE_CAPTCHA', true))
                            <div class="captcha-section">
                                <input type="text" id="captcha" name="captcha" autocomplete="off" class="payment-input" placeholder="{{ __('common.fill_captcha') }}" required>
                                <div class="captcha-box">
                                    @captcha
                                </div>
                            </div>
                            @error('captcha')
                                <span class="text-danger" id="captcha-error">{{ __('common.captcha_error') }}</span>
                            @enderror
                            @endif
                            
                            <button type="submit" class="place-order-btn" id="button-confirm">
                                {{ __('common.place_order') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{url('assets/js/jquery.payment.min.js')}}"></script>
<script src="{{url('assets/js/vendor/jquery-validator.js')}}"></script>
<script>
$(document).ready(function() {
    // Restrict month and year to numeric only
    $("#expiry_month").on('keypress', function(e) {
        if (!/[0-9]/.test(String.fromCharCode(e.which))) {
            e.preventDefault();
        }
    });

    $("#expiry_year").on('keypress', function(e) {
        if (!/[0-9]/.test(String.fromCharCode(e.which))) {
            e.preventDefault();
        }
    });

    $("#frmCheckout").validate({
        // validate the policy checkboxes too — they're display:none (custom UI),
        // which the default ignore:":hidden" would otherwise skip.
        ignore: ":hidden:not([type=checkbox])",
        rules: {
            first_name: "required",
            last_name: "required",
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                minlength: 10
            },
            address1: "required",
            post_code: "required",
            city: "required",
            state: "required",
            country: "required",
            terms: "required",
            privacy: "required",
            delivery: "required",
            refund: "required",
            name: "required",
            card_number: "required",
            expiry_month: "required",
            expiry_year: "required",
            cvv: "required",
            @if(env('ENABLE_CAPTCHA', true))
      captcha: "required",
  @endif
        },
        messages: {
            first_name: "{{ __('common.name_required') }}",
            last_name: "{{ __('common.name_required') }}",
            phone: {
                required: "{{ __('common.phone_required') }}",
                minlength: "{{ __('common.phone_min') }}"
            },
            address1: "{{ __('common.address_required') }}",
            email: "{{ __('common.email_required') }}",
            post_code: "{{ __('common.post_code_required') }}",
            city: "{{ __('common.city_required') }}",
            state: "{{ __('common.state_required') }}",
            country: "{{ __('common.country_required') }}",
            terms: "{{ __('common.accept_terms_and_conditions') }}",
            privacy: "{{ __('common.accept_privacy_policy_msg') }}",
            delivery: "{{ __('common.accept_delivery_policy_msg') }}",
            refund: "{{ __('common.accept_refund_policy_msg') }}",
            name: "{{ __('common.card_name_required') }}",
            card_number: "{{ __('common.card_number_required') }}",
            expiry_month: "{{ __('common.card_month_required') }}",
            expiry_year: "{{ __('common.card_year_required') }}",
            cvv: "{{ __('common.card_cvv_required') }}",
            captcha: "{{ __('common.fill_it') }}"
        },
        errorPlacement: function(error, element) {
            error.addClass('text-danger');
            error.css('display', 'block');
            if(element.is('input[type="checkbox"]')) {
                element.closest('label.checkout-checkbox').after(error);
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function(element, errorClass, validClass) {
            if($(element).is('input[type="checkbox"]')) {
                $(element).closest('label.checkout-checkbox').addClass('error');
            }
        },
        unhighlight: function(element, errorClass, validClass) {
            if($(element).is('input[type="checkbox"]')) {
                $(element).closest('label.checkout-checkbox').removeClass('error');
            }
        }
    });

    var cardType = '';
    function cardFormValidate(callback) {
        // Clear previous errors
        $("#card-name-error").text('');
        $("#card-number-error").text('');
        $("#card-month-error").text('');
        $("#card-year-error").text('');
        $("#card-cvv-error").text('');

        var cardName = $("#name").val().trim();
        var cardNumber = $("#card_number").val().trim();
        var expMonth = $("#expiry_month").val().trim();
        var expYear = $("#expiry_year").val().trim();
        var cvv = $("#cvv").val().trim();

        // Basic field validation
        if (!cardName) {
            $("#card-name-error").text("{{ __('common.card_name_required') }}");
            $("#name").focus();
            callback(false);
            return;
        }

        if (!cardNumber) {
            $("#card-number-error").text("{{ __('common.card_number_required') }}");
            $("#card_number").focus();
            callback(false);
            return;
        }

        if (!expMonth || !expYear) {
            $("#card-month-error").text("{{ __('common.card_month_required') }}");
            $("#expiry_month").focus();
            callback(false);
            return;
        }

        if (!cvv) {
            $("#card-cvv-error").text("{{ __('common.card_cvv_required') }}");
            $("#cvv").focus();
            callback(false);
            return;
        }

        $('#card_number').validateCreditCard(function(result) {
            if(result.valid) {
                var regMonth = /^(0[1-9]|1[0-2])$/;
                var regYear = /^(20[2-9][0-9]|2[1-9][0-9]{2})$/;
                var regCVV = /^[0-9]{3,4}$/;

                if (!regMonth.test(expMonth)) {
                    $("#card-month-error").text("{{ __('common.invalid_expiry_month') }}");
                    $("#expiry_month").focus();
                    callback(false);
                }
                else if (!regYear.test(expYear)) {
                    $("#card-year-error").text("{{ __('common.invalid_expiry_year') }}");
                    $("#expiry_year").focus();
                    callback(false);
                }
                else if (!regCVV.test(cvv)) {
                    $("#card-cvv-error").text("{{ __('common.card_cvv_invalid') }}");
                    $("#cvv").focus();
                    callback(false);
                }
                else {
                    cardType = result.card_type.name;
                    callback(true);
                }
            }
            else {
                $("#card-number-error").text("{{ __('common.card_number_invalid') }}");
                callback(false);
            }
        });
    }


    $('[data-numeric]').payment('restrictNumeric');
    $('.cc-number').payment('formatCardNumber');
    $('.cc-exp').payment('formatCardExpiry');
    $('.cc-cvc').payment('formatCardCVC');
});
</script>
@endpush
