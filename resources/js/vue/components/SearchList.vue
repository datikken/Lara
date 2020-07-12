<template>
    <div class="sres as-none">
        <div class="sres_wrap">
            <simplebar data-simplebar-auto-hide="true" class="sres_content">

                <div v-for="item in items" :key="item.message">
                    <SearchListItemHead :type="item.params.type"/>
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
                 return this.$store.getters.filteredProducts;
            }
        }
    }
</script>

<style scoped>

</style>
