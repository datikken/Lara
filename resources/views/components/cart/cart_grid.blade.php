<div class="cart_wrap-item_inner">
    <div class="cart_wrap-item_inner-table"
         @if(!empty($cartItems))
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