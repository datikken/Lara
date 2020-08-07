<template>
    <div>
        <div class="aboutc_wrap_head" v-if="data.year_contents.length > 0">
            <div class="aboutc_year">
                {{ data.year.year }}
            </div>
            <div class="aboutc_line"></div>
        </div>
        <div class="aboutc_cols">

            <div class="aboutc_row" v-for="(cont, ind) in data.year_contents" :class="{'right_row': (ind % 2 != 0)}">
                <i class="aboutc_search" v-if="(ind % 2 === 0)"></i>
                <p class="aboutc_prgf">{{ cont.heading }}</p>
                <i class="aboutc_search" v-if="(ind % 2 != 0)"></i>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "AboutContentItem",
        props: ['data']
    }
</script>

<style scoped>

</style>
