<template>
    <div class="menu">
        <div class="menu_wrapper" id="app">

            <div class="menu_wrapper-item">

                <div class="menu_wrapper-item_hamburger" @click="MobileDropdownTrigger">
                    <img src="/images/menu/Mhamburger.svg" alt="hamburger" class="hamburger"/>
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
                                <img src="/images/icons/arrow_right.svg" alt="right"/>
                            </li>

                            <li class="menu_Wrapper-item_secondary-item_list-item">
                                <a href="/about">
                        <span class="menu_Wrapper-item_secondary-item_list-item-text">
                                        О нас
                                      </span>
                                </a>
                                <img src="/images/icons/arrow_right.svg" alt="right"/>
                            </li>
                            <li class="menu_Wrapper-item_secondary-item_list-item">
                                <a href="/blog">
                        <span class="menu_Wrapper-item_secondary-item_list-item-text">
                                        Блог
                                      </span>
                                </a>
                                <img src="/images/icons/arrow_right.svg" alt="right"/>
                            </li>
                            <li class="menu_Wrapper-item_secondary-item_list-item">
                                <a href="/contacts">
                        <span class="menu_Wrapper-item_secondary-item_list-item-text">
                                          Контакты
                                        </span>
                                </a>
                                <img src="/images/icons/arrow_right.svg" alt="right"/>
                            </li>
                            <li class="menu_Wrapper-item_secondary-item_list-item">
                                <a href="/information">
                        <span class="menu_Wrapper-item_secondary-item_list-item-text">
                                          Информация
                                        </span>
                                </a>
                                <img src="/images/icons/arrow_right.svg" alt="right"/>
                            </li>
                            <li class="menu_Wrapper-item_secondary-item_list-item">
                                <a href="/hits">
                        <span class="menu_Wrapper-item_secondary-item_list-item-text">
                                            Хит - парад принтеров
                                         </span>
                                </a>
                                <img src="/images/icons/arrow_right.svg" alt="right"/>
                            </li>
                            <li class="menu_Wrapper-item_secondary-item_list-item vip-item">
                                <img src="/images/menu/tracking.svg" alt="tracking"/>
                                <a href="/tracking">
                        <span class="menu_Wrapper-item_secondary-item_list-item-text">
                                        Трекинг заказа
                                      </span>
                                </a>
                                <img src="/images/icons/arrow_right.svg" alt="right" class="arrow_right"/>
                            </li>
                            <li class="menu_Wrapper-item_secondary-item_list-item vip-item">
                                <img src="/images/menu/login.svg" alt="login"/>
                                <a href="/login">
                        <span class="menu_Wrapper-item_secondary-item_list-item-text">
                                        Личный кабинет
                                      </span>
                                </a>
                                <img src="/images/icons/arrow_right.svg" alt="right" class="arrow_right"/>
                            </li>
                            <li class="menu_Wrapper-item_secondary-item_list-item vip-item">
                                <img src="/images/menu/cart.svg" alt="cart"/>
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
                                <img src="/images/header/Mail.svg" alt="mailer"/>
                                <span class="menu_Wrapper-item_secondary-item_list-item-text">
                                    kakayatopochta@gmail.com
                                  </span>
                            </li>
                        </ul>
                    </div>
                </div>

                <MobileMainMenuDropDown />

            </div>

            <div class="menu_wrapper-item">
                <div class="menu_wrapper-item_search" data-searchTrigger>
                    <div class="menu_wrapper-item_search_input">
                        <Input/>
                    </div>
                    <div class="menu_wrapper-item_search_button" @click="searchWidthController">
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
                    <div class="menu_wrapper-item_personal_icon"
                         style="background-image: url('/images/menu/login.svg')"></div>
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
                            <span class="menu_wrapper-item_cart_icon-amount" data-cartAmountVal></span>
                        </div>
                        <div class="menu_wrapper-item_cart_value">
                            <span data-cartPriceVal>0</span>
                        </div>

                        <div class="menu_wrapper-item_cart_currency">
                            <img src="/images/menu/rub.svg" alt="rub"/>
                        </div>

                    </a>
                </div>
            </div>
        </div>

        <SearchList/>

    </div>
</template>

<script>
    import Input from './components/search/Input';
    import SearchList from './components/search/SearchList';
    import SearchListItem from './components/search/SearchListItem';
    import MobileMainMenuDropDown from './components/menu/MobileMainMenuDropDown';

    export default {
        name: 'app',
        data: function() {
            return {
                openedSearch: false,
                openedMenu: false
            }
        },
        components: {
            Input,
            SearchList,
            SearchListItem,
            MobileMainMenuDropDown
        },
        methods: {
            MobileDropdownTrigger() {
                let body = document.querySelector('body');

                if(!this.openedMenu) {
                    this.openedMenu = true;
                    body.classList.add('overflow')
                    document.querySelector('.menu_wrapper-item_secondary').classList.add('as-visible');
                    document.querySelector('.menu_wrapper-item_secondary').classList.add('mobile_menu');
                } else {
                    this.openedMenu = false;
                    body.classList.remove('overflow')
                    document.querySelector('.menu_wrapper-item_secondary').classList.remove('as-visible');
                    document.querySelector('.menu_wrapper-item_secondary').classList.remove('mobile_menu');
                }

                console.warn('MobileDropdownTrigger', state);
            },
            searchWidthController() {
                if(window.screen.width < 1000) {
                    let search = document.querySelector('[data-searchTrigger]');

                    if(!this.openedSearch) {
                        search.classList.add('search_width');
                        this.openedSearch = true;
                    } else {
                        search.classList.remove('search_width');
                        this.openedSearch = false;
                    }
                }
            }
        }
    }
</script>
