<?php
// Định nghĩa các route

use App\Controllers\Auth\AuthController;
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
        'route' => 'auth',
        'actions' => [
            [
                'link' => '/signin',
                'page' => new AuthController,
                'method' => 'signin'
            ],
            [
                'link' => '/register',
                'page' => new AuthController,
                'method' => 'register'
            ],
            [
                'link' => '/forgot',
                'page' => new AuthController,
                'method' => 'forgot'
            ],
        ]
    ],
];
