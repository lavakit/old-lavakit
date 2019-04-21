import { APP_CONFIG } from "@modules/base/resources/assets/js/config";

export default {
    /**
     * Logout
     *
     * POST /api/auth/logout
     */
    logout: function() {
        const instance = axios.create({
            baseURL: APP_CONFIG.API_URL,
            timeout: APP_CONFIG.API_TIMEOUT,
            headers: {
                'Accept':'application/json',
                'Authorization': 'Bearer ' + APP_CONFIG.LOCAL_STORAGE.getItem(APP_CONFIG.ACCESS_TOKEN),
            }
        });

        return instance.get('/auth/logout');
    }
}