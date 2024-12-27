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
            <?php if (isset($photo['photo_id'])): ?>
                Sửa thông tin ảnh
            <?php else: ?>
                Thêm thông tin ảnh
            <?php endif; ?>
        </h2>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-body">
                <form action="/seller/products/photo/<?= isset($photo['photo_id']) ? "update/$photo[photo_id]" : 'create' ?>" method="post" enctype="multipart/form-data" class="row g-3">
                    <input type="hidden" value="<?= $product_id ?>" name="product_id" />
                    <div class="col-md-12">
                        <label for="uploadPhoto" class="form-label">Ảnh minh họa:</label>
                        <input type="file" id="uploadPhoto" name="uploadPhoto" class="form-control" accept="image/*"
                            onchange="document.getElementById('Photo').src = window.URL.createObjectURL(this.files[0])">
                        <div class="mt-4">
                            <input type="hidden" id="inputPhoto" name="image" value="<?= isset($photo['image']) ? $photo['image'] : '' ?>">
                            <div style="width: 160px; height: 160px; overflow: hidden; border: 2px dashed #ccc;">
                                <img id="Photo" src="<?= isset($photo['image']) ? '/src/assets/images/' . $photo['image'] : 'https://i.pinimg.com/736x/44/3b/27/443b2736feb97a61f590095129a25f15.jpg' ?>"
                                    class="img-thumbnail img-child ">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="description" class="form-label">Mô tả:</label>
                        <input type="text" id="description" name="description" class="form-control"
                            value="<?= isset($photo['description']) ? $photo['description'] : '' ?>">
                    </div>
                    <div class="col-md-12">
                        <label for="display_order" class="form-label">Thứ tự hiển thị:</label>
                        <input type="number" id="display_order" name="display_order" class="form-control" required
                            value="<?= isset($photo['display_order']) ? $photo['display_order'] : '' ?>">
                    </div>
                    <div class="col-md-12">
                        <label for="is_hidden" class="form-label">Ẩn ảnh:</label>
                        <div class="form-check">
                            <input type="checkbox" id="is_hidden" name="is_hidden" class="form-check-input" value="1"
                                <?= isset($photo['is_hidden']) ? ($photo['is_hidden'] == 1 ? 'checked' : '') : '' ?>>
                            <label class="form-check-label" for="is_hidden">Đang ẩn</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-floppy-o"></i> Lưu dữ liệu
                        </button>
                        <a href="/seller/products/update/<?= $product_id ?>" class="btn btn-secondary">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../../templates/doashboard.php'); ?>