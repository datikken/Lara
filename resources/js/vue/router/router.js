import VueRouter from 'vue-router'
import CheckoutPage from '../pages/CheckoutPage'
import DeliveryForm from '../pages/DeliveryForm'

const Bar = { template: '<div>bar</div>' }

const routes = [
    { path: '/', component: CheckoutPage },
    { path: '/deliveryForm', component: DeliveryForm }
]

const router = new VueRouter({
    routes: routes
})

export default router;
