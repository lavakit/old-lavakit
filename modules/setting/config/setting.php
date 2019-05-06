<?php

return [
    'generals' => [
        'general' => [
            'site_name' => [
                'description' => 'setting::setting.generals.site_name',
                'view' => 'text',
                'translatable' => true,
                'group_name' => 'general',
            ],'seo_title' => [
                'description' => 'setting::setting.generals.seo_title',
                'view' => 'text',
                'translatable' => true,
                'group_name' => 'general',
            ],
            'seo_keyword' => [
                'description' => 'setting::setting.generals.seo_keyword',
                'view' => 'text',
                'translatable' => true,
                'group_name' => 'general',
            ],
            'seo_description' => [
                'description' => 'setting::setting.generals.seo_description',
                'view' => 'textarea',
                'translatable' => true,
                'group_name' => 'general',
            ],
            'site_frontend_template' => [
                'view' => 'select-frontend-template',
                'translatable' => false,
                'group_name' => 'general',
            ]

        ],

        'language' => [
            'locales' => [
                'description' => 'setting::setting.language.locale',
                'view' => 'setting::admins.fields.originals.select_locale',
                'translatable' => false,
                'group_name' => 'language',
            ],
//            'hide_locale' => [
//                'description' => 'setting::site.language.hie_locale',
//                'view' => 'checkbox',
//                'translatable' => false,
//            ],
//            'show_icon' => [
//                'description' => 'setting::site.language.show_icon',
//                'view' => 'checkbox',
//                'translatable' => false,
//            ],
//            'position' => [
//                'description' => 'setting::site.language.position',
//                'view' => 'select',
//                'translatable' => false,
//            ]
        ],
    ],

    'emails' => [
        [
            'package' => 'Main',
            'module' => 'setting',
            'control' => 'text',
            'key' => 'smtp_from_name',
            'name' => trans('setting::form.emails.smtp.from_email'),
            'value' => '',
            'options' => [
                'class' => 'form-control',
                'placeholder' => 'info@example.info',
                'description' => trans('setting::form.email.smtp.description.from_email')
            ],
            'is_admin' => false
        ],
    ],
    'medias' => [

    ],
];
