<?php
namespace App\Models;
use App\Core\DataBase;
use App\Core\Model;

    class ProfesseurModule extends Model{
        private int $id;
        
        public function professeur():Professeur{
            return new Professeur();
        }

        public function module():Module{
            return new Module();
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        public function insertProfesseurModule(int $idProfesseur,int $idModule):int{
            $db = new DataBase();
            $db->connexionBD();
            $sql = "insert into professeur_module (professeur_id, module_id) values(?,?)";
            $result = $db->executeUpdate($sql,[$idProfesseur,$idModule]);
            return $result;
        }
    }