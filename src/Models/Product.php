<?php

namespace App\Models;

class Product
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

    public function getAllProductBySeller($seller_id)
    {
        $seller_id = (int) $seller_id;
        $result = $this->connection->query("SELECT * FROM products WHERE seller_id = $seller_id");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductById($product_id)
    {
        $product_id = $this->connection->real_escape_string($product_id);
        $result = $this->connection->query("SELECT * FROM products WHERE product_id = $product_id");
        return $result->fetch_assoc();
    }

    public function searchProductBySeller($seller_id, $searchValue = "", $category = 0, $status = 2, $page = 1, $pageSize = 10)
    {
        $seller_id = (int) $seller_id;
        $searchValue = '%' . $this->connection->real_escape_string($searchValue) . '%';
        $category = (int)$category;
        $status = (int)$status;
        $page = (int)$page;
        $pageSize = (int)$pageSize;
        $offset = ($page - 1) * $pageSize;

        $sql = "SELECT * 
                FROM Products
                WHERE seller_id = ?
                  AND (? = '' OR product_name LIKE ?)
                  AND (? = 0 OR category_id = ?)
                  AND (? = 2 OR status = ?)
                ORDER BY product_name
                LIMIT ?, ?";

        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param(
            'issiiiiii',
            $seller_id,
            $searchValue,
            $searchValue,
            $category,
            $category,
            $status,
            $status,
            $offset,
            $pageSize
        );

        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $data;
    }

    public function count($seller_id, $searchValue = "", $category = 0, $status = 2)
    {
        $seller_id = (int) $seller_id;
        $searchValue = '%' . $this->connection->real_escape_string($searchValue) . '%';
        $category = (int)$category;
        $status = (int)$status;

        $sql = "SELECT COUNT(*) 
                FROM Products
                WHERE seller_id = ?
                  AND (? = '' OR product_name LIKE ?)
                  AND (? = 0 OR category_id = ?)
                  AND (? = 2 OR status = ?)";

        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param(
            'issiiii',
            $seller_id,
            $searchValue,
            $searchValue,
            $category,
            $category,
            $status,
            $status
        );

        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();

        $stmt->close();

        return $count;
    }

    public function createProduct($product_name, $product_desc, $category_id, $price, $image, $quantity, $status, $seller_id)
    {
        $product_name = $this->connection->real_escape_string($product_name ?? '');
        $product_desc = $this->connection->real_escape_string($product_desc ?? '');
        $category_id = (int)($category_id ?? 0);
        $price = (float)($price ?? 0);
        $image = $this->connection->real_escape_string($image ?? '');
        $quantity = (int)($quantity ?? 0);
        $status = is_numeric($status) ? (int)$status : 0;
        $seller_id = $this->connection->real_escape_string($seller_id ?? '');

        $query = "INSERT INTO products (product_name, product_decs, category_id, price, image, quantity, status, seller_id)
                  VALUES ('$product_name', '$product_desc', '$category_id', '$price', '$image', '$quantity', '$status', '$seller_id')";

        if ($this->connection->query($query) === TRUE) {
            $newProductId = $this->connection->insert_id;
            header('Location: /seller/products/update/' . $newProductId);
        } else {
            die("Error: " . $this->connection->error);
        }
    }

    public function updateProduct($product_id, $product_name, $product_desc, $category_id, $price, $image, $quantity, $status, $seller_id)
    {
        $product_id = (int)($product_id ?? 0);
        $product_name = $this->connection->real_escape_string($product_name ?? '');
        $product_desc = $this->connection->real_escape_string($product_desc ?? '');
        $category_id = (int)($category_id ?? 0);
        $price = (float)($price ?? 0);
        $image = $this->connection->real_escape_string($image ?? '');
        $quantity = (int)($quantity ?? 0);
        $status = is_numeric($status) ? (int)$status : 0;
        $seller_id = (int)($seller_id ?? 0);

        $this->connection->query("UPDATE products SET product_name='$product_name',
                                                   product_decs='$product_desc', 
                                                   category_id='$category_id', 
                                                   price='$price', 
                                                   image='$image', 
                                                   quantity='$quantity', 
                                                   status='$status', 
                                                   seller_id='$seller_id' 
                                 WHERE product_id=$product_id");

        header('Location: /seller/products');
    }

    public function deleteProduct($product_id)
    {
        $product_id = $this->connection->real_escape_string($product_id);
        $this->connection->query("DELETE FROM products WHERE product_id=$product_id");
    }
    public function getTotalProducts()
    {
        $query = "SELECT COUNT(*) AS total FROM products";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result['total'];
    }
    public function getAllProducts()
    {
        $query = "
            SELECT 
                p.product_id, 
                p.product_name, 
                p.price, 
                p.quantity, 
                p.status, 
                c.category_name 
            FROM 
                products p 
            LEFT JOIN 
                category c 
            ON 
                p.category_id = c.category_id
        ";

        $result = $this->connection->query($query);

        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return [];
    }
    public function searchProductsByName($searchKeyword)
    {
        $searchKeyword = $this->connection->real_escape_string($searchKeyword);
        $query = "
            SELECT 
                p.product_id, 
                p.product_name, 
                p.price, 
                p.quantity, 
                p.status, 
                c.category_name 
            FROM 
                products p 
            LEFT JOIN 
                category c 
            ON 
                p.category_id = c.category_id
            WHERE 
                p.product_name LIKE '%$searchKeyword%'
        ";

        $result = $this->connection->query($query);

        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return [];
    }

    public function createProductPhoto($product_id, $image, $description, $display_order, $is_hidden)
    {
        $product_id = (int)($product_id ?? 0);
        $image = $this->connection->real_escape_string($image ?? '');
        $description = $this->connection->real_escape_string($description ?? '');
        $display_order = (int)($display_order ?? 0);
        $is_hidden = is_numeric($is_hidden) ? (int)$is_hidden : 0;

        $query = "INSERT INTO ProductPhotos (product_id, image, description, display_order, is_hidden)
                  VALUES ('$product_id', '$image', '$description', '$display_order', '$is_hidden')";

        if ($this->connection->query($query) === TRUE) {
            header('Location: /seller/products/update/' . $product_id);
        } else {
            die("Error: " . $this->connection->error);
        }
    }

    public function updateProductPhoto($photo_id, $product_id, $image, $description, $display_order, $is_hidden)
    {
        $photo_id = (int)($photo_id ?? 0);
        $product_id = (int)($product_id ?? 0);
        $image = $this->connection->real_escape_string($image ?? '');
        $description = $this->connection->real_escape_string($description ?? '');
        $display_order = (int)($display_order ?? 0);
        $is_hidden = is_numeric($is_hidden) ? (int)$is_hidden : 0;

        $query = "UPDATE ProductPhotos SET 
                  product_id='$product_id',
                  image='$image',
                  description='$description',
                  display_order='$display_order',
                  is_hidden='$is_hidden'
                  WHERE photo_id=$photo_id";

        if ($this->connection->query($query) === TRUE) {
            header('Location: /seller/products/update/' . $product_id);
        } else {
            die("Error: " . $this->connection->error);
        }
    }

    public function deleteProductPhoto($photo_id)
    {
        $photo_id = (int)($photo_id ?? 0);
        $this->connection->query("DELETE FROM ProductPhotos WHERE photo_id=$photo_id");
    }

    public function getProductPhotosByProductId($product_id)
    {
        $product_id = (int)($product_id ?? 0);
        $result = $this->connection->query("SELECT * FROM ProductPhotos WHERE product_id = $product_id");

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductPhotoById($photo_id)
    {
        $photo_id = (int)($photo_id ?? 0);
        $result = $this->connection->query("SELECT * FROM ProductPhotos WHERE photo_id = $photo_id");

        return $result->fetch_assoc();
    }
}
