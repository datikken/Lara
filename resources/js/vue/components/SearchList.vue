<template>
    <div class="sres as-none">
        <div class="sres_wrap">
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

            <div v-for="item in items" :key="item.message">
                <SearchListItem :data="item" />
            </div>

        </div>
    </div>
</template>

<script>
    import SearchListItem from "./SearchListItem";
    export default {
        name: "SearchList",
        components: {SearchListItem},
        computed: {
            items() {
                 return this.$store.getters.filteredProducts;
            }
        }
    }
</script>

<style scoped>

</style>
