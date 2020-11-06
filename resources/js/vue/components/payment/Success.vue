<template>
    <div class="cart_success">
        <div class="cart_success_wrap">
            <div class="cart_success_wrap_item">
                <div class="cart_success_wrap_item-heading">
                    <h1>Поздравляем</h1>
                </div>
            </div>

            <div class="cart_success_wrap_item">
                <div class="cart_success_wrap_item-icon" style="background-image: url('/images/cart/cart_success.svg')">

                </div>
            </div>

            <div class="cart_success_wrap_item">
                <div class="cart_success_wrap_item-paragraph">
                    <p>
                        Покупка успешно совершена. <br/>На вашу почту отправлен чек и номер заказа
                        <br/>По вашему номеру заказа вы можете отследить ваш заказ в разделе “Треккинг заказа”
                    </p>
                </div>
            </div>

            <div class="cart_success_wrap_item">
                <div class="cart_success_wrap_item-btn">
                    <TextBtn
                        text="Закрыть"
                        id="thanks_btn"
                        className="cart_success_wrap_item-btn_item text_buy-btn magic_btn"
                        @click.native="pushToHome" />
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import TextBtn from '../btns/TextBtn';
    import {mapActions} from 'vuex';

    export default {
        name: "Success",
        components: {
            TextBtn
        },
        methods: {
            ...mapActions([
                'CHANGE_PROGRESS_STEP',
                'CREATE_MAGIC_BTN'
            ]),
            pushToHome() {
                window.location = '/'
            },
            createMagic() {
                let btn = document.querySelector('#thanks_btn');
                this.CREATE_MAGIC_BTN(btn);
            }
        },
        created() {
            this.CHANGE_PROGRESS_STEP(4);
            setTimeout(this.createMagic, 500);
        }
    }
</script>

<style scoped>

</style>
