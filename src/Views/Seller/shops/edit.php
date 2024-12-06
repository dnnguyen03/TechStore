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
                Sửa thông tin shop
            <?php else: ?>
                Khởi tạo shop của bạn
            <?php endif; ?>
        </h2>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-body">
                <form action="adminProductSave" method="post" enctype="multipart/form-data" class="row g-3">
                    <!-- Mã sách -->
                    <div class="col-md-6">
                        <label for="masach" class="form-label">Mã sách:</label>
                        <?php if (isset($add) && !$add): ?>
                            <input type="text" id="masach" name="masach" class="form-control" readonly value="<?= htmlspecialchars($s['masach']) ?>">
                        <?php else: ?>
                            <input type="text" id="masach" name="masach" class="form-control" required value="<?= htmlspecialchars($s['masach'] ?? '') ?>">
                        <?php endif; ?>
                    </div>

                    <!-- Tên sách -->
                    <div class="col-md-6">
                        <label for="tensach" class="form-label">Tên sách:</label>
                        <input type="text" id="tensach" name="tensach" class="form-control" required value="<?= htmlspecialchars($s['tensach'] ?? '') ?>">
                    </div>

                    <!-- Tác giả -->
                    <div class="col-md-6">
                        <label for="tacgia" class="form-label">Tác giả:</label>
                        <input type="text" id="tacgia" name="tacgia" class="form-control" value="<?= htmlspecialchars($s['tacgia'] ?? '') ?>">
                    </div>

                    <!-- Loại sách -->
                    <div class="col-md-6">
                        <label for="maloai" class="form-label">Loại sách:</label>
                        <select id="maloai" name="maloai" class="form-select" required>
                            <option value="">-- Chọn Loại sách --</option>
                            <?php if (!empty($loai)): ?>
                                <?php foreach ($loai as $l): ?>
                                    <option value="<?= htmlspecialchars($l['maloai']) ?>" <?= (isset($s['maloai']) && $s['maloai'] == $l['maloai']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($l['tenloai']) ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <!-- Số lượng -->
                    <div class="col-md-6">
                        <label for="soluong" class="form-label">Số lượng:</label>
                        <input type="number" id="soluong" name="soluong" class="form-control" value="<?= htmlspecialchars($s['soluong'] ?? '') ?>">
                    </div>

                    <!-- Giá -->
                    <div class="col-md-6">
                        <label for="gia" class="form-label">Giá:</label>
                        <input type="number" id="gia" name="gia" class="form-control" required value="<?= htmlspecialchars($s['gia'] ?? '') ?>">
                    </div>

                    <!-- Ảnh 1 -->
                    <div class="col-md-6">
                        <label for="uploadPhoto" class="form-label">Shop logo:</label>
                        <input type="file" id="uploadPhoto" name="uploadPhoto" class="form-control" accept="image/*"
                            onchange="document.getElementById('Photo').src = window.URL.createObjectURL(this.files[0])">
                        <div class="mt-4">
                            <input type="hidden" id="inputPhoto" name="anh" value="<?= htmlspecialchars($s['anh'] ?? '') ?>">
                            <div style="width: 160px; height: 160px; border-radius: 999px; overflow: hidden; border: 2px dashed #ccc;">
                                <img id="Photo" src="<?= htmlspecialchars($s['anh'] ?? 'https://i.pinimg.com/736x/44/3b/27/443b2736feb97a61f590095129a25f15.jpg') ?>"
                                    class="img-thumbnail img-child ">
                            </div>
                        </div>
                    </div>

                    <!-- Ảnh 2 -->
                    <div class="col-md-6">
                        <label for="uploadPhoto3" class="form-label">Shop banner:</label>
                        <input type="file" id="uploadPhoto3" name="uploadPhoto3" class="form-control" accept="image/*"
                            onchange="document.getElementById('Photo2').src = window.URL.createObjectURL(this.files[0])">
                        <div class="mt-4">
                            <input type="hidden" id="inputPhoto2" name="anh2" value="<?= htmlspecialchars($s['anh'] ?? '') ?>">
                            <div style="width: 400px; height: 160px; overflow: hidden; border: 2px dashed #ccc;">
                                <img id="Photo2" src="<?= htmlspecialchars($s['anh'] ?? 'https://i.pinimg.com/736x/44/3b/27/443b2736feb97a61f590095129a25f15.jpg') ?>"
                                    class="img-thumbnail img-child ">
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
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