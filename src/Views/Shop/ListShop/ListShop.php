<style>
    .listShop {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 280px));
        gap: 40px;
        place-content: space-between;
    }

    .cardShop {
        border: 1px solid #cbcbcb94;
        overflow: hidden;
        border-radius: 10px;
        cursor: pointer;
        transition: linear 0.2s all;
        display: flex;
        gap: 25px;
        box-shadow: 2px 2px 9px 0px rgba(184, 184, 184, 1);
        padding: 10px;
    }

    .inforShop {
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        width: 100%;
    }

    .listShop .avataShop img {
        border-radius: 100%;
        width: 100%;
        object-fit: cover;
        width: 70px;
    }

    .shopName {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .ProdRating {
        color: orange;
        font-size: 15px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .ProdRating p {
        color: #212529;
        margin: 0;
        margin-left: 10px;
    }

    .listShop a {
        text-decoration: none;
        color: #212529;
    }
</style>
<div class="listShop container" style="margin-bottom: 50px; margin-top: 20px;">
    <?php if (empty($listShop)): ?>
        <p>Không cửa hàng nào!</p>
    <?php else: ?>
        <?php
        foreach ($listShop as $shop) : ?>
            <?php
            $imagePath = "/src/assets/images/" . $shop['logo_shop'];
            $defaultImage = "/src/assets/images/no_img.png";
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $imagePath)) {
                $displayImage = $imagePath;
            } else {
                $displayImage = $defaultImage;
            }
            ?>
            <a href="shop/<?= $shop['seller_id'] ?>">

                <div class="cardShop">
                    <div class="avataShop" style="display: grid; place-content: center;">
                        <img src="<?= $displayImage ?>" alt="">
                    </div>
                    <div class="inforShop">
                        <div class="shopName">
                            <b><?= $shop['shop_name'] ?></b>
                        </div>
                        <div class="ProdRating">
                            <?php
                            $fullStars = floor($shop['avg_rating']);
                            $halfStar = ($shop['avg_rating']  - $fullStars > 0) ? 1 : 0;
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
                        </div>
                        <div class="qunality">
                            <b><?= $shop['total_products'] ?> Sản phẩm</b>
                        </div>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    <?php endif; ?>
</div>