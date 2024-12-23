<style>
    .bannerAllProduct .btn-primary {
        background-color: orange;
        border-color: transparent;
        border-radius: 100px;
        width: 120px;
        transition: 0.2s linear;
    }

    .bannerAllProduct .btn-primary:hover {
        border: 1px solid orange;
        background-color: white;
        color: orange;
    }

    .bannerAllProduct .search {
        padding: 0 10px;
        background-color: transparent;
        outline: none;
        border: none;
        width: 100%;
    }

    .bannerAllProduct form {
        padding: 8px;
        border-radius: 100px;
        width: 100%;
        display: flex;
        background-color: #00000036;
    }

    .bannerAllProduct input {
        font-size: 18px;
        color: white;
    }

    .bannerAllProduct input::placeholder {
        color: white;
    }
</style>
<div class="bannerAllProduct container" style="position: relative; border-radius: 15px;padding: 0; overflow: hidden;">
    <div class="background" style="height: 350px; overflow: hidden;">
        <img style="width: 100%;" src="/src/assets/images/bannerHome.png" alt="">
    </div>
    <div style="width: 50%; position: absolute; transform: translate(-50%,-50%); top: 50%;left: 50%; text-align: center;">
        <h1 style="color: orange;">TechStore</h1>
        <h4>Bán giá cắt cổ, còn hơn bán lỗ</h4>
        <div class="mt-3">
            <form action="">
                <input class="search" type="text" placeholder="Tìm kiếm sản phẩm">
                <button type="button" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>
</div>