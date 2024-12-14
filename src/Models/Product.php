<?php

namespace App\Models;

class Product
{
    private $connection;

    public function __construct()
    {
        // Replace these values with your actual database configuration
        $host = DB_HOST;
        $username = DB_USER;
        $password = DB_PASSWORD;
        $database = DB_NAME;

        $this->connection = new \mysqli($host, $username, $password, $database);

        // Check connection
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function getAllProductBySeller($seller_id)
    {
        $seller_id = $this->connection->real_escape_string($seller_id);
        $result = $this->connection->query("SELECT * FROM Products WHERE seller_id = $seller_id");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductById($product_id)
    {
        $product_id = $this->connection->real_escape_string($product_id);
        $result = $this->connection->query("SELECT * FROM products WHERE product_id = $product_id");

        return $result->fetch_assoc();
    }

    public function createProduct($product_name, $product_decs, $category_id, $price, $image, $quantity, $status, $seller_id)
    {
        $product_name = $this->connection->real_escape_string($product_name);
        $product_decs = $this->connection->real_escape_string($product_decs);
        $category_id = $this->connection->real_escape_string($category_id);
        $price = $this->connection->real_escape_string($price);
        $image = $this->connection->real_escape_string($image);
        $quantity = $this->connection->real_escape_string($quantity);
        $status = $this->connection->real_escape_string($status);
        $seller_id = $this->connection->real_escape_string($seller_id);

        $this->connection->query("INSERT INTO products (product_name, product_decs, category_id, price, image, quantity, status, seller_id)
                                 VALUES ('$product_name', '$product_decs', '$category_id','$price', '$image', '$quantity', '$status', '$seller_id')");

        header('Location: /seller/products');
    }

    public function updateProduct($product_id, $product_name, $product_decs, $category_id, $price, $image, $quantity, $status, $seller_id)
    {
        $product_id = $this->connection->real_escape_string($product_id);
        $product_name = $this->connection->real_escape_string($product_name);
        $product_decs = $this->connection->real_escape_string($product_decs);
        $category_id = $this->connection->real_escape_string($category_id);
        $price = $this->connection->real_escape_string($price);
        $image = $this->connection->real_escape_string($image);
        $quantity = $this->connection->real_escape_string($quantity);
        $status = $this->connection->real_escape_string($status);
        $seller_id = $this->connection->real_escape_string($seller_id);


        $this->connection->query("UPDATE products SET product_name='$product_name',
                                                   product_decs='$product_decs', 
                                                   category_id='$category_id', 
                                                   price='$price', 
                                                   image='$image', 
                                                   quantity='$quantity', 
                                                   status='$status', 
                                                   seller_id='$seller_id' 
                                 WHERE product_id=$product_id");

        // Redirect to the index page after update
        header('Location: /seller/products');
    }

    public function deleteProduct($product_id)
    {
        $product_id = $this->connection->real_escape_string($product_id);
        $this->connection->query("DELETE FROM products WHERE product_id=$product_id");
    }
}
