<?php
namespace App\Models;
use App\Config\Constante;

    class AttacheClasse extends User{

        public function __construct(){
            self::$role = Constante::ROLE_ATTACHE_CLASSE;
        }

        public function inscriptions():array{
            return [];
        }
    }