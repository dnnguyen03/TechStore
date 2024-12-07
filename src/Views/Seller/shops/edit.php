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
                    <div class="col-md-6">
                        <label for="shop_name" class="form-label">Tên shop:</label>
                        <input type="text" id="tensach" name="shop_name" class="form-control" required >
                    </div>

                    <div class="col-md-6">
                        <label for="tacgia" class="form-label">Số điện thoại:</label>
                        <input type="text" id="tacgia" name="tacgia" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label for="tacgia" class="form-label">Email:</label>
                        <input type="text" id="tacgia" name="tacgia" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label for="product_decs" class="form-label">Tiểu sử:</label>
                        <textarea id="product_decs" name="product_decs" class="form-control" required rows="1"></textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="uploadPhoto" class="form-label">Shop logo:</label>
                        <input type="file" id="uploadPhoto" name="uploadPhoto" class="form-control" accept="image/*" required
                            onchange="document.getElementById('Photo').src = window.URL.createObjectURL(this.files[0])">
                        <div class="mt-4">
                            <input type="hidden" id="inputPhoto" name="anh" >
                            <div style="width: 160px; height: 160px; border-radius: 999px; overflow: hidden; border: 2px dashed #ccc;">
                                <img id="Photo" src="<?= htmlspecialchars($s['anh'] ?? 'https://i.pinimg.com/736x/44/3b/27/443b2736feb97a61f590095129a25f15.jpg') ?>"
                                    class="img-thumbnail img-child ">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="uploadPhoto3" class="form-label">Shop banner:</label>
                        <input type="file" id="uploadPhoto3" name="uploadPhoto3" class="form-control" accept="image/*" required
                            onchange="document.getElementById('Photo2').src = window.URL.createObjectURL(this.files[0])">
                        <div class="mt-4">
                            <input type="hidden" id="inputPhoto2" name="anh2" >
                            <div style="width: 400px; height: 160px; overflow: hidden; border: 2px dashed #ccc;">
                                <img id="Photo2" src="<?= htmlspecialchars($s['anh'] ?? 'https://i.pinimg.com/736x/44/3b/27/443b2736feb97a61f590095129a25f15.jpg') ?>"
                                    class="img-thumbnail img-child ">
                            </div>
                        </div>
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