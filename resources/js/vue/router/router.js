import VueRouter from 'vue-router'
import CheckoutPage from '../pages/CheckoutPage'
import DeliveryForm from '../pages/DeliveryForm'
import Payment from '../pages/Payment'

const Bar = { template: '<div>bar</div>' }

const routes = [
    { path: '/', component: CheckoutPage },
    { path: '/deliveryForm', component: DeliveryForm },
    { path: '/payments', component: Payment }
]

const router = new VueRouter({
    routes: routes
})

export default router;
