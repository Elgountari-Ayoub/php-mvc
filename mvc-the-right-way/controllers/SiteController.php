<?php

namespace app\Controllers;

use app\Core\Application;

use app\Core\Controller;

class SiteController extends Controller
{
  public  function home()
  {
    $params = [
      'name' => 'elyoub'
    ];
    return $this->render('home', $params);
  }
  public  function contact()
  {

    return $this->render('contact');
  }
  public static function handleContact()
  {
    return 'Contact Handling';
  }
}