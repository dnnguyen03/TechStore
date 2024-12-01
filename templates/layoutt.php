<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .sidebar {
            background-color: #343a40;
            color: white;
            min-height: 100vh;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
        }
        .sidebar a:hover {
            text-decoration: underline;
        }
        .profile-img {
            border-radius: 50%;
        }
        .status-badge {
            border-radius: 15px;
            padding: 5px 10px;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 sidebar p-4">
            <div class="d-flex align-items-center mb-4">
                <img src="https://storage.googleapis.com/a1aa/image/ewQQge6q2gqFZ0wZIwfqrwO7dJ9mVoIrRmxeEqrE0emHKCveE.jpg" 
                     alt="Logo" width="40" height="40" class="me-2">
                <h4 class="m-0">sanakin.lk</h4>
            </div>
            <ul class="list-unstyled">
                <li class="mb-3">
                    <a class="d-flex align-items-center p-2 bg-warning text-dark rounded" href="#">
                        <i class="fas fa-list-alt me-2"></i> My Orders
                    </a>
                </li>
                <li class="mb-3">
                    <a class="d-flex align-items-center p-2" href="#">
                        <i class="fas fa-exclamation-circle me-2"></i> Complaint
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center p-2" href="#">
                        <i class="fas fa-comments me-2"></i> CusChat
                    </a>
                </li>
            </ul>
            <div class="mt-5">
                <div class="d-flex align-items-center mb-3">
                    <img src="https://storage.googleapis.com/a1aa/image/XVm0UNI7mj5MPVr0evxIBog5peojjb6oi3SCx6AhupSOR41TA.jpg" 
                         alt="Profile Picture" width="40" height="40" class="profile-img me-2">
                    <div>
                        <p class="m-0 fw-bold">Amishka</p>
                        <p class="m-0 text-warning">Customer</p>
                    </div>
                </div>
                <button class="btn btn-light text-dark w-100">
                    <i class="fas fa-sign-out-alt me-2"></i> Log out
                </button>
            </div>
        </div>
        <!-- Main Content -->
        <?= $content ?>
    </div>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
