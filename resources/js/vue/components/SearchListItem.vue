<template>

    <div class="sres_item">
        <div class="sres_col">
            <span class="sres_col_item sres_color"></span>
        </div>
        <div class="sres_col">
            <span class="sres_col_item">{{ data.id }}</span>
        </div>
        <div class="sres_col">
            <span class="sres_col_item">HP LaserJet</span>
            <span class="sres_col_item">P1102 1102w</span>
        </div>
    </div>

</template>

<script>
    export default {
        name: "SearchListItem",
        props: ['data']
    }
</script>

<style scoped>

</style>
