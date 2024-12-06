<?php

namespace App\Controllers\Sellers;

use App\Controller;

class SelProductController extends Controller
{
    public function index()
    {
        $this->render('Seller/products/index', []);
    }

    public function create()
    {
        $this->render('Seller/products/edit', []);
    }

    public function update($productId)
    {
        $this->render('Seller/products/edit', []);
    }

    public function delete($productId)
    {
        $this->render('Seller/products/index', []);
    }
}

?>
