<?php

return [
    'emails' => [
        'driver' => [
            'name' => 'user::user.email.driver',
            'description' => 'Driver',
            'view' => 'select',
            'translatable' => false,
        ],
        'port' => [
            'name' => 'user::user.email.port',
            'description' => 'Port',
            'view' => 'text',
            'translatable' => false,
        ],
    ],
];
