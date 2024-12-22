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


    .cardProduct .desc {
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
    <?php
    // Render danh sách sản phẩm
    foreach ($products as $product) : ?>
        <div class="cardProduct">
            <div class="image">
                <img src="<?= $product['image']; ?>" alt="<?= htmlspecialchars($product['product_name']); ?>">
            </div>
            <div class="inforProduct p-3">
                <div>
                    <h4 class="nameProduct"><?= htmlspecialchars($product['product_name']); ?></h4>
                    <h5 class="price"><?= htmlspecialchars($product['price']); ?></h5>
                    <div class="desc mb-3"><?= htmlspecialchars($product['product_decs']); ?></div>
                </div>
                <div>
                    <a href="/Product/<?= $product['product_id'] ?>">
                        <button class="btn btn-secondary">View detail</button>
                    </a>
                    <a href="">
                        <button class="btn btn-primary">Add to cart</button>
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>