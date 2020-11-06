<template>
    <div class="payment">
        <div class="payment_wrap">
            <div class="payment_wrap-head">
                <h1 data-payment-head>СПОСОБ ОПЛАТЫ</h1>
                <span class="error-message as-none" data-payment-error>Произведите оплату картой или измените способ оплаты.</span>
            </div>

            <div class="payment_wrap-form">
                <div class="payment_wrap-form_group" @click="setPayment" data-checkNal>
                    <label for="payment_type-nal">При получении</label>

                    <div class="payment_wrap-form_group-inner">
                        <SimpleCheckbox ref="nalBox" />
                        <span>Наличными или банковской картой</span>
                    </div>
                </div>

                <div class="payment_wrap-form_group" @click="setPayment" data-checkCard>
                    <label for="payment_type-cart">Онлайн</label>

                    <div class="payment_wrap-form_group-inner">
                        <SimpleCheckbox ref="cardBox" />
                        <span>Картами Visa, Mastercard, Maestro</span>
                    </div>
                </div>

                <CardPayment :if="paymentsProvider === true" ref="payWithCard" />

            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions} from 'vuex'
    import TextBtn from '../btns/TextBtn'
    import SimpleCheckbox from '../checkboxes/SimpleCheckbox'
    import CardPayment from './CardPayment'

    export default {
        name: "Payments",
        data: () => ({
            paymentsProvider: false
        }),
        components: {
            SimpleCheckbox,
            CardPayment,
            TextBtn
        },
        methods: {
            ...mapActions([
                'SET_PAYMENT_PROVIDER',
                'CHANGE_PROGRESS_STEP'
            ]),
            setPayment(e) {
                let provider = e.currentTarget.innerText;
                this.SET_PAYMENT_PROVIDER(provider);
            },
            selectMethod(state) {
                if(state.indexOf('картой') >= 0) {
                    this.$refs.cardBox.setChecked();
                } else {
                    this.$refs.nalBox.setChecked();
                }
            }
        },
        computed: {
            card() {
                return this.$store.state.cardPayment
            }
        },
        watch: {
            card(newVal, oldVal) {
                this.paymentsProvider = newVal;
            }
        },
        mounted() {
            let methodSelected = this.$store.state.paymentProvider;

            this.CHANGE_PROGRESS_STEP(3);

            if (methodSelected) {
                this.paymentsProvider = true;
                this.selectMethod(methodSelected)
                this.$refs.payWithCard.processCardPayment();
            }
        }
    }
</script>

<style scoped>

</style>
