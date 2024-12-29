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

    .form-control {
        max-width: 100%;
        width: 100%;
    }

    .btn-primary {
        min-width: 100px;
    }
</style>

<body>
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Quản lý tài khoản</h1>
        </div>
        <form class="d-flex mb-3" method="GET" action="">
            <input class="form-control me-2" type="search" name="search" placeholder="Tìm kiếm" value="<?= htmlspecialchars($search); ?>">
            <button class="btn btn-primary" type="submit">Tìm Kiếm</button>
        </form>
        <table class="table table-bordered table-hover">
            <thead class="table-white">
                <tr>
                    <th>Mã người dùng</th>
                    <th>Tên người dùng</th>
                    <th>Ngày đăng ký</th>
                    <th>Trạng thái</th>
                    <th>Loại</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($accounts as $account): ?>
                    <tr>
                        <td><?= htmlspecialchars($account['user_id']); ?></td>
                        <td><?= htmlspecialchars($account['username']); ?></td>
                        <td><?= htmlspecialchars($account['create_at']); ?></td>
                        <td><?= htmlspecialchars($account['is_lock'] ? 'Khóa' : 'Hoạt đông'); ?></td>
                        <td><?= htmlspecialchars($account['role']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php $content = ob_get_clean(); ?>
    <?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>
