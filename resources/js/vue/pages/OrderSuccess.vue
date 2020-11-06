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
        mounted() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    }
</script>

<style scoped>

</style>
