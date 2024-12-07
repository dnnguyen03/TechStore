<?php

namespace App\Controllers\Sellers;

use App\Controller;

class SelCustomerController extends Controller
{
    public function index()
    {
        $this->render('Seller/customers/index', []);
    }
    
    public function detail()
    {
        $this->render('Seller/customers/detail', []);
    }
}
?>
