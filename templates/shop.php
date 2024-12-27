<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <title>CRUD App</title>
</head>
<?php
if (isset($_SESSION['alert_message'])) {
    echo '<script>alert("' . $_SESSION['alert_message'] . '");</script>';
    unset($_SESSION['alert_message']);
}
?>

<style>
    header .btn {
        width: 94px;
        padding: 6px 0;
        border: 1px solid orange;
        border-radius: 100px;
        margin: 0 5px;
    }

    header .btn-primary {
        background-color: orange;
    }

    header .btn-primary:hover {
        border: 1px solid orange;
        background-color: white;
        color: orange;
    }

    header .btn-outline {
        color: orange;
    }

    header .btn-outline:hover {
        color: white;
        background-color: orange;
    }

    .scroll-header {
        position: fixed;
        width: 100%;
        z-index: 99;
        background-color: white;
    }

    .footer {
        margin-top: 70px;
        background-color: #1e1d20;
        padding: 10px 0;
    }

    .footer i {
        line-height: 40px;
    }

    .container-footer {
        max-width: 1500px;
        margin: auto;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
    }

    .row>div {
        width: 20%;
        padding: 0 15px;
    }

    .footer-col h4 {
        font-size: 18px;
        color: white;
        text-transform: capitalize;
        margin-bottom: 30px;
        position: relative;
    }


    .footer-col h4::before {
        content: "";
        position: absolute;
        left: 0;
        bottom: -10px;
        background-color: orange;
        height: 2px;
        box-sizing: border-box;
        width: 50px;
    }

    .footer-col ul li:not(:last-child) {
        margin-bottom: 10px;
    }

    .footer-col ul {
        padding: 0;
    }

    .footer-col ul li {
        list-style-type: none;
    }

    .footer-col ul li a {
        font-size: 16px;
        text-transform: capitalize;
        color: #bbbbbb;
        transition: 0.25s ease;
        text-decoration: none;
    }

    .footer-col ul li a:hover {
        color: white;
        padding-left: 10px;
    }

    .footer-col .social-link a {
        display: inline-block;
        height: 40px;
        width: 40px;
        background-color: rgba(255, 255, 255, 0.2);
        margin: 0 10px 10px 0;
        text-align: center;
        line-height: 40px;
        border-radius: 50%;
        color: white;
        transition: 0.3s ease;
    }

    .footer-col .social-link a:hover {
        background-color: white;
        color: black;
    }

    .rightfooter {
        width: 100%;
    }

    .dkthongbao {
        margin: 0 auto;
        width: 100%;
        font-size: 16px;
        padding: 15px 0;
        border-top-left-radius: 18px;
        border-bottom-right-radius: 18px;
        border: 2px solid white;
    }

    .textthongbao {
        width: 85%;
        margin: 0 auto;
        color: white;
    }

    .dkthongbao input {
        height: 45px;
        width: 55%;
        font-size: 15px;
        border: none;
        border-bottom: 1px solid #636571;
        outline: none;
        color: white;
        margin-left: 8%;
        background-color: #1e1d20;
    }

    .dkthongbao button {
        height: 45px;
        width: 30%;
        border-top-left-radius: 15px;
        border-bottom-right-radius: 15px;
        background-color: transparent;
        border: 1px solid white;
        font-size: 15px;
        color: white;
        cursor: pointer;
        transition: 0.3s;
    }

    .dkthongbao button:hover {
        background-color: white;
        color: black;
    }

    .page .toggle-cart {
        color: #102a42;
    }

    .cart-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        transition: all 0.3s linear;
        opacity: 0;
        z-index: -1;
    }

    .cart-overlay.show {
        opacity: 1;
        z-index: 100;
    }

    .cart {
        position: fixed;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
        max-width: 600px;
        background: white;
        padding: 25px 20px;
        display: grid;
        grid-template-rows: auto 1fr auto;
        transition: all 0.3s linear;
        transform: translateX(100%);
        border-top-left-radius: 12px;
        border-bottom-left-radius: 12px;
    }

    .cart-items {
        margin-top: 10px;
        max-height: 685px;
        overflow-y: scroll;
    }

    .show .cart {
        transform: translateX(0);
    }

    .item-product {
        margin: 20px 0;
        border-top: 1px solid #9999;
        border-bottom: 1px solid #9999;
        width: 100%;
    }

    .imgPro {
        height: 240px;
    }

    .imgPro img {
        width: 100%;
        object-fit: cover;
    }

    .inforPro {
        font-size: 22px;
        margin: 0 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 5px;
    }

    .namePro {
        text-transform: uppercase;
        font-weight: 600;
        font-size: 20px;
    }

    .quantityProd {
        display: flex;
        align-items: center;
        margin-right: 30px;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type="number"] {
        font-size: 18px;
        text-align: center;
        border: none;
        border-left: 1px solid #999;
        border-right: 1px solid #999;
    }

    .input-quantity {
        display: flex;
        outline-style: solid;
        outline-color: #999;
        outline-width: 0.5px;
        border-radius: 4px;
    }

    .input-quantity button {
        border: none;
        cursor: pointer;
        font-size: 25px;
        background-color: white;
        padding: 1px 3px;
    }

    .deletePro {
        display: flex;
        align-items: center;
        font-size: 24px;
    }

    .namePro {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 1;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .empty-cart {
        text-align: center;
        margin: 20px 0;
        font-size: 18px;
        color: #888;
    }

    .deleteProduct {
        border: none;
        background-color: white;
    }
</style>
<header class="py-3 mb-4 border-bottom" style="transition: all 0.3s ease;">
    <div class="container d-flex flex-wrap align-items-center justify-content-center justify-content-md-between" style="padding: 0;">

        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none" style="height: 50px;">
            <img width="65%" height="100%" src="/src/assets/images/logoTechStore.png" alt="" style="object-fit: none;">
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/" style="font-weight: bold;" class="nav-link px-2 link-dark">Trang chủ</a></li>
            <li><a href="/AllProduct" style="font-weight: bold;" class="nav-link px-2 link-dark">Sản phẩm</a></li>
            <li><a href="#" style="font-weight: bold;" class="nav-link px-2 link-dark">Cửa hàng</a></li>
            <li><a href="#" style="font-weight: bold;" class="nav-link px-2 link-dark">Về chúng tôi</a></li>
        </ul>
        <?php if (isset($_SESSION['currentUser']) && !empty($_SESSION['currentUser']) != null) {
        ?>
            <div style="display: flex; align-items: center; cursor: pointer; padding-left: 85px;">
                <div class="dropdown">
                    <button id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent; border: none;">
                        <div style="border-radius: 100%; overflow: hidden; border: 1px solid orange; width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
                            <i class="fa fa-user" style="color: orange; font-size: 24px;"></i>
                        </div>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="/seller">Cửa hàng của bạn</a></li>
                        <li><a class="dropdown-item" href="/customer"> Quản lý tài khoản</a></li>
                        <li><a class="dropdown-item" href="/logout">Đăng xuất</a></li>
                    </ul>
                </div>
                <i class="fa-solid fa-cart-shopping" style="font-size: 32px; color: orange; padding-left: 20px;"></i>
            </div>
        <?php } else { ?>
            <div class="col-md-3 text-end">
                <a href="/signin" style="color: white;">
                    <button type="button" class="btn btn-primary">Login</button>
                </a>
                <a href="/register">
                    <button type="button" class="btn btn-outline">Sign-up</button>
                </a>
            </div>
        <?php } ?>
    </div>
</header>

<body>
    <div>
        <?= $content ?>
    </div>
    <!-- cart -->
    <div class="cart-overlay">
        <aside class="cart">
            <div style="display: flex; justify-content: space-between;">
                <header>
                    <h3>Shopping Cart</h3>
                </header>
                <button class="cart-close" style="font-size: 32px; border: none; background-color: transparent;">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <!-- cart items -->
            <div class="cart-items">
                <?php
                $cartData = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
                $totalPrice = 0;
                // Kiểm tra nếu giỏ hàng rỗng
                if (empty($cartData)): ?>
                    <div class="empty-cart">
                        <p>Giỏ hàng của bạn đang trống!</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($cartData as $shopName => $products): ?>
                        <div class="shopName">
                            <h4><?= htmlspecialchars($shopName) ?></h4>
                        </div>
                        <?php foreach ($products as $product): ?>
                            <?php
                            $itemTotal = $product['price'] * $product['quantity'];
                            $totalPrice += $itemTotal; ?>
                            <div class="item-product" style="height: 130px; display: flex; align-items: center;">
                                <div class="imgPro" style="height: 100px; width: 90px;">
                                    <img height="100%" src="/src/assets/images/<?= ($product['image']) ?>" />
                                </div>
                                <div class="inforPro" style="display: flex; flex-direction: column; justify-content: space-around; width: 100%;">
                                    <div class="namePro">
                                        <p><?= htmlspecialchars($product['product_name']) ?></p>
                                    </div>
                                    <div style="display: flex; justify-content: space-between; align-items: center;">
                                        <div class="pricePro">
                                            <?= number_format($product['price'] * $product['quantity'], 0, ',', '.') ?>đ
                                        </div>
                                        <div class="quantityProd" style="display: flex;">
                                            <div class="input-quantity">
                                                <button class="decrement" data-shop-soluong="<?= $product['quantity'] ?>" data-product-id="<?= $product['product_id'] ?>" data-shop-id="<?php echo $product['shop_id'] ?>">-</button>
                                                <input
                                                    type="number"
                                                    class="quantity"
                                                    min="1"
                                                    max="100"
                                                    step="1"
                                                    value="<?= htmlspecialchars($product['quantity']) ?>" data-shop-soluong="<?= $product['quantity'] ?>" data-product-id="<?= $product['product_id'] ?>" data-shop-id="<?php echo $product['shop_id'] ?>" />
                                                <button class=" increment" data-shop-soluong="<?= $product['quantity'] ?>" data-product-id="<?= $product['product_id'] ?>" data-shop-id="<?php echo $product['shop_id'] ?>">+</button>
                                            </div>
                                            <button class="deleteProduct" data-product-id="<?= $product['product_id'] ?>" data-shop-id="<?php echo $product['shop_id'] ?>" style="margin-left: 10px;">
                                                <i data-product-id="<?= $product['product_id'] ?>" data-shop-id="<?php echo $product['shop_id'] ?>" class="fa-solid fa-trash deleteProduct"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <footer>
                <h3 class="cart-total" style="text-align: center;"><?= number_format($totalPrice, 0, ',', '.') ?>đ</h3>
                <form action="/checkout">
                    <button class="cart-checkout" style="width: 100%; padding: 8px 0; border-radius: 8px; background-color: orange; color: white; border: none; font-size: 24px; font-weight: bold;">Thanh toán</button>
                </form>
            </footer>
        </aside>
    </div>
    <!-- Include Bootstrap JS and Popper.js via CDN (required for Bootstrap JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

<footer class="footer">
    <div class="container footer">
        <div class="row">
            <div class="footer-col">
                <h4>Company</h4>
                <ul>
                    <li><a href="">About us</a></li>
                    <li><a href="">Our services</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Get help</h4>
                <ul>
                    <li><a href="">FAQ</a></li>
                    <li><a href="">Ship</a></li>
                    <li><a href="">Returns</a></li>
                    <li><a href="">Payment options</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Online shopping</h4>
                <ul>
                    <li><a href="#">Laptop</a></li>
                    <li><a href="#">Phone</a></li>
                    <li><a href="#">Camera</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Follow us</h4>
                <div class="social-link">
                    <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                    <a href=""><i class="fa-brands fa-youtube"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
            <div class="rightfooter">
                <div class="dkthongbao">
                    <div class="textthongbao">
                        <b>
                            <p>Nhận thông báo về hoạt động của chúng tôi</p>
                        </b>
                    </div>
                    <input type="text" placeholder="Nhập địa chỉ email" />
                    <button type="submit">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>
</footer>
<script>
    const nav = document.querySelector("header");
    const cart = document.querySelector(".fa-cart-shopping");
    const showCart = document.querySelector(".cart-overlay");
    const closeCart = document.querySelector(".cart-close");

    cart.addEventListener("click", () => {
        showCart.classList.add("show");
    })
    closeCart.addEventListener("click", () => {
        showCart.classList.remove("show");
    })

    function formatPrice(price) {
        return new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND'
        }).format(price);
    }

    function tongTien(cartData) {
        let total = 0;

        for (const shop in cartData) {
            cartData[shop].forEach(product => {
                total += product.price * product.quantity;
            });
        }
        return total;
    }

    function updateTongTien(cartData) {
        const container = document.querySelector(".cart-total");
        let html = `${formatPrice(tongTien(cartData))}`
        container.innerHTML = html;
    }

    function updateCartDisplay(cartData) {
        const cartContainer = document.querySelector(".cart-items");
        let cartHTML = '';
        if (cartData && Object.keys(cartData).length > 0) {
            for (const shop in cartData) {
                cartHTML += `<div class="shopName"><h4>${shop}</h4></div>`;
                cartData[shop].forEach(product => {
                    cartHTML += `
                <div class="item-product" style="height: 130px; display: flex; align-items: center;">
                    <div class="imgPro" style="height: 100px; width: 90px;">
                        <img height="100%" src="/src/assets/images/${product.image}" />
                    </div>
                    <div class="inforPro" style="display: flex; flex-direction: column; justify-content: space-around; width: 100%;">
                        <div class="namePro">
                            <p>${product.product_name}</p>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="pricePro">${formatPrice(product.price * product.quantity)}</div>
                            <div class="quantityProd" style="display: flex;">
                                <div class="input-quantity">
                                    <button class="decrement" data-shop-soluong="${product.quantity}"  data-product-id="${product.product_id}" data-shop-id="${product.shop_id}">-</button>
                                    <input class="quantity" type="number" data-shop-soluong="${product.quantity}"  data-product-id="${product.product_id}" data-shop-id="${product.shop_id}" value="${product.quantity}" min="1" max="100" step="1" />
                                    <button class="increment" data-shop-soluong="${product.quantity}"  data-product-id="${product.product_id}" data-shop-id="${product.shop_id}">+</button>
                                </div>
                                <button class="deleteProduct" data-product-id="${product.product_id}" data-shop-id="${product.shop_id}" style="margin-left: 10px;">
                                    <i data-product-id="${product.product_id}" data-shop-id="${product.shop_id}" class="fa-solid fa-trash deleteProduct"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
                });
            }
        } else {
            cartHTML = '<p>Giỏ hàng của bạn đang trống!</p>';
        }

        cartContainer.innerHTML = cartHTML;
        updateTongTien(cartData);
    }



    function handleCart() {
        document.querySelectorAll('.increment, .decrement, .deleteProduct, .addProduct').forEach(button => {
            button.removeEventListener('click', handleButtonClick);
        });
        document.querySelectorAll('.increment, .decrement, .deleteProduct, .addProduct').forEach(button => {
            button.addEventListener('click', handleButtonClick);
        });
        document.querySelectorAll('.quantity').forEach(input => {
            input.removeEventListener('keydown', (e) => {
                value = e.target
                if (e.key === 'Enter') {
                    const productId = value.dataset.productId;
                    const shopId = value.dataset.shopId;
                    const newQuantity = parseInt(value.value, 10);
                    QuantityInput(productId, shopId, newQuantity);
                }
            })
        })
        document.querySelectorAll('.quantity').forEach(input => {
            input.addEventListener('keydown', (e) => {
                value = e.target
                if (e.key === 'Enter') {
                    const productId = value.dataset.productId;
                    const shopId = value.dataset.shopId;
                    const newQuantity = parseInt(value.value, 10);
                    QuantityInput(productId, shopId, newQuantity);
                }
            })
        })
    }


    function QuantityInput(productId, shopId, newQuantity) {
        // Nếu giá trị nhập vào không hợp lệ, trả về (tránh gửi yêu cầu không hợp lệ)
        if (isNaN(newQuantity) || newQuantity < 1 || newQuantity > 100) {
            return;
        }

        const bodyData = {
            product_id: productId,
            shop_id: shopId,
            action: 'update',
            quantity: newQuantity
        };

        fetch('/updateCart', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(bodyData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log(data);
                    updateCartDisplay(data.cart);
                    handleCart();
                } else {
                    alert('Có lỗi xảy ra khi cập nhật số lượng');
                }
            })
            .catch(error => {
                console.error('Lỗi khi cập nhật giỏ hàng:', error);
            });
    }

    function handleButtonClick(event) {
        const button = event.target;

        const productId = button.dataset.productId;
        const shopId = button.dataset.shopId;
        const action = button.classList.contains('increment') ? 'increase' :
            button.classList.contains('decrement') ? 'decrease' :
            button.classList.contains('deleteProduct') ? 'delete' :
            button.classList.contains('addProduct') ? 'add' : '';

        let bodyData = {
            product_id: productId,
            shop_id: shopId,
            action: action
        };

        if (action === 'add') {
            bodyData.product_name = button.dataset.productName;
            bodyData.price = button.dataset.price;
            bodyData.image = button.dataset.image;
            bodyData.quantity = 1;
        } else if (action === 'increase' || action === 'decrease') {
            bodyData.quantity = button.dataset.shopSoLuong;
        }

        fetch('/updateCart', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(bodyData)
            })
            .then(response => {
                return response.json()
            })
            .then(data => {
                if (data.success) {
                    updateCartDisplay(data.cart);
                    showCart.classList.add("show");
                    handleCart();
                } else {
                    alert('Có lỗi xảy ra!');
                }
            })
            .catch(error => {
                console.error('Lỗi khi cập nhật giỏ hàng:', error);
            });
    }
    QuantityInput();
    handleCart();




    document.addEventListener("scroll", () => {
        if (window.scrollY > 0) {
            nav.classList.add("scroll-header");
        } else {
            nav.classList.remove("scroll-header");
        }
    });
</script>

</html>