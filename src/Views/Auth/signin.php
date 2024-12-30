
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Tech Store</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff9f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background: #ffffff;
            padding: 40px 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .logo {
            margin-bottom: 20px;
        }

        .logo img {
            width: 150px;
        }

        .container h1 {
            font-size: 28px;
            margin-bottom: 10px;
            color: #333333;
        }

        .container p {
            color: #666;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        a {
            color: #ff9900;
            font-size: 14px;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn {
            width: 100%;
            padding: 12px 15px;
            background-color: #ff9900;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #e68a00;
        }

        .footer-link {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="/src/assets/images/logoTechStore.png" alt="Logo">
        </div>
        <h1>Đăng nhập</h1>
        <p>Đăng nhập bằng tên người dùng và mật khẩu của bạn</p>
        <form action="/signin" method="POST">
            <div class="form-group">
                <input type="text" name="username" placeholder="Tên đăng nhập" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Mật khẩu" required>
            </div>
            <?php if (!empty($_SESSION["loginerror"])): ?>
            <p style="color: red;"><?php echo htmlspecialchars($_SESSION["loginerror"]); ?></p>
        <?php unset($_SESSION["loginerror"]); endif; ?>
            
            <div class="form-group">
                <a href="forgot">Quên mật khẩu?</a>
            </div>
            <button type="submit" class="btn">Đăng nhập</button>
        </form>
        <div class="footer-link">
            <a href="register">Tạo tài khoản</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>