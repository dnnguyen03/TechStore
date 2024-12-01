<?php ob_start(); ?>
<h2>Home 123</h2>
<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>