<?php

namespace App\Models;

class Customer
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

    public function getAllCustomerBySeller($seller_id)
    {
        $seller_id = (int) $seller_id;
        $result = $this->connection->query("SELECT pr.user_id, pr.full_name, pr.email, pr.phone,
                                                COUNT(o.order_id) AS total_orders,
                                                SUM(od.quantity * p.price) AS total_revenue
                                            FROM orders o
                                            JOIN detailorders od ON o.order_id = od.order_id
                                            JOIN products p ON od.product_id = p.product_id
                                            JOIN profiles pr ON o.customer_id = pr.user_id
                                            WHERE o.seller_id = $seller_id
                                            GROUP BY o.customer_id;");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function searchCustomersBySeller($seller_id, $searchValue = "", $page = 1, $pageSize = 10)
    {
        $seller_id = (int) $seller_id;
        $searchValue = '%' . $this->connection->real_escape_string($searchValue) . '%';
        $page = (int)$page;
        $pageSize = (int)$pageSize;
        $offset = ($page - 1) * $pageSize;

        $query = "SELECT pr.user_id, pr.full_name, pr.email, pr.phone,
                     COUNT(o.order_id) AS total_orders,
                     SUM(od.quantity * p.price) AS total_revenue
              FROM orders o
              JOIN detailorders od ON o.order_id = od.order_id
              JOIN products p ON od.product_id = p.product_id
              JOIN profiles pr ON o.customer_id = pr.user_id
              WHERE o.seller_id = $seller_id
                AND ('$searchValue' = '' OR pr.full_name LIKE '$searchValue' OR pr.email LIKE '$searchValue')
              GROUP BY o.customer_id
              LIMIT $offset, $pageSize";

        $result = $this->connection->query($query);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }
    
    public function countCustomersBySeller($seller_id, $searchValue = "")
    {
        $seller_id = (int) $seller_id;
        $searchValue = '%' . $this->connection->real_escape_string($searchValue) . '%';

        $query = "SELECT COUNT(DISTINCT o.customer_id)
              FROM orders o
              JOIN detailorders od ON o.order_id = od.order_id
              JOIN products p ON od.product_id = p.product_id
              JOIN profiles pr ON o.customer_id = pr.user_id
              WHERE o.seller_id = $seller_id
                AND ('$searchValue' = '' OR pr.full_name LIKE '$searchValue' OR pr.email LIKE '$searchValue')";

        $result = $this->connection->query($query);
        $count = $result ? $result->fetch_row()[0] : 0;
        return $count;
    }

    public function getCustomerById($customer_id) {
        $customer_id = (int) $customer_id;
        $result = $this->connection->query("SELECT * FROM profiles where user_id = $customer_id;");        

        return $result->fetch_assoc();
    }
}
