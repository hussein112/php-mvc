<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Home;

class HomeController extends Controller{
    protected function index(){
        $this->render(new Home(), true);
    }
}