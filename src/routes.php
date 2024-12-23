<?php

use App\Controllers\Customers\CusChatController;
use App\Controllers\Customers\CusComplaintController;
use App\Controllers\Customers\CusHomeController;
use App\Controllers\Customers\CusOrderController;
use App\Controllers\Customers\CusReportController;
use App\Controllers\Sellers\SelChatController;
use App\Controllers\Sellers\SelCustomerController;
use App\Controllers\Sellers\SelHomeController;
use App\Controllers\Sellers\SelOrderController;
use App\Controllers\Sellers\SelProductController;
use App\Controllers\Sellers\SelShopController;
use App\Router;

// Usage:
$router = new Router();

$sessionRoute = "customer";

// // Add routes
// $router->addRoute('/\//', [new PostController(), 'index']);
// $router->addRoute('/\/post/', [new PostController(), 'index']);
// $router->addRoute('/\/post\/index/', [new PostController(), 'index']);
// $router->addRoute('/\/post\/show\/(\d+)/', [new PostController(), 'show']);
// $router->addRoute('/\/post\/create/', [new PostController(), 'create']);
// $router->addRoute('/\/post\/update\/(\d+)/', [new PostController(), 'update']);
// $router->addRoute('/\/post\/delete\/(\d+)/', [new PostController(), 'delete']);

if($sessionRoute == "seller") {
    $router->addRoute('/\/seller/', [new SelHomeController(), 'index']);
    $router->addRoute('/\/seller\/home/', [new SelHomeController(), 'index']);

    $router->addRoute('/\/seller\/products/', [new SelProductController(), 'index']);
    $router->addRoute('/\/seller\/products\/create/', [new SelProductController(), 'create']);
    $router->addRoute('/\/seller\/products\/update\/(\d+)/', [new SelProductController(), 'update']);
    $router->addRoute('/\/seller\/products\/delete\/(\d+)/', [new SelProductController(), 'delete']);

    $router->addRoute('/\/seller\/customers/', [new SelCustomerController(), 'index']);
    $router->addRoute('/\/seller\/customers\/detail/', [new SelCustomerController(), 'detail']);

    $router->addRoute('/\/seller\/orders/', [new SelOrderController(), 'index']);
    $router->addRoute('/\/seller\/orders\/detail/', [new SelOrderController(), 'detail']);

    
    $router->addRoute('/\/seller\/shops/', [new SelShopController(), 'index']);
    $router->addRoute('/\/seller\/shops\/create/', [new SelShopController(), 'create']);
    $router->addRoute('/\/seller\/shops\/update\/(\d+)/', [new SelShopController(), 'update']);
    
    $router->addRoute('/\/seller\/chats/', [new SelChatController(), 'index']);

} else if($sessionRoute == "admin") {
    $router->addRoute('/\//', [new SelHomeController(), 'index']);
    $router->addRoute('/\/home/', [new SelHomeController(), 'index']);
    $router->addRoute('/\/seller\/products/', [new SelProductController(), 'index']);
    $router->addRoute('/\/seller\/customers/', [new SelCustomerController(), 'index']);
    $router->addRoute('/\/orders/', [new SelOrderController(), 'index']);

} else if($sessionRoute == "customer") {
    $router->addRoute('/\/orders/', [new CusOrderController(), 'index']);
    $router->addRoute('/\/orders\/detail\/(\d+)/', [new CusOrderController(), 'Details']);

    $router->addRoute('/\/complaints/', [new CusComplaintController(), 'index']);
    $router->addRoute('/\/complaints\/detail/', [new CusComplaintController(), 'Details']);

    $router->addRoute('/\/customer\/report\/create/', [new CusReportController(), 'create']);


    $router->addRoute('/\/chats/', [new CusChatController(), 'index']);
    
} 
// $router->addRoute('/\/login/', [new SelHomeController(), 'index']);
// $router->addRoute('/\/register/', [new SelProductController(), 'index']);
