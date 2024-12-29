<?php

namespace App\Models;

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
        $result = $this->connection->query("SELECT COUNT(*) AS seller_count FROM seller WHERE user_id = $user_id");

        $row = $result->fetch_assoc();
        return $row['seller_count'] > 0;
    }

    public function getInforSeller($seller_id)
    {
        //Nguyên
        $sql = "
        SELECT 
            s.seller_id,
            s.shop_name,
            s.logo_shop,
            s.banner,
            s.bio_seller,
            COALESCE(AVG(r.rating), 0) AS avg_rating,
            (SELECT COUNT(*) FROM products p WHERE p.seller_id = s.seller_id) AS total_products
        FROM 
            seller s
        LEFT JOIN 
            ratingshop r ON s.seller_id = r.seller_id
        WHERE 
            s.seller_id = ?
        GROUP BY 
            s.seller_id;
    ";

        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $seller_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $seller = $result->fetch_assoc();

        return $seller;
    }
    public function getAllShops($search)
    {
        // Nguyên
        $searchTerm = $search;
        $sql = "
            SELECT 
                s.seller_id,
                s.shop_name,
                s.logo_shop,
                COALESCE(AVG(r.rating), 0) AS avg_rating,
                (SELECT COUNT(*) FROM products p WHERE p.seller_id = s.seller_id) AS total_products
            FROM 
                seller s
            LEFT JOIN 
                ratingshop r ON s.seller_id = r.seller_id
            WHERE
                s.shop_name LIKE CONCAT('%', ?, '%')
            GROUP BY 
                s.seller_id
            ORDER BY 
                s.seller_id DESC;
        ";

        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();

        $shops = $result->fetch_all(MYSQLI_ASSOC);
        return $shops;
    }

    public function getTop8RatingShops()
    {
        //Nguyên
        $sql = "
        SELECT 
    s.seller_id,
    s.shop_name,
    s.logo_shop,
    COALESCE(AVG(r.rating), 0) AS avg_rating,
    (SELECT COUNT(*) FROM products p WHERE p.seller_id = s.seller_id) AS total_products
    FROM 
       seller s
    LEFT JOIN 
       ratingshop r ON s.seller_id = r.seller_id
    GROUP BY 
       s.seller_id
    ORDER BY 
       avg_rating DESC
    LIMIT 8;
    ";

        $result = $this->connection->query($sql);

        $shops = [];
        while ($shop = $result->fetch_assoc()) {
            $shops[] = $shop;
        }

        return $shops;
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

    public function updateSeller($seller_id, $shop_name, $phone, $email, $address, $logo_shop, $banner, $bio_seller)
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
