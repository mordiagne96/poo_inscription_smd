<?php
    namespace App\Core;

    abstract class Model implements IModel{

        // protected static string $table;

        public static function getTable():string {

            $table = str_replace("App\Models\\","",get_called_class());
            // $table = strtolower();
            $table = ($table=="AttacheClasse" or $table=="Etudiant" or $table=="RP" or $table=="Professeur")?"user":strtolower($table);
            // dd($table);
            return $table;
        }
        
        public function insert():int|string{
            return 0;
        }

        public function update():int{
            return 0;
        }

        public function delete():int{
            return 0;
        }

        

        public static function findAll():array{
            $db= new DataBase();
            $db->connexionBD();  
            $query  = $db->getDb()->prepare("select * from ".self::getTable()." where etat_data=0", []);
            $query->execute();
            return $query ->fetchAll();
        }

        public static function findBy(string $sql, array $tab=[], bool $single=false):null|object|array{
            $db= new DataBase();
            $db->connexionBD();
            $query  = $db->getDb()->prepare($sql,$tab);
            $query->execute();
            switch ($single) {
                case true:
                    return $query->fetch();
                    break;
                case false:
                    return $query ->fetchAll();
                    break;
            }

            return null;
        }
        public static function findById(int $id):array{
            $db= new DataBase();
            $db->connexionBD();  
            $query  = $db->getDb()->prepare("select * from ".self::getTable()." where id=$id and etat_data=0", []);
            $query->execute();
            return $query ->fetch();
        }

        public static function findOneBy():array{
            return [];
        }

        public static function deleteById(int $id):int{
            $db = new DataBase();
                $db ->connexionBD();
                $sql = "update ".self::getTable()." set etat_data = 1 where id=?";
                // $sql = "update module set etat_data = 1 where id=?";
                // dd($sql);
                $result = $db->executeDelete($sql, [$id]);
                return $result;
        }

    }