<?php #dump($cartItems); ?>

<div class="cart_wrap-item_inner">
    <div class="cart_wrap-item_inner-table"
         @if(isset($cartItems->totalQuantity))
             data-cartPrice="{{ $cartItems->totalPrice }}"
             data-cartAmount="{{ $cartItems->totalQuantity }}"
        @endif
    >
        @if(Session::get('cart'))
            @foreach($cartItems->items as $cartItem)
                @include('components.cart.cart_item', $cartItem)
            @endforeach
        @else
            @include('components.cart.cart_empty')
        @endif
    </div>
</div>