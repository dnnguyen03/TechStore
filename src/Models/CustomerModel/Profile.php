<?php

namespace App\Models\CustomerModel;

class Profile
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

    public function getProfile($customer_id)
    {
        $customer_id = $this->connection->real_escape_string($customer_id);
        $result = $this->connection->query("SELECT * FROM profiles where user_id  = '$customer_id';");
        return $result->fetch_assoc();
    }

    public function update($customer_id, $full_name, $phone, $address, $email, $avata, $gender)
    {
        $customer_id = $this->connection->real_escape_string($customer_id);
        $full_name = $this->connection->real_escape_string($full_name ?? '');
        $phone = $this->connection->real_escape_string($phone ?? '');
        $address = $this->connection->real_escape_string($address ?? '');
        $email = $this->connection->real_escape_string($email ?? '');
        $avata = $this->connection->real_escape_string($avata ?? '');
        $gender = $this->connection->real_escape_string($gender ?? '');

        $this->connection->query("UPDATE profiles SET full_name='$full_name',
                                                   phone='$phone', 
                                                   address='$address', 
                                                   email='$email', 
                                                   avata='$avata', 
                                                   gender='$gender' 
                                 WHERE user_id = '$customer_id'");

        header('Location: /profile');
    }
    public function create($user_id, $full_name, $phone, $address, $email, $avata, $gender)
    {
        $user_id = $this->connection->real_escape_string($user_id);
        $full_name = $this->connection->real_escape_string($full_name ?? '');
        $phone = $this->connection->real_escape_string($phone ?? '');
        $address = $this->connection->real_escape_string($address ?? '');
        $email = $this->connection->real_escape_string($email ?? '');
        $avata = $this->connection->real_escape_string($avata ?? '');
        $gender = $this->connection->real_escape_string($gender ?? '');

        $this->connection->query("Insert Into profiles(user_id, full_name, phone, address, email, avata, gender)
        values('$user_id', '$full_name','$phone' ,'$address','$email', '$avata', '$gender') ");

        header('Location: /profile');
    }

}
