/**
 * Defines the API route we are using.
 */
let location = window.location;
let api_url = location.protocol + '//' + location.host + 'api';

export const APP_CONFIG = {
    API_URL: api_url,
    API_TIMEOUT: 1000,
    ADMIN_PREFIX: window.Lavakit.adminPrefix,
    IS_ADMIN: window.Lavakit.isAdmin,
    HIDE_DEFAULT_LOCALE: window.Lavakit.hideDefaultLocale,
    CURRENT_LOCALE: window.Lavakit.currentLocale,
    TEXT_TRANSLATION: window.Lavakit.textTranslations,
};