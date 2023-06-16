<?php


namespace App;


class Bootstrap{
    private string $controller;
    private string $action;

    public function __construct(
        public $request,
    ){
    }


    /**
     * Determine the get the action + controller from $request
     * 
     * @return void
     */
    public function preProcessRequest(){
        if($this->request['controller'] == ""){
            $this->controller = "home";
        }else{
            $controller = "App\Controllers\\" . ucwords($this->request['controller']);
            $this->controller = $controller;
        }

        if($this->request['action'] == ""){
            $this->action = 'index';
        }else{
            $this->action = $this->getAction($this->request['action']);
        }
    }

    /**
     * Get the action the user want to perform
     * 
     * @return mixed
     */
    function getAction($action){
        if(is_int($action)){
            return ['show', $action];
        }else{
            return $action;
        }
    }

    /**
     * Get the controller for the current request
     * 
     * @return App\Controller
     */
    public function getController(){
        $this->preProcessRequest();
        if(class_exists($this->controller)){
            $parents = class_parents($this->controller);
            if(in_array("App\\Controller", $parents)){ 
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
            echo "Controller <b>" . $this->controller.  "</b> class does not exist";
            return;
        }
    }
}