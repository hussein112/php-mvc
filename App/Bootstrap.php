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
            $this->controller = "App\\Controllers\\HomeController";
        }else{
            $controller = "App\\Controllers\\" . ucfirst($this->request['controller']) . "Controller";
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
            // View
            return ['show', $action]; // show(23)
        }else{
            // e.g., All --> View All
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
        if(class_exists($this->controller)){ // XController Exists?
            $parents = class_parents($this->controller);
            if(in_array("App\\Controller", $parents)){ // XController extends Controller?
                if(method_exists($this->controller, $this->action)){ // If method name 'action' exists
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