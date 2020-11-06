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

                <CardPayment v-if="this.payments === true" ref="payWithCard" />

            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions,mapGetters} from 'vuex'
    import TextBtn from '../btns/TextBtn'
    import SimpleCheckbox from '../checkboxes/SimpleCheckbox'
    import CardPayment from './CardPayment'

    export default {
        name: "Payments",
        data: () => ({
            payments: false
        }),
        components: {
            SimpleCheckbox,
            CardPayment,
            TextBtn
        },
        methods: {
            ...mapActions([
                'SET_PAYMENT_PROVIDER',
                'CHANGE_PROGRESS_STEP',
                'CREATE_SIGNATURE_HASH'
            ]),
            setPayment(e) {
                let provider = e.currentTarget.innerText;
                this.SET_PAYMENT_PROVIDER(provider);
            },
            selectMethod(state) {
                if(state.indexOf('Mastercard') >= 0) {
                    this.$refs.cardBox.setChecked();
                    this.CREATE_SIGNATURE_HASH();
                } else {
                    this.$refs.nalBox.setChecked();
                }
            }
        },
        computed: {
            ...mapGetters([
                'paymentProvider'
            ])
        },
        watch: {
            paymentProvider(newVal, oldVal) {
                if(newVal && newVal.indexOf('Mastercard') >= 0) {
                    this.payments = true;
                    this.CREATE_SIGNATURE_HASH();
                } else {
                    this.payments = false;
                }
            }
        },
        mounted() {
            let methodSelected = this.$store.state.paymentProvider;
                methodSelected && this.selectMethod(methodSelected);


            this.CHANGE_PROGRESS_STEP(3);

            if (methodSelected && methodSelected.indexOf('Mastercard') >= 0) {
                this.payments = true;
                this.concretePay();
            }
        }
    }
</script>

<style scoped>

</style>
