<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
</head>

<body>
    <div class="container mt-5">
        <h1>Create New Category</h1>
        <form action="/path/to/save/category" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="category_name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="category_name" name="category_name" required>
            </div>
            <div class="mb-3">
                <label for="category_desc" class="form-label">Description</label>
                <textarea class="form-control" id="category_desc" name="category_desc" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="photo_url" class="form-label">Photo</label>
                <input type="file" class="form-control" id="photo_url" name="photo_url">
            </div>
            <button type="submit" class="btn btn-success">Create</button>
            <a href="/path/to/categories" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</html>

<?php
$content = ob_get_clean();
?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>