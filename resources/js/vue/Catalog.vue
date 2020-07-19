<template>

    <div class="columns catalog_columns">
        <div class="left_column">
            <Filters />
        </div>
        <div class="right_column">
            <div class="products_grid">

                <vue-ads-pagination
                    :total-items="products.length"
                    :max-visible-pages="5"
                    :page="page"
                    :items-per-page="16"
                    :loading="loading"
                    @page-change="pageChange"
                >

                    <template slot-scope="props">

                        <CatalogCard :data="item" v-for="item in products.slice(props.start, props.end)" :key="item.name" />

                    </template>

                    <template
                        slot="buttons"
                        slot-scope="props"
                        :class="testPagi"
                    >
                        <vue-ads-page-button
                            v-for="(button, key) in props.buttons"
                            :key="key"
                            v-bind="button"
                            @page-change="page = button.page"
                        />
                    </template>
                </vue-ads-pagination>


            </div>
        </div>
    </div>

</template>

<script>
    import '../../../node_modules/@fortawesome/fontawesome-free/css/all.css';
    import '../../../node_modules/vue-ads-pagination/dist/vue-ads-pagination.css';
    import CatalogCard from '../vue/components/catalog/catalogCard'
    import VueAdsPagination, { VueAdsPageButton } from 'vue-ads-pagination';
    import Filters from './components/filters/Filters'

    export default {
        name: "catalog",
        components: {
            CatalogCard,
            VueAdsPagination,
            VueAdsPageButton,
            Filters
        },
        data() {
            return {
                page: 0,
                loading: false
            }
        },
        methods: {
            getProducts() {
                this.products = this.$store.state.products;
            },
            pageChange (page) {
                this.page = page;
            }
        },
        computed: {
            products() {
                return this.$store.state.filteredProducts;
            }
        },
        created () {
           this.$store.commit('getAllProducts');
        },
    }
</script>

<style scoped>

</style>
