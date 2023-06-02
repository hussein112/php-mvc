<?php



class HomeController extends Controller{
    protected function index(){
        $viewmodel = new Home();
        $this->returnView($viewmodel, true);
    }
}