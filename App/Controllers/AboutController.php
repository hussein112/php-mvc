<?php

namespace App\Controllers;

use App\Controller;
use App\Models\About;

class AboutController extends Controller{
    public function index(){
        $this->render(false, 'about', new About(), true);
    }
}