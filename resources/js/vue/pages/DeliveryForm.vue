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
        </div>

        <OrdersList />

    </div>
</template>

<script>
    import DeliveryHelper from '../components/delivery/DeliveryHelper'
    import DeliveryForms from '../components/delivery/DeliveryForms'
    import OrdersList from '../components/orders/OrdersList'

    export default {
        name: "DeliveryForm",
        components: {
            DeliveryHelper,
            DeliveryForms,
            OrdersList
        }
    }
</script>

<style scoped>

</style>
