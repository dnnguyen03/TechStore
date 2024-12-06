<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <title>CRUD App</title>
</head>
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
        z-index: 999;
        background-color: white;
    }

    .footer {
        margin-top: 70px;
        background-color: #1e1d20;
        padding: 70px 0;
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
</style>
<header class="py-3 mb-4 border-bottom" style="transition: all 0.3s ease;">
    <div class="container d-flex flex-wrap align-items-center justify-content-center justify-content-md-between">

        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img width="100%" height="100%" src="" alt="">
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" style="font-weight: bold;" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="#" style="font-weight: bold;" class="nav-link px-2 link-dark">Features</a></li>
            <li><a href="#" style="font-weight: bold;" class="nav-link px-2 link-dark">Pricing</a></li>
            <li><a href="#" style="font-weight: bold;" class="nav-link px-2 link-dark">FAQs</a></li>
            <li><a href="#" style="font-weight: bold;" class="nav-link px-2 link-dark">About</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <button type="button" class="btn btn-primary">Login</button>
            <button type="button" class="btn btn-outline">Sign-up</button>
        </div>
    </div>
</header>

<body>
    <div>
        <?= $content ?>
    </div>

    <!-- Include Bootstrap JS and Popper.js via CDN (required for Bootstrap JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

<footer class="footer">
    <div class="container-footer">
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
    document.addEventListener("scroll", () => {
        if (window.scrollY > 0) {
            nav.classList.add("scroll-header");
        } else {
            nav.classList.remove("scroll-header");
        }
    });
</script>

</html>