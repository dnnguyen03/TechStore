<?php
ob_start();
?>
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

    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Products</h1>
        <!-- Search Form -->
        </div>
        <form method="GET" class="d-flex mb-3">
            <input type="text" name="search" class="form-control me-2" placeholder="Search Product Name"
                value="<?= htmlspecialchars($searchKeyword ?? '') ?>">
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
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)): ?>
                    <tr>
                        <td colspan="7" class="text-center">No products found.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= htmlspecialchars($product['product_id']); ?></td>
                            <td><?= htmlspecialchars($product['product_name']); ?></td>
                            <td><?= htmlspecialchars($product['category_name'] ?? 'N/A'); ?></td>
                            <td><?= htmlspecialchars($product['quantity']); ?></td>
                            <td><?= number_format($product['price']); ?></td>
                            <td>
                                <?php if ($product['status'] == 'Live'): ?>
                                    <span class="badge live">Live</span>
                                <?php elseif ($product['status'] == 'Unavailable'): ?>
                                    <span class="badge unavailable">Unavailable</span>
                                <?php else: ?>
                                    <span class="badge no-stock">No-Stock</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>