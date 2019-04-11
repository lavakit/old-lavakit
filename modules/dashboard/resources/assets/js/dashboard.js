import coreLavakit from '@modules/base/resources/assets/js/core';
import Dashboard from './components/Dashboard';
import Layout from '@layouts/layout';

const locales = window.Lavakit.locales;
const pageTitle = window.Lavakit.pageTitle;

export default [
    {
        path: '/',
        name: 'admin.dashboards.index',
        component: Layout,
        beforeEnter: coreLavakit.requireAdmin,
        redirect: '/dashboard',
        children: [
            {
                path: '/dashboard',
                name: 'admin.dashboards.dashboard',
                component: Dashboard,
                props: {
                    locales,
                    pageTitle
                },
            },
        ]
    }
];
