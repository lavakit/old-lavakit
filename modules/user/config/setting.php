<?php

return [
    'users' => [
        'username' => [
            'description' => 'User Name',
            'view' => 'text',
            'translatable' => true,
            'group_name' => 'user',
        ],
        'password' => [
            'description' => 'Password',
            'view' => 'text',
            'translatable' => false,
            'group_name' => 'user',
        ],
    ],

    'roles' => [
        'role_name' => [
            'description' => 'Role Name',
            'view' => 'text',
            'translatable' => true,
            'group_name' => 'role',
        ],
        'role_group' => [
            'description' => 'Role Group',
            'view' => 'text',
            'translatable' => true,
            'group_name' => 'role',
        ],
    ],
];
