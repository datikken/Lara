


<template>
    <a href="/" class="menu_wrapper-item_menuText-link">
        <div class="menu_wrapper-item_menuText">
            <img
                src="/images/icons/menu_decor.svg"
                class="menu_wrapper-item_menuText-decor"
                alt="decor"
            />

            <div class="menu_wrapper-item_menuText-header">
                <span class="menu_wrapper-item_menuText-header_item">МЕНЮ</span>

                <ul @mouseenter="showAllDropDowns"
                    @mouseleave="hideAllDropDowns"
                    class="menu_wrapper-item-main_menu-item-text_secondary secondaryBottom as-none" data-informationTriggerMenu>
                    <li class="menu_wrapper-item-main_menu-item-text_secondary-text">
                        <a href="/information">
                            <span>test</span>
                        </a>
                    </li>
                    <li class="menu_wrapper-item-main_menu-item-text_secondary-text">
                        <a href="/information">
                            <span>test</span>
                        </a>
                    </li>
                    <li class="menu_wrapper-item-main_menu-item-text_secondary-text">
                        <a href="/information">
                            <span>test</span>
                        </a>
                    </li>
                </ul>

                <!--<ul class="menu_wrapper-item-main_menu-item-text_secondary secondaryTop">-->
                    <!--<li class="menu_wrapper-item-main_menu-item-text_secondary-text">-->
                        <!--<a href="/catalog">-->
                            <!--<span>Картриджи</span>-->
                        <!--</a>-->
                    <!--</li>-->
                    <!--<li class="menu_wrapper-item-main_menu-item-text_secondary-text">-->
                        <!--<a href="/catalogPapers">-->
                            <!--<span>Бумага</span>-->
                        <!--</a>-->
                    <!--</li>-->
                <!--</ul>-->

                <ul class="menu_wrapper-item-main_menu as-none" data-desktopMenuBlock @mouseleave="hideDropDown">
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
                    <li @mouseenter="showDropDown"
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
                            <img src="/images/icons/arrow_right.svg" alt="arrow"/>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </a>
</template>

<script>
    export default {
        name: "MobileMainMenuDropDown",
        methods: {
            hideAllDropDowns() {
                let informationMenu = this.$el.querySelector('[data-informationTriggerMenu]');
                let desMenu = this.$el.querySelector('[data-desktopMenuBlock]');

                informationMenu.classList.add('as-none');
                desMenu.classList.add('as-none');
            },
            showAllDropDowns() {
                let informationMenu = this.$el.querySelector('[data-informationTriggerMenu]');
                let desMenu = this.$el.querySelector('[data-desktopMenuBlock]');

                    informationMenu.classList.remove('as-none');
                    desMenu.classList.remove('as-none');
            },
            hideDropDown() {
                let menu = this.$el.querySelector('[data-informationTriggerMenu]');
                let dropdown = this.$el.querySelector('[data-desktopMenuBlock]');

                    dropdown.classList.add('as-none');
                    menu.classList.add('as-none');
            },
            showDropDown() {
                let informationMenu = this.$el.querySelector('[data-informationTriggerMenu]');
                    informationMenu.classList.remove('as-none');
            }
        }
    }
</script>

<style scoped>

</style>
