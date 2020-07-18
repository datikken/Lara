<template>

    <div class="filters">
        <div class="filters_wrapper">
            <FiltersItem name="Тип принтера" :filters="types" />
            <FiltersItem name="Бренд" :filters="brands" />
            <FiltersItem name="Модель" :filters="models" />
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
