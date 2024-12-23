<?php

namespace App\Controllers\Sellers;

use App\Controller;
use App\Models\Seller;
use App\Models\Statistical;

class SelHomeController extends Controller
{
    private $homeModel;
    private $sellerModel;

    public function __construct()
    {
        $this->homeModel = new Statistical();
        $this->sellerModel = new Seller();
    }

    public function index()
    {
        $seller_id = $_SESSION["seller_id"];
        if(!isset($_SESSION['seller_id']) || !empty($_SESSION['seller_id']) == null) header('Location: /');

        $countProduct = $this->homeModel->countProductBySeller($seller_id);
        $totalRevenue = $this->homeModel->totalRevenueBySeller($seller_id);
        $countNewOrder = $this->homeModel->countNewOrderBySeller($seller_id);
        $countCustomer = $this->homeModel->countCustomerBySeller($seller_id);

        $this->render('Seller/homes/index', ['countProduct' => $countProduct, 
                                             'totalRevenue' => $totalRevenue, 
                                             'countNewOrder' => $countNewOrder, 
                                             'countCustomer' => $countCustomer]);
    }

    public function checkSeller() {
        if (!isset($_SESSION["currentUser"])) {
            header('Location: /login');
            exit();
        }

        $user_id = $_SESSION["currentUser"]["user_id"];

        if ($this->sellerModel->checkSeller($user_id)) {
            $seller = $this->sellerModel->getSellerByUserId($user_id);
            if ($seller) {
                $_SESSION["seller_id"] = $seller["seller_id"];
                header('Location: /seller');
            } else {
                echo "Error: Seller information not found.";
            }
        } else {
            header('Location: /seller/shops/create');
        }
        exit();
    }

}
