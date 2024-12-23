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
                'icon' => '<i class="fa-solid fa-cart-shopping"></i>',
                'title' => 'Đơn hàng',
                'link' => '/orders'
            ],
            [
                'icon' => '<i class="fa-solid fa-comment-dots"></i>',
                'title' => 'Phản hồi',
                'link' => '/complaints'
            ],
            [
                'icon' => '<i class="fa-solid fa-message"></i>',
                'title' => 'Tin nhắn',
                'link' => '/chats'
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
                'icon' => '<i class="fa-brands fa-product-hunt"></i>',
                'title' => 'Sản phẩm',
                'link' => '/products'
            ],
        ],
    ],
];
