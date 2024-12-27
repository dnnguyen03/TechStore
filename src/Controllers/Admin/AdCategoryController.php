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
    public function create()
    {
        $this->render('Admin/categories/create');
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $photoUrl = $_POST['photo_url'] ?? null;

            try {
                $this->categoryModel->addCategory($name, $description, $photoUrl);
                header('Location: /admin/categories');
                exit;
            } catch (\Exception $e) {
                error_log('Error adding category: ' . $e->getMessage());
            }
        }
        $this->render('Admin/categories/create', ['error' => 'Failed to add category.']);
    }
    public function edit($id)
    {
        try {
            $category = $this->categoryModel->getCategoryById($id);
        } catch (\Exception $e) {
            error_log('Error fetching category: ' . $e->getMessage());
            $category = null;
        }

        $this->render('Admin/categories/edit', ['category' => $category]);
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $photoUrl = $_POST['photo_url'] ?? null;

            try {
                $this->categoryModel->updateCategory($id, $name, $description, $photoUrl);
                header('Location: /admin/categories');
                exit;
            } catch (\Exception $e) {
                error_log('Error updating category: ' . $e->getMessage());
            }
        }

        $this->render('Admin/categories/edit', ['error' => 'Failed to update category.']);
    }
    public function delete($id)
{
    try {
        $this->categoryModel->deleteCategory($id);
        header('Location: /admin/categories');
        exit;
    } catch (\Exception $e) {
        error_log('Error deleting category: ' . $e->getMessage());
    }
}
}
