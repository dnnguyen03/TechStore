<?php ob_start(); ?>
<div class="container mt-4 bg-white p-4 rounded shadow-sm">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">My Profile</h2>
        <p class="text-muted">12th January of 2023, 12:00 pm</p>
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
            <h4>Name: Amishka Dissanayake</h4>
            <p><strong>Full Name:</strong> Amishka Janith Dissanayake</p>
            <p><strong>NIC:</strong> 200028702523</p>
            <p><strong>Birthday:</strong> 2000/10/13</p>
            <p><strong>Gender:</strong> Male</p>
            <p><strong>Contact Number:</strong> 076 3 133 646</p>
            <p><strong>Address:</strong> 42B/3, Buddhaloka Mawatha, Suwarapola, Piliyandala</p>
            <p><strong>City:</strong> Piliyandala</p>
            <p><strong>Zip Code:</strong> 10300</p>
        </div>
    </div>

    <!-- Settings Button -->
    <div class="text-center mt-4">
        <button class="btn btn-warning px-4 py-2 fw-bold">Settings</button>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>