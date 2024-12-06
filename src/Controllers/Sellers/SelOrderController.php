<?php

namespace App\Controllers\Sellers;

use App\Controller;

class SelOrderController extends Controller
{
    public function index()
    {
        $this->render('Seller/orders/index', []);
    }
}

?>
