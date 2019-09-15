import { APP_CONFIG } from "@modules/base/resources/assets/js/config";
import axios from '@packages/axios';

const getClient = () => {
    const instance = axios.create({
        baseURL: APP_CONFIG.API_URL,
        timeout: APP_CONFIG.API_TIMEOUT,
        headers: {
            'Accept':'application/json',
            'Authorization': 'Bearer ' + APP_CONFIG.LOCAL_STORAGE.getItem(APP_CONFIG.ACCESS_TOKEN),
        }
    });

    instance.interceptors.response.use(null, (error) => {
        return Promise.reject(error);
    });

    return instance;
};

class ApiClient {
    constructor() {
        this.client = getClient();
    }

    get(url, conf = {}) {
        return this.client.get(url, conf)
            .then(response => Promise.resolve(response))
            .catch(error => Promise.reject(error));
    }
}

export { ApiClient };

/**
 * Base HTTP Client
 */
export default {

    get(url, conf = {}) {
        return getClient().get(url, conf)
            .then(response => Promise.resolve(response))
            .catch(error => Promise.reject(error));
    },

}