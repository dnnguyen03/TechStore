<?php

namespace App\Controllers\Sellers;

use App\Controller;

class HomeController extends Controller
{

    public function index()
    {
        $this->render('Seller/homes/index', []);
    }


    public function index2()
    {
        $this->render('Seller/homes/index2', []);
    }


}

?>
