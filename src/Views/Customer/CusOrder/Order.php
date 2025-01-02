<?php ob_start(); ?>

<div class="container mt-3">
    <!-- Tiêu đề -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw">Đơn hàng của tôi</h2>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <select class="form-select form-select-sm" id="filterDropdown" onchange="updateURL('filter', this.value);">
                <option value="" <?= (!isset($_GET['filter']) || $_GET['filter'] == '') ? 'selected' : '' ?>>Tất cả</option>
                <option value="0" <?= (isset($_GET['filter']) && $_GET['filter'] == '0') ? 'selected' : '' ?>>Đơn hàng mới</option>
                <option value="1" <?= (isset($_GET['filter']) && $_GET['filter'] == '1') ? 'selected' : '' ?>>Đã giao</option>
                <option value="-1" <?= (isset($_GET['filter']) && $_GET['filter'] == '-1') ? 'selected' : '' ?>>Đã hủy</option>
            </select>
        </div>

        <div>
            <select class="form-select form-select-sm" id="sortDropdown" onchange="updateURL('sort', this.value);">
                <option value="date_desc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'date_desc') ? 'selected' : '' ?>>Ngày đặt hàng: Mới nhất</option>
                <option value="date_asc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'date_asc') ? 'selected' : '' ?>>Ngày đặt hàng: Cũ nhất</option>
                <option value="total_asc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'total_asc') ? 'selected' : '' ?>>Tổng tiền: Thấp đến cao</option>
                <option value="total_desc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'total_desc') ? 'selected' : '' ?>>Tổng tiền: Cao đến thấp</option>
            </select>
        </div>
    </div>

    <!-- Kiểm tra và hiển thị đơn hàng -->
    <?php if (!empty($orders) && count($orders) > 0): ?>
        <!-- Bảng đơn hàng -->
        <div class="p-0">
            <table class="table table-striped table-bordered">
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
                                    <?= $order['OrderStatus'] == '1' ? 'bg-success' : ($order['OrderStatus'] == '0' ? 'bg-warning text-dark' : 'bg-danger') ?>">
                                    <?= htmlspecialchars($order['OrderStatus'] == '1' ? 'Đã giao' : ($order['OrderStatus'] == '0' ? 'Đơn hàng mới' : 'Đã hủy')) ?>
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
    <?php else: ?>
        <!-- Thông báo không có đơn hàng -->
        <div class="alert alert-info text-center" role="alert">
            <h4 class="fw-bold">Bạn chưa có đơn hàng
                <?php
                if (isset($_GET['filter'])) {
                    switch ($_GET['filter']) {
                        case '0':
                            echo 'mới';
                            break;
                        case '1':
                            echo 'đã giao';
                            break;
                        case '-1':
                            echo 'đã hủy';
                            break;
                        default:
                            echo '';
                            break;
                    }
                }
                ?>
                nào</h4>
            <p>Hãy khám phá các sản phẩm tuyệt vời và tạo đơn hàng ngay!</p>
            <a href="/products" class="btn btn-primary">Khám phá sản phẩm</a>
        </div>
    <?php endif; ?>
</div>
<script>
    function updateURL(param, value) {
        // Lấy URL hiện tại
        const url = new URL(window.location.href);

        // Cập nhật giá trị của tham số
        url.searchParams.set(param, value);

        // Giữ lại các tham số khác (nếu có) và điều hướng đến URL mới
        window.location.href = url.toString();
    }
</script>
<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>