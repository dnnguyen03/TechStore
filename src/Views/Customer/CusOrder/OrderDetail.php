<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Details</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f5f5f5;
    }
    .order-container {
      max-width: 900px;
      margin: 40px auto;
      padding: 20px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .order-header h6 {
      font-size: 1.1rem;
    }
    .order-header a {
      color: orange;
      text-decoration: none;
    }
    .product-item {
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 15px;
      display: flex;
      align-items: center;
    }
    .product-item img {
      width: 60px;
      height: 60px;
      background-color: #ddd;
      border-radius: 5px;
      margin-right: 15px;
    }
    .cancel-btn {
      background-color: orange;
      color: white;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
    }
    .cancel-btn:hover {
      background-color: darkorange;
    }
  </style>
</head>
<body>

  <div class="order-container">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h6><strong>Ordered From</strong></h6>
        <h6><a href="#">Remo Barky</a></h6>
      </div>
      <div>
        <p><strong>E-Mail Address:</strong> remo@gmail.com</p>
        <p><strong>Telephone / Mobile:</strong> 076 1234 567</p>
      </div>
    </div>

    <hr>

    <!-- Order Info -->
    <div class="row">
      <div class="col-md-6">
        <p><strong>Order ID:</strong> #123456789</p>
      </div>
      <div class="col-md-6 text-end">
        <p><strong>Delivery Charge:</strong> <span class="text-primary">Not Decide yet</span></p>
        <p><strong>Status:</strong> <span class="text-success">New</span></p>
      </div>
    </div>

    <!-- Message -->
    <div class="mb-3">
      <h6><strong>My Message</strong></h6>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
    </div>

    <!-- Product Details -->
    <div class="product-item">
      <img src="#" alt="Product Image">
      <div class="flex-grow-1">
        <h6>Nike modern 5 shoes for men</h6>
        <p>Quantity: <strong>5x</strong></p>
      </div>
      <div>
        <p><strong>Total Price:</strong> 100,000.00</p>
      </div>
    </div>

    <!-- Footer -->
    <div class="d-flex justify-content-between align-items-center mt-4">
      <div>
        <p><strong>Delivery Code:</strong> <span class="text-warning">A1B2C3</span></p>
        <h5><strong>Bill Amount:</strong> Rs. 500,000.00</h5>
      </div>
      <button class="cancel-btn">Cancel Order</button>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
