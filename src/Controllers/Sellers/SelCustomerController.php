<?php

namespace App\Controllers\Sellers;

use App\Controller;
use App\Models\Customer;
use App\Models\Order;

class SelCustomerController extends Controller
{
    private $customerModel;
    private $orderModel;

    public function __construct()
    {
        $this->customerModel = new Customer();
        $this->orderModel = new Order();
    }

    public function index()
    {
        $seller_id = $_SESSION["seller_id"];
        $searchValue = "";
        $page = 1;
        $pageSize = 7;
        $count = 0;

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $searchValue = isset($_GET['searchValue']) ? trim($_GET['searchValue']) : "";
            $page = isset($_GET['page']) ? max((int)$_GET['page'], 1) : 1;
        }

        $count = $this->customerModel->countCustomersBySeller($seller_id, $searchValue);

        $pageCount = ceil($count / $pageSize);

        $CustomerBySellers = $this->customerModel->searchCustomersBySeller($seller_id, $searchValue, $page, $pageSize);

        $this->render('Seller/customers/index', [
            'CustomerBySellers' => $CustomerBySellers,
            'page' => $page,
            'pageSize' => $pageSize,
            'searchValue' => $searchValue,
            'pageCount' => $pageCount
        ]);
    }

    public function detail($customer_id)
    {
        $seller_id = $_SESSION["seller_id"];

        $customer = $this->customerModel->getCustomerById($customer_id);
        $orderByCustomers = $this->orderModel->getAllOrderSellerByCustomer($seller_id, $customer_id);
        $this->render('Seller/customers/detail', ['customer' => $customer, 'orderByCustomers' => $orderByCustomers]);
    }
}
