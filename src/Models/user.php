<?php

namespace App\Models;

use Exception;

class User
{
    private $connection;

    public function __construct()
    {
        $host = DB_HOST;
        $username = DB_USER;
        $password = DB_PASSWORD;
        $database = DB_NAME;

        $this->connection = new \mysqli($host, $username, $password, $database);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function getAllUsers()
    {
        $stmt = $this->connection->prepare("SELECT * FROM users");
        if (!$stmt) {
            error_log("Prepare failed: " . $this->connection->error);
            return false;
        }
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserById($userId)
    {
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE user_id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getUserByUsername($username)
    {
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function createUser($username, $password, $role)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->connection->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $username, $hashedPassword, $role);

        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    public function verifyUser($username, $password)
    {
        try {
            // Chuẩn bị câu truy vấn để kiểm tra username
            $stmt = $this->connection->prepare("SELECT user_id, username, password, role FROM users WHERE username = ?");
            if (!$stmt) {
                throw new Exception("Prepare statement failed: " . $this->connection->error);
            }

            // Gắn giá trị và thực thi truy vấn
            $stmt->bind_param("s", $username);
            $stmt->execute();

            // Lấy kết quả truy vấn
            $result = $stmt->get_result();

            // Kiểm tra nếu tồn tại username
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();

                // Xác thực mật khẩu bằng cách so sánh hash
                if (password_verify($password, $user['password'])) {
                    // Trả về thông tin người dùng nếu xác thực thành công
                    return [
                        'user_id' => $user['user_id'],
                        'username' => $user['username'],
                        'role' => $user['role']
                    ];
                } else {
                    // Mật khẩu không chính xác
                    return false;
                }
            } else {
                // Không tìm thấy username
                return false;
            }
        } catch (Exception $e) {
            // Ghi log lỗi khi gặp vấn đề
            error_log("Error in verifyUser: " . $e->getMessage());
            return false;
        } finally {
            // Đảm bảo đóng statement sau khi thực hiện
            $stmt->close();
        }
    }



    public function updateUser($userId, $username, $password, $role)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->connection->prepare("UPDATE users SET username = ?, password = ?, role = ? WHERE user_id = ?");
        $stmt->bind_param("sssi", $username, $hashedPassword, $role, $userId);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    public function getTotalSellers()
    {
        $stmt = $this->connection->prepare("SELECT COUNT(*) AS total_sellers FROM users WHERE role = 'Người Bán'");
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        return $data['total_sellers'];
    }

    public function getTotalCustomers()
    {
        $stmt = $this->connection->prepare("SELECT COUNT(*) AS total_customers FROM users WHERE role = '1'");
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        return $data['total_customers'];
    }
    public function getUsers($search = '')
    {
        $searchParam = '%' . $search . '%';

        $stmt = $this->connection->prepare(
            "SELECT * FROM users 
             WHERE username LIKE ?"
        );

        if (!$stmt) {
            error_log("Prepare failed: " . $this->connection->error);
            return false;
        }

        $stmt->bind_param('s', $searchParam);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
