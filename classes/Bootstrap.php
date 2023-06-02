<?php

class Bootstrap{

    public function __construct(
        public $request,
        private $controller,
        private $action
    ){
        if($this->request['controller'] == ""){
            $this->controller = "home";
        }else{
            $this->controller = $this->request['controller'];
        }
        

        if($this->request['action'] == ""){
            $this->action = 'index';
        }else{
            $this->action = $this->request['action'];
        }
    }


    public function createController(){
        if(class_exists($this->controller)){
            $parents = class_parents($this->controller);
            if(in_array("Controller", $parents)){
                if(method_exists($this->controller, $this->action)){
                    return new $this->controller($this->action, $this->request);
                }else{
                    echo "Method doesn't exists";
                    return;
                }
            }else{
                echo "Base Controller not found";
                return;
            }
        }else{
            echo "Controller class does not exist";
            return;
        }
    }
}