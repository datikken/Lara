<?php #dump(gettype($product['images'])); ?>

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
                        <div class="swiper-slide details_slide" style="background-image:url({{ Storage::url('product_images/' . $img->image) }})"></div>
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
                    <h1>{{$product['name']}}</h1>
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


<div class="pfeedback">
    <div class="pfeedback_wrap">
        <form action="/product/feedback/" method="get">


            <div class="pfeedback_wrap-item">
                <div class="pfeedback_wrap-item_head">
                    <h2>Написать отзыв</h2>
                </div>
            </div>

            <div class="pfeedback_wrap-item">
                <div class="pfeedback_wrap-item_desc">
                    <p>Спасибо, что делитесь опытом! Ваш отзыв поможет кому-то сделать выбор.</p>
                </div>
            </div>

            <div class="pfeedback_wrap-item">
                <div class="pfeedback_wrap-item_inputs">
                    <div class="pfeedback_wrap-item_inputs-wrap">
                        <label for="name">Имя <span>*</span></label>
                        <input type="text" name="name" />
                    </div>
                    <div class="pfeedback_wrap-item_inputs-wrap">
                        <label for="email">Почтовый адрес</label>
                        <input type="text" name="email" />
                    </div>
                </div>
            </div>

            <div class="pfeedback_wrap-item">
                <div class="pfeedback_wrap-item-desc">
                    <p>Порекомендовали бы этот товар?</p>
                </div>
            </div>

            <div class="pfeedback_wrap-item">
                @include('components.checkbox.round_check', ['name' => 'recommendation', 'data' => 'yes'])
                <span>Да</span>
            </div>

            <div class="pfeedback_wrap-item pfeedback_features">
                <div class="pfeedback_wrap-item_inputs-wrap">
                    <label for="email">Плюсы</label>
                    <input type="text" name="features" placeholder="Преимущества"/>
                </div>
            </div>

            <div class="pfeedback_wrap-item">
                @include('components.checkbox.round_check', ['name' => 'recommendation', 'data' => 'no'])
                <span>Нет</span>
            </div>

            <div class="pfeedback_wrap-item pfeedback_minuses">
                <div class="pfeedback_wrap-item_inputs-wrap">
                    <label for="email">Минусы</label>
                    <input type="text" name="minuses" placeholder="Недостатки"></input>
                </div>
            </div>

            <div class="pfeedback_wrap-item">
                <div class="pfeedback_wrap-item_inputs-wrap">
                    <label for="email">Отзыв</label>
                    <textarea type="text" name="feedback" placeholder="Опишите свое впечатление, опыт. Что понравилось или наоборот."></textarea>
                </div>
            </div>

            <input type="text" name="product_id" class="invisible" value="{{ $product['id'] }}">

            <button type="submit">
                @include('components.btn.text_btn', [ 'class' => 'cfeedback_wrap-row_btn', 'text' => 'Отправить'])
            </button>

        </form>

    </div>
</div>
