<?php

namespace App\Controllers\Auth;

use App\Controller;
use App\Models\User;

class AuthController extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    // Xử lý đăng nhập
    public function signin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userModel->getUserByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                // Lưu thông tin người dùng vào session
                $_SESSION['currentUser'] = $user;


                // Điều hướng đến dashboard
                if ($user['role'] == 0) {
                    header('Location: /admin/home');
                } else if ($user['role'] == 1) {
                    header('Location: /');
                }
                exit();
            } else {
                echo "Invalid username or password";
            }
        } else {
            // Hiển thị form đăng nhập
            $this->render('Auth/signin', []);
        }
    }

    // Xử lý đăng ký
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            // Kiểm tra mật khẩu có khớp không
            if ($password !== $confirmPassword) {
                $this->render('Auth/register', ["message" =>"mật khẩu k khớp"]);
                return;
            }

            // Tạo user mới
            if ($this->userModel->createUser($username, $password, '1')) {
                // Chuyển hướng đến trang đăng nhập
                header('Location: /signin');
                exit();
            } else {
                echo "Error creating account.";
            }
        } else {
            // Hiển thị form đăng ký
            $this->render('Auth/register', []);
        }
    }

    // Xử lý đăng xuất
    public function logout()
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_unset();
            session_destroy();
        }
        header('Location: /signin');
        exit();
    }
}
