<?php

namespace app\Controllers;

use app\Core\Controller;
use app\Core\Request;

class AuthController  extends Controller
{
  public function login(Request $request)
  {
    if ($request->isPost()) {
      return 'Handling Submited LOGIN Data ...';
    }

    echo $this->render('login');
  }


  public function register(Request $request)
  {
    if ($request->isPost()) {
      return 'Handling Submited REGISTER Data ...';
    }

    echo $this->render('register');
  }
}