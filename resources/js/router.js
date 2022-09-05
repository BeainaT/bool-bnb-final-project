import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./pages/Home.vue";
import Page404 from "./pages/Page404.vue";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home,
        },
        {
            path: "/*",
            name: "page-404",
            component: Page404,
        }
    ]
});

export default router;