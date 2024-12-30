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

    .btn-warning {
        min-width: 100px;
    }
</style>

<body>
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Quản lý người dùng</h1>
        </div>
        <form class="d-flex mb-3" method="GET">
            <input class="form-control me-2" type="search" name="search" placeholder="Tìm kiếm" value="<?= htmlspecialchars($search); ?>">
            <button class="btn btn-primary" type="submit">Tìm kiếm</button>
        </form>

        <table class="table table-bordered table-hover">
            <thead class="table-white">
                <tr>
                    <th>Mã người dùng</th>
                    <th>Tên người dùng</th>
                    <th>Ngày đăng ký</th>
                    <th>Trạng thái</th>
                    <th class="text-center">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($accounts as $account): ?>
                    <form method="POST" action="/admin/users/lock">
                        <input type="hidden" name="user_id" value="<?= htmlspecialchars($account['user_id']); ?>">
                        <tr>
                            <td><?= htmlspecialchars($account['user_id']); ?></td>
                            <td><?= htmlspecialchars($account['username']); ?></td>
                            <td><?= htmlspecialchars($account['create_at']); ?></td>
                            <td>
                                <select name="status" class="form-control">
                                    <option value="0" <?= $account['is_lock'] == 0 ? 'selected' : ''; ?>>Hoạt động</option>
                                    <option value="1" <?= $account['is_lock'] == 1 ? 'selected' : ''; ?>>Khóa</option>
                                </select>
                            </td>
                            <td class="text-center"><button type="submit" class="btn btn-warning">Cập nhật</button></td>
                        </tr>
                    </form>
                <?php endforeach; ?>
            </tbody>
        </table>
        </form>
    </div>

    <?php $content = ob_get_clean(); ?>
    <?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>
</body>