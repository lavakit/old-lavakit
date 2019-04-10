/**
 * Defines the API route we are using.
 */
let location = window.location;
let api_url = location.protocol + '//' + location.host + 'api';

export const APP_CONFIG = {
    API_URL: api_url,
    API_TIMEOUT: 1000,
};