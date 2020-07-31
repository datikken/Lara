<template>
    <div class="payment">
        <div class="payment_wrap">
            <div class="payment_wrap-head">
                <h1>СПОСОБ ОПЛАТЫ</h1>
            </div>

            <div class="payment_wrap-form">
                <div class="payment_wrap-form_group">
                    <label for="payment_type">При получении</label>

                    <div class="payment_wrap-form_group-inner">
                        <SimpleCheckbox />
                        <span>Наличными или банковской картой</span>
                    </div>
                </div>

                <div class="payment_wrap-form_group">
                    <label for="payment_type">Онлайн</label>

                    <div class="payment_wrap-form_group-inner">
                        <SimpleCheckbox />
                        <span>Картами Visa, Mastercard, Maestro</span>
                    </div>
                </div>

                <div class="payment_wrap-form_inner">
                    <div class="payment_wrap-form_group">
                        <div class="payment_wrap-form_group-inner">
                            <label for="card_num" class="cart_num">Номер карты</label>
                            <input type="text" name="card_num" placeholder="Введите номер карты">
                        </div>
                    </div>

                    <div class="payment_wrap-form_group">
                        <div class="payment_wrap-form_group-last row_alignment" style="flex-direction: column;">

                            <div style="display: flex;">
                                <div style="display: flex; flex-direction: column;">
                                    <label for="srok">Срок действия</label>
                                    <div class="row_alignment-inner">
                                        <CardDropdown name="Год" />
                                        <CardDropdown name="Месяц" />
                                    </div>
                                </div>

                                <div style="display: flex; flex-direction: column;">
                                    <label for="cvv">CVV</label>
                                    <input class="payment_wrap-form_group-cvv row_alignment-inner" type="text" placeholder="Введите номер" name="cvv"/>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="payment_wrap-form_group">
                        <div class="payment_wrap-form_group-inner">
                            <label for="card_name" class="cart_num">Имя и фамилия владельца карты</label>
                            <input type="text" name="card_name" placeholder="введите  имя и фамилию владельца карты">
                        </div>
                    </div>

                </div>

                <TextBtn text="подтвердить" className="text_buy-btn animated_btn"/>

            </div>
        </div>
    </div>
</template>

<script>
    import CardDropdown from "./CardDropdown";
    import TextBtn from '../btns/TextBtn'
    import SimpleCheckbox from '../checkboxes/SimpleCheckbox'

    export default {
        name: "Payments",
        components: {
            SimpleCheckbox,
            CardDropdown,
            TextBtn
        },
        methods: {

        }
    }
</script>

<style scoped>

</style>
