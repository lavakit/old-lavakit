import EmailSetting from './compoments/EmailSetting';

const locales = window.Lavakit.locales;
const pageTitle = window.Lavakit.pageTitle;

export default [
    {
        path: '/settings/email',
        name: 'admin.settings.email',
        component: EmailSetting,
        props: {
            locales,
            pageTitle
        }
    }
];
