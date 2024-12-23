<?php

namespace App\Controllers\Sellers;

use App\Controller;
use App\Models\Order;

class SelOrderController extends Controller
{
    private $orderModel;

    public function __construct()
    {
        $this->orderModel = new Order();
    }

    public function index()
    {
        $seller_id = 1;
        $OrderBySellers = $this->orderModel->getAllOrderBySeller($seller_id);

        $this->render('Seller/orders/index', ['OrderBySellers' => $OrderBySellers]);
    }
    
    public function detail()
    {
        $this->render('Seller/orders/detail', []);
    }
}

?>
