<?php

declare(strict_types=1);

namespace App;

require 'config.php';


spl_autoload_register(function($class){
    require __DIR__ . "\\$class.php";
});



function print_arr($arr){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}

$url = explode("/", $_SERVER['REQUEST_URI']);


$request = array(
    'controller' => ($url[2] . "Controller") ?? '',
    'action' => ($url[3]) ?? ''
);



$bootstrap = new Bootstrap($request);
$controller = $bootstrap->getController();

if($controller){
    $controller->serve();
}