<template>

    <div class="mobFilters_item" :data-type="type">
       <span class="mobFilters_item_text">
           {{ name }}
       </span>
    </div>

</template>

<script>
    export default {
        name: "MobileFiltersItem",
        props: [
            'name',
            'filters',
            'type'
        ],
    }
</script>

<style scoped>

</style>
