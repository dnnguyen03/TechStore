<?php ob_start(); ?>
<style>
    .profile-header {
        margin-top: 30px;
    }

    .profile-header h1 {
        font-size: 32px;
        color: #333;
    }

    .profile-header .details {
        text-align: right;
    }
</style>

<div class="container">
    <!-- Profile Header -->
    <div class="profile-header">
        <h2 style="margin-bottom: 16px;">Chi tiết khách hàng</h2>
        <div>
            <p>Họ tên: <strong><?= $customer['full_name']?></strong></p>
            <p>Email: <?= $customer['email']?></p>
            <p>Số điện thoại: <?= $customer['phone']?></p>
            <p>Địa chỉ: <?= $customer['address']?></p>
        </div>
        <div class="details">
            <h2>Danh sách đơn hàng</h2>
        </div>
    </div>

    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>Mã đơn hàng</th>
                <th>Ngày đặt</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($orderByCustomers)): ?>
                <?php foreach ($orderByCustomers as $order): ?>
                    <tr>
                        <td><?= $order['order_id'] ?></td>
                        <td><?= $order['date_order'] ?></td>
                        <td><?= floor($order['total_amount']) ?></td>
                        <td>
                            <?php
                            if ($order['status'] == 0) { ?>
                                <p style="color: #FF9C00;">Đơn hàng mới</p>
                            <?php } else if($order['status'] == 1) { ?>
                                <p style="color: green;">Đã duyệt</p>
                            <?php } else if ($order['status'] == -1) { ?>
                                <p style="color: red;">Đã hủy</p>
                            <?php } ?>
                        </td>

                        <td class="text-center">
                            <a href="/seller/orders/detail/<?= $order['order_id'] ?>?customer=<?= $customer['user_id'] ?>"><i style="font-size: 24px; color: #FF9C00" class="fa-solid fa-rectangle-list"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?> <?php else: ?>
                <tr>
                    <td class="text-center" colspan="5">Không có dữ liệu</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>

