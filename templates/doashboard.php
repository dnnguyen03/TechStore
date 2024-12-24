<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>Tech Store</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
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

        .menu-item.notSeller a {
            color: white;
        }

        .menu-item a:hover {
            color: #FF9C00;
            background-color: #F2EEEA;
        }

        .menu-item.notSeller a:hover {
            color: white;
            background-color: #FF9C00;
        }

        .menu-item.active a {
            background-color: #F2EEEA;
            color: #FF9C00;
        }

        .menu-item.notSeller.active a {
            background-color: #FF9C00;
            color: white;
        }

        .menu-item i {
            margin-right: 10px;
            font-size: 24px;
        }

        .sidebar {
            position: fixed; /* Cố định sidebar */
            top: 0;
            left: 0;
            height: 100vh; /* Chiều cao toàn màn hình */
            width: 16.66%; /* Chiều rộng bằng 2 cột (Bootstrap) */
            padding: 18px 20px 18px 28px;
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

        .sidebar-footer {
            background: #F9F2EF;
        }

        .sidebar-footer.notSeller {
            background: #585656;
        }

        .sidebar-footer.notSeller p {
            color: #ffffff;
        }
        .col-sm-10 {
            margin-left: 16.66%; /* Đẩy nội dung sang phải bằng chiều rộng của sidebar (2 cột = ~16.66%) */
        }
    </style>
</head>

<body>
    <?php
    include '../TechStore/config/sidebar.php';
    if ($_SESSION['currentUser']['role'] == 0) {
        $sesionRole = 'admin';
    } else if (isset($_SESSION['seller_id'])) {
        $sesionRole = 'seller';
    } else {
        $sesionRole = 'customer';
    }
    $classRole = ('seller' === $sesionRole) ? 'seller' : 'notSeller';
    $currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    ?>

    <div class="row" style="width: 100vw;">
        <div class="col-sm-2 sidebar <?php echo $classRole ?>">
            <?php foreach ($RouterRolers as $RouterRoler) {
                if ($RouterRoler['role'] === $sesionRole) {
            ?>
                    <div class="logo">
                        <!-- <img src="../TechStore/src/assets/images/logoTechStore.png" alt="logo"> -->
                        <h2 class="text-center" style="color: #FF9C00;">Tech store</h2>
                    </div>

                    <ul>
                        <?php foreach ($RouterRoler['routers'] as $router) { ?>
                            <li class="menu-item <?php echo $classRole ?> <?php echo (strpos($currentPath, $router['link']) !== false) ? 'active' : ''; ?>">
                                <a href="<?php echo $router['link']; ?>">
                                    <?php echo $router['icon']; ?>
                                    <?php echo $router['title']; ?>
                                </a>
                            </li>

                        <?php } ?>
                    </ul>

                    <div class="sidebar-footer <?php echo $classRole ?> text-center">


                        <?php if ($sesionRole == 'admin') { ?>
                            <h3 style="color: #FF9C00;">Tech ADMIN</h3>
                            <a class="btn btn-light w-100" href="/logout" onclick="return confirm('Xác nhận đăng xuất')">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                Đăng xuất
                            </a>
                        <?php } else { ?>
                            <!-- Button: Thông tin cá nhân -->
                            <a href="/profile" class="btn btn-outline-warning w-100 mb-2 py-2 fw-bold">
                                <i class="fa-solid fa-user me-2"></i> Thông tin cá nhân
                            </a>
                            <a class="btn btn-light w-100" href="/">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                Quay lại
                            </a>
                        <?php } ?>
                    </div>
            <?php }
            } ?>
        </div>
        <div class="col-sm-10">
            <?= $content ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>