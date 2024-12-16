<?php
$categories = [
    ['id' => '#001', 'name' => 'Electronics', 'description' => 'All kinds of electronic gadgets', 'products' => 120],
    ['id' => '#002', 'name' => 'Fashion', 'description' => 'Clothing and accessories', 'products' => 340],
    ['id' => '#003', 'name' => 'Home Appliances', 'description' => 'Appliances for home use', 'products' => 56],
    ['id' => '#004', 'name' => 'Books', 'description' => 'Books of various genres', 'products' => 230],
];
$searchKeyword = $_GET['search'] ?? ''; // Lấy từ khóa tìm kiếm từ query string
$filteredCategories = array_filter($categories, function ($category) use ($searchKeyword) {
    return stripos($category['name'], $searchKeyword) !== false;
});
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
            
            <form method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Search by Category Name"
                    value="<?= htmlspecialchars($searchKeyword) ?>">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Description</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?= htmlspecialchars($category['id']); ?></td>
                        <td><?= htmlspecialchars($category['name']); ?></td>
                        <td><?= htmlspecialchars($category['description']); ?></td>


                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>