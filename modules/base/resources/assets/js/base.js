import { APP_CONFIG } from "@modules/base/resources/assets/js/config";
import coreLavakit from '@modules/base/resources/assets/js/core';
import Layout from '@layouts/layout';
import Page403 from './components/pages/403';
import Page404 from './components/pages/404';
import Page500 from './components/pages/500';
import DashboardRoutes from '@modules/dashboard/resources/assets/js/dashboard';
import SettingRoutes from '@modules/setting/resources/assets/js/setting';

const baseBackendURL = '/' + APP_CONFIG.ADMIN_PREFIX;

export default [
    {
        path: baseBackendURL + '/403',
        name: 'admin.page403',
        component: Page403,
    },
    {
        path: baseBackendURL + '/404',
        name: 'admin.page404',
        component: Page404,
    },
    {
        path: baseBackendURL + '/500',
        name: 'admin.page500',
        component: Page500,
    },
    {
        path: '*',
        name: 'admin.404',
        component: Page404,
    },
    {
        path: baseBackendURL,
        name: 'admin.dashboards.index',
        component: Layout,
        beforeEnter: coreLavakit.requireAdmin,
        redirect: baseBackendURL + '/dashboard',
        meta: {
            icon: 'ik ik-home',
            breadcrumb: 'dashboard::dashboard.page_title.dashboard',
        },
        children: [
            ...DashboardRoutes,
            ...SettingRoutes,
        ]
    }
];
