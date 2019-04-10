import coreLavakit from '../../../../../Themes/backend/lavatheme/resources/src/js/core';
import Layout from './../../../../../Themes/backend/lavatheme/resources/src/js/views/layout';
import EmailSetting from './compoments/EmailSetting';

const locales = window.Lavakit.locales;
const pageTitle = window.Lavakit.pageTitle;

export default [
    {
        path: '/',
        name: 'admin.dashboards.index',
        component: Layout,
        beforeEnter: coreLavakit.requireAdmin,
        children: [
            {
                path: '/settings/email',
                name: 'admin.settings.email',
                component: EmailSetting,
                props: {
                    locales,
                    pageTitle
                },
            },
        ]
    }
];
