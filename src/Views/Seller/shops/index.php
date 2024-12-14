<?php ob_start(); ?>
<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .shop-container {
            display: flex;
            justify-self: center;
            align-items: center;
            padding-top: 200px;
            flex-direction: column;
        }

        .shop-create {
            margin-top: 12px;
            padding: 40px 80px;
            font-size: 36px;
            font-weight: 400;
            border: 2px dashed #ccc;
        }
    </style>
</head>

<body>
    <div class="container shop-container">
        <h3>New Shop</h3>
        <a class="shop-create btn" href="/shops/create">Create shop +</a>
        <a class="shop-create btn" href="/shops/update/1">Update shop +</a>
    </div>
</body>

</html>
=======
<style>
    .shop-container {
        display: flex;
        justify-self: center;
        align-items: center;
        padding-top: 200px;
        flex-direction: column;
    }

    .shop-create {
        margin-top: 12px;
        padding: 40px 80px;
        font-size: 36px;
        font-weight: 400;
        border: 2px dashed #ccc;
    }
</style>
<div class="container shop-container">
    <h3>New Shop</h3>
    <a class="shop-create btn" href="/shops/create">Create shop +</a>
    <a class="shop-create btn" href="/shops/update/1">Update shop +</a>
</div>
>>>>>>> eb73ed7d0fc2151f173908f45884c6c667679ba6
<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>