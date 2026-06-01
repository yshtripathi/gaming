@extends('frontend.layouts.main')
@section('title', 'Dashboard')

@section('main-content')
<section class="polygamez-dashboard-page">
    <div class="container">
        <div class="dashboard-shell">
            <aside class="dashboard-profile-panel">
                <a class="dashboard-home-link" href="{{ route('home') }}">
                    <i class="fal fa-arrow-left"></i>
                    <span>{{ __('common.home') }}</span>
                </a>

                <div class="dashboard-profile-art">
                    <img src="{{ asset('assets/media/banner/side-image.png') }}" alt="{{ auth()->user()->name }}">
                </div>

                <div class="dashboard-profile-card">
                    <span>{{ __('common.welcome_back_player') }}</span>
                    <strong>{{ auth()->user()->name }}</strong>
                </div>

                <nav class="dashboard-nav">
                    <button class="dashboard-nav-link active" data-target="#password" type="button">
                        <i class="fal fa-lock"></i>
                        {{ __('common.change_password') }}
                    </button>
                    <button class="dashboard-nav-link" data-target="#orders" type="button">
                        <i class="fal fa-shopping-bag"></i>
                        {{ __('common.order_history') }}
                    </button>
                    <a href="{{ route('user.logout') }}" class="dashboard-nav-link dashboard-logout">
                        <i class="fal fa-sign-out-alt"></i>
                        {{ __('common.logout') }}
                    </a>
                </nav>
            </aside>

            <div class="dashboard-main-panel">
                <div class="dashboard-heading">
                    <div>
                        <div class="dashboard-kicker">{{ __('common.my_account') }}</div>
                        <h1>{{ auth()->user()->name }}</h1>
                    </div>
                    <i class="fal fa-user-circle"></i>
                </div>

                <div class="dashboard-tab active" id="password">
                    <div class="dashboard-card-lite password-form-card">
                        <h2>{{ __('common.change_password') }}</h2>

                        @if (session('success'))
                            <div class="dashboard-alert dashboard-alert-success">
                                <i class="fal fa-check-circle"></i> {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="dashboard-alert dashboard-alert-error">
                                <i class="fal fa-exclamation-circle"></i> {{ session('error') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('change.password') }}" id="passwordform">
                            @csrf
                            <div class="dashboard-field">
                                <label>{{ __('common.current_password') }}</label>
                                <div class="dashboard-input-wrap">
                                    <input type="password" name="current_password" id="oldpswrd" placeholder="{{ __('common.current_password') }}" class="password-input" required>
                                    <i class="fal fa-lock"></i>
                                </div>
                            </div>
                            <div class="dashboard-field">
                                <label>{{ __('common.new_password') }}</label>
                                <div class="dashboard-input-wrap">
                                    <input id="new_password" type="password" name="new_password" placeholder="{{ __('common.new_password') }}" class="password-input" required minlength="6">
                                    <i class="fal fa-key"></i>
                                </div>
                            </div>
                            <div class="dashboard-field">
                                <label>{{ __('common.confirm_new_password') }}</label>
                                <div class="dashboard-input-wrap">
                                    <input id="cnfrm_pswrd" type="password" name="new_confirm_password" placeholder="{{ __('common.confirm_new_password') }}" class="password-input" required minlength="6">
                                    <i class="fal fa-shield-check"></i>
                                </div>
                            </div>
                            <button type="submit" class="dashboard-submit-btn">
                                {{ __('common.submit') }}
                                <i class="fal fa-save"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="dashboard-tab" id="orders">
                    <div class="dashboard-card-lite">
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

                                <h3 class="dashboard-subtitle">Game Purchase History</h3>
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
                                <i class="fal fa-shopping-bag"></i>
                                <h3>{{ __('common.no_orders_found') }}</h3>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
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
