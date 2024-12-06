<?php

use App\Controllers\Sellers\SelCustomerController;
use App\Controllers\Sellers\SelHomeController;
use App\Controllers\Sellers\SelOrderController;
use App\Controllers\Sellers\SelProductController;
use App\Controllers\Sellers\SelShopController;
use App\Router;

// Usage:
$router = new Router();

$sessionRoute = "seller";

// // Add routes
// $router->addRoute('/\//', [new PostController(), 'index']);
// $router->addRoute('/\/post/', [new PostController(), 'index']);
// $router->addRoute('/\/post\/index/', [new PostController(), 'index']);
// $router->addRoute('/\/post\/show\/(\d+)/', [new PostController(), 'show']);
// $router->addRoute('/\/post\/create/', [new PostController(), 'create']);
// $router->addRoute('/\/post\/update\/(\d+)/', [new PostController(), 'update']);
// $router->addRoute('/\/post\/delete\/(\d+)/', [new PostController(), 'delete']);

if($sessionRoute == "seller") {
    $router->addRoute('/\//', [new SelHomeController(), 'index']);
    $router->addRoute('/\/home/', [new SelHomeController(), 'index']);

    $router->addRoute('/\/products/', [new SelProductController(), 'index']);
    $router->addRoute('/\/products\/create/', [new SelProductController(), 'create']);
    $router->addRoute('/\/products\/update\/(\d+)/', [new SelProductController(), 'update']);

    $router->addRoute('/\/customers/', [new SelCustomerController(), 'index']);

    $router->addRoute('/\/orders/', [new SelOrderController(), 'index']);
    
    $router->addRoute('/\/shops/', [new SelShopController(), 'index']);
    $router->addRoute('/\/shops\/create/', [new SelShopController(), 'create']);
    $router->addRoute('/\/shops\/update\/(\d+)/', [new SelShopController(), 'update']);

} else if($sessionRoute == "admin") {
    $router->addRoute('/\//', [new SelHomeController(), 'index']);
    $router->addRoute('/\/home/', [new SelHomeController(), 'index']);
    $router->addRoute('/\/products/', [new SelProductController(), 'index']);
    $router->addRoute('/\/customers/', [new SelCustomerController(), 'index']);
    $router->addRoute('/\/orders/', [new SelOrderController(), 'index']);

} else if($sessionRoute == "customer") {
    $router->addRoute('/\//', [new SelHomeController(), 'index']);
    $router->addRoute('/\/home/', [new SelHomeController(), 'index']);
    $router->addRoute('/\/products/', [new SelProductController(), 'index']);
    $router->addRoute('/\/customers/', [new SelCustomerController(), 'index']);
    $router->addRoute('/\/orders/', [new SelOrderController(), 'index']);
    
} 
// $router->addRoute('/\/login/', [new SelHomeController(), 'index']);
// $router->addRoute('/\/register/', [new SelProductController(), 'index']);
