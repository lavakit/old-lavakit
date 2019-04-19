/**
 * Defines the API route we are using.
 */
const ACCESS_TOKEN = 'access_token';
let local_storage = window.localStorage;
let location = window.location;
let api_url = location.protocol + '//' + location.host + '/en/api';

export const APP_CONFIG = {
    API_URL: api_url,
    API_TIMEOUT: 1000,
    API_URL_GET_USER: '/user/getUser',
    ACCESS_TOKEN: ACCESS_TOKEN,
    LOCAL_STORAGE: local_storage,

    ADMIN_PREFIX: window.Lavakit.adminPrefix,
    IS_ADMIN: window.Lavakit.isAdmin,
    HIDE_DEFAULT_LOCALE: window.Lavakit.hideDefaultLocale,
    CURRENT_LOCALE: window.Lavakit.currentLocale,
    TEXT_TRANSLATION: window.Lavakit.textTranslations,
};