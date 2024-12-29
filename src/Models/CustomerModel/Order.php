<?php

namespace App\Models\CustomerModel;

class Order
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

    public function getOrderByCustomer($customer_id)
    {
        $customer_id = $this->connection->real_escape_string($customer_id);
        $result = $this->connection->query("SELECT * FROM orderdetails WHERE CustomerID = '$customer_id'");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrderDetailByOrder($order_id)
    {
        $order_id = $this->connection->real_escape_string($order_id);
        $result = $this->connection->query("SELECT * FROM  orderproductdetails where OrderID = $order_id;");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrderById($order_id)
    {
        $order_id = $this->connection->real_escape_string($order_id);
        $result = $this->connection->query("SELECT * FROM orderdetails WHERE OrderID = $order_id");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function cancelOrder($orderID)
    {
        $orderID = $this->connection->real_escape_string($orderID);
        $result = $this->connection->query("UPDATE orders set status = '-1' where order_id = '$orderID'");
        return;
    }


}
