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
        'jquery',
        'bootstrap',
        'select2',
        'core'
    ],
    'stylesheets' => [
        'bootstrap',
        'font-awesome',
        'select2',
        'core'
    ],
    'resources' => [
        'javascript' => [
            'jquery' => [
                'use_cdn' => false,
                'fallback' => 'jQuery',
                'location' => 'top',
                'src' => [
                    'local' =>  BACKEND_VENDOR . 'jquery/jquery.min.js',
                    'cdn' => '//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'
                ]
            ],
            'bootstrap' => [
                 'use_cdn' => false,
                 'location' => 'bottom',
                 'src' => [
                     'local' => BACKEND_VENDOR . 'bootstrap/js/bootstrap.min.js',
                     'cdn' => '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'
                 ]
            ],
            'select2' => [
                'use_cdn' => false,
                'location' => 'bottom',
                'src' => [
                    'local' => BACKEND_VENDOR . 'select2/js/select2.min.js',
                    'cdn' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js'
                ]
            ],
            'core' => [
                'use_cdn' => false,
                'location' => 'top',
                'src' => [
                    'local' => BACKEND_ASSET . 'js/core.js'
                ]
            ],
        ],
        'stylesheets' => [
            'bootstrap' => [
                'use_cdn' => false,
                'location' => 'top',
                'src' => [
                    'local' => BACKEND_VENDOR . 'bootstrap/css/bootstrap.min.css',
                    'cdn' => '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'
                ]
            ],
            'font-awesome' => [
                'use_cdn' => false,
                'location' => 'top',
                'src' => [
                    'local' => BACKEND_VENDOR . 'font-awesome/css/font-awesome.min.css',
                    'cdn' => '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'
                ]
            ],
            'select2' => [
                'use_cdn' => false,
                'location' => 'top',
                'src' => [
                        'local' => BACKEND_VENDOR . 'select2/css/select2.min.css',
                        'cdn' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css'
                ]
            ],
            'core' => [
                'use_cdn' => false,
                'location' => 'top',
                'src' => [
                    'local' => BACKEND_ASSET . 'css/all.css'
                ]
            ],
        ]
    ]
];
