
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
            @if(Session::get('cart'))
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
            @endif
        </div>

        @if(Session::get('cart-address'))
            <div class="order_list-wrap_inner-row">
                <div class="order_list-wrap_inner-row_item">
                    <span class="order_list-wrap_inner-row_item-text">Доставка</span>
                </div>
                <div class="order_list-wrap_inner-row_item">
                    <span class="order_list-wrap_inner-row_item-text">@php echo Session::get('cart-address')['deliveryType'] @endphp</span>
                </div>
            </div>
        @endif

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

        @if(Session::get('cart-address'))
            {{--<button type="submit" class="setAddressSubmit" data-url="{{ route('') }}" class="proceedPayment-btn">--}}
            <button type="submit" class="proceedPayment-btn">
                @include('components.btn.text_btn', [ 'class' => 'form_group-btn action_btn', 'text' => 'Завершить покупку'])
            </button>
        @endif

    </div>
</div>

{{--@php dump(Session::get('cart-address')['deliveryType']) @endphp--}}
