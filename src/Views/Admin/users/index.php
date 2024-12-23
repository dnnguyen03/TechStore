<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Accounts Management</h1>
            <form class="d-flex" method="GET" action="">
                <input class="form-control me-2" type="search" name="search" placeholder="Search by Customer Name" value="<?= htmlspecialchars($search); ?>">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>

        <table class="table table-bordered table-hover">
            <thead class="table-white">
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Registered Date</th>
                    <th>AC. Verification</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($accounts as $account): ?>
                    <tr>
                        <td><?= htmlspecialchars($account['user_id']); ?></td>
                        <td><?= htmlspecialchars($account['username']); ?></td>
                        <td><?= htmlspecialchars($account['create_at']); ?></td>
                        <td><?= htmlspecialchars($account['is_lock'] ? 'Locked' : 'Active'); ?></td>
                        <td><?= htmlspecialchars($account['role']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>
