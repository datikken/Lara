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
                let newFil = [];
                let types = this.$store.state.typeFilters;
                let newFilters = types.map(el => {
                    let arr = el.split(' ');
                        newFil.push(arr[1]);
                });

                return newFil;
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
