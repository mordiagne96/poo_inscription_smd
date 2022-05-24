<?php

    namespace App\Config;

    class Constante{
        public const ROLE_ETUDIANT = "ROLE_ETUDIANT";
        public const ROLE_PROFESSEUR = "ROLE_PROFESSEUR";
        public const ROLE_ATTACHE_CLASSE = "ROLE_ATTACHE_CLASSE";
        public const ROLE_RP = "ROLE_ATTACHE_RP";

        public static function getRoot(){
            return str_replace("public".DIRECTORY_SEPARATOR."index.php","",$_SERVER['SCRIPT_FILENAME']);
        }

        public static function getWebFront(){
            // return str_replace("public".DIRECTORY_SEPARATOR."index.php","",$_SERVER['SCRIPT_FILENAME']);
            return Self::getRoot()."public/";
        }

        public static function getController(){
            // return str_replace("public".DIRECTORY_SEPARATOR."index.php","",$_SERVER['SCRIPT_FILENAME']);
            return Self::getRoot()."controllers/";
        }

        public static function urlBase(){
            // return str_replace("public".DIRECTORY_SEPARATOR."index.php","",$_SERVER['SCRIPT_FILENAME']);
            return "http://localhost:8002/";
        }

        
    }