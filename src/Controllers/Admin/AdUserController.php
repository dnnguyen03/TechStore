<?php

namespace App\Controllers\Admin;

use App\Controller;

class AdUserController extends Controller
{
    public function index()
    {
        $this->render('Admin/users/index', []);
    }
}

?>
