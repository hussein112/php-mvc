<?php


abstract class Controller{

    public function __construct(
        protected $request,
        protected $action
    ){
        
    }

    public function executeFunction(){
        return $this->{$this->action}();
    }


    protected function returnView($viewmodel, $fullview){
        $view = 'views/' . get_class($this) . '/' . $this->action . '.php';
        if($fullview){
            require("view/main.php");
        }else{
            require($view);
        }
    }
}