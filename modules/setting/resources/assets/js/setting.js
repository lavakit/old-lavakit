import { LOCALES } from '@modules/base/resources/assets/js/config';
import coreLavakit from '@modules/base/resources/assets/js/core';
import Layout from '@layouts/layout';
import LavakitSetting from './components/Setting';

export default [
    {
        path: '/admin',
        name: 'admin.dashboards.index',
        component: Layout,
        beforeEnter: coreLavakit.requireAdmin,
        meta: {
            icon: 'ik ik-home',
            breadcrumb: 'dashboard::dashboard.page_title.dashboard',
        },
        children: [
            {
                path: 'settings/setting/:type',
                name: 'admin.settings.setting',
                component: LavakitSetting,
                props: {
                    locales: LOCALES,
                    pageTitle: 'setting::setting.generals.page_title',
                },
                meta: {
                    breadcrumb: 'setting::setting.generals.page_title'
                }
            },
        ]
    }
];
