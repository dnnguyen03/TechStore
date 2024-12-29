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

    // Nguyên
    public function getAllProduct()
    {
        $result = $this->connection->query("SELECT * FROM Products");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getBestDeal()
    {
        $result = $this->connection->query("SELECT product_id,product_name,product_decs,price,image 
        FROM Products
        WHERE status = 1 
        ORDER BY price ASC LIMIT 4;");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getPopularProduct()
    {
        $result = $this->connection->query("SELECT p.product_id, p.product_name,p.product_decs,p.price,p.image,SUM(d.quantity) AS ban_chay_nhat 
        FROM DetailOrders d INNER JOIN Products p ON d.product_id = p.product_id
        GROUP BY p.product_id, p.product_name, p.product_decs, p.price, p.image
        ORDER BY ban_chay_nhat DESC LIMIT 4;");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getLimitedProducts($limit)
    {
        $query = "SELECT * FROM Products LIMIT ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("i", $limit);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductById($product_id)
    {
        $product_id = $this->connection->real_escape_string($product_id);
        $result = $this->connection->query("SELECT 
        p.product_name, 
        s.shop_name, 
        s.seller_id , 
        p.product_id, 
        p.price, 
        p.image AS product_image, 
        p.product_decs ,
        GROUP_CONCAT(pp.image ORDER BY pp.display_order) AS product_photos
    FROM 
        Products p JOIN Seller s ON p.seller_id = s.seller_id
    LEFT JOIN 
        ProductPhotos pp ON p.product_id = pp.product_id
    WHERE 
        p.product_id = $product_id  
    GROUP BY 
        p.product_id;");

        $product = $result->fetch_assoc();

        // Chuyển chuỗi các ảnh thành mảng và thêm ảnh mặc định vào đầu mảng
        if ($product['product_photos']) {
            $product['product_photos'] = explode(',', $product['product_photos']);
            // Thêm ảnh chính (product_image) vào đầu mảng ảnh
            array_unshift($product['product_photos'], $product['product_image']);
        } else {
            // Nếu không có ảnh phụ, chỉ thêm ảnh chính vào mảng
            $product['product_photos'] = [$product['product_image']];
        }
        $product['product_photos'] = array_merge(...array_fill(0, 6, $product['product_photos']));

        return $product;
    }

    // Đô
    public function getAllProductBySeller($seller_id)
    {
        $seller_id = (int) $seller_id;
        $result = $this->connection->query("SELECT * FROM products WHERE seller_id = $seller_id");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductByIdSeller($product_id)
    {
        $product_id = $this->connection->real_escape_string($product_id);
        $result = $this->connection->query("SELECT * FROM products WHERE product_id = $product_id");
        return $result->fetch_assoc();
    }


    public function searchProductBySeller($seller_id, $searchValue = "", $category = 0, $status = 2, $page = 1, $pageSize = 10)
    {
        $seller_id = (int)$this->connection->real_escape_string($seller_id);
        $searchValue = '%' . $this->connection->real_escape_string($searchValue) . '%';
        $category = (int)$this->connection->real_escape_string($category);
        $status = (int)$this->connection->real_escape_string($status);
        $page = (int)$this->connection->real_escape_string($page);
        $pageSize = (int)$this->connection->real_escape_string($pageSize);
        $offset = ($page - 1) * $pageSize;

        $sql = "SELECT * 
            FROM Products
            WHERE seller_id = $seller_id
              AND ('$searchValue' = '%%' OR product_name LIKE '$searchValue')
              AND ($category = 0 OR category_id = $category)
              AND ($status = 2 OR status = $status)
            ORDER BY product_name
            LIMIT $offset, $pageSize";

        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function countProductsBySeller($seller_id, $searchValue = "", $category = 0, $status = 2)
    {
        $seller_id = (int)$this->connection->real_escape_string($seller_id);
        $searchValue = '%' . $this->connection->real_escape_string($searchValue) . '%';
        $category = (int)$this->connection->real_escape_string($category);
        $status = (int)$this->connection->real_escape_string($status);

        $sql = "SELECT COUNT(*) AS count
            FROM Products
            WHERE seller_id = $seller_id
              AND ('$searchValue' = '%%' OR product_name LIKE '$searchValue')
              AND ($category = 0 OR category_id = $category)
              AND ($status = 2 OR status = $status)";

        $result = $this->connection->query($sql);
        $row = $result->fetch_assoc();

        return $row['count'];
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
        $result = $this->connection->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
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

    // Dương
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
}
