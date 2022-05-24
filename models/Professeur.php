<?php
    
    namespace App\Models;
    use App\Config\Constante;
    use App\Core\DataBase;

    class Professeur extends User{

        public function __construct(){
            self::$role = Constante::ROLE_PROFESSEUR;
        }

        private string $grade;

        /**
         * many to many dans les deux sens professeur et module
         */

         public function modules():array{
             return [];
         }


        /**
         * many to many dans les deux sens professeur et classe
         */

        public function classes():array{
            return [];
        }

        public function professseurClasseAnne():array{
            return [];
        }

        /**
         * Get the value of grade
         */ 
        public function getGrade()
        {
                return $this->grade;
        }

        /**
         * Set the value of grade
         *
         * @return  self
         */ 
        public function setGrade($grade)
        {
                $this->grade = $grade;

                return $this;
        }

        public function insert():int|string{
            $db = new DataBase();
            $db->connexionBD();
            $sql = "insert into ".self::getTable()." (nom_complet,adresse,grade,sexe,role) values(?,?,?,?,?);";
            // var_dump($this->nomComplet, $this->adresse, $this->login, $this->password);die;
            $result = $db->executeUpdate($sql, [$this->nomComplet, $this->adresse , $this->grade, $this->sexe, self::getRole()]);
            return $result;
        }                
    }