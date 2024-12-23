<?php

namespace App\Controllers\Admin;

use App\Controller;
use App\Models\Product;

class AdProductController extends Controller
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
    }

    public function index()
    {
        // Lấy tham số tìm kiếm từ request (nếu có)
        $searchKeyword = isset($_GET['search']) ? trim($_GET['search']) : '';

        if (!empty($searchKeyword)) {
            // Nếu có từ khóa tìm kiếm, tìm sản phẩm theo tên
            $products = $this->productModel->searchProductsByName($searchKeyword);
        } else {
            // Nếu không có từ khóa, lấy toàn bộ sản phẩm
            $products = $this->productModel->getAllProducts();
        }

        // Render view và truyền dữ liệu
        $this->render('Admin/products/index', [
            'products' => $products,
            'searchKeyword' => $searchKeyword
        ]);
    }
}

