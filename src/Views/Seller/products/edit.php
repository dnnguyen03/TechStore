<?php ob_start(); ?>
<style>
    .img-child {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-fit: center;
    }
</style>
<div class="container">
    <!-- Content Header (Page header) -->
    <section style="margin: 12px 0;">
        <h2>
            <?php if (isset($add) && !$add): ?>
                Sửa thông tin sách
            <?php else: ?>
                Thêm thông tin sách
            <?php endif; ?>
        </h2>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-body">
                <form action="adminProductSave" method="post" enctype="multipart/form-data" class="row g-3">
                    <div class="col-md-6">
                        <label for="product_name" class="form-label">Tên sản phẩm:</label>
                        <input type="text" id="product_name" name="product_name" class="form-control" required value="">
                    </div>

                    <div class="col-md-6">
                        <label for="maloai" class="form-label">Loại sản phẩm:</label>
                        <select id="maloai" name="maloai" class="form-select" required>
                            <option value="">-- Chọn Loại --</option>
                            <option value="">TV</option>
                            <option value="">Tủ lạnh</option>
                            <option value="">Laptop</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="product_decs" class="form-label">Mô tả:</label>
                        <textarea id="product_decs" name="product_decs" class="form-control" required rows="1"></textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="soluong" class="form-label">Số lượng:</label>
                        <input type="number" id="soluong" name="soluong" class="form-control" required value="<?= htmlspecialchars($s['soluong'] ?? '') ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="uploadPhoto" class="form-label">Ảnh minh họa:</label>
                        <input type="file" id="uploadPhoto" name="uploadPhoto" class="form-control" accept="image/*" required
                            onchange="document.getElementById('Photo').src = window.URL.createObjectURL(this.files[0])">
                        <div class="mt-4">
                            <input type="hidden" id="inputPhoto" name="anh" value="<?= htmlspecialchars($s['anh'] ?? '') ?>">
                            <div style="width: 160px; height: 160px; overflow: hidden; border: 2px dashed #ccc;">
                                <img id="Photo" src="<?= htmlspecialchars($s['anh'] ?? 'https://i.pinimg.com/736x/44/3b/27/443b2736feb97a61f590095129a25f15.jpg') ?>"
                                    class="img-thumbnail img-child ">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="gia" class="form-label">Giá:</label>
                        <input type="number" id="gia" name="gia" class="form-control" required value="<?= htmlspecialchars($s['gia'] ?? '') ?>">
                    </div>

                    <div class="col-12">
                        <?php if (isset($add) && !$add): ?>
                            <button type="submit" class="btn btn-primary" name="save" value="edit">
                                <i class="fa fa-floppy-o"></i> Lưu dữ liệu
                            </button>
                        <?php else: ?>
                            <button type="submit" class="btn btn-primary" name="save" value="create">
                                <i class="fa fa-floppy-o"></i> Lưu dữ liệu
                            </button>
                        <?php endif; ?>
                        <a href="/products" class="btn btn-secondary">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>