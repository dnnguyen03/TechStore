<?php ob_start(); ?>
<h3>Products</h3>
<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>