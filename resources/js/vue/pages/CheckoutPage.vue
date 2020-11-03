<template>
    <div class="cart_check-wrapper">
        <Loader v-if="!this.$store.state.user"/>

        <Fizik v-if="this.userFace && this.userFace === 'fizik' "/>
        <Urik v-if="this.userFace && this.userFace === 'urik' "/>

        <OrderList v-if="this.$store.state.user"/>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex'
    import Fizik from '../components/checkout/Fizik'
    import Urik from '../components/checkout/Urik'
    import Loader from '../components/loader/Loader'
    import OrderList from '../components/orders/OrdersList'

    export default {
        name: "CheckoutPage",
        data: function () {
            return {
                userFace: null
            }
        },
        components: {
            Fizik,
            Urik,
            Loader,
            OrderList,
        },
        methods: {
            ...mapActions([
                'GET_USERS_INFO',
                'CHANGE_PROGRESS_STEP'
            ]),
        },
        computed: {
            ...mapGetters(['user'])
        },
        watch: {
            user(newVal, oldVal) {
                if (newVal) {
                    this.userFace = newVal;
                }
            }
        },
        created() {
            this.userFace = this.$store.state.user;

            if(!this.userFace) {
                this.GET_USERS_INFO();
            }

            console.warn('main2', this.$store.state.user);

            this.CHANGE_PROGRESS_STEP(1);
        }
    }
</script>

<style scoped>
    .cart_check-wrapper {
        display: flex;
    }
</style>
