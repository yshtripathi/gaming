@extends('frontend.layouts.main')

@section('title','Order Detail')

@push('styles')
<style>
/* Order detail - shares the dashboard (auth) aesthetic */
.order-detail-page .auth-shell {
    grid-template-columns: minmax(0, 1fr) !important; /* single full-width column (no visual panel) */
    max-width: 980px !important;
    min-height: auto !important;
}

.order-detail-page .auth-form-panel {
    justify-content: flex-start !important;
    padding-top: 48px !important;
    padding-bottom: 44px !important;
    width: 100% !important;
}

/* Top action bar */
.order-detail-actions {
    display: flex !important;
    flex-wrap: wrap !important;
    align-items: center !important;
    gap: 10px !important;
    margin: 4px 0 26px !important;
    padding-bottom: 22px !important;
    border-bottom: 1px solid rgba(8, 10, 12, 0.08) !important;
}

.order-action-pill {
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

.order-action-pill i { font-size: 14px !important; }

.order-action-pill:hover {
    border-color: #6d7f00 !important;
    color: #6d7f00 !important;
}

.order-action-pill.is-dark {
    background: #0b0d10 !important;
    border-color: #0b0d10 !important;
    color: #dfff00 !important;
    box-shadow: 0 6px 18px rgba(8, 10, 12, 0.15) !important;
}

.order-action-pill.is-dark:hover {
    color: #ffffff !important;
}

.order-action-pill.order-action-pdf { margin-left: auto !important; }

/* Headings */
.order-detail-page h2.order-detail-title {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 20px !important;
    font-weight: 900 !important;
    color: #0b0d10 !important;
    margin: 0 0 6px !important;
    letter-spacing: -0.5px !important;
}

.order-detail-page .order-detail-ref {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 13px !important;
    font-weight: 700 !important;
    color: rgba(11, 13, 16, 0.5) !important;
    margin: 0 0 26px !important;
}

.order-detail-page .order-detail-ref strong {
    color: #6d7f00 !important;
}

.order-detail-subtitle {
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

.order-detail-subtitle::before {
    content: '' !important;
    width: 4px !important;
    height: 16px !important;
    background: #6d7f00 !important;
    border-radius: 2px !important;
}

.order-detail-subtitle-first { margin-top: 0 !important; }

/* Summary tables */
.order-detail-table-wrap { overflow-x: auto !important; -webkit-overflow-scrolling: touch !important; }

.order-detail-table {
    width: 100% !important;
    border-collapse: separate !important;
    border-spacing: 0 !important;
    margin: 0 0 8px !important;
    border: 1px solid rgba(8, 10, 12, 0.1) !important;
    border-radius: 14px !important;
    overflow: hidden !important;
    font-size: 13.5px !important;
}

.order-detail-table thead th {
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

.order-detail-table thead th.text-end { text-align: right !important; }

.order-detail-table td {
    padding: 13px 15px !important;
    border-bottom: 1px solid rgba(8, 10, 12, 0.07) !important;
    color: rgba(11, 13, 16, 0.78) !important;
    vertical-align: middle !important;
    white-space: nowrap !important;
}

.order-detail-table tbody tr:last-child td { border-bottom: none !important; }
.order-detail-table tbody tr:hover { background: rgba(109, 127, 0, 0.04) !important; }

.order-detail-table .cell-strong {
    font-family: 'Chakra Petch', sans-serif !important;
    font-weight: 800 !important;
    color: #0b0d10 !important;
}

/* Info "key : value" grid */
.order-info-grid {
    display: grid !important;
    grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
    gap: 0 !important;
    border: 1px solid rgba(8, 10, 12, 0.1) !important;
    border-radius: 14px !important;
    overflow: hidden !important;
    background: #f6f7f2 !important;
}

.order-info-row {
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    gap: 14px !important;
    padding: 14px 18px !important;
    border-bottom: 1px solid rgba(8, 10, 12, 0.07) !important;
    background: #ffffff !important;
}

.order-info-row .info-label {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 11px !important;
    font-weight: 800 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
    color: rgba(11, 13, 16, 0.45) !important;
}

.order-info-row .info-value {
    font-size: 13.5px !important;
    font-weight: 700 !important;
    color: #0b0d10 !important;
    text-align: right !important;
    word-break: break-word !important;
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

/* Total emphasis */
.order-total-row { background: rgba(109, 127, 0, 0.06) !important; }
.order-total-row .info-label { color: #6d7f00 !important; }
.order-total-row .info-value {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 16px !important;
    font-weight: 900 !important;
    color: #0b0d10 !important;
}

/* Empty state */
.order-detail-empty {
    text-align: center !important;
    padding: 48px 24px !important;
}

.order-detail-empty i {
    font-size: 52px !important;
    color: rgba(8, 10, 12, 0.15) !important;
    margin-bottom: 14px !important;
}

.order-detail-empty h3 {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 17px !important;
    font-weight: 800 !important;
    color: rgba(11, 13, 16, 0.5) !important;
    text-transform: uppercase !important;
    margin: 0 !important;
}

@media (max-width: 991px) {
    .order-detail-page .auth-shell { max-width: 720px !important; }
}

@media (max-width: 575px) {
    .order-info-grid { grid-template-columns: 1fr !important; }
    .order-action-pill.order-action-pdf { margin-left: 0 !important; }
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
        <h1 class="about-hud-title mb-3 animate-fade-in-up">{{ __('common.order_information') }}</h1>

        <div class="about-hud-breadcrumb-capsule animate-fade-in-up delay-1">
            <a href="{{ route('home') }}" class="hud-breadcrumb-link">
                <i class="fas fa-home me-2"></i>{{ __('common.home') }}
            </a>
            <span class="hud-breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
            <a href="/user" class="hud-breadcrumb-link">{{ __('common.my_account') }}</a>
            <span class="hud-breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
            <span class="hud-breadcrumb-current">{{ __('common.order_information') }}</span>
        </div>
    </div>
</div>

<section class="polygamez-auth-page order-detail-page">
    <div class="container">
        <div class="auth-shell">
            <div class="auth-form-panel">

                @if($order)
                    @php
                        $currency = match($order->currency) {
                            'USD' => '$',
                            'JPY' => '¥',
                            default => '$',
                        };
                        $formattedTotal = $currency . number_format($order->total_amount, $order->currency == 'JPY' ? 0 : 2);
                    @endphp

                    <!-- Action bar -->
                    <div class="order-detail-actions">
                        <a href="/user" class="order-action-pill">
                            <i class="fal fa-arrow-left"></i>
                            {{ __('common.back') }}
                        </a>
                        <a href="{{ route('order.pdf',$order->id) }}" class="order-action-pill is-dark order-action-pdf">
                            <i class="fal fa-download"></i>
                            {{ __('common.generate_pdf') }}
                        </a>
                    </div>

                    <h2 class="order-detail-title">{{ __('common.order_information') }}</h2>
                    <p class="order-detail-ref">
                        {{ __('common.order_number') }}: <strong>{{ $order->order_number }}</strong>
                    </p>

                    <!-- Summary -->
                    <div class="order-detail-subtitle order-detail-subtitle-first">
                        <i class="fal fa-receipt"></i>{{ __('common.order_information') }}
                    </div>
                    <div class="order-detail-table-wrap">
                        <table class="order-detail-table">
                            <thead>
                                <tr>
                                    <th>{{ __('common.order_number') }}</th>
                                    <th>{{ __('common.name') }}</th>
                                    <th>{{ __('common.email') }}</th>
                                    <th>{{ __('common.quantity') }}</th>
                                    <th class="text-end">{{ __('common.total_amount') }}</th>
                                    <th>{{ __('common.status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="cell-strong">{{ $order->order_number }}</td>
                                    <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td class="cell-strong text-end">{{ $formattedTotal }}</td>
                                    <td>
                                        <span class="status-badge {{ strtolower($order->status) }}">{{ ucwords($order->status) }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Detailed info -->
                    <div class="order-detail-subtitle">
                        <i class="fal fa-info-circle"></i>{{ __('common.order_information') }}
                    </div>
                    <div class="order-info-grid">
                        <div class="order-info-row">
                            <span class="info-label">{{ __('common.order_number') }}</span>
                            <span class="info-value">{{ $order->order_number }}</span>
                        </div>
                        <div class="order-info-row">
                            <span class="info-label">{{ __('common.order_date') }}</span>
                            <span class="info-value">{{ $order->created_at->format('D d M, Y') }} · {{ $order->created_at->format('g:i a') }}</span>
                        </div>
                        <div class="order-info-row">
                            <span class="info-label">{{ __('common.quantity') }}</span>
                            <span class="info-value">{{ $order->quantity }}</span>
                        </div>
                        <div class="order-info-row">
                            <span class="info-label">{{ __('common.order_status') }}</span>
                            <span class="info-value">
                                <span class="status-badge {{ strtolower($order->status) }}">{{ ucwords($order->status) }}</span>
                            </span>
                        </div>
                        <div class="order-info-row">
                            <span class="info-label">{{ __('common.payment_method') }}</span>
                            <span class="info-value">Credit Card</span>
                        </div>
                        <div class="order-info-row">
                            <span class="info-label">{{ __('common.status') }}</span>
                            <span class="info-value">
                                <span class="status-badge {{ strtolower($order->payment_status) }}">{{ ucwords($order->payment_status) }}</span>
                            </span>
                        </div>
                        <div class="order-info-row">
                            <span class="info-label">{{ __('common.transaction_id') }}</span>
                            <span class="info-value">{{ $order->trans_id ?: '—' }}</span>
                        </div>
                        <div class="order-info-row order-total-row">
                            <span class="info-label">{{ __('common.total_amount') }}</span>
                            <span class="info-value">{{ $formattedTotal }}</span>
                        </div>
                    </div>
                @else
                    <div class="order-detail-empty">
                        <i class="fal fa-folder-open"></i>
                        <h3>{{ __('common.no_orders_found') }}</h3>
                    </div>
                @endif

            </div>
        </div>
    </div>
</section>
@endsection
