<?php

namespace App\Controllers\Customers;

use App\Controller;
use App\Models\CustomerModel\Complaint;

class CusComplaintController extends Controller
{

    private $complaintModel;

    public function __construct()
    {
        
        $this->complaintModel = new Complaint();
    }
    

    public function index()
    {
        $customer_id = 1;
        $complaints = $this->complaintModel->getComplaintByCustomer($customer_id);
       
        $this->render('Customer/CusComplaint/Complaint', ['complaints' => $complaints]);
    }

    public function Details()
    {
        $this->render('Customer/CusComplaint/ComplaintDetail', []);
    }

}

?>
