<?php

namespace App;

session_start();

require_once('vendor/autoload.php');

use Router\Router;
$router = new Router($_GET['url']);

if(!isset($_SESSION['Type'])) {
    $_SESSION['Type'] = null;  
}

switch ($_SESSION['Type']) {
    case 'client':
        $router->get("/home", "App\Controller\AppController@index");
        $router->get("/cats", "App\Controller\CatController@index");
        $router->get("/logout", "App\Controller\AppController@logout"); //
        break;
        
    case 'manager':
        $router->get("/logout", "App\Controller\AppController@logout");
        $router->get("/", "App\Controller\AppController@index");

        $router->get("/cats", "App\Controller\CatController@index");
        $router->get("/cat", "App\Controller\CatController@add");
        $router->post("/cat", "App\Controller\CatController@add");
        $router->get("/cat/:id", "App\Controller\CatController@modify");
        $router->post("/cat/:id", "App\Controller\CatController@modify");
        $router->get("/removecat/:id", "App\Controller\CatController@delete");
        break;
    default:
        $router->get("/", "App\Controller\AppController@login");
        $router->post("/", "App\Controller\AppController@login");
    
        $router->get("/cats", "App\Controller\CatController@visitor");
        $router->get("/lahaine", "App\Controller\AppController@addFake");
        $router->get("/logout", "App\Controller\AppController@logout"); //
        break;
}

$router->run();