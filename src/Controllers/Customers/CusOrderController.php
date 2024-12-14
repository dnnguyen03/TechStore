<?php

namespace App\Controllers\Customers;

use App\Controller;

class CusOrderController extends Controller
{

    public function index()
    {
        $this->render('Customer/CusOrder/Order', []);
    }

    public function Details()
    {
        $this->render('Customer/CusOrder/OrderDetail', []);
    }

}

?>
