<?php

namespace App\Controllers\Sellers;

use App\Controller;
use App\Models\Seller;

class SelShopController extends Controller
{    private $sellerModel;

    public function __construct()
    {
        $this->sellerModel = new Seller();
    }

    public function index()
    {
        $seller_id = $_SESSION["seller_id"];
        $seller = $this->sellerModel->getSellerById(($seller_id));
        $this->render('Seller/shops/index', ['seller' => $seller]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $shop_name = $_POST['shop_name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $user_id = $_SESSION["currentUser"]["user_id"];
            $logo_shop = $_POST['logo_shop'];
            $banner = $_POST['banner'];
            $bio_seller = $_POST['bio_seller'];

            if (isset($_FILES['uploadPhoto'])) {
                // $fileName = uniqid() . '-' . basename($_FILES['uploadPhoto']['name']);
                $fileName = basename($_FILES['uploadPhoto']['name']);

                $logo_shop = $fileName;
            }

            if (isset($_FILES['uploadPhoto2'])) {
                $fileName = basename($_FILES['uploadPhoto2']['name']);

                $banner = $fileName;
            }

            $this->sellerModel->createSeller($shop_name, $phone, $email, $address, $user_id, $logo_shop, $banner, $bio_seller);
        }

        $this->render('Seller/shops/edit', []);
    }

    public function update($seller_id)
    {        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $shop_name = $_POST['shop_name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $logo_shop = $_POST['logo_shop'];
            $banner = $_POST['banner'];
            $bio_seller = $_POST['bio_seller'];

            if (isset($_FILES['uploadPhoto']) && (basename($_FILES['uploadPhoto']['name']) != "")) {
                // $fileName = uniqid() . '-' . basename($_FILES['uploadPhoto']['name']);
                $fileName = basename($_FILES['uploadPhoto']['name']);

                $logo_shop = $fileName;
            }

            if (isset($_FILES['uploadPhoto2']) && (basename($_FILES['uploadPhoto2']['name']) != "")) {
                $fileName = basename($_FILES['uploadPhoto2']['name']);

                $banner = $fileName;
            }

            $this->sellerModel->updateSeller($seller_id, $shop_name, $phone, $email, $address, $logo_shop, $banner, $bio_seller);
        }

        $seller = $this->sellerModel->getSellerById(($seller_id));
        $this->render('Seller/shops/edit', ['seller'=> $seller]);
    }
}

?>