<?php
namespace App\Models;
use App\Core\DataBase;
use App\Core\Model;

    class ProfesseurClasseAnnee extends Model{
        private int $id;

        public function professeur():Professeur{
            return new Professeur();
        }

        public function classe():Classe{
            return new Classe();
        }

        public function anneeScolaire():AnneeScolaire{
            return new AnneeScolaire();
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

        public function insetProfesseurClasseAnnee(int $idProfesseur, int $idClasse,int $idAnnee=4):int{
            $db = new DataBase();
            $db->connexionBD();
            $sql = "insert into professeur_classe_annee (professeur_id, classe_id, annee_scolaire_id) value(?,?,?)";
            $result = $db->executeUpdate($sql, [$idProfesseur, $idClasse, $idAnnee]);
            return $result;
        }
    }