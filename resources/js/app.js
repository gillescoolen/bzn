import Vue from 'vue'
import Vuex from 'vuex'
import VueRouter from 'vue-router'
import municipalities from "./store/municipalities";

Vue.use(Vuex)
Vue.use(VueRouter)

import App from './views/App'
import Home from './pages/Home'
import Admin from './pages/Admin'

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
            component: Admin
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
