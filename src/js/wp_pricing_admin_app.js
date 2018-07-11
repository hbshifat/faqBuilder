import Vue from 'vue';
import VueRouter from 'vue-router';
import locale from 'element-ui/lib/locale';
import lang from 'element-ui/lib/locale/lang/en';
import routes from "./router.js";
locale.use(lang);
Vue.use(VueRouter);

window.wpPricingBus = new Vue;

// Load Your Element UI Components Here
import elementUi from 'element-ui';

Vue.use(elementUi);
import 'element-ui/lib/theme-chalk/index.css';



const router = new VueRouter({
    routes
});

import App from './AdminApp';

new Vue({
    el:'#wp_pricing_admin_app',
    router,
    render: h => h(App)
});