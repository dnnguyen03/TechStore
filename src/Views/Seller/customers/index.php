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
        <h2>Quản lý khách hàng</h2>
    </div>
    <div class="d-flex mb-3 ">
        <form class="form-search" action="/seller/customers" method="get">
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
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Số đơn hàng</th>
                <th>Tổng tiền</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($CustomerBySellers)): ?>
                <?php foreach ($CustomerBySellers as $customer): ?>
                    <tr>
                        <td><?= $customer['full_name'] ?></td>
                        <td><?= $customer['email'] ?></td>
                        <td><?= $customer['phone'] ?></td>
                        <td><?= $customer['total_orders'] ?></td>
                        <td><?= floor($customer['total_revenue']) ?></td>
                        <td class="text-center">
                            <a href="/seller/customers/detail/<?= $customer['user_id'] ?>" class="btn btn-warning btn-sm"><i style="color: white " class="fa-regular fa-eye"></i></a>
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
                                href="<?= ($p != $page) ? "/seller/customers?page=$p&category=" . $category . "&status=" . $status . "&searchValue=" . $searchValue : '#' ?>">
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