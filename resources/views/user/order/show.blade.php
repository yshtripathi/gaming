@extends('frontend.layouts.main')

@section('title','Order Detail')

@section('main-content')

  <main>

   <section class="inner-header space-ptb bg-holder" style="background-image: url({{url('assets/images/bg/02.jpg')}});height:10px;padding:50px 0px;">
   
</section>
     
<section class="accunt-info space-ptb our-product">
   <div class="container">
      <!-- Nav Tabs List -->
   <div class="col-lg-10 offset-lg-1">    
      <div class="row">
          
          <div class="table-responsive mb-5">

              <div class="card">
                <h5 class="card-header">
                  <a href="/user" class=" btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-arrow-left fa-sm text-white-50"></i> {{ __('common.back') }}</a>
                  <a href="{{route('order.pdf',$order->id)}}" class=" btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-download fa-sm text-white-50"></i> {{ __('common.generate_pdf') }}</a>
                </h5>
                <div class="card-body">
                  @if($order)
                  <table class="table table-striped table-hover">
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
                          <td>{{$order->order_number}}</td>
                          <td>{{$order->first_name}} {{$order->last_name}}</td>
                          <td>{{$order->email}}</td>
                          <td>{{$order->quantity}}</td>
                          <td class="text-right ft-w-b">
                            @php
                              $currency = match($order->currency) {
                                  'USD' => '$',
                                  'JPY' => '¥',
                                  default => '$',
                              };

                              if($order->currency == "USD") {
                                  $orderTotalAmount = number_format($order->total_amount, 2);
                              }
                              else {
                                  $orderTotalAmount = number_format($order->total_amount_jp, 2);
                              }
                            @endphp
                            
                            {{ $currency }}{{number_format($order->total_amount, $order->currency=='JPY' ? 0 : 2)}}       
                          </td>
                          <td>
                            {{ ucwords($order->status) }}
                          </td>
                          

                      </tr>
                    </tbody>
                  </table>

                  <section class="confirmation_part section_padding">
                    <div class="order_boxes">
                      <div class="row">
                        <div class="col-lg-12 col-lx-12">
                          <div class="order-info">
                            <h4 class="text-center pb-4 text-success">{{ __('common.order_information') }}</h4>
                            <table class="table">
                                  <tr class="">
                                      <td>{{ __('common.order_number') }}</td>
                                      <td> : {{$order->order_number}}</td>
                                  </tr>
                                  <tr>
                                      <td>{{ __('common.order_date') }}</td>
                                      <td> : {{$order->created_at->format('D d M, Y')}} at {{$order->created_at->format('g : i a')}} </td>
                                  </tr>
                                  <tr>
                                      <td>{{ __('common.quantity') }}</td>
                                      <td> : {{$order->quantity}}</td>
                                  </tr>
                                  <tr>
                                      <td>{{ __('common.order_status') }}</td>
                                      <td> : {{ ucwords($order->status) }}</td>
                                  </tr>
                                  <tr>
                                      <td>{{ __('common.total_amount') }}</td>
                                      <td> : {{ $currency }} {{number_format($order->total_amount, $order->currency=='JPY' ? 0 : 2)}}       </td>
                                  </tr>
                                  <tr>
                                    <td>{{ __('common.payment_method') }}</td>
                                    <td> : Credit Card</td>
                                  </tr>
                                  <tr>
                                      <td>{{ __('common.status') }}</td>
                                      <td> : {{ ucwords($order->payment_status) }}</td>
                                  </tr>
                                  <tr>
                                      <td>{{ __('common.transaction_id') }}</td>
                                      <td> : {{ $order->trans_id }}</td>
                                  </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                  @endif

                </div>
              </div>

              </div>
             
      </div>
    </div>
   </div>
</section>
@endsection

@push('styles')
<style>
    .order-info,.shipping-info{
        background:#ECECEC;
        padding:20px;
    }
    .order-info h4,.shipping-info h4{
        text-decoration: underline;
    }

</style>
@endpush
