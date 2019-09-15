import { LOCALES } from '@modules/base/resources/assets/js/config';
import LavakitSetting from './components/Setting';

export default [
    {
        path: 'settings/show/:type',
        name: 'admin.settings.show',
        component: LavakitSetting,
        props: {
            locales: LOCALES,
        },
        meta: {
            breadcrumb: 'setting::setting.page_title.setting'
        }
    },
];
