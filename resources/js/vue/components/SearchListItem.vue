<template>

    <div class="sres_item">
        <div class="sres_col">
            <span class="sres_col_item sres_color"></span>
        </div>
        <div class="sres_col">
            <span class="sres_col_item">{{ data.params.art }}</span>
        </div>
        <div class="sres_col_inner">

            <div class="sres_col_inner_item" v-for="(item, index) in data.cape">
                <span class="sres_col_item">{{ index }}</span>
                <span class="sres_col_item">{{ item }}</span>
            </div>

        </div>
    </div>

</template>

<script>
    export default {
        name: "SearchListItem",
        props: ['data'],
        data: function (){
            return {

            }
        },
        created:function() { }
    }
</script>

<style scoped>

</style>
