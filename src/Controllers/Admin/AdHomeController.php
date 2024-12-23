<?php

namespace App\Controllers\Admin;

use App\Controller;
use App\Models\user;
use App\Models\Product;

class AdHomeController extends Controller
{
    public function index()
    {
        $userModel = new user();
        $ProductModel = new Product();

        $totalSellers = $userModel->getTotalSellers();

        $totalCustomers = $userModel->getTotalCustomers();

        $totalProducts = $ProductModel->getTotalProducts();

        $newAccounts = $this->getNewAccounts();

        $this->render('Admin/homes/index', [
            'totalSellers' => $totalSellers,
            'totalCustomers' => $totalCustomers,
            'totalProducts' => $totalProducts,
            'newAccounts' => $newAccounts,
        ]);
    }

    private function getNewAccounts()
    {
        $db = $this->getDatabaseConnection();
        $stmt = $db->prepare("
            SELECT user_id AS id, username AS name, create_at AS date, 
                   IF(is_lock = 0, 'Verified', 'New') AS verification, role AS type 
            FROM users 
            ORDER BY create_at DESC 
            LIMIT 5
        ");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    private function getDatabaseConnection()
    {
        $host = DB_HOST;
        $username = DB_USER;
        $password = DB_PASSWORD;
        $database = DB_NAME;

        $connection = new \mysqli($host, $username, $password, $database);

        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        return $connection;
    }
}
?>

