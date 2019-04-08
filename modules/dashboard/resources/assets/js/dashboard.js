import Dashboard from './components/Dashboard';

const locales = window.Lavakit.locales;
const pageTitle = window.Lavakit.pageTitle;

export default [
    {
        path: '/',
        name: 'admin.dashboards.index',
        component: Dashboard,
        props: {
            locales,
            pageTitle
        }
    }
];
