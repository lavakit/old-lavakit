import { APP_CONFIG } from './config';
import store from './../../../../../modules/user/resources/assets/js/store/index';
import { AuthMixin } from './../../../../../modules/user/resources/assets/js/mixins/auth-mixin';

let makeBaseUrl = () => {
    if (APP_CONFIG.IS_ADMIN) {
        return backendURL();
    }

    return frontendURL();
};

let backendURL = () => {
    if (APP_CONFIG.HIDE_DEFAULT_LOCALE === 1) {
        return APP_CONFIG.ADMIN_PREFIX;
    }

    return `${APP_CONFIG.CURRENT_LOCALE}/${APP_CONFIG.ADMIN_PREFIX}`;
};

let frontendURL = () => {
    if (APP_CONFIG.HIDE_DEFAULT_LOCALE === 1) {
        return '';
    }

    return `${APP_CONFIG.CURRENT_LOCALE}`;
};

let requireAuth = (to, from, next) => {
    if (APP_CONFIG.LOCAL_STORAGE.getItem(APP_CONFIG.ACCESS_TOKEN)) {
        store.dispatch(APP_CONFIG.API_URL_GET_USER);
        store.watch(store.getters[APP_CONFIG.API_URL_GET_USER], n => {
            if (store.get('user/userLoadStatus') === 2) {
                next();
            }
        });
    } else {
        next ('/auth/login');
    }
};

let requireNonAuth = (to, from, next) => {
    if (!APP_CONFIG.LOCAL_STORAGE.getItem(APP_CONFIG.ACCESS_TOKEN) ){
        next()
    } else {
        router.go(-1)
    }
};

let requireAdmin = (to, from, next) => {
    if (APP_CONFIG.LOCAL_STORAGE.getItem(APP_CONFIG.ACCESS_TOKEN)){
        // Verify the stored access token
        store.dispatch(APP_CONFIG.API_URL_GET_USER)
        store.watch(store.getters[APP_CONFIG.API_URL_GET_USER], n => {
            if( store.get('user/userLoadStatus') === 2 && AuthMixin.methods.hasRole(store.get('user/user'), 'admin')){
                next();
            } else {
                next('/403');
            }
        })
    } else {
        next('/auth/login');
    }
};

export default {
    makeBaseUrl,
    requireAdmin,
    requireAuth,
    requireNonAuth
};
