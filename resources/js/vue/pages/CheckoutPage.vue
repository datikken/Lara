<template>
    <div class="cart_check-wrapper">
        <Fizik v-if="userInfo.face === 'fizik' "/>
        <Urik v-if="userInfo.face === 'urik' "/>
    </div>
</template>

<script>
    import Fizik from '../components/checkout/Fizik'
    import Urik from '../components/checkout/Urik'
    import { mapActions, mapGetters } from 'vuex'

    export default {
        name: "CheckoutPage",
        data: function() {
            return {
                userInfo: ''
            }
        },
        components: {
            Fizik,
            Urik
        },
        methods: {
            ...mapActions([
                'GET_USERS_INFO'
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
        }
    }
</script>

<style scoped>

</style>
