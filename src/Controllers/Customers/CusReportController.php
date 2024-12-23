<?php

namespace App\Controllers\Customers;

use App\Controller;
use App\Models\CustomerModel\Report;

class CusReportController extends Controller
{
    private $reportModel;

    public function __construct()
    {
        $this->reportModel = new Report();
    }
    
   

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['feedbackType'];
            $content = $_POST['feedbackDetails'];
            echo $title;
            echo $content;
            $this->reportModel->createReport($title,$content,'2024-12-17 05:40:00',1);
        }
        header('Location: /orders');
    }

}

?>
