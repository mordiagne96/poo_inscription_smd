<?php

namespace App\Models;
    class AnneeScolaire{
        private int $id;
        private string $annee;

        public function professeurClasseAnnee():array{
            return [];
        }

        public function incriptions():array{
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
         * Get the value of annee
         */ 
        public function getAnnee()
        {
                return $this->annee;
        }

        /**
         * Set the value of annee
         *
         * @return  self
         */ 
        public function setAnnee($annee)
        {
                $this->annee = $annee;

                return $this;
        }
    }