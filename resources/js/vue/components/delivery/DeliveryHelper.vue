<template>
    <div class="dform_wrap-col" data-delivery-type_helper>
        <div class="dform_wrap-col_item delivery_type" id="delivery_type">
            <DeliveryHelperItem v-if="selfDelivery" name="stock" text="Самовывоз со склада"/>
            <!--<DeliveryHelperItem name="self" text="Забрать из постамата" />-->
            <DeliveryHelperItem v-if="deliveryType" name="deliveryMkad" text="Доставка по Москве в пределах МКАД"/>
            <DeliveryHelperItem v-if="deliveryType" name="delivery" text="Доставка по Москве за МКАД"/>
            <DeliveryHelperItem name="post" text="Доставка почтой России"/>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from "vuex";
    import DeliveryHelperItem from "./DeliveryHelperItem";

    export default {
        name: "DeliveryHelper",
        components: {
            DeliveryHelperItem,
        },
        data: function () {
            return {
                deliveryTypeError: false,
                selfDelivery: false
            };
        },
        computed: {
            ...mapGetters(["deliveryType"]),
        },
        methods: {},
        watch: {
            deliveryType(newVal, oldVal) {
                this.selfDelivery = newVal;
            },
        },
    };
</script>

<style scoped>
</style>
