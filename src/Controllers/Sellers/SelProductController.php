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
        $seller_id = $_SESSION["seller_id"];
        $searchValue = "";
        $status = 2;
        $category = 0;
        $page = 1;
        $pageSize = 7;
        $count = 0;

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $searchValue = isset($_GET['searchValue']) ? trim($_GET['searchValue']) : "";
            $status = isset($_GET['status']) ? (int)$_GET['status'] : 2;
            $category = isset($_GET['category']) ? (int)$_GET['category'] : 0;
            $page = isset($_GET['page']) ? max((int)$_GET['page'], 1) : 1;
        }

        $count = $this->productModel->count($seller_id, $searchValue, $category, $status);

        $pageCount = ceil($count / $pageSize);
        $products = $this->productModel->searchProductBySeller($seller_id, $searchValue, $category, $status, $page, $pageSize);

        $this->render('Seller/products/index', [
            'products' => $products,
            'page' => $page,
            'pageSize' => $pageSize,
            'searchValue' => $searchValue,
            'status' => $status,
            'category' => $category,
            'pageCount' => $pageCount
        ]);
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
            $seller_id = $_SESSION["seller_id"];

            if (isset($_FILES['uploadPhoto'])) {
                // $fileName = uniqid() . '-' . basename($_FILES['uploadPhoto']['name']);
                $fileName = basename($_FILES['uploadPhoto']['name']);

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
            $seller_id = $_SESSION["seller_id"];

            if (isset($_FILES['uploadPhoto']) && (basename($_FILES['uploadPhoto']['name']) != "")) {
                $fileName = basename($_FILES['uploadPhoto']['name']);

                $image = $fileName;
            }

            $this->productModel->updateProduct($product_id, $product_name, $product_decs, $category_id, $price, $image, $quantity, $status, $seller_id);
        }

        $product = $this->productModel->getProductByIdSeller($product_id);
        $photos = $this->productModel->getProductPhotosByProductId($product_id);
        $this->render('Seller/products/edit', ['product' => $product, 'photos' => $photos]);
    }

    public function delete($product_id)
    {
        $this->productModel->deleteProduct($product_id);
        header('Location: /seller/products');
    }

    public function createPhoto()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $product_id = $_GET['product_id'];
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product_id = $_POST['product_id'];
            $image = $_POST['image'];
            $description = $_POST['description'];
            $display_order = $_POST['display_order'];
            $is_hidden = isset($_POST['is_hidden']) ? (int)$_POST['is_hidden'] : 0;

            if (isset($_FILES['uploadPhoto'])) {
                $fileName = basename($_FILES['uploadPhoto']['name']);

                $image = $fileName;
            }

            $this->productModel->createProductPhoto($product_id, $image, $description, $display_order, $is_hidden);
        }

        $this->render('Seller/products/photos/edit', ['product_id' => $product_id]);
    }

    public function updatePhoto($photo_id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $product_id = $_GET['product_id'];
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product_id = $_POST['product_id'];
            $image = $_POST['image'];
            $description = $_POST['description'];
            $display_order = $_POST['display_order'];
            $is_hidden = isset($_POST['is_hidden']) ? (int)$_POST['is_hidden'] : 0;

            if (isset($_FILES['uploadPhoto']) && (basename($_FILES['uploadPhoto']['name']) != "")) {
                $fileName = basename($_FILES['uploadPhoto']['name']);

                $image = $fileName;
            }

            $this->productModel->updateProductPhoto($photo_id, $product_id, $image, $description, $display_order, $is_hidden);
        }

        $photo = $this->productModel->getProductPhotoById($photo_id);
        $this->render('Seller/products/photos/edit', ['photo' => $photo, 'product_id' => $product_id]);
    }

    public function deletePhoto($photo_id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $product_id = $_GET['product_id'];
        }
        $this->productModel->deleteProductPhoto($photo_id);
        header('Location: /seller/products/update/' . $product_id);
    }
}
