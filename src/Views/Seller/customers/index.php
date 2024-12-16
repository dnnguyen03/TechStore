<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Table</title>
    <style>
        .form-search {
            width: 100%;
            display: flex;
            justify-content: end;
            align-items: center;
            gap: 16px;
        }

        .flex-1 {
            flex-grow: 1;
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Quản lý khách hàng</h2>
        </div>
        <div class="d-flex mb-3 ">
            <form class="form-search">
                <div class="flex-1">
                    <input type="text" class="form-control" placeholder="Tìm kiếm" aria-label="Tìm kiếm">
                </div>

                <div>
                    <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
                </div>
            </form>
        </div>
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Per.Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example Row -->
                <tr>
                    <td>#231212135612</td>
                    <td>Adidas slippers</td>
                    <td>Men's Cloth</td>
                    <td>20/11</td>
                    <td>Rs.100,000.00</td>
                    <td>
                        <span class="status-badge status-live">Live</span>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Edit
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Edit</a></li>
                            <li><a class="dropdown-item" href="#">Feedback</a></li>
                        </ul>
                    </td>
                </tr>
                <!-- Repeat Rows for more products -->
            </tbody>
        </table>
    </div>
</body>

</html>


<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>