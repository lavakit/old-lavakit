<?php

return [
    'generals' => [

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
    'languages' => [

    ],
];
