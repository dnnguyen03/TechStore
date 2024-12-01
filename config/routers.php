<?php
// Định nghĩa các route

use App\Controllers\Sellers\HomeController;

$routers = [
    [
        'route' => 'admin',
        'actions' => [
            [
                'link' => '/',
                'page' => new HomeController,
                'method' => 'index'
            ],
            [
                'link' => '/home',
                'page' => new HomeController,
                'method' => 'index'
            ],
            [
                'link' => '/products',
                'page' => new HomeController,
                'method' => 'index2'
            ],
        ]
    ],
    [
        'route' => 'seller',
        'actions' => [
            [
                'link' => '/',
                'page' => new HomeController,
                'method' => 'index'
            ],
            [
                'link' => '/home',
                'page' => new HomeController,
                'method' => 'index'
            ],
            [
                'link' => '/products',
                'page' => new HomeController,
                'method' => 'index2'
            ],
        ]
    ],
    [
        'route' => 'customer',
        'actions' => [
            [
                'link' => '/',
                'page' => new HomeController,
                'method' => 'index'
            ],
            [
                'link' => '/home',
                'page' => new HomeController,
                'method' => 'index'
            ],
            [
                'link' => '/products',
                'page' => new HomeController,
                'method' => 'index2'
            ],
        ]
    ],
    [
        'route' => '',
        'actions' => [
            [
                'link' => '/',
                'page' => new HomeController,
                'method' => 'index'
            ],
            [
                'link' => '/home',
                'page' => new HomeController,
                'method' => 'index'
            ],
            [
                'link' => '/products',
                'page' => new HomeController,
                'method' => 'index2'
            ],
        ]
    ],
];
