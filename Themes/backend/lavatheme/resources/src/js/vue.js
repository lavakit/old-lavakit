import Vue from 'vue';
import VueI18n from 'vue-i18n';
import VueRouter from 'vue-router';
import ElementUI from 'element-ui';
import VueEvents from 'vue-events';
import locale from 'element-ui/lib/locale/lang/en';
import VueSimplemde from 'vue-simplemde';
import App from './App';
import store from '@modules/user/resources/assets/js/store';
import { APP_CONFIG } from "@modules/base/resources/assets/js/config";
import coreLavakit from '@modules/base/resources/assets/js/core';

import LoginRoutes from '@modules/user/resources/assets/js/auth';
import DashboardRoutes from '@modules/dashboard/resources/assets/js/dashboard';
import SettingRoutes from '@modules/setting/resources/assets/js/setting';

Vue.use(ElementUI, {locale});
Vue.use(VueI18n);
Vue.use(VueRouter);
Vue.use(VueEvents);
Vue.use(VueSimplemde);
require('./mixins/translation-helper');
require('./mixins/assets-helper');

const router = new VueRouter({
    mode: 'history',
    base: coreLavakit.makeBaseUrl(),
    routes: [
        ...LoginRoutes,
        ...DashboardRoutes,
        ...SettingRoutes,
    ],
});

const messages = {
    [APP_CONFIG.CURRENT_LOCALE]: APP_CONFIG.TEXT_TRANSLATION,
};

const i18n = new VueI18n({
    locale: APP_CONFIG.CURRENT_LOCALE,
    messages,
});

const app = new Vue({
    el: '#app',
    router,
    i18n,
    store: store,
    components: { App },
    template: '<App/>'
});

window.axios.interceptors.response.use(null, (error) => {
    if (error.response === undefined) {
        console.log(error);
        return;
    }

    if (error.response.status === 403) {
        app.$notify.error({
            title: 'Title unauthorized',
            message: 'Content unauthorized'
        });

        window.location =  route('admin.dashboards.index');
    }

    if (error.response.status === 401) {
        app.$notify.error({
            title: 'Title Unauthenticated',
            message: 'Content Unauthenticated',
        });

        //window.location = route('login');
    }

    return Promise.reject(error);
});
