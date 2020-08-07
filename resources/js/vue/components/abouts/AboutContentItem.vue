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

                <a class="aboutc_prgf" uk-toggle="target: #modal-close-default" @click="getSelectedYearInfo">{{ cont.heading }}</a>

                <i class="aboutc_search" v-if="(ind % 2 != 0)"></i>
            </div>

        </div>

        <AboutModal />

    </div>
</template>

<script>
    import AboutModal from './AboutModal.vue'

    export default {
        name: "AboutContentItem",
        props: ['data'],
        components: {
            AboutModal
        },
        methods: {
            getSelectedYearInfo() {

            }
        }
    }
</script>

<style scoped>

</style>
