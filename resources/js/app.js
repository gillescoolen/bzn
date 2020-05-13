import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import App from './views/App'
import VueRouter from 'vue-router'
import VuexPersist from 'vuex-persist'
import { modules } from "./store/index";
import { StepLayout, AdminLayout } from './layouts';
import { Admin, Config, Intro, Users, Questions, Registrations, Municipalities, Tasks, GuideTypes } from './pages'

Vue.use(Vuex)
Vue.use(VueRouter)
Vue.component('admin', AdminLayout);
Vue.component('step', StepLayout);

Vue.prototype.$http = axios;

const router = new VueRouter({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'intro',
      meta: { layout: 'step' },
      component: Intro
    },
    {
      path: '/config',
      name: 'config',
      meta: { layout: 'step' },
      component: Config
    },
    {
      path: '/tasks',
      name: 'tasks',
      meta: { layout: 'step' },
      component: Tasks
    },
    {
      path: '/guide-types',
      name: 'guide-types',
      meta: { layout: 'step' },
      component: GuideTypes
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
    },
    {
      path: '/admin/registrations',
      name: 'registrations',
      meta: { layout: 'admin' },
      component: Registrations
    }
  ],
});

const persist = new VuexPersist({
  key: 'bzn',
  storage: window.localStorage
})

const store = new Vuex.Store({
  modules,
  plugins: [persist.plugin]
})

const app = new Vue({
  el: '#app',
  components: { App },
  router,
  store
});