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
        <form class="form-search">
            <div>
                <select class="form-select" aria-label="Select Status">
                    <option selected>Chọn trạng thái</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="pending">Pending</option>
                </select>
            </div>

            <div class="flex-1">
                <input type="text" class="form-control" placeholder="Tìm kiếm" aria-label="Tìm kiếm">
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
            <tr>
                <td>1</td>
                <td>Nguyễn Thị Ngọc Nguyên</td>
                <td>12/12/2024</td>
                <td>200,000.00</td>
                <td>Đơn hàng mới</td>

                <td class="text-center">
                    <a href="/orders/detail/1"><i style="font-size: 24px; color: #FF9C00" class="fa-solid fa-rectangle-list"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>