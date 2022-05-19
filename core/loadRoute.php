<?php

use App\Controller\ModuleController;
use App\Core\Router;
use App\Exception\RouteNotFoundException;
$route = new Router();
$route->route("/Securite",[SecuriteController::class,"login"]);
$route->route("/Classe",[SecuriteController::class,"lister"]);
$route->route("/Demande",[SecuriteController::class,"lister"]);
$route->route("/Professeur",[SecuriteController::class,"lister"]);
$route->route("/Professeur/add",[SecuriteController::class,"add"]);
$route->route("/Module",[ModuleController::class,"lister"]);
$route->route("/Module",[ModuleController::class,"lister"]);
$route->route("/Inscription",[ModuleController::class,"lister"]);

try {
    $route->resolve();
} catch (RouteNotFoundException $ex) {
    //throw $th;
    echo $ex->message;
}