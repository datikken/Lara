<div class="product">
    <a href="/product">
        <div class="product_wrapper">
            <div class="product_wrapper-item">
                <div class="product_wrapper-item_heading">
                    <span class="product_wrapper-item_heading-item">{{ $name }}</span>
                </div>
                <div class="product_wrapper-item_amount">
                    <img src="/images/icons/alot.svg" alt="amount"/>
                    <span class="product_wrapper-item_amount-item">Много</span>
                </div>
            </div>
            <div class="product_wrapper-item">
                <div class="product_wrapper-item_image">
                    <img src="/images/unnecessary/product1.png" alt="product" />
                </div>
                <div class="product_wrapper-item_overlay">
                    <div class="product_wrapper-item_overlay_wrapper">
                        <div class="product_wrapper-item_overlay_wrapper-item">
                            <span class="product_wrapper-item_overlay_wrapper-item_text">быстрый просмотр</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product_wrapper-item">
                <div class="product_wrapper-item_head">
                    <span class="product_wrapper-item_head-item">Картридж</span><br/>
                    <span class="product_wrapper-item_head-item">IC-HLOR70A</span>
                </div>
                <div class="product_wrapper-item_price">
                    <span class="product_wrapper-item_price-item">29900</span>
                    <img src="/images/icons/rub.svg" alt="cur" />
                </div>

                @include('components.btn.buy_btn')

            </div>
        </div>
    </a>
</div>
