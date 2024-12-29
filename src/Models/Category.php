<?php

namespace App\Models;

use Exception;
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

    // Lấy tất cả danh mục với từ khóa tìm kiếm
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

    // Lấy thông tin danh mục theo ID
    public function getCategoryById($categoryId)
    {
        $query = "SELECT * FROM category WHERE category_id = ?";
        $stmt = $this->connection->prepare($query);
    
        if ($stmt) {
            // Liên kết tham số (categoryId phải là một số nguyên)
            $stmt->bind_param("i", $categoryId); 
            $stmt->execute();
            $result = $stmt->get_result();
    
            // Kiểm tra và trả về kết quả nếu tồn tại
            if ($result) {
                return $result->fetch_assoc();
            }
        }
    
        return null; // Trả về null nếu không tìm thấy hoặc có lỗi
    }

    // Thêm danh mục mới
    public function createCategory($name, $description, $photoUrl = null)
    {
        try {
            // Kiểm tra trùng lặp danh mục
            $checkQuery = "SELECT COUNT(*) as count FROM category WHERE category_name = ?";
            $checkStmt = $this->connection->prepare($checkQuery);
    
            if ($checkStmt) {
                $checkStmt->bind_param("s", $name);
                $checkStmt->execute();
                $result = $checkStmt->get_result();
                $row = $result->fetch_assoc();
                $checkStmt->close();
    
                if ($row['count'] > 0) {
                    throw new Exception("Category name already exists.");
                }
            }
    
            // Thêm mới danh mục
            $query = "INSERT INTO category (category_name, category_decs, photo_url) VALUES (?, ?, ?)";
            $stmt = $this->connection->prepare($query);
    
            if ($stmt) {
                $stmt->bind_param("sss", $name, $description, $photoUrl);
                $result = $stmt->execute();
                $stmt->close();
                return $result;
            }
        } catch (Exception $e) {
            error_log("Error creating category: " . $e->getMessage());
        }
    
        return false;
    }

    // Cập nhật danh mục
    public function updateCategory($categoryId, $name, $description, $photoUrl = null)
    {
        try {
            // Kiểm tra trùng lặp danh mục
            $checkQuery = "SELECT COUNT(*) as count FROM category WHERE category_name = ? AND category_id != ?";
            $checkStmt = $this->connection->prepare($checkQuery);
    
            if ($checkStmt) {
                $checkStmt->bind_param("si", $name, $categoryId);
                $checkStmt->execute();
                $result = $checkStmt->get_result();
                $row = $result->fetch_assoc();
                $checkStmt->close();
    
                if ($row['count'] > 0) {
                    throw new Exception("Category name already exists.");
                }
            }
    
            // Cập nhật danh mục
            $query = "UPDATE category SET category_name = ?, category_decs = ?, photo_url = ? WHERE category_id = ?";
            $stmt = $this->connection->prepare($query);
    
            if ($stmt) {
                $stmt->bind_param("sssi", $name, $description, $photoUrl, $categoryId);
                $result = $stmt->execute();
                $stmt->close();
                return $result;
            }
        } catch (Exception $e) {
            error_log("Error updating category: " . $e->getMessage());
        }
    
        return false;
    }
    

    // Xóa danh mục
    public function deleteCategory($id)
    {
        try {
            // Kiểm tra danh mục có đang được tham chiếu không
            $checkQuery = "SELECT COUNT(*) as count FROM products WHERE category_id = ?";
            $checkStmt = $this->connection->prepare($checkQuery);
    
            if ($checkStmt) {
                $checkStmt->bind_param("i", $id);
                $checkStmt->execute();
                $result = $checkStmt->get_result();
                $row = $result->fetch_assoc();
                $checkStmt->close();
    
                if ($row['count'] > 0) {
                    throw new Exception("Category is referenced in another table and cannot be deleted.");
                }
            }
    
            // Xóa danh mục
            $query = "DELETE FROM category WHERE category_id = ?";
            $stmt = $this->connection->prepare($query);
    
            if ($stmt) {
                $stmt->bind_param("i", $id);
                $result = $stmt->execute();
                $stmt->close();
                return $result;
            }
        } catch (Exception $e) {
            error_log("Error deleting category: " . $e->getMessage());
        }
    
        return false;
    }
    
     // Hàm tính tổng số loại sản phẩm
     public function getTotalCategories()
     {
         $query = "SELECT COUNT(*) as total FROM category";
         $result = $this->connection->query($query);
 
         if ($result) {
             $row = $result->fetch_assoc();
             return (int)$row['total'];
         }
 
         return 0; 
     }
     public function InUsed($categoryId)
    {
        $categoryId = $this->connection->real_escape_string($categoryId);
        $result = $this->connection->query("SELECT 
                                    CASE 
                                        WHEN EXISTS (SELECT 1 FROM products WHERE category_id = $categoryId) 
                                        THEN 1 
                                        ELSE 0 
                                    END AS result;");

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['result'] > 0;
        }

        return false; 
    }
}
