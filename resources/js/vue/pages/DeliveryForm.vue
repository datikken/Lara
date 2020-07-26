<template>
    <div class="dform_outer">
        <div class="dform">
            <div class="dform_head">
                <span class="dform_head-item">Воспользуйтесь помощником для выбора доступных вариантов доставки</span>
            </div>

            <div class="dform_wrap">
                <DeliveryForms />
                <DeliveryHelper />
            </div>
        </div>

        <OrdersList />

        <!--@include('components.cart.order_list')-->
        <!--<script async="false" src="//api-maps.yandex.ru/2.1/?lang=ru_RU" id="scriptonload-__api_maps_yandex_ru_2_1__lang_ru_RU"></script>-->

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
