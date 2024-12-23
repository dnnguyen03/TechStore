<?php

namespace App\Models;

use mysqli;

class Category
{
    private $connection;
    public function __construct()
    {
        $host = DB_HOST;
        $username = DB_USER;
        $password = DB_PASSWORD;
        $database = DB_NAME;

        $this->connection = new mysqli($host, $username, $password, $database);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function getAllCategories($searchKeyword = '')
    {
        $searchKeyword = "%$searchKeyword%"; 
        $query = "SELECT * FROM category WHERE category_name LIKE ? ORDER BY category_id ASC";
        $stmt = $this->connection->prepare($query);

        if ($stmt) {
            $stmt->bind_param("s", $searchKeyword); 
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC); 
        }

        return [];
    }

    public function getCategoryById($categoryId)
    {
        $query = "SELECT * FROM category WHERE category_id = ?";
        $stmt = $this->connection->prepare($query);

        if ($stmt) {
            $stmt->bind_param("i", $categoryId);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc(); 
        }

        return null;
    }

    // Thêm danh mục mới
    public function addCategory($name, $description, $photoUrl = null)
    {
        $query = "INSERT INTO category (category_name, category_desc, photo_url) VALUES (?, ?, ?)";
        $stmt = $this->connection->prepare($query);

        if ($stmt) {
            $stmt->bind_param("sss", $name, $description, $photoUrl); 
            return $stmt->execute();
        }

        return false;
    }

    // Cập nhật danh mục
    public function updateCategory($categoryId, $name, $description, $photoUrl = null)
    {
        $query = "UPDATE category SET category_name = ?, category_desc = ?, photo_url = ? WHERE category_id = ?";
        $stmt = $this->connection->prepare($query);

        if ($stmt) {
            $stmt->bind_param("sssi", $name, $description, $photoUrl, $categoryId); 
            return $stmt->execute(); 
        }

        return false;
    }

    // Xóa danh mục
    public function deleteCategory($categoryId)
    {
        $query = "DELETE FROM category WHERE category_id = ?";
        $stmt = $this->connection->prepare($query);

        if ($stmt) {
            $stmt->bind_param("i", $categoryId); 
            return $stmt->execute(); 
        }

        return false;
    }
}
