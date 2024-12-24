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
        <form class="form-search" action="/seller/products" method="get">
            <div>
                <select class="form-select" aria-label="Select Loại" name="category">
                    <option value="0" selected>Chọn loại</option>
                    <option value="1">Loại 1</option>
                    <option value="2">Loại 2</option>
                    <option value="3">Loại 3</option>
                </select>
            </div>

            <div>
                <select class="form-select" aria-label="Select Status" name="status">
                    <option value="2" <?= $status == 2 ? 'selected' : '' ?>>Chọn trạng thái</option>
                    <option value="1" <?= $status == 1 ? 'selected' : '' ?>>Đang bán</option>
                    <option value="0" <?= $status == 0 ? 'selected' : '' ?>>Hết hàng</option>
                </select>
            </div>

            <div class="flex-1">
                <input type="text" class="form-control" placeholder="Tìm kiếm" aria-label="Tìm kiếm" name="searchValue" value="<?= $searchValue ?>">
            </div>

            <div>
                <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
            </div>

            <div>
                <a href="/seller/products/create" class="btn" style="background-color: #FF9C00; color: white;">+ Bổ sung</a>
            </div>
        </form>
    </div>
    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th style="width: 50px;">Ảnh</th>
                <th>Tên mặt hàng</th>
                <th>Loại hàng</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Trạng thái</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td>
                        <div style="width: 50px; height: 50px; overflow: hidden;">
                            <img style="width: 100%; height: 100%; object-fit: cover; object-position: center;" src="<?= isset($product['image']) ? '/src/assets/images/'.$product['image'] : 'https://i.pinimg.com/736x/8a/cc/89/8acc896ba2585a9f46555f1138fc5d96.jpg' ?>" alt="product">
                        </div>
                    </td>
                    <td><?= $product['product_name'] ?></td>
                    <td><?= $product['category_id'] ?></td>
                    <td><?= $product['quantity'] ?></td>
                    <td><?= $product['price'] ?></td>
                    <td>
                        <?php if ($product['status'] == 1): ?>
                            <p style="color: green;">Đang bán</p>
                        <?php else: ?>
                            <p style="color: red;">Hết hàng</p>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <a href="/seller/products/update/<?= $product['product_id'] ?>" class="btn btn-primary btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>

                        <a href="/seller/products/delete/<?= $product['product_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Xác nhận xóa sản phẩm?')">
                            <i class="fa-regular fa-trash-can"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php else: ?>
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
                                href="<?= ($p != $page) ? "/seller/products?page=$p&category=" . $category . "&status=" . $status . "&searchValue=" . $searchValue : '#' ?>">
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