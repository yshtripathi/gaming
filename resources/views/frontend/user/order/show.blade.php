@extends('frontend.layouts.main')
@section('title', 'Order Detail')

@push('styles')
<style>
/* Order Detail - Gaming HUD Theme */
.order-detail-section {
    padding: 64px 0 96px !important;
    background-color: #f6f7f2 !important;
    background-image:
        radial-gradient(circle at 50% 50%, rgba(223, 255, 0, 0.04) 0%, transparent 80%),
        repeating-linear-gradient(90deg, rgba(8, 10, 12, 0.015) 0 1px, transparent 1px 40px),
        repeating-linear-gradient(0deg, rgba(8, 10, 12, 0.015) 0 1px, transparent 1px 40px) !important;
    position: relative !important;
    min-height: 60vh !important;
}

.order-detail-card {
    max-width: 900px !important;
    margin: 0 auto !important;
    background: #ffffff !important;
    border: 1px solid rgba(8, 10, 12, 0.08) !important;
    border-radius: 24px !important;
    box-shadow: 0 15px 45px rgba(8, 10, 12, 0.03) !important;
    overflow: hidden !important;
}

.order-detail-head {
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    flex-wrap: wrap !important;
    gap: 14px !important;
    background: #0b0d10 !important;
    border-bottom: 2px solid #6d7f00 !important;
    padding: 22px 28px !important;
}

.order-detail-head h2 {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 18px !important;
    font-weight: 800 !important;
    color: #dfff00 !important;
    margin: 0 !important;
    text-transform: uppercase !important;
    letter-spacing: 1px !important;
    display: flex !important;
    align-items: center !important;
    gap: 10px !important;
}

.order-detail-actions {
    display: flex !important;
    gap: 10px !important;
    flex-wrap: wrap !important;
}

.order-detail-btn {
    display: inline-flex !important;
    align-items: center !important;
    gap: 8px !important;
    padding: 10px 18px !important;
    border-radius: 10px !important;
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 12px !important;
    font-weight: 800 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
    text-decoration: none !important;
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
}

.order-detail-btn.primary {
    background: #dfff00 !important;
    border: 1px solid #dfff00 !important;
    color: #0b0d10 !important;
}

.order-detail-btn.primary:hover {
    background: #ffffff !important;
    border-color: #ffffff !important;
    transform: translateY(-2px) !important;
}

.order-detail-btn.ghost {
    background: rgba(255, 255, 255, 0.06) !important;
    border: 1px solid rgba(255, 255, 255, 0.15) !important;
    color: #ffffff !important;
}

.order-detail-btn.ghost:hover {
    background: rgba(255, 255, 255, 0.12) !important;
    border-color: rgba(255, 255, 255, 0.3) !important;
    transform: translateY(-2px) !important;
}

.order-detail-body {
    padding: 32px 28px !important;
}

/* Summary table */
.order-detail-table-wrap { overflow-x: auto !important; -webkit-overflow-scrolling: touch !important; }

.order-detail-table {
    width: 100% !important;
    border-collapse: separate !important;
    border-spacing: 0 !important;
    margin: 0 0 32px !important;
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
    padding: 13px 16px !important;
    border-bottom: 2px solid #6d7f00 !important;
    white-space: nowrap !important;
}

.order-detail-table thead th.text-right { text-align: right !important; }

.order-detail-table td {
    padding: 14px 16px !important;
    border-bottom: none !important;
    color: rgba(11, 13, 16, 0.8) !important;
    vertical-align: middle !important;
}

.order-detail-table td.text-right { text-align: right !important; }

.order-detail-table td.amount {
    font-family: 'Chakra Petch', sans-serif !important;
    font-weight: 900 !important;
    color: #6d7f00 !important;
    font-size: 15px !important;
}

/* Info block */
.order-info-title {
    font-family: 'Chakra Petch', sans-serif !important;
    font-size: 16px !important;
    font-weight: 800 !important;
    color: #0b0d10 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
    margin: 0 0 18px !important;
    display: flex !important;
    align-items: center !important;
    gap: 10px !important;
}

.order-info-title::before {
    content: '' !important;
    width: 4px !important;
    height: 18px !important;
    background: #6d7f00 !important;
    border-radius: 2px !important;
}

.order-info-table {
    width: 100% !important;
    border: 1px solid rgba(8, 10, 12, 0.08) !important;
    border-radius: 14px !important;
    overflow: hidden !important;
    background: #f6f7f2 !important;
    border-collapse: separate !important;
    border-spacing: 0 !important;
}

.order-info-table tr td {
    padding: 13px 18px !important;
    border-bottom: 1px solid rgba(8, 10, 12, 0.06) !important;
    font-size: 14px !important;
    vertical-align: top !important;
}

.order-info-table tr:last-child td { border-bottom: none !important; }

.order-info-table tr td:first-child {
    font-family: 'Chakra Petch', sans-serif !important;
    font-weight: 700 !important;
    color: rgba(11, 13, 16, 0.55) !important;
    text-transform: uppercase !important;
    font-size: 12px !important;
    letter-spacing: 0.5px !important;
    width: 42% !important;
    white-space: nowrap !important;
}

.order-info-table tr td:last-child {
    color: #0b0d10 !important;
    font-weight: 600 !important;
}

.order-info-table tr:nth-child(even) { background: rgba(255, 255, 255, 0.6) !important; }

/* Status badge */
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
    background: rgba(34, 197, 94, 0.1) !important;
    color: #16a34a !important;
    border: 1px solid rgba(34, 197, 94, 0.25) !important;
}

.status-badge.pending,
.status-badge.processing {
    background: rgba(234, 179, 8, 0.12) !important;
    color: #a16207 !important;
    border-color: rgba(234, 179, 8, 0.3) !important;
}

.status-badge.failed,
.status-badge.cancelled,
.status-badge.canceled {
    background: rgba(239, 68, 68, 0.1) !important;
    color: #dc2626 !important;
    border-color: rgba(239, 68, 68, 0.25) !important;
}

@media (max-width: 768px) {
    .order-detail-section { padding: 40px 0 64px !important; }
    .order-detail-card { margin: 0 16px !important; }
    .order-detail-head { padding: 18px 20px !important; }
    .order-detail-body { padding: 24px 20px !important; }
    .order-info-table tr td:first-child { width: auto !important; }
}
</style>
@endpush

@section('main-content')
<main>

<!-- Page Header Band -->
<div class="about-title-band">
    <div class="about-hud-grid"></div>
    <div class="about-hud-glow"></div>
    <div class="about-hud-decor border-t"></div>
    <div class="about-hud-decor border-b"></div>

    <div class="container position-relative z-1">
        <h1 class="about-hud-title mb-3 animate-fade-in-up">
            {{ __('common.order_detail') }}
        </h1>

        <div class="about-hud-breadcrumb-capsule animate-fade-in-up delay-1">
            <a href="{{ route('home') }}" class="hud-breadcrumb-link">
                <i class="fas fa-home me-2"></i>{{ __('common.home') }}
            </a>
            <span class="hud-breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
            <a href="/user" class="hud-breadcrumb-link">{{ __('common.my_account') }}</a>
            <span class="hud-breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
            <span class="hud-breadcrumb-current">{{ __('common.order_detail') }}</span>
        </div>
    </div>
</div>

<!-- Order Detail Body -->
<section class="order-detail-section">
    <div class="container">
        <div class="order-detail-card">
            <div class="order-detail-head">
                <h2>
                    <i class="fal fa-receipt"></i>
                    {{ __('common.order_detail') }}
                </h2>
                <div class="order-detail-actions">
                    <a href="{{ route('order.pdf', $order->id) }}" class="order-detail-btn primary">
                        <i class="fas fa-download"></i> {{ __('common.generate_pdf') }}
                    </a>
                    <a href="/user" class="order-detail-btn ghost">
                        <i class="fas fa-arrow-left"></i> {{ __('common.back') }}
                    </a>
                </div>
            </div>

            <div class="order-detail-body">
                @if($order)
                    @php
                        $currency = match($order->currency) {
                            'USD' => '$',
                            'JPY' => '¥',
                            default => '$',
                        };

                        if($order->currency == "USD") {
                            $orderTotalAmount = number_format($order->total_amount, 2);
                        } else {
                            $orderTotalAmount = number_format($order->total_amount_jp, 2);
                        }
                    @endphp

                    <!-- Summary -->
                    <div class="order-detail-table-wrap">
                        <table class="order-detail-table">
                            <thead>
                                <tr>
                                    <th>{{ __('common.order_number') }}</th>
                                    <th>{{ __('common.name') }}</th>
                                    <th>{{ __('common.email') }}</th>
                                    <th>{{ __('common.quantity') }}</th>
                                    <th class="text-right">{{ __('common.total_amount') }}</th>
                                    <th>{{ __('common.status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $order->order_number }}</td>
                                    <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td class="text-right amount">{{ $currency }} {{ $order->total_amount }}</td>
                                    <td><span class="status-badge {{ strtolower($order->status) }}">{{ ucwords($order->status) }}</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Order Information -->
                    <h3 class="order-info-title">{{ __('common.order_information') }}</h3>
                    <table class="order-info-table">
                        <tr>
                            <td>{{ __('common.order_number') }}</td>
                            <td>{{ $order->order_number }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('common.order_date') }}</td>
                            <td>{{ $order->created_at->format('D d M, Y') }} at {{ $order->created_at->format('g : i a') }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('common.quantity') }}</td>
                            <td>{{ $order->quantity }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('common.order_status') }}</td>
                            <td><span class="status-badge {{ strtolower($order->status) }}">{{ ucwords($order->status) }}</span></td>
                        </tr>
                        <tr>
                            <td>{{ __('common.total_amount') }}</td>
                            <td>{{ $currency }} {{ $order->total_amount }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('common.payment_method') }}</td>
                            <td>Credit Card</td>
                        </tr>
                        <tr>
                            <td>{{ __('common.payment_status') }}</td>
                            <td>{{ ucwords($order->payment_status) }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('common.transaction_id') }}</td>
                            <td>{{ $order->trans_id }}</td>
                        </tr>
                    </table>
                @endif
            </div>
        </div>
    </div>
</section>

</main>
@endsection
