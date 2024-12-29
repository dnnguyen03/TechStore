<?php ob_start(); ?>
<div class="container">
    <div style="display: flex; gap: 35px;">
        <div class="slide" style="width: 40%;">
            <div class="main-slider" style="border-radius: 12px; overflow: hidden; height: 350px;">
                <?php foreach ($product['product_photos'] as $photo): ?>
                    <div>
                        <img src="<?= '/src/assets/images/'.$photo; ?>" style="width: 100%; height: 350px; object-fit: cover;" alt="Product Image">
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="thumb-slider">
                <?php foreach ($product['product_photos'] as $photo): ?>
                    <div style="margin: 15px 5px 0px; overflow: hidden; border-radius: 12px; height: 80px; width: 80px;">
                        <img height="100%" width="100%" style="object-fit: cover;" src="<?= '/src/assets/images/'.$photo; ?>" alt="Thumb">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div style="display: flex; flex-direction: column; justify-content: space-between; width: 100%;">
            <h4><?= $product['product_name'] ?></h4>
            <h5><?= $product['shop_name']  ?></h5>
            <h4>Giá: <?= $product['price']  ?>đ</h4>
            <div>
                <h5>
                    Chi tiết sản phẩm
                </h5>
                <p><?= $product['product_decs']  ?></p>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; ">
                <Button style="padding: 10px 45px; background-color: orange; color: white; font-size: 1.5rem; border-radius: 12px; border: none;">
                    <p style="margin: 0;">Add to Cart</p>
                </Button>
                <a href="" style="color: orange;"><b>Report this</b></a>
            </div>
        </div>
    </div>
</div>
<h1 class="container my-4">Best Deals for you</h1>
<?php
$products = $bestDealProduct;
include(__DIR__ . '../../ListProduct/list-product.php'); ?>
<?php include(__DIR__ . '../../Tranding/tranding.php'); ?>


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