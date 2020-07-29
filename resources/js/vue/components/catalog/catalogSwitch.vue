<template>
    <div class="catalogSwitch">
        <div class="catalogSwitch_wrap">
            <div class="catalogSwitch_item" @click="filterProductsByPrice"><span class="catalogSwitch_text">по цене</span></div>
            <div class="catalogSwitch_item catalogSwitch_item-filter" data-orderIcon @click="filterProductsByPrice"></div>
            <div class="catalogSwitch_item catalogSwitch_item-list"></div>
            <div class="catalogSwitch_item catalogSwitch_item-grid"></div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "catalogSwitch",
        data: function() {
            return {
                descending: true
            }
        },
        methods: {
            filterProductsByPrice() {
                if(this.descending === true) {
                    this.$store.dispatch('PRICE_FILTER', 'desc');
                    this.descending = false;
                } else {
                    this.$store.dispatch('PRICE_FILTER', 'asc');
                    this.descending = true;
                }

                this.rotateIcon();
            },
            rotateIcon() {
                let icon = this.$el.querySelector('[data-orderIcon]');
                    icon.classList.toggle('rotate180');
            }
        }
    }
</script>
