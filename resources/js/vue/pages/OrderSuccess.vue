<template>
    <Success />
</template>

<script>
    import Success from '../components/payment/Success'
    import {mapActions} from 'vuex'

    export default {
        name: "OrderSuccess",
        components: {
            Success
        },
        methods: {
            ...mapActions(['CHANGE_PROGRESS_STEP'])
        },
        mounted() {
            this.CHANGE_PROGRESS_STEP('success');
        }
    }
</script>

<style scoped>

</style>
