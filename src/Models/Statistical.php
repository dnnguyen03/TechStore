<?php

namespace App\Models;

class Statistical
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

    public function countProductBySeller($seller_id)
    {
        $seller_id = (int) $seller_id;
        $result = $this->connection->query("SELECT COUNT(*) AS total FROM products WHERE seller_id = $seller_id;");
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        } else {
            return 0;
        }
    }

    public function totalRevenueBySeller($seller_id)
    {
        $seller_id = (int) $seller_id;
        $result = $this->connection->query("SELECT 
                                                p.seller_id,
                                                SUM(d.quantity * p.price) AS total_revenue
                                            FROM 
                                                detailorders d
                                            JOIN 
                                                products p ON d.product_id = p.product_id
                                            where p.seller_id = $seller_id
                                            GROUP BY 
                                                p.seller_id;");
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total_revenue'];
        } else {
            return 0;
        }
    }

    public function countNewOrderBySeller($seller_id)
    {
        // TODO: Chưa làm 
        $seller_id = (int) $seller_id;
        $result = $this->connection->query("SELECT * FROM seller WHERE seller_id = $seller_id");
        return $result->fetch_assoc();
    }

    public function countCustomerBySeller($seller_id)
    {
        $seller_id = (int) $seller_id;
        $result = $this->connection->query("SELECT 
                                                COUNT(DISTINCT o.customer_id) AS total_customers
                                            FROM 
                                                tech_store.orders o
                                            WHERE 
                                                o.seller_id = $seller_id;");
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total_customers'];
        } else {
            return 0;
        }
    }
}
