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
<<<<<<< HEAD
                'icon' => '<i class="fa-solid fa-shop"></i>',
=======
                'icon' => '<i class="fa-solid fa-store"></i>',
>>>>>>> eb73ed7d0fc2151f173908f45884c6c667679ba6
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
