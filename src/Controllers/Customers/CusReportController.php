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
            $customerID = 1;
            $title = $_POST['feedbackType'];
            $content = $_POST['feedbackDetails'];
            $currentDateTime = $this->getCurrentDateTime();
            if($_POST['rating'] != null)
            {
                $rating = $_POST['rating'];
                $shopID = $_POST['sellerID'];
                $this->reportModel->createRating($shopID,$customerID, $rating);
            }
            $this->reportModel->createReport($title,$content,$currentDateTime,$customerID);
        }
        header('Location: /orders');
    }

    //Hàm lấy ngày giờ hiện tại
    private function getCurrentDateTime()
    {
        return date('Y-m-d H:i:s');
    }
}

?>
