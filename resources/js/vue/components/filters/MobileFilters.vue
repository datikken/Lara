<template>
    <div class="mobFilters">
        <MobileFiltersItem name="Тип принтера" :filters="types" type="printertype" />
        <MobileFiltersItem name="Бренд" :filters="types" type="brand" />
        <MobileFiltersItem name="Модель" :filters="types" type="model" />


        <div class="mobFilters_results">
            <div class="mobFilters_results_item">
                <SimpleCheckbox />
                <span class="mobFilters_results_item_text">Лазерные</span>
            </div>
            <div class="mobFilters_results_item">
                <SimpleCheckbox />
                <span class="mobFilters_results_item_text">Струйные</span>
            </div>
        </div>
    </div>

</template>

<script>
    import MobileFiltersItem from './MobileFiltersItem';
    import SimpleCheckbox from '../checkboxes/SimpleCheckbox';

    export default {
        name: "MobileFilters",
        components: {
            MobileFiltersItem,
            SimpleCheckbox
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
