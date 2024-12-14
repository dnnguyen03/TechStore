<?php

namespace App\Controllers\Sellers;

use App\Controller;
use App\Models\Product;

class SelProductController extends Controller
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
    }

    public function index()
    {
        $seller_id = 1;
        $products = $this->productModel->getAllProductBySeller($seller_id);
        $this->render('Seller/products/index', ['products' => $products]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product_name = $_POST['product_name'];
            $product_decs = $_POST['product_decs'];
            $category_id = $_POST['category_id'];
            $price = $_POST['price'];
            $image = $_POST['image'];
            $quantity = $_POST['quantity'];
            $status = $_POST['status'];
            $seller_id = 1;

            if (isset($_FILES['uploadPhoto'])) {
                $fileName = uniqid() . '-' . basename($_FILES['uploadPhoto']['name']);

                $image = $fileName;
            }

            $this->productModel->createProduct($product_name, $product_decs, $category_id, $price, $image, $quantity, $status, $seller_id);
        }
        
        $this->render('Seller/products/edit', []);
    }

    public function update($product_id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product_name = $_POST['product_name'];
            $product_decs = $_POST['product_decs'];
            $category_id = $_POST['category_id'];
            $price = $_POST['price'];
            $image = $_POST['image'];
            $quantity = $_POST['quantity'];
            $status = $_POST['status'];
            $seller_id = 1;

            if (isset($_FILES['uploadPhoto'])) {
                $fileName = uniqid() . '-' . basename($_FILES['uploadPhoto']['name']);

                $image = $fileName;
            }

            $this->productModel->updateProduct($product_id, $product_name, $product_decs, $category_id, $price, $image, $quantity, $status, $seller_id);
        }

        $product = $this->productModel->getProductById($product_id);
        $this->render('Seller/products/edit', ['product' => $product]);
    }

    public function delete($product_id)
    {
        $this->productModel->deleteProduct($product_id);
        header('Location: /seller/products');
    }
}
