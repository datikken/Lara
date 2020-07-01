<?php //dump($product['params']); ?>

<div class="details">
    <div class="details_wrap">
        <div class="details_wrap-slider">
            <div class="swiper-container gallery-top">
                <div class="swiper-wrapper">
                    @foreach($product['images'] as $img)
                        <div class="swiper-slide details_slide" style="background-image:url({{ Storage::url('product_images/' . $img->image) }})"></div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <div class="swiper-container gallery-thumbs">
                <div class="swiper-wrapper">
                    @foreach($product['images'] as $img)
                        <div class="swiper-slide details_slide details_slide_thumb" style="background-image:url({{ Storage::url('product_images/' . $img->image) }})"></div>
                    @endforeach
                </div>
            </div>

            <script>
                var galleryTop = new Swiper('.gallery-top', {
                    spaceBetween: 10,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    loop: true,
                    loopedSlides: 4
                });
                var galleryThumbs = new Swiper('.gallery-thumbs', {
                    spaceBetween: 10,
                    centeredSlides: true,
                    slidesPerView: 'auto',
                    touchRatio: 0.2,
                    slideToClickedSlide: true,
                    loop: true,
                    loopedSlides: 4
                });
                galleryTop.controller.control = galleryThumbs;
                galleryThumbs.controller.control = galleryTop;
            </script>

        </div>


        <div class="details_wrap-info">
            <div class="details_wrap-info_item">
                <div class="details_wrap-info_item-head">
                    <h1>{{ $product['name_econom'] }}</h1>
                </div>
            </div>
            <div class="details_wrap-info_item">
                <div class="details_wrap-info_item-desc">
                    <p>{{$product['description']}}</p>
                </div>
            </div>

            <div class="details_wrap-info_item">
                <div class="details_wrap-info_item-icons">
                    <div class="details_wrap-info_item-icons_icon" style="background-image: url('/images/product/drip.svg')"></div>
                    <div class="details_wrap-info_item-icons_icon" style="background-image: url('/images/product/chip.svg')"></div>
                    <div class="details_wrap-info_item-icons_icon" style="background-image: url('/images/product/new.svg')"></div>
                    <div class="details_wrap-info_item-icons_icon" style="background-image: url('/images/product/stmc.svg')"></div>
                </div>
            </div>


            @foreach ($product['params'] as $key => $val)
                {{--@php dump($key); @endphp--}}
                <div class="details_wrap-info_item">
                    <div class="details_wrap-info_item-field" style="display: flex;">
                        <span>@php if($key != 'STMC') echo $key; @endphp</span> : <span>{{ $val }}</span>
                    </div>
                </div>
            @endforeach


            <div class="details_wrap-info_item">
                <div class="details_wrap-info_item-field">
                    <span>Фотобарабан Mitsubishi Chemical Corporation, тонер Mitsubishi Chemical Corporation</span>
                </div>
            </div>

            <div class="details_wrap-info_item">
                <div class="details_wrap-info_item-field">
                    <span>ОЕМ-номер: CE285A.</span>
                </div>
            </div>

            <div class="details_wrap-info_item">
                <div class="details_wrap-info_item-field">
                    <span>1 600 текстовых страниц А4 <br/> согласно ASTM F1856/STMC для картриджей «Всё в одном».</span>
                </div>
            </div>

            <div class="details_wrap-info_item price_wrap">
                <div class="details_wrap-info_item-price">
                   <div class="details_wrap-info_item-price_item">
                       <img src="/images/icons/alot.svg" alt="amount">
                       <span>Много</span>
                   </div>
                    <div class="details_wrap-info_item-price_item">
                        <span class="details_wrap-info_item-price_item-price"><? echo floor($product['price']); ?></span>
                    </div>
                </div>

                <div class="details_wrap-info_item-price discount">
                    <div class="details_wrap-info_item-price_item">
                        <span>с купоном</span>
                        <img src="/images/icons/tip.svg" alt="amount">
                    </div>
                    <div class="details_wrap-info_item-price_item">
                        <span class="details_wrap-info_item-price_item-price"><? echo floor($product['price']); ?></span>
                    </div>
                </div>
            </div>

            <div class="details_wrap-info_item">
                <div class="details_wrap-info_item-left">
                    <div class="cart_wrap-item_inner-table_row-col col_amount">
                        <span>Количество (шт)</span>
                    </div>
                    @include('components.btn.amount_btn', ['id' => $product['id']])
                </div>
                <div class="details_wrap-info_item-right">
                    <a href="#" class="ajaxGETproduct" data-url="{{ route('AddToCartAjaxGet', ['id' => $product['id']]) }}">
                        @include('components.btn.buy_btn', [ 'class' => 'empty_cart-btn', 'text' => 'в корзину'])
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
