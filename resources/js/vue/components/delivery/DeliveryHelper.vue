<template>
    <div class="dform_wrap-col">
        <div class="dform_wrap-col_item delivery_type" id="delivery_type">

            <DeliveryHelperItem name="self" text="Самовывоз" />
            <DeliveryHelperItem name="deliveryMkad" text="Доставка по Москве в пределах МКАД" />
            <DeliveryHelperItem name="delivery" text="Доставка по Москве за МКАД" />
            <DeliveryHelperItem name="post" text="Доставка почтой России" />

        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex'
    import DeliveryHelperItem from './DeliveryHelperItem'

    export default {
        name: "DeliveryHelper",
        components: {
            DeliveryHelperItem
        },
        data: function() {
            return {
                deliveryTypeError: false
            }
        },
        computed: {
            ...mapGetters([
                'deliveryType'
            ])
        },
        methods: { }
    }
</script>

<style scoped>

</style>
