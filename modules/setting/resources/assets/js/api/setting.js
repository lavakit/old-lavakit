import { ApiClient } from '@modules/base/resources/assets/js/client.js';

const client = new ApiClient();

export default {

    /**
     * Get data setting
     *
     * GET /api/settings/show/setting
     */
    getSetting: function(type) {
        return client.get(route('api.settings.show', {type: type}));
    },
}