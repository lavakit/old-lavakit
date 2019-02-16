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
        'popper',
        'bootstrap',
        'perfect-scrollbar',
        'screenfull',
        'datatables',
        'datatables-bs4',
        'datatables-responsive',
        'datatables-responsive-bs4',
        'jvectormap',
        'jvectormap-test',
        'moment',
        'tempusdominus-bootstrap-4',
        'd3',
        'c3',
        'select2',
        'theme',
        'core'
    ],
    'stylesheets' => [
        'bootstrap',
        'font-awesome',
        'iconkit',
        'ionicons',
        'perfect-scrollbar',
        'datatables-bs4',
        'jvectormap',
        'tempusdominus-bootstrap-4',
        'weather-icons',
        'c3',
        'select2',
        'core'
    ],
    'resources' => [
        'javascript' => [
            'jquery' => [
                'use_cdn' => true,
                'fallback' => 'jQuery',
                'location' => 'top',
                'src' => [
                    'local' =>  BACKEND_VENDOR . 'jquery/jquery.min.js',
                    'cdn' => '//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'
                ]
            ],
            'popper' => [
                'use_cdn' => true,
                'location' => 'bottom',
                'src' => [
                    'local' =>  BACKEND_VENDOR . 'popper.js/popper.min.js',
                    'cdn' => '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'
                ]
            ],
            'bootstrap' => [
                 'use_cdn' => true,
                 'location' => 'bottom',
                 'src' => [
                     'local' => BACKEND_VENDOR . 'bootstrap/js/bootstrap.min.js',
                     'cdn' => '//maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js'
                 ]
            ],
            'perfect-scrollbar' => [
                'use_cdn' => true,
                'location' => 'bottom',
                'src' => [
                    'local' => BACKEND_VENDOR . 'utatti-perfect-scrollbar/js/perfect-scrollbar.min.js',
                    'cdn' => '//cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.min.js'
                ]
            ],
            'screenfull' => [
                'use_cdn' => true,
                'location' => 'bottom',
                'src' => [
                    'local' =>  BACKEND_VENDOR . 'screenfull/screenfull.min.js',
                    'cdn' => '//cdnjs.cloudflare.com/ajax/libs/screenfull.js/3.3.3/screenfull.min.js'
                ]
            ],
            'datatables' => [
                'use_cdn' => true,
                'location' => 'bottom',
                'src' => [
                    'local' =>  BACKEND_VENDOR . 'datatables.net/jquery.dataTables.min.js',
                    'cdn' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'
                ]
            ],
            'datatables-bs4' => [
                'use_cdn' => true,
                'location' => 'bottom',
                'src' => [
                    'local' =>  BACKEND_VENDOR . 'datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                    'cdn' => '//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/dataTables.bootstrap4.min.js'
                ]
            ],
            'datatables-responsive' => [
                'use_cdn' => true,
                'location' => 'bottom',
                'src' => [
                    'local' =>  BACKEND_VENDOR . 'datatables.net-responsive/dataTables.responsive.min.js',
                    'cdn' => '//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js'
                ]
            ],
            'datatables-responsive-bs4' => [
                'use_cdn' => true,
                'location' => 'bottom',
                'src' => [
                    'local' =>  BACKEND_VENDOR . 'datatables.net-responsive-bs4/responsive.bootstrap4.min.js',
                    'cdn' => '//cdn.datatables.net/responsive/2.2.2/js/responsive.bootstrap4.min.js'
                ]
            ],
            'jvectormap' => [
                'use_cdn' => true,
                'location' => 'bottom',
                'src' => [
                    'local' =>  BACKEND_VENDOR . 'jvectormap/js/jquery-jvectormap.js',
                    'cdn' => '//cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.4/jquery-jvectormap.js'
                ]
            ],
            'jvectormap-test' => [
                'use_cdn' => false,
                'location' => 'bottom',
                'src' => [
                    'local' =>  BACKEND_VENDOR . 'jvectormap/js/test/jquery-jvectormap-us-mill-en.js',
                ]
            ],
            'moment' => [
                'use_cdn' => true,
                'location' => 'bottom',
                'src' => [
                    'local' =>  BACKEND_VENDOR . 'moment/moment.js',
                    'cdn' => '//cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js'
                ]
            ],
            'tempusdominus-bootstrap-4' => [
                'use_cdn' => true,
                'location' => 'bottom',
                'src' => [
                    'local' =>  BACKEND_VENDOR . 'tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
                    'cdn' => '//cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js'
                ]
            ],
            'd3' => [
                'use_cdn' => true,
                'location' => 'bottom',
                'src' => [
                    'local' =>  BACKEND_VENDOR . 'd3/d3.min.js',
                    'cdn' => '//cdnjs.cloudflare.com/ajax/libs/d3/5.7.0/d3.min.js'
                ]
            ],
            'c3' => [
                'use_cdn' => true,
                'location' => 'bottom',
                'src' => [
                    'local' =>  BACKEND_VENDOR . 'c3/js/c3.min.js',
                    'cdn' => '//cdnjs.cloudflare.com/ajax/libs/c3/0.6.8/c3.min.js'
                ]
            ],
            'select2' => [
                'use_cdn' => true,
                'location' => 'bottom',
                'src' => [
                    'local' => BACKEND_VENDOR . 'select2/js/select2.min.js',
                    'cdn' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js'
                ]
            ],
            'theme' => [
                'use_cdn' => false,
                'location' => 'bottom',
                'src' => [
                    'local' => ASSET_BACKEND . 'js/theme.js'
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
            'core' => [
                'use_cdn' => false,
                'location' => 'top',
                'src' => [
                    'local' => ASSET_BACKEND . 'css/all.css'
                ]
            ],
        ]
    ]
];
