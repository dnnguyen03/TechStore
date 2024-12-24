<?php ob_start(); ?>

<div class="container mt-3">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Đơn hàng của tôi</h2>
    </div>
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Shop</th>
                        <th>Ngày đặt hàng</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td># <?= $order['OrderID'] ?></td>
                            <td><?= $order['ShopName'] ?></td>
                            <td><?= $order['OrderDate'] ?></td>
                            <td><?= $order['TotalAmount'] ?></td>
                            <td>
                                <span class="badge bg-primary text-white status-badge"><?= $order['OrderStatus'] ?></span>
                            </td>
                            <td class="text-end">
                                <a href="/orders/detail/<?= $order['OrderID'] ?>">
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