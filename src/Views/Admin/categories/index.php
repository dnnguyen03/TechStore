<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .content {
            padding: 20px;
            width: 100%;
        }

        .table td,
        .table th {
            vertical-align: middle;
        }

        .btn-add-category {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            border-radius: 5px;
        }

        .btn-add-category:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <div class="content">
        <h1>Product Categories</h1>
        <div class="d-flex mb-3">
            <!-- Form tìm kiếm -->
            <form method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Search by Category Name"
                    value="<?= htmlspecialchars($searchKeyword ?? '') ?>">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>

        <!-- Bảng hiển thị danh mục -->
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <td>
                                <?php if (!empty($category['photo_url'])): ?>
                                    <img src="<?= htmlspecialchars($category['photo_url']) ?>" alt="Photo" style="width: 100px; height: auto;">
                                <?php else: ?>
                                    <span>No photo</span>
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($category['category_id'] ?? ''); ?></td>
                            <td><?= htmlspecialchars($category['category_name'] ?? ''); ?></td>
                            <td><?= htmlspecialchars($category['category_decs'] ?? ''); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">No categories found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
$content = ob_get_clean();
?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>