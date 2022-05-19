<?php

    namespace App\Models;

    use App\Config\Constante;

    class RP extends User{

        public function __construct(){
            self::$role = Constante::ROLE_RP;
        }

        public function demandes():array{
            return [];
        }

        public function classes():array{
            return [];
        }

    }