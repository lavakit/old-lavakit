import { LOCALES } from '@modules/base/resources/assets/js/config';
import LavakitSetting from './components/Setting';

export default [
    {
        path: 'settings/show/:type',
        name: 'admin.settings.show',
        component: LavakitSetting,
        props: {
            locales: LOCALES,
            pageTitle: 'setting::setting.generals.page_title',
        },
        meta: {
            breadcrumb: 'setting::setting.generals.page_title'
        }
    },
];
