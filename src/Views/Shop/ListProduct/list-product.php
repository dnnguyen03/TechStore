<style>
    .list-product .btn-primary {
        background-color: orange;
        border-color: transparent;
        border-radius: 100px;
        width: 120px;
    }

    .list-product .btn-primary:hover {
        border: 1px solid orange;
        background-color: white;
        color: orange;
    }

    .list-product {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 280px));
        gap: 40px;
        place-content: space-between;
    }

    .cardProduct {
        border: 1px solid #cbcbcb94;
        overflow: hidden;
        border-radius: 10px;
        cursor: pointer;
        transition: linear 0.2s all;
        display: flex;
        flex-direction: column;
    }

    .cardProduct:hover {
        box-shadow: 0px 2px 7px 1px rgba(0, 0, 0, 0.2);
    }


    .cardProduct .desc,
    .nameProduct {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        overflow: hidden;
        text-overflow: ellipsis;
        max-height: 3em;
        line-height: 1.5em;
    }

    .cardProduct .image img {
        width: 100%;
        object-fit: cover;
    }

    .inforProduct {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .btn-secondary {
        background-color: white;
        border-color: orange;
        border-radius: 100px;
        width: 120px;
        color: orange;
    }

    .btn-secondary:hover {
        background-color: orange;
        border-color: orange;
    }

    .cardProduct a {
        color: white;
    }
</style>
<div class="list-product container" style="margin-bottom: 30px;">
    <?php if (empty($products)): ?>
        <p>Không có sản phẩm nào!</p>
    <?php else: ?>
        <?php
        foreach ($products as $product) : ?>
            
            <div class="cardProduct">
                <div class="image">
                    <img src="<?= isset($product['image']) && $product['image'] != null ? "/src/assets/images/" . $product['image'] : '/src/assets/images/no_imgProduct.png' ?>" height="260xp">
                </div>
                <div class="inforProduct p-3">
                    <div>
                        <h4 class="nameProduct"><?= htmlspecialchars($product['product_name']); ?></h4>
                        <h5 class="price"><?= number_format($product['price'], 0, ',', '.') ?>đ</h5>
                        <div class="desc mb-3"><?= htmlspecialchars($product['product_decs']); ?></div>
                    </div>
                    <div>
                        <a href="/products/<?= $product['product_id'] ?>">
                            <button class="btn btn-secondary">View detail</button>
                        </a>
                        <button class="btn btn-primary addProduct"
                            data-shop-id="<?= $product['seller_id']; ?>"
                            data-product-id="<?= $product['product_id']; ?>"
                            data-product-name="<?= htmlspecialchars($product['product_name']); ?>"
                            data-price="<?= $product['price']; ?>"
                            data-image="<?= $product['image']; ?>">
                            Add to cart
                        </button>
                        <!-- <form action="/addToCart" method="POST" style="display: inline;">
                        <input type="hidden" name="shop_id" value="<?= $product['seller_id']; ?>">
                        <input type="hidden" name="image" value="<?= $product['image']; ?>">
                        <input type="hidden" name="product_id" value="<?= $product['product_id']; ?>">
                        <input type="hidden" name="product_name" value="<?= htmlspecialchars($product['product_name']); ?>">
                        <input type="hidden" name="price" value="<?= $product['price']; ?>">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn btn-primary">Add to cart</button>
                    </form> -->
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>