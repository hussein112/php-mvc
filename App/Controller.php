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


    /**
     * Get the view path & render (require) it
     * 
     * @param Bool $hasdir, whether the controller have a set of views in a separate directory.
     * @param String $model
     * @param Bool $fullview
     * @return void
     */
    protected function render($hasdir, $viewname, $model, $fullview){
        if($hasdir){
            $view_dir = $this->getViewDir();
            $view = 'Views/' . $view_dir . '/' . $viewname . '.php';
        }else{
            $view = 'Views/' . $viewname . '.php';
        }

        if($fullview){ // Full Html Page with the added section
            require("Views/master.php");
        }else{ // only the added Section
            require($view);
        }
    }
}