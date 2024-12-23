<?php

namespace App\Controllers\Sellers;

use App\Controller;
use App\Models\Statistical;

class SelHomeController extends Controller
{
    private $homeModel;

    public function __construct()
    {
        $this->homeModel = new Statistical();
    }

    public function index()
    {
        $seller_id = 1;
        $countProduct = $this->homeModel->countProductBySeller($seller_id);
        $totalRevenue = $this->homeModel->totalRevenueBySeller($seller_id);
        $totalRevenue = floor($totalRevenue);
        $countNewOrder = $this->homeModel->countNewOrderBySeller($seller_id);
        $countCustomer = $this->homeModel->countCustomerBySeller($seller_id);

        $this->render('Seller/homes/index', ['countProduct' => $countProduct, 
                                             'totalRevenue' => $totalRevenue, 
                                             'countNewOrder' => $countNewOrder, 
                                             'countCustomer' => $countCustomer]);
    }
}
