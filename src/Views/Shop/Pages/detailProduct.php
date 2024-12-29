<style>
    .ProdRating {
        color: orange;
        font-size: 20px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .ProdRating p {
        color: #212529;
        margin: 0;
        margin-left: 10px;
    }

    a.shopName {
        text-decoration: none;
        color: #212529;
    }

    a.shopName:hover {
        color: orange;
    }
</style>
<?php ob_start(); ?>
<div class="container">
    <div style="display: flex; gap: 35px;">
        <div class="slide" style="width: 40%;">
            <div class="main-slider" style="border-radius: 12px; overflow: hidden; height: 350px;">
                <?php foreach ($product['product_photos'] as $photo): ?>
                    <?php
                    $imagePath = "/src/assets/images/" . $photo;
                    $defaultImage = "/src/assets/images/no_img.png";
                    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $imagePath)) {
                        $displayImage = $imagePath;
                    } else {
                        $displayImage = $defaultImage;
                    }
                    ?>
                    <div>
                        <img src="<?= $displayImage ?>" style="width: 100%; height: 350px; object-fit: cover;" alt="Product Image">
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="thumb-slider">
                <?php foreach ($product['product_photos'] as $photo): ?>
                    <?php
                    $imagePath = "/src/assets/images/" . $photo;
                    $defaultImage = "/src/assets/images/no_img.png";
                    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $imagePath)) {
                        $displayImage = $imagePath;
                    } else {
                        $displayImage = $defaultImage;
                    }
                    ?>
                    <div style="margin: 15px 5px 0px; overflow: hidden; border-radius: 12px; height: 80px; width: 80px;cursor: pointer;">
                        <img height="100%" width="100%" style="object-fit: cover;" src="<?= $displayImage ?>" alt="Thumb">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div style="display: flex; flex-direction: column; justify-content: space-around; width: 100%;">
            <h4>Sản phẩm: <?= $product['product_name'] ?></h4>
            <div>
                <h5>Tên shop:
                    <a href="/shop/<?= $product['seller_id'] ?>" class="shopName">
                        <?= $product['shop_name']  ?>
                    </a>
                </h5>
                <div class="ProdRating">
                    <?php
                    $fullStars = floor($product['avg_rating']);
                    $halfStar = ($product['avg_rating']  - $fullStars > 0) ? 1 : 0;
                    $emptyStars = 5 - $fullStars - $halfStar;

                    for ($i = 0; $i < $fullStars; $i++) {
                        echo '<i class="bi bi-star-fill"></i>';
                    }

                    if ($halfStar) {
                        echo '<i class="bi bi-star-half"></i>';
                    }

                    for ($i = 0; $i < $emptyStars; $i++) {
                        echo '<i class="bi bi-star"></i>';
                    }
                    ?>
                    <p>(<?= floor($product['avg_rating'] * 10) / 10;  ?>/5)</p>
                </div>
            </div>
            <h4>Giá: <?= number_format($product['price'], 0, ',', '.') ?>đ</h4>
            <div style="display: flex; justify-content: space-between; align-items: center; ">
                <Button class="addProduct" style="padding: 10px 45px; background-color: orange; color: white; font-size: 1.5rem; border-radius: 12px; border: none;" data-shop-id="<?= $product['seller_id']; ?>"
                    data-product-id="<?= $product['product_id']; ?>"
                    data-product-name="<?= htmlspecialchars($product['product_name']); ?>"
                    data-price="<?= $product['price']; ?>"
                    data-image="<?= $product['product_image']; ?>">
                    <p class="addProduct" data-shop-id="<?= $product['seller_id']; ?>"
                        data-product-id="<?= $product['product_id']; ?>"
                        data-product-name="<?= htmlspecialchars($product['product_name']); ?>"
                        data-price="<?= $product['price']; ?>"
                        data-image="<?= $product['product_image']; ?>" style="margin: 0;">Add to Cart</p>
                </Button>
                <a href="" style="color: orange;"><b>Report this</b></a>
            </div>
        </div>
    </div>
    <div class="mt-5">
        <h5>
            Chi tiết sản phẩm
        </h5>
        <p><?= $product['product_decs']  ?></p>
    </div>
</div>

<h1 class="container mt-5 mb-4">Best Deals for you</h1>
<?php
$products = $bestDealProduct;
include(__DIR__ . '../../ListProduct/list-product.php'); ?>


<script>
    $('.main-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        asNavFor: '.thumb-slider'
    });
    $('.thumb-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.main-slider',
        dots: false,
        arrows: false,
        centerMode: true,
        focusOnSelect: true
    });
</script>
<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/shop.php'); ?>