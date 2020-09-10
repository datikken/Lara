<template>
    <div class="dform_wrap-col">
        <div class="dform_wrap-col_item">
            <div class="step_wrap">

                <div class="form_group">
                    <span class="form_group-heading">Введите город, улицу и номер дома.</span>
                    <span class="error-message as-none">Заполните адрес доставки</span>
                </div>

                <div class="index_group getSetAddress">

                    <div class="form_group">
                        <label for="city" class="form_group-label">Город</label>
                        <input type="text" name="city" data-required/>
                    </div>

                    <div class="form_group">
                        <label for="street" class="form_group-label">Улица</label>
                        <input type="text" name="street"  data-required/>
                    </div>

                    <div class="form_group inline_group">
                        <div class="label_wrap">
                            <label for="house" class="form_group-label">Дом</label>
                            <input type="text" name="house" data-required/>
                        </div>

                        <div class="label_wrap">
                            <label for="body" class="form_group-label">Корпус</label>
                            <input type="text" name="body"  data-required/>
                        </div>

                        <div class="label_wrap">
                            <label for="building" class="form_group-label">Строение</label>
                            <input type="text" name="building" data-required/>
                        </div>
                    </div>
                    <TextBtn className="form_group-btn flat_btn animated_btn" text="применить" @click.native="applyDeliveryAdress"/>
                </div>


                <DeliveryIndex />

            </div>
        </div>

        <div class="currentPickups">
            <div class="currentPickups_item">
                <div class="currentPickups_icon">
                    <img src="/images/icons/metro_active.svg" alt="amount"/>
                </div>
                <div class="currentPickups_metro">Люблино</div>
                <div class="currentPickups_adr">Совхозная, д. 56, корп 99, стр. 6</div>
            </div>
            <div class="currentPickups_item">
                <div class="currentPickups_icon">
                    <img src="/images/icons/metro.svg" alt="amount"/>
                </div>
                <div class="currentPickups_metro">Нагатинская</div>
                <div class="currentPickups_adr">Варшавское шоссе, 36, стр. 8</div>
            </div>
        </div>

        <TextBtn className="form_group-btn yellow_btn animated_btn" text="Продолжить" @click.native="proceedToPaymentPage" id="proceedToPayments"/>

    </div>
</template>

<script>
    import TextBtn from '../btns/TextBtn'
    import { mapGetters, mapActions } from 'vuex'
    import DeliveryIndex from "./DeliveryIndex"
    import router from '../../router/router'

    export default {
        name: "DeliveryForms",
        components: {
            DeliveryIndex,
            TextBtn
        },
        computed: {
            ...mapGetters([
                'deliveryType',
                'pickUpPoint',
                'user'
            ]),
        },
        methods: {
            ...mapActions([
                'APPLY_DELIVERY_ADRESS',
                'DELIVERY_TYPE_ERROR',
                'CHANGE_PROGRESS_STEP',
                'SCROLL_TO_TOP',
                'VALIDATE_DELIVERY_ADRESS',
                'SHOW_DELIVERY_TYPE_HELPER'
            ]),
            validatePickUpPoint() {
                let valid = false;

                if(this.pickUpPoint) {
                    valid = true
                }

                return valid
            },
            validateAdressForm() {
                let input = this.$el.querySelector('[data-required]');
                let valid = false;

                if(input.hasAttribute('disabled')) {
                    return true
                }

                try {
                    valid = this.VALIDATE_DELIVERY_ADRESS(form);
                } catch(e) {
                    this.$el.querySelector('.error-message').classList.remove('as-none');
                }

                return valid;
            },
            proceedToPaymentPage() {
                let ready = false;

                if(this.deliveryType === 'stock') {
                    ready = true;
                }
                if(this.deliveryType === 'post') {
                   ready = this.validateAdressForm();
                }
                if(this.deliveryType === 'self') {
                   ready = this.validatePickUpPoint();
                    $(document.body).scrollTop($('#self').offset().top);
                }
                if(this.deliveryType === 'deliveryMkad' || this.deliveryType === 'delivery') {
                    ready = this.validateAdressForm();
                }
                if(!this.deliveryType) {
                    this.DELIVERY_TYPE_ERROR();
                }
                if(ready) {
                    this.CHANGE_PROGRESS_STEP();

                    if(this.user.face === 'urik') {
                        router.push('/contract')
                    } else {
                        router.push('/payments')
                    }

                    this.SCROLL_TO_TOP();
                }
            },
            applyDeliveryAdress() {
                let data =  {};
                let inputs = this.$el.querySelectorAll('input');
                let form = this.$el.querySelector('.getSetAddress');

                inputs.forEach((npt) => {
                    let name = npt.getAttribute('name');
                    let val = npt.value;

                    if(val) data[name] = val;
                })

                if(Object.values(data).length > 0) {
                    this.APPLY_DELIVERY_ADRESS(data);

                    inputs.forEach((npt) => {
                        npt.value = ''
                        npt.setAttribute('disabled', '')
                    })

                    this.$el.querySelector('.error-message').classList.add('as-none');
                    // $(document.body).scrollTop($('#proceedToPayments').offset().top);

                } else {
                    this.validateAdressForm();
                }


                this.SHOW_DELIVERY_TYPE_HELPER();
            }
        }
    }
</script>

<style scoped>

</style>
