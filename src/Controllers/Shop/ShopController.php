<?php

namespace App\Controllers\Shop;

use App\Controller;
use App\Models\Product;

class ShopController extends Controller
{
    private $productModel;
    public function __construct()
    {
        $this->productModel = new Product();
    }
    public function index()
    {
        unset($_SESSION['seller_id']);
        $popularProduct = $this->productModel->getPopularProduct();
        $bestDealProduct = $this->productModel->getBestDeal();

        $this->render('Shop/Pages/home', ['popularProduct' => $popularProduct, 'bestDealProduct' => $bestDealProduct]);
    }
    public function allProduct()
    {
        $products = $this->productModel->getAllProduct();
 
        $this->render('Shop/Pages/allProduct', ['products' => $products]);
    }
    public function show($product_id)
    {

        $product = $this->productModel->getProductById($product_id);
        $bestDealProduct = $this->productModel->getBestDeal();

        $this->render('Shop/Pages/detailProduct', ['product' => $product, 'bestDealProduct' => $bestDealProduct]);
    }
}
