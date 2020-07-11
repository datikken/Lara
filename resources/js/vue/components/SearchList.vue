<template>
    <div class="sres as-none">
        <div class="sres_wrap">
            <simplebar data-simplebar-auto-hide="true" class="sres_content">

            <div v-for="item in items" :key="item.message">

            <div class="sres_head">
                <div class="sres_head_item">
                    Цвет
                </div>
                <div class="sres_head_item">
                    Картридж
                </div>
                <div class="sres_head_item">
                    струйный принтер
                </div>
            </div>

                <SearchListItem :data="item" />
            </div>
            </simplebar>

        </div>
    </div>
</template>

<script>
    import SearchListItem from "./SearchListItem";
    import simplebar from 'simplebar-vue';

    export default {
        name: "SearchList",
        components: {
            SearchListItem,
            simplebar
        },
        created: function() {
        },
        computed: {
            items() {
                 return this.$store.getters.filteredProducts;
            }
        }
    }
</script>

<style scoped>

</style>
