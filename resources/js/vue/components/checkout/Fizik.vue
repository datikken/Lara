<template>
    <div class="cart_check">
        <div class="cart_check-wrap" data-href="">
            <div class="cart_check-wrap_head">
                <h1 data-heading>Получатель заказа</h1>
            </div>

            <div class="cart_check-wrap_item">
                <div class="cart_check-wrap_item-group form_group">
                    <label for="firstname">Имя <span>*</span></label>
                    <input type="text" name="name" data-required />
                    <label for="required" class="form_group_message">Поле имя обязательно к заполнению</label>
                </div>
                <div class="cart_check-wrap_item-group form_group">
                    <label for="lastname">Фамилия <span>*</span></label>
                    <input type="text" name="lastname" data-required />
                    <label for="required" class="form_group_message">Поле фамилия обязательно к заполнению</label>
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

                <TextBtn className="cart_check-wrap_item-group_btn blocked_btn" text="продолжить" @click.native="checkFormStepsBeforeProceed"/>

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
                groups: '',
                validForm: false
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
                'GET_USERS_INFO',
                'REFRESH_CUTOMER_DATA'
            ]),
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
            clearInputsOnFocus() {
                this.groups = this.$el.querySelectorAll('.form_group');

                this.groups && this.groups.forEach(grp => {
                    let npt = grp.querySelector('input');

                    npt.addEventListener('focus', function() {
                        grp.classList.remove('form_group-error');
                    })
                });
            },
            saveDataToStorage() {
                let data = this.collectInputData();

                try {
                   window.app.validator.formValidate([], $(this.$el));
                } catch(err) {
                    this.setFormError();
                    console.error(err)
                    return;
                }

                this.validForm = true;

                if(this.validForm && data.save) {
                        localStorage.setItem('checkoutProductsData', JSON.stringify(data));
                    let phone = this.trimPhoneNumber(data.tel)
                        delete data.save;
                        data.tel = phone;

                        this.REFRESH_CUTOMER_DATA(data);
                }
            },
            fillInputsData() {
                let locUser = this.user.user[0];
                let name = this.$el.querySelector('[name="name"]');
                let lastName = this.$el.querySelector('[name="lastname"]');
                    name.value = locUser.name;
                    lastName.value = locUser.lastname;

                    this.phone = locUser.tel
            },
            setFormError() {
                this.groups && this.groups.forEach(grp => {
                    let required = grp.querySelector('[data-required]');
                    let npt = grp.querySelector('input').value

                    if(required && npt === '') {
                        grp.classList.add('form_group-error');
                    }
                })

                this.validForm = false;
            },
            validateAgreement() {
                let oferta = this.$el.querySelector('[data-oferta]').querySelector('[type="checkbox"]');
                let input;

                if(oferta.getAttribute('checked')) {
                    this.validForm = true;
                } else {
                    this.validForm = false;
                    UIkit.notification({
                        message: 'Необходимо ваше согласие.',
                        status: 'default',
                        pos: 'top-center',
                        timeout: 5000
                    });
                }
            },
            trimPhoneNumber(num) {
                let val = num.replace(/[- + _ )(]/g,'');

                return val;
            },
            validateNumberLength(num) {
                let val = this.trimPhoneNumber(num);

                if(val.length === 10) {
                    this.validForm = true
                } else {
                    this.validForm = false
                }
            },
            checkFormStepsBeforeProceed() {
                let obj = this.collectInputData();

                try {
                    window.app.validator.formValidate([], $(this.$el));
                    this.validateNumberLength(obj.tel);
                    this.validateAgreement();
                } catch (err) {
                    this.setFormError();
                }

                if(this.validForm) {
                    this.SET_CUSTOMER_FIO(obj);
                    this.CHANGE_PROGRESS_STEP();
                    router.push('/vueDeliveryForm');
                    this.SCROLL_TO_TOP();
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
