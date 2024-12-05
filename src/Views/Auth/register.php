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
            position: relative;
        }
        .logo {
            margin-bottom: 20px;
        }
        .logo img {
            width: 150px;
        }
        .container h1 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #333333;
        }
        .tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .tab {
            flex: 1;
            padding: 10px;
            cursor: pointer;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
            font-size: 14px;
            background-color: #f9f9f9;
        }
        .tab.active {
            background-color: #ff9900;
            color: #fff;
            font-weight: bold;
            border: none;
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
        .background-effect {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at center, rgba(255, 153, 0, 0.2), rgba(255, 153, 0, 0));
            z-index: -1;
        }
    </style>
    <script>
        function switchTab(tab) {
            const tabs = document.querySelectorAll('.tab');
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
        }
    </script>
</head>
<body>
<div class="background-effect"></div>
    <div class="container">
        <div class="logo">
            <img src="/src/assets/images/logoTechStore.png" alt="Logo"> 
        </div>
        <h1>Create Account</h1>
        <div class="tabs">
            <div class="tab active" onclick="switchTab(this)">Customer Account</div>
            <div class="tab" onclick="switchTab(this)">Seller Account</div>
        </div>
        <form action="process_account.php" method="POST">
            <div class="form-group">
                <input type="email" name="email" placeholder="Email Address" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Create Password" required>
            </div>
            <div class="form-group">
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            </div>
            <button type="submit" class="btn">Continue</button>
        </form>
    </div>

    <!-- Include Bootstrap JS and Popper.js via CDN (required for Bootstrap JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
