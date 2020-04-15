<?php #dump($product['image']); ?>

<div class="details">
    <div class="details_wrap">

        <div class="details_wrap-slider">
            <style>
                .details_slide {
                    background-size: contain!important;
                    background-position: center;
                    background-repeat: no-repeat;
                }
                .swiper-container {
                    width: 100%;
                    height: 300px;
                    margin-left: auto;
                    margin-right: auto;
                    overflow: hidden;
                    margin-bottom: 0;
                }
                .swiper-slide {
                    background-size: cover;
                    background-position: center;
                }
                .gallery-top {
                    width: 600px!important;
                    height: 370px!important;
                    border: 1px solid #D4D4D5;
                    margin-top: 30px;
                }
                .gallery-thumbs {
                    width: 600px!important;
                    box-sizing: border-box;
                    padding: 10px 0;
                    overflow: hidden;

                }
                .gallery-thumbs .swiper-slide {
                    width: 100px;
                    height: 65px!important;
                    height: 100%;
                    opacity: 0.4;
                    border: 1px solid #D4D4D5;
                }
                .gallery-thumbs .swiper-slide-active {
                    opacity: 1;
                }
                .details_nav-left {
                    position: absolute!important;
                    bottom: -55px!important;
                    z-index: 99999999;
                    top:initial;
                }
                .details_nav-right:after {
                    background-image: url('/images/icons/arrow_right.svg');
                }
                .details_nav-right {
                    position: absolute!important;
                    bottom: -55px!important;
                    z-index: 99999999;
                    top:initial;
                    height: 20px;
                    width:20px;
                }
            </style>

            <div class="swiper-container gallery-top">
                <div class="swiper-wrapper">
                    <div class="swiper-slide details_slide" style="background-image:url({{ Storage::url('product_images/' . $product['image']) }})"></div>
                    <div class="swiper-slide details_slide" style="background-image:url({{ Storage::url('product_images/' . $product['image']) }})"></div>
                    <div class="swiper-slide details_slide" style="background-image:url({{ Storage::url('product_images/' . $product['image']) }})"></div>
                    <div class="swiper-slide details_slide" style="background-image:url({{ Storage::url('product_images/' . $product['image']) }})"></div>
                    <div class="swiper-slide details_slide" style="background-image:url({{ Storage::url('product_images/' . $product['image']) }})"></div>
                </div>

                <div class="swiper-button-next swiper-button-white details_nav-right" style="background-image: url('/images/icons/arrow_right.svg')"></div>
                <div class="swiper-button-prev swiper-button-white details_nav-left"></div>

            </div>
            <div class="swiper-container gallery-thumbs">
                <div class="swiper-wrapper">
                    <div class="swiper-slide details_slide" style="background-image:url({{ Storage::url('product_images/' . $product['image']) }})"></div>
                    <div class="swiper-slide details_slide" style="background-image:url({{ Storage::url('product_images/' . $product['image']) }})"></div>
                    <div class="swiper-slide details_slide" style="background-image:url({{ Storage::url('product_images/' . $product['image']) }})"></div>
                    <div class="swiper-slide details_slide" style="background-image:url({{ Storage::url('product_images/' . $product['image']) }})"></div>
                    <div class="swiper-slide details_slide" style="background-image:url({{ Storage::url('product_images/' . $product['image']) }})"></div>
                </div>
            </div>

            <script>
                var galleryTop = new Swiper('.gallery-top', {
                    spaceBetween: 10
                });
                var galleryThumbs = new Swiper('.gallery-thumbs', {
                    spaceBetween: 10,
                    centeredSlides: true,
                    slidesPerView: 'auto',
                    touchRatio: 0.2,
                    slideToClickedSlide: true,
                    initialSlide: 2,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    }
                });
                galleryTop.controller.control = galleryThumbs;
                galleryThumbs.controller.control = galleryTop;
            </script>
        </div>


        <div class="details_wrap-info">
            <div class="details_wrap-info_item">
                <div class="details_wrap-info_item-head">
                    <h1>{{$product['name']}}</h1>
                </div>
            </div>
            <div class="details_wrap-info_item">
                <div class="details_wrap-info_item-desc">
                    <p>{{$product['description']}}</p>
                </div>
            </div>

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
                        <span class="details_wrap-info_item-price_item-price">29900</span>
                    </div>
                </div>

                <div class="details_wrap-info_item-price discount">
                    <div class="details_wrap-info_item-price_item">
                        <span>с купоном</span>
                        <img src="/images/icons/tip.svg" alt="amount">
                    </div>
                    <div class="details_wrap-info_item-price_item">
                        <span class="details_wrap-info_item-price_item-price">29900</span>
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
