import coreLavakit from '@modules/base/resources/assets/js/core';
import Login from './components/auth/Login';
import Forgot from './components/auth/Forgot';
import Register from './components/auth/Register';
import Reset from './components/auth/Reset';

export default [
    {
        path: '/auth/login',
        name: 'admin.login',
        component: Login,
        beforeEnter: coreLavakit.requireNonAuth,
        props: {
            pageTitle: 'user::auth.page_title.login',
        }
    },
    {
        path:'/auth/forgot',
        name: 'admin.forgot',
        component: Forgot,
        beforeEnter: coreLavakit.requireNonAuth,
        props: {
            pageTitle: 'user::auth.page_title.forgot',
        }
    },
    {
        path:'/auth/register',
        name: 'admin.register',
        component: Register,
        beforeEnter: coreLavakit.requireNonAuth,
        props: {
            pageTitle: 'user::auth.page_title.register',
        }
    },
    {
        path:'/auth/reset/:token',
        name: 'admin.reset',
        component: Reset,
        beforeEnter: coreLavakit.requireNonAuth,
        props: {
            pageTitle: 'user::auth.page_title.reset',
        }
    },
];
