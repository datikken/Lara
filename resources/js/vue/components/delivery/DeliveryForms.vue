<template>
    <div class="dform_wrap-col">
        <div class="dform_wrap-col_item">
            <div class="step_wrap">

                <SelfDelivery v-if="this.deliveryType === 'self' "/>
                <PostDelivery v-if="this.deliveryType === 'post' "/>
                <PickupDelivery v-if="this.deliveryType === 'delivery'" />
                <PickupDelivery v-if="this.deliveryType === 'deliveryMkad'" />

            </div>
        </div>
    </div>
</template>

<script>
    import SelfDelivery from './SelfDelivery'
    import PostDelivery from './PostDelivery'
    import PickupDelivery from './PickupDelivery'
    import { mapGetters } from 'vuex'

    export default {
        name: "DeliveryForms",
        components: {
            SelfDelivery,
            PostDelivery,
            PickupDelivery
        },
        computed: {
            ...mapGetters([
                'deliveryType'
            ])
        }
    }
</script>

<style scoped>

</style>
