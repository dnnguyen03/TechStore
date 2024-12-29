<style>
    .ProdRating {
        color: orange;
        font-size: 20px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .ProdRating p {
        color: #212529;
        margin: 0;
        margin-left: 10px;
    }
</style>
<div class="container">
    <?php
    function getImagePath($imageName, $defaultImage)
    {
        $imagePath = "/src/assets/images/" . $imageName;
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $imagePath || empty($imageName))) {
            return $imagePath;
        } else {
            return $defaultImage;
        }
    }
    $defaultImage = "/src/assets/images/no_img.png";
    $displayImage = getImagePath($inforShop['logo_shop'], $defaultImage);
    $displayBanner = getImagePath($inforShop['banner'], $defaultImage);
    ?>
    <div>
        <div style="height: 350px; overflow: hidden; border-radius: 12px; background-color: #d7dfe3; display: flex; align-items: center; justify-content: center;">
            <img src="<?= $displayBanner ?>" alt="" height="100%" style="object-fit: cover;">
        </div>
        <div style="display: flex;  margin-top: -110px; padding-left: 50px;">
            <div class="avatar" style="border-radius: 100%; border: 8px solid white; overflow: hidden; width: 300px;">
                <img src="<?= $displayImage ?>" alt="" style="object-fit: cover; width: 100%;">
            </div>
            <div style="display: flex; justify-content: space-between; align-items: end; margin-left: 30px; width: 100%;">
                <div>
                    <h2><?= $inforShop['shop_name'] ?></h2>
                    <div class="ProdRating">
                        <?php
                        $fullStars = floor($inforShop['avg_rating']);
                        $halfStar = ($inforShop['avg_rating']  - $fullStars > 0) ? 1 : 0;
                        $emptyStars = 5 - $fullStars - $halfStar;

                        for ($i = 0; $i < $fullStars; $i++) {
                            echo '<i class="bi bi-star-fill"></i>';
                        }

                        if ($halfStar) {
                            echo '<i class="bi bi-star-half"></i>';
                        }

                        for ($i = 0; $i < $emptyStars; $i++) {
                            echo '<i class="bi bi-star"></i>';
                        }
                        ?>
                        <p>(<?= floor($inforShop['avg_rating'] * 10) / 10;  ?>/5)</p>
                    </div>
                    <p class="mt-2">Tổng số sản phẩm của shop: <b><?= $inforShop['total_products'] ?></b></p>
                </div>
                <a href="" style="color: orange;"><b>Report this</b></a>
            </div>
        </div>
        <h3>Mô tả về cửa hàng</h3>
        <div style="margin-top: 5px;"><?= $inforShop['bio_seller'] ?></div>
    </div>
</div>