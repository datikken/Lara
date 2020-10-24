<template>
    <div class="history" v-if="this.$store.state.orders">
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


                <div class="history_wrapper-item_row  order_values"
                     :class="{'last_order': (index === 1)}"
                     v-for="(order,index) in orders.orders_history"
                     @click="viewDetails(order.id)"
                     :data-OrderId="order.id"
                >
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
    import {mapActions, mapGetters, mapState} from 'vuex'

    export default {
        name: "OrdersHistory",
        components: {
            LastOrder,
            TextBtn
        },
        data: () => ({
            lastOrderInfo: ''
        }),
        methods: {
            ...mapActions([
                'GET_ORDERS_INFO',
                'GET_USERS_INFO',
                'GET_SINGLE_ORDER_INFO'
            ]),
            repeatOrder(id) {
                console.warn('order repeat', id);




            },
            viewDetails(id) {
                this.GET_SINGLE_ORDER_INFO(id);

                let rows = this.$el.querySelectorAll('[data-OrderId]')
                    rows.forEach((row) => {
                        let RowId = parseInt(row.getAttribute('data-OrderId'));
                        row.classList.remove('last_order')
                        if(RowId === id) {
                            row.classList.add('last_order');
                        }
                    })
            }
        },
        computed: {
            ...mapGetters(['user','orders']),
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
