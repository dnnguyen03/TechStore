<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>Tech Store</title>

    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        ul li {
            padding-left: 0;
        }

        .menu-item {
            margin: 10px 0;
        }

        .menu-item a {
            display: flex;
            align-items: center;
            padding: 8px 24px;
            border-radius: 12px;
            color: black;
            font-size: 16px;
            font-weight: 400;
            text-decoration: none;
            transition: all 0.3s;
        }

        .menu-item.notSeller a  {
            color: white;
        }

        .menu-item a:hover {
            color: #FF9C00;
            background-color: #F2EEEA;
        }
        .menu-item.notSeller a:hover  {
            color: white;
            background-color: #FF9C00;
        }

        .menu-item.active a {
            background-color: #F2EEEA;
            color: #FF9C00;
        }
        .menu-item.notSeller.active a  {
            background-color: #FF9C00;
            color: white;
        }

        .menu-item i {
            margin-right: 10px;
            font-size: 24px;
        }

        .sidebar {
            height: 100vh;
            padding: 18px 20px 18px 28px;
            position: relative;
            z-index: 1;
        }

        .sidebar.seller {
            background: #FBF9F8;
        }

        .sidebar.notSeller {
            background: #4B4B4B;
        }

        .logo {
            margin-bottom: 60px;
        }

        .logo img {
            width: 100%;
            height: 40px;
        }

        .sidebar-footer {
            position: absolute;
            left: 0;
            padding: 18px 20px 18px 28px;
            bottom: 0;
            width: 100%;
            height: 200px;
            z-index: 10;
        }
        .sidebar-footer{
            background: #F9F2EF;
        }
        .sidebar-footer.notSeller {
            background: #585656;
        }
        .sidebar-footer.notSeller p {
            color: #ffffff;
        }
    </style>
</head>

<body>
    <?php
    
    $classRole = ('seller' === $sesionRole) ? 'seller' : 'notSeller';

    $RouterRolers = [
        [
            'role' => 'seller',
            'routers' => [
                [
                    'icon' => '<i class="fa-solid fa-house"></i>',
                    'title' => 'Tổng quan',
                    'link' => '/templates/doashboard.php'
                ],
                [
                    'icon' => '<i class="fa-brands fa-product-hunt"></i>',
                    'title' => 'Sản phẩm',
                    'link' => '/product.php'
                ],
                [
                    'icon' => '<i class="fa-brands fa-codepen"></i>',
                    'title' => 'Thống kê',
                    'link' => '/index2.php'
                ],
                [
                    'icon' => '<i class="fa-brands fa-product-hunt"></i>',
                    'title' => 'Sản phẩm',
                    'link' => '/product2.php'
                ],
                [
                    'icon' => '<i class="fa-brands fa-codepen"></i>',
                    'title' => 'Thống kê',
                    'link' => '/index3.php'
                ],
                [
                    'icon' => '<i class="fa-brands fa-product-hunt"></i>',
                    'title' => 'Sản phẩm',
                    'link' => '/product3.php'
                ],
            ],
        ],
        [
            'role' => 'customer',
            'routers' => [
                [
                    'icon' => '<i class="fas fa-list-alt me-2"></i>',
                    'title' => 'Đơn hàng',
                    'link' => '..\Customer\Order.php'
                ],
                [
                    'icon' => '<i class="fas fa-exclamation-circle me-2"></i>',
                    'title' => 'Phản hồi',
                    'link' => '../Customer/Complaint.php'
                ],
                [
                    'icon' => '<i class="fas fa-comments me-2"></i>',
                    'title' => 'Tin nhắn',
                    'link' => '../Customer/CusChat.php'
                ],
            ],
        ],
        [
            'role' => 'admin',
            'routers' => [
                [
                    'icon' => '<i class="fa-solid fa-house"></i>',
                    'title' => 'DashBoard',
                    'link' => '/index.php'
                ],
                [
                    'icon' => '<i class="fa-solid fa-house"></i>',
                    'title' => 'Admin',
                    'link' => '/index2.php'
                ],
            ],
        ],
    ];
    ?>

    <div class="row" style="width: 100vw;">
        <div class="col-sm-2 sidebar <?php echo $classRole ?>">
            <?php foreach ($RouterRolers as $RouterRoler) {
                if ($RouterRoler['role'] === $sesionRole) {
            ?>
                    <div class="logo">
                        <img src="/src/assets/images/logoTechStore.png" alt="logo">
                    </div>

                    <ul>
                        <?php foreach ($RouterRoler['routers'] as $router) { ?>
                            <li class="menu-item <?php echo $classRole ?>  <?php echo ($_SERVER['REQUEST_URI'] == $router['link']) ? 'active' : ''; ?>">
                                <a href="<?php echo $router['link']; ?>">
                                    <?php echo $router['icon']; ?>
                                    <?php echo $router['title']; ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>

                    <div class="sidebar-footer <?php echo $classRole ?>">
                        <p>Thông tin cá nhân</p>
                        <div>

                        </div>

                        <a class="btn btn-light" href="logout.php">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            Đăng xuất
                        </a>
                    </div>
            <?php }
            } ?>
        </div>
        <div class="col-sm-10">
            <?= $content ?>
        </div>
    </div>

    <!-- Include Bootstrap JS and Popper.js via CDN (required for Bootstrap JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>