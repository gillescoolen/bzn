import './bootstrap';
import Vue from 'vue'
import Vuex from 'vuex'
import VueRouter from 'vue-router'
import municipalities from "./store/municipalities";
import '../sass/app.scss'

Vue.use(Vuex)
Vue.use(VueRouter)

import App from './views/App'
import Home from './pages/Home'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
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
