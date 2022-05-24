<?php

namespace App\Models;

use App\Core\DataBase;
use App\Core\Model;

    class Inscription extends Model{
        private int $id;
        private string $date;
        private string $etat;
        private string $numero;

        public function anneeScolaire():AnneeScolaire{
            return new AnneeScolaire();
        }

        public function classe():Classe{
            return new Classe();
        }

        public function etudiant():Etudiant{
            return new Etudiant();
        }

        public function attacheClasse():AttacheClasse{
            return new AttacheClasse();
        }

        public function demandes():array{
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
         * Get the value of date
         */ 
        public function getDate()
        {
                return $this->date;
        }

        /**
         * Set the value of date
         *
         * @return  self
         */ 
        public function setDate($date)
        {
                $this->date = $date;

                return $this;
        }

        /**
         * Get the value of etat
         */ 
        public function getEtat()
        {
                return $this->etat;
        }

        /**
         * Set the value of etat
         *
         * @return  self
         */ 
        public function setEtat($etat)
        {
                $this->etat = $etat;

                return $this;
        }

        public function insertInscription(int $classe_id, int $etudiant_id, int $ac_id, int $anneeScolaire_id):int{
            $db = new DataBase();
            $db->connexionBD();
            $sql = "insert into inscription (numero, date, etudiant_id, classe_id, annee_scolaire_id, ac_id) value(?,?,?,?,?,?)";
            $result = $db->executeUpdate($sql, [$this->numero, $this->date, $etudiant_id, $classe_id,$anneeScolaire_id, $ac_id]);
            return $result;

        }

        public function genererNumero(){
            $db = new DataBase();
            $db->connexionBD();
            $sql = "select max(id) from ".self::getTable();
            $query  = $db->getDb()->prepare($sql);
            $query->execute();
            $result = $query->fetch();
            if($result == null) {
                $id = 1;
            }else{
                $id = $result[0]+1;
            }
            $numero = "IE-".date('Y').rand(0,9).$id."E";
            $this->numero = $numero;
        }
    }