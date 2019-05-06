/**
 * Defines the API route we are using.
 */
const ACCESS_TOKEN = 'access_token';
let local_storage = window.localStorage;
let location = window.location;
let api_url = location.protocol + '//' + location.host;
const LOCALES = window.Lavakit.locales;
const CURRENT_LOCALE = window.Lavakit.currentLocale;

let makeApiUrl = () => {
    if (window.Lavakit.hideDefaultLocale == 1) {
        return api_url + '/api';
    }

    return api_url + '/' + `${window.Lavakit.currentLocale}` + '/api';
};

export const APP_CONFIG = {
    API_URL: makeApiUrl(),
    API_TIMEOUT: 10000,
    API_URL_GET_USER: '/user/getUser',
    ACCESS_TOKEN: ACCESS_TOKEN,
    LOCAL_STORAGE: local_storage,

    ADMIN_PREFIX: window.Lavakit.adminPrefix,
    LOCALES: LOCALES,
    HIDE_DEFAULT_LOCALE: window.Lavakit.hideDefaultLocale,
    CURRENT_LOCALE: CURRENT_LOCALE,
    TEXT_TRANSLATION: window.Lavakit.textTranslations,
};


export {LOCALES, CURRENT_LOCALE};