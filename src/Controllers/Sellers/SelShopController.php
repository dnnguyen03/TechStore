<?php

namespace App\Controllers\Sellers;

use App\Controller;

class SelShopController extends Controller
{
    public function index()
    {
        $this->render('Seller/shops/index', []);
    }

    public function create()
    {
        $this->render('Seller/shops/edit', []);
    }

    public function update($shopId)
    {
        $this->render('Seller/shops/edit', ['shopId'=> $shopId]);
    }
}

?>