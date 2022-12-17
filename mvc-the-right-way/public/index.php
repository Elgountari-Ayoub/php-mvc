<?php

// namespace app\Core;
require_once __DIR__ . '/vendor/autoload.php';

use \app\Core\Application;

$app = new Application();
$app->router->get('/', function () {
  return 'Hello world';
});
$app->router->get('/contact', function () {
  return 'Contact Page';
});

$app->run();




// echo '<pre>';
// var_dump($position);
// echo '</pre>';