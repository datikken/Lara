<template>

    <div class="filters">
        <div class="filters_wrapper">
            <FiltersItem name="Тип принтера" :filters="types" type="printertype" />
            <FiltersItem name="Бренд" :filters="brands" type="brand" />
            <FiltersItem name="Модель" :filters="models" type="art" />
        </div>
    </div>

</template>

<script>
    import FiltersItem from './FiltersItem'

    export default {
        name: "Filters",
        data: function() {
            return  {
            }
        },
        components: {
            FiltersItem
        },
        computed: {
            types() {
                return this.$store.state.typeFilters
            },
            brands() {
                return this.$store.state.brandFilters
            },
            models() {
                return this.$store.state.modelFilters
            }
        }
    }
</script>

<style scoped>

</style>
