<template>
    <a href="/" class="menu_wrapper-item_menuText-link">
        <div class="menu_wrapper-item_menuText"
             @mouseleave="hideAllDropDowns"
             @mouseenter="showDesktopMenuDropDown">
            <img
                src="/images/icons/menu_decor.svg"
                class="menu_wrapper-item_menuText-decor"
                alt="decor"
            />

            <div class="menu_wrapper-item_menuText-header">
                <span class="menu_wrapper-item_menuText-header_item">МЕНЮ</span>

                <ul @mouseenter="showAllDropDowns"
                    class="menu_wrapper-item-main_menu-item-text_secondary secondaryBottom"
                    data-informationMenuDropdown>

                    <li class="menu_wrapper-item-main_menu-item-text_secondary-text" v-for="post in informationPosts"
                        :key="post.id">
                        <a href="/information">
                            <span>{{ post.category }}</span>
                        </a>
                    </li>
                </ul>

                <ul class="menu_wrapper-item-main_menu" data-desktopMenuBlock @mouseenter="showDesktopMenuDropDown">
                    <li class="menu_wrapper-item-main_menu-item">
                        <span class="menu_wrapper-item-main_menu-item-text">
                            <a href="/catalog">Каталог</a>
                            <!--<img src="/images/icons/arrow_right.svg" alt="arrow"/>-->
                        </span>
                    </li>
                    <li class="menu_wrapper-item-main_menu-item">
                        <span class="menu_wrapper-item-main_menu-item-text">
                            <a href="/about">О нас</a>
                            <!--<img src="/images/icons/arrow_right.svg" alt="arrow"/>-->
                        </span>
                    </li>
                    <li class="menu_wrapper-item-main_menu-item">
                        <span class="menu_wrapper-item-main_menu-item-text">
                            <a href="/hits">Хит парад принтеров</a>
                            <!--<img src="/images/icons/arrow_right.svg" alt="arrow"/>-->
                        </span>
                    </li>
                    <li class="menu_wrapper-item-main_menu-item">
                        <span class="menu_wrapper-item-main_menu-item-text">
                            <a href="/hits">Акции</a>
                            <!--<img src="/images/icons/arrow_right.svg" alt="arrow"/>-->
                        </span>
                    </li>
                    <li class="menu_wrapper-item-main_menu-item">
                        <span class="menu_wrapper-item-main_menu-item-text">
                            <a href="/blog">Блог</a>
                            <!--<img src="/images/icons/arrow_right.svg" alt="arrow"/>-->
                        </span>
                    </li>
                    <li
                        @mouseleave="hideInformationDropDown"
                        @mouseenter="showInformationDropDown"
                        class="menu_wrapper-item-main_menu-item"
                    >
                        <span class="menu_wrapper-item-main_menu-item-text">
                            <span class="menu_wrapper-item-main_menu-item-text_inner">Информация</span>
                            <img src="/images/icons/arrow_right.svg" alt="arrow"/>
                        </span>
                    </li>
                    <li class="menu_wrapper-item-main_menu-item">
                        <span class="menu_wrapper-item-main_menu-item-text">
                            <a href="/contacts">Контакты</a>
                            <!--<img src="/images/icons/arrow_right.svg" alt="arrow"/>-->
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </a>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';

    export default {
        name: "DesktopMainMenuDropDown",
        mounted() {
            this.GET_ALL_INFORMATION_POSTS();
        },
        computed: {
            ...mapGetters([
                'informationPosts'
            ])
        },
        methods: {
            ...mapActions([
                'GET_ALL_INFORMATION_POSTS'
            ]),
            hideAllDropDowns() {
                let informationMenu = this.$el.querySelector('[data-informationMenuDropdown]');
                let desMenu = this.$el.querySelector('[data-desktopMenuBlock]');

                informationMenu.classList.remove('showInformationMenuDropdown');
                desMenu.classList.remove('showDesktopMenuDropdown');
            },
            hideInformationDropDown() {
                let menu = this.$el.querySelector('[data-informationMenuDropdown]');
                    menu.classList.remove('showInformationMenuDropdown');
            },
            showAllDropDowns() {
                let informationMenu = this.$el.querySelector('[data-informationMenuDropdown]');
                let desMenu = this.$el.querySelector('[data-desktopMenuBlock]');

                desMenu.classList.add('showDesktopMenuDropdown');
                informationMenu.classList.add('showInformationMenuDropdown');
            },
            showInformationDropDown() {
                let informationMenu = this.$el.querySelector('[data-informationMenuDropdown]');
                informationMenu.classList.add('showInformationMenuDropdown');
            },
            showDesktopMenuDropDown() {
                let dropdown = this.$el.querySelector('[data-desktopMenuBlock]');
                dropdown.classList.add('showDesktopMenuDropdown');
            }
        }
    }
</script>

<style scoped>
    [data-desktopMenuBlock] {
        height: 0;
        transition: all .2s;
    }

    .showDesktopMenuDropdown {
        height: 280px;
    }

    [data-informationMenuDropdown] {
        height: 0;
        overflow: hidden;
    }

    .showInformationMenuDropdown {
        right: -14.2rem;
        height: unset;
    }
</style>
