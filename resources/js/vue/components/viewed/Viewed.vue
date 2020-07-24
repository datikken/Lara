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

    export default {
        name: "Viewed",
        components: {
            ViewedItem
        },
        computed: {
            products() {
                let products = this.$store.state.products;
                return products;
            }
        }
    }
</script>

<style scoped>

</style>
