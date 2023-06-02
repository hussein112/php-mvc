<?php

require 'config.php';

require 'classes/Bootstrap.php';
require 'classes/Controller.php';
require 'classes/Model.php';
require 'Models/Home.php';
require 'controllers/HomeController.php';

$controller = $bootstrap->createController();

if($controller){
    $controller->executeAction();
}