<?php

namespace App\Controllers\Admin;

use App\Controller;

class AdProductController extends Controller
{
    public function index()
    {
        $this->render('Admin/products/index', []);
    }
}

?>
