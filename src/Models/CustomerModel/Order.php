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


    public function getOrderWithFilter($customer_id, $filter = null, $sort = null)
    {
        // Escaping user input for security
        $customer_id = $this->connection->real_escape_string($customer_id);
        $filter_condition = '';
        $sort_condition = 'ORDER BY OrderDate DESC'; // Default sorting
    
        // Xử lý điều kiện lọc (filter)
        if (isset($filter) && $filter !== '') {
            $filter = $this->connection->real_escape_string($filter);
            $filter_condition = "AND OrderStatus = '$filter'";
        }

        
        
        if (!empty($sort)) {
            switch ($sort) {
                case 'date_asc':
                    $sort_condition = 'ORDER BY OrderDate ASC';
                    break;
                case 'date_desc':
                    $sort_condition = 'ORDER BY OrderDate DESC';
                    break;
                case 'total_asc':
                    $sort_condition = 'ORDER BY TotalAmount ASC';
                    break;
                case 'total_desc':
                    $sort_condition = 'ORDER BY TotalAmount DESC';
                    break;
            }
        }
    
      
        $query = "SELECT * FROM orderdetails 
                  WHERE CustomerID = '$customer_id' $filter_condition 
                  $sort_condition";
    
       
        $result = $this->connection->query($query);
    
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    

}
