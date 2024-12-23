<?php

namespace App\Controllers\Customers;

use App\Controller;

class CusChatController extends Controller
{
  

    public function index()
    {

        $this->render('Customer/CusChat/Chat', []);
    }

}

?>
