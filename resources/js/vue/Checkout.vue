<template>
    <div>
        <CartNav/>
        <router-view>
        </router-view>
    </div>
</template>

<script>
    import CartNav from './components/nav/CartNav'
    export default {
        name: "Checkout",
        components: {
            CartNav
        }
    }
</script>

<style scoped>

</style>
