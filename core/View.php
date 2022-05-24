<?php 
namespace App\Core;

use App\Config\Constante;

class View{

    private $tpl;

    public function load($page,$data=null){

        $directory = Constante::getRoot()."templates/".$page.".html.php";

        
        if(file_exists($directory)){

            // session_start();
            
            $front_template = Constante::urlBase()."templates";
            $url_base = Constante::urlBase();
            $base_template = Constante::getRoot();
            $test = Constante::getWebFront();
            $role = new Role();
            // var_dump($role->isRP());
            // var_dump($role->isEtudiant());
            require_once $directory;

        }else{
            echo "Ce chemin ".$directory." n'existe pas dans ".Constante::getRoot()."templates/";

        }
        // require_once $directory;
    }

    public function redirect($uri) {
        
        // $base = Constante::urlBase();
        // echo Constante::getRoot()."templates/".$uri.".html.php";
        header("location:".Constante::urlBase());
        // header("location:".$base.$uri);
        // $directory = Constante::getRoot()."templates/".$page.".html.php";

    }
}