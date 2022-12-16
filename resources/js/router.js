import Vue from "vue";

import VueRouter from "vue-router";
import Resturants from './pages/Resturants';
import Home from './pages/Home';
import ResturantMenu from './pages/ResturantMenu';
import CarrelloPage from './pages/CarrelloPage';
Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        {path: '/', name: 'home', component: Home},
        { path: '/resturants', name: 'resturants', component: Resturants },
        {path: '/resturants/:slug', name: 'resturantMenu', component: ResturantMenu },
        {
            path:'/cart', name: 'cart', component:CarrelloPage, params:{ name: 'plates' }
        },

        {path: '/checkout', name: 'checkout' }
    ]
});



export default router;
