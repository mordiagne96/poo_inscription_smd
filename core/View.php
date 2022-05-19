<?php 
namespace App\Core;

use App\Config\Constante;

class View{

    private $tpl;

    public function load($page,$data=null){
        
        // var_dump(Constante::getRoot());
        // $this->tpl = new \Smarty();
        // dd($data);
        $directory = Constante::getRoot()."templates/".$page.".html.php";

        
        if(file_exists($directory)){
            $front_template = Constante::urlBase()."templates";
            $url_base = Constante::urlBase();
            $base_template = Constante::getRoot();
            // var_dump($front_template);die;
                require_once $directory;

        }else{
            echo "Ce chemin ".$directory." n'existe pas dans ".Constante::getRoot()."templates/";

        }
        // require_once $directory;
    }

    public function redirect($uri) {
        // $base = Constante::urlBase();
        // echo Constante::getRoot()."templates/".$uri.".html.php";die("sf");
        header("location:".Constante::urlBase().$uri);
        // header("location:".$base.$uri);
        // $directory = Constante::getRoot()."templates/".$page.".html.php";

    }
}