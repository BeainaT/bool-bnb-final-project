window.Vue = require('vue');
window.Vue = require('axios');
// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Vue from 'vue';
import App from './views/App.vue';
import router from './router';

const app = new Vue({
    el: '#app',
    render: h=> h(App), router
})