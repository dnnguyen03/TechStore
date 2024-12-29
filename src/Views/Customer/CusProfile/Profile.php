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
            <div class="bg-secondary rounded-circle mx-auto" style="width: 120px; height: 120px;"></div>
            <p class="mt-2 text-success fw-bold">✔ Verified Account</p>
        </div>

        <!-- Profile Details -->
        <div class="col-md-9">
            <?php foreach($profiles as $profile): ?>
            <h4>Thông tin tài khoản </h4>
            <p><strong>Họ tên:</strong> <?= $profile['full_name'] ?></p>
            <p><strong>Email:</strong> <?= $profile['email'] ?></p>
            
            <p><strong>Giới tính:</strong> <?= $profile['gender'] ?></p>
            <p><strong>Số điện thoại:</strong> <?= $profile['phone'] ?></p>
            <p><strong>Địa chỉ:</strong> <?= $profile['address'] ?></p>
           
            <?php endforeach; ?>
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