import Vue from 'vue';
import Axios from 'axios';
import router from './router/index';
import App from './App.vue';

// Axios.defaults.baseURL = window.configs.baseURL + window.configs.api
Axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('access_token');
Axios.defaults.headers.common['Content-Type'] = 'application/json';
// Axios.defaults.headers.common['Content-Language'] = i18n.locale;

Vue.prototype.$http = Axios;

const app = new Vue({
    render:h => h(App),
    router
}).$mount('#app');
