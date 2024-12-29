<?php

namespace App\Models\CustomerModel;

class Report
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

    public function createReport($title, $content, $date_report, $customer_id)
    {
        $title = $this->connection->real_escape_string($title);
        $content = $this->connection->real_escape_string($content);
        $date_report = $this->connection->real_escape_string($date_report);
        $customer_id = $this->connection->real_escape_string($customer_id);

        $result = $this->connection->query("INSERT INTO report (title, content, date_report, customer_id) VALUE ('$title', '$content', '$date_report', '$customer_id')");
        
        header('Location: /customer/orders');
    }

    public function createRating($seller_id, $customer_id, $rating)
    {
        $seller_id = $this->connection->real_escape_string($seller_id);
        $rating = $this->connection->real_escape_string($rating);
      
        $customer_id = $this->connection->real_escape_string($customer_id);

        $result = $this->connection->query("INSERT into ratingshop (seller_id, customer_id, rating) value ('$seller_id','$customer_id','$rating')");
        return;
    }


   

}
