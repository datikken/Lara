<template>
    <div :class="`${className}`" @click="addProductToCart">
        <div class="desktop-hide">
            <div class="product_wrapper-item_price-item">Купить</div>
        </div>
        <img src='/images/menu/empty_cart.svg' alt="cart" />
        <span v-if="text" class="product_wrapper-item_price-text">{{ text }}</span>
    </div>
</template>

<script>
    import { mapActions } from 'vuex'

    export default {
        name: "BuyBtn",
        props: ['id','text','className'],
        methods: {
            ...mapActions([
                'ADD_PRODUCT_TO_CART'
            ]),
            addProductToCart: function() {
                let amount = parseInt(document.querySelector('[data-modal-val]').innerText);
                let id = this.$props.id;

                this.$store.dispatch('ADD_PRODUCT_TO_CART', {id, amount});
            },
        }
    }
</script>

<style scoped>
    .product_wrapper-item_price-text {
        margin-right: 10px;
    }

</style>
