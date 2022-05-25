<?php
namespace App\Models;
use App\Core\DataBase;
use App\Core\Model;

    class Classe extends Model{
        private int $id;
        private string $libelle;
        private string $filiere;
        private string $niveau;

        /**
         * many to one de class vers rp
         */
        public function rp():RP{
            return new RP;
        }

         /**
         * one to many de classe vers inscription
         */
        public function inscriptions():array{
            return [];
        }
        
         /**
         * many to many dans les deux sens professeur et classe
         */
        public function professeurs():array{
            return [];
        }

        public function ProfesseurClasseAnnee():array{
            return [];
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

        /**
         * Get the value of libelle
         */ 
        public function getLibelle()
        {
                return $this->libelle;
        }

        /**
         * Set the value of libelle
         *
         * @return  self
         */ 
        public function setLibelle($libelle)
        {
                $this->libelle = $libelle;

                return $this;
        }

        /**
         * Get the value of filiere
         */ 
        public function getFiliere()
        {
                return $this->filiere;
        }

        /**
         * Set the value of filiere
         *
         * @return  self
         */ 
        public function setFiliere($filiere)
        {
                $this->filiere = $filiere;

                return $this;
        }

        /**
         * Get the value of niveau
         */ 
        public function getNiveau()
        {
                return $this->niveau;
        }

        /**
         * Set the value of niveau
         *
         * @return  self
         */ 
        public function setNiveau($niveau)
        {
                $this->niveau = $niveau;

                return $this;
        }

        public function insert():int|string{
                $db = new DataBase();
                $db->connexionBD();
                $sql = "insert into classe (libelle, filiere, niveau) values(?,?,?)";
                $result = $db->executeUpdate($sql, [$this->libelle, $this->filiere, $this->niveau]);
                return $result;
        }

        public function getAttributes(){
                var_dump(get_object_vars($this));
        }

        public function update():int{
                $db = new DataBase();
                $db->connexionBD();
                $sql = "update classe set libelle = ? , filiere = ?, niveau = ? where id = ?";
                $result = $db->executeUpdateBy($sql, [$this->libelle, $this->filiere, $this->niveau, $this->id]);
                return $result;
        }
    }