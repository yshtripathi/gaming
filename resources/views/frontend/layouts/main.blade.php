@include('frontend.layouts.head')
@include('frontend.layouts.header')

<!-- Toast Notifications Container -->
<div class="ws-toast-wrapper">
    @include('user.layouts.notification')
</div>

@yield('main-content')
@include('frontend.layouts.footer')
@stack('styles')
@stack('scripts')