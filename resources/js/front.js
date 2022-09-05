window.Vue = require('vue');

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// aggiungiamo l'import del file router.js
import router from "./router";
	
import App from './views/App.vue';

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
});