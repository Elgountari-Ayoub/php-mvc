<?php

// namespace app\Core;
require_once __DIR__ . '/../vendor/autoload.php';

use app\Controllers\AuthController;
use \app\Core\Application;
use app\Controllers\SiteController;

$app = new Application(dirname(__DIR__));
$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->run();




// echo '<pre>';
// var_dump($position);
// echo '</pre>';