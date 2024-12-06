<?php
$totalShoppers = 240;
$totalCustomers = 1200;
$totalOrdersToday = 240;

$newAccounts = [
    ['id' => '#23121235612', 'name' => 'Ahinsa De Silva', 'date' => '12/12/23', 'verification' => 'Verified', 'type' => 'Shopper'],
    ['id' => '#23121235612', 'name' => 'Ahinsa De Silva', 'date' => '12/12/23', 'verification' => 'New', 'type' => 'Shopper'],
    ['id' => '#23121235612', 'name' => 'Ahinsa De Silva', 'date' => '12/12/23', 'verification' => 'Rejected', 'type' => 'Customer'],
    ['id' => '#23121235612', 'name' => 'Ahinsa De Silva', 'date' => '12/12/23', 'verification' => 'Verified', 'type' => 'Shopper'],
    ['id' => '#23121235612', 'name' => 'Ahinsa De Silva', 'date' => '12/12/23', 'verification' => 'Verified', 'type' => 'Customer'],
    ['id' => '#23121235612', 'name' => 'Ahinsa De Silva', 'date' => '12/12/23', 'verification' => 'Rejected', 'type' => 'Customer'],
];
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Tech Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .stat-number {
            color: #FF9C00;
            font-size: 36px;
            font-weight: bold;
        }

        .badge {
            font-size: 14px;
        }

        .badge.bg-success {
            background-color: #28a745 !important;
        }

        .badge.bg-primary {
            background-color: #007bff !important;
        }

        .badge.bg-danger {
            background-color: #dc3545 !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-4">
        <h1 class="mb-4">Dashboard</h1>

        <div class="row g-4 mb-4">
            <div class="col-lg-4 col-md-6">
                <div class="card text-center p-4 shadow-sm">
                    <h4 class="stat-number"><?= $totalShoppers; ?></h4>
                    <p>Total Shoppers</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card text-center p-4 shadow-sm">
                    <h4 class="stat-number"><?= $totalCustomers; ?></h4>
                    <p>Total Customers</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card text-center p-4 shadow-sm">
                    <h4 class="stat-number"><?= $totalOrdersToday; ?></h4>
                    <p>Today Total Orders</p>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5>New Accounts</h5>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Account ID</th>
                            <th>Customer Name</th>
                            <th>Registered Date</th>
                            <th>AC. Verification</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($newAccounts as $account): ?>
                            <tr>
                                <td><?= htmlspecialchars($account['id']); ?></td>
                                <td><?= htmlspecialchars($account['name']); ?></td>
                                <td><?= htmlspecialchars($account['date']); ?></td>
                                <td>
                                    <?php if ($account['verification'] == 'Verified'): ?>
                                        <span class="badge bg-success"><?= $account['verification']; ?></span>
                                    <?php elseif ($account['verification'] == 'New'): ?>
                                        <span class="badge bg-primary"><?= $account['verification']; ?></span>
                                    <?php else: ?>
                                        <span class="badge bg-danger"><?= $account['verification']; ?></span>
                                    <?php endif; ?>
                                </td>
                                <td><?= htmlspecialchars($account['type']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>