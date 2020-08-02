<template>
    <form class="payment_wrap-form_inner" autocomplete="off">
        <div class="payment_wrap-form_group">
            <div class="payment_wrap-form_group-inner">
                <label for="num" class="cart_num">Номер карты</label>
                <input type="text" name="num" placeholder="Введите номер карты"  autocomplete="off" />
            </div>
        </div>

        <div class="payment_wrap-form_group">
            <div class="payment_wrap-form_group-last row_alignment" style="flex-direction: column;">

                <div style="display: flex;">
                    <div style="display: flex; flex-direction: column;">
                        <label>Срок действия</label>
                        <div class="row_alignment-inner">
                            <CardDropdown name="Год" />
                            <CardDropdown name="Месяц" />
                        </div>
                    </div>

                    <div style="display: flex; flex-direction: column;">
                        <label for="cvv">CVV</label>
                        <input class="payment_wrap-form_group-cvv row_alignment-inner" type="text" placeholder="Введите номер" name="cvv"  autocomplete="off"/>
                    </div>
                </div>

            </div>
        </div>


        <div class="payment_wrap-form_group">
            <div class="payment_wrap-form_group-inner">
                <label for="card_name" class="cart_num">Имя и фамилия владельца карты</label>
                <input type="text" name="card_name" placeholder="введите  имя и фамилию владельца карты" autocomplete="off">
            </div>
        </div>

        <TextBtn text="подтвердить" className="text_buy-btn animated_btn mauto" @click.native="processCardPayment" />

    </form>
</template>

<script>
    import {mapActions} from 'vuex'
    import CardDropdown from './CardDropdown'
    import TextBtn from '../btns/TextBtn'

    export default {
        name: "CardPayment",
        components: {
            CardDropdown,
            TextBtn
        },
        method: {
            ...mapActions([
                'PAY_WITH_CARD'
            ]),
            processCardPayment() {
                this.PAY_WITH_CARD();
            }
        }
    }
</script>

<style scoped>

</style>
