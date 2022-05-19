<?php

namespace App\Models;

use App\Core\Model;

    class Inscription extends Model{
        private int $id;
        private \dateTime $date;
        private string $etat;

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
    }