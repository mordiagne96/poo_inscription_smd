<?php

namespace App\Models;
use App\Core\DataBase;
use App\Config\Constante;

    class Etudiant extends User{
        private string $matricule;

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

        public function insert():int|string{
            $db = new DataBase();
            $db->connexionBD();
            $sql = "insert into ".self::getTable()." (nom_complet,matricule,adresse,sexe,role,login,password) values(?,?,?,?,?,?,?)";
            // echo $sql;die;
            // var_dump($this->nomComplet, $this->adresse, $this->login, $this->password);die;
            $result = $db->executeUpdate($sql, [$this->nomComplet,$this->matricule, $this->adresse , $this->sexe, self::getRole(), $this->login, $this->password]);
            // echo $result;die;
            return $result;
        }  

        public function genererMatricule(){
            $db = new DataBase();
            $db->connexionBD();
            $sql = "select max(id) from ".self::getTable()." where role like '".self::getRole()."'";
            $query  = $db->getDb()->prepare($sql);
            $query->execute();
            $result = $query->fetch();
            if($result == null) {
                $id = 1;
            }else{
                $id = $result[0]+1;
            }
            $numero = "MAT-".date('Y').rand(0,9).$id."E";
            $this->matricule = $numero;
        }

        // methodes
        // public static function findAll():array{
        //         $sql = "select * from ".Etudiant::getTable().";";
        //         echo $sql;
        //         return [];
        // }
    }