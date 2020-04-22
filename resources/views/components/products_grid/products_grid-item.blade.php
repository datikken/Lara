<div class="product" data-category="{{ $category }}" id="product-{{ $id }}">
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
                <a class="product_wrapper-item_overlay" href="#modal-center" uk-toggle data-id="{{ $id }}">
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
        <div class="product_wrapper">
           <div class="prdet">
               <div class="prdet_wrap">
                   <div class="prdet_wrap-item">
                        <div class="prdet_wrap-item_img"></div>
                   </div>
                   <div class="prdet_wrap-item">

                       <div class="prdet_wrap-item-head"></div>
                       <div class="prdet_wrap-item-desc"></div>

                       <div class="prdet_wrap-item-icons">
                           <div class="prdet_wrap-item-icons-item"></div>
                           <div class="prdet_wrap-item-icons-item"></div>
                           <div class="prdet_wrap-item-icons-item"></div>
                           <div class="prdet_wrap-item-icons-item"></div>
                       </div>

                       <div class="prdet_wrap-icons_ctas">
                           <div class="prdet_wrap-icons_ctas-amount">
                               @include('components.btn.price')
                           </div>
                           <div class="prdet_wrap-icons_ctas-increase">
                               @include('components.btn.amount_btn')
                           </div>
                           <div class="prdet_wrap-icons_ctas-buy">
                               @include('components.btn.buy_btn', [ 'class' => 'empty_cart-btn', 'text' => 'в корзину'])
                           </div>
                           <div class="prdet_wrap-icons_ctas-details">
                               @include('components.btn.text_btn', [ 'class' => 'flat_btn', 'text' => 'подробнее'])
                           </div>
                       </div>


                   </div>
               </div>
           </div>
        </div>
    </div>
</div>
