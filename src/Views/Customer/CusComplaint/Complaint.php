<?php ob_start(); ?>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .main-content {
            margin-left: 260px;
            /* Đảm bảo không đè lên sidebar */
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 1.5rem;
            font-weight: bold;
            margin: 0;
        }

        .header span {
            font-size: 0.9rem;
            color: #666;
        }

        .table-container {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead th {
            background-color: #f1f1f1;
            font-weight: bold;
            text-align: left;
            padding: 10px;
        }

        table tbody td {
            padding: 10px;
            border-top: 1px solid #ddd;
            vertical-align: middle;
        }

        table tbody tr:hover {
            background-color: #f7f7f7;
        }

        .view-btn {
            background: none;
            border: none;
            font-size: 1rem;
            color: #007bff;
            cursor: pointer;
        }

        .view-btn:hover {
            text-decoration: underline;
        }
    </style>



    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <h1>Complaints & Reporting</h1>
            <span>12th January of 2023, 12:00 pm</span>
        </div>

        <!-- Table -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Complaint ID</th>
                        <th>Subject</th>
                        <th>Sent Date</th>
                        <th>Kind of</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#231212135612</td>
                        <td>This shop is fake</td>
                        <td>12/12/23</td>
                        <td>Shop</td>
                        <td>
                            <button class="view-btn" data-bs-toggle="modal" data-bs-target="#complaintModal">&gt;</button>
                        </td>
                    </tr>
                    <tr>
                        <td>#231212135612</td>
                        <td>my order is not received</td>
                        <td>12/12/23</td>
                        <td>Order</td>
                        <td><button class="view-btn">&gt;</button></td>
                    </tr>
                    <tr>
                        <td>#231212135612</td>
                        <td>my order is not received</td>
                        <td>12/12/23</td>
                        <td>Product</td>
                        <td><button class="view-btn">&gt;</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>