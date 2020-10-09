<template>
    <div class="dform_wrap-col first_step_form">
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

                    <TextBtn
                        className="magic_btn"
                        text="применить"
                        id="adressUnique"
                        @click.native="applyDeliveryAdress" />

                </div>

                <DeliveryIndex />

            </div>
        </div>

        <div class="dform_decor"></div>

    </div>
</template>

<script>
    import TextBtn from '../btns/TextBtn'
    import DeliveryIndex from "./DeliveryIndex"
    import { mapGetters, mapActions } from 'vuex'

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
        mounted() {
            this.CREATE_MAGIC_BTN(this.$el.querySelector('#adressUnique'));
        },
        methods: {
            ...mapActions([
                'APPLY_DELIVERY_ADRESS',
                'DELIVERY_TYPE_ERROR',
                'CHANGE_PROGRESS_STEP',
                'SCROLL_TO_TOP',
                'VALIDATE_DELIVERY_ADRESS',
                'SHOW_DELIVERY_TYPE_HELPER',
                'CHECK_DELIVERY_ADRESS',
                'BLOCK_FORM_INPUTS',
                'CREATE_MAGIC_BTN'
            ]),
            validatePickUpPoint() {
                let valid = false;

                if(this.pickUpPoint) {
                    valid = true
                }

                return valid
            },
            validateAdressForm() {
                let indexField = this.$el.querySelector('[data-index_field]');
                let valid = false;

                try {
                    if(!indexField.getAttribute('disabled')) {
                        valid = this.VALIDATE_DELIVERY_ADRESS(form);
                    }
                } catch(e) {
                    this.$el.querySelector('.error-message').classList.remove('as-none');
                }

                if(indexField.getAttribute('disabled')) {
                    valid = true;
                }

                return valid;
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
                    this.CHECK_DELIVERY_ADRESS(data);

                    this.BLOCK_FORM_INPUTS(this.$el);

                    this.$el.querySelector('.error-message').classList.add('as-none');

                } else {
                    this.validateAdressForm();
                }
            }
        }
    }
</script>
