<template>
    <div class="dform_outer">
        <div class="dform">

            <div class="dform_head">
                <span class="dform_head-item">Воспользуйтесь помошником для выбора доступных вариантов доставки</span>
            </div>

            <div class="dform_wrap">
                <DeliveryForms />
                <DeliveryHelper />
            </div>

            <DeliveryPickups v-if="showPickUpsService && this.deliveryType === 'self'" />

            <DeliverySelf ref="delSafe" v-if="showDeliverySelf && this.deliveryType === 'post'" type="post" text="Ранее используемый почтовый адрес" />
            <DeliverySelf ref="delSafe" v-if="showDeliverySelf && this.deliveryType === 'delivery'" type="delivery" text="Ранее используемый адрес доставки" />
            <DeliverySelf ref="delSafe" v-if="showDeliverySelf && this.deliveryType === 'deliveryMkad'" type="deliveryMkad" text="Ранее используемый адрес доставки" />

            <DeliveryPostForm v-if="showDeliveryPostForm" ref="postRef" />
            <DeliveryService v-if="showDeliveryMkad" ref="delRef" />
            <DeliveryService v-if="showDeliveryService" ref="delRef" />

            <TextBtn
                className="magic_btn"
                text="Продолжить"
                @click.native="proceedToPaymentPage"
                id="proceedToPayments"
                v-if="readyToGoOn"
            />

        </div>

        <OrdersList />

    </div>
</template>

<script>
    import DeliveryHelper from '../components/delivery/DeliveryHelper'
    import DeliveryForms from '../components/delivery/DeliveryForms'
    import OrdersList from '../components/orders/OrdersList'
    import DeliveryPickups from '../components/delivery/DeliveryPickups'
    import DeliveryPostForm from '../components/delivery/DeliveryPostForm';
    import DeliveryService from '../components/delivery/DeliveryService';
    import TextBtn from '../components/btns/TextBtn'
    import SelfDelivery from '../components/delivery/SelfDelivery';
    import DeliverySelf from '../components/delivery/DeliverySelf'

    import { mapGetters, mapActions } from 'vuex'
    import router from '../router/router'

    export default {
        name: "DeliveryForm",
        components: {
            DeliveryPickups,
            DeliveryHelper,
            DeliveryForms,
            DeliveryPostForm,
            DeliveryService,
            SelfDelivery,
            OrdersList,
            DeliverySelf,
            TextBtn
        },
        data() {
            return {
                showDeliveryPostForm: false,
                showDeliveryMkad: false,
                showDeliveryService: false,
                showPickUpsService: false,
                readyToGoOn: false,
                dadataValidAdress: false,
                pickUpPointAccepted: false,
                showDeliverySelf: true,
                delSelfAccepted: false
            }
        },
        computed: {
            ...mapGetters([
                'deliveryType',
                'deliveryAdress',
                'customerIndex',
                'stockDeliveryPickup',
                'user',
                'validatePostForm',
                'readyToGo',
                'pickUpPoint',
                'showAditionalForms',
                'prevDelAdrAccepted'
            ]),
        },
        watch: {
            showAditionalForms(newVal, oldVal) {
                if(newVal) {
                    this._showAditionalForms();
                }
            },
            pickUpPoint(newVal, oldVal) {
                if(newVal) {
                    this.pickUpPointAccepted = true
                }
            },
            readyToGo(newVal, oldVal) {
                let that = this;
                this.readyToGoOn = newVal;

                setTimeout(that.createMagicBtn, 500);
            },
            prevDelAdrAccepted(newVal, oldVal) {
                if(newVal) {
                    this.delSelfAccepted = newVal;
                }
            }
        },
        methods: {
            ...mapActions([
                'DELIVERY_TYPE_ERROR',
                'CHANGE_PROGRESS_STEP',
                'SCROLL_TO_TOP',
                'CHECK_DELIVERY_PICKUPS',
                'GET_LAST_DELIVERY_ADRESS',
                'SET_READY_TO_GO',
                'CREATE_MAGIC_BTN',
                'SHOW_NOTIFICATION'
            ]),
            _showAditionalForms() {
                this.processCartSteps();

                if(this.deliveryType === 'self') {
                    this.showPickUpsService = true;
                    this.SET_READY_TO_GO(true);
                }
                if(this.deliveryType === 'post') {
                    this.showDeliveryPostForm = true;
                    this.SET_READY_TO_GO(true);
                }
                if(this.deliveryType === 'delivery') {
                    this.showDeliveryService = true;
                    this.SET_READY_TO_GO(true);
                }
                if(this.deliveryType === 'deliveryMkad') {
                    this.showDeliveryMkad = true;
                    this.SET_READY_TO_GO(true);
                }

            },
            processCartSteps() {
                this.showDeliverySelf = false;
                this.showDeliveryPostForm = false;
                this.showDeliveryService = false;
                this.showDeliveryMkad = false;
                this.showPickUpsService = false;
            },
            validatePickUpPoint() {
                if(this.pickUpPointAccepted) {
                    return true;
                } else {
                    this.SHOW_NOTIFICATION('Выберите пункт самовывоза', 'danger');
                }

                return false;
            },
            createMagicBtn() {
                let btn = this.$el.querySelector('#proceedToPayments');

                this.CREATE_MAGIC_BTN(btn);
            },
            callPostForm() {
                let status = this.$refs.postRef.handleValidatePostForm();

                return status;
            },
            proceedToPaymentPage() {
                let ready = false;

                if(this.deliveryType === 'stock') {
                   if(this.stockDeliveryPickup) {
                       ready = true;
                   } else {
                       let errBlock = this.$el.querySelector('[data-deliveryPickupError]')
                           errBlock.classList.remove('as-none');
                   }
                }

                if(this.deliveryType === 'self') {
                    this.validatePickUpPoint();

                    if(this.pickUpPointAccepted) {
                        ready = true
                    }
                }

                if(this.deliveryType === 'deliveryMkad' || this.deliveryType === 'delivery') {
                    if(this.delSelfAccepted) {
                        ready = true;
                    } else {
                        ready = this.$refs.delRef.validateDeliveryService();
                    }
                }

                if(this.deliveryType === 'post') {
                    let res = this.callPostForm();

                    if(res) {
                        ready = true
                    } else {
                        return;
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
