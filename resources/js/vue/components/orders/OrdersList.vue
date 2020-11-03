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
                        <span class="order_list-wrap_inner-row_item-head">Наименование</span>
                    </div>
                    <div class="order_list-wrap_inner-row_item">
                        <span class="order_list-wrap_inner-row_item-head">Стоимость</span>
                    </div>
                </div>

                <div class="order_list-wrap_inner-row" v-for="order in orders.items">
                    <div class="order_list-wrap_inner-row_item">
                        <span class="order_list-wrap_inner-row_item-text">
                            {{ order.data.photo }}
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

            <TextBtn text="Завершить покупку"
                     className="text_buy-btn magic_btn final_btn"
                     v-if="active"
                     id="final_btn"
                     @click.native="pushToThanks"/>
        </div>
    </div>

</template>

<script>
    import {mapActions, mapGetters} from 'vuex'
    import TextBtn from '../btns/TextBtn'

    export default {
        name: "OrdersList",
        components: {
            TextBtn
        },
        data: () => ({
            active: false,
            magicBtn: false
        }),
        methods: {
            ...mapActions([
                'CHECK_CART_STATE',
                'FINISH_ORDER_PROCESS',
                'CREATE_ORDER',
                'CREATE_MAGIC_BTN'
            ]),
            fixFooter() {
                let footer = document.querySelector('.order_list-wrap_footer');
                footer && footer.classList.add('order_list-wrap_footer_final');
            },
            pushToThanks() {
                let order = new Promise((res, rej) => {
                    this.CREATE_ORDER();

                    res();
                });

                order.then(() => {
                        if (this.paymentProvider.indexOf('Mastercard') >= 0) {
                            if (!this.orderPaid) {
                                return
                            } else {
                                this.FINISH_ORDER_PROCESS();
                            }
                        } else {
                            this.FINISH_ORDER_PROCESS();
                        }
                    }
                )
            }
        },
        created() {
            this.CHECK_CART_STATE();
        },
        computed: {
            ...mapGetters([
                'deliveryType',
                'orderPaid',
                'paymentProvider'
            ]),
            orders() {
                return this.$store.state.cart
            },
            finalStep() {
                if (this.$store.state.paymentProvider) {
                    this.fixFooter();
                    this.CREATE_MAGIC_BTN(this.magicBtn);
                }

                return this.$store.state.paymentProvider
            }
        }
    }
</script>

<style scoped>
    .final_btn {
        margin-bottom: 10px !important;
        margin: 0 auto !important;
    }
</style>
