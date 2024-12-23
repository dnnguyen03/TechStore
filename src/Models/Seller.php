<?php

namespace App\Models;

use Exception;

class Seller
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

    public function checkSeller($user_id)
    {
        $user_id = (int) $user_id;
    
        $stmt = $this->connection->prepare("SELECT COUNT(*) AS seller_count FROM tech_store.seller WHERE user_id = ?");
        if (!$stmt) {
            throw new Exception("Failed to prepare statement: " . $this->connection->error);
        }
    
        $stmt->bind_param("i", $user_id);
    
        if (!$stmt->execute()) {
            throw new Exception("Failed to execute statement: " . $stmt->error);
        }
    
        $result = $stmt->get_result();
        if (!$result) {
            throw new Exception("Failed to get result: " . $stmt->error);
        }
    
        $row = $result->fetch_assoc();
    
        // Đóng statement
        $stmt->close();
    
        return $row['seller_count'] > 0;
    }
    

    public function getSellerById($seller_id)
    {
        $seller_id = (int) $seller_id;
        $result = $this->connection->query("SELECT * FROM seller WHERE seller_id = $seller_id");
        return $result->fetch_assoc();
    }

    public function getSellerByUserId($user_id)
    {
        $user_id = (int) $user_id;
        $result = $this->connection->query("SELECT * FROM seller WHERE user_id = $user_id");
        return $result->fetch_assoc();
    }

    public function createSeller($shop_name, $phone, $email, $address, $user_id, $logo_shop, $banner, $bio_seller)
    {
        $shop_name = $this->connection->real_escape_string($shop_name ?? '');
        $phone = $this->connection->real_escape_string($phone ?? '');
        $email = $this->connection->real_escape_string($email ?? '');
        $address = $this->connection->real_escape_string($address ?? '');
        $user_id = (int)($user_id ?? 0);
        $logo_shop = $this->connection->real_escape_string($logo_shop ?? '');
        $banner = $this->connection->real_escape_string($banner ?? '');
        $bio_seller = $this->connection->real_escape_string($bio_seller ?? '');

        $query = "INSERT INTO seller (shop_name, phone, email, address, user_id, logo_shop, banner, is_lock, bio_seller)
                  VALUES ('$shop_name', '$phone', '$email', '$address', '$user_id', '$logo_shop', '$banner', 0, '$bio_seller')";

        if ($this->connection->query($query) === TRUE) {
            $newSellerId = $this->connection->insert_id;
            $_SESSION['seller_id'] = $newSellerId;
            
            header('Location: /seller');
        } else {
            die("Error: " . $this->connection->error);
        }
    }

    public function updateProduct($seller_id, $shop_name, $phone, $email, $address, $logo_shop, $banner, $bio_seller)
    {

        $shop_name = $this->connection->real_escape_string($shop_name ?? '');
        $phone = $this->connection->real_escape_string($phone ?? '');
        $email = $this->connection->real_escape_string($email ?? '');
        $address = $this->connection->real_escape_string($address ?? '');
        $logo_shop = $this->connection->real_escape_string($logo_shop ?? '');
        $banner = $this->connection->real_escape_string($banner ?? '');
        $bio_seller = $this->connection->real_escape_string($bio_seller ?? '');
        $seller_id = (int)($seller_id ?? 0);

        $this->connection->query("UPDATE seller SET shop_name='$shop_name',
                                                   phone='$phone', 
                                                   email='$email', 
                                                   address='$address', 
                                                   logo_shop='$logo_shop', 
                                                   banner='$banner', 
                                                   bio_seller='$bio_seller' 
                                 WHERE seller_id = $seller_id");

        header('Location: /seller/shops');
    }
}
