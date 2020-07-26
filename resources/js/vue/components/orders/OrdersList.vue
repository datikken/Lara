<template>

    <div class="order_list">
        <div class="order_list-wrap">
            <div class="order_list-wrap_item">
                <div class="order_list-wrap_item-head">
                    <h1>Ваш заказ</h1>
                </div>
            </div>

            <div class="order_list-wrap_inner">
                <div class="order_list-wrap_inner-row">
                    <div class="order_list-wrap_inner-row_item">
                        <span class="order_list-wrap_inner-row_item-head">Наимениование</span>
                    </div>
                    <div class="order_list-wrap_inner-row_item">
                        <span class="order_list-wrap_inner-row_item-head">Стоимость</span>
                    </div>
                </div>

                <div class="order_list-wrap_inner-row" v-for="order in orders.items">
                    <div class="order_list-wrap_inner-row_item">
                        <span class="order_list-wrap_inner-row_item-text">
                            {{ order.data.params.art }}
                        </span>
                    </div>

                    <div class="order_list-wrap_inner-row_item">
                        <span class="order_list-wrap_inner-row_item-text">
                            {{ order.data.price }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="order_list-wrap_inner-row" v-if="this.deliveryType === 'deliveryMkad' ">
                <div class="order_list-wrap_inner-row_item">
                    <span class="order_list-wrap_inner-row_item-text">Доставка</span>
                </div>
                <div class="order_list-wrap_inner-row_item">
                    <span class="order_list-wrap_inner-row_item-text">
                       <b>500 руб.</b>
                    </span>
                </div>
            </div>

            <div class="order_list-wrap_footer">
                <div class="order_list-wrap_footer-row">
                    <div class="order_list-wrap_footer-row_item">
                        <span>Сумма</span>
                    </div>
                    <div class="order_list-wrap_footer-row_item">
                        <span id="totalQuantity">
                          {{ orders.totalPrice }} руб.
                        </span>
                    </div>
                </div>
            </div>

            <!--<button type="submit" class="proceedPayment-btn">-->

            <!--</button>-->

        </div>
    </div>

</template>

<script>
    import {mapActions,mapGetters} from 'vuex'

    export default {
        name: "OrdersList",
        methods: {
            ...mapActions([
                'CHECK_CART_STATE',
            ]),
        },
        created() {
            this.CHECK_CART_STATE();
        },
        computed: {
            ...mapGetters([
                'deliveryType'
            ]),
            orders() {
                return this.$store.state.cart
            }
        }
    }
</script>

<style scoped>

</style>
