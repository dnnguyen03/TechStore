<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'signin';

switch ($page) {
    case 'signin':
        $file_to_load = 'signin.php';
        break;
    case 'create-account':
        $file_to_load = 'create-account.php';
        break;
    case 'forgot-password':
        $file_to_load = 'forgot-password.php';
        break;
    default:
        $file_to_load = 'signin.php'; 
}

function load_file($file) {
    if (file_exists($file)) {
        include $file;
    } else {
        echo "<p style='color: red;'>File $file không tồn tại!</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Store</title>
</head>
<body>
    <div class="container">
        <?php load_file($file_to_load); ?>
    </div>
</body>
</html>
