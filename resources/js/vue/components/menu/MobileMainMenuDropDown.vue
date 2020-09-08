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

                <ul class="menu_wrapper-item-main_menu-item-text_secondary secondaryBottom">
                    <!--@foreach($information as $inf)-->
                    <!--<li class="menu_wrapper-item-main_menu-item-text_secondary-text">-->
                    <!--<a href="/information#{{$inf['category']}}">-->
                    <!--<span>{{$inf['category']}}</span>-->
                    <!--</a>-->
                    <!--</li>-->
                    <!--@endforeach-->
                </ul>

                <ul class="menu_wrapper-item-main_menu-item-text_secondary secondaryTop">
                    <li class="menu_wrapper-item-main_menu-item-text_secondary-text">
                        <a href="/catalog">
                            <span>Картриджи</span>
                        </a>
                    </li>
                    <li class="menu_wrapper-item-main_menu-item-text_secondary-text">
                        <a href="/catalogPapers">
                            <span>Бумага</span>
                        </a>
                    </li>
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
</template>

<script>
    export default {
        name: "MobileMainMenuDropDown",
        methods: {
        }
    }
</script>

<style scoped>

</style>
