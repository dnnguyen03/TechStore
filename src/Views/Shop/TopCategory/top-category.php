<div class="container my-4">
    <h1 class="mb-4 mt-5">Loại hàng nổi bật</h1>
    <div style="  display: flex; justify-content: space-between;">
        <?php
        foreach ($get6Category as $category) : ?>
            <?php
            $imagePath = "/src/assets/images/" . $category['photo_url'];
            $defaultImage = "/src/assets/images/no_img.png";
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $imagePath)) {
                $displayImage = $imagePath;
            } else {
                $displayImage = $defaultImage;
            }
            ?>
            <a href="products?categories=<?= $category['category_id'] ?>" style="text-decoration: none; border-radius: 8px; overflow: hidden;">
                <div style="height: 230px; width: 180px; position: relative;">
                    <div class="backgound" style="height: 100%;">
                        <img src="<?= $displayImage ?>" height="100%" width="100%" style="object-fit: cover;" alt="">
                    </div>
                    <div class="overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.35); z-index: 1;"></div>
                    <div class="title" style="color: white;position: absolute; top: 20px; left: 50%; transform: translateX(-50%); z-index: 2; text-align: center;">
                        <b style="font-size: 20px;">
                            <?= $category['category_name'] ?>
                        </b>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>