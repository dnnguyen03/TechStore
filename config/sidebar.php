<?php
$RouterRolers = [
    [
        'role' => 'seller',
        'routers' => [
            [
                'icon' => '<i class="fa-solid fa-house"></i>',
                'title' => 'Tổng quan',
                'link' => '/home'
            ],
            [
                'icon' => '<i class="fa-brands fa-product-hunt"></i>',
                'title' => 'Sản phẩm',
                'link' => '/products'
            ],
            [
                'icon' => '<i class="fa-solid fa-file-invoice"></i>',
                'title' => 'Đơn hàng',
                'link' => '/orders'
            ],
            [
                'icon' => '<i class="fa-solid fa-user"></i>',
                'title' => 'Khách hàng',
                'link' => '/customers'
            ],
            [
                'icon' => '<i class="fa-solid fa-shop"></i>',
                'title' => 'Shop của tôi',
                'link' => '/shops'
            ],
            [
                'icon' => '<i class="fa-solid fa-comments"></i>',
                'title' => 'Nhắn tin',
                'link' => '/chats'
            ],
        ],
    ],
    [
        'role' => 'customer',
        'routers' => [
            [
                'icon' => '<i class="fa-solid fa-house"></i>',
                'title' => 'Tổng quan',
                'link' => '/home'
            ],
            [
                'icon' => '<i class="fa-brands fa-product-hunt"></i>',
                'title' => 'Sản phẩm',
                'link' => '/products'
            ],
        ],
    ],
    [
        'role' => 'admin',
        'routers' => [
            [
                'icon' => '<i class="fa-solid fa-house"></i>',
                'title' => 'Tổng quan',
                'link' => '/home'
            ],
            [
                'icon' => '<i class="fa-regular fa-user"></i></i>',
                'title' => 'Người dùng',
                'link' => '/users'
            ],
            [
                'icon' => '<i class="fa-brands fa-product-hunt"></i>',
                'title' => 'Sản phẩm',
                'link' => '/products'
            ],
            [
                'icon' => '<i class="fa-solid fa-c"></i>',
                'title' => 'Loại sản phẩm',
                'link' => '/categories'
            ],
        ],
    ],
];
