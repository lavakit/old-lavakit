<?php

return [
    'generals' => [
        'general' => [
            'site_name' => [
                'description' => 'setting::site.general.site_name',
                'view' => 'text',
                'translatable' => true,
            ],
            'site_keyword' => [
                'description' => 'setting::site.general.site_keyword',
                'view' => 'text',
                'translatable' => true,
            ],
            'site_description' => [
                'description' => 'setting::site.general.site_description',
                'view' => 'textarea',
                'translatable' => true,
            ],
        ],

        'language' => [
            'locales' => [
                'description' => 'setting::site.language.locale',
                'view' => 'setting::fields.select_locale',
                'translatable' => false,
            ],
            'hide_locale' => [
                'description' => 'setting::site.language.hie_locale',
                'view' => 'checkbox',
                'translatable' => false
            ],
            'show_icon' => [
                'description' => 'setting::site.language.show_icon',
                'view' => 'checkbox',
                'translatable' => false
            ],
            'position' => [
                'description' => 'setting::site.language.position',
                'view' => 'select',
                'translatable' => false
            ]
        ]
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
