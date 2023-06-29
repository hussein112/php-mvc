<?php

namespace App\Controllers;

use Models\Home;

class LoginController extends Controller{

    public function __construct(){

    }

    public function index(){
        $this->render(new Home, false);
    }

}