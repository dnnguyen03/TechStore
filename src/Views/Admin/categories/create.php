<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Thêm mới loại hàng</h1>
        <form action="/admin/categories/create" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="category_name" class="form-label">Tên loại hàng</label>
                <input type="text" class="form-control" id="category_name" name="category_name" required>
            </div>
            <div class="mb-3">
                <label for="category_decs" class="form-label">Mô tả</label>
                <textarea class="form-control" id="category_decs" name="category_decs" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="photo_url" class="form-label">Ảnh</label>
                <input type="file" class="form-control" id="photo_url" name="photo_url">
            </div>
            <button type="submit" class="btn btn-success">Lưu giữ liệu</button>
            <a href="/admin/categories" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</html>

<?php
$content = ob_get_clean();
?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>
