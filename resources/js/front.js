window.Vue = require('vue');
window.axios = require('axios');
// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Vue from 'vue';
import App from './views/App.vue';

const app = new Vue({
    el: '#app',
    render: h=> h(App)
})