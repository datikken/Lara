<template>

    <div class="columns catalog_columns">
        <div class="left_column">

        </div>
        <div class="right_column">
            <div class="products_grid">

                <div v-for="item in displayedProducts" :key="item.name">
                    <CatalogCard :data="item" />
                </div>

                <div class="pagination_links">
                    <div class="pagination">
                        <div
                            class="page-item"
                            v-for="(page, index) in pages"
                            :class="{ 'active': index === 0 }"
                            v-on:click="jumpToPage(page)"
                            :data-pageId="page"
                        >
                            <span href="#" class="page-link">{{ page }}</span>
                        </div>
                    </div>
                </div>

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
            jumpToPage(page) {
                this.page = page;
                let pageBtns = this.$el.querySelectorAll('.page-item');
                    pageBtns.forEach((el, i) => {
                        if (el.classList.contains('active')) {
                            el.classList.remove('active');
                        }

                        pageBtns[page - 1].classList.add('active');
                    })

                console.warn(page, this.$el);
            },
            paginateNext() {
                this.page = this.page + 1
            },
            paginatePrev() {
                if(this.page > 0) {
                    this.page = this.page - 1
                }
            },
            getProducts() {
                axios.get('/catalogСartridge')
                    .then(response => {
                        this.products = response.data;
                        // console.warn('axios response', response.data)
                    })
                    .catch(err => {
                        console.log(err);
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
