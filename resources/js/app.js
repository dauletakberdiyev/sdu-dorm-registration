import Vue from 'vue';
import Axios from 'axios';
import front from './components/Front'

Vue.prototype.$http = Axios;

const app = new Vue({
    render:h => h(front),
}).$mount('#app');
