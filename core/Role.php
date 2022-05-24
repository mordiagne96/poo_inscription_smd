<?php

namespace App\Core;

use App\Config\Constante;


class Role{

    public  static function isconnect(){
        // dd(Constante::ROLE_RP);
        return (isset($_SESSION["user"]));
    }
    public  static function isRP(){

        return ($_SESSION["user"]["role"]==Constante::ROLE_RP);
    }
    public  static function isAC(){
        return ($_SESSION["user"]["role"]==Constante::ROLE_ATTACHE_CLASSE);
    }
    public  static function isEtudiant(){
        // dd($_SESSION["user"]["role"]);
        return ($_SESSION["user"]["role"]==Constante::ROLE_ETUDIANT);

    }
}