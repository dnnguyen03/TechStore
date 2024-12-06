<?php
$accounts = [
    ["id" => "#231212135612", "name" => "Ahinsa De Silva", "date" => "12/12/23", "status" => "Verified", "type" => "Shopper"],
    ["id" => "#231212135612", "name" => "Ahinsa De Silva", "date" => "12/12/23", "status" => "New", "type" => "Shopper"],
    ["id" => "#231212135612", "name" => "Ahinsa De Silva", "date" => "12/12/23", "status" => "Rejected", "type" => "Customer"],
    ["id" => "#231212135612", "name" => "Ahinsa De Silva", "date" => "12/12/23", "status" => "Verified", "type" => "Shopper"],
];
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
    </style>
</head>

<body>
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Accounts Management</h1>
            <div>
                <select class="form-select mt-1">
                    <option>Filter by Type</option>
                    <option>Shopper</option>
                    <option>Customer</option>
                </select>
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
                    <th></th>
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
                        <td><i class="fas fa-arrow-right"></i></td>
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
