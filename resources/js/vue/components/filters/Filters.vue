<template>

    <div class="filters">

        <div class="filters_wrapper">
            <div class="filters_tip" @click="showHide"></div>

                <Dropdown />

            <FiltersItem name="Тип принтера" :filters="types" type="printertype" />
            <FiltersItem name="Бренд" :filters="brands" type="brand" />
            <FiltersItem name="Модель" :filters="models" type="model" />
        </div>
    </div>

</template>

<script>
    import FiltersItem from './FiltersItem'
    import Dropdown from './Dropdown'

    export default {
        name: "Filters",
        data: function() {
            return  {
            }
        },
        components: {
            FiltersItem,
            Dropdown
        },
        methods: {
            showHide() {
                this.$children[0].showHideHandler();
            }
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
