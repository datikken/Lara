<div class="product" data-category="{{ $category }}" id="product-{{ $id }}">
        <div class="product_wrapper">
            <div class="product_wrapper-item">
                <div class="product_wrapper-item_name">
                    <span class="product_wrapper-item_name-item">Картридж</span>
                </div>
                <div class="product_wrapper-item_heading">
                    <span class="product_wrapper-item_heading-item">
                        <?
                            if(gettype($name) === 'array') {
                                echo str_limit(json_decode($name_buh), $limit = 40, $end = '...');
                            } else {
                                echo str_limit($name, $limit = 40, $end = '...');
                            }
                        ?>
                    </span>
                </div>

                <div class="product_wrapper-item_amount">
                    <img src="/images/icons/alot.svg" alt="amount"/>
                    <span class="product_wrapper-item_amount-item">Много</span>
                </div>
            </div>
            <div class="product_wrapper-item product_wrapper-itemContent">
                <a class="product_wrapper-item_image" href="{{ route('ShowProductDetails',['id' => $id]) }}">
                    <img src="{{Storage::disk('local')->url('/product_images/' . $image . 'png' )}}" alt="{{$image}}" />
                </a>
                <a class="product_wrapper-item_overlay" href="#modal-{{ $id }}" uk-toggle data-id="{{ $id }}">
                    <div class="product_wrapper-item_overlay_wrapper">
                        <div class="product_wrapper-item_overlay_wrapper-item">
                            <span class="product_wrapper-item_overlay_wrapper-item_text">быстрый просмотр</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="product_wrapper-item">
                <div class="product_wrapper-item_head">
                    <span class="product_wrapper-item_head-item">Картридж</span>
                    <span class="product_wrapper-item_head-item">IC-HLOR70A</span>
                </div>
                <div class="product_wrapper-item_price">
                    <span class="product_wrapper-item_price-item">@php echo floor($price) @endphp</span>
                    <img src="/images/icons/rub.svg" alt="cur" />
                </div>

<a href="#" class="ajaxGETproduct" data-url="{{ route('AddToCartAjaxGet', ['id' => $id]) }}">
                @include('components.btn.buy_btn')
</a>

            </div>
        </div>
</div>


<div id="modal-{{ $id }}" class="uk-flex-top" uk-modal>
    <div id="modal_content" class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <div class="prdet">

            <div class="prdet_wrap">
                <div class="prdet_wrap-item">
                    <div class="prdet_wrap-item_img">
                        <div class="prdet_wrap-item_img_inner"></div>
                    </div>
                </div>
                <div class="prdet_wrap-item">

                    <div class="prdet_wrap-item-head">
                        <span class="prdet_wrap-item-head-item">Тонер-картридж TC-H85A </span>
                    </div>
                    <div class="prdet_wrap-item-desc">
                        <span class="prdet_wrap-item-desc-item">Чёрный тонер-картридж TC-H85A для принтеров и МФУ:</span>
                    </div>

                    <div class="prdet_wrap-item-icons">
                        <div class="prdet_wrap-item-icons-item" style="background-image: url('/images/product/drip.svg')"></div>
                        <div class="prdet_wrap-item-icons-item" style="background-image: url('/images/product/chip.svg')"></div>
                        <div class="prdet_wrap-item-icons-item" style="background-image: url('/images/product/new.svg')"></div>
                        <div class="prdet_wrap-item-icons-item" style="background-image: url('/images/product/stmc.svg')"></div>
                    </div>

                    <div class="prdet_wrap-item-stuff">
                        <span>Фотобарабан Mitsubishi Chemical Corporation, тонер Mitsubishi Chemical Corporation </span>
                        <span>ОЕМ-номер: <b>CE285A.</b></span>
                        <span><b>1 600</b> текстовых страниц <b>А4</b> согласно ASTM F1856/STMC для картриджей «Всё в одном»</span>
                    </div>

                    <div class="prdet_wrap-icons_ctas">
                        <div class="prdet_wrap-icons_ctas-amount">
                            @include('components.btn.price')
                        </div>
                        <div class="prdet_wrap-icons_ctas-increase">
                            <span class="prdet_wrap-icons_ctas-increase-text">Количество (шт)</span>
                            @include('components.btn.amount_btn')
                        </div>
                        <div class="prdet_wrap-icons_ctas-buy">
                            @include('components.btn.buy_btn', [ 'class' => 'empty_cart-btn', 'text' => 'в корзину'])
                        </div>
                        <a class="prdet_wrap-icons_ctas-details">
                            @include('components.btn.text_btn', [ 'class' => 'prdet_btn', 'text' => 'подробнее'])
                        </a>
                    </div>
                </div>
            </div>

            <div class="prdet_comp">
                <div class="prdet_comp-item">
                    <span class="prdet_comp-item-head">Совместим с принтерами</span>
                </div>

                <div class="prdet_comp-item">
                    <div class="prdet_table">
                        <div class="prdet_table-col">
                            <div class="prdet_table-col_head">
                                <span>Марка</span>
                            </div>

                            <div class="prdet_table-col_item">
                                <span>HP LaserJet</span>
                            </div>
                            <div class="prdet_table-col_item">
                                <span>HP LaserJet Pro</span>
                            </div>
                            <div class="prdet_table-col_item">
                                <span>Canon i-Sensys</span>
                            </div>
                        </div>
                        <div class="prdet_table-col">
                            <div class="prdet_table-col_head">
                                <span>Модель</span>
                            </div>

                            <div class="prdet_table-col_item">
                                <span>P1102 1102w</span>
                            </div>
                            <div class="prdet_table-col_item">
                                <span>M1132 M1212nf M1214nfh M1217nfw</span>
                            </div>
                            <div class="prdet_table-col_item">
                                <span>LBP6000 LBP6000B LBP6020 LBP6020B LBP6030 LBP6030B LBP6030W MF3010</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
