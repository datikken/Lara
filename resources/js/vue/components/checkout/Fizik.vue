<template>
    <div class="cart_check">
        <div class="cart_check-wrap" data-href="">
            <div class="cart_check-wrap_head">
                <h1 data-heading>Получатель заказа</h1>
            </div>

            <div class="cart_check-wrap_item">
                <div class="cart_check-wrap_item-group form_group">
                    <label for="firstname">Имя <span>*</span></label>
                    <input type="text" name="firstname" data-required />
                    <label for="required" class="form_group_message" data-err>Поле имя обязательно к заполнению</label>
                </div>
                <div class="cart_check-wrap_item-group form_group">
                    <label for="lastname">Фамилия <span>*</span></label>
                    <input type="text" name="lastname" data-required />
                    <label for="required" class="form_group_message" data-err>Поле фамилия обязательно к заполнению</label>
                </div>
            </div>

            <div class="cart_check-wrap_item">
                <div class="cart_check-wrap_item-group form_group">

                    <label for="tel">Телефон <span>*</span></label>
                    <masked-input
                        v-model="phone"
                        mask="\+\7 (111) 111-11-11" name="tel"
                        placeholder="+7 (___) ___ - __ - __"
                        data-required
                        data-phone />

                    <label for="required" class="form_group_message">Поле телефон обязательно к заполнению</label>
                </div>

                <TextBtn className="cart_check-wrap_item-group_btn blocked_btn" text="продолжить" @click.native="setCustomerFio"/>

            </div>

            <div class="cart_check-wrap_item cart_save_data">
                <div class="cart_check-wrap_item-group form_group">
                    <div class="cart_check-wrap_item-group_inner">
                        <SimpleCheckbox name="save" @click.native="saveDataToStorage" />
                        <label for="save">Сохранить данные</label>
                    </div>
                </div>
            </div>
        </div>

        <agreementCheck />

    </div>
</template>

<script>
    import SimpleCheckbox from '../checkboxes/SimpleCheckbox'
    import TextBtn from '../btns/TextBtn'
    import {mapActions,mapGetters} from 'vuex'
    import MaskedInput from '../inputs/MaskedInput'
    import router from '../../router/router'
    import agreementCheck from '../policy/agreementCheck';

    export default {
        name: "Fizik",
        components: {
            SimpleCheckbox,
            TextBtn,
            MaskedInput,
            agreementCheck
        },
        data: function () {
            return {
                userMask: 'aa-aa-AAAA',
                phone: '',
                groups: ''
            }
        },
        mounted() {
           this.GET_USERS_INFO();
           this.fillInputsData();
           this.clearInputsOnFocus();
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
            clearInputsOnFocus() {
                this.groups = this.$el.querySelectorAll('.form_group');

                this.groups && this.groups.forEach(grp => {
                    let npt = grp.querySelector('input');

                    npt.addEventListener('focus', function() {
                        grp.classList.remove('form_group-error');
                        npt.value = '';
                    })
                });
            },
            fillInputsData() {
                let data = JSON.parse(localStorage.getItem('checkoutProductsData'));

                if(data) {
                    let name = this.$el.querySelector('[name="firstname"]');
                    let lastName = this.$el.querySelector('[name="lastname"]');

                    name.value = data.firstname;
                    lastName.value = data.lastname;

                    this.phone = data.tel
                }
            },
            collectInputData() {
                let inputs = this.$el.querySelectorAll('input');
                let obj = {};

                inputs.forEach((el) => {
                    let name = el.getAttribute('name');
                    let val = el.value;

                    obj[name] = val;
                })

                return obj;
            },
            validateOferta() {
                let oferta = this.$el.querySelector('[data-oferta]');
                let input;

            },
            saveDataToStorage() {
                let data = this.collectInputData();


                console.warn(data);

                return;


                localStorage.setItem('checkoutProductsData', JSON.stringify(data));



            },
            validateNumberLength(num) {
                let val = num.replace(/[- + _ )(]/g,'');

                if(val.length === 10) {
                    return true
                } else {
                    return false
                }
            },
            setCustomerFio() {
                let obj = this.collectInputData();

                this.SET_CUSTOMER_FIO(obj);

                try {

                    window.app.validator.formValidate([], $(this.$el));
                    this.validateNumberLength(obj.tel);
                    this.validateOferta();
                    this.CHANGE_PROGRESS_STEP();
                    router.push('/deliveryForm');
                    this.SCROLL_TO_TOP();

                } catch (err) {
                    this.groups && this.groups.forEach(grp => {
                        let required = grp.querySelector('[data-required]');
                        let npt = grp.querySelector('input').value

                        if(required && npt === '') {
                            grp.classList.add('form_group-error');
                        }
                    })

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
    .cart_save_data {
        margin-top: 10px;
    }
</style>
