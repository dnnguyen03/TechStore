<?php

namespace App\Controllers\Admin;

use App\Controller;
use App\Models\User;

class AdUserController extends Controller
{
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
}
