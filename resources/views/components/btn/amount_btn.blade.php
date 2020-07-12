
<div class="cart_wrap-item_inner-table_row-col_btns-btn-items">
    @if(isset($cartItem))
        <a href="{{ route('DecreaseSingleProduct', ['id' => $cartItem['data']['id']])}}" data-prid="{{ $id }}">
            <div class="cart_wrap-item_inner-table_row-col_btns-btn-items_minus" data-prid="{{ $id }}">-</div>
        </a>
    @else
        <a href="{{ route('DecreaseSingleProduct',  ['id' => $id])}}" data-prid="{{ $id }}">
            <div class="cart_wrap-item_inner-table_row-col_btns-btn-items_minus" data-prid="{{ $id }}">-</div>
        </a>
    @endif

    @if(isset($cartItem))
        <div class="cart_wrap-item_inner-table_row-col_btns-btn-items_quantity">
           {{$cartItem['quantity']}}
        </div>
    @else
        <div class="cart_wrap-item_inner-table_row-col_btns-btn-items_quantity">
            1
        </div>
    @endif

    @if(isset($cartItem))
        <a href="{{ route('IncreaseSingleProduct', ['id' => $cartItem['data']['id']])}}" data-prid="{{ $id }}">
            <div class="cart_wrap-item_inner-table_row-col_btns-btn-items_plus">+</div>
        </a>
        @else
        <a href="{{ route('IncreaseSingleProduct', ['id' => $id])}}" data-prid="{{ $id }}">
            <div class="cart_wrap-item_inner-table_row-col_btns-btn-items_plus">+</div>
        </a>
    @endif
</div>
