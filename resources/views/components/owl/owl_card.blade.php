
<div class="owl-item">
    <div class="carousel_card">
        <div class="carousel_card-wrapper">
            <div class="carousel_card-wrapper_item">
                <span class="carousel_card-wrapper_item-name">Картридж</span>
            </div>
            <div class="carousel_card-wrapper_item">
            <span class="carousel_card-wrapper_item-heading">
              {{ $product->name }}
            </span>
            </div>

            <div class="carousel_card-wrapper_item">
                <div class="carousel_card-wrapper_item-image" style="background-image: url({{ Storage::url('product_images/' . $product['image']) }})">
                    {{--<img src="/images/unnecessary/owl-swiper.svg" alt="cart" />--}}
                </div>
            </div>

            <div class="carousel_card-wrapper_item">
                <div class="carousel_card-wrapper_item-buttons">
                    <div class="carousel_card-wrapper_item-buttons_price">
                        <span>{{$product->price}}</span>
                        <img
                            class="carousel_card-wrapper_item-buttons_price-currency"
                            src="/images/menu/rub.svg"
                            alt="rub"
                        />
                    </div>
                    <div class="carousel_card-wrapper_item-buttons_cart">
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
