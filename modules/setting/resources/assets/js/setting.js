import coreLavakit from '@modules/base/resources/assets/js/core';
import Layout from '@layouts/layout';
import GeneralSetting from './compoments/GeneralSetting';
import EmailSetting from './compoments/EmailSetting';

const locales = window.Lavakit.locales;

export default [
    {
        path: '/admin',
        component: Layout,
        beforeEnter: coreLavakit.requireAdmin,
        children: [
            {
                path: 'settings/general',
                name: 'admin.settings.general',
                component: GeneralSetting,
                props: {
                    locales,
                    pageTitle: 'setting::setting.generals.page_title',
                },
            },
            {
                path: 'settings/email',
                name: 'admin.settings.email',
                component: EmailSetting,
                props: {
                    pageTitle: 'setting::setting.emails.page_title',
                },
            },
        ]
    }
];
