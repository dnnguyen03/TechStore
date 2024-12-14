<?php ob_start(); ?>
<style>
    /* Custom Styles */
    .dashboard-card {
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        margin: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .dashboard-header {
        display: flex;
        align-items: center;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .stat-card {
        background-color: #FFF3E2;
        border-radius: 10px;
        padding: 15px;
        margin: 10px;
        text-align: center;
    }

    .stat-card i {
        font-size: 30px;
        color: #FF9C00;
    }

    .stock-summary {
        background-color: #FFF3E2;
        border-radius: 10px;
        padding: 20px;
        margin-top: 30px;
        width: 100%;
    }

    .order-list {
        margin-top: 20px;
        max-height: 400px;
        overflow-y: auto;
    }

    .order-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        background-color: #F9F2EF;
        border-radius: 8px;
        margin-bottom: 10px;
    }

    .order-item span {
        font-weight: bold;
    }

    .status-new {
        color: green;
    }

    .status-on-process {
        color: orange;
    }

    .footer {
        background-color: #F9F2EF;
        padding: 20px;
        border-radius: 10px;
        margin-top: 30px;
        text-align: center;
    }
</style>
<div class="container-fluid">
    <div class="dashboard-header">
        <h2>Dashboard</h2>
    </div>
    </body>

    <div class="row">
        <!-- Stats Section -->
        <div class="col-md-3">
            <div class="stat-card">
                <i class="fa fa-box"></i>
                <h5>240</h5>
                <p>Total Products</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <i class="fa fa-cart-arrow-down"></i>
                <h5>1200</h5>
                <p>Total Sales</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <i class="fa fa-cogs"></i>
                <h5>240</h5>
                <p>Pending Orders</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <i class="fa fa-truck"></i>
                <h5>240</h5>
                <p>On Process to Delivery</p>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Add Product Section -->
        <div class="col-md-6">
            <div class="dashboard-card">
                <h5>Add New Product</h5>
                <p>Introduce your new product to the market.</p>
                <button class="btn btn-outline-warning">Add Product</button>
            </div>
        </div>

        <div class="col-md-6">
            <div class="dashboard-card">
                <h5>Increase Items</h5>
                <p>Increase the product quantity in stock.</p>
                <button class="btn btn-outline-warning">Increase</button>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- New Orders Section -->
        <div class="col-md-12 order-list">
            <h5>New Orders</h5>
            <div class="order-item">
                <span>#2312121315612</span>
                <span>Ahinsa De Silva</span>
                <span>12/12/23</span>
                <span class="status-new">New</span>
            </div>
            <div class="order-item">
                <span>#2312121315612</span>
                <span>Ahinsa De Silva</span>
                <span>12/12/23</span>
                <span class="status-on-process">On Process</span>
            </div>
            <div class="order-item">
                <span>#2312121315612</span>
                <span>Ahinsa De Silva</span>
                <span>12/12/23</span>
                <span class="status-new">New</span>
            </div>
            <div class="order-item">
                <span>#2312121315612</span>
                <span>Ahinsa De Silva</span>
                <span>12/12/23</span>
                <span class="status-on-process">On Process</span>
            </div>
        </div>
    </div>

</div>
<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>