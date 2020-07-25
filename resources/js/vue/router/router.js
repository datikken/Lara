import VueRouter from 'vue-router'
import CheckoutPage from '../pages/CheckoutPage'

const Bar = { template: '<div>bar</div>' }

const routes = [
    { path: '/', component: CheckoutPage },
    { path: '/bar', component: Bar }
]

const router = new VueRouter({
    routes: routes
})

export default router;
