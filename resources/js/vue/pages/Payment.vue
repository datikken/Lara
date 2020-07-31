<template>

    <div class="payments_wrapper">
        <Payments />
        <OrdersList/>
    </div>

</template>

<script>
    import OrdersList from "../components/orders/OrdersList"
    import Payments from "../components/payment/Payments"

    export default {
        name: "Payment",
        components: {
            OrdersList,
            Payments
        }
    }
</script>

<style scoped>

</style>
