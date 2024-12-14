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
        <h2>Quản lý sản phẩm</h2>
    </div>
    <div class="d-flex mb-3 ">
        <form class="form-search">
            <div>
                <select class="form-select" aria-label="Select Loại">
                    <option selected>Chọn loại</option>
                    <option value="1">Loại 1</option>
                    <option value="2">Loại 2</option>
                    <option value="3">Loại 3</option>
                </select>
            </div>

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

            <div>
                <a href="/products/create" class="btn" style="background-color: #FF9C00; color: white;">+ Bổ sung</a>
            </div>
        </form>
    </div>
    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Per.Price</th>
                <th>Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Row -->
            <tr>
                <td>#231212135612</td>
                <td>Adidas slippers</td>
                <td>Men's Cloth</td>
                <td>20/11</td>
                <td>Rs.100,000.00</td>
                <td>
                    <span class="status-badge status-live">Live</span>
                </td>
                <td class="text-center">
                    <a href="/products/update/1"><i style="font-size: 20px;" class="fa-regular fa-pen-to-square"></i></a>

                    <a href="/products/delete/1" onclick="return confirm('Xác nhận xóa sản phẩm?')">
                        <i style="color: red; margin-left: 12px; font-size: 20px;" class="fa-regular fa-trash-can"></i>
                    </a>
                </td>
            </tr>
            <!-- Repeat Rows for more products -->
        </tbody>
    </table>
</div>
<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>