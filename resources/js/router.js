import Vue from "vue";

import VueRouter from "vue-router";
import Resturants from './pages/Resturants';
import Home from './pages/Home';
import ResturantMenu from './pages/ResturantMenu';
import Checkout from './pages/Checkout';
Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        {path: '/', name: 'home', component: Home},
        { path: '/resturants', name: 'resturants', component: Resturants },
        {path: '/resturants/:slug', name: 'resturantMenu', component: ResturantMenu },

        {path: '/checkout', name: 'checkout', component:Checkout }
    ]
});



export default router;
