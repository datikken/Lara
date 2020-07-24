
<div class="item">
    <div class="carousel_card">
        <div class="carousel_card-wrapper">

            <div class="carousel_card-wrapper_item">
                <span class="carousel_card-wrapper_item-name">Картридж</span>
            </div>

            <div class="carousel_card-wrapper_item">
                <span class="carousel_card-wrapper_item-heading">
                    <?
                    if(gettype($name) === 'array') {
                        echo str_limit(json_decode($name_buh), $limit = 40, $end = '...');
                    } else {
                        echo str_limit($name, $limit = 40, $end = '...');
                    }
                    ?>
                </span>
            </div>

            <a class="carousel_card-wrapper_item" href="{{ route('ShowProductDetails',['id' => $product['id']]) }}">
                <? if(is_null($product['photo'])) { ?>
                    <img src="/images/unnecessary/owl-swiper.svg" alt="cart" />
                <? } else { ?>
<img class="carousel_card-wrapper_item-image" onerror="this.src = '/images/unnecessary/owl-swiper.svg';" src="{{ Storage::url('product_images/' . json_decode($product['params'])->brand . '/Small/' . $product['photo'] . '.png') }}"/>
                <? } ?>
            </a>

            <div class="carousel_card-wrapper_item">
                <div class="carousel_card-wrapper_item-buttons">
                    <div class="carousel_card-wrapper_item-buttons_price">
                        <span>@php echo floor( $product->price ); @endphp</span>
                        <img
                            class="carousel_card-wrapper_item-buttons_price-currency"
                            src="/images/menu/rub.svg"
                            alt="rub"
                        />
                    </div>
                    <div class="carousel_card-wrapper_item-buttons_cart ajaxGETproduct" data-url="{{ route('AddToCartAjaxGet', ['id' => $product->id]) }}">
                        <img
                            class="carousel_card-wrapper_item-buttons_cart-item"
                            src="/images/icons/cart.svg"
                            alt="cart"
                        />
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
