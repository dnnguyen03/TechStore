<?php ob_start(); ?>
<h2>Product</h2>
<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>