<?php
$products = [
    ['id' => '#231212135612', 'name' => 'Adidas slippers', 'category' => "Men's Cloth", 'quantity' => '20', 'price' => '100,000.00VND', 'status' => 'Live'],
    ['id' => '#231212135613', 'name' => 'Nike T-shirt', 'category' => "Men's Cloth", 'quantity' => '15', 'price' => '200,000.00VND', 'status' => 'Unavailable'],
    ['id' => '#231212135614', 'name' => 'Home Cooker', 'category' => "Home Appliances", 'quantity' => '10', 'price' => '500,000.00VND', 'status' => 'No-Stock'],
    ['id' => '#231212135615', 'name' => 'Silk Dress', 'category' => "Women's Cloth", 'quantity' => '30', 'price' => '300,000.00VND', 'status' => 'Live'],
];

$searchKeyword = $_GET['search'] ?? ''; // Lấy từ khóa tìm kiếm
$filteredProducts = array_filter($products, function ($product) use ($searchKeyword) {
    return stripos($product['category'], $searchKeyword) !== false; // Lọc theo Category Name
});

ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

        .badge {
            padding: 5px 10px;
            border-radius: 5px;
        }

        .badge.live {
            background-color: #28a745;
            color: white;
        }

        .badge.unavailable {
            background-color: #ffc107;
            color: black;
        }

        .badge.no-stock {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>

<body>
    <div class="content">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Products</h1>
        </div>

        <!-- Search Form -->
        <form method="GET" class="d-flex mb-3">
            <input type="text" name="search" class="form-control me-2" placeholder="Search by Category Name"
                value="<?= htmlspecialchars($searchKeyword) ?>">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <!-- Products Table -->
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Per.Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($filteredProducts)): ?>
                    <tr>
                        <td colspan="7" class="text-center">No products found.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($filteredProducts as $product): ?>
                        <tr>
                            <td><?= htmlspecialchars($product['id']); ?></td>
                            <td><?= htmlspecialchars($product['name']); ?></td>
                            <td><?= htmlspecialchars($product['category']); ?></td>
                            <td><?= htmlspecialchars($product['quantity']); ?></td>
                            <td><?= htmlspecialchars($product['price']); ?></td>
                            <td>
                                <?php if ($product['status'] == 'Live'): ?>
                                    <span class="badge live">Live</span>
                                <?php elseif ($product['status'] == 'Unavailable'): ?>
                                    <span class="badge unavailable">Unavailable</span>
                                <?php else: ?>
                                    <span class="badge no-stock">No-Stock</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <!-- Action Button -->
                                <a href="edit_product.php?id=<?= urlencode($product['id']); ?>" class="btn btn-light btn-sm text-warning">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>
