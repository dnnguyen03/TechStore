<?php ob_start(); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h2 class="mb-2 mt-2">Chi tiết đơn hàng</h2>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header text-end">
                <div class="btn-group">
                    <!-- Example of conditionally displayed button for payment confirmation -->
                    <a class="btn btn-primary me-3" href="#" onclick="return confirm('Xác nhận thanh toán cho đơn hàng #12345')">
                        Xác nhận
                    </a>
                    <a href="/seller/orders" class="btn btn-secondary">Quay lại</a>
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
                            <!-- Data for order items -->
                            <tr>
                                <td style="width: 80px; height: 80px;">
                                    <img src="https://i.pinimg.com/736x/05/71/a1/0571a140c8f2c73d60ad88ffd4a2bbb4.jpg" alt="ảnh sản phẩm" style="width: 100%; height: 100%;">
                                </td>
                                <td>Sách ABC</td>
                                <td>200,000 VNĐ</td>
                                <td>1</td>
                                <td>400,000 VNĐ</td>
                            </tr>
                            <tr>
                                <td style="width: 80px; height: 80px;">
                                    <img src="https://i.pinimg.com/736x/05/71/a1/0571a140c8f2c73d60ad88ffd4a2bbb4.jpg" alt="ảnh sản phẩm" style="width: 100%; height: 100%;">
                                </td>
                                <td>Sách XYZ</td>
                                <td>150,000 VNĐ</td>
                                <td>3</td>
                                <td>450,000 VNĐ</td>
                            </tr>
                            <!-- More items can be added here as needed -->
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