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
        max-height: 620px;
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
            <div style="display: flex; align-items: center; cursor: pointer;">
                <div class="dropdown">
                    <button id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent; border: none;">
                        <div style="border-radius: 100%; overflow: hidden; border: 1px solid orange; width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
                            <i class="fa fa-user" style="color: orange; font-size: 24px;"></i>
                        </div>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="/seller">Cửa hàng của bạn</a></li>
                        <li><a class="dropdown-item" href="/customer/orders"> Quản lý tài khoản</a></li>
                        <li><a class="dropdown-item" href="/logout">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
        <?php } else { ?>
            <div class="col-md-3 text-end">
                <a href="/signin">
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
                <button class="cart-close" style="border: none; background-color: transparent;">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <!-- cart items -->
            <div class="cart-items">
                <div class="item-product" style="height: 130px; display: flex; align-items: center;">
                    <div class="imgPro" style="height: 100px;width: 90px; ">
                        <img height="100%" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMSEhUSEhIVFRUXGBcXFRYWFRIXGBcVFxgXFhgVFRUYHSggGBolGxgVITEiJSkrLi4uGB8zODMuNygtLisBCgoKDg0OGxAQGy0lICUtLS0tLS0tLy0tLS8tLS0tLS0tLS0vLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLf/AABEIAOEA4QMBEQACEQEDEQH/xAAcAAEAAgIDAQAAAAAAAAAAAAAAAQIGBwMEBQj/xABFEAACAQIDBAcEBAsIAwEAAAABAgADEQQhMQUSQVEGBxNhcYGRIrHB8DJScqEUI0JiY4KSorLC0SRTVHOT0uHxMzRDs//EABsBAQEAAgMBAAAAAAAAAAAAAAABAgMEBQYH/8QAOxEAAgECBAMFBwMCBQUBAAAAAAECAxEEEiExBUFRYXGBkaEGEyIyscHRUuHwQmIUFTM0ciRDY8LxFv/aAAwDAQACEQMRAD8A3jAEAQBAEAQBAEAQBAEAQBAEAQBAEAQBAEAQBAEAQBAEAQBAEAQBAEAQBAEAQBAEAQBAEAQBAEAQBAEAQBAEAQBAEAQBAEAQBAEAQBAEAQBAEAQBAEAQDgxWLWmPaOug4zKMHJ2RjKajuUp7Qpn8r1mTpTXIwVaD5nKMQn1h6zHLLoZZ49UVqYxBqw8s5VTk+RHVguZ1F2upfdANrEk+BHDzmx4eSVzX/iI3segjAi4NxNDVjenfVFoKIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgHVx+0qNAb1aqlMc3ZVv4XOcjaW5spUalV2hFvuVzFNqdaOzqIYiq1bd17Jb/vNYHyMjlbkzlQ4fUlBzcopLrJeWl3fsPJr7fq1aVesAlWsm+RRRjYKjFlpbwv8AjDSAJ/ObQaTm0pZad1yOrq081RLrtf8AnUxrA9a+GFu3w+JpHiQqOg/WupI8pViYslXh9en80WvBnqDrV2br2zju7Kp/SZe9icf3Ezp4rreweYpUcRVPCyUwD+9f7pHVijOnhKtR2ij3+g23KmMpVcQ9DsVLdnSUksxsAWYmwyuVGQy3W1ljU95tsSvQlQllnozGdqdNcVg6o/B3ZA9StvUcUu+oZdxbU2DXVN4Vd3McrWAnEdm29fudxRw2eMVminZWbuoy3er5StbvPRwHXJUUf2nA6amjUzNuVNh/NCUHtItXh+LpvWk/C0voZdsDrK2firDtDQc2G5iF7PM5AB77hPcGv3TGxx5UqkVeUWu9NGXg3kNZMAQBAEAQBAEAQBAEAQBAEAQBAEAxDpJ1i4PCXUP21Qfk0yLA8mfQHuFz3SXu7RVzmwwUlHPWahHrLd9y3ZrXbXWjj64Iw4Wiv5ozt9tsz4qBLlt87t2Lc5VChCpphqTn/fPSK7kt/PwMOxmLNVmapXeszai7MTx1zJyPG02RvvCNu1mc/c2UK9dz/wDHSVl3aaP0Og1E2+glNR9AtYsCfja+v/M1vXS7b7De6U4xU/dwpRXyuXzd/f3myegO1LpT9tQGUBB/9KtZLpUqNmTklJDwHtjUicqhJp5XbXl2nn8bTj80LyX6nppy8235Hm9NNhnD1e0pj8TVJK20R9Wp/Ed2We6ZxK1LJLs5HruCcS/xVHJN/HHftXJ/n9zJ+gVULhBkM3flfUd2mU5mFp3hftPO+0UrYxpckjyemOAfF4+nRpCxakpY2yRd97u3cL+eQ1M0V4N1cq3sdlwnFww3DpVZ8pPxdloZZtI08HhBTWk70kC02WnbtCKh3N4c3LNfhm15yXFUqdrHmFOeKxGeTtJ3eu2mtu6xqjbjM1Qjte03FWneod/f3L3a5JNixcjPQgcJw1UjtJePM9fT4XX91npTSzaunJJw7F2aWT0vfmeZugCx36fgSyeWvpM077Wf1OJKnCh/qe8ov+1uVPw38jrUUOe7WBOVsgL2vcSZVzgWE5N2pYyN+1Wv5nr7I6U7SwmVGs27wXeDKP1KgI9BMMsHs2jZVo4qSvVoxqdsXZ+e5mexuuLFAha9FKg42DUn8Qc1PoIcJJXTTRwoYehWqKlacJvZNXX2ZtPo30qw2OW9F/bH0qbZOvlxHeLiRO5x8Xga2FdprTry/nYe3KcMQBAEAQBAEAQBAEAQBAOttHaFKhTNWs6og1Zj9w5nuGcjdjZSpTqyUIK7Zpvpt1g1MUTSoXp0NCdHqfa5L+b68hrk7nsOG8Hhh7VKusvRfl9vl1MF7E3NqZcj8tzl3EHTlkM5vzXjq0l0W510sL7rESUaMqk0/nqP4evc7eZ1sQ+8tixqsCPYTJdRkx4jjcxlsrpWXV7idVVZ5KlR1Z/ohpT8X07Tnw5awBemncqk5aWz08QJrcod/ezsqeGxjVs8Ka/sjr3Xeg/Bad77wY82uxy8Rb0kdWTVlouw30+FYWMs8rzl1l8T9dPQ9zo5i2RrKyBrgh3CjcpkqtdkuQA3ZgNc3ypnK5ijJxlf+dvoddx7CKdJVNXbSy5/p9dPE2bSWji8OUb2qdRQQcwbHNHW+h0IuPHiJ2k4RqwPF0K9XB11OOkl/GmeJs5XwXZ4NqVRmZ37Ooi0+zcG7fSZxukKCSpzFuORPHo1XSXu3F3udtjoxx8pYyM4pJK8W3dctktddmZXTw6Ut5yBvEAO35q3IFzwFyfOcjKs2Y6OVWUkoclsu1/cwLpjtRlqM1nR6e9TplW9mstVEcOcwfxYOmY3mQ8xOHiZ3l3ep3/BcF71q+sdJPTVNNq3j9EzBABnYcPjOKe4SVwq2tYkQZZehXswb3APkJnGUlszjVMDh6ytUgn4L67lThwNCy5fkk/GZutJ76nXvgeGi70nKD/tk/vc5qKnixI4XAv68Zi5J7Kxz8FhK1KTz1XOPJNK68eZ2MOzIwemzI4N1ZSQwPMEaTGxzp0oTjlkro2F0b60KtO1PGJ2i/3iABx9pdG8rHxlu0edxns/F/FQdn0e35XqbM2Rtqhil36FVXHEA+0PtKc18xKnc81Xw1WhLLUi1/Op6EpoEAQBAEAQBAEAQDEulvTuhg701/G1/qKclP6RuHhr4azFy6HbYDhFbFfE9I9evd/LGntu7cr4x+0xFS/1VGSKOSr8deZmvvPZ4TA0cLHLTXe+b72eVVGWmkPY5M1oQ1BWszAmwyyuLZ57t+8yqpKK+E4OJ4dh8RNVKqzWWiu7d9jk9i1gbDkFsPGwmOZvc5FOnRpRy04pLolYqQttfulNiylSNYFkXw1fcdWtexzHBhxU9xFx5ymjEUVWpypvmv4/DczzC9JKWGpXqVhWck7iUgtlpaUlysF9kAkH2gWIztOdDExhDV3Z4H/JMVXq2jDLFbuXN831eu1tDFts9JauKZmZnphQBTRGO6NSS9/pNna9hlOHUqyqSuz0uB4UsLHJBKWuraXRehz7B6X16IFOr+PpZgK5O8BpYPnlbgQe602Uq8oK26NGN9nqOIeem8suzby/B4+NxAbdVFK00G7TUm5tmSzEflE3J8baATUdvg8M6ELOzk9W+38LZHV7TuMlzlZkuRParxyi4zx56FguspmkTb3fCCNaEYfTziJaXynMJkbTkB5wDlw9RkYPTZkYaMpKsPAjMSGE4Rmsskmuj1RmmxesnFUrLWC11HP2H/bAsfMect2dJieAYeprTbi/NeW/r4GbbJ6w8FWIUs9Jjlaoptf7S3HraMx0VfgeKpJtJSXY/s7My2ZHUCAIAgCAdXae0aWHptVrOERdSfcBqSeQzkbS3NlKjOrNQgrtmqOlfWRVrg08IGpUzkah/wDIw7rfQHhn3ia3K567AcAhTtOv8T6cv3+neYD95g9GlYGQpBixDjosVNteX9JjsaYtwduRyvUH1PQy2MnJ9CnaLyb7oJnXQguvJvugxc10KFx3ykzIobQYtIJx8pESGlwxsQRKJaO6I7TIy3JnutD26WzFao1NEqNZmW5qLbIkXNqfIXy74qTjBXZ1Cxlb3ak5LVJ7de9nLitj7ihux3hzDs9jyO6BNcK0JO31MFi6jdpTt3pL8ni41RTc7ospWmSATkWRWNr8LmbH8LOwwlSShmlrq15NocrSnPe10KP0RC2FNfCjkEyNhZe70gFxALX/AOZAZX1bbG/CMarkexRs7ct4H8Wvrn+qZUdPxvF+4wzit5aeHP8AHibumR4UQBAEAQDDusXom+Opq1F7VKd7IzEI4NrjkGyyPkeYwlG523CeIxwk3nWkufNft1Ro3Fq9J2p1EKspswOoI5ia7o9rDExaUo6p80WRwdPnylRyYzUloTBRKDjbhDNctS4XMSchbQpbLzglj3ej2xFqsHrMy0+Sht5xnfcbdKi26b3zIVgoJGW2lTzbnm+M8ZeHvRofPzfTs7/od7phs1CVq0VA3VArItNkUAWCVQCAAGHC9xaxzDWzqwVrxOBwDibjJ4eu938Leur3Xn636mHtOMeuZA4yonMkHSUFSJDFozfZVYdoqF/ZatWFVSAN1bsVs17kElSbchpa84HEPeRjUnCOqStzv1062vY8w4tUs9tox18Fv62O7jn3HpGwpKe1WsqBSQvsdmd3S5O9nyB5TjYdSkppPNbK4t9db676aeIhFSUox+KyT/Pl/EYXtJRvKRexppra9lXcz77LO6fad7gHeEk/1P1s/uefRbdO6dOExWmhyqbyPK9jsrpbll6ZTJbG+HyosJkZlvGAWDecAnTxgq6m9ugOwjhMKocWq1PbqcwSMk/VFh43lR8/4tjf8ViHJfKtF3dfEyWU6wQBAEAQBANd9bvR0VaIxdNRv0sqnNqR4nmVP3EzXNW1O/4FjPd1Pcy2lt2P9/wadalxGRmNuZ69w5rc5KZy0z5wbIyfMsfWDJlLSXMNCTfnwjkNbFOHnLzMdbnOuLqKCq1HUZ5B2AzIvkDxsPSZKTRxamDw9SWadOLfVpNkVMbVbJqrkHW7uQdBmCc8gvoIcn1MI4HDQlmjTimudkdUzE5DB18vhBGJQIB6mC2qVbezRzqygENnnvocj4i3HIyTjGatI6ypgZKNoaro913P6J+Z2MdtdmWzOHH1U3lQ5aucifAW11GkxhRhB3SNVHBzk9FlXV2v4L7vTomeTXrFjc8hYAAAC2gA0mw7WjSjSjlj+7OBtPnukMnrozlR+HKVM2U5W0OUG/8A1/zKbU2BUEByRZbHSLhSM16r9gfhOI7aoPxdGxsfyqhzUeAtvHwHMyrU6TjuPdGj7qO8vRc/PbzN0zI8SIAgCAIAgCAdTauCWvRqUnHsujKfMa+I1kaujZRqSp1Izjunc+aAMvn4TStT6blsRY93hYS2MMpxuBxIHoBI0jGSjHWTsSpHzymN0jNWWhcDObCvQmkm8QvNgPW0hhOWVOXQzXpFsDZ2DO7UqYlnIvuI1Em1/pG6AAX85yJwpw0u7nleHcT4pjlmhGmorm1L011OPYOw9m4s7qVMUrgX3HaiCQNSpCEH3xSp05u12vIcR4jxXAxzzjTceqUvW7/YxavsisN4rRqlQTZhTcgqL53AtbKaLM76ONoNJSnFN20ut3ysdG3u+EHJJpUixCqCzMbKACSSbAAAakkwYykopyk7JHIuDqFWcI5RTZm3W3VNwLM2gzIHmIMHWpqahmV3sr6s4hw+eMG0CCgfPpKERb59IJbU42YhmtrkR99/hMHuaG2pu3YZcOge0l3X/BhUVlDXpVaRyOYDK5U38L+cyytHV0vaCkpNSi13anl4vY1emSHw9ZftUqi+8WmVzt4Y/C1FeNSOvbb0Z51MgMVJHhcXB8JLrqbqc4N/DJPxN19T+H3cCW+vVdvIBVA/dPrMonj/AGgnmxVukV939zOZkdGIAgCAIAgCAceIpbyMt7bwIvyuLXgsXZpmq6HVFVP08Yg7hRZvvLialB9T0/8A+llfSn6/sehQ6pKX5eKqN9lFX3lpll7TXL2lrf0wivN/gyfY3QvBYZN1aCVDqXqqruT4kWHgABKopHTYrHVsVLNUfgtkay638BTpY1Wpqq9pSQsFAHtB3XesOYCj9Waqmjv3HpPZ6TlRknyaML4zI9Czk2eL1EH56+8SdTTXdqc+5/QzrpHi8PQxOIGJwfaPU9qnU32AdCAAv6O1t3eXPKbp2U5ZlfxPI8NoYjEYWi8NXyqOjjbZ9e2+9np0KdH8Xh69fDjDYPs2p+1Uqb7HcXO6n+8v9G7Z52GUtO0pxUVbxJxOjicNhqzxFfMpaKNlq+vZbey0K9HNuUkSomIrH/zEIrM5AXdcAEWPsbxFxYjQkRSnFK0i8U4bWqVITw8P6FdpK97ru+K3anyucy4/Zftkihm9yDSJzAp5oOyvuG1T6o/NO9lkpUtdPQ0PC8X+FXlov1dc2/xb7dX2qx1MTtrBbj7i0FfcxO4yYfdYVFqj8FKsEyJS5v6zXKSadkufLt+E5NLh+OzxzuTV4XTndWcX7y6v10+hQbYwJqAMN6kwNZgUY2xFavRZ1tbRKaWvoRvAXvYk4XM3gceqd4u018Kd/wCiMJJPf+pvwdnpbS9bbWBB3jSp1KlPdI3U9mq1QlKoJFJAd1ApBKqN69uZuaPT+egpYDiEvhUnGMr7vWNtY/1Sesr31em5YbawKUnpJulVXcUtSberKKShW+hk3a759ora9wTpJmila376GL4fxCdSNSTd27uz0i8zut9stlonfbQxfpDjhXxNV1beTeYU/Z3bU8ygC2FrAzFu7bO+4bh3Qw0YNWlZX1vrZX17zzLfPpBz+Zx1l9oH55EenumuS5mmatNM+otmn8TT+wn8Im5Hzyp8z7zsymBxYjDJUG66K45MoYehgEYTCU6ShKSLTUaKiqqi+ZsBlBlKTk7t3OaDEQBAEAQBAEAQBAEAQDSfXGb49e6hTH79UzRL5/L7nsfZ7/by/wCX2RhHHy+EyO+GGqFWDDVSCPEZyLdmEoqalF7NWMpx3TmrWG7Vw2FcDg9Oo1jpcXfIzdKtKSs0jz9D2co0HelVqRfY0vsVwvTmtSXcpYbC0wcyEp1FueZtUzPjEa0oL4UvIV/Z2jXearUqSfbJP/1MVdibk6k3M1HfpJaIg/CCEWgA8fnjALKMx88ZSgaenxlKFGvz+SJESOzHCUpWuNPESPYxmtu8+ndjm9Cif0afwiZrY+c1tKku9/U7cprEAQBAEAQBAEAQBAEAQBAEA0p1xf8AvD/Jp/xVZpl8/h+T2Xs7/t5f8vsjBr5+Xwg70rSOZ8RJzZit2Tf3yi+wbXy+EpGQTl5yjmSSLmQxI5SlJ5/PGAShzX54wADkfEfGUpI+fSREXMi+XnMjLmVq6+numLMJcu8+mdiH+z0f8qn/AACZrY+dV/8AVl3v6ndlNQgCAIAgCAIAgCAIAgCAIAgGkuuF748d1KmPvc/Ga38x7P2fVsK3/c/ojCOPl8LTE7srSPvkRI8yP6j4zIcyTr5fCDFkGUrB1MhiRygE8/njKUkcPnjAJ5ylCcPGQLYDT575kUrV1B8PdIa58mfSXRRr4LCn9BR//NZktj5/jVbE1F/dL6nqynGEAQBAEAQBAEAQBAEAQBAEA0X1sNfaNTuWmP3AfjNb3Pb8BX/RrvZhx4/PGYnblaRyHn7zJHYxh8o4TIE2z8vhBCDp6/CUrHOQg5Sgnn88YAHD54wUnn88ZQE+MiC2ZI0mRRUzt5e+TkYzWh9EdB2vs/C/5SD0FplHY8BxBWxVT/kz3JThiAIAgCAIAgCAIAgCAIAgCAaC6yWvtLEfaQelKmJqe7PecFVsFDx+rMXPGQ7IrT0HzzkWxjH5RfKZAnj88oIgdJTIHUwQg8IBJGvzxghPKCkka/PGUpNMe+AuZIGvzxgoPD087/D+shrlrqfQPV699nYY/mW9GI+EzjseD4krYqp3mQynBEAQBAEAQBAEAQBAEAQBAEA+eenNS+0MSf0pH7Nl+E1M+gcKVsHT7vueA2hixz2VTQeHwkWxivlB0lJYm+ZgEnT57pSkkZn54wCOUAtu6/PGUArpBESdT88YKKWnnAXMtz+eMMr6IpV0EWMZq0TfHVc99m0ByNRfSq9vuljseF4urYufh9EZXMjrRAEAQBAEAQBAEAQBAEAQBAPm/pNU3sZiW51q3p2jW+600n0XARthaa/tX0PLIylOUwoy8vhC2C2KkQSxI1MEW5LaevwlKyecEIOglKL6/PGCEXyEAtzgCmcvP4CBHmXtmfnjBStb6MpJbG7OqGtvYC31atRfc380R2PE8bjbFX6pfj7GbTI6gQBAEAQBAEAQBAEAQBAEAEwD5ixNbtHd/rFm9SW+M0rY+mUIZaUYvkkvJHDbLxlNgGnkI5EWyKkQABnBEtQ0pWix4wQqZQDxkIRKCYBCHI+PwEIkeZcHODIhjcW8fhBi3yNvdStX+z105VQ37SAfyyxPJe0EbVYS7LeTf5NjTI6AQBAEAQBAEAQBAEAQBAEA6O3MR2eGr1L23KVRr/ZQmR7GyjDPUjHq0vU+a6jBcyQBpmQOHC8wUXyPpFXEUqFnUko36uwA4cDmJOdjYmtl4En4CByRXlAI4mASZQDxghUykIkIRBCbyghdD4/0kC5ll1lKQFtnBjbW5szqQxQ7TE0+JWmwH2SwJ/fEsdzzftDG8acuja87fg21MjzAgCAIAgCAIAgCAIAgCAIBjvWDiOz2fiDzQJ/qMqfzTGexz+GQz4umu2/lr9j57x1AVMi9NSN5gHqFCx5Jkd5u7vE3YfS7O19qLzdGC7fWyRyuNLcM5xrXR6zLoSdPSUu9ittIBVYIWIgoI1gjKESmJUyEIkITKUCERFrylLA5GUGWdUmK7PaSr/eI6fdv/wAgkW50nGqebDS7Gn9vub3mZ40QBAEAQBAEAQBAEAQBAEAwHrhxu7hqVEHOpU3iOaU1JP7zJMJs7/2dpZsS5/pXq9Ppc1Ph6yqlVWUkuECnKwILXPMEb19JupzjGLXM7DimBxGIx9GcY3hHLd3X6rvTfY69QZg/NjOOz0T6hhl6e6VFSK20gFVgnMs3CClTxghUwYshhnBiUMhGTeUECEETylOPVp1ZTjKErJbosDr/AMQZe6nzm/JHodF8b2GNw9UmwFRN48lJs37t5DRjafvaM4dU/wAo+lZsPACAIAgCAIAgCAIAgCAIAgGv+sroxisW6VKAV0RCvZ3CsGLXZhfIggKNeEwknc9BwTiGHwuaNW6zNa7rT1NU43CvSbcqoyMNVcEHxsRp3zA9hTqQqxzQaa7Dqs2vn/STkHsGqe+VMyvdk8fnlF9BbQoDMuYJLQQqW1gjKlpDFsoWMlzFsrvnlJcwzMjtO6LjP2FlcSpmSkmWvpKNeRdU1lMspRvv0+fWDBqz0PpXo1iWq4ShUcEO1NCwIIO9YXNjz185mtj57ioRhXnGOybselKccQBAEAQBAEAQBAEAQBAEA8/bOxaGKTcr01ccDoy96sMx5SNJ7m/D4mrh5ZqUrP8Am5rHpJ1WVUvUwdTtV1NN7B7fmt9FvA285rcWtj0eF9oFJqNdW7Vt5GvsXhalJilRGRhqrAqR4gyHooTVRZoNNdUdfeP/AGJORlmkN88pSZn0INTuMEdR9CrVe4yNmLqdhQ1e4wYOr2FTUPKQxdR9CvaHlIY55dCLnlBLyLZyl1PT2P0fxeK/9ehUqD6wFk8DUayg+cJ321OPWxlKj/qTS7OfluZ9sbqkrNY4nEKg4rTBdrct42CnyabFGR1lX2gSVqUb9r/H/wAM82H0IwWFsUohnH/0qe21+Yvkp+yBMlFI6WvxHEVtJS06LRfzvMjmRwRAEAQBAEAQBAEAQBAEAQBAEAQDzts7Dw+KXdr0lfkTky/ZYZjyMjSe5yMPiq2HlmpSa/nNbGCbU6plJ3sPiCv5tVd7wG+tiB5GYZOh3tD2jmtKsE+1aemv2MbxPVfj10FKp9ipb+MLGVnYQ4/hJb3Xevxc6LdXu0f8Kf8AUof75LPobv8AOcF+v0f4OJugG0f8I37dH/fJZ9Cf5vgv1+j/AAcZ6BbR/wAI/wC1S/3SO/QxfFsH+v0f4Ljq72l/hT/q4f8A3xZ9DH/N8H+v0f4Oel1Y7Ra16SJ9qrT/AJSZcsjVPjOFWzb8D3NmdT1VrHEYlEHKkGcn9Zt0D0Me7b3OFW47H/tx8/x+5nOxugGAw9iKAqMPy63tnLjun2Qe8ATNQR1VfieJrbysui0/cydVAFgLAaCZnAJgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIAgCAIB//9k=" alt="" />
                    </div>
                    <div class="inforPro" style="display: flex; flex-direction: column; justify-content: space-around; width: 100%;">
                        <div class="namePro">
                            <p>Áo đấu ManChester United</p>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="pricePro">
                                2.000.000đ
                            </div>
                            <div class="quantityProd" style="display: flex;">
                                <div class="input-quantity">
                                    <button id="decrement">-</button>
                                    <input
                                        type="number"
                                        class="my-input"
                                        min="1"
                                        max="100"
                                        step="1"
                                        value="1" />
                                    <button id="increment">+</button>
                                </div>
                                <div class="deletePro" style="margin-left: 10px;">
                                    <i class="fa-solid fa-trash"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer>
                <h3 class="cart-total" style="text-align: center;">100,000đ</h3>
                <button class="cart-checkout" style="width: 100%; padding: 8px 0; border-radius: 8px; background-color: orange; color: white; border: none;">checkout</button>
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
    document.addEventListener("scroll", () => {
        if (window.scrollY > 0) {
            nav.classList.add("scroll-header");
        } else {
            nav.classList.remove("scroll-header");
        }
    });
</script>

</html>