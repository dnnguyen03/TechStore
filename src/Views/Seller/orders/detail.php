<?php ob_start(); ?>
<div class="container mt-3">
    <!-- Content Header (Page header) -->
        <h2 class="mb-2 mt-2">Chi tiết đơn hàng</h2>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header text-end">
                <div class="btn-group">
                    <?php if($order['status'] == 0) { ?>
                    <a class="btn btn-primary me-3" href="/seller/orders/confirm/<?= $order['order_id']?><?= $customer != null ? '?customer='.$customer : ''?>" onclick="return confirm('Xác nhận duyệt đơn hàng #<?= $order['order_id']?>')">
                        Xác nhận
                    </a>
                    <?php } ?>
                    <a href="<?= $customer != null ? '/seller/customers/detail/'.$customer : '/seller/orders'?>" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-warning">
                            <tr>
                                <th>Ảnh</th>
                                <th>Tên sách</th>
                                <th style="width: 200px;">Giá</th>
                                <th style="width: 100px;">Số lượng</th>
                                <th style="width: 200px;">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($detailOrders)): ?>
                                <?php foreach ($detailOrders as $detailOrder): ?>
                                    <tr>
                                        <td style="width: 80px; height: 80px;">
                                            <img src="<?= isset($detailOrder['image']) ? '/src/assets/images/' . $detailOrder['image'] : 'https://i.pinimg.com/736x/8a/cc/89/8acc896ba2585a9f46555f1138fc5d96.jpg' ?>" alt="ảnh sản phẩm" style="width: 100%; height: 100%;">
                                        </td>
                                        <td><?= $detailOrder['product_name'] ?></td>
                                        <td><?= $detailOrder['price'] ?></td>
                                        <td><?= $detailOrder['quantity'] ?></td>
                                        <td><?= $detailOrder['total'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td class="text-center" colspan="5">Không có dữ liệu</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>