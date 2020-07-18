<template>
    <div class="product_wrapper-item_btn ajaxGETproduct" :data-url="`/products/addToCartAjaxGet/${id}`" v-on:click="addProductToCart">
        <div class="desktop-hide">
            <div class="product_wrapper-item_price-item">Купить</div>
        </div>
        <img src='/images/icons/cart.svg' alt="cart"/>
    </div>
</template>

<script>
    export default {
        name: "BuyBtn",
        props: ['id'],
        methods: {
            addProductToCart: function() {
                let id = this.$props.id;

                this.$store.commit('addProductToCart', id );
            }
        }
    }
</script>

<style scoped>

</style>
