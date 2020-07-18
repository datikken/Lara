<template>

    <div class="filters">
        <div class="filters_wrapper">
            <FiltersItem name="Тип принтера" :filters="printers" />
            <FiltersItem name="Бренд" :filters="brand" />
            <FiltersItem name="Модель" :filters="model" />
        </div>
    </div>

</template>

<script>
    import FiltersItem from './FiltersItem'

    export default {
        name: "Filters",
        data: function() {
            return  {
                printers: ['Струный', 'Лазерный', 'Факс'],
                brand: [],
                model: []
            }
        },
        components: {
            FiltersItem
        }
    }
</script>

<style scoped>

</style>
