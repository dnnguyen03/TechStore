<?php

namespace App\Models\CustomerModel;

class Complaint
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

    public function getComplaintByCustomer($customer_id)
    {
        $customer_id = $this->connection->real_escape_string($customer_id);
        $result = $this->connection->query("SELECT * FROM report WHERE customer_id = $customer_id");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
