<?php

namespace app\Core;

use app\Core\Request;
use app\Controllers;

class Router
{
  public Request $request;
  public Response $response;
  protected $routes = [];
  public function __construct(Request $request, Response  $response)
  {
    $this->request = $request;
    $this->response = $response;
  }

  public function get($path, $callback)
  {
    $this->routes['get'][$path] = $callback;
  }
  public function post($path, $callback)
  {
    $this->routes['post'][$path] = $callback;
  }

  public function resolve()
  {
    $path = $this->request->getPath();
    $method = $this->request->method();
    $callback = $this->routes[$method][$path] ?? false;

    // check if it an invalid request
    if ($callback === false) {
      $this->response->setStatusCode(404);
      return $this->renderView('_404');
    }
    // check if it a view
    if (is_string($callback)) {
      return $this->renderView($callback);
    }

    if (is_array($callback)) {
      $callback[0] = new $callback[0];
    }
    return call_user_func($callback, $this->request);
  }

  public function renderView($view, $params = [])
  {
    $layoutContent = $this->layoutContent('main');
    $viewContent = $this->renderOnlyView($view, $params);
    return str_replace('{{content}}', $viewContent, $layoutContent);
  }


  protected function layoutContent($layout)
  {
    ob_start();
    include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
    return ob_get_clean();
  }

  protected function renderOnlyView($view, $params)
  {
    foreach ($params as $key => $value) {
      $$key = $value;
    }
    ob_start();
    include_once Application::$ROOT_DIR . "/views/$view.php";
    return ob_get_clean();
  }
}