<?php ob_start(); ?>
<h3>Customers</h3>
<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>