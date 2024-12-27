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

        $query = "SELECT o.order_id, 
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
                ORDER BY o.status ASC, o.date_order DESC
                LIMIT $offset, $pageSize";

        $result = $this->connection->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function countOrdersBySeller($seller_id, $searchValue = "", $status = 2)
    {
        $seller_id = (int)$this->connection->real_escape_string($seller_id);
        $searchValue = '%' . $this->connection->real_escape_string($searchValue) . '%';
        $status = (int)$this->connection->real_escape_string($status);

        $query = "SELECT COUNT(DISTINCT o.order_id) AS count
                FROM orders o
                JOIN detailorders od ON o.order_id = od.order_id
                JOIN products p ON od.product_id = p.product_id
                JOIN profiles pr ON o.customer_id = pr.user_id
                WHERE o.seller_id = $seller_id
                  AND ('$searchValue' = '%%' OR pr.full_name LIKE '$searchValue')
                  AND ($status = 2 OR o.status = $status)";

        $result = $this->connection->query($query);
        $row = $result->fetch_assoc();

        return $row['count'];
    }

    public function getOrderById($order_id)
    {
        $order_id = (int) $order_id;
        $result = $this->connection->query("SELECT * FROM orders
                                            WHERE order_id = $order_id");
        return $result->fetch_assoc();
    }

    public function getDetailOrderById($order_id)
    {
        $order_id = (int) $order_id;
        $result = $this->connection->query("SELECT od.*, p.product_name, p.price, p.image, (od.quantity * p.price) AS total FROM detailorders od
                                            JOIN products p ON od.product_id = p.product_id
                                            WHERE od.order_id = $order_id");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateStatusOrder($order_id, $status)
    {
        $order_id = (int)($order_id ?? 0);
        $status = (int)($status ?? 0);

        $query = "UPDATE orders SET 
                  status='$status'
                  WHERE order_id=$order_id";

        if ($this->connection->query($query) === TRUE) {
            return true;
        } else {
            die("Error: " . $this->connection->error);
        }
    }

    public function getAllOrderSellerByCustomer($seller_id, $customer_id)
    {
        $customer_id = (int) $customer_id;
        $seller_id = (int) $seller_id;
        $result = $this->connection->query("SELECT o.order_id, 
                                                o.date_order,
                                                SUM(od.quantity * p.price) AS total_amount,
                                                o.status
                                            FROM orders o
                                            JOIN detailorders od ON o.order_id = od.order_id
                                            JOIN products p ON od.product_id = p.product_id
                                            JOIN profiles pr ON o.customer_id = pr.user_id
                                            WHERE o.seller_id = $seller_id and pr.user_id = $customer_id
                                            GROUP BY o.order_id 
                                            ORDER BY o.status ASC, o.date_order DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
