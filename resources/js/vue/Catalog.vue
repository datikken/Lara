<template>

    <div class="columns catalog_columns">
        <div class="left_column">
            <Filters/>
            <Viewed/>
        </div>
        <div class="right_column">

            <CatalogSwitch/>

            <NothingFound v-if="this.$store.state.productsLoaded && products.length === 0"/>

            <Loader v-if="!this.$store.state.productsLoaded"/>

            <div class="products_grid">

                <div v-if="products.length > 1">
                    <vue-ads-pagination
                        :total-items="products.length"
                        :max-visible-pages="5"
                        :page="page"
                        :items-per-page="perPage"
                        :loading="loading"
                        @page-change="pageChange"
                    >

                        <template slot-scope="props">
                            <CatalogCard :data="item" v-for="item in products.slice(props.start, props.end)"
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

                <div v-else>
                    <CatalogCard :data="item" v-for="item in products"
                                 :key="item.name"/>
                </div>

                <Modal/>

            </div>
        </div>
    </div>
</template>

<script>
    import '../../../node_modules/@fortawesome/fontawesome-free/css/all.css';
    import '../../../node_modules/vue-ads-pagination/dist/vue-ads-pagination.css';
    import TextBtn from '../vue/components/btns/BuyBtn';
    import CatalogSwitch from '../vue/components/catalog/catalogSwitch';
    import CatalogCard from '../vue/components/catalog/catalogCard'
    import VueAdsPagination, {VueAdsPageButton} from 'vue-ads-pagination';
    import Filters from './components/filters/Filters'
    import NothingFound from './components/errors/NothingFound';
    import Viewed from './components/viewed/Viewed'
    import Loader from './components/loader/Loader'
    import Modal from './components/modal/Modal'

    export default {
        name: "catalog",
        components: {
            CatalogCard,
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
                page: 0,
                loading: false,
                perPage: 16
            }
        },
        methods: {
            pageChange(page) {
                this.page = page;
            },
            loadMore(e) {
                this.perPage = this.perPage + 15;
            }
        },
        computed: {
            products() {
                return this.$store.state.filteredProducts;
            }
        },
        created() {
            this.$store.commit('getAllProducts');
        },
    }
</script>

<style scoped>

</style>
