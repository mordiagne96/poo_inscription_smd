<?php
namespace App\Models;

use App\Config\Constante;
use App\Core\Model;
use App\Core\DataBase;

    abstract class User extends Model{

        protected int $id;
        protected string $nomComplet;
        protected string $adresse;
        protected string $login;
        protected string $password;
        protected static string $role;
         
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
         * Get the value of nomComplet
         */ 
        public function getNomComplet()
        {
                return $this->nomComplet;
        }

        /**
         * Set the value of nomComplet
         *
         * @return  self
         */ 
        public function setNomComplet($nomComplet)
        {
                $this->nomComplet = $nomComplet;

                return $this;
        }

        /**
         * Get the value of adresse
         */ 
        public function getAdresse()
        {
                return $this->adresse;
        }

        /**
         * Set the value of adresse
         *
         * @return  self
         */ 
        public function setAdresse($adresse)
        {
                $this->adresse = $adresse;

                return $this;
        }

        /**
         * Get the value of login
         */ 
        public function getLogin()
        {
                return $this->login;
        }

        /**
         * Set the value of login
         *
         * @return  self
         */ 
        public function setLogin($login)
        {
                $this->login = $login;

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

        /**
         * Get the value of role
         */ 
        public static function getRole():string
        {
                $user = get_called_class();
                $user = str_replace("App\Models\\","",$user);

                switch ($user) {
                        case 'RP':
                                return Constante::ROLE_RP;
                                break;
                        case 'Etudiant':
                                return Constante::ROLE_ETUDIANT;
                                break;
                        case 'Professeur':
                                return Constante::ROLE_PROFESSEUR;
                                break;
                        case 'Professeur':
                                return Constante::ROLE_ATTACHE_CLASSE;
                                break; 

                        case 'AttacheClasse':
                                return Constante::ROLE_ATTACHE_CLASSE;
                                break; 
                        default:
                                return null;
                                break;         
                }
        }

        public static function findAll(): array
        {
            $db = new DataBase();
            $db->connexionBD();
            $sql = "select * from ".self::getTable()." where role like '".self::getRole()."'";
            $query  = $db->getDb()->prepare($sql,[]);
            $query->execute();
            return  $query->fetchAll();
        }

        public static function getUserByLoginPassword(string $login, string $password){
                $db = new DataBase();
                $db->connexionBD();
                // $sql = "select * from user where login=? and password=?";
                $query = $db->getDb()->prepare("select * from user where login=? and password=?");
                $query->execute(array($login,$password));
                return $query->fetch();
        }

        public function insert():int{
                $db = new DataBase();
                $db->connexionBD();
                $sql = "insert into ".self::getTable()." (nom_complet,adresse,login,password,sexe,role) values(?,?,?,?,?,?);";
                // echo $sql; die;
                $query = $db->getDb()->prepare($sql);
                // var_dump($this->nomComplet, $this->adresse, $this->login, $this->password);die;
                $query = $query->execute(array($this->nomComplet, $this->adresse, $this->login, $this->password , "M", self::getRole()));
                return $query;
        }
    }