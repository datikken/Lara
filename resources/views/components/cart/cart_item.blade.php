<?php #dump($cartItem)?>

<div class="cart_wrap-item_inner-table_row">
    <div class="cart_wrap-item_inner-table_row-col">
        <div class="cart_wrap-item_inner-table_row_heading desktop-hide">
            <span>Картридж</span>
        </div>
        <div class="cart_wrap-item_inner-table_row-col_img">
                <img src="{{Storage::disk('local')->url('product_images/' . $cartItem['data']['image'])}}" alt="product"/>
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
            <span class="cart_wrap-item_inner-table_row-col_price-val-item">
                {{$cartItem['price']}}
            </span>
            <img src="/images/icons/rub.svg" alt="currency"/>
        </div>
    </div>
    <div class="cart_wrap-item_inner-table_row-col">
        <span class="desktop-hide">Количество (шт)</span>
        <div class="cart_wrap-item_inner-table_row-col_btns">
            <span class="cart_wrap-item_inner-table_row-col_btns-btn">
                <span>
                    {{$cartItem['quantity']}}
                </span>
                <span class="cart_wrap-item_inner-table_row-col_btns-btn-items">
                    <span>+</span>
                    <span>-</span>
                </span>
            </span>
        </div>
    </div>
    <div class="cart_wrap-item_inner-table_row-col">
        <span class="desktop-hide">Общая сумма товаров (шт)</span>
        <div class="cart_wrap-item_inner-table_row-col_total">
            <span>
                {{$cartItem['totalprice']}}
            </span>
        </div>
    </div>
    <div class="cart_wrap-item_inner-table_row-col desktop-hide">
        <span class="desktop-hide">Удалить товар</span>
        <div class="cart_wrap-item_inner-table_row-col_delete"></div>
    </div>
</div>
