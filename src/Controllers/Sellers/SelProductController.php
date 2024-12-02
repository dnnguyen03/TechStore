<?php

namespace App\Controllers\Sellers;

use App\Controller;

class SelProductController extends Controller
{
    public function index()
    {
        $this->render('Seller/products/index', []);
    }
}

?>
