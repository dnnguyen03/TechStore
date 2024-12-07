<?php

namespace App\Controllers\Sellers;

use App\Controller;

class SelOrderController extends Controller
{
    public function index()
    {
        $this->render('Seller/orders/index', []);
    }
    
    public function detail()
    {
        $this->render('Seller/orders/detail', []);
    }
}

?>
