<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\PostController;
use App\Controllers\UserController;

// $controller = new PostController();
$controller = new UserController();

$action = $_GET['action'] ?? 'index';
$postId = $_GET['id'] ?? null;

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'show':
        $controller->show($postId);
        break;
    case 'create':
        $controller->create();
        break;
    case 'update':
        $controller->update($postId);
        break;
    case 'delete':
        $controller->delete($postId);
        break;
    default:
        echo '404 Not Found';
}
