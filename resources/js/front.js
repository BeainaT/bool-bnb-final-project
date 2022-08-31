windows.Vue = require('vue');

import Vue from 'vue';
import App from './views/App.vue';

const app = new Vue({
    el: '#App',
    render: h=> h(App)
})