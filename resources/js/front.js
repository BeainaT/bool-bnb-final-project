window.Vue = require('vue');

import Vue from 'vue';
import App from './views/App.vue';

const app = new Vue({
    el: '#app',
    render: h=> h(App)
})