<div class="menu">
    <div class="menu_wrapper">
        <div class="menu_wrapper-item">

            <div class="menu_wrapper-item_hamburger">
                <img src="/images/menu/Mhamburger.svg" alt="hamburger" class="desktop-hide"/>
                <img src="/images/menu/hamburger.svg" alt="hamburger" class="mobile-hide"/>
                <a class="menu_wrapper-item_hamburger-link" href="/">
                    <img src='/images/header/MLOGO.png' alt="logo" class="menu_wrapper-item_hamburger-logo"/>
                </a>
            </div>

            <div class="menu_wrapper-item_secondary">
            <div class="menu_Wrapper-item_secondary-item">
                <ul class="menu_Wrapper-item_secondary-item_list">
                    <li class="menu_Wrapper-item_secondary-item_list-item">
                        <a href="/catalog">
                        <span class="menu_Wrapper-item_secondary-item_list-item-text">
                                          Каталог
                                        </span>
                        </a>
                        <img src="/images/icons/arrow_right.svg" alt="right" />
                    </li>
                    {{--<li class="menu_Wrapper-item_secondary-item_list-item">--}}
                        {{--<a href="/sales">--}}
                        {{--<span class="menu_Wrapper-item_secondary-item_list-item-text">--}}
                            {{--Акции--}}
                        {{--</span>--}}
                        {{--</a>--}}
                        {{--<img src="/images/icons/arrow_right.svg" alt="right" />--}}
                    {{--</li>--}}
                    <li class="menu_Wrapper-item_secondary-item_list-item">
                        <a href="/about">
                        <span class="menu_Wrapper-item_secondary-item_list-item-text">
                                        О нас
                                      </span>
                        </a>
                        <img src="/images/icons/arrow_right.svg" alt="right" />
                    </li>
                    <li class="menu_Wrapper-item_secondary-item_list-item">
                        <a href="/blog">
                        <span class="menu_Wrapper-item_secondary-item_list-item-text">
                                        Блог
                                      </span>
                        </a>
                        <img src="/images/icons/arrow_right.svg" alt="right" />
                    </li>
                    <li class="menu_Wrapper-item_secondary-item_list-item">
                        <a href="/contacts">
                        <span class="menu_Wrapper-item_secondary-item_list-item-text">
                                          Контакты
                                        </span>
                        </a>
                        <img src="/images/icons/arrow_right.svg" alt="right" />
                    </li>
                    <li class="menu_Wrapper-item_secondary-item_list-item">
                        <a href="/information">
                        <span class="menu_Wrapper-item_secondary-item_list-item-text">
                                          Информация
                                        </span>
                        </a>
                        <img src="/images/icons/arrow_right.svg" alt="right" />
                    </li>
                    <li class="menu_Wrapper-item_secondary-item_list-item">
                        <a href="/hits">
                        <span class="menu_Wrapper-item_secondary-item_list-item-text">
                                            Хит - парад принтеров
                                         </span>
                        </a>
                        <img src="/images/icons/arrow_right.svg" alt="right" />
                    </li>
                    <li class="menu_Wrapper-item_secondary-item_list-item vip-item">
                        <img src="/images/menu/tracking.svg" alt="tracking" />
                        <a href="/tracking">
                        <span class="menu_Wrapper-item_secondary-item_list-item-text">
                                        Трекинг заказа
                                      </span>
                        </a>
                        <img src="/images/icons/arrow_right.svg" alt="right" class="arrow_right"/>
                    </li>
                    <li class="menu_Wrapper-item_secondary-item_list-item vip-item">
                        <img src="/images/menu/login.svg" alt="login" />
                        <a href="/login">
                        <span class="menu_Wrapper-item_secondary-item_list-item-text">
                                        Личный кабинет
                                      </span>
                        </a>
                        <img src="/images/icons/arrow_right.svg" alt="right" class="arrow_right"/>
                    </li>
                    <li class="menu_Wrapper-item_secondary-item_list-item vip-item">
                        <img src="/images/menu/cart.svg" alt="cart" />
                        <a href="/cart">
                        <span class="menu_Wrapper-item_secondary-item_list-item-text">
                                        Корзина
                                      </span>
                        </a>
                        <img src="/images/icons/arrow_right.svg" alt="right" class="arrow_right"/>
                    </li>
                    <li class="menu_Wrapper-item_secondary-item_list-item vip-item">
                        <img src="/images/header/contact.svg" alt="contact" class="contact_image"/>
                        <span class="menu_Wrapper-item_secondary-item_list-item-text">
                                  <span class="menu_Wrapper-item_secondary-item_list-item-text_inner">
                                      <span>+7 (495) 775 50 53</span>
                                      <span>пн-пт 10:00 - 19:00</span>
                                    </span>
                                  </span>
                    </li>
                    <li class="menu_Wrapper-item_secondary-item_list-item">
                        <img src="/images/header/Mail.svg" alt="mailer" />
                        <span class="menu_Wrapper-item_secondary-item_list-item-text">
                                    kakayatopochta@gmail.com
                                  </span>
                    </li>
                </ul>
            </div>
        </div>

        <a href="/" class="menu_wrapper-item_menuText-link">
        <div class="menu_wrapper-item_menuText">
            <img
                src="/images/icons/menu_decor.svg"
                class="menu_wrapper-item_menuText-decor"
                alt="decor"
            />

            <div class="menu_wrapper-item_menuText-header">
                <span class="menu_wrapper-item_menuText-header_item">МЕНЮ</span>
                <ul class="menu_wrapper-item-main_menu-item-text_secondary">

                    @foreach($information as $inf)
                        <li class="menu_wrapper-item-main_menu-item-text_secondary-text">
                            <a href="/information#{{$inf['category']}}">
                                <span>{{$inf['category']}}</span>
                            </a>
                        </li>
                    @endforeach

                </ul>

                <ul class="menu_wrapper-item-main_menu">
                    <li class="menu_wrapper-item-main_menu-item">
                                          <span class="menu_wrapper-item-main_menu-item-text">
                                            <a href="/catalog">Каталог</a>
                                              <img src="/images/icons/arrow_right.svg" alt="arrow"/>
                                          </span>
                    </li>
                    <li class="menu_wrapper-item-main_menu-item">
                                          <span class="menu_wrapper-item-main_menu-item-text">
                                            <a href="/about">О нас</a>
                                              <img src="/images/icons/arrow_right.svg" alt="arrow"/>
                                          </span>
                    </li>
                    <li class="menu_wrapper-item-main_menu-item">
                                          <span class="menu_wrapper-item-main_menu-item-text">
                                            <a href="/hits">Хит парад принтеров</a>
                                              <img src="/images/icons/arrow_right.svg" alt="arrow"/>
                                          </span>
                    </li>
                    <li class="menu_wrapper-item-main_menu-item">
                                          <span class="menu_wrapper-item-main_menu-item-text">
                                            <a href="/hits">Акции</a>
                                              <img src="/images/icons/arrow_right.svg" alt="arrow"/>
                                          </span>
                    </li>
                    <li class="menu_wrapper-item-main_menu-item">
                                          <span class="menu_wrapper-item-main_menu-item-text">
                                            <a href="/blog">Блог</a>
                                              <img src="/images/icons/arrow_right.svg" alt="arrow"/>
                                          </span>
                    </li>
                    <li
                        class="menu_wrapper-item-main_menu-item"
                    >
                    <span class="menu_wrapper-item-main_menu-item-text">
                                            <span>Информация</span>
                                            <img src="/images/icons/arrow_right.svg" alt="arrow"/>
                                          </span>
                    </li>
                    <li class="menu_wrapper-item-main_menu-item">
                                          <span class="menu_wrapper-item-main_menu-item-text">
                                            <a href="/contacts">Контакты</a>
                                              <img src="/images/icons/arrow_right.svg" alt="arrow"/>
                                          </span>
                    </li>
                </ul>
            </div>
        </div>
        </a>
    </div>

    <div class="menu_wrapper-item">
        <div class="menu_wrapper-item_search">
        <div class="menu_wrapper-item_search_input">
            <form action="{{ route('searchProducts') }}" method="get" style="margin-bottom: 0;" data-searchForm>
                {{ csrf_field() }}

                <input
                        type="search"
                        name="searchText"
                        placeholder="Введите модель принтера или артикул картриджа"
                />
            </form>
        </div>
        <div class="menu_wrapper-item_search_button">
        <img src="/images/menu/zoomin.svg" alt="icon"/>
    </div>
</div>
</div>
<div class="menu_wrapper-item">
    <a href="/tracking" class="menu_wrapper-item_tracking">
    <div class="menu_wrapper-item_tracking_icon" style="background-image: url('/images/menu/tracking.svg')">
    </div>
    <div class="menu_wrapper-item_tracking_text">
        <span>Трекинг заказа</span>
    </div>
    </a>
</div>
<div class="menu_wrapper-item">
    <a href="/login" class="menu_wrapper-item_personal">
    <div class="menu_wrapper-item_personal_icon" style="background-image: url('/images/menu/login.svg')"></div>
    <div class="menu_wrapper-item_personal_text">
        <span>Личный кабинет</span>
        <img
            src="/images/icons/menu_decor.svg"
            class="menu_wrapper-item_menuText-decor"
        />
    </div>
    </a>
</div>
<div class="menu_wrapper-item">
    <div class="menu_wrapper-item_cart">
        <a href="/cart">
        <div class="menu_wrapper-item_cart_icon">
            <img src="/images/menu/cart.svg" alt=""/>
            <span class="menu_wrapper-item_cart_icon-amount" data-cartAmountVal>
                @php
                  if(Session::get('cart')) echo \App\Includes\HelperString::onlyNumber(Session::get('cart')->totalQuantity)
                @endphp
            </span>
        </div>
        <div class="menu_wrapper-item_cart_value">
            <span data-cartPriceVal>
                @php
                    if(Session::get('cart')) { echo \App\Includes\HelperString::onlyNumber(Session::get('cart')->totalPrice); }
                @endphp
            </span>
        </div>

            <div class="menu_wrapper-item_cart_currency @php if(!Session::get('cart')) { echo 'invisible'; } @endphp">
               <img src="/images/menu/rub.svg" alt="rub"/>
            </div>

        </a>
    </div>
</div>
</div>
</div>
