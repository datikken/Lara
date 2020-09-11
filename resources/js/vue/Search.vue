<template>
    <div class="menu">
        <div class="menu_wrapper" id="app">

            <div class="menu_wrapper-item" @mouseenter="DesktopDropdownTrigger" @mouseleave="DesktopDropdownHide">

                <div class="menu_wrapper-item_hamburger" @click="MobileDropdownTrigger">
                    <img src="/images/menu/Mhamburger.svg" alt="hamburger" class="hamburger"/>
                    <a class="menu_wrapper-item_hamburger-link" href="/">
                        <img src='/images/header/MLOGO.png' alt="logo" class="menu_wrapper-item_hamburger-logo"/>
                    </a>
                </div>

                <DesktopMainMenuDropDown />

                <div class="desktop-hide">
                    <MobileMainMenuDropDown />
                </div>

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
                    <div class="menu_wrapper-item_tracking_icon"
                         style="background-image: url('/images/menu/tracking.svg')">
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
                            <span class="menu_wrapper-item_cart_icon-amount" data-cartAmountVal>{{ this.cart.totalQuantity }}</span>
                        </div>
                        <div class="menu_wrapper-item_cart_value">
                            <span data-cartPriceVal>{{ this.cart.totalPrice }}</span>
                        </div>

                        <div class="menu_wrapper-item_cart_currency">
                            <img src="/images/menu/rub.svg" alt="rub" v-if="this.cart.totalPrice"/>
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
    import DesktopMainMenuDropDown from './components/menu/DesktopMainMenuDropDown';
    import {mapActions} from 'vuex';

    export default {
        name: 'app',
        data: function () {
            return {
                openedSearch: false,
                openedMenu: false
            }
        },
        components: {
            Input,
            SearchList,
            SearchListItem,
            MobileMainMenuDropDown,
            DesktopMainMenuDropDown
        },
        computed: {
            cart() {
                return this.$store.state.cart
            }
        },
        mounted() {
            this.CHECK_CART_STATE();
        },
        methods: {
            ...mapActions([
                'CHECK_CART_STATE'
            ]),
            DesktopDropdownHide() {
                console.warn('damn');
            },
            DesktopDropdownTrigger() {
                let menu = document.querySelector('[data-desktopMenuBlock]');
                    menu.classList.remove('as-none');
            },
            MobileDropdownTrigger() {
                let body = document.querySelector('body');

                if (!this.openedMenu) {
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
            },
            searchWidthController() {
                if (window.screen.width < 1000) {
                    let search = document.querySelector('[data-searchTrigger]');

                    if (!this.openedSearch) {
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
