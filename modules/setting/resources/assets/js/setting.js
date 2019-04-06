import EmailSetting from './compoments/EmailSetting';

const locales = window.Lavakit.locales;

export default [
    {
        path: '/settings/email',
        name: 'admin.settings.email',
        component: EmailSetting
    }
];
