<?php

namespace App\Models;

class Order
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

    public function getAllOrderBySeller($seller_id)
    {
        $seller_id = (int) $seller_id;
        $result = $this->connection->query("SELECT o.order_id, pr.full_name, o.date_order,
                                                SUM(od.quantity * p.price) AS total_amount,
                                                o.status
                                            FROM orders o
                                            JOIN detailorders od ON o.order_id = od.order_id
                                            JOIN products p ON od.product_id = p.product_id
                                            JOIN profiles pr ON o.customer_id = pr.user_id
                                            WHERE o.seller_id = $seller_id
                                            GROUP BY o.order_id;");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function searchOrdersBySeller($seller_id, $searchValue = "", $status = 2, $page = 1, $pageSize = 10)
    {
        $seller_id = (int)$this->connection->real_escape_string($seller_id);
        $searchValue = '%' . $this->connection->real_escape_string($searchValue) . '%';
        $status = (int)$this->connection->real_escape_string($status);
        $page = (int)$this->connection->real_escape_string($page);
        $pageSize = (int)$this->connection->real_escape_string($pageSize);
        $offset = ($page - 1) * $pageSize;

        $sql = "SELECT o.order_id, 
                       pr.full_name, 
                       o.date_order,
                       SUM(od.quantity * p.price) AS total_amount,
                       o.status
                FROM orders o
                JOIN detailorders od ON o.order_id = od.order_id
                JOIN products p ON od.product_id = p.product_id
                JOIN profiles pr ON o.customer_id = pr.user_id
                WHERE o.seller_id = $seller_id
                  AND ('$searchValue' = '%%' OR pr.full_name LIKE '$searchValue')
                  AND ($status = 2 OR o.status = $status)
                GROUP BY o.order_id
                ORDER BY o.date_order DESC
                LIMIT $offset, $pageSize";

        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function countOrdersBySeller($seller_id, $searchValue = "", $status = 2)
    {
        $seller_id = (int)$this->connection->real_escape_string($seller_id);
        $searchValue = '%' . $this->connection->real_escape_string($searchValue) . '%';
        $status = (int)$this->connection->real_escape_string($status);

        $sql = "SELECT COUNT(DISTINCT o.order_id) AS count
                FROM orders o
                JOIN detailorders od ON o.order_id = od.order_id
                JOIN products p ON od.product_id = p.product_id
                JOIN profiles pr ON o.customer_id = pr.user_id
                WHERE o.seller_id = $seller_id
                  AND ('$searchValue' = '%%' OR pr.full_name LIKE '$searchValue')
                  AND ($status = 2 OR o.status = $status)";

        $result = $this->connection->query($sql);
        $row = $result->fetch_assoc();

        return $row['count'];
    }
}
