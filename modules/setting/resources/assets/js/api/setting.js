import { ApiClient } from '@modules/base/resources/assets/js/client.js';

const client = new ApiClient();

export default {

    /**
     * Get data setting
     *
     * GET /api/settings/setting/setting
     */
    getSetting: function(type) {
        return client.get(route('api.settings.setting', {type: type}));
    },
}