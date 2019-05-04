import coreLavakit from '@modules/base/resources/assets/js/core';
import Layout from '@layouts/layout';
import GeneralSetting from './components/GeneralSetting';
import EmailSetting from './components/EmailSetting';

const locales = window.Lavakit.locales;

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
                path: 'settings/general',
                name: 'admin.settings.general',
                component: GeneralSetting,
                props: {
                    locales,
                    pageTitle: 'setting::setting.generals.page_title',
                },
                meta: {
                    breadcrumb: 'setting::setting.generals.page_title'
                }
            },
            {
                path: 'settings/email',
                name: 'admin.settings.email',
                component: EmailSetting,
                props: {
                    pageTitle: 'setting::setting.emails.page_title',
                },
                meta: {
                    breadcrumb: 'setting::setting.emails.page_title'
                }

            },
        ]
    }
];
