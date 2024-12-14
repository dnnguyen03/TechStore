<?php

namespace App\Controllers\Customers;

use App\Controller;

class CusComplaintController extends Controller
{

    public function index()
    {
        $this->render('Customer/CusComplaint/Complaint', []);
    }

    public function Details()
    {
        $this->render('Customer/CusComplaint/ComplaintDetail', []);
    }

}

?>
