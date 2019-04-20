import { APP_CONFIG } from '@modules/base/resources/assets/js/config';

import axios from '@packages/axios';

export default {
    /*
      GET /api/user
      To get user information
     */

    getUser: function () {
        const instance = axios.create({
            baseURL: APP_CONFIG.API_URL,
            timeout: APP_CONFIG.API_TIMEOUT,
            headers: {
                'Accept':'application/json',
                'Authorization': 'Bearer ' + window.localStorage.getItem('access_token'),
            }
        });

        return instance.get('/auth/getUser');
    },
}