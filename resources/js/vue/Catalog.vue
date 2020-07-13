<template>

    <div class="columns catalog_columns">
        <div class="left_column">

        </div>
        <div class="right_column">
            <div class="products_grid">

                <div v-for="item in displayedProducts" :key="item.name">
                    <CatalogCard :data="item" />
                </div>


                <button v-on:click="paginateNext">Next</button>
                <button v-on:click="paginatePrev">Prev</button>

            </div>


        </div>
    </div>

</template>

<script>
    import CatalogCard from '../vue/components/catalog/catalogCard'
    import axios from 'axios'

    export default {
        name: "catalog",
        components: {
            CatalogCard
        },
        data() {
            return {
                products: [],
                page: 1,
                perPage: 15,
                pages: []
            }
        },
        methods: {
            paginateNext() {
                this.page = this.page + 1
            },
            paginatePrev() {
                if(this.page > 1) {
                    this.page = this.page - 1
                }
            },
            getProducts() {
                axios.get('/catalogСartridge')
                    .then(response => {
                        this.products = response.data;
                        console.warn('axios response', response.data)
                    })
                    .catch(response => {
                        console.log(response);
                    });
            },
            setPages () {
                let numberOfPages = Math.ceil(this.products.length / this.perPage);
                for (let index = 1; index <= numberOfPages; index++) {
                    this.pages.push(index);
                }
            },
            paginate (posts) {
                let page = this.page;
                let perPage = this.perPage;
                let from = (page * perPage) - perPage;
                let to = (page * perPage);
                return  posts.slice(from, to);
            }
        },
        created () {
            this.getProducts();
        },
        watch: {
            products () {
                this.setPages();
            }
        },
        computed: {
            displayedProducts () {
                return this.paginate(this.products);
            }
        },
    }
</script>

<style scoped>

</style>
