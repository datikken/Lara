<template>
    <div class="filters_wrapper-item" :data-type="type">
        <div class="filters_wrapper-item_label pb16" data-FiltersToggler @click="openFilter">
            <div class="filters_wrapper-item_text">
                <span>{{ name }}</span>
            </div>
            <img src="/images/icons/arrow_right.svg" alt="icon" />
        </div>

        <ul class="filters_wrapper-item_list as-none">
            <li class="filters_wrapper-item_list-text" v-for="filter in this.$props.filters" @click="setChecked">
                <span class="filters_wrapper-item_list-text_val">{{ filter }}</span>
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
            'filters',
            'type'
        ],
        components: {
            SimpleCheckbox
        },
        created() {
            console.warn(this.$props,'filters item created')
        },
        methods: {
            collectAplliedFilters() {
                let filterBlocks = document.querySelectorAll('.filters_wrapper-item');
                let data = {};

                    filterBlocks.forEach((block) => {
                        let val;
                        let type = block.getAttribute('data-type');
                        let selected = block.querySelector('.active_filter');

                        if(selected) {
                            val = selected.querySelector('.filters_wrapper-item_list-text_val').innerText;
                        }

                        if(val) {
                            data[type] = val;
                        }
                    });

                this.$store.dispatch('FILTER_PRODUCTS', data);
            },
            clearFilters() {
                let allOptions = this.$el.querySelectorAll('.filters_wrapper-item_list-text');
                allOptions.forEach((el) => {
                    el.classList.remove('bold');
                    el.classList.remove('active_filter');
                    let arrow = el.querySelector('.checkbox-wrap_arrow');
                    arrow.classList.add('invisible');
                })
            },
            setChecked(e) {
                let clicked = e.currentTarget;
                let arrow = clicked.querySelector('.checkbox-wrap_arrow');

                if(!clicked.classList.contains('active_filter')) {
                    this.clearFilters();

                    arrow.classList.remove('invisible');
                    clicked.classList.add('bold');
                    clicked.classList.add('active_filter');
                } else {
                    this.clearFilters();
                }

                this.collectAplliedFilters();
            },
            openFilter() {
                let label = this.$el.querySelector('.filters_wrapper-item_label');
                    label.classList.toggle('pb16');

                let ul = this.$el.querySelector('.filters_wrapper-item_list');
                    ul.classList.toggle('as-none');
            }
        }
    }
</script>

<style scoped>

</style>
