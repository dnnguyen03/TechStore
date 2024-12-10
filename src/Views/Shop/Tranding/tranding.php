<style>
    .Tranding .title {
        position: absolute;
        bottom: 0;
        width: 100%;
        padding: 20px 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: #0000004a;
    }

    .Tranding .btn-primary {
        background-color: orange;
        border-color: transparent;
        border-radius: 100px;
        width: 120px;
        transition: 0.2s linear;
    }

    .Tranding .btn-primary:hover {
        border: 1px solid orange;
        background-color: white;
        color: orange;
    }

    .cardTranding {
        min-width: 445px;
        width: 48%;
        position: relative;
        border-radius: 15px;
        overflow: hidden;
        background-color: #f0f0f0;
        text-align: center;
        border: 1px solid #ccc;
    }
</style>
<div class="Tranding container">
    <h1 style="margin-bottom: 15px;">Tranding Produtc</h1>
    <div>
        <div style="margin-bottom: 30px; display: flex; flex-wrap: wrap; gap: 20px; justify-content: space-between; align-items: center;">
            <div class="cardTranding">
                <div class="background">
                    <img src="../../../assets/images/product.png" alt="" style="height: 100% ; object-fit:fill;">
                </div>
                <div class="title">
                    <h3>Product Category</h3>
                    <button class="btn-primary">Shop Now</button>
                </div>
            </div>
            <div class="cardTranding">
                <div class="background">
                    <img src="../../../assets/images/product.png" alt="">
                </div>
                <div class="title">
                    <h3>Product Category</h3>
                    <button class="btn-primary">Shop Now</button>
                </div>
            </div>
        </div>

    </div>
</div>