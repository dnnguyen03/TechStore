<?php

namespace App\Controllers\Admin;

use App\Controller;

class AdCategoryController extends Controller
{
    public function index()
    {
        $this->render('Admin/categories/index', []);
    }
}

?>
