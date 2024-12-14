<?php

namespace App\Controllers\Shop;

use App\Controller;
use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        $productModel = new Product();
        $products = $productModel->getAllProduct();

        $this->render('Shop/Pages/home', ['products' => $products]);
    }
}
