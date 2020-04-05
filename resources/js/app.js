import Vue from 'vue'
import Vuex from 'vuex'
import { modules } from "./store/index";
import VueRouter from 'vue-router'
import SidebarLayout from './layouts/SidebarLayout';

Vue.use(Vuex)
Vue.use(VueRouter)
Vue.component('sidebar', SidebarLayout);

import App from './views/App'
import { Home, Admin, Users, Questions, Municipalities } from './pages'

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
            path: '/admin/questions',
            name: 'questions',
            meta: { layout: 'sidebar' },
            component: Questions
        },
        {
            path: '/admin/municipalities',
            name: 'municipalities',
            meta: { layout: 'sidebar' },
            component: Municipalities
        },
        {
            path: '/admin/users',
            name: 'users',
            meta: { layout: 'sidebar' },
            component: Users
        }
    ],
});

const store = new Vuex.Store({
    modules
})

const app = new Vue({
    el: '#app',
    components: { App },
    router,
    store
});
