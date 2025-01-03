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

    .star {
        font-size: 2rem;
        color: #ccc;
        position: relative;
        display: inline-block;
    }

    .star-filled {
        color: #ffc107;
    }

    .star-half {
        color: #ffc107;
        position: relative;
    }

    .star {
        font-size: 2rem;
        color: #ccc;
        display: inline-block;
    }

    .star-filled {
        color: #ffc107;
    }
</style>
<div class="container mt-3 ">
    <div class="shop-banner shadow">
    <img src="<?= isset($seller['banner']) && $seller['banner'] != null ? "/src/assets/images/" . $seller['banner'] : '/src/assets/images/no_img.png' ?>" alt="banner" />
    </div>
    <div class="row">
        <div class="col-sm-4 shop-logo">
            <div class="shop-logo-img">
            <img src="<?= isset($seller['logo_shop']) && $seller['logo_shop'] != null ? "/src/assets/images/" . $seller['logo_shop'] : '/src/assets/images/no_img.png' ?>" alt="Shop Logo">
            </div>
        </div>

        <div class="col-sm-6">
            <h2><?= $seller['shop_name'] ?></h2>
            <div id="starRating" class="d-flex mb-2"></div>
            <a class="btn btn-outline-warning btn-sm" href="/seller/shops/update/<?= $_SESSION["seller_id"] ?>">Chỉnh sửa</a>
        </div>
    </div>

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
<script>
    function renderStars(rating, maxRating = 5, totalStars = 5) {
            const starContainer = document.getElementById('starRating');
            starContainer.innerHTML = '';

            const starRating = Math.round((rating / maxRating) * totalStars);

            for (let i = 1; i <= totalStars; i++) {
                const star = document.createElement('span');
                if (i <= starRating) {
                    star.className = 'star star-filled';
                    star.innerHTML = '&#9733;';
                } else {
                    star.className = 'star';
                    star.innerHTML = '&#9733;';
                }
                starContainer.appendChild(star);
            }
        }

        const rating = 5;
        renderStars(rating, 5, 5);
</script>

<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>