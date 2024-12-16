<?php
$accounts = [
    ["id" => "#1", "name" => "Ahinsa De Silva1", "date" => "12/12/23", "status" => "Verified", "type" => "Shopper"],
    ["id" => "#2", "name" => "Ahinsa De Silva2", "date" => "12/12/23", "status" => "New", "type" => "Shopper"],
    ["id" => "#3", "name" => "Ahinsa De Silva3", "date" => "12/12/23", "status" => "Rejected", "type" => "Customer"],
    ["id" => "#4", "name" => "Ahinsa De Silva4", "date" => "12/12/23", "status" => "Verified", "type" => "Shopper"],
];
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .content {
            padding: 20px;
        }

        .badge-verified {
            background-color: #28a745 !important;
        }

        .badge-new {
            background-color: #007bff !important;
        }

        .badge-rejected {
            background-color: #dc3545 !important;
        }

        table.table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .action-icons a {
            margin-right: 10px;
        }

        .action-icons i {
            font-size: 1.2em;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Accounts Management</h1>
            <div>
                <form method="GET">
                    <select class="form-select mt-1" name="filter" onchange="this.form.submit()">
                        <option value="">Filter by Type</option>
                        <option value="Shopper" <?= isset($_GET['filter']) && $_GET['filter'] === 'Shopper' ? 'selected' : ''; ?>>Shopper</option>
                        <option value="Customer" <?= isset($_GET['filter']) && $_GET['filter'] === 'Customer' ? 'selected' : ''; ?>>Customer</option>
                    </select>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-hover">
            <thead class="table-white">
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Registered Date</th>
                    <th>AC. Verification</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($accounts as $account): ?>
                    <tr>
                        <td><?= htmlspecialchars($account['id']); ?></td>
                        <td><?= htmlspecialchars($account['name']); ?></td>
                        <td><?= htmlspecialchars($account['date']); ?></td>
                        <td>
                            <?php if ($account['status'] == 'Verified'): ?>
                                <span class="badge badge-verified">Verified</span>
                            <?php elseif ($account['status'] == 'New'): ?>
                                <span class="badge badge-new">New</span>
                            <?php else: ?>
                                <span class="badge badge-rejected">Rejected</span>
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($account['type']); ?></td>
                        <td>
                            <button class="btn btn-light btn-sm">
                                <a href="edit_account.php?id=<?= urlencode($account['id']); ?>" class="text-warning">
                                    <i class="fas fa-arrow-right"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>
<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>