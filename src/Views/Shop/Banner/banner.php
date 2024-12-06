<style>
    .banner .btn-primary {
        background-color: orange;
        border-color: transparent;
        border-radius: 100px;
        width: 120px;
        transition: 0.2s linear;
    }

    .banner .btn-primary:hover {
        border: 1px solid orange;
        background-color: white;
        color: orange;
    }

    .banner .search {
        padding: 0 10px;
        background-color: transparent;
        outline: none;
        border: none;
        width: 100%;
    }

    .banner form {
        padding: 8px;
        border-radius: 100px;
        width: 65%;
        display: flex;
        background-color: #00000036;
    }

    .banner input {
        font-size: 18px;
        color: white;
    }

    .banner input::placeholder {
        color: white;
    }
</style>
<div class="banner container" style="position: relative; border-radius: 15px;padding: 0; overflow: hidden;">
    <div class="background">
        <img style="width: 100%;" src="../../../assets/images/bannerHome.png" alt="">
    </div>
    <div style="width: 50%; position: absolute; transform: translate(-70%,-50%); top: 50%;left: 50%;">
        <h1>Tìm sản phẩm tất nhất với <p style="color: orange;">TechStore</p>
        </h1>
        <div class="">
            <form action="">
                <input class="search" type="text" placeholder="Tìm kiếm sản phẩm">
                <button type="button" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>
</div>