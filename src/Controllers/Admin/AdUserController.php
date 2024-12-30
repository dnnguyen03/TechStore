<?php

namespace App\Controllers\Admin;

use App\Controller;
use App\Models\User;

class AdUserController extends Controller
{
    private $userModel;

    public function __construct()
    {
        // Khởi tạo model Category
        $this->userModel = new User();
    }
    public function index()
    {
        $userModel = new User();

        // Nhận tham số tìm kiếm từ query string
        $search = isset($_GET['search']) ? $_GET['search'] : '';

        // Lấy danh sách người dùng dựa trên tìm kiếm
        $users = $userModel->getUsers($search);

        $this->render('Admin/users/index', [
            'accounts' => $users,
            'search' => $search,
        ]);
    }
    public function lock(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_POST['user_id'];
            $status = $_POST['status'];
            $this->userModel->updateStatusUser($user_id, $status);
        }
        header('Location: /admin/users');
    }
}
