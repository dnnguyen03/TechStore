<?php
$RouterRolers = [
    [
        'role' => 'seller',
        'routers' => [
            [
                'icon' => '<i class="fa-solid fa-house"></i>',
                'title' => 'Tổng quan',
                'link' => '/seller/home'
            ],
            [
                'icon' => '<i class="fa-brands fa-product-hunt"></i>',
                'title' => 'Sản phẩm',
                'link' => '/seller/products'
            ],
            [
                'icon' => '<i class="fa-solid fa-file-invoice"></i>',
                'title' => 'Đơn hàng',
                'link' => '/seller/orders'
            ],
            [
                'icon' => '<i class="fa-solid fa-user"></i>',
                'title' => 'Khách hàng',
                'link' => '/seller/customers'
            ],
            [
                'icon' => '<i class="fa-solid fa-store"></i>',
                'title' => 'Shop của tôi',
                'link' => '/seller/shops'
            ],
            [
                'icon' => '<i class="fa-solid fa-comments"></i>',
                'title' => 'Nhắn tin',
                'link' => '/seller/chats'
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
                'link' => '/admin/home'
            ],
            [
                'icon' => '<i class="fa-regular fa-user"></i></i>',
                'title' => 'Người dùng',
                'link' => '/admin/users'
            ],
            [
                'icon' => '<i class="fa-brands fa-product-hunt"></i>',
                'title' => 'Sản phẩm',
                'link' => '/admin/products'
            ],
            [
                'icon' => '<i class="fa-solid fa-c"></i>',
                'title' => 'Loại sản phẩm',
                'link' => '/admin/categories'
            ],
        ],
    ],
];
