<template>
    <div class="cart_check">
        <div class="cart_check-wrap" data-href="">
            <div class="cart_check-wrap_head">
                <h1 data-heading>Получатель заказа</h1>

                <span class="error-message as-none" data-error>Заполните обязательные поля</span>
            </div>

            <div class="cart_check-wrap_item">
                <div class="cart_check-wrap_item-group">
                    <label for="required" class="invisible" data-err>Поле имя обязательно к заполнению</label>
                    <label for="firstname">Имя <span>*</span></label>
                    <input type="text" name="firstname" data-required/>
                </div>
                <div class="cart_check-wrap_item-group">
                    <label for="required" class="invisible errorLabel" data-err>Поле фамилия обязательно к
                        заполнению</label>
                    <label for="lastname">Фамилия <span>*</span></label>
                    <input type="text" name="lastname" data-required/>
                </div>
            </div>

            <div class="cart_check-wrap_item">
                <div class="cart_check-wrap_item-group">
                    <label for="required" class="invisible errorLabel" data-err>Поле телефон обязательно к
                        заполнению</label>
                    <label for="tel">Телефон <span>*</span></label>
                    <masked-input v-model="phone" mask="\+\7 (111) 111-11-11" placeholder="+7 (___) ___ - __ - __"/>
                </div>

                <TextBtn className="cart_check-wrap_item-group_btn animated_btn" text="продолжить"
                         @click.native="setCustomerFio"/>

            </div>

            <div class="cart_check-wrap_item">
                <div class="cart_check-wrap_item-group checkbox">
                    <SimpleCheckbox name="save"/>
                    <label for="save">Сохранить данные</label>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import SimpleCheckbox from '../checkboxes/SimpleCheckbox'
    import TextBtn from '../btns/TextBtn'
    import {mapActions} from 'vuex'
    import MaskedInput from '../inputs/MaskedInput'
    import router from '../../router/router'

    export default {
        name: "Fizik",
        components: {
            SimpleCheckbox,
            TextBtn,
            MaskedInput
        },
        data: function () {
            return {
                userMask: 'aa-aa-AAAA',
                phone: ''
            }
        },
        methods: {
            ...mapActions([
                'SET_CUSTOMER_FIO',
                'CHANGE_PROGRESS_STEP',
                'SCROLL_TO_TOP'
            ]),
            setCustomerFio() {
                let inputs = this.$el.querySelectorAll('input');
                let obj = {};

                inputs.forEach((el) => {
                    let name = el.getAttribute('name');
                    let val = el.value;

                    obj[name] = val;
                })

                this.SET_CUSTOMER_FIO(obj);

                try {
                    window.app.validator.formValidate([], $(this.$el));
                    this.CHANGE_PROGRESS_STEP();
                    router.push('/deliveryForm');
                    this.SCROLL_TO_TOP();

                } catch (err) {
                    let error = this.$el.querySelector('[data-error]');
                    let heading = this.$el.querySelector('[data-heading]');

                    error.classList.add('mb10');
                    error.classList.remove('as-none');
                    heading.classList.add('mb5');

                    return;
                }
            }
        }
    }
</script>

<style scoped>
    .cart_check-wrap_item-group_btn {
        margin-top: 24px;
    }
</style>
