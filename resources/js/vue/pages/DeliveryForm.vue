<template>
    <div>

    <div class="dform_outer">
        <div class="dform">
            <div class="dform_head">
                <span class="dform_head-item">Воспользуйтесь помошником для выбора доступных вариантов доставки</span>
            </div>

            <div class="dform_wrap">
                <DeliveryForms />
                <DeliveryHelper />
            </div>

            <DeliveryPickups v-if="this.deliveryType === 'stock'"/>

            <TextBtn
                className="form_group-btn yellow_btn animated_btn"
                text="Продолжить"
                @click.native="proceedToPaymentPage"
                id="proceedToPayments"
                v-if="this.deliveryType" />

        </div>

        <OrdersList />

    </div>


    </div>
</template>

<script>
    import DeliveryHelper from '../components/delivery/DeliveryHelper'
    import DeliveryForms from '../components/delivery/DeliveryForms'
    import OrdersList from '../components/orders/OrdersList'
    import DeliveryPickups from '../components/delivery/DeliveryPickups'
    import TextBtn from '../components/btns/TextBtn'
    import { mapGetters, mapActions } from 'vuex'
    import router from '../router/router'

    export default {
        name: "DeliveryForm",
        components: {
            DeliveryPickups,
            DeliveryHelper,
            DeliveryForms,
            OrdersList,
            TextBtn
        },
        computed: {
            ...mapGetters([
                'deliveryType',
                'customerAdress',
                'customerIndex',
                'stockDeliveryPickup',
                'user'
            ]),
        },
        methods: {
            ...mapActions([
                'DELIVERY_TYPE_ERROR',
                'CHANGE_PROGRESS_STEP',
                'SCROLL_TO_TOP',
                'CHECK_DELIVERY_PICKUPS'
            ]),
            proceedToPaymentPage() {
                let ready = false;

                // this.validateAdressForm();

                if(this.deliveryType === 'stock') {
                   if(this.stockDeliveryPickup) {
                       ready = true;
                   } else {
                       let errBlock = this.$el.querySelector('[data-deliveryPickupError]')
                           errBlock.classList.remove('as-none');
                   }
                }

                if(this.deliveryType === 'self') {
                    ready = this.validatePickUpPoint();
                    $(document.body).scrollTop($('#self').offset().top);
                }

                if(this.deliveryType === 'deliveryMkad' || this.deliveryType === 'delivery' || this.deliveryType === 'post') {
                    if( typeof this.customerAdress.deliveryAddress === 'object') {
                        ready = true;
                    }
                    if(this.customerIndex.deliveryIndex) {
                        ready = true;
                    }
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
            }
        }
    }
</script>

<style scoped>

</style>
