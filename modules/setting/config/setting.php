<?php

return [
    'generals' => [
        'general' => [
            'site_name' => [
                'description' => 'setting::site.generals.site_name',
                'view' => 'text',
                'translatable' => true,
            ],
            'seo_title' => [
                'description' => 'setting::site.generals.seo_title',
                'view' => 'text',
                'translatable' => true,
            ],
            'seo_keyword' => [
                'description' => 'setting::site.generals.seo_keyword',
                'view' => 'text',
                'translatable' => true,
            ],
            'seo_description' => [
                'description' => 'setting::site.generals.seo_description',
                'view' => 'textarea',
                'translatable' => true,
            ],
            'site_frontend_template' => [
                'description' => 'setting::site.generals.site_frontend_template',
                'view' => 'setting::admins.fields.originals.select_frontend_template',
                'translatable' => false,
            ]
        ],

        'language' => [
            'locales' => [
                'description' => 'setting::site.language.locale',
                'view' => 'setting::admins.fields.originals.select_locale',
                'translatable' => false,
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
