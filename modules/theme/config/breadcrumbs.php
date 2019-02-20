<?php

return [
    /*
    |--------------------------------------------------------------------------
    | View Name
    |--------------------------------------------------------------------------
    |
    | - 'breadcrumbs::default' The current theme active
    | - 'breadcrumbs::bootstrap' The Bootstrap 4
    | - 'breadcrumbs::materialize' - The Materialize
    |
    */
    'view' => 'theme::breadcrumbs.default',

    'breadcrumbs' => [
        'backend' => [
            'admin.dashboards.index' => [
                'title' => 'Dashboard',
                'route' => 'admin.dashboards.index',
                'icon' => '<i class="ik ik-home"></i>',
                'parent' => false,
            ],
            'admin.settings' => [
                'title' => 'Settings',
                'route' => '#',
                'parent' => 'admin.dashboards.index'
            ],
            'admin.settings.general' => [
                'title' => 'General',
                'route' => 'admin.settings.general',
                'parent' => false,
            ],
        ],
        'frontend' => [

        ],
    ],
];
