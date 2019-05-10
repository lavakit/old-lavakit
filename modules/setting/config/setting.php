<?php

return [
    'generals' => [
        'site_name' => [
            'description' => 'setting::setting.generals.site_name',
            'view' => 'text',
            'translatable' => true,
        ],
        'seo_title' => [
            'description' => 'setting::setting.generals.seo_title',
            'view' => 'text',
            'translatable' => true,
        ],
        'seo_keyword' => [
            'description' => 'setting::setting.generals.seo_keyword',
            'view' => 'text',
            'translatable' => true,
        ],
        'seo_description' => [
            'description' => 'setting::setting.generals.seo_description',
            'view' => 'textarea',
            'translatable' => true,
        ],
        'site_frontend_template' => [
            'view' => 'select-frontend-template',
            'translatable' => false,
        ]
    ],

    'languages' => [
        'locales' => [
            'description' => 'setting::setting.language.locale',
            'view' => 'select-locale',
            'translatable' => false,
            'group_name' => 'language',
        ],
        'hide_locale' => [
            'description' => 'setting::site.language.hie_locale',
            'view' => 'checkbox',
            'translatable' => false,
        ],
        'show_icon' => [
            'description' => 'setting::site.language.show_icon',
            'view' => 'checkbox',
            'translatable' => false,
        ],
        'position' => [
            'description' => 'setting::site.language.position',
            'view' => 'select',
            'translatable' => false,
        ]
    ],
];
