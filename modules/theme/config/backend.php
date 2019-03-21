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
        'bootstrap',
        'font-awesome',
        'iconkit',
        'ionicons',
        'perfect-scrollbar',
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
            'bootstrap' => [
                'use_cdn' => true,
                'location' => 'top',
                'src' => [
                    'local' => BACKEND_VENDOR . 'bootstrap/css/bootstrap.min.css',
                    'cdn' => '//maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css'
                ]
            ],
            'font-awesome' => [
                'use_cdn' => false,
                'location' => 'top',
                'src' => [
                    'local' => BACKEND_VENDOR . 'fontawesome/css/fontawesome-all.min.css',
                    'cdn' => '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/fontawesome-all.min.css'
                ]
            ],
            'iconkit' => [
                'use_cdn' => false,
                'location' => 'top',
                'src' => [
                    'local' => BACKEND_VENDOR . 'IconKit/css/iconkit.min.css'
                ]
            ],
            'ionicons' => [
                'use_cdn' => false,
                'location' => 'top',
                'src' => [
                    'local' => BACKEND_VENDOR . 'ionicons/css/ionicons.min.css'
                ]
            ],
            'perfect-scrollbar' => [
                'use_cdn' => true,
                'location' => 'top',
                'src' => [
                    'local' => BACKEND_VENDOR . 'utatti-perfect-scrollbar/css/perfect-scrollbar.css',
                    'cdn' => '//cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/css/perfect-scrollbar.min.css'
                ]
            ],
            'datatables-bs4' => [
                'use_cdn' => true,
                'location' => 'top',
                'src' => [
                    'local' => BACKEND_VENDOR . 'datatables.net-bs4/css/dataTables.bootstrap4.min.css',
                    'cdn' => '//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/dataTables.bootstrap4.min.css'
                ]
            ],
            'jvectormap' => [
                'use_cdn' => true,
                'location' => 'top',
                'src' => [
                    'local' => BACKEND_VENDOR . 'jvectormap/css/jquery-jvectormap.css',
                    'cdn' => '//cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.4/jquery-jvectormap.css'
                ]
            ],
            'tempusdominus-bootstrap-4' => [
                'use_cdn' => true,
                'location' => 'top',
                'src' => [
                    'local' => BACKEND_VENDOR . 'tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
                    'cdn' => '//cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/css/tempusdominus-bootstrap-4.css'
                ]
            ],
            'weather-icons' => [
                'use_cdn' => false,
                'location' => 'top',
                'src' => [
                    'local' => BACKEND_VENDOR . 'weather-icons/css/weather-icons.min.css',
                ]
            ],
            'c3' => [
                'use_cdn' => true,
                'location' => 'top',
                'src' => [
                    'local' => BACKEND_VENDOR . 'c3/css/c3.min.css',
                    'cdn' => '//cdnjs.cloudflare.com/ajax/libs/c3/0.6.8/c3.min.css'
                ]
            ],
            'select2' => [
                'use_cdn' => true,
                'location' => 'top',
                'src' => [
                        'local' => BACKEND_VENDOR . 'select2/css/select2.min.css',
                        'cdn' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css'
                ]
            ],
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
