import coreLavakit from '@modules/base/resources/assets/js/core';
import Login from './components/auth/Login';

const pageTitle = window.Lavakit.pageTitle;

export default [
    {
        path: '/auth/login',
        name: 'admin.auth.login',
        component: Login,
        beforeEnter: coreLavakit.requireNonAuth,
        props: {
            pageTitle
        }
    }
];
