import Vue from 'vue';
import VueI18n from 'vue-i18n';
import VueRouter from 'vue-router';
import ElementUI from 'element-ui';
import locale from 'element-ui/lib/locale/lang/en';

Vue.use(ElementUI, {locale});
Vue.use(VueI18n);
Vue.use(VueRouter);

Vue.component('vue-screen-full', require('./compoments/Screenfull'));

const currentLocale = window.Lavakit.currentLocale;
const adminPrefix = window.Lavakit.adminPrefix;

function makeBaseUrl() {
    if (window.Lavakit.hideDefaultLocale == 1) {
        return adminPrefix;
    }
    return `${currentLocale}/${adminPrefix}`;
}

const router = new VueRouter({
    mode: 'history',
    base: makeBaseUrl(),
    router: [

    ],
});

const messages = {
    [currentLocale]: window.Lavakit.textTranslations,
};

const i18n = new VueI18n({
    locale: currentLocale,
    messages,
});

const app = new Vue({
    el: '#app',
    router,
    i18n,
});
