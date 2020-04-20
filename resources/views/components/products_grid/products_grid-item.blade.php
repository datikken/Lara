<div class="product" data-category="{{ $category }}">
    <a href="{{ route('ShowProductDetails',['id' => $id]) }}">
        <div class="product_wrapper">
            <div class="product_wrapper-item">
                <div class="product_wrapper-item_name">
                    <span class="product_wrapper-item_name-item">Картридж</span>
                </div>
                <div class="product_wrapper-item_heading">
                    <span class="product_wrapper-item_heading-item">{{ $name }}</span>
                </div>
                <div class="product_wrapper-item_amount">
                    <img src="/images/icons/alot.svg" alt="amount"/>
                    <span class="product_wrapper-item_amount-item">Много</span>
                </div>
            </div>
            <div class="product_wrapper-item product_wrapper-itemContent">
                <div class="product_wrapper-item_image">
                    <img src="{{Storage::disk('local')->url('/product_images/' . $image )}}" alt="{{$image}}" />
                </div>
                <a class="product_wrapper-item_overlay" href="#modal-center" uk-toggle>
                    <div class="product_wrapper-item_overlay_wrapper">
                        <div class="product_wrapper-item_overlay_wrapper-item">
                            <span class="product_wrapper-item_overlay_wrapper-item_text">быстрый просмотр</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="product_wrapper-item">
                <div class="product_wrapper-item_head">
                    <span class="product_wrapper-item_head-item">Картридж</span><br/>
                    <span class="product_wrapper-item_head-item">IC-HLOR70A</span>
                </div>
                <div class="product_wrapper-item_price">
                    <span class="product_wrapper-item_price-item">{{$price}}</span>
                        <img src="/images/icons/rub.svg" alt="cur" />
                </div>

<a href="#" class="ajaxGETproduct" data-url="{{ route('AddToCartAjaxGet', ['id' => $id]) }}">
                @include('components.btn.buy_btn')
</a>

            </div>
        </div>
    </a>
</div>



<div id="modal-center" class="uk-flex-top" uk-modal>
    <div id="modal_content" class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

        {{--<button class="uk-modal-close-default" type="button" uk-close></button>--}}

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    </div>
</div>
