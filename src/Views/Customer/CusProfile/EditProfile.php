<?php ob_start(); ?>
<div class="container mt-4">
    <div class="card shadow p-4">
        <h2 class="text-center mb-4">Chỉnh sửa hồ sơ của bạn</h2>

        <!-- Form -->
        <form action="/profile/edit" enctype="multipart/form-data" method="POST">
           
            <div class="row">


                <!-- Full Name -->
                <div class="mb-3">
                    <label for="fullName" class="form-label">Họ và tên</label>
                    <input type="text" id="fullName" name="full_name" class="form-control" placeholder="Họ tên" value='<?= $profile['full_name'] ?>' required>
                </div>


                <!-- NIC Number -->
                <div class="col-md-6 mb-3">
                    <label for="nic" class="form-label">Số điện thoại</label>
                    <input type="text" id="nic" name="phone" class="form-control" placeholder="Số điện thoại" value='<?= $profile['phone'] ?>' required>
                </div>
                <!-- Mobile Number -->
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="Email" value='<?= $profile['email'] ?>' required>
                </div>


                <!-- Gender -->
                <div class="col-md-6 mb-3">
                    <label for="gender" class="form-label">Giới tính</label>
                    <select id="gender" name="gender" class="form-select" required>

                        <option value="Nam" <?= $profile['gender'] == 'Nam' ? 'selected' : '' ?>>Nam</option>
                        <option value="Nữ" <?= $profile['gender'] == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
                    </select>
                </div>


                <div class="mb-3 col-md-6">
                    <!-- Street Address -->
                    <label for="streetAddress" class="form-label">Địa chỉ</label>
                    <input type="text" id="streetAddress" name="address" class="form-control" placeholder="Địa chỉ" value='<?= $profile['address'] ?>' required>
                </div>


                <div class="col-md-12">
                    <label for="uploadPhoto" class="form-label">Ảnh đại diện:</label>
                    <input type="file" id="uploadPhoto" name="uploadPhoto" class="form-control" accept="image/*" <?= isset($profile['avata']) ? '' : 'required' ?>
                        onchange="document.getElementById('Photo').src = window.URL.createObjectURL(this.files[0])">
                    <div class="mt-4">
                        <input type="hidden" id="inputPhoto" name="logo_shop" value="<?= isset($profile['avata']) ? $profile['avata'] : '' ?>">
                        <div style="width: 160px; height: 160px; border-radius: 999px; overflow: hidden; border: 2px dashed #ccc;">
                            <img id="Photo" src="<?= isset($profile['avata']) ? $profile['avata'] : 'https://i.pinimg.com/736x/44/3b/27/443b2736feb97a61f590095129a25f15.jpg' ?>"
                                class="img-child " style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
                        </div>
                    </div>
                </div>
            </div>


            <!-- Save Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-warning text-white px-5 py-2">
                    Lưu
                </button>
            </div>

        </form>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>