<?php

namespace app\Core;

class Request
{
  public function __construct()
  {
  }

  public function getPath()
  {
    $path = $_SERVER['REQUEST_URI'] ?? '/';
    $position = strpos($path, '?');

    if ($position === false) {
      return $path;
    }
    return substr($path, 0, $position);
  }

  public function method()
  {

    return strtolower($_SERVER['REQUEST_METHOD']);
  }
  public function isGet()
  {

    return $this->method() === 'get';
  }
  public function isPost()
  {
    return $this->method() === 'post';
  }

  public function getBody()
  {
    $body = [];

    if ($this->method() === 'get') {
      foreach ($_GET as $key => $value) {
        $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
      }
    }
    if ($this->method() === 'post') {
      foreach ($_POST as $key => $value) {
        $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
      }
    }
    return $body;
  }
}