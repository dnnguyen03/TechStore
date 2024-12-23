<?php ob_start(); ?>
<?php include(__DIR__ . '../../Banner/banner.php'); ?>
<?php include(__DIR__ . '../../TopCategory/top-category.php'); ?>
<h1 class="container mb-4">Best Deals for you</h1>
<?php
$products = $bestDealProduct;
include(__DIR__ . '../../ListProduct/list-product.php'); ?>
<h1 class="container mb-4">Choose by Shops</h1>
<?php include(__DIR__ . '../../ListShop/ListShop.php'); ?>
<?php include(__DIR__ . '../../Ads/ads.php'); ?>
<h1 class="container mb-4">Most Popular Products</h1>
<?php
$products = $popularProduct;
include(__DIR__ . '../../ListProduct/list-product.php'); ?>
<?php include(__DIR__ . '../../Poster/poster.php'); ?>
<?php include(__DIR__ . '../../Tranding/tranding.php'); ?>
<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/shop.php'); ?>