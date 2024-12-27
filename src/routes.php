<?php

use App\Controllers\Admin\AdCategoryController;
use App\Controllers\Admin\AdHomeController;
use App\Controllers\Admin\AdProductController;
use App\Controllers\Admin\AdUserController;
use App\Controllers\Auth\AuthController;
use App\Controllers\Sellers\SelChatController;
use App\Controllers\Sellers\SelCustomerController;
use App\Controllers\Sellers\SelHomeController;
use App\Controllers\Sellers\SelOrderController;
use App\Controllers\Sellers\SelProductController;
use App\Controllers\Sellers\SelShopController;
use App\Controllers\Shop\ShopController;
use App\Router;
// Usage:
$router = new Router();
$checkLogin = isset($_SESSION['currentUser']['role']);

$sessionRoute = "admin";
$router->addRoute('/\/signin/', [new AuthController(), 'signin']);
$router->addRoute('/\/register/', [new AuthController(), 'register']);
$router->addRoute('/\/forgot/', [new AuthController(), 'forgot']);
$router->addRoute('/\/logout/', [new AuthController(), 'logout']);
$router->addRoute('/\/seller\/shops\/create/', [new SelShopController(), 'create']);
$router->addRoute('/\//', [new ShopController(), 'index']);
$router->addRoute('/\/AllProduct/', [new ShopController(), 'allProduct']);
$router->addRoute('/\/Product\/(\d+)/', [new ShopController(), 'show']);

// $router->addRoute('/\//', [new AuthController(), 'forgot']);


if ($sessionRoute == "seller") {
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
    $router->addRoute('/\/seller\/customers\/detail/', [new SelCustomerController(), 'detail']);

    $router->addRoute('/\/seller\/orders/', [new SelOrderController(), 'index']);
    $router->addRoute('/\/seller\/orders\/detail/', [new SelOrderController(), 'detail']);


    $router->addRoute('/\/seller\/shops/', [new SelShopController(), 'index']);
    $router->addRoute('/\/seller\/shops\/update\/(\d+)/', [new SelShopController(), 'update']);

    $router->addRoute('/\/seller\/chats/', [new SelChatController(), 'index']);
} else if ($checkLogin == 0) {
    $router->addRoute('/\/updateCart/', [new ShopController(), 'handleCartAction']);
    $router->addRoute('/\/checkout/', [new ShopController(), 'checkout']);
    $router->addRoute('/\/admin/', [new AdHomeController(), 'index']);
    $router->addRoute('/\/admin\/home/', [new AdHomeController(), 'index']);
    $router->addRoute('/\/admin\/products/', [new AdProductController(), 'index']);
    $router->addRoute('/\/admin\/users/', [new AdUserController(), 'index']);
    $router->addRoute('/\/admin\/categories/', [new AdCategoryController(), 'index']);
} else if ($checkLogin == 1) {
    $router->addRoute('/\//', [new SelHomeController(), 'index']);
    $router->addRoute('/\/home/', [new SelHomeController(), 'index']);
    $router->addRoute('/\/seller\/products/', [new SelProductController(), 'index']);
    $router->addRoute('/\/seller\/customers/', [new SelCustomerController(), 'index']);
    $router->addRoute('/\/orders/', [new SelOrderController(), 'index']);
}
