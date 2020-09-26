<?
    $params = json_decode($product['params']);
?>

<div class="details">
    <div class="details_wrap">


        <div class="details_wrap-slider">
            <div class="swiper-container gallery-top">
                <div class="swiper-wrapper">
                    @foreach($product['images'] as $img)
                        <div class="swiper-slide details_slide" style="background-image:url({{ Storage::url('product_images/' . $img->image) }})"></div>
                    @endforeach
                </div>
            </div>
            <div class="swiper-container gallery-thumbs">
                <div class="swiper-wrapper">
                    @foreach($product['images'] as $img)
                        <div class="swiper-slide details_slide details_slide_thumb" style="background-image:url({{ Storage::url('product_images/' . $img->image) }})"></div>
                    @endforeach
                </div>
                <div class="swiper-button-next gallery-thumbs-next"></div>
                <div class="swiper-button-prev gallery-thumbs-prev"></div>
            </div>
        </div>


        <div class="details_wrap-info">
            <div class="details_wrap-info_item">
                <div class="details_wrap-info_item-head">
                    <h1>{{ $product['name_econom'] }}</h1>
                </div>
            </div>

            {{-- {{ dump($product)}} --}}

            <div class="details_wrap-info_item">
                <div class="details_wrap-info_item-desc">
                    {{-- <p>{{$product['description']}}</p> --}}
                    <p>@if(isset($params->color)) {{ $params->color }}  @endif тонер-картридж TC-H85A для принтеров и МФУ:</p>
                </div>
            </div>

            <div class="details_wrap-info_item">
                <div class="details_wrap-info_item-icons">

                {{-- {{ dd($params) }} --}}


                <? if(isset($params->color)) { ?>
                    @if($params->color == 'Трехцветный')
                        <div class="details_wrap-info_item-icons_icon" style="background-image: url('/images/product/drip_gradient.svg')"></div>
                    @elseif($params->color == 'Черный')
                        <div class="details_wrap-info_item-icons_icon" style="background-image: url('/images/product/drip.svg')"></div>
                    @elseif($params->color == 'Желтый')
                        <svg class="details_wrap-info_item-icons_icon" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="25" cy="25" r="24.5" stroke="#40404C"/>
                            <path d="M33.4286 30.094C33.4286 34.4604 29.7509 38 25.2143 38C20.6777 38 17 34.4604 17 30.094C17 25.7277 25.2143 13 25.2143 13C25.2143 13 33.4286 25.7277 33.4286 30.094Z" fill="#40404C"/>
                            <path d="M33.4286 30.094C33.4286 34.4604 29.7509 38 25.2143 38C20.6777 38 17 34.4604 17 30.094C17 25.7277 25.2143 13 25.2143 13C25.2143 13 33.4286 25.7277 33.4286 30.094Z" fill="#fdd935" stroke="#fdd935"/>
                        </svg>
                    @elseif($params->color == 'Пурпурный')
                        <svg class="details_wrap-info_item-icons_icon" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="25" cy="25" r="24.5" stroke="#40404C"/>
                            <path d="M33.4286 30.094C33.4286 34.4604 29.7509 38 25.2143 38C20.6777 38 17 34.4604 17 30.094C17 25.7277 25.2143 13 25.2143 13C25.2143 13 33.4286 25.7277 33.4286 30.094Z" fill="#40404C"/>
                            <path d="M33.4286 30.094C33.4286 34.4604 29.7509 38 25.2143 38C20.6777 38 17 34.4604 17 30.094C17 25.7277 25.2143 13 25.2143 13C25.2143 13 33.4286 25.7277 33.4286 30.094Z" fill="#ff54a4" stroke="#ff54a4"/>
                        </svg>
                    @elseif($params->color == 'Голубой')
                        <svg class="details_wrap-info_item-icons_icon" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="25" cy="25" r="24.5" stroke="#40404C"/>
                            <path d="M33.4286 30.094C33.4286 34.4604 29.7509 38 25.2143 38C20.6777 38 17 34.4604 17 30.094C17 25.7277 25.2143 13 25.2143 13C25.2143 13 33.4286 25.7277 33.4286 30.094Z" fill="#40404C"/>
                            <path d="M33.4286 30.094C33.4286 34.4604 29.7509 38 25.2143 38C20.6777 38 17 34.4604 17 30.094C17 25.7277 25.2143 13 25.2143 13C25.2143 13 33.4286 25.7277 33.4286 30.094Z" fill="#00b7f7" stroke="#00b7f7"/>
                        </svg>
                    @elseif($params->color == 'Серый')
                        <svg class="details_wrap-info_item-icons_icon" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="25" cy="25" r="24.5" stroke="#40404C"/>
                            <path d="M33.4286 30.094C33.4286 34.4604 29.7509 38 25.2143 38C20.6777 38 17 34.4604 17 30.094C17 25.7277 25.2143 13 25.2143 13C25.2143 13 33.4286 25.7277 33.4286 30.094Z" fill="#40404C"/>
                            <path d="M33.4286 30.094C33.4286 34.4604 29.7509 38 25.2143 38C20.6777 38 17 34.4604 17 30.094C17 25.7277 25.2143 13 25.2143 13C25.2143 13 33.4286 25.7277 33.4286 30.094Z" fill="#686866" stroke="#686866"/>
                        </svg>
                    @endif
                <? } ?>



                    @if($params->Чип == 'true')
                        <div class="details_wrap-info_item-icons_icon" style="background-image: url('/images/product/chip.svg')"></div>
                    @endif

                    @if($params->Новый == 'true')
                        <div class="details_wrap-info_item-icons_icon" style="background-image: url('/images/product/new.svg')"></div>
                    @endif

                    @if($params->STMC == 'true')
                        <div class="details_wrap-info_item-icons_icon" style="background-image: url('/images/product/stmc.svg')"></div>
                    @endif
                </div>
            </div>

            <div class="details_wrap-info_item">
                <div class="details_wrap-info_item-field">
                    <span>{{ $params->Ресурс }} согласно ASTM F1856/STMC для картриджей «Всё в одном».</span>
                </div>
            </div>

            <div class="details_wrap-info_item">
                <div class="details_wrap-info_item-field">
                    <span>ОЕМ-номер: CE285A.</span>
                </div>
            </div>

{{-- {{ dd($product) }} --}}

            <div class="details_wrap-info_item price_wrap">
                <div class="details_wrap-info_item-price">
                   <div class="details_wrap-info_item-price_item">
                       <img src="/images/icons/alot.svg" alt="amount">
                       <span>Много</span>
                   </div>
                    <div class="details_wrap-info_item-price_item">
                        <span class="details_wrap-info_item-price_item-price"><? echo floor($product['price']); ?></span>
                        <img class="details_wrap-info_item-price_item-rub" src="/images/menu/rub.svg" alt="rub"/>
                    </div>
                </div>

                <div class="details_wrap-info_item-price discount">
                    <!-- <div class="details_wrap-info_item-price_item">
                        <span>с купоном</span>
                        <img src="/images/icons/tip.svg" alt="amount">
                    </div> -->
                    <!-- <div class="details_wrap-info_item-price_item">
                        <span class="details_wrap-info_item-price_item-price">
                            <? #echo floor($product['price']); ?>
                            <img class="details_wrap-info_item-price_item-rubMini" src="/images/menu/rub.svg" alt="rub"/>
                        </span>
                    </div> -->
                </div>
            </div>

            <div class="details_wrap-info_item" data-pid="{{ $product['id'] }}">
                <div class="details_wrap-info_item-left">
                    <div class="cart_wrap-item_inner-table_row-col col_amount">
                        <span>Количество (шт)</span>
                    </div>
                    @include('components.btn.amount_btn', ['id' => $product['id']])
                </div>
                <div class="details_wrap-info_item-right">
                    <a href="#" class="" data-url="{{ route('AddToCartAjaxGet', ['id' => $product['id']]) }}">
                        @include('components.btn.buy_btn', [ 'class' => 'empty_cart-btn', 'text' => 'в корзину'])
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
