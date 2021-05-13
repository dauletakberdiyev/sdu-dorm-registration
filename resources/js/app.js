import Vue from 'vue';
import Axios from 'axios';
import router from './router/index';
import App from './App.vue';
import Role from './mixins/Role';
import SideBar from './components/AdminSideBar';

require('lang.js');
import VueLang from '@eli5/vue-lang-js';
import translations from './vue-translations.js';

// Axios.defaults.baseURL = window.configs.baseURL + window.configs.api
Axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('access_token');
Axios.defaults.headers.common['Content-Type'] = 'application/json';
// Axios.defaults.headers.common['Content-Language'] = i18n.locale;

Vue.prototype.$http = Axios;
Vue.mixin(Role);
Vue.component('side-bar', SideBar);

Vue.use(VueLang, {
    messages: translations, // Provide locale file
    locale: 'en', // Set locale
    fallback: 'en' // Set fallback locale
});

const app = new Vue({
    render:h => h(App),
    router
}).$mount('#app');


