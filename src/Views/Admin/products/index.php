<?php
$products = [
    ['id' => '#231212135612', 'name' => 'Adidas slippers', 'category' => "Men's Cloth", 'quantity' => '20/11', 'price' => '100,000.00VND', 'status' => 'Live'],
    ['id' => '#231212135612', 'name' => 'Adidas slippers', 'category' => "Men's Cloth", 'quantity' => '20/11', 'price' => '100,000.00VND', 'status' => 'Live'],
    ['id' => '#231212135612', 'name' => 'Adidas slippers', 'category' => "Men's Cloth", 'quantity' => '20/5', 'price' => '100,000.00VND', 'status' => 'Unavailable'],
    ['id' => '#231212135612', 'name' => 'Adidas slippers', 'category' => "Men's Cloth", 'quantity' => '20/0', 'price' => '100,000.00VND', 'status' => 'No-Stock'],
    ['id' => '#231212135612', 'name' => 'Adidas slippers', 'category' => "Men's Cloth", 'quantity' => '20/11', 'price' => '100,000.00VND', 'status' => 'Live'],
    ['id' => '#231212135612', 'name' => 'Adidas slippers', 'category' => "Men's Cloth", 'quantity' => '20/11', 'price' => '100,000.00VND', 'status' => 'Live'],
    ['id' => '#231212135612', 'name' => 'Adidas slippers', 'category' => "Women's Cloth", 'quantity' => '20/11', 'price' => '100,000.00VND', 'status' => 'Live'],
];
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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

        .table td, .table th {
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
        <div class="d-flex justify-content-between align-items-center">
            <h1>Products</h1>
        </div>

        <div class="d-flex mb-3">
            <input type="text" class="form-control me-2" placeholder="Search Product">
            <select class="form-control">
                <option>Filter by Category</option>
                <option>Men's Cloth</option>
                <option>Women's Cloth</option>
            </select>
        </div>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Per.Price</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
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
                            <button class="btn btn-light btn-sm">
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>