<?php

namespace App\Controllers\Customers;

use App\Controller;
use App\Models\CustomerModel\Profile;

class ProfileController extends Controller
{
    private $profileModel;

    public function __construct()
    {
        $this->profileModel = new Profile();
    }
    
    public function index()
    {
        $this->render('Customer/CusProfile/Profile', []);
    }

}

?>