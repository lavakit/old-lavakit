import { APP_CONFIG } from "@modules/base/resources/assets/js/config";
import Dashboard from './components/Dashboard';

export default [
    {
        path: 'dashboard',
        name: 'admin.dashboards.dashboard',
        component: Dashboard,
        meta: {
            breadcrumb: 'dashboard::dashboard.page_title.dashboard',
        },
        props: {
            pageTitle: 'dashboard::dashboard.page_title.dashboard',
        },
    },
];
