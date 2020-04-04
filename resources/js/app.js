import Vue from 'vue'
import Vuex from 'vuex'
import VueRouter from 'vue-router'
import municipalities from "./store/municipalities";
import SidebarLayout from './layouts/SidebarLayout';

Vue.use(Vuex)
Vue.use(VueRouter)
Vue.component('sidebar', SidebarLayout);

import App from './views/App'
import { Home, Admin, Users } from './pages'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/admin',
            name: 'admin',
            meta: { layout: 'sidebar' },
            component: Admin
        },
        {
            path: '/admin/users',
            name: 'users',
            meta: { layout: 'sidebar' },
            component: Users
        },
    ],
});

const store = new Vuex.Store({
    modules: {
        municipalities: municipalities,
    }
})

const app = new Vue({
    el: '#app',
    components: { App },
    router,
    store
});
