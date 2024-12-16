<?php

require_once '../Models/user.php';

use App\Models\User;

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    // Lấy thông tin người dùng theo ID
    public function getUser($userId)
    {
        $user = $this->userModel->getUserById($userId);

        if (!$user) {
            $_SESSION['flash_error'] = 'User not found.';
            header('Location: /error');
            exit();
        }

        return $user;
    }

    // Cập nhật thông tin người dùng
    public function updateUser($userId, $username, $password, $role)
    {
        // Kiểm tra quyền
        if ($_SESSION['user_id'] !== $userId && $_SESSION['role'] !== 'admin') {
            die('Unauthorized action.');
        }

        $updateSuccess = $this->userModel->updateUser($userId, $username, $password, $role);

        if ($updateSuccess) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            $_SESSION['flash_success'] = 'User updated successfully.';
        } else {
            $_SESSION['flash_error'] = 'Failed to update user.';
        }

        header('Location: /user/profile');
        exit();
    }

    // Tạo mới người dùng
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = htmlspecialchars(trim($_POST['username']));
            $password = trim($_POST['password']);
            $confirmPassword = trim($_POST['confirm_password']);
            $role = 'customer'; // Vai trò mặc định

            // Kiểm tra nhập liệu
            if ($this->validateCreateInput($username, $password, $confirmPassword)) {
                $userCreated = $this->userModel->createUser($username, $password, $role);

                if ($userCreated) {
                    $_SESSION['flash_success'] = 'Account created successfully. Please sign in.';
                    header('Location: /auth/signin');
                    exit();
                } else {
                    $_SESSION['flash_error'] = 'Error creating account. Please try again.';
                }
            }

            header('Location: /auth/register');
            exit();
        }
    }

    // Kiểm tra dữ liệu đầu vào cho create()
    private function validateCreateInput($username, $password, $confirmPassword)
    {
        if (empty($username) || empty($password) || empty($confirmPassword)) {
            $_SESSION['flash_error'] = 'All fields are required.';
            return false;
        }

        if ($password !== $confirmPassword) {
            $_SESSION['flash_error'] = 'Passwords do not match.';
            return false;
        }

        return true;
    }
}
