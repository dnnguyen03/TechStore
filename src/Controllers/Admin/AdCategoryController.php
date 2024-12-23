<?php

namespace App\Controllers\Admin;

use App\Controller;
use App\Models\Category;

class AdCategoryController extends Controller
{
    private $categoryModel;

    public function __construct()
    {
        // Khởi tạo model Categories
        $this->categoryModel = new Category();
    }

    public function index()
    {
        // Lấy từ khóa tìm kiếm từ request (nếu có)
        $searchKeyword = isset($_GET['search']) ? trim($_GET['search']) : '';

        // Lấy danh sách các danh mục từ model
        try {
            $categories = $this->categoryModel->getAllCategories($searchKeyword);
        } catch (\Exception $e) {
            $categories = [];
            error_log('Error fetching categories: ' . $e->getMessage());
        }

        // Truyền dữ liệu sang view
        $this->render('Admin/categories/index', [
            'categories' => $categories,
            'searchKeyword' => $searchKeyword,
        ]);
    }
}
