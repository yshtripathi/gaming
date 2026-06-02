@extends('frontend.layouts.main')
@section('title', 'Dashboard')

@push('styles')
<style>
/* Dashboard - shares the login (auth) layout */
.auth-dashboard-page .auth-shell {
    max-width: 1240px !important;
    min-height: 640px !important;
}

.auth-dashboard-page .auth-form-panel {
    justify-content: flex-start !important;
    padding-top: 48px !important;
    padding-bottom: 44px !important;
}

/* Tab navigation pills */
.dashboard-nav-pills {
    display: flex !important;
    flex-wrap: wrap !important;
    gap: 8px !important;
    margin: 4px 0 26px !important;
    padding-bottom: 22px !important;
    border-bottom: 1px solid rgba(8, 10, 12, 0.08) !important;
}

.dashboard-nav-link {
    display: inline-flex !important;
    align-items: center !important;
    gap: 8px !important;
    background: #f6f7f2 !important;
    border: 1px solid rgba(8, 10, 12, 0.08) !important;
    border-radius: 999px !important;
    padding: 10px 18px !important;
    color: #565d68 !important;
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 12.5px !important;
    font-weight: 800 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
    text-decoration: none !important;
    cursor: pointer !important;
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
}

.dashboard-nav-link i { font-size: 14px !important; }

.dashboard-nav-link:hover {
    border-color: #6d7f00 !important;
    color: #6d7f00 !important;
}

.dashboard-nav-link.active {
    background: #0b0d10 !important;
    border-color: #0b0d10 !important;
    color: #dfff00 !important;
    box-shadow: 0 6px 18px rgba(8, 10, 12, 0.15) !important;
}

.dashboard-nav-link.dashboard-logout {
    margin-left: auto !important;
    background: rgba(239, 68, 68, 0.06) !important;
    border-color: rgba(239, 68, 68, 0.2) !important;
    color: #ef4444 !important;
}

.dashboard-nav-link.dashboard-logout:hover {
    background: #ef4444 !important;
    border-color: #ef4444 !important;
    color: #ffffff !important;
}

/* Tabs */
.dashboard-tab { display: none !important; }
.dashboard-tab.active { display: block !important; animation: dash-fade 0.4s ease !important; }

@keyframes dash-fade {
    from { opacity: 0; transform: translateY(8px); }
    to { opacity: 1; transform: translateY(0); }
}

.dashboard-tab > h2 {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 20px !important;
    font-weight: 900 !important;
    color: #0b0d10 !important;
    margin: 0 0 22px !important;
    letter-spacing: -0.5px !important;
}

.dashboard-subtitle {
    display: flex !important;
    align-items: center !important;
    gap: 10px !important;
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 14px !important;
    font-weight: 800 !important;
    color: #0b0d10 !important;
    margin: 34px 0 14px !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
}

.dashboard-subtitle::before {
    content: '' !important;
    width: 4px !important;
    height: 16px !important;
    background: #6d7f00 !important;
    border-radius: 2px !important;
}

.dashboard-subtitle-first { margin-top: 0 !important; }

.dashboard-note {
    margin: 0 0 8px !important;
    padding: 16px 18px !important;
    background: #f6f7f2 !important;
    border: 1px dashed rgba(8, 10, 12, 0.12) !important;
    border-radius: 12px !important;
    color: rgba(11, 13, 16, 0.5) !important;
    font-size: 13.5px !important;
    font-weight: 600 !important;
    text-align: center !important;
}

/* Invalid input (matches JS .is-invalid on confirm field) */
.auth-input-wrap .form-control.is-invalid {
    border-color: #ef4444 !important;
    box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.12) !important;
}

/* Tables */
.dashboard-table-wrap { overflow-x: auto !important; -webkit-overflow-scrolling: touch !important; }

.dashboard-table {
    width: 100% !important;
    border-collapse: separate !important;
    border-spacing: 0 !important;
    margin: 0 0 8px !important;
    border: 1px solid rgba(8, 10, 12, 0.1) !important;
    border-radius: 14px !important;
    overflow: hidden !important;
    font-size: 13.5px !important;
}

.dashboard-table thead th {
    background: #0b0d10 !important;
    color: #dfff00 !important;
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 11px !important;
    font-weight: 800 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
    text-align: left !important;
    padding: 13px 15px !important;
    border-bottom: 2px solid #6d7f00 !important;
    white-space: nowrap !important;
}

.dashboard-table td {
    padding: 13px 15px !important;
    border-bottom: 1px solid rgba(8, 10, 12, 0.07) !important;
    color: rgba(11, 13, 16, 0.78) !important;
    vertical-align: middle !important;
    white-space: nowrap !important;
}

.dashboard-table tbody tr:last-child td { border-bottom: none !important; }
.dashboard-table tbody tr:nth-child(even) { background: rgba(8, 10, 12, 0.02) !important; }
.dashboard-table tbody tr:hover { background: rgba(109, 127, 0, 0.04) !important; }

.dashboard-table .order-number {
    display: block !important;
    font-family: 'Chakra Petch', sans-serif !important;
    font-weight: 800 !important;
    color: #0b0d10 !important;
}

.dashboard-table small {
    display: block !important;
    font-size: 11px !important;
    color: rgba(11, 13, 16, 0.45) !important;
    margin-top: 2px !important;
    white-space: nowrap !important;
}

/* Status badges */
.status-badge {
    display: inline-flex !important;
    align-items: center !important;
    padding: 5px 12px !important;
    border-radius: 50px !important;
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 10.5px !important;
    font-weight: 800 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
}

.status-badge.completed,
.status-badge.success,
.status-badge.paid,
.status-badge.delivered {
    background: rgba(34, 197, 94, 0.1) !important;
    color: #16a34a !important;
    border: 1px solid rgba(34, 197, 94, 0.25) !important;
}

.status-badge.pending,
.status-badge.processing {
    background: rgba(234, 179, 8, 0.12) !important;
    color: #a16207 !important;
    border: 1px solid rgba(234, 179, 8, 0.3) !important;
}

.status-badge.failed,
.status-badge.cancelled,
.status-badge.canceled {
    background: rgba(239, 68, 68, 0.1) !important;
    color: #dc2626 !important;
    border: 1px solid rgba(239, 68, 68, 0.25) !important;
}

/* Action button */
.action-btn {
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    width: 34px !important;
    height: 34px !important;
    border-radius: 10px !important;
    background: rgba(109, 127, 0, 0.08) !important;
    border: 1px solid rgba(109, 127, 0, 0.2) !important;
    color: #6d7f00 !important;
    text-decoration: none !important;
    transition: all 0.3s ease !important;
}

.action-btn:hover {
    background: #0b0d10 !important;
    border-color: #0b0d10 !important;
    color: #dfff00 !important;
}

/* Empty state */
.dashboard-empty {
    text-align: center !important;
    padding: 48px 24px !important;
}

.dashboard-empty i {
    font-size: 52px !important;
    color: rgba(8, 10, 12, 0.15) !important;
    margin-bottom: 14px !important;
}

.dashboard-empty h3 {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 17px !important;
    font-weight: 800 !important;
    color: rgba(11, 13, 16, 0.5) !important;
    text-transform: uppercase !important;
    margin: 0 !important;
}

@media (max-width: 991px) {
    .auth-dashboard-page .auth-shell { max-width: 720px !important; }
}

@media (max-width: 575px) {
    .dashboard-nav-link.dashboard-logout { margin-left: 0 !important; }
}
</style>
@endpush

@section('main-content')

<!-- Page Header Band -->
<div class="about-title-band">
    <!-- HUD Visual Effects -->
    <div class="about-hud-grid"></div>
    <div class="about-hud-glow"></div>
    <div class="about-hud-decor border-t"></div>
    <div class="about-hud-decor border-b"></div>

    <div class="container position-relative z-1">
        <h1 class="about-hud-title mb-3 animate-fade-in-up">{{ __('common.my_account') }}</h1>

        <div class="about-hud-breadcrumb-capsule animate-fade-in-up delay-1">
            <a href="{{ route('home') }}" class="hud-breadcrumb-link">
                <i class="fas fa-home me-2"></i>{{ __('common.home') }}
            </a>
            <span class="hud-breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
            <span class="hud-breadcrumb-current">{{ __('common.my_account') }}</span>
        </div>
    </div>
</div>

<section class="polygamez-auth-page auth-dashboard-page">
    <div class="container">
        <div class="auth-shell">
            <!-- Left: content panel -->
            <div class="auth-form-panel">
                <div class="auth-kicker">{{ __('common.my_account') }}</div>
                <h1>{{ auth()->user()->name }}</h1>
                <p>{{ __('common.welcome_back_player') }}</p>

                <nav class="dashboard-nav-pills">
                    <button class="dashboard-nav-link active" data-target="#password" type="button">
                        <i class="fal fa-lock"></i>
                        {{ __('common.change_password') }}
                    </button>
                    <button class="dashboard-nav-link" data-target="#orders" type="button">
                        <i class="fal fa-shopping-bag"></i>
                        {{ __('common.order_history') }}
                    </button>
                    <button class="dashboard-nav-link" data-target="#points" type="button">
                        <i class="fal fa-coins"></i>
                        {{ __('common.points_history') }}
                    </button>
                    <a href="{{ route('user.logout') }}" class="dashboard-nav-link dashboard-logout">
                        <i class="fal fa-sign-out-alt"></i>
                        {{ __('common.logout') }}
                    </a>
                </nav>

                <!-- Tab: Change Password -->
                <div class="dashboard-tab active" id="password">
                    <h2>{{ __('common.change_password') }}</h2>

                    <form method="POST" action="{{ route('change.password') }}" id="passwordform">
                        @csrf
                        <div class="auth-field">
                            <label for="oldpswrd">{{ __('common.current_password') }}</label>
                            <div class="auth-input-wrap">
                                <input type="password" name="current_password" id="oldpswrd" placeholder="{{ __('common.current_password') }}" class="form-control" required>
                                <i class="fal fa-lock"></i>
                            </div>
                        </div>
                        <div class="auth-field">
                            <label for="new_password">{{ __('common.new_password') }}</label>
                            <div class="auth-input-wrap">
                                <input id="new_password" type="password" name="new_password" placeholder="{{ __('common.new_password') }}" class="form-control" required minlength="6">
                                <i class="fal fa-key"></i>
                            </div>
                        </div>
                        <div class="auth-field">
                            <label for="cnfrm_pswrd">{{ __('common.confirm_new_password') }}</label>
                            <div class="auth-input-wrap">
                                <input id="cnfrm_pswrd" type="password" name="new_confirm_password" placeholder="{{ __('common.confirm_new_password') }}" class="form-control" required minlength="6">
                                <i class="fal fa-shield-check"></i>
                            </div>
                        </div>
                        <button type="submit" class="auth-submit-btn">
                            <span>{{ __('common.submit') }}</span>
                            <i class="fal fa-save"></i>
                        </button>
                    </form>
                </div>

                <!-- Tab: Order History (Points Purchased) -->
                <div class="dashboard-tab" id="orders">
                    <h2>{{ __('common.order_history') }}</h2>

                    @if(count($orders)>0)
                        <div class="dashboard-table-wrap">
                            <table class="dashboard-table">
                                <thead>
                                    <tr>
                                        <th>{{ __('common.serial_number') }}</th>
                                        <th>{{ __('common.order_number') }}</th>
                                        <th>{{ __('common.name') }}</th>
                                        <th>{{ __('common.total_amount') }}</th>
                                        <th>{{ __('common.status') }}</th>
                                        <th>{{ __('common.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>
                                                <span class="order-number">{{ $order->order_number }}</span>
                                                <small>{{ __('common.order_date') }}: {{ $order->created_at->format('d-M-y') }}</small>
                                            </td>
                                            <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                            <td>{{ $order->currency }} {{ number_format($order->total_amount, $order->currency=='JPY' ? 0 : 2) }}</td>
                                            <td>
                                                <span class="status-badge {{ strtolower($order->status) }}">{{ ucwords($order->status) }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('user.order.show',$order->id) }}" class="action-btn" title="{{ __('common.view_details') }}">
                                                    <i class="fal fa-eye"></i>
                                                </a>
                                                <form method="POST" action="{{ route('user.order.delete',[$order->id]) }}" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="dashboard-empty">
                            <i class="fal fa-shopping-bag"></i>
                            <h3>{{ __('common.no_orders_found') }}</h3>
                        </div>
                    @endif
                </div>

                <!-- Tab: Points History (Points Redeemed) -->
                <div class="dashboard-tab" id="points">
                    <h2>{{ __('common.points_history') }}</h2>

                    @if(count($gameHistory)>0)
                        <div class="dashboard-table-wrap">
                            <table class="dashboard-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Game</th>
                                        <th>Date</th>
                                        <th>Points Spent</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($gameHistory as $game)
                                        @if($game->product)
                                            <tr>
                                                <td>{{ $game->id }}</td>
                                                <td>{{ $game->product->title }}</td>
                                                <td>{{ $game->created_at->format('d-M-y') }}</td>
                                                <td>{{ number_format($game->price,0) }} Points</td>
                                                <td><span class="status-badge completed">Completed</span></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="dashboard-empty">
                            <i class="fal fa-coins"></i>
                            <h3>{{ __('common.no_orders_found') }}</h3>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right: visual / profile panel -->
            <aside class="auth-visual-panel">
                <a class="auth-home-link" href="{{ route('home') }}">
                    <i class="fal fa-arrow-left"></i>
                    <span>{{ __('common.home') }}</span>
                </a>
                <div class="auth-visual-art">
                    <img src="{{ asset('assets/media/banner/side-image.webp') }}" alt="{{ auth()->user()->name }}">
                </div>
                <div class="auth-support-card">
                    <div>
                        <span>{{ __('common.welcome_back_player') }}</span>
                        <strong>{{ auth()->user()->name }}</strong>
                    </div>
                    <i class="fal fa-user-circle"></i>
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('.dashboard-nav-link[data-target]').on('click', function() {
        $('.dashboard-nav-link').removeClass('active');
        $(this).addClass('active');
        $('.dashboard-tab').removeClass('active');
        $($(this).data('target')).addClass('active');
    });

    $('#passwordform').on('submit', function(e) {
        var newPassword = $('#new_password').val();
        var confirmPassword = $('#cnfrm_pswrd').val();
        if (newPassword !== confirmPassword) {
            e.preventDefault();
            $('#cnfrm_pswrd').addClass('is-invalid');
        }
    });
});
</script>
@endpush
