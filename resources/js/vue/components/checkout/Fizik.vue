<template>
    <div class="cart_check">
        <div class="cart_check-wrap" data-href="">
            <div class="cart_check-wrap_head">
                <h1>Получатель заказа</h1>
            </div>

            <div class="cart_check-wrap_item">
                <div class="cart_check-wrap_item-group">
                    <label for="required" class="invisible" data-err>Поле имя обязательно к заполнению</label>
                    <label for="firstname">Имя <span>*</span></label>
                    <input type="text" name="firstname" data-required />
                </div>
                <div class="cart_check-wrap_item-group">
                    <label for="required" class="invisible errorLabel" data-err>Поле фамилия обязательно к заполнению</label>
                    <label for="lastname">Фамилия <span>*</span></label>
                    <input type="text" name="lastname" data-required  />
                </div>
            </div>

            <div class="cart_check-wrap_item">
                <div class="cart_check-wrap_item-group">
                    <label for="required" class="invisible errorLabel" data-err>Поле телефон обязательно к заполнению</label>
                    <label for="tel">Телефон <span>*</span></label>
                    <input type="text" name="tel" placeholder="+7 (___) ___ - __ - __" class="masked" data-required />
                </div>

                <TextBtn className="cart_check-wrap_item-group_btn" text="продолжить" />
            </div>

            <div class="cart_check-wrap_item">
                <div class="cart_check-wrap_item-group checkbox">
                    <SimpleCheckbox />
                    <label for="save">Сохранить данные</label>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import SimpleCheckbox from '../checkboxes/SimpleCheckbox';
    import TextBtn from '../btns/TextBtn'

    export default {
        name: "Fizik",
        components: {
            SimpleCheckbox,
            TextBtn
        }
    }
</script>

<style scoped>
    .cart_check-wrap_item-group_btn {
        margin-top: 24px;
    }
</style>
