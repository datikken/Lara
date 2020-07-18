<template>
    <div class="filters_wrapper-item">
        <div class="filters_wrapper-item_label pb16" data-FiltersToggler @click="openFilter">
            <div class="filters_wrapper-item_text">
                <span>{{ name }}</span>
            </div>
            <img src="/images/icons/arrow_right.svg" alt="icon" />
        </div>

        <ul class="filters_wrapper-item_list as-none">
            <li class="filters_wrapper-item_list-text" v-for="filter in this.$props.filters">
                <span>Фильтр</span>
                <SimpleCheckbox />
            </li>
        </ul>
    </div>
</template>

<script>
    import SimpleCheckbox from '../checkboxes/SimpleCheckbox';

    export default {
        name: "FiltersItem",
        props: [
            'name',
            'filters'
        ],
        components: {
            SimpleCheckbox
        },
        methods: {
            openFilter() {
                let label = this.$el.querySelector('.filters_wrapper-item_label');
                    label.classList.toggle('pb16');

                let ul = this.$el.querySelector('.filters_wrapper-item_list');
                    ul.classList.toggle('as-none');
            }
        },
    }
</script>

<style scoped>

</style>
