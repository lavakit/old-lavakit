import { APP_CONFIG } from './config';

let makeBaseUrl = () => {
    if (APP_CONFIG.IS_ADMIN) {
        return backendURL();
    }

    return frontendURL();
};

let backendURL = () => {
    if (APP_CONFIG.HIDE_DEFAULT_LOCALE == 1) {
        return APP_CONFIG.ADMIN_PREFIX;
    }

    return `${APP_CONFIG.CURRENT_LOCALE}/${APP_CONFIG.ADMIN_PREFIX}`;
};

let frontendURL = () => {
    if (APP_CONFIG.HIDE_DEFAULT_LOCALE == 1) {
        return '';
    }

    return `${APP_CONFIG.CURRENT_LOCALE}`;
};

export default {
    makeBaseUrl
};
