<!-- /templates/layout.php -->
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
        input[type="email"], input[type="password"] {
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
        <h1>Sign In</h1>
        <p>Sign in with your email address and password</p>
        <form action="process_login.php" method="POST">
            <div class="form-group">
                <input type="email" name="email" placeholder="Email Address" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <a href="forgot">Forgot password?</a>
            </div>
            <button type="submit" class="btn">Sign in</button>
        </form>
        <div class="footer-link">
            <a href="register">Create Account</a>
        </div>
    </div>

    <!-- Include Bootstrap JS and Popper.js via CDN (required for Bootstrap JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
