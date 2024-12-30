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

    .card i {
        font-size: 30px;
        color: #007bff;
    }
</style>
</head>

<body>
    <div class="container-fluid p-4">
        <h1 class="mb-4">Tổng quan</h1>

        <!-- Thống kê tổng quan -->
        <div class="row g-4 mb-4">
            <div class="col-lg-4 col-md-6">
                <div class="card text-center p-4 shadow-sm">
                    <i class="fa-brands fa-uncharted"></i>
                    <h4 class="stat-number"><?= $totalCategories ?? 0; ?></h4>
                    <p>Tổng số loại hàng</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card text-center p-4 shadow-sm">
                    <i class="fa-solid fa-users"></i>
                    <h4 class="stat-number"><?= $totalCustomers ?? 0; ?></h4>
                    <p>Tổng số người dùng</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card text-center p-4 shadow-sm">
                    <i class="fa-solid fa-box"></i>
                    <h4 class="stat-number"><?= $totalProducts ?? 0; ?></h4>
                    <p>Tổng số sản phẩm</p>
                </div>
            </div>
        </div>

        <!-- Bảng quản lý tài khoản người dùng -->
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5>Quản lý tài khoản</h5>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Mã tài khoản</th>
                            <th>Tên người dùng</th>
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($newAccounts)): ?>
                            <?php foreach ($newAccounts as $account): ?>
                                <tr>
                                    <td><?= htmlspecialchars($account['user_id']); ?></td>
                                    <td><?= htmlspecialchars($account['username']); ?></td>
                                    <td><?= htmlspecialchars($account['create_at']); ?></td>
                                    <td>
                                        <?php if ($account['is_lock'] == 0): ?>
                                            <p>Hoạt động</p>
                                        <?php else: ?>
                                            <p>Khóa</p>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">Không có dữ liệu tài khoản</td>
                            </tr>
                        <?php endif; ?>
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