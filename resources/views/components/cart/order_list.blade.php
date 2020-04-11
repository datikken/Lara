
<div class="order_list">
    <div class="order_list-wrap">
        <div class="order_list-wrap_item">
            <div class="order_list-wrap_item-head">
                <h1>Ваш заказ</h1>
            </div>
        </div>

        <div class="order_list-wrap_inner">
            <div class="order_list-wrap_inner-row">
                <div class="order_list-wrap_inner-row_item">
                    <span class="order_list-wrap_inner-row_item-head">Наимениование</span>
                </div>
                <div class="order_list-wrap_inner-row_item">
                    <span class="order_list-wrap_inner-row_item-head">Стоимость</span>
                </div>
            </div>

            @foreach (Session::get('cart')->items as $item)
                <div class="order_list-wrap_inner-row">
                    <div class="order_list-wrap_inner-row_item">
                        <span class="order_list-wrap_inner-row_item-text">{{ $item['data']['name'] }}</span>
                    </div>
                    <div class="order_list-wrap_inner-row_item">
                        <span class="order_list-wrap_inner-row_item-text"> {{ $item['price'] }}</span>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="order_list-wrap_footer">
            <div class="order_list-wrap_footer-row">
                <div class="order_list-wrap_footer-row_item">
                    <span>Сумма</span>
                </div>
                <div class="order_list-wrap_footer-row_item">
                    <span id="totalQuantity">
                        @php
                            if(Session::has('cart')) echo Session::get('cart')->totalPrice;
                        @endphp руб.
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>