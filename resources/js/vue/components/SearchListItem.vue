<template>

    <div class="sres_item">
        <div class="sres_col">
            <span class="sres_col_item sres_color"></span>
        </div>
        <div class="sres_col">
            <span class="sres_col_item">{{ searchName }}</span>
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
                searchName: ''
            }
        },
        created:function() {
            let arr = this.$props.data.name.split(' ');

            this.searchName = arr[0];

            console.log(this.$props.data);
        }
    }
</script>

<style scoped>

</style>
