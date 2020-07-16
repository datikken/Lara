<template>

    <div class="columns catalog_columns">
        <div class="left_column">

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
                    @range-change="rangeChange"
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
    import CatalogCard from '../vue/components/catalog/catalogCard'
    import axios from 'axios'

    import '../../../node_modules/@fortawesome/fontawesome-free/css/all.css';
    import '../../../node_modules/vue-ads-pagination/dist/vue-ads-pagination.css';
    import VueAdsPagination, { VueAdsPageButton } from 'vue-ads-pagination';


    export default {
        name: "catalog",
        components: {
            CatalogCard,
            VueAdsPagination,
            VueAdsPageButton,
        },
        data() {
            return {
                products: [],
                page: 1,
                loading: false
            }
        },
        methods: {
            getProducts() {
                axios.get('/catalogСartridge')
                    .then(response => {
                        function modifyObj(target) {
                            let result = {};

                            target.map((obj) => {
                                Object.keys(obj).forEach(function(key) {
                                    let str = obj[key];
                                    result[key] = str.trim();
                                });
                            })

                            return result
                        }

                        response.data.forEach((el) => {
                            let params = JSON.parse(el.params);
                            let newParams = modifyObj(params);

                            let cape = JSON.parse(el.cape);
                            let newCape = modifyObj(cape);

                            el.cape = newCape;
                            el.params = newParams;
                        });

                        this.products = response.data;
                    })

                    .catch(err => {
                        console.log(err);
                    });
            },
            pageChange (page) {
                this.page = page;
                console.log(page);
            },
            rangeChange (start, end) {
                console.log(start, end);
            },
        },
        created () {
            this.getProducts();
        },
    }
</script>

<style scoped>

</style>
