<?php ob_start(); ?>
<?php include(__DIR__ . '../../Banner/banner.php'); ?>
<?php include(__DIR__ . '../../TopCategory/top-category.php'); ?>
<h1 class="container mb-4 mt-5">Ưu đãi tốt nhất dành cho bạn</h1>
<?php
$products = $bestDealProduct;
include(__DIR__ . '../../ListProduct/list-product.php'); ?>
<h1 class="container mb-4 mt-5">Cửa hàng được đánh giá cao</h1>
<?php
$listShop = $top8rating;
include(__DIR__ . '../../ListShop/ListShop.php'); ?>
<?php include(__DIR__ . '../../Ads/ads.php'); ?>
<h1 class="container mb-4 mt-4">Sản phẩm bán chạy nhất</h1>
<?php
$products = $popularProduct;
include(__DIR__ . '../../ListProduct/list-product.php'); ?>
<?php include(__DIR__ . '../../Poster/poster.php'); ?>
<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/shop.php'); ?>