<?php

namespace App\Controllers\Sellers;

use App\Controller;

class SelHomeController extends Controller
{
    public function index()
    {
        $this->render('Seller/homes/index', []);
    }
}

?>
