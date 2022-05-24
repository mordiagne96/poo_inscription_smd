<?php

namespace App\Core;
use App\Controller\SecuriteController;

use App\Exception\RouteNotFoundException;

    class Router {

        private Request $request;

        private array $routes=[];

        public function __construct(){
            $this->request = new Request;
            session_start();
        }

        public function route(string $uri, array $action){
            $this->routes[$uri] = $action;
        }

        public function resolve(){
            if($this->request->isGet()){
                $uri = $this->request->getUri();
                // var_dump($uri[0]);die;
                // session_start();
                if(isset($this->routes["/".$uri[0]]) && isset($_SESSION["user"])){
                    $objectController = $uri[0]."Controller";
                    $object = "App\Controller\\".$objectController;
                    // dd($object);
                    // die($objectController." SecuriteController");
                    $controller = new $object();
                    if(isset($uri[1])){
                        if(method_exists($controller,$uri[1])){
                            $controller->{$uri[1]}();
                        }else{
                            echo "La methode ".$uri[1]."() n'existe pas dans la classe ".$objectController;
                        }
                    }else{
                        
                    }
                }else{
                    if($uri[0] == "" || isset($this->routes["/".$uri[0]])){
                        $controller = new SecuriteController();
                        $controller -> index();
                    }else{
                        throw new RouteNotFoundException();
                    }
                }
            }

            if($this->request->isPost()){
                // echo "Method post";
                $uri = $this->request->getUri();
                // var_dump($uri[0]);die;
    
                if(isset($this->routes["/".$uri[0]])){
                    $objectController = $uri[0]."Controller";
                    $object = "App\Controller\\".$objectController;
                    // die($objectController." SecuriteController");
                    $controller = new $object();
                    if(isset($uri[1])){
                        if(method_exists($controller,$uri[1])){
                            $controller->{$uri[1]}();
                        }else{
                            echo "La methode ".$uri[1]."() n'existe pas dans la classe ".$objectController;
                        }
                    }else{
                        
                    }
                }else{
                    if($uri[0] == ""){
                        $controller = new SecuriteController();
                        $controller -> index();
                    }else{
                        throw new RouteNotFoundException();
                    }
                }
            
            }
        }
    }