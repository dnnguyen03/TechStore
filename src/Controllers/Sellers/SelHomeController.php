<?php

namespace App\Controllers\Sellers;

use App\Controller;
use App\Models\Order;
use App\Models\Seller;
use App\Models\Statistical;

class SelHomeController extends Controller
{
    private $homeModel;
    private $sellerModel;
    private $orderModel;

    public function __construct()
    {
        $this->homeModel = new Statistical();
        $this->sellerModel = new Seller();
        $this->orderModel = new Order();
    }

    public function index()
    {
        $seller_id = $_SESSION["seller_id"];
        if(!isset($_SESSION['seller_id']) || !empty($_SESSION['seller_id']) == null) header('Location: /');

        $countProduct = $this->homeModel->countProductBySeller($seller_id);
        $totalRevenue = $this->homeModel->totalRevenueBySeller($seller_id);
        $countNewOrder = $this->homeModel->countNewOrderBySeller($seller_id);
        $countCustomer = $this->homeModel->countCustomerBySeller($seller_id);
        $newOrders = $this->orderModel->searchOrdersBySeller($seller_id, "", 0, 1, 4);

        $this->render('Seller/homes/index', ['countProduct' => $countProduct, 
                                             'totalRevenue' => $totalRevenue, 
                                             'countNewOrder' => $countNewOrder, 
                                             'countCustomer' => $countCustomer,
                                             'newOrders' => $newOrders, ]);
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
                header('Location: /seller/home');
            } else {
                echo "Error: Seller information not found.";
            }
        } else {
            header('Location: /seller/shops/create');
        }
        exit();
    }

}
