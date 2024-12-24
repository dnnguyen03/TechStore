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
        $seller_id = $_SESSION["seller_id"];
        $searchValue = "";
        $status = 2;
        $page = 1;
        $pageSize = 7;
        $count = 0;

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $searchValue = isset($_GET['searchValue']) ? trim($_GET['searchValue']) : "";
            $status = isset($_GET['status']) ? (int)$_GET['status'] : 2;
            $page = isset($_GET['page']) ? max((int)$_GET['page'], 1) : 1;
        }

        $count = $this->orderModel->countOrdersBySeller($seller_id, $searchValue, $status);

        $pageCount = ceil($count / $pageSize);
        $OrderBySellers = $this->orderModel->searchOrdersBySeller($seller_id, $searchValue, $status, $page, $pageSize);

        $this->render('Seller/orders/index', [
            'OrderBySellers' => $OrderBySellers,
            'page' => $page,
            'pageSize' => $pageSize,
            'searchValue' => $searchValue,
            'status' => $status,
            'pageCount' => $pageCount
        ]);
    }

    public function detail()
    {
        $this->render('Seller/orders/detail', []);
    }
}
