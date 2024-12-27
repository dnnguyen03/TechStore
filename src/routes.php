<?php

use App\Controllers\Admin\AdCategoryController;
use App\Controllers\Admin\AdHomeController;
use App\Controllers\Admin\AdProductController;
use App\Controllers\Admin\AdUserController;
use App\Controllers\Auth\AuthController;
use App\Controllers\Customers\CusChatController;
use App\Controllers\Customers\CusComplaintController;

use App\Controllers\Customers\CusOrderController;

use App\Controllers\Customers\CusReportController;
use App\Controllers\Customers\ProfileController;
use App\Controllers\Sellers\SelChatController;
use App\Controllers\Sellers\SelCustomerController;
use App\Controllers\Sellers\SelHomeController;
use App\Controllers\Sellers\SelOrderController;
use App\Controllers\Sellers\SelProductController;
use App\Controllers\Sellers\SelShopController;
use App\Controllers\Shop\ShopController;
use App\Router;

// Usage:
session_start();
$router = new Router();

// Những router không cần quyền vẫn có thể truy cập
$router->addRoute('/\/signin/', [new AuthController(), 'signin']);
$router->addRoute('/\/register/', [new AuthController(), 'register']);
$router->addRoute('/\/forgot/', [new AuthController(), 'forgot']);
$router->addRoute('/\/logout/', [new AuthController(), 'logout']);

$router->addRoute('/\/seller\/shops\/create/', [new SelShopController(), 'create']);
$router->addRoute('/\//', [new ShopController(), 'index']);
$router->addRoute('/\/products/', [new ShopController(), 'allProduct']);
$router->addRoute('/\/products\/(\d+)/', [new ShopController(), 'show']);
$router->addRoute('/\/seller-router/', [new SelHomeController(), 'checkSeller']);

// $router->addRoute('/\//', [new AuthController(), 'forgot']);

if (isset($_SESSION['currentUser']) && !empty($_SESSION['currentUser'])) {
    $router->addRoute('/\/updateCart/', [new ShopController(), 'handleCartAction']);
    $router->addRoute('/\/checkout/', [new ShopController(), 'checkout']);
    if ($_SESSION['currentUser']['role'] == 0) {
        $router->addRoute('/\/admin/', [new AdHomeController(), 'index']);
        $router->addRoute('/\/admin\/home/', [new AdHomeController(), 'index']);
        $router->addRoute('/\/admin\/products/', [new AdProductController(), 'index']);
        $router->addRoute('/\/admin\/users/', [new AdUserController(), 'index']);
        $router->addRoute('/\/admin\/categories/', [new AdCategoryController(), 'index']);
    } else {
        // Seller
        $router->addRoute('/\/seller/', [new SelHomeController(), 'index']);
        $router->addRoute('/\/seller\/home/', [new SelHomeController(), 'index']);

        $router->addRoute('/\/seller\/products/', [new SelProductController(), 'index']);
        $router->addRoute('/\/seller\/products\/create/', [new SelProductController(), 'create']);
        $router->addRoute('/\/seller\/products\/update\/(\d+)/', [new SelProductController(), 'update']);
        $router->addRoute('/\/seller\/products\/delete\/(\d+)/', [new SelProductController(), 'delete']);
        $router->addRoute('/\/seller\/products\/photo\/create/', [new SelProductController(), 'createPhoto']);
        $router->addRoute('/\/seller\/products\/photo\/update\/(\d+)/', [new SelProductController(), 'updatePhoto']);
        $router->addRoute('/\/seller\/products\/photo\/delete\/(\d+)/', [new SelProductController(), 'deletePhoto']);

        $router->addRoute('/\/seller\/customers/', [new SelCustomerController(), 'index']);
        $router->addRoute('/\/seller\/customers\/detail\/(\d+)/', [new SelCustomerController(), 'detail']);

        $router->addRoute('/\/seller\/orders/', [new SelOrderController(), 'index']);
        $router->addRoute('/\/seller\/orders\/detail\/(\d+)/', [new SelOrderController(), 'detail']);
        $router->addRoute('/\/seller\/orders\/confirm\/(\d+)/', [new SelOrderController(), 'confirm']);


        $router->addRoute('/\/seller\/shops/', [new SelShopController(), 'index']);
        $router->addRoute('/\/seller\/shops\/update\/(\d+)/', [new SelShopController(), 'update']);

        $router->addRoute('/\/seller\/chats/', [new SelChatController(), 'index']);

        // Customer
        $router->addRoute('/\/customer\/orders/', [new CusOrderController(), 'index']);
        $router->addRoute('/\/customer\/orders\/detail\/(\d+)/', [new CusOrderController(), 'Details']);
        $router->addRoute('/\/customer\/orders\/cancel\/(\d+)/', [new CusOrderController(), 'Cancel']);

        $router->addRoute('/\/customer\/complaints/', [new CusComplaintController(), 'index']);
        $router->addRoute('/\/customer\/complaints\/detail/', [new CusComplaintController(), 'Details']);

        $router->addRoute('/\/customer\/report\/create/', [new CusReportController(), 'create']);

        $router->addRoute('/\/customer\/chats/', [new CusChatController(), 'index']);

        $router->addRoute('/\/profile/', [new ProfileController(), 'index']);
        $router->addRoute('/\/profile\/edit/', [new ProfileController(), 'update']);
    }
}
