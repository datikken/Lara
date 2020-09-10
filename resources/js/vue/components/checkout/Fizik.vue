<template>
    <div class="cart_check">
        <div class="cart_check-wrap" data-href="">
            <div class="cart_check-wrap_head">
                <h1 data-heading>Получатель заказа</h1>

                <span class="error-message as-none" data-error>Заполните обязательные поля</span>
            </div>

            <!--<span>{{ user.user.name }}</span>-->
            <!--<span>{{ user.userInfo[0].lastname }}</span>-->
            <!--<span>{{ user.userInfo[0].tel }}</span>-->

            <div class="cart_check-wrap_item">
                <div class="cart_check-wrap_item-group">
                    <label for="required" class="invisible" data-err>Поле имя обязательно к заполнению</label>
                    <label for="firstname">Имя <span>*</span></label>
                    <input type="text" name="firstname" data-required :value="user.user.name" />
                </div>
                <div class="cart_check-wrap_item-group">
                    <label for="required" class="invisible errorLabel" data-err>Поле фамилия обязательно к
                        заполнению</label>
                    <label for="lastname">Фамилия <span>*</span></label>
                    <div v-if="user.userInfo[0].lastname">
                        <input type="text" name="lastname" data-required :value="user.userInfo[0].lastname" />
                    </div>
                    <input type="text" name="lastname" data-required v-else />
                </div>
            </div>

            <div class="cart_check-wrap_item">
                <div class="cart_check-wrap_item-group">
                    <label for="required" class="invisible errorLabel" data-err>Поле телефон обязательно к
                        заполнению</label>
                    <label for="tel">Телефон <span>*</span></label>
                    <masked-input
                        v-model="phone"
                        mask="\+\7 (111) 111-11-11" name="tel"
                        placeholder="+7 (___) ___ - __ - __"
                        data-required
                        data-phone />
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
    import {mapActions,mapGetters} from 'vuex'
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
                phone: user.userInfo[0].tel
            }
        },
        mounted() {
           this.GET_USERS_INFO();
        },
        computed: {
            ...mapGetters(['user']),
            user() {
                return this.$store.state.user
            }
        },
        methods: {
            ...mapActions([
                'SET_CUSTOMER_FIO',
                'CHANGE_PROGRESS_STEP',
                'SCROLL_TO_TOP',
                'GET_USERS_INFO'
            ]),
            validateNumberLength(num) {
                let val = num.replace(/[- + _ )(]/g,'');

                if(val.length === 10) {
                    return true
                } else {
                    return false
                }
            },
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
                    this.validateNumberLength(obj.tel);
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
