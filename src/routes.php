<?php

use App\Controllers\Admin\AdHomeController;
use App\Controllers\Admin\AdProductController;
use App\Controllers\Admin\AdUserController;
use App\Controllers\Sellers\SelCustomerController;
use App\Controllers\Sellers\SelHomeController;
use App\Controllers\Sellers\SelOrderController;
use App\Controllers\Sellers\SelProductController;
use App\Router;

// Usage:
$router = new Router();

$sessionRoute = "admin";

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
    $router->addRoute('/\/customers/', [new SelCustomerController(), 'index']);
    $router->addRoute('/\/orders/', [new SelOrderController(), 'index']);
} else if($sessionRoute == "admin") {
    $router->addRoute('/\//', [new AdHomeController(), 'index']);
    $router->addRoute('/\/home/', [new AdHomeController(), 'index']);
    $router->addRoute('/\/products/', [new AdProductController(), 'index']);
    $router->addRoute('/\/users/', [new AdUserController(), 'index']);
    // $router->addRoute('/\/customers/', [new SelCustomerController(), 'index']);
    // $router->addRoute('/\/orders/', [new SelOrderController(), 'index']);

} else if($sessionRoute == "customer") {
    $router->addRoute('/\//', [new SelHomeController(), 'index']);
    $router->addRoute('/\/home/', [new SelHomeController(), 'index']);
    $router->addRoute('/\/products/', [new SelProductController(), 'index']);
    $router->addRoute('/\/customers/', [new SelCustomerController(), 'index']);
    $router->addRoute('/\/orders/', [new SelOrderController(), 'index']);
    
} 
// $router->addRoute('/\/login/', [new SelHomeController(), 'index']);
// $router->addRoute('/\/register/', [new SelProductController(), 'index']);
