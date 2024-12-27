<?php ob_start(); ?>
<style>
    .form-search {
        width: 100%;
        display: flex;
        justify-content: end;
        align-items: center;
        gap: 16px;
    }

    .flex-1 {
        flex-grow: 1;
    }
</style>
<div class="container mt-3">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Quản lý đơn hàng</h2>
    </div>
    <div class="d-flex mb-3 ">
        <form class="form-search" action="/seller/orders" method="get">
            <div>
                <select class="form-select" aria-label="Select trạng thái" name="status">
                    <option value="2" selected>Chọn trạng thái</option>
                    <option value="0">Đơn hàng mới</option>
                    <option value="1">Đã duyệt</option>
                </select>
            </div>

            <div class="flex-1">
                <input type="text" class="form-control" placeholder="Tìm kiếm" aria-label="Tìm kiếm" name="searchValue" value="<?= $searchValue ?>">
            </div>

            <div>
                <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
            </div>
        </form>
    </div>
    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>Mã đơn hàng</th>
                <th>Tên khách hàng</th>
                <th>Ngày đặt</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($OrderBySellers)): ?>
                <?php foreach ($OrderBySellers as $order): ?>
                    <tr>
                        <td><?= $order['order_id'] ?></td>
                        <td><?= $order['full_name'] ?></td>
                        <td><?= $order['date_order'] ?></td>
                        <td><?= floor($order['total_amount']) ?></td>
                        <td>
                            <?php
                            if ($order['status'] == 0) { ?>
                                <p style="color: #FF9C00;">Đơn hàng mới</p>
                            <?php } else { ?>
                                <p style="color: green;">Đã duyệt</p>
                            <?php } ?>
                        </td>

                        <td class="text-center">
                            <a href="/seller/orders/detail/<?= $order['order_id'] ?>"><i style="font-size: 24px; color: #FF9C00" class="fa-solid fa-rectangle-list"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?> <?php else: ?>
                <tr>
                    <td class="text-center" colspan="6">Không có dữ liệu</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div style="display: flex; flex-direction: column; align-items: center;">
        <?php if ($pageCount > 1): ?>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <?php for ($p = 1; $p <= $pageCount; $p++): ?>
                        <li class="page-item <?= ($p == $page) ? 'active' : '' ?>">
                            <a class="page-link"
                                href="<?= ($p != $page) ? "/seller/orders?page=$p&category=" . $category . "&status=" . $status . "&searchValue=" . $searchValue : '#' ?>">
                                <?= $p ?>
                            </a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        <?php endif; ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>