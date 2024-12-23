<?php ob_start(); ?>

<style>
    .shop-create {
        margin-top: 12px;
        padding: 40px 80px;
        padding-top: 20px;
        font-size: 36px;
        font-weight: 400;
        border: 2px dashed #ccc;
    }

    .shop-banner {
        height: 340px;
        background-color: #f8f9fa;
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 32px;
    }

    .shop-banner img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .shop-logo {
        position: relative;
    }

    .shop-logo-img {
        position: absolute;
        padding: 6px;
        background-color: white;
        top: -140px;
        left: 140px;
        width: 240px;
        height: 240px;
        border-radius: 999px;
        overflow: hidden;
    }

    .shop-logo-img img {
        width: 100%;
        height: 100%;
        border-radius: 999px;
        object-fit: cover;
        object-position: center;
    }

    .rating-stars {
        color: #ffc107;
    }

    .rating-text {
        font-weight: bold;
        color: #28a745;
    }

    .report-link {
        color: #ff5722;
        cursor: pointer;
        text-decoration: none;
    }
</style>
<div class="container mt-5">
    <!-- Shop Banner -->
    <div class="shop-banner shadow">
        <img src="<?= isset($seller['banner']) ? '/src/assets/images/'.$seller['banner'] : 'https://i.pinimg.com/736x/70/d9/a7/70d9a7ecf4628636bf3daf72a45f9990.jpg' ?>" alt="banner" />
    </div>
    <div class="row">
        <!-- Shop Logo -->
        <div class="col-sm-4 shop-logo">
            <div class="shop-logo-img">
                <img src="<?= isset($seller['logo_shop']) ? '/src/assets/images/'.$seller['logo_shop'] : 'https://i.pinimg.com/736x/70/d9/a7/70d9a7ecf4628636bf3daf72a45f9990.jpg' ?>" alt="Shop Logo">
            </div>
        </div>

        <!-- Shop Information -->
        <div class="col-sm-6">
            <h2 class="mb-2"><?= $seller['shop_name'] ?></h2>
            <a class="btn btn-outline-warning btn-sm" href="/seller/shops/update/<?= $_SESSION["seller_id"] ?>">Chỉnh sửa</a>
        </div>
    </div>

    <!-- Nature of Business -->
    <div class="mt-4">
        <h3 class="mb-4">Thông tin shop</h3>
        <div class="row">
            <div class="col-sm-6">
                <p><strong>Số điện thoại: </strong><?= $seller['phone'] ?></p>
                <p><strong>Email: </strong><?= $seller['email'] ?></p>
                <p><strong>Địa chỉ: </strong><?= $seller['address'] ?></p>
            </div>
            <div class="col-sm-6">
                <p><strong>Mô tả: </strong><?= $seller['bio_seller'] ?></p>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>