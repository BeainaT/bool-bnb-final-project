import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(Vue.VueRouter);

import BaseMain from './components/macro/BaseMain.vue';
import SearchPage from './components/pages/SearchPage';

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: BaseMain
        },
        {
            path: "/search",
            name: "search",
            component: SearchPage
        },
    ]
});

export default router