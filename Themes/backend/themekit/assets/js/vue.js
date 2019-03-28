import Vue from 'vue';
import VueRouter from 'vue-router';
import ElementUI from 'element-ui';
import locale from 'element-ui/lib/locale/lang/en';

Vue.use(ElementUI, { locale });
Vue.use(VueRouter, { locale });


require('./mixins');