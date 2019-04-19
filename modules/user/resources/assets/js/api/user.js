import { APP_CONFIG } from '@modules/base/resources/assets/js/config';

export default {
    /*
      GET /api/user
      To get user information
     */

    getUser: function () {
        const instance = axios.create({
            baseURL: APP_CONFIG.API_URL,
            timeout: APP_CONFIG.API_TIMEOUT,
            header: {'Authorization': 'Bearer ' + window.localStorage.getItem('access_token')}
        });

        return instance.get('/auth/getUser');
    },
}