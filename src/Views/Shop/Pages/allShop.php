<?php ob_start(); ?>
<?php include(__DIR__ . '../../Banner/bannerAllShop.php'); ?>
<?php include(__DIR__ . '../../ListShop/ListShop.php'); ?>
<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/shop.php'); ?>
