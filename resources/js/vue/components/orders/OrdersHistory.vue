<template>
    <div class="history">
        <div class="history_wrapper">

            <div class="history_wrapper-item">
                <div class="history_wrapper-item_heading">
                    <span class="history_wrapper-item_heading-text">История заказов</span>
                </div>
            </div>

            <div class="history_wrapper-item">
                <div class="history_wrapper-item_row">
                    <div class="history_wrapper-item_row-item history_wrapper-item_row-item-title">
                        <span class="history_wrapper-item_row-item_text">Дата заказа</span>
                    </div>
                    <div class="history_wrapper-item_row-item history_wrapper-item_row-item-title">
                        <span class="history_wrapper-item_row-item_text">Номер заказа</span>
                    </div>
                    <div class="history_wrapper-item_row-item history_wrapper-item_row-item-title">
                        <span class="history_wrapper-item_row-item_text" v-if="user.face === 'fizik'">Физическое лицо</span>
                        <span class="history_wrapper-item_row-item_text" v-if="user.face === 'urik'">Юридическое лицо</span>
                    </div>
                    <div class="history_wrapper-item_row-item history_wrapper-item_row-item-title">
                        <span class="history_wrapper-item_row-item_text">Сумма</span>
                    </div>
                </div>


                <div class="history_wrapper-item_row  order_values" v-for="order in orders.orders_history">
                    <div class="history_wrapper-item_row-item">
                        <span class="history_wrapper-item_row-item_val">
                            {{ order.date }}
                        </span>
                    </div>
                    <div class="history_wrapper-item_row-item">
                        <span class="history_wrapper-item_row-item_val order_id">
                            {{ order.id }}
                        </span>
                    </div>
                    <div class="history_wrapper-item_row-item">
                        <span class="history_wrapper-item_row-item_val">
                            {{ user.email }}
                        </span>
                    </div>
                    <div class="history_wrapper-item_row-item">
                        <span class="history_wrapper-item_row-item_val">
                            {{ order.price }}
                        </span>
                    </div>
                </div>


                <div class="history_wrapper-item_row">
                    <div class="history_wrapper-item_row-info history_wrapper-item_row-item-header">
                        <span class="history_wrapper-item_row-item_text">№ заказа</span>
                    </div>
                    <div class="history_wrapper-item_row-info history_wrapper-item_row-item-header">
                        <span class="history_wrapper-item_row-item_text">Наименование</span>
                    </div>

                    <div class="history_wrapper-item_row-info history_wrapper-item_row-item-header">
                        <span class="history_wrapper-item_row-item_text">Количество</span>
                    </div>
                    <div class="history_wrapper-item_row-info history_wrapper-item_row-item-header">
                        <span class="history_wrapper-item_row-item_text">Сумма</span>
                    </div>
                </div>


                <LastOrder :order="orders.last_order" v-if="orders.last_order" />


                <div class="history_wrapper-item_row">

                    <TextBtn text="Положить в корзину" className="history_wrapper-item_row-total-cta text_buy-btn animated_btn" @click.native="repeatOrder" />

                    <div class="history_wrapper-item_row-total">
                        <div class="history_wrapper-item_row-total_content">
                            <span class="history_wrapper-item_row-total_content-title">Итого:</span>
                            <span class="history_wrapper-item_row-total_content-value" v-for="order in orders.last_order_total">
                                {{ order.quantity }} ед.
                            </span>
                        </div>
                    </div>
                    <div class="history_wrapper-item_row-total">
                        <div class="history_wrapper-item_row-total_content">
                            <span class="history_wrapper-item_row-total_content-title">Итого:</span>
                            <span class="history_wrapper-item_row-total_content-value order_totalPrice" v-for="order in orders.last_order_total">
                                {{ order.price }} р.
                            </span>
                        </div>

                        <div class="history_wrapper-item_row-total_btns">
                            <div class="history_wrapper-item_row-total_btns-btn"><span>Закрыть</span></div>
                            <div class="history_wrapper-item_row-total_btns-btn"><span>Повторить заказ</span></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</template>

<script>
    import LastOrder from './LastOrder'
    import TextBtn from '../btns/TextBtn'
    import {mapActions, mapGetters} from 'vuex'

    export default {
        name: "OrdersHistory",
        components: {
            LastOrder,
            TextBtn
        },
        methods: {
            ...mapActions([
                'GET_ORDERS_INFO',
                'GET_USERS_INFO'
            ]),
            repeatOrder(id) {
                console.warn('order repeat', id);
            }
        },
        computed: {
            ...mapGetters(['user']),
            orders() {
                return this.$store.state.orders
            }
        },
        mounted() {
            this.GET_ORDERS_INFO();
            this.GET_USERS_INFO();
        }
    }
</script>

<style scoped>

</style>
