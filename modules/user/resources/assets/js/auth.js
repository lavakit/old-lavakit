import coreLavakit from '@modules/base/resources/assets/js/core';
import Login from './components/auth/Login';

const pageTitle = window.Lavakit.pageTitle;
const locales = window.Lavakit.locales;

export default [
    {
        path: '/auth/login',
        name: 'admin.auth.login',
        component: Login,
        beforeEnter: coreLavakit.requireNonAuth,
        props: {
            locales,
            pageTitle
        }
    }
];
