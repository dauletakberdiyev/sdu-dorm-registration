import Vue from 'vue';
import Axios from 'axios';
import router from './router/index';
import App from './App.vue';
import Role from './mixins/Role';
import SideBar from './components/AdminSideBar';

require('lang.js');
import VueLang from '@eli5/vue-lang-js';
import translations from './vue-translations.js';

Vue.use(VueLang, {
    messages: translations, // Provide locale file
    locale: 'kz', // Set locale
    fallback: 'en' // Set fallback locale
});

// localStorage.setItem('locale', 'kz');

Axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('access_token');
Axios.defaults.headers.common['Content-Type'] = 'application/json';
Axios.defaults.headers.common['Content-Language'] = 'kz';

// Axios.interceptors.request.use(function(config) {
//     config.headers['Content-Language'] = Vue.prototype.$lang.getLocale();
//     console.log(Vue.prototype.$lang.getLocale());
//     return config;
// });

Vue.prototype.$http = Axios;
Vue.mixin(Role);
Vue.component('side-bar', SideBar);

const app = new Vue({
    render:h => h(App),
    router
}).$mount('#app');


