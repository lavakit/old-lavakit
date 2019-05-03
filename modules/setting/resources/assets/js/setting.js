import coreLavakit from '@modules/base/resources/assets/js/core';
import Layout from '@layouts/layout';
import GeneralSetting from './compoments/GeneralSetting';
import EmailSetting from './compoments/EmailSetting';

const locales = window.Lavakit.locales;
const pageTitle = window.Lavakit.pageTitle;

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
                    pageTitle
                },
            },
            {
                path: 'settings/email',
                name: 'admin.settings.email',
                component: EmailSetting,
                props: {
                    locales,
                    pageTitle
                },
                meta: {
                    title: 'title email'
                }
            },
        ]
    }
];
