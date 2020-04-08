
<div class="cart_wrap-item_inner-table_row-col_btns-btn-items">
    <a href="{{ route('DecreaseSingleProduct', ['id' => $cartItem['data']['id']])}}">
        <div class="cart_wrap-item_inner-table_row-col_btns-btn-items_minus">-</div>
    </a>

    <div class="cart_wrap-item_inner-table_row-col_btns-btn-items_quantity">
        <span>{{$cartItem['quantity']}}</span>
    </div>

    <a href="{{ route('IncreaseSingleProduct', ['id' => $cartItem['data']['id']])}}">
        <div class="cart_wrap-item_inner-table_row-col_btns-btn-items_plus">+</div>
    </a>
</div>