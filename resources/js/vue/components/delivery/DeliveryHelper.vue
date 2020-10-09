<template>
    <div class="dform_wrap-col" data-delivery-type_helper>
        <div class="dform_wrap-col_item delivery_type" id="delivery_type">
            <DeliveryHelperItem v-if="delAllowed === 'self' || delAllowed === 'any'" name="self"
                                text="Самовывоз со склада"/>
            <!--<DeliveryHelperItem name="self" text="Забрать из постамата" />-->
            <DeliveryHelperItem v-if="delAllowed === 'delivery' || delAllowed === 'any'" name="delivery"
                                text="Доставка по Москве в пределах МКАД"/>
            <DeliveryHelperItem v-if="delAllowed === 'deliveryMkad' || delAllowed === 'any'" name="deliveryMkad"
                                text="Доставка по Москве за МКАД"/>
            <DeliveryHelperItem v-if="delAllowed === 'post' || delAllowed === 'any'" name="post"
                                text="Доставка почтой России"/>
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
                delAllowed: false
            };
        },
        computed: {
            ...mapGetters(["deliveryAllowed"]),
        },
        methods: {},
        watch: {
            deliveryAllowed(newVal, oldVal) {

                console.warn('deliveryAllowed', newVal)
                this.delAllowed = newVal;
            },
        },
    };
</script>

<style scoped>
</style>
