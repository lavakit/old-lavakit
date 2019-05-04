import { APP_CONFIG } from "@modules/base/resources/assets/js/config";
import Page403 from './compoments/pages/403';
import Page404 from './compoments/pages/404';
import Page500 from './compoments/pages/500';

const baseErrorURL = '/' + APP_CONFIG.ADMIN_PREFIX;

export default [
    {
        path: baseErrorURL + '/403',
        name: 'admin.page403',
        component: Page403,
    },
    {
        path: baseErrorURL + '/404',
        name: 'admin.page404',
        component: Page404,
    },
    {
        path: baseErrorURL + '/500',
        name: 'admin.page500',
        component: Page500,
    },
    {
        path: '*',
        name: 'admin.404',
        component: Page404,
    },
];
