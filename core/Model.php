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
        
        public function insert():int{
            
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
            $query  = $db->getDb()->prepare("select * from ".self::getTable(), []);
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
            return [];
        }

        public static function findOneBy():array{
            return [];
        }
    }