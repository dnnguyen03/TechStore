<?php

namespace App\Controllers\Auth;

use App\Controller;

class AuthController extends Controller
{

    public function signin()
    {
        $this->render('Auth/signin', []);
    }
    public function register()
    {
        $this->render('Auth/register', []);
    }
    public function forgot()
    {
        $this->render('Auth/forgot', []);
    }

}

?>