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
                    <TextBtn text="Закрыть" className="cart_success_wrap_item-btn_item text_buy-btn animated_btn"/>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import TextBtn from '../btns/TextBtn';

    export default {
        name: "Success",
        components: {
            TextBtn
        }
    }
</script>

<style scoped>

</style>
