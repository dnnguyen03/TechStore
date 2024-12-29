<?php

namespace App\Controllers\Admin;

use App\Controller;
use App\Models\Category;

class AdCategoryController extends Controller
{
    private $categoryModel;

    public function __construct()
    {
        // Khởi tạo model Category
        $this->categoryModel = new Category();
    }

    public function index()
    {
        $searchKeyword = isset($_GET['search']) ? trim($_GET['search']) : '';

        try {
            $categories = $this->categoryModel->getAllCategories($searchKeyword);
        } catch (\Exception $e) {
            $categories = [];
            $error = 'Error fetching categories: ' . $e->getMessage();
        }

        $this->render('/admin/categories/index', [
            'categories' => $categories,
            'searchKeyword' => $searchKeyword,
            'error' => $error ?? null,
        ]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['category_name'] ?? '');
            $description = trim($_POST['category_decs'] ?? '');
            $photoUrl = $_POST['existing_photo'] ?? null;

          

            if (isset($_FILES['photo_url']) && (basename($_FILES['photo_url']['name']) != "")) {
                $fileName = basename($_FILES['photo_url']['name']);

                $photoUrl = $fileName;
            }

            try {
                $this->categoryModel->createCategory($name, $description, $photoUrl);
                header('Location: /admin/categories');
                exit;
            } catch (\Exception $e) {
                $error = 'Error creating category: ' . $e->getMessage();
            }
        }

        $this->render('/admin/categories/create', ['error' => $error ?? null]);
    }


    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['category_name'] ?? '');
            $description = trim($_POST['category_decs'] ?? '');
            $photoUrl = $_POST['existing_photo'] ?? null;

          

            if (isset($_FILES['photo_url']) && (basename($_FILES['photo_url']['name']) != "")) {
                $fileName = basename($_FILES['photo_url']['name']);

                $photoUrl = $fileName;
            }

            try {
                $this->categoryModel->updateCategory($id, $name, $description, $photoUrl);
                header('Location: /admin/categories');
                exit;
            } catch (\Exception $e) {
                $error = 'Error updating category: ' . $e->getMessage();
            }
        }

        $this->render('/admin/categories/edit', [
            'category' => $this->categoryModel->getCategoryById($id),
            'error' => $error ?? null,
        ]);
    }

    public function delete($id)
    {
        try {
            // Kiểm tra nếu danh mục đang được sử dụng
            if ($this->categoryModel->InUsed($id)) {
                header('Location: /admin/categories?error=Category is in use and cannot be deleted.');
                exit;
            }

            // Xóa danh mục nếu không được tham chiếu
            if ($this->categoryModel->deleteCategory($id)) {
                header('Location: /admin/categories?success=Category deleted successfully.');
                exit;
            } else {
                header('Location: /admin/categories?error=Failed to delete category.');
                exit;
            }
        } catch (\Exception $e) {
            header('Location: /admin/categories?error=An error occurred: ' . $e->getMessage());
            exit;
        }
    }
}
