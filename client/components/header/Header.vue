<template>
    <div class="header">
        <div class="header_wrapper">
            <div class="header_wrapper-item">
                <a href="/">
                    <div class="header_wrapper-item_logo">
                        <img class="header_wrapper-item_logo-item" src="/images/header/header_logo.png" alt="Logo"/>
                    </div>
                </a>
            </div>
            <div class="header_wrapper-item">
                <ul class="header_wrapper-item_menu">
                    <li class="header_wrapper-item_menu-item">
                        <a href="/catalog" class="header_wrapper-item_menu-item_link">Каталог</a>
                    </li>
                    <li class="header_wrapper-item_menu-item">
                        <a href="/information" class="header_wrapper-item_menu-item_link">Информация</a>
                        <ul class="header_wrapper-item_menu-item-secondary">
                            <a :data="cat" v-for="cat in categories" class="header_wrapper-item_menu-item-secondary_item" href="/information">
                                <li>{{ cat.category }}</li>
                            </a>
                        </ul>
                    </li>
                    <li class="header_wrapper-item_menu-item">
                        <a href="/hits" class="header_wrapper-item_menu-item_link">Хит - парад принтеров</a>
                    </li>
                    <li class="header_wrapper-item_menu-item">
                        <a href="/sales" class="header_wrapper-item_menu-item_link">Акции</a>
                    </li>
                    <li class="header_wrapper-item_menu-item">
                        <a href="/blog" class="header_wrapper-item_menu-item_link">Блог</a>
                    </li>
                    <li class="header_wrapper-item_menu-item">
                        <a href="/about" class="header_wrapper-item_menu-item_link">О нас</a>
                    </li>
                    <li class="header_wrapper-item_menu-item">
                        <a href="/contacts" class="header_wrapper-item_menu-item_link">Контакты</a>
                    </li>
                </ul>
            </div>
            <div class="header_wrapper-item">
                <div class="header_wrapper-item_contacts">
                    <img class="header_wrapper-item_contacts-icon" src='/images/header/header_tel.svg' alt="Tel"/>
                    <a href="tel:88005556633" class="header_wrapper-item_contacts-tel">8 800 555 66 33</a>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import {mapActions,mapGetters} from 'vuex';

    export default {
        name: "Header",
        data: () => ({
            categories: [{id: 'fuck'},{id: 'full'}],
        }),
        methods: {
            ...mapActions(['GET_INFORMATION_PAGE_POSTS'])
        },
        computed: {
            ...mapGetters(['informationPosts'])
        },
        watch: {
            informationPosts(newValue, oldValue) {
                if(newValue) {
                    this.categories = newValue;
                }
            }
        },
        created() {
            this.GET_INFORMATION_PAGE_POSTS();
        }
    }
</script>

<style scoped>

</style>
