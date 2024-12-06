<?php

namespace App\Controllers\Admin;

use App\Controller;

class AdHomeController extends Controller
{
    public function index()
    {
        $this->render('Admin/homes/index', []);
    }
}

?>