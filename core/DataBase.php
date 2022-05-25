<?php
    namespace App\Core;
    class DataBase{
        private \PDO|null $db=null;
        
        public function connexionBD():void{
            try{
                $this->db = new \PDO('mysql:host=127.0.0.1;dbname=gestion_inscription', "root", "");
                // echo "bon";
            }catch (\PDOException $e){
                print "Erreur !: " . $e->getMessage() . "<br/>";
                die('Erreur de connexion a la base de donnees ..! Veuillez contacter l\'administrateur (Mor DIAGNE :)');
            }
        }

        public function executeUpdate(string $sql, array $data):int|string{
            try{
                $result = $this->getDb()->prepare($sql);
                $result = $result->execute($data);
                return $this->getDb()->lastInsertId();
            }catch(\PDOException $e){
                return $e->getMessage();
            }
         
        }
        public function executeUpdateBy(string $sql, array $data):int|string{
            try{
                $result = $this->getDb()->prepare($sql);
                $result = $result->execute($data);
                return $result;
            }catch(\PDOException $e){
                return $e->getMessage();
            }
         
        }
        public function executeDelete(string $sql, array $data):int|string{
            try{
                $result = $this->getDb()->prepare($sql);
                $result = $result->execute($data);
                return $result;
            }catch(\PDOException $e){
                return $e->getMessage();
            }
         
        }
        public function closeConnexionBD():void{
            $this->db = null;
        }

        public function executeSelect():void{

        }

        /**
         * Get the value of db
         */ 
        public function getDb()
        {
                return $this->db;
        }

        /**
         * Set the value of db
         *
         * @return  self
         */ 
        public function setDb($db)
        {
                $this->db = $db;
                
                return $this;
        }
    }