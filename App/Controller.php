<?php

namespace App;

abstract class Controller{

    public function __construct(
        protected $action,
        protected $request
    ){
        if(is_array($action)){

        }
    }


    /**
     * Serve the user request
     * 
     * @return \App\Controllers
     */
    public function serve(){
        return $this->{$this->action}();
    }


    /**
     * Get the view directory based on the class name
     * 
     * @return String
     */
    protected function getViewDir(){
        $pre = explode("\\", get_class($this));
        $class = end($pre);
        $view_dir = str_replace("Controller", "", $class);
        return $view_dir; 
    }


    protected function render($viewmodel, $fullview){
        $view_dir = $this->getViewDir();
        $view = 'Views/' . $view_dir . '/' . $this->action . '.php';
        if($fullview){ 
            require("Views/master.php");
        }else{ 
            require($view);
        }
    }
}