<?php

require_once __DIR__ . '/vendor/autoload.php';
include '../TechStore/config/routers.php';

$request_uri = $_SERVER['REQUEST_URI'];
$route = 'seller';

foreach ($routers as $router) {
    if ($request_uri == '/') {
        //TODO: Nguyên gọi home
    } else {
        if ($router['route'] == $route) {
            foreach ($router['actions'] as $action) {
                if ($request_uri == $action['link']) {
                    $controllerName = $action['page'];
                    $method = $action['method'];
                    
                    $controllerName->$method();
                    break;
                }
            }
        }
    }
}

// $controller = new HomeController();
// $controller->index();