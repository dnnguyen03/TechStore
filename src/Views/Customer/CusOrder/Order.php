<?php ob_start(); ?>

<div class="container mt-3">
    <!-- Tiêu đề -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw">Đơn hàng của tôi</h2>
    </div>

    <!-- Bảng đơn hàng -->
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 15%;">Mã đơn hàng</th>
                        <th style="width: 25%;">Shop</th>
                        <th style="width: 20%;">Ngày đặt hàng</th>
                        <th style="width: 15%;">Tổng tiền</th>
                        <th style="width: 15%;">Trạng thái</th>
                        <th style="width: 10%;" class="text-end">Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td># <?= htmlspecialchars($order['OrderID']) ?></td>
                            <td><?= htmlspecialchars($order['ShopName']) ?></td>
                            <td><?= htmlspecialchars($order['OrderDate']) ?></td>
                            <td><?= number_format($order['TotalAmount'], 0, ',', '.') ?> ₫</td>
                            <td>
                                <span class="badge 
                                    <?= $order['OrderStatus'] === 'Completed' ? 'bg-success' : 
                                        ($order['OrderStatus'] === 'Pending' ? 'bg-warning text-dark' : 'bg-danger') ?>">
                                    <?= htmlspecialchars($order['OrderStatus']) ?>
                                </span>
                            </td>
                            <td class="text-end">
                                <a href="/customer/orders/detail/<?= $order['OrderID'] ?>" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>
