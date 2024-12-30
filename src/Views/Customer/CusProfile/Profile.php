<?php ob_start(); ?>
<div class="container mt-3 bg-white p-4 rounded shadow-sm">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Tài khoản của tôi</h2>

    </div>

    <!-- Profile Content -->
    <div class="row">
        <!-- Profile Avatar -->
        <div class="col-md-3 text-center">
            <div class="bg-secondary rounded-circle mx-auto" style="width: 120px; height: 120px; overflow: hidden;">

                <img src="<?= isset($profile['avata']) && $profile['avata'] != null ? "/src/assets/images/" . $profile['avata'] : '/src/assets/images/no_img.png' ?>" 
     alt="Avatar" style="width: 100%; height: 100%; object-fit: cover; object-position: center;">

            </div>

        </div>

        <!-- Profile Details -->
        <div class="col-md-9">

            <h4>Thông tin tài khoản </h4>
            <p><strong>Họ tên:</strong> <?= isset($profile['full_name']) ? $profile['full_name'] : 'Chưa cập nhật' ?></p>
            <p><strong>Email:</strong> <?= isset($profile['email']) ? $profile['email'] : 'Chưa cập nhật' ?></p>
            <p><strong>Giới tính:</strong> <?= isset($profile['gender']) ? $profile['gender'] : 'Chưa cập nhật' ?></p>
            <p><strong>Số điện thoại:</strong> <?= isset($profile['phone']) ? $profile['phone'] : 'Chưa cập nhật' ?></p>
            <p><strong>Địa chỉ:</strong> <?= isset($profile['address']) ? $profile['address'] : 'Chưa cập nhật' ?></p>



        </div>
    </div>

    <!-- Settings Button -->
    <div class="text-center mt-4">
        <a href="/profile/edit" class="btn btn-primary w-20 mb-2 py-2 text-white fw-bold">
            <i class="fa-solid fa-user me-2"></i> Chỉnh sửa thông tin
        </a>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>