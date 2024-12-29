<style>
    .allProduct li {
        box-sizing: border-box;
        list-style-type: none;
    }

    .allProduct a {
        text-decoration: none;
    }

    .allProduct .sidebar-prod {
        position: relative;
        width: 30%;
        height: fit-content;
        padding: 15px;
        border-radius: 15px;
        box-shadow: 0px 2px 7px 1px rgba(0, 0, 0, 0.2);
    }

    .allProduct .filter-by-side {
        width: 100%;
        top: 170px;
        transition: 0.25s;
    }

    .allProduct .list-side {
        padding: 0;
        margin: 0 auto;
        margin-top: 10px;
        overflow-y: auto;
        max-height: 500px;
    }

    .allProduct .list-side::-webkit-scrollbar {
        width: 5px;
        background-color: white;
        border-radius: 100rem;
    }

    .allProduct .list-side::-webkit-scrollbar-thumb {
        background-color: #cccccc;
        border-radius: 100rem;
    }

    .allProduct .item-side {
        width: 100%;
    }

    .allProduct .rotate180 {
        transform: rotate(180deg);
    }

    .allProduct .filter-by-side .select {
        padding-right: 5px;
        height: 60px;
        width: 100%;
        font-size: 18px;

        border-top: 1px solid #e5e5e5;
        display: flex;
        align-items: center;
        cursor: pointer;
        justify-content: space-between;
    }

    .allProduct .icon-down i {
        transition: 0.3s;
    }

    .allProduct .sub-filter-size {
        width: 100%;
        display: none;
    }

    .sub-filter-size p {
        margin: 0;
    }

    .allProduct .sub-size:checked~.sub-filter-size {
        display: block;
        grid-template-columns: repeat(3, 1fr);
        padding: 0;
    }

    .allProduct .sub-price:checked~.sub-filter-price-input {
        display: block;
    }

    .allProduct .size ul li {
        padding: 5px 0;
        background-color: white;
        display: flex;
        gap: 10px;
        align-items: center;
        cursor: pointer;
    }

    .allProduct .icon-down {
        color: orange;
    }

    .allProduct .sub-filter-price-input {
        display: none;
        width: 100%;
        padding: 0;
        padding-bottom: 30px;
        border-bottom: 1px solid #e5e5e5;
    }

    .allProduct .price-number {
        width: 100%;
        display: flex;
        padding: 10px;
    }

    .allProduct .sub-filter-price-input .field {
        height: 40px;
        width: 100%;
        display: flex;
        align-items: center;
    }

    .allProduct .field input {
        width: 100%;
        height: 100%;
        outline: none;
        font-size: 15px;
        text-align: center;
        border-radius: 5px;
        border: 1px solid #999;
        -moz-appearance: none;
    }

    .allProduct input[type="number"]::-webkit-outer-spin-button,
    .allProduct input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
    }

    .allProduct .sub-filter-price-input .separator {
        width: 60px;
        display: flex;
        font-size: 19px;
        align-items: center;
        justify-content: center;
    }

    .allProduct .price-slider {
        height: 5px;
        border-radius: 5px;
        background-color: #ff9c004a;
        position: relative;
    }

    .allProduct .price-slider .progress {
        height: 5px;
        position: absolute;
        left: 0;
        right: 0;
        border-radius: 5px;
        background-color: orange;
    }

    .allProduct .range-input {
        position: relative;
    }

    .allProduct .range-input input {
        position: absolute;
        top: -5px;
        height: 5px;
        width: 100%;
        background: none;
        pointer-events: none;
        -webkit-appearance: none;
    }

    .allProduct input[type="range"]::-webkit-slider-thumb {
        height: 17px;
        width: 17px;
        border-radius: 50%;
        border: none;
        -webkit-appearance: none;
        background-color: orange;
        pointer-events: auto;
    }

    .allProduct input[type="range"]::-moz-range-thumb {
        height: 17px;
        width: 17px;
        border-radius: 50%;
        border: none;
        -webkit-appearance: none;
        background-color: black;
        pointer-events: auto;
    }

    .headerFilter {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .headerFilter button {
        border-radius: 5px;
        border: 1px solid orange;
        background-color: white;
        padding: 5px 10px;
        transition: 0.2s all linear;
    }

    .headerFilter button:hover {
        background-color: orange;
        color: white;
    }

    .allProduct .page-item a {
        color: orange;
    }

    .allProduct .pagination .active {
        background-color: orange;
    }

    .allProduct .pagination .active a {
        color: white;

    }
</style>
<?php ob_start(); ?>
<div class="allProduct">
    <?php include(__DIR__ . '../../Banner/bannerAllProduct.php'); ?>
    <div class="container" style="padding: 0; margin-top: 40px; display: flex; gap: 30px;">
        <div class="sidebar-prod">
            <div class="overlay-filter hidec"></div>
            <div class="filter-by-side hidec">
                <div class="headerFilter">
                    <h5 style="margin: 0;">Filter</h5>
                    <button>Reset</button>
                </div>
                <ul class="list-side">
                    <li class="item-side">
                        <label for="C" class="select">
                            <div class="item-side-title">Mức giá</div>
                            <div class="icon-down">
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                        </label>
                        <input type="checkbox" class="sub-price" id="C" hidden />
                        <ul class="sub-filter-price-input">
                            <div class="price-number">
                                <div class="field">

                                    <input type="number" class="input-min" value="0" />
                                </div>
                                <div class="separator">-</div>
                                <div class="field">

                                    <input type="number" class="input-max" value="5000000" />
                                </div>
                            </div>
                            <div class="price-slider">
                                <div class="progress"></div>
                            </div>
                            <div class="range-input">
                                <input
                                    type="range"
                                    class="range-min"
                                    min="0"
                                    max="5000000"
                                    value="0"
                                    step="100000" />
                                <input
                                    type="range"
                                    class="range-max"
                                    min="0"
                                    max="5000000"
                                    value="5000000"
                                    step="100000" />
                            </div>
                        </ul>
                    </li>
                    <li class="item-side size">
                        <label class="select" for="A">
                            <div class="item-side-title">Loại</div>
                            <div class="icon-down">
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                        </label>
                        <input type="checkbox" class="sub-size" id="A" hidden />
                        <ul class="sub-filter-size">
                            <li>
                                <input type="checkbox">
                                <p>Category 1</p>
                            </li>
                            <li>
                                <input type="checkbox">
                                <p>Category 1</p>
                            </li>
                            <li>
                                <input type="checkbox">
                                <p>Category 1</p>
                            </li>
                            <li>
                                <input type="checkbox">
                                <p>Category 1</p>
                            </li>
                            <li>
                                <input type="checkbox">
                                <p>Category 1</p>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div>
            <?php include(__DIR__ . '../../ListProduct/list-product.php'); ?>
            <nav aria-label="Page navigation">
                <ul class="pagination" id="pagination" style="justify-content: center;">
                    <li class="page-item active page-link"><a href="#">
                            1
                        </a></li>
                    <li class="page-item page-link"><a href="#">
                            2 </a></li>
                    <li class="page-item page-link"><a href="#">
                            3 </a></li>
                </ul>
            </nav>
        </div>
    </div>
    <h3 class="container my-4">Choose by Shops</h3>
    <?php include(__DIR__ . '../../ListShop/ListShop.php'); ?>
    <?php include(__DIR__ . '../../Poster/poster.php'); ?>
    <?php include(__DIR__ . '../../Tranding/tranding.php'); ?>
</div>
<script>
    const subfilter = document.querySelectorAll(".sub-filter");
    const select = document.querySelectorAll(".select");
    const iconfilter = document.querySelectorAll(".icon-down i");
    select.forEach((item, index) => {
        item.addEventListener("click", () => {
            iconfilter[index].classList.toggle("rotate180");
        });
    });
    const size = document.querySelectorAll(".size ul li");
    const color = document.querySelectorAll(".sub-filter-color span");
    size.forEach((item, index) => {
        item.addEventListener("click", () => {
            size[index].classList.toggle("active-size");
        });
    });
    color.forEach((item, index) => {
        item.addEventListener("click", () => {
            color[index].classList.toggle("active-color");
        });
    });
    const rangeInput = document.querySelectorAll(".range-input input");
    priceInput = document.querySelectorAll(".price-number input");
    progress = document.querySelector(".price-slider .progress");
    let priceGap = 500000;

    rangeInput.forEach((input) => {
        input.addEventListener("input", (e) => {
            let minVal = parseInt(rangeInput[0].value);
            maxVal = parseInt(rangeInput[1].value);
            if (maxVal - minVal < priceGap) {
                if (e.target.className == "range-min") {
                    rangeInput[0].value = maxVal - priceGap;
                } else {
                    rangeInput[1].value = minVal + priceGap;
                }
            } else {
                priceInput[0].value = minVal;
                priceInput[1].value = maxVal;
                progress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                progress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
            }
        });
    });
    priceInput.forEach((input) => {
        input.addEventListener("input", (e) => {
            let minVal = parseInt(priceInput[0].value);
            maxVal = parseInt(priceInput[1].value);
            if (maxVal - minVal >= priceGap && maxVal <= 5000000) {
                if (e.target.className == "input-min") {
                    rangeInput[0].value = minVal;
                    progress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                } else {
                    rangeInput[1].value = maxVal;
                    progress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                }
            }
        });
    });
</script>
<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/shop.php'); ?>