<template>
    <div class="sres as-none" v-bind:class="{ 'as-none': searchClosed }">
        <div class="sres_wrap">
            <div class="sres_close"></div>

            <simplebar data-simplebar-auto-hide="true" class="sres_content">

                <SearchListItemHead  v-if="items[0] && items[0].length > 0" type="Принтер струйный" />

                <div v-for="item in items[0]" :key="item.message">
                    <SearchListItem :data="item" />
                </div>

                <SearchListItemHead  v-if="items[1] && items[1].length > 0" type="Принтер лазерный" />

                <div v-for="item in items[1]" :key="item.message">
                    <SearchListItem :data="item" />
                </div>

                <SearchListItemHead v-if="items[2] && items[2].length > 0" type="Принтер матричный" />

                <div v-if="items[2] && items[2].length > 0" v-for="item in items[2]" :key="item.message">
                    <SearchListItem :data="item" />
                </div>

            </simplebar>
        </div>
    </div>
</template>

<script>
    import SearchListItem from "./SearchListItem";
    import SearchListItemHead from "./SearchListItemHead";
    import simplebar from 'simplebar-vue';

    export default {
        name: "SearchList",
        data: () => ({
            searchClosed: null
        }),
        components: {
            SearchListItem,
            SearchListItemHead,
            simplebar
        },
        created: function() {
            document.addEventListener('click', (e) => {
                if(e.currentTarget != 'sres' && !this.searchClosed) {
                    this.searchClosed = true;
                }
            })
        },
        computed: {
            items() {
                let sres = document.querySelector('.sres');
                let products = this.$store.getters.searchProducts;
                    products.forEach(prd => {
                    if(prd.length > 0) {
                            sres && sres.classList.remove('as-none');
                    }
                })

                return this.$store.getters.searchProducts;
            }
        }
    }
</script>

<style scoped>
    .sres_close {
        width: 20px;
        height: 20px;
        background-image: url('/images/icons/search_close.svg');
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        position: absolute;
        top: 12px;
        right: 10px;
        z-index: 999;
        cursor: pointer;
    }
</style>
