<?php

namespace App\Models;
use App\Config\Constante;

    class Etudiant extends User{
        private string $matricule;
        private string $sexe;

        public function __construct(){
            self::$role = Constante::ROLE_ETUDIANT;
        }

        public function inscriptions():array{
            return [];
        }

        /**
         * Get the value of matricule
         */ 
        public function getMatricule()
        {
                return $this->matricule;
        }

        /**
         * Set the value of matricule
         *
         * @return  self
         */ 
        public function setMatricule($matricule)
        {
                $this->matricule = $matricule;

                return $this;
        }

        /**
         * Get the value of sexe
         */ 
        public function getSexe()
        {
                return $this->sexe;
        }

        /**
         * Set the value of sexe
         *
         * @return  self
         */ 
        public function setSexe($sexe)
        {
                $this->sexe = $sexe;

                return $this;
        }

        // methodes
        // public static function findAll():array{
        //         $sql = "select * from ".Etudiant::getTable().";";
        //         echo $sql;
        //         return [];
        // }
    }