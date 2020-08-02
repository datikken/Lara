<template>
    <div class="dform_wrap-col">
        <div class="dform_wrap-col_item">
            <div class="step_wrap">

                <div class="form_group">
                    <span class="form_group-heading">Введите город, улицу и номер дома.</span>
                </div>

                <div class="index_group getSetAddress">
                    <div class="form_group">
                        <label for="city" class="form_group-label">Город</label>
                        <input type="text" name="city"/>
                    </div>

                    <div class="form_group">
                        <label for="street" class="form_group-label">Улица</label>
                        <input type="text" name="street"/>
                    </div>

                    <div class="form_group inline_group">
                        <div class="label_wrap">
                            <label for="house" class="form_group-label">Дом</label>
                            <input type="text" name="house"/>
                        </div>

                        <div class="label_wrap">
                            <label for="body" class="form_group-label">Корпус</label>
                            <input type="text" name="body"/>
                        </div>

                        <div class="label_wrap">
                            <label for="building" class="form_group-label">Строение</label>
                            <input type="text" name="building"/>
                        </div>
                    </div>

                    <TextBtn className="form_group-btn flat_btn animated_btn" text="применить" @click.native="applyDeliveryAdress"/>

                </div>


                <DeliveryIndex />

                <TextBtn className="form_group-btn yellow_btn animated_btn" text="Продолжить" @click.native="proceedToPaymentPage"/>

            </div>
        </div>
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
                'deliveryType'
            ]),
            ...mapGetters([
                'deliveryType'
            ])
        },
        methods: {
            ...mapActions([
                'APPLY_DELIVERY_ADRESS',
                'DELIVERY_TYPE_ERROR',
                'CHANGE_PROGRESS_STEP',
                'CREATE_ORDER'
            ]),
            proceedToPaymentPage() {
                this.CHANGE_PROGRESS_STEP();
                this.CREATE_ORDER();

                router.push('/payments')
            },
            applyDeliveryAdress() {
                let data =  {};
                let inputs = this.$el.querySelectorAll('input');
                inputs.forEach((npt) => {
                    let name = npt.getAttribute('name');
                    let val = npt.value;

                    if(val) data[name] = val;
                })

                if(this.deliveryType != '') {
                    this.APPLY_DELIVERY_ADRESS(data);

                    inputs.forEach((npt) => {
                        npt.value = ''
                        npt.setAttribute('disabled', '')
                    })
                } else {
                    this.DELIVERY_TYPE_ERROR();
                }

            }
        }
    }
</script>

<style scoped>

</style>
