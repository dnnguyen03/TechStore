<?php

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

$sessionRoute = "";


$router->addRoute('/\//', [new ShopController(), 'index']);

if ($sessionRoute == "seller") {
    $router->addRoute('/\//', [new SelHomeController(), 'index']);
    $router->addRoute('/\/home/', [new SelHomeController(), 'index']);

    $router->addRoute('/\/products/', [new SelProductController(), 'index']);
    $router->addRoute('/\/products\/create/', [new SelProductController(), 'create']);
    $router->addRoute('/\/products\/update\/(\d+)/', [new SelProductController(), 'update']);
    $router->addRoute('/\/products\/delete\/(\d+)/', [new SelProductController(), 'delete']);

    $router->addRoute('/\/customers/', [new SelCustomerController(), 'index']);

    $router->addRoute('/\/orders/', [new SelOrderController(), 'index']);

    $router->addRoute('/\/shops/', [new SelShopController(), 'index']);
    $router->addRoute('/\/shops\/create/', [new SelShopController(), 'create']);
    $router->addRoute('/\/shops\/update\/(\d+)/', [new SelShopController(), 'update']);

    $router->addRoute('/\/chats/', [new SelChatController(), 'index']);
} else if ($sessionRoute == "admin") {
    $router->addRoute('/\//', [new SelHomeController(), 'index']);
    $router->addRoute('/\/home/', [new SelHomeController(), 'index']);
    $router->addRoute('/\/products/', [new SelProductController(), 'index']);
    $router->addRoute('/\/customers/', [new SelCustomerController(), 'index']);
    $router->addRoute('/\/orders/', [new SelOrderController(), 'index']);
} else if ($sessionRoute == "customer") {
    $router->addRoute('/\//', [new SelHomeController(), 'index']);
    $router->addRoute('/\/home/', [new SelHomeController(), 'index']);
    $router->addRoute('/\/products/', [new SelProductController(), 'index']);
    $router->addRoute('/\/customers/', [new SelCustomerController(), 'index']);
    $router->addRoute('/\/orders/', [new SelOrderController(), 'index']);
} 
// $router->addRoute('/\/login/', [new SelHomeController(), 'index']);
// $router->addRoute('/\/register/', [new SelProductController(), 'index']);
