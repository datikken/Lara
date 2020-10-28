<template>
    <div class="cart_check-wrapper">

        <Loader v-if="!this.$store.state.user"/>

        <Fizik v-if="this.userInfo.user && this.userInfo.user[0].face === 'fizik' "/>
        <Urik v-if="this.userInfo.user && this.userInfo.user[0].face === 'urik' "/>

        <OrderList v-if="this.$store.state.user" />

    </div>
</template>

<script>
    import Fizik from '../components/checkout/Fizik'
    import Urik from '../components/checkout/Urik'
    import { mapActions, mapGetters } from 'vuex'
    import Loader from '../components/loader/Loader'
    import OrderList from '../components/orders/OrdersList'
    import store from '../store/store';


    export default {
        name: "CheckoutPage",
        data: function() {
            return {
                userInfo: false
            }
        },
        components: {
            Fizik,
            Urik,
            Loader,
            OrderList
        },
        methods: {
            ...mapActions([
                'GET_USERS_INFO',
                'CHANGE_PROGRESS_STEP'
            ]),
        },
        computed: {
            ...mapGetters([
                'user'
            ])
        },
        watch: {
            user(newVal, oldVal) {
                this.userInfo = newVal;
            }
        },
        created() {
            this.GET_USERS_INFO();
            this.CHANGE_PROGRESS_STEP();
        }
    }
</script>

<style scoped>
    .cart_check-wrapper {
        display: flex;
    }
</style>
