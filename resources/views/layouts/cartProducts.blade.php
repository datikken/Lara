@include('components.scripts.scripts')
@include('components.styles.style')
@include('components.header.header')
@include('components.menu.menu')

<div class="cart">
    <div class="cart_wrap">
        @if(Session::get('cart'))
            @include('components.breadcrumbs.cart_wrap-crumb')
        @endif
        @yield('center')
    </div>
</div>

@include('layouts.footer')
