<?php ob_start(); ?>
<div class="container">
    <div style="display: flex; gap: 35px;">
        <div class="slide" style="width: 40%;">
            <div class="main-slider" style="border-radius: 12px; overflow: hidden; height: 350px;">
                <div><img src="../../../assets/images/product.png" style="height: 100%; width: 100%; object-fit: cover;" alt="Image 1"></div>
                <div><img src="../../../assets/images/product.png" style="height: 100%; width: 100%; object-fit: cover;" alt="Image 2"></div>
                <div><img src="../../../assets/images/product.png" style="height: 100%; width: 100%; object-fit: cover;" alt="Image 3"></div>
                <div><img src="../../../assets/images/product.png" style="height: 100%; width: 100%; object-fit: cover;" alt="Image 4"></div>
                <div><img src="../../../assets/images/product.png" style="height: 100%; width: 100%; object-fit: cover;" alt="Image 5"></div>
            </div>
            <div class="thumb-slider">
                <div style="margin: 15px 5px 0px; overflow: hidden; border-radius: 12px; height: 80px; width: 80px;"><img height="100%" width="100%" style="object-fit: cover;" src="../../../assets/images/product.png" alt="Thumb 1"></div>
                <div style="margin: 15px 5px 0px; overflow: hidden; border-radius: 12px; height: 80px; width: 80px;"><img height="100%" width="100%" style="object-fit: cover;" src="../../../assets/images/product.png" alt="Thumb 2"></div>
                <div style="margin: 15px 5px 0px; overflow: hidden; border-radius: 12px; height: 80px; width: 80px;"><img height="100%" width="100%" style="object-fit: cover;" src="../../../assets/images/product.png" alt="Thumb 3"></div>
                <div style="margin: 15px 5px 0px; overflow: hidden; border-radius: 12px; height: 80px; width: 80px;"><img height="100%" width="100%" style="object-fit: cover;" src="../../../assets/images/product.png" alt="Thumb 4"></div>
                <div style="margin: 15px 5px 0px; overflow: hidden; border-radius: 12px; height: 80px; width: 80px;"><img height="100%" width="100%" style="object-fit: cover;" src="../../../assets/images/product.png" alt="Thumb 5"></div>
            </div>
        </div>
        <div style="display: flex; flex-direction: column; justify-content: space-between;">
            <h4>Product Name</h4>
            <h5>Shop Name</h5>
            <h4>Giá: 100,000,000đ</h4>
            <div>
                <h6>Product rating</h6>
                <div class="rating">
                    <img src="../../../assets/images/star.png" alt="">
                    <img src="../../../assets/images/star.png" alt="">
                    <img src="../../../assets/images/star.png" alt="">
                    <img src="../../../assets/images/non-star.png" alt="">
                    <img src="../../../assets/images/non-star.png" alt="">
                </div>
            </div>
            <div>
                <h5>
                    Chi tiết sản phẩm
                </h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi culpa voluptatum, hic architecto repellat tenetur? Et optio odio quos modi, illum animi sunt est? Ex sed sint delectus nemo assumenda.
                    Necessitatibus facilis mollitia eius consequatur repellat omnis suscipit quae deleniti eos, dolores maxime dolorem quis ipsum consectetur. Ipsa nam quaerat hic rerum molestiae reprehenderit architecto possimus. Animi distinctio ratione suscipit?</p>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <Button style="padding: 10px 45px; background-color: orange; color: white; font-size: 1.5rem; border-radius: 12px; border: none;">
                    <p style="margin: 0;">Add to Cart</p>
                </Button>
                <a href="" style="color: orange;"><b>Report this</b></a>
            </div>
        </div>
    </div>
</div>
<h1 class="container my-4">Best Deals for you</h1>
<?php include(__DIR__ . '../../ListProduct/list-product.php'); ?>
<?php include(__DIR__ . '../../Tranding/tranding.php'); ?>


<script>
    $('.main-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        asNavFor: '.thumb-slider'
    });
    $('.thumb-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.main-slider',
        dots: false,
        arrows: false,
        centerMode: true,
        focusOnSelect: true
    });
</script>
<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/shop.php'); ?>