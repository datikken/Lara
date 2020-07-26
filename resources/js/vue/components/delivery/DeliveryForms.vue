<template>
    <div class="dform_wrap-col">
        <div class="dform_wrap-col_item">
            <div class="step_wrap">

                <SelfDelivery />

                <PostDelivery />

                <PickupDelivery />

            </div>
        </div>
    </div>
</template>

<script>
    import SelfDelivery from './SelfDelivery'
    import PostDelivery from './PostDelivery'
    import PickupDelivery from './PickupDelivery'

    export default {
        name: "DeliveryForms",
        components: {
            SelfDelivery,
            PostDelivery,
            PickupDelivery
        }
    }
</script>

<style scoped>

</style>
