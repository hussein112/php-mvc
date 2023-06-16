<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Home;

class HomeController extends Controller{
    protected function index(){
        $model = new Home();
        $this->render($model, true);
    }
}