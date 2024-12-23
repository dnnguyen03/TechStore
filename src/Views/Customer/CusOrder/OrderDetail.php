<?php ob_start(); ?>

<div class="container-fluid mt-4 d-flex flex-column" style="min-height: 100vh;">
    <div class="row flex-grow-1">
        <!-- Header thông tin đơn hàng -->
        <div class="col-12">
            <div class="info-section p-3 rounded shadow-sm">
                <?php foreach ($orders as $order): ?>
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Mã đơn hàng:</strong> <?= $order['OrderID'] ?> </p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Shop:</strong> <?= $order['ShopName'] ?></p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Ngày đặt:</strong> <?= $order['OrderDate'] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Delivery Code:</strong> <span class="text-warning fw-bold">A1B2C3</span></p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Trạng thái:</strong> <span class="badge bg-primary"><?= $order['OrderStatus'] ?></span></p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Tổng tiền:</strong> <?= $order['TotalAmount'] ?></p>
                        </div>
                    </div>
                <?php
                    $status = $order['OrderStatus'];
                endforeach; ?>
            </div>
        </div>

        <!-- Danh sách sản phẩm -->
        <div class="col-12 pt-2 pb-2">
            <div class="right-column p-3 rounded shadow-sm">
                <h6 class="fw-bold mb-3">Danh sách sản phẩm</h6>
                <?php foreach ($orderDetails as $orderDetail): ?>
                    <div class="product-item d-flex align-items-center mb-3">
                        <img src="" alt="Product" class="me-3 rounded">
                        <div class="flex-grow-1">
                            <h6 class="mb-1"><?= $orderDetail['ProductName'] ?></h6>
                            <p class="mb-0">Số lượng: <?= $orderDetail['Quantity'] ?></p>
                        </div>
                        <div><strong><?= $orderDetail['Price'] ?></strong></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Phần đánh giá -->
        <?php if ($status === 'Đã giao') { ?>
            <div class="col-12">
                <div class="rating-section p-3 rounded shadow-sm">
                    <h6 class="fw-bold mb-3">Đánh giá đơn hàng</h6>
                    <form action="/customer/report/create" method="POST">
                        <!-- Đánh giá số sao -->
                        <div class="mb-3">
                            <label for="rating" class="form-label">Đánh giá Shop :</label>
                            <div id="rating" class="rating">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <input type="radio" id="star<?= $i ?>" name="rating" value="<?= $i ?>" required>
                                    <label for="star<?= $i ?>" class="star">★</label>
                                <?php endfor; ?>
                            </div>
                        </div>

                        <!-- Phản hồi -->
                        <!-- Chọn mô tả phản hồi -->
                        <div class="mb-3">
                            <label class="form-label">Chọn mô tả phản hồi:</label>
                            <div id="feedbackButtons" class="d-flex flex-wrap gap-2">
                                <button type="button" class="btn btn-outline-primary" data-value="Sản phẩm bị lỗi">Sản phẩm bị lỗi</button>
                                <button type="button" class="btn btn-outline-primary" data-value="Không đúng mô tả">Không đúng mô tả</button>
                                <button type="button" class="btn btn-outline-primary" data-value="Đóng gói kém">Đóng gói kém</button>
                                <button type="button" class="btn btn-outline-primary" data-value="Giao hàng chậm">Giao hàng chậm</button>
                                <button type="button" class="btn btn-outline-primary" data-value="Khác">Khác</button>
                            </div>
                            <!-- Input ẩn để lưu giá trị được chọn -->
                            <input type="hidden" id="feedbackType" name="feedbackType" required>
                        </div>

                        <!-- Nhập chi tiết phản hồi (ẩn mặc định) -->
                        <div class="mb-3" id="detailsSection" style="display: none;">
                            <label for="feedbackDetails" class="form-label">Chi tiết phản hồi:</label>
                            <textarea class="form-control" id="feedbackDetails" name="feedbackDetails" rows="4"
                                placeholder="Viết chi tiết phản hồi của bạn tại đây..." required></textarea>
                        </div>

                        <!-- Nút gửi đánh giá -->
                        <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- Footer hành động -->
    <div class="row">
        <div class="col-12 footer-action d-flex justify-content-between align-items-center">
            <button type="button" class="btn btn-secondary">
                <a href="/orders" style="text-decoration: none; color: black;">Quay lại</a>
            </button>
            <?php if ($status === 'Đang xử lý') { ?>
                <button type="button" class="btn btn-warning">Hủy đơn hàng</button>
            <?php } ?>
        </div>
    </div>
</div>

<style>
    /* Style for stars */
    #rating input[type="radio"] {
        display: none;
        /* Ẩn input để chỉ hiển thị ngôi sao */
    }

    #rating .star {
        font-size: 2rem;
        color: #ccc;
        /* Màu mặc định là xám */
        cursor: pointer;
    }

    #rating .star:hover,
    #rating .star:hover~.star {
        color: gold;
        /* Màu khi di chuột qua */
    }

    #rating input[type="radio"]:checked~label.star {
        color: gold;
        /* Màu của ngôi sao khi được chọn */
    }

    /* Áp dụng màu cho các ngôi sao phía trước ngôi sao được chọn */
    #rating input[type="radio"]:checked+label.star,
    #rating input[type="radio"]:checked+label.star~label.star {
        color: gold;
    }

    .info-section {
        background: #f8f9fa;
        border: 1px solid #ddd;
    }

    .right-column {
        background: #fff;
        border: 1px solid #ddd;
        max-height: 350px;
        overflow-y: auto;
    }

    .product-item {
        border-bottom: 1px solid #eee;
    }

    .product-item:last-child {
        border-bottom: none;
    }

    /* Style for stars */
    .rating-section {
        background: #f8f9fa;
        border: 1px solid #ddd;
        margin-bottom: 10px;
        /* Thêm khoảng cách khi có đánh giá */
    }

    #rating input[type="radio"] {
        display: none;
    }

    #rating label {
        cursor: pointer;
    }
</style>

<script>
    document.querySelectorAll('#rating input[type="radio"]').forEach((radio) => {
        radio.addEventListener('change', function() {
            const value = this.value;

            // Reset tất cả ngôi sao về màu xám
            document.querySelectorAll('#rating .star').forEach((star) => {
                star.style.color = '#ccc';
            });

            // Thay đổi màu cho các ngôi sao được chọn và phía trước
            for (let i = 1; i <= value; i++) {
                document.querySelector(`#star${i} + label.star`).style.color = 'gold';
            }
        });
    });

    // Lấy danh sách các nút và phần nhập chi tiết
    const feedbackButtons = document.querySelectorAll("#feedbackButtons button");
    const feedbackInput = document.getElementById("feedbackType");
    const detailsSection = document.getElementById("detailsSection");

    // Thêm sự kiện khi nhấn vào nút phản hồi
    feedbackButtons.forEach(button => {
        button.addEventListener("click", function() {
            // Bỏ chọn tất cả nút
            feedbackButtons.forEach(btn => btn.classList.remove("btn-primary"));
            feedbackButtons.forEach(btn => btn.classList.add("btn-outline-primary"));

            // Đánh dấu nút được chọn
            this.classList.remove("btn-outline-primary");
            this.classList.add("btn-primary");

            // Cập nhật giá trị vào input ẩn
            feedbackInput.value = this.getAttribute("data-value");

            // Hiển thị phần nhập chi tiết
            detailsSection.style.display = "block";
        });
    });
</script>


<?php $content = ob_get_clean(); ?>

<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>