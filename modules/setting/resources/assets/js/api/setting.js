import { ApiClient } from '@modules/base/resources/assets/js/client.js';

const client = new ApiClient();

export default {
    /**
     * Get data general setting
     *
     * GET /api/setting/general
     */
    getSettingGeneral: function() {
        return client.get(route('api.settings.general'));
    },

    /**
     * Get data email setting
     *
     * GET /api/setting/email
     */
    getSettingEmail: function() {
        return client.get(route('api.settings.email'));
    },
}