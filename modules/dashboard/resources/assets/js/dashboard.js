import coreLavakit from '@modules/base/resources/assets/js/core';
import { APP_CONFIG } from "@modules/base/resources/assets/js/config";
import Dashboard from './components/Dashboard';
import Layout from '@layouts/layout';

export default [
    {
        path: '/' + APP_CONFIG.ADMIN_PREFIX,
        name: 'admin.dashboards.index',
        component: Layout,
        beforeEnter: coreLavakit.requireAdmin,
        redirect: '/' + APP_CONFIG.ADMIN_PREFIX + '/dashboard',
        children: [
            {
                path: 'dashboard',
                name: 'admin.dashboards.dashboard',
                component: Dashboard,
                props: {
                    pageTitle: 'Dashboard'
                },
            },
        ]
    }
];
