<template>
    <div class="sres as-none">
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
        components: {
            SearchListItem,
            SearchListItemHead,
            simplebar
        },
        created: function() {
           let closeState = this.$store.state.closeListener;
           let that = this;

           if(!closeState) {
               function closeSearch() {
                   if(!that.$el.classList.contains('as-none')) {
                       that.$el.classList.add('as-none');
                   }
               }

               let closeListener = document.addEventListener('click', closeSearch);

               this.$store.commit('setCloseListener', true);
           }
        },
        computed: {
            items() {
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
        top: 15px;
        right: 10px;
        z-index: 999;
    }
</style>
