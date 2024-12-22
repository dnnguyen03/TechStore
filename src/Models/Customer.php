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
                                            FROM tech_store.orders o
                                            JOIN tech_store.detailorders od ON o.order_id = od.order_id
                                            JOIN tech_store.products p ON od.product_id = p.product_id
                                            JOIN tech_store.profiles pr ON o.customer_id = pr.user_id
                                            WHERE o.seller_id = $seller_id
                                            GROUP BY o.customer_id;");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
