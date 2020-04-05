import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import App from './views/App'
import VueRouter from 'vue-router'
import { modules } from "./store/index";
import AdminLayout from './layouts/AdminLayout';
import { Home, Admin, Users, Questions, Municipalities } from './pages'

Vue.use(Vuex)
Vue.use(VueRouter)
Vue.component('admin', AdminLayout);

Vue.prototype.$http = axios;

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
            meta: { layout: 'admin' },
            component: Admin
        },
        {
            path: '/admin/questions',
            name: 'questions',
            meta: { layout: 'admin' },
            component: Questions
        },
        {
            path: '/admin/municipalities',
            name: 'municipalities',
            meta: { layout: 'admin' },
            component: Municipalities
        },
        {
            path: '/admin/users',
            name: 'users',
            meta: { layout: 'admin' },
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