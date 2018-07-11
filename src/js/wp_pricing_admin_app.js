import Vue from 'vue';
import VueRouter from 'vue-router';
import locale from 'element-ui/lib/locale';
import lang from 'element-ui/lib/locale/lang/en';
import routes from "./router.js";
locale.use(lang);
Vue.use(VueRouter);

window.wpPricingBus = new Vue;

// Load Your Element UI Components Here
import {
    Table,
    TableColumn,
    ColorPicker,
    ButtonGroup,
    Button,
    Switch,
    Select,
    Option,
    Input,
    Dialog,
    Notification,
    Loading,
    Popover,
    Pagination
} from 'element-ui';

Vue.use(Table);
Vue.use(TableColumn);
Vue.use(ColorPicker);
Vue.use(ButtonGroup);
Vue.use(Button);
Vue.use(Switch);
Vue.use(Select);
Vue.use(Option);
Vue.use(Input);
Vue.use(Dialog);
Vue.use(Popover);
Vue.use(Pagination);

Vue.use(Loading.directive);
Vue.prototype.$loading = Loading.service;
Vue.prototype.$notify = Notification;

import 'element-ui/lib/theme-chalk/table.css';
import 'element-ui/lib/theme-chalk/table-column.css';
import 'element-ui/lib/theme-chalk/color-picker.css';
import 'element-ui/lib/theme-chalk/button-group.css';
import 'element-ui/lib/theme-chalk/button.css';
import 'element-ui/lib/theme-chalk/switch.css';
import 'element-ui/lib/theme-chalk/select-dropdown.css';
import 'element-ui/lib/theme-chalk/option.css';
import 'element-ui/lib/theme-chalk/select.css';
import 'element-ui/lib/theme-chalk/input.css';
import 'element-ui/lib/theme-chalk/dialog.css';
import 'element-ui/lib/theme-chalk/notification.css';
import 'element-ui/lib/theme-chalk/loading.css';
import 'element-ui/lib/theme-chalk/popover.css';
import 'element-ui/lib/theme-chalk/pagination.css';


const router = new VueRouter({
    routes
});

import App from './AdminApp';

new Vue({
    el:'#wp_pricing_admin_app',
    router,
    render: h => h(App)
});