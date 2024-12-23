<?php ob_start(); ?>
<style>
    .img-child {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }
</style>
<div class="container">
    <!-- Content Header (Page header) -->
    <section style="margin: 12px 0;">
        <h2>
            <?php if (isset($product['product_id'])): ?>
                Sửa thông tin sản phẩm
            <?php else: ?>
                Thêm thông tin sản phẩm
            <?php endif; ?>
        </h2>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-body">
                <form action="/seller/products/<?= isset($product['product_id']) ? "update/$product[product_id]" : 'create' ?>" method="post" enctype="multipart/form-data" class="row g-3">
                    <div class="col-md-12">
                        <label for="product_name" class="form-label">Tên sản phẩm:</label>
                        <input type="text" id="product_name" name="product_name" class="form-control" required
                            value="<?= isset($product['product_name']) ? $product['product_name'] : '' ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="category_id" class="form-label">Loại sản phẩm:</label>
                        <select id="category_id" name="category_id" class="form-select" required>
                            <option value="">-- Chọn Loại --</option>
                            <option value="1">TV</option>
                            <option value="2">Tủ lạnh</option>
                            <option value="3">Laptop</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="product_decs" class="form-label">Mô tả:</label>
                        <textarea id="product_decs" name="product_decs" class="form-control" required rows="1"><?= isset($product['product_decs']) ? $product['product_decs'] : '' ?></textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="quantity" class="form-label">Số lượng:</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" required value="<?= isset($product['quantity']) ? $product['quantity'] : '' ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="status" class="form-label">Trạng thái:</label>
                        <div class="form-check">
                            <input type="checkbox" id="status" name="status" class="form-check-input" value="1"
                                <?= isset($product['status']) ? ($product['status'] == 0 ? '' : 'checked') : 'checked' ?>>
                            <label class="form-check-label" for="status">Đang bán</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="uploadPhoto" class="form-label">Ảnh minh họa:</label>
                        <input type="file" id="uploadPhoto" name="uploadPhoto" class="form-control" accept="image/*"
                            onchange="document.getElementById('Photo').src = window.URL.createObjectURL(this.files[0])">
                        <div class="mt-4">
                            <input type="hidden" id="inputPhoto" name="image" value="<?= isset($product['image']) ? '/src/assets/images/'.$product['image'] : '' ?>">
                            <div style="width: 160px; height: 160px; overflow: hidden; border: 2px dashed #ccc;">
                                <img id="Photo" src="<?= isset($product['image']) ? '/src/assets/images/'.$product['image'] : 'https://i.pinimg.com/736x/44/3b/27/443b2736feb97a61f590095129a25f15.jpg' ?>"
                                    class="img-thumbnail img-child ">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="price" class="form-label">Giá:</label>
                        <input type="number" id="price" name="price" class="form-control" required value="<?= isset($product['price']) ? $product['price'] : '' ?>">
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-floppy-o"></i> Lưu dữ liệu
                        </button>
                        <a href="/seller/products" class="btn btn-secondary">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <?php if (isset($product['product_id'])) { ?>
        <section style="margin-top: 24px;">
            <h3>Danh sách ảnh</h3>
            <div class="card">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 60px;">Ảnh</th>
                            <th>Mô tả</th>
                            <th style="width: 200px;">Thứ tự</th>
                            <th style="width: 200px;">Ẩn ảnh</th>
                            <th style="width: 100px; text-align: center;">
                                <a href="/seller/products/photo/create?product_id=<?= $product['product_id'] ?>" class="btn btn-success btn-sm"><i class="fa-solid fa-plus"></i></a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($photos as $photo): ?>
                            <tr>
                                <td>
                                    <div style="width: 60px; height: 60px; overflow: hidden;">
                                        <img style="width: 100%; height: 100%; object-fit: cover; object-position: center;" src="<?= isset($photo['image']) ? '/src/assets/images/'.$photo['image'] : 'https://i.pinimg.com/736x/8a/cc/89/8acc896ba2585a9f46555f1138fc5d96.jpg' ?>" alt="photo">
                                    </div>
                                </td>
                                <td><?= $photo['description'] ?></td>
                                <td><?= $photo['display_order'] ?></td>
                                <td>
                                    <?php if ($photo['is_hidden'] == 0): ?>
                                        <p style="color: green;">Đang hiện</p>
                                    <?php else: ?>
                                        <p style="color: red;">Đang ẩn</p>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <a href="/seller/products/photo/update/<?= $photo['photo_id'] ?>?product_id=<?= $product['product_id'] ?>" class="btn btn-primary btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>

                                    <a href="/seller/products/photo/delete/<?= $photo['photo_id'] ?>?product_id=<?= $product['product_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Xác nhận xóa ảnh?')">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    <?php } ?>
</div>

<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>