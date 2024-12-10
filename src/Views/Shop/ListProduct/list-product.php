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

    .cardProduct :hover .cardProduct .image img {
        transform: translate(zoo);
    }
</style>
<div class="list-product container" style="margin-bottom: 30px;">
    <div class="cardProduct">
        <div class="image">
            <img src="../../../assets/images/product.png" alt="">
        </div>
        <div class="inforProduct p-3">
            <h4 class="nameProduct">Product Name</h4>
            <h5 class="price">100.000đ</h5>
            <div class="desc mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, consequuntur culpa. Exercitationem ratione enim voluptas inventore iure! Natus enim, ea corrupti id consequatur iusto voluptatem, esse repudiandae pariatur nam exercitationem.</div>
            <button class="btn btn-primary">Add to cart</button>
        </div>
    </div>
    <div class="cardProduct">
        <div class="image">
            <img src="../../../assets/images/product.png" alt="">
        </div>
        <div class="inforProduct p-3">
            <h4 class="nameProduct">Product Name</h4>
            <h5 class="price">100.000đ</h5>
            <div class="desc mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, consequuntur culpa. Exercitationem ratione enim voluptas inventore iure! Natus enim, ea corrupti id consequatur iusto voluptatem, esse repudiandae pariatur nam exercitationem.</div>
            <button class="btn btn-primary">Add to cart</button>
        </div>
    </div>
    <div class="cardProduct">
        <div class="image">
            <img src="../../../assets/images/product.png" alt="">
        </div>
        <div class="inforProduct p-3">
            <h4 class="nameProduct">Product Name</h4>
            <h5 class="price">100.000đ</h5>
            <div class="desc mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, consequuntur culpa. Exercitationem ratione enim voluptas inventore iure! Natus enim, ea corrupti id consequatur iusto voluptatem, esse repudiandae pariatur nam exercitationem.</div>
            <button class="btn btn-primary">Add to cart</button>
        </div>
    </div>
    <div class="cardProduct">
        <div class="image">
            <img src="../../../assets/images/product.png" alt="">
        </div>
        <div class="inforProduct p-3">
            <h4 class="nameProduct">Product Name</h4>
            <h5 class="price">100.000đ</h5>
            <div class="desc mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, consequuntur culpa. Exercitationem ratione enim voluptas inventore iure! Natus enim, ea corrupti id consequatur iusto voluptatem, esse repudiandae pariatur nam exercitationem.</div>
            <button class="btn btn-primary">Add to cart</button>
        </div>
    </div>
</div>