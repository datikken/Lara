<?php #dump($cartItem); ?>

<div class="cart_wrap-item_inner-table_row" data-id="{{ $cartItem['data']['id'] }}">
    <div class="cart_wrap-item_inner-table_row-col">
        <div class="cart_wrap-item_inner-table_row_heading desktop-hide">
            <span>Картридж</span>
        </div>
        <div class="cart_wrap-item_inner-table_row-col_img">
            <a data-href="{{route('DeleteItemFromCart', ['id' => $cartItem['data']['id']])}}" class="remove_icon" style="background-image: url('/images/unnecessary/cart_close.svg')"></a>
            <img src="{{Storage::disk('local')->url('product_images/' . DB::table('product_images')->where('product_id', $cartItem['data']['id'])->value('image'))}}" alt="product"/>
        </div>
        <div class="cart_wrap-item_inner-table_row-col_desc">

            <div class="cart_wrap-item_inner-table_row-col_desc-head">
                <span>Чёрный тонер-картридж</span>
            </div>
            <div class="cart_wrap-item_inner-table_row-col_desc-info">
                <span>TC-H85A</span>
            </div>
            <div class="cart_wrap-item_inner-table_row-col_desc-about">
                <span>для принтеров и МФУ:</span>
            </div>
        </div>
    </div>
    <div class="cart_wrap-item_inner-table_row-col">
        <div class="cart_wrap-item_inner-table_row-col_price">

            <span class="desktop-hide">Цена (шт)</span>

            <div class="cart_wrap-item_inner-table_row-col_price-val">
                <span class="cart_wrap-item_inner-table_row-col_price-val-item">
                    {{$cartItem['price']}}
                </span>
                <img src="/images/icons/rub.svg" alt="currency" />
            </div>

        </div>
    </div>
    <div class="cart_wrap-item_inner-table_row-col">
        <span class="desktop-hide">Количество (шт)</span>
        <div class="cart_wrap-item_inner-table_row-col_btns">
            <div class="cart_wrap-item_inner-table_row-col_btns-btn" style="margin-right: 34px;">
                <div class="cart_wrap-item_inner-table_row-col col_amount">
                    <span>Количество (шт)</span>
                </div>
                @include('components.btn.amount_btn')
            </div>
        </div>
    </div>

    <div class="cart_wrap-item_inner-table_row-col">
        <span class="desktop-hide">Общая сумма товаров (шт)</span>
        <div class="cart_wrap-item_inner-table_row-col_total">
            <span>
                {{$cartItem['totalPrice']}}
            </span>
        </div>
    </div>

    <div class="desktop-hide">
        <div class="cart_wrap-item_inner-table_row-col product_delete" style="padding-top: 15px;">
            <span class="desktop-hide"> Удалить товар </span>
            <div class="cart_wrap-item_inner-table_row-col_total">
                <a href="{{route('DeleteItemFromCart', ['id' => $cartItem['data']['id']])}}" class="remove_icon" style="background-image: url('/images/unnecessary/cart_close.svg')"></a>
            </div>
        </div>
    </div>

    {{--<div class="cart_wrap-item_inner-table_row-col">--}}
        {{--<a class="" href=>Удалить товар</a>--}}
        {{--<div class="cart_wrap-item_inner-table_row-col_delete"></div>--}}
    {{--</div>--}}

</div>
