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
            <?php if (isset($seller['seller_id'])): ?>
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
                <form action="/seller/shops/<?= isset($seller['seller_id']) ? "update/$seller[seller_id]" : 'create' ?>" method="post" enctype="multipart/form-data" class="row g-3">
                    <div class="col-md-6">
                        <label for="shop_name" class="form-label">Tên shop:</label>
                        <input type="text" id="logo_shop" name="shop_name" class="form-control" value="<?= isset($seller['shop_name']) ? $seller['shop_name'] : '' ?>" required>
                    </div>

                    <div class="col-md-6">
                        <label for="phone" class="form-label">Số điện thoại:</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="<?= isset($seller['phone']) ? $seller['phone'] : '' ?>" required>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Email:</label>
                        <input type="text" id="email" name="email" class="form-control" value="<?= isset($seller['email']) ? $seller['email'] : '' ?>" required>
                    </div>

                    <div class="col-md-6">
                        <label for="address" class="form-label">Địa chỉ:</label>
                        <input type="text" id="address" name="address" class="form-control" value="<?= isset($seller['address']) ? $seller['address'] : '' ?>" required>
                    </div>

                    <div class="col-md-12">
                        <label for="bio_seller" class="form-label">Tiểu sử:</label>
                        <textarea id="bio_seller" name="bio_seller" class="form-control" required rows="3"><?= isset($seller['bio_seller']) ? $seller['bio_seller'] : '' ?></textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="uploadPhoto" class="form-label">Shop logo:</label>
                        <input type="file" id="uploadPhoto" name="uploadPhoto" class="form-control" accept="image/*" 
                            onchange="document.getElementById('Photo').src = window.URL.createObjectURL(this.files[0])">
                        <div class="mt-4">
                            <input type="hidden" id="inputPhoto" name="logo_shop" value="<?= isset($seller['logo_shop']) ? $seller['logo_shop'] : '' ?>">
                            <div style="width: 160px; height: 160px; border-radius: 999px; overflow: hidden; border: 2px dashed #ccc;">
                                <img id="Photo" src="<?= isset($seller['logo_shop']) ? '/src/assets/images/'.$seller['logo_shop'] : 'https://i.pinimg.com/736x/44/3b/27/443b2736feb97a61f590095129a25f15.jpg' ?>"
                                    class="img-child ">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="uploadPhoto2" class="form-label">Shop banner:</label>
                        <input type="file" id="uploadPhoto2" name="uploadPhoto2" class="form-control" accept="image/*"
                            onchange="document.getElementById('Photo2').src = window.URL.createObjectURL(this.files[0])">
                        <div class="mt-4">
                            <input type="hidden" id="inputPhoto2" name="banner" value="<?= isset($seller['banner']) ? $seller['banner'] : '' ?>">
                            <div style="width: 400px; height: 160px; overflow: hidden; border: 2px dashed #ccc;">
                                <img id="Photo2" src="<?= isset($seller['banner']) ? '/src/assets/images/'.$seller['banner'] : 'https://i.pinimg.com/736x/44/3b/27/443b2736feb97a61f590095129a25f15.jpg' ?>"
                                    class="img-child ">
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <?php if (isset($seller['seller_id'])): ?>
                            <button type="submit" class="btn btn-primary" name="save" value="update">
                                <i class="fa fa-floppy-o"></i> Lưu dữ liệu
                            </button>
                            <a href="/seller/shops" class="btn btn-secondary">Quay lại</a>
                        <?php else: ?>
                            <button type="submit" class="btn btn-primary" name="save" value="create">
                                <i class="fa fa-floppy-o"></i> Lưu dữ liệu
                            </button>
                            <a href="/" class="btn btn-secondary">Quay lại</a>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<?php $content = ob_get_clean(); ?>

<?php if (isset($seller['seller_id'])) {
    include(__DIR__ . '../../../../../templates/doashboard.php');
} else {
    include(__DIR__ . '../../../../../templates/noLayout.php');
} ?>