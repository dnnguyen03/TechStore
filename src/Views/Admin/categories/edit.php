<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Edit Category</h1>
        <form action="/admin/categories/update/<?=$category['category_id']?>" method="POST" enctype="multipart/form-data">
            <!-- Hidden field to store category ID -->
            <input type="hidden" name="existing_photo" value="<?= htmlspecialchars($category['photo_url'] ?? '') ?>">

            <div class="mb-3">
                <label for="category_name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="category_name" name="category_name" value="<?= htmlspecialchars($category['category_name'] ?? '') ?>" required>
            </div>
            <div class="mb-3">
                <label for="category_decs" class="form-label">Description</label>
                <textarea class="form-control" id="category_decs" name="category_decs" rows="4" required><?= htmlspecialchars($category['category_decs'] ?? '') ?></textarea>
            </div>
            <div class="mb-3">
                <label for="photo_url" class="form-label">Photo</label>
                <input type="file" class="form-control" id="photo_url" name="photo_url">
                <?php if (!empty($category['photo_url'])): ?> 
                    <div class="mb-2">
                        <img src="<?="/src/assets/images/". htmlspecialchars($category['photo_url']) ?>" alt="Current Photo" style="width: 150px; height: auto;">
                    </div>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/admin/categories/index" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</html>

<?php
$content = ob_get_clean();
?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>