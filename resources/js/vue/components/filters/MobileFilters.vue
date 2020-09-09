<template>
    <div>
        <div class="mobFilters">
            <MobileFiltersItem name="Тип принтера" :filters="1" type="printertype" @click.native="showHide" />
            <MobileFiltersItem name="Бренд" :filters="2" type="brand" @click.native="showHide" />
            <MobileFiltersItem name="Модель" :filters="3" type="model" @click.native="showHide" />
        </div>

        <div class="mobFilters_results as-none" data-mobFilter-list>
            <div class="mobFilters_results_item mobFilters_active">
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
            showHide(e) {
                let list = this.$el.querySelector('[data-mobFilter-list]');
                    list.classList.toggle('as-none');

                    console.warn('show hide executed');
            },
        },
        computed: {

        }
    }
</script>

<style scoped>

</style>
