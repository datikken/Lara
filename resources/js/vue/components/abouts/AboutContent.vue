<template>
    <div class="aboutc">
        <div class="aboutc_wrap">
            <AboutContentItem v-for="item in this.lastTwoYearsInfo" :data="item" />
        </div>
    </div>
</template>

<script>
    import AboutContentItem from './AboutContentItem'
    import {mapActions, mapGetters} from 'vuex'

    export default {
        name: "AboutContent",
        components: {
            AboutContentItem
        },
        computed: {
            ...mapGetters(['lastTwoYearsInfo'])
        },
        methods: {
            ...mapActions(['GET_TWO_YEARS_INFO_BY_SELECT'])
        },
        created() {
            this.GET_TWO_YEARS_INFO_BY_SELECT('2020');
        }
    }
</script>

<style scoped>

</style>
