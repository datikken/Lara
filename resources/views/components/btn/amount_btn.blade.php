
<div class="cart_wrap-item_inner-table_row-col_btns-btn-items">
    @if(isset($cartItem))
        <a href="{{ route('DecreaseSingleProduct', ['id' => $cartItem['data']['id']])}}">
            <div class="cart_wrap-item_inner-table_row-col_btns-btn-items_minus">-</div>
        </a>
    @else
        <a href="{{ route('DecreaseSingleProduct',  ['id' => $id])}}">
            <div class="cart_wrap-item_inner-table_row-col_btns-btn-items_minus">-</div>
        </a>
    @endif

    @if(isset($cartItem))
        <div class="cart_wrap-item_inner-table_row-col_btns-btn-items_quantity">
            <span>{{$cartItem['quantity']}}</span>
        </div>
    @else
        <div class="cart_wrap-item_inner-table_row-col_btns-btn-items_quantity">
            <span>1</span>
        </div>
    @endif

    @if(isset($cartItem))
        <a href="{{ route('IncreaseSingleProduct', ['id' => $cartItem['data']['id']])}}">
            <div class="cart_wrap-item_inner-table_row-col_btns-btn-items_plus">+</div>
        </a>
        @else
        <a href="{{ route('IncreaseSingleProduct', ['id' => $id])}}">
            <div class="cart_wrap-item_inner-table_row-col_btns-btn-items_plus">+</div>
        </a>
    @endif
</div>
