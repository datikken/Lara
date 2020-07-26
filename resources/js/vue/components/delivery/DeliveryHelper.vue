<template>
    <div class="dform_wrap-col">
        <div class="dform_wrap-col_item delivery_type" id="delivery_type">
            <div class="delivery_type-item">
                <SimpleCheckbox name="selfpick" />
                <span>Самовывоз</span>
            </div>
            <div class="delivery_type-item">
                <SimpleCheckbox name="delivery" />
                <span>Доставка по Москве в пределах МКАД</span>
            </div>
            <div class="delivery_type-item">
                <SimpleCheckbox name="mkad" />
                <span>Доставка по Москве за МКАД</span>
            </div>
            <div class="delivery_type-item">
                <SimpleCheckbox name="post" />
                <span>Доставка почтой России</span>
            </div>
        </div>
    </div>
</template>

<script>
    import SimpleCheckbox from '../checkboxes/SimpleCheckbox'

    export default {
        name: "DeliveryHelper",
        components: {
            SimpleCheckbox
        }
    }
</script>

<style scoped>

</style>
