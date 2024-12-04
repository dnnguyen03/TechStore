<?php
// Định nghĩa các route

use App\Controllers\Customers\CusHomeController;
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
                'link' => '/home',
                'page' => new CusHomeController,
                'method' => 'index'
            ],
            [
                'link' => '/complaint',
                'page' => new CusHomeController,
                'method' => 'Complaint'
            ],
            [
                'link' => '/cuschat',
                'page' => new CusHomeController,
                'method' => 'Cuschat'
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
