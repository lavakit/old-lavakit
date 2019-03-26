<?php

/**
 * The Assets javascript and Css to backend
 *
 * @Date 2018-07-19
 * @author hoatq <tqhoa8th@gmail.com>
 */
return [
    'offline' => env('OFFLINE', true),
    'javascript' => [
        'lavakit',
        'core'
    ],
    'stylesheets' => [
        'lavakit'
    ],
    'resources' => [
        'javascript' => [
            'lavakit' => [
                'use_cdn' => false,
                'location' => 'bottom',
                'src' => [
                    'local' => ASSET_BACKEND . 'js/lavakit.js'
                ]
            ],
            'core' => [
                'use_cdn' => false,
                'location' => 'top',
                'src' => [
                    'local' => ASSET_BACKEND . 'js/core.js'
                ]
            ],
        ],
        'stylesheets' => [
            'lavakit' => [
                'use_cdn' => false,
                'location' => 'top',
                'src' => [
                    'local' => ASSET_BACKEND . 'css/style.css'
                ]
            ],
        ]
    ]
];
