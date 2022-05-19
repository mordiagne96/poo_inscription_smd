<?php

namespace App\Controller;

use App\Config\Constante;
use App\Models\User;
use App\Core\View;

    class SecuriteController extends Controller{

        public function index(){
            // $view = new View();
            $this->view->load("securite/connexion");
        }

        public function login(){

            // echo "vous etes sur la methode login";
            if(isset($_POST["connexion"])){

                extract($_POST);

                $user = User::getUserByLoginPassword($login,$password);
    
                // $view = new View();
    
                if($user != null){

                    session_start();

                    if(strcmp($user["role"], Constante::ROLE_PROFESSEUR) != 0){
                        
                        $_SESSION["user"] = $user;
                        
                        $this->view->load("securite/accueil");
                        
                    }else{
                        $this->view->redirect("securite/connexion");
                    }
                }else{
                    $this->view->redirect("securite/connexion");
                }
            }else{
                $this->view->redirect("securite/connexion");
            }

            // var_dump($user);
    
        }

        public function logout(){
            session_unset();
            $this->view->redirect("securite/connexion");
        }
    }