<template>
    <form class="payment_wrap-form_inner" autocomplete="off">
        <div class="payment_wrap-form_group">
            <div class="payment_wrap-form_group-inner">
                <label for="card_num" class="cart_num">Номер карты</label>

                <masked-input
                    autocomplete="off"
                    class="company_input"
                    name="card_num"
                    v-model="num"
                    mask="1111 1111 1111 1111"
                    placeholder="Введите номер карты"/>

            </div>
        </div>

        <div class="payment_wrap-form_group">
            <div class="payment_wrap-form_group-last row_alignment" style="flex-direction: column;">

                <div style="display: flex;">
                    <div style="display: flex; flex-direction: column;">
                        <label>Срок действия</label>
                        <div class="row_alignment-inner">
                            <CardDropdown name="Год"  dataName="year" :data="years"/>
                            <CardDropdown name="Месяц" dataName="month" :data="months"/>
                        </div>
                    </div>

                    <div style="display: flex; flex-direction: column;">
                        <label for="cvv">CVV</label>
                        <masked-input
                            type="password"
                            class="payment_wrap-form_group-cvv row_alignment-inner"
                            autocomplete="off"
                            name="cvv"
                            v-model="cvv"
                            mask="111"
                            placeholder="CVV"/>
                    </div>
                </div>

            </div>
        </div>


        <div class="payment_wrap-form_group">
            <div class="payment_wrap-form_group-inner">
                <label for="card_name" class="cart_num">Имя и фамилия владельца карты</label>
                <input
                    type="text"
                    name="card_name"
                    placeholder="введите  имя и фамилию владельца карты"
                    onkeyup="this.value = this.value.toUpperCase();"
                    onkeypress="return /[a-z]/i.test(event.key)"
                    autocomplete="off">
            </div>
        </div>

        <TextBtn text="подтвердить" className="text_buy-btn animated_btn mauto" @click.native="processCardPayment"/>

    </form>
</template>

<script>
    import {mapActions} from 'vuex'
    import CardDropdown from './CardDropdown'
    import TextBtn from '../btns/TextBtn'
    import MaskedInput from '../inputs/MaskedInput'

    export default {
        name: "CardPayment",
        components: {
            CardDropdown,
            TextBtn,
            MaskedInput
        },
        data: () => {
            return {
                num: '',
                cvv: '',
                name: '',
                years: ['2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019', '2020', '2021', '2022', '2023', '2024', '2025', '2026', '2027', '2028', '2029', '2030', '2031', '2032', '2033', '2034', '2035', '2036', '2037', '2038', '2039', '2040'],
                months: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12']
            }
        },
        methods: {
            ...mapActions([
                'PAY_WITH_CARD'
            ]),
            processCardPayment() {
                let inputs = this.$el.querySelectorAll('input');
                let yearsMonths = this.$el.querySelectorAll('[data-name]');
                let obj = {};

                inputs.forEach((npt) => {
                    let name = npt.getAttribute('name');
                    let val = npt.value;

                    obj[name] = val;
                });

                yearsMonths.forEach((date) => {
                    let name = date.getAttribute('data-name');
                    let val = date.innerText;

                    obj[name] = val;
                });

                this.PAY_WITH_CARD(obj);
            }
        }
    }
</script>

<style scoped>

</style>
