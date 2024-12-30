<?php

namespace App\Controllers\Auth;

use App\Controller;
use App\Models\User;
use App\Models\CustomerModel\Profile;

class AuthController extends Controller
{
    private $userModel;
    private $profileModel;

    public function __construct()
    {
        $this->userModel = new User();
        $this->profileModel = new Profile();
    }

    // Xử lý đăng nhập
    public function signin()
    {
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userModel->getUserByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                if($user["is_lock"]==1){
                    $_SESSION["loginerror"] = "Tài khoản đã bị khóa.";

                    header('Location: /signin');
                    return;
                }
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
                $_SESSION["loginerror"] = "Tên đăng nhập hoặc mật khẩu không chính xác.";

                header('Location: /signin');
                return;
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
            $full_name = $_POST['full_name'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $address = $_POST['address'] ?? '';
            $email = $_POST['email'] ?? '';
            $avata = $_POST['avata'] ?? '';
            $gender = $_POST['gender'] ?? '';

            // Kiểm tra mật khẩu có khớp không
            if ($password !== $confirmPassword) {
                $this->render('Auth/register', ["message" => "Mật khẩu không khớp."]);
                return;
            }

            // Kiểm tra nếu tên người dùng đã tồn tại
            if ($this->userModel->getUserByUsername($username)) {
                $this->render('Auth/register', ['message' => 'Tên đăng nhập đã tồn tại.']);
                return;
            }

            // Tạo tài khoản
            $newUserId = $this->userModel->createUser($username, $password);
            if ($newUserId != false) {
                // Khởi tạo model Profile
                $this->profileModel->create($newUserId, "", "", "", "", "", "");

                // Điều hướng đến trang đăng nhập
                header('Location: /signin');
                exit();
            } else {
                $this->render('Auth/register', ['message' => 'Đã xảy ra lỗi khi tạo tài khoản.']);
            }
        } else {
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
