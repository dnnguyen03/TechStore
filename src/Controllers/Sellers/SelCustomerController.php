<?php

namespace App\Controllers\Sellers;

use App\Controller;
use App\Models\Customer;

class SelCustomerController extends Controller
{
    private $customerModel;

    public function __construct()
    {
        $this->customerModel = new Customer();
    }

    public function index()
    {
        $seller_id = $_SESSION["seller_id"];
        $CustomerBySellers = $this->customerModel->getAllCustomerBySeller($seller_id);

        $this->render('Seller/customers/index', ['CustomerBySellers' => $CustomerBySellers]);
    }
    
    public function detail()
    {
        $this->render('Seller/customers/detail', []);
    }
}
?>
