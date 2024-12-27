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
        $customer_id = $_SESSION['currentUser']['user_id'];
        $profiles = $this->profileModel->getProfile($customer_id);
        $this->render('Customer/CusProfile/Profile', ['profiles' => $profiles]);
    }

    public function update()
    {
        $customer_id = $_SESSION['currentUser']['user_id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $full_name = $_POST['full_name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $gender = $_POST['gender'];
            $avatar = $_POST['avatar'];
        

            if (isset($_FILES['uploadPhoto']) && (basename($_FILES['uploadPhoto']['name']) != "")) {
                // $fileName = uniqid() . '-' . basename($_FILES['uploadPhoto']['name']);
                $fileName = basename($_FILES['uploadPhoto']['name']);

                $avatar = $fileName;
            }

            $this->profileModel->update($customer_id, $full_name, $phone, $address, $email, $avatar, $gender);

           
        }

        $profiles = $this->profileModel->getProfile($customer_id);
        $this->render('Customer/CusProfile/EditProfile', ['profiles' => $profiles]);
    }

}

?>