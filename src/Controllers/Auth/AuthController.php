<?php
namespace App\Controllers\Auth;

require_once '../TechStore/src/Models/user.php';

use App\Models\user;

class AuthController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new user();
    }

    // Xử lý đăng nhập
    public function signin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = htmlspecialchars(trim($_POST['username']));
            $password = trim($_POST['password']);

            $result = $this->userModel->getUserByUsername($username);

            if ($result && password_verify($password, $result['password_input'])) {
                $_SESSION['user_id'] = $result['id'];
                $_SESSION['user_role'] = $result['role'];
                header('Location: /dashboard');
                exit();
            } else {
                $_SESSION['flash_error'] = "Invalid username or password.";
                header('Location: /signin');
                exit();
            }
        } else {
            include '../TechStore/src/Views/Auth/signin.php';
        }
    }

    // Xử lý đăng ký
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = htmlspecialchars(trim($_POST['username']));
            $password = trim($_POST['password']);
            $confirmPassword = trim($_POST['confirm_password']);

            if ($password !== $confirmPassword) {
                $_SESSION['flash_error'] = "Passwords do not match.";
                header('Location: /register');
                exit();
            }

            if ($this->userModel->createUser($username, $password, 'customer' or 'seller')) {
                $_SESSION['flash_success'] = "Account created successfully! Please sign in.";
                header('Location: /signin');
            } else {
                $_SESSION['flash_error'] = "Error creating account.";
                header('Location: /register');
            }
            exit();
        } else {
            include '../TechStore/src/Views/Auth/register.php';
        }
    }

    // Xử lý đăng xuất
    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: /signin');
        exit();
    }

    // Xử lý quên mật khẩu
    public function forgot()
    {

    }
}
