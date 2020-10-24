<template>
    <div class="viewed">
        <div class="viewed-item_heading">
            <span class="viewed_wrapper-item_heading-text">Просмотренные товары</span>
        </div>

        <div class="viewed_wrapper">
           <ViewedItem :data="product" v-for="product in products.slice(0, 10)" :key="product.name" />
        </div>
    </div>

</template>

<script>
    import ViewedItem from './ViewedItem';
    import {mapActions} from 'vuex';

    export default {
        name: "Viewed",
        components: {
            ViewedItem
        },
        created() {
            this.GET_VIEWED_PRODUCTS();
        },
        methods: {
            ...mapActions([
                'GET_VIEWED_PRODUCTS'
            ]),
        },
        computed: {
            products() {
                return this.$store.state.viewedProducts;
            }
        }
    }
</script>

<style scoped>

</style>
