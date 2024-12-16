<?php
namespace App\Models;

class user
{
    private $mysqli;

    public function __construct()
    {
        $host = DB_HOST;
        $username = DB_USER;
        $password = DB_PASSWORD;
        $database = DB_NAME;

        $this->mysqli = new \mysqli($host, $username, $password, $database);

        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }

    public function getAllUsers()
    {
        $result = $this->mysqli->query("SELECT * FROM users");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserById($userId)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getUserByUsername($username)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function createUser($username, $password, $role)
    {
        $username = $this->mysqli->real_escape_string($username);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $role = $this->mysqli->real_escape_string($role);
    
        $stmt = $this->mysqli->prepare("INSERT INTO users (username, password_input, role) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $username, $hashedPassword, $role);
    
        $result = $stmt->execute();
        $stmt->close();
    
        return $result;
    }

    public function verifyUser($username, $password)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password_input'])) {
            return $user;
        }
        return false;
    }

    public function updateUser($userId, $username, $password, $role)
    {
        $stmt = $this->mysqli->prepare("UPDATE users SET username = ?, password_input = ?, role = ? WHERE id = ?");
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("sssi", $username, $hashedPassword, $role, $userId);
        return $stmt->execute();
    }
}
?>