<template>
    <div class="order_items_container">
        <div class="history_wrapper-item_row order_items" v-for="item in order">
            <div class="history_wrapper-item_row-info">
                <span class="history_wrapper-item_row-item_val">
                    {{ item.id }}
                </span>
            </div>
            <div class="history_wrapper-item_row-info">
                <span class="history_wrapper-item_row-item_val">
                    {{ item.item_name }}
                </span>
            </div>

            <div class="history_wrapper-item_row-info">
                <span class="history_wrapper-item_row-item_val">
                    {{ item.quantity }}
                </span>
            </div>
            <div class="history_wrapper-item_row-info">
                <span class="history_wrapper-item_row-item_val">
                    {{ item.item_price * item.quantity }}
                </span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "LastOrder",
        props: ['order']
    }
</script>

<style scoped>

</style>
