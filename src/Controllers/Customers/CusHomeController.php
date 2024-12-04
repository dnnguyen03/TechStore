<?php

namespace App\Controllers\Customers;

use App\Controller;

class CusHomeController extends Controller
{

    public function index()
    {
        $this->render('Customer/Order', []);
    }


    public function Complaint()
    {
        $this->render('Customer/Complaint', []);
    }
    public function Cuschat()
    {
        $this->render('Customer/Cuschat', []);
    }

}

?>
