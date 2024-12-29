<?php ob_start(); ?>
<?php include(__DIR__ . '../../ShopInfor/shopInfo.php'); ?>
<h3 class="container my-4">Sản phẩm của shop</h3>
<?php include(__DIR__ . '../../ListProduct/list-product.php'); ?>
<h3 class="container my-4">Choose by Shops</h3>
<?php
$listShop = $top8rating;
include(__DIR__ . '../../ListShop/ListShop.php'); ?>
<?php include(__DIR__ . '../../Poster/poster.php'); ?>
<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/shop.php'); ?>