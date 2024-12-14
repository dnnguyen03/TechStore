<?php

namespace App\Controllers\Sellers;

use App\Controller;

class SelChatController extends Controller
{
    public function index()
    {
        $this->render('Seller/chats/index', []);
    }
}

?>