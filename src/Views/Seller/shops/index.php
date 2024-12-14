<?php ob_start(); ?>

<style>
    .shop-create {
        margin-top: 12px;
        padding: 40px 80px;
        font-size: 36px;
        font-weight: 400;
        border: 2px dashed #ccc;
    }

    .shop-banner {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
    }

    .shop-logo {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-bottom: 10px;
    }

    .rating-stars {
        color: #ffc107;
    }

    .rating-text {
        font-weight: bold;
        color: #28a745;
    }

    .report-link {
        color: #ff5722;
        cursor: pointer;
        text-decoration: none;
    }
</style>
<div class="container mt-5">
    <!-- Shop Banner -->
    <div class="shop-banner p-4 shadow">
        <div class="row align-items-center">
            <!-- Shop Logo -->
            <div class="col-md-3 text-center">
                <img src="https://i.pinimg.com/736x/70/d9/a7/70d9a7ecf4628636bf3daf72a45f9990.jpg" alt="Shop Logo" class="shop-logo">
                <h5 class="mt-2">Sanakin.lk Product</h5>
            </div>

            <!-- Shop Information -->
            <div class="col-md-6 text-center">
                <h2 class="mb-2">Shop Name</h2>
                <div class="d-flex justify-content-center align-items-center mb-2">
                    <span class="rating-stars">
                        ★★★★☆
                    </span>
                    <span class="ms-2 rating-text">9.8/10</span>
                </div>
            </div>
        </div>

        <!-- Nature of Business -->
        <div class="mt-4">
            <h5>Nature of Business</h5>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
            </p>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>