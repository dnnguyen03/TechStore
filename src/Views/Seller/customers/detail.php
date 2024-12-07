<?php ob_start(); ?>
<style>
    .profile-header {
        margin-top: 30px;
    }

    .profile-header h1 {
        font-size: 32px;
        color: #333;
    }

    .profile-header .details {
        text-align: right;
    }

    .order-status-btn {
        margin-left: 10px;
    }

    .order-status-btn.new {
        background-color: #007bff;
        color: white;
    }

    .order-status-btn.on-process {
        background-color: #fd7e14;
        color: white;
    }

    .order-status-btn.on-delivery {
        background-color: #6f42c1;
        color: white;
    }

    .order-status-btn.done {
        background-color: #28a745;
        color: white;
    }

    .order-list {
        margin-top: 20px;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .order-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .order-item:last-child {
        border-bottom: none;
    }

    .order-item .order-id {
        font-weight: bold;
    }

    .order-item .order-date {
        color: #6c757d;
    }
</style>

<div class="container">
    <!-- Profile Header -->
    <div class="profile-header">
        <h2 style="margin-bottom: 16px;">Chi tiết khách hàng</h2>
        <div>
            <p>Họ tên: <strong>Trần Mạnh Mẽ</strong></p>
            <p>Địa chỉ: 77 Nguyễn Huệ, TP Huế</p>
            <p>Telephone / Mobile: 076 1 234 567</p>
        </div>
        <div class="details">
            <h2>Total Earning - Rs. <span style="color: #fd7e14;">500,000.00</span> VNĐ</h2>
        </div>
    </div>

    <!-- Orders List -->
    <div class="order-list">
        <div class="order-item">
            <div>
                <div class="order-id">#231212135612</div>
                <div class="order-date">12/12/23</div>
            </div>
            <div>Rs. 100,000.00</div>
            <button class="btn order-status-btn new">New</button>
        </div>
        <div class="order-item">
            <div>
                <div class="order-id">#231212135612</div>
                <div class="order-date">12/12/23</div>
            </div>
            <div>Rs. 100,000.00</div>
            <button class="btn order-status-btn on-process">On Process</button>
        </div>
        <div class="order-item">
            <div>
                <div class="order-id">#231212135612</div>
                <div class="order-date">12/12/23</div>
            </div>
            <div>Rs. 100,000.00</div>
            <button class="btn order-status-btn on-delivery">On Delivery</button>
        </div>
        <div class="order-item">
            <div>
                <div class="order-id">#231212135612</div>
                <div class="order-date">12/12/23</div>
            </div>
            <div>Rs. 100,000.00</div>
            <button class="btn order-status-btn done">Done</button>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>

