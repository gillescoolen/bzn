import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
import App from './views/App';
import VuexPersist from 'vuex-persist';
import router from './router';
import { modules } from './store/index';
import { StepLayout, AuthLayout, AdminLayout } from './layouts';

Vue.use(Vuex);
Vue.component('step', StepLayout);
Vue.component('auth', AuthLayout);
Vue.component('admin', AdminLayout);
Vue.prototype.$http = axios;

const persist = new VuexPersist({
  key: 'bzn',
  storage: window.localStorage
});

const store = new Vuex.Store({
  modules,
  plugins: [persist.plugin]
});

const app = new Vue({
  el: '#app',
  components: { App },
  router,
  store
});

export default app;
