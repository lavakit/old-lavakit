<?php

return [
    'generals' => [
        'site_name' => [
            'name' => 'setting::setting.generals.site_name',
            'description' => 'setting::setting.generals.site_name',
            'view' => 'text',
            'translatable' => true,
        ],
        'seo_title' => [
            'name' => 'setting::setting.generals.seo_title',
            'description' => 'setting::setting.generals.seo_title',
            'view' => 'text',
            'translatable' => true,
        ],
        'seo_keyword' => [
            'name' => 'setting::setting.generals.seo_keyword',
            'description' => 'setting::setting.generals.seo_keyword',
            'view' => 'text',
            'translatable' => true,
        ],
        'seo_description' => [
            'name' => 'setting::setting.generals.seo_description',
            'description' => 'setting::setting.generals.seo_description',
            'view' => 'textarea',
            'translatable' => true,
        ],
        'frontend_template' => [
            'name' => 'setting::setting.generals.frontend_template.name',
            'description' => 'setting::setting.generals.frontend_template.description',
            'view' => 'select-frontend-template',
            'translatable' => false,
        ]
    ],

    'languages' => [
        'locale' => [
            'name' => 'setting::setting.languages.locale',
            'description' => 'setting::setting.languages.locale',
            'view' => 'select-locale',
            'translatable' => false,
            'multiple' => true,
        ],
        'hide_locale' => [
            'name' => 'setting::setting.languages.hide_at_url',
            'description' => 'setting::setting.languages.hide_at_url',
            'view' => 'checkbox',
            'translatable' => false,
        ],
        'display' => [
            'name' => 'setting::setting.languages.display.description',
            'description' => 'setting::setting.languages.display.description',
            'view' => 'radio',
            'translatable' => false,
            'options' => [
                'full' => 'setting::setting.languages.display.full',
                'flag' => 'setting::setting.languages.display.flag',
                'name' => 'setting::setting.languages.display.name',
            ],
        ],
        'type' => [
            'name' => 'setting::setting.languages.type.description',
            'description' => 'setting::setting.languages.type.description',
            'view' => 'radio',
            'translatable' => false,
            'options' => [
                'dropdown' => 'setting::setting.languages.type.dropdown',
                'list' => 'setting::setting.languages.type.list',
            ],
        ]
    ],
];
