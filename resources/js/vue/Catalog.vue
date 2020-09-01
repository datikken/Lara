<template>
<div class="catalog">
    <div class="columns catalog_columns">
        <div class="left_column">
           <Filters />
           <Viewed />
        </div>
        <div class="right_column">

            <CatalogSwitch />

            <NothingFound v-if="this.$store.state.productsLoaded && products.length === 0" />

            <Loader v-if="products.length === 0" />

            <div class="products_grid">
                <div v-if="products.length > 1">
                    <vue-ads-pagination
                        :total-items="products.length"
                        :max-visible-pages="5"
                        :page="page"
                        :items-per-page="this.catalogPerPage"
                        :loading="loading"
                        @page-change="pageChange"
                    >

                        <template slot-scope="props">

                            <CatalogCard
                                        v-if="!gridCatalog"
                                        :data="item"
                                         v-for="item in products.slice(props.start, props.end)"
                                         :key="item.name"/>

                            <CatalogCardList
                                        v-if="gridCatalog"
                                        :data="item"
                                         v-for="item in products.slice(props.start, props.end)"
                                         :key="item.name"/>

                        </template>

                        <template
                            slot="buttons"
                            slot-scope="props"
                            :class="testPagi"
                        >

                        <div class="load_more-btn " @click="loadMore">
                            <TextBtn text="загрузить еще" className="text_buy-btn animated_btn"/>
                        </div>

                        <vue-ads-page-button
                            v-for="(button, key) in props.buttons"
                            :key="key"
                            v-bind="button"
                            @page-change="page = button.page"
                        />
                        </template>
                    </vue-ads-pagination>
                </div>

                <div v-else class="products_wrapper">
                    <CatalogCard :data="item" v-for="item in products"
                                 :key="item.name"/>
                </div>

                <Modal/>

            </div>
        </div>
    </div>

    <OrdersHistory  />

</div>


</template>

<script>
    import {mapActions, mapGetters} from 'vuex';

    import '../../../node_modules/@fortawesome/fontawesome-free/css/all.css';
    import '../../../node_modules/vue-ads-pagination/dist/vue-ads-pagination.css';
    import VueAdsPagination, {VueAdsPageButton} from 'vue-ads-pagination';

    import OrdersHistory from './components/orders/OrdersHistory';
    import TextBtn from '../vue/components/btns/BuyBtn';
    import CatalogSwitch from '../vue/components/catalog/catalogSwitch';
    import CatalogCard from '../vue/components/catalog/catalogCard';
    import Filters from './components/filters/Filters';
    import NothingFound from './components/errors/NothingFound';
    import Viewed from './components/viewed/Viewed';
    import Loader from './components/loader/Loader';
    import Modal from './components/modal/Modal';
    import CatalogCardList from '../vue/components/catalog/catalogCardList'


    export default {
        name: "catalog",
        components: {
            CatalogCard,
            CatalogCardList,
            OrdersHistory,
            VueAdsPagination,
            VueAdsPageButton,
            CatalogSwitch,
            Filters,
            NothingFound,
            Viewed,
            Loader,
            Modal,
            TextBtn
        },
        data() {
            return {
                page: 0
            }
        },
        methods: {
            ...mapActions([
                'GET_ALL_PRODUCTS'
            ]),
            pageChange(page) {
                this.page = page;
            },
            loadMore(e) {
                //Todo load more



            }
        },
        computed: {
            ...mapGetters([
                'orders',
                'gridCatalog',
                'catalogPerPage'
            ]),
            products() {
                this.loading = false;

                return this.$store.state.filteredProducts;
            },
        },
        created() {
            this.GET_ALL_PRODUCTS();
        },
    }
</script>

<style scoped>
    .products_wrapper {
        margin-left: 20px;
    }
</style>
