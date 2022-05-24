<?php

namespace App\Controller;

use App\Models\Professeur;
use App\Models\ProfesseurModule;
use App\Models\ProfesseurClasseAnnee;

    class ProfesseurController extends Controller{
        
        public function lister(){
            if($this->request->isPost()){
                echo "method post";
            }

            if($this->request->isGet()){
                $data = Professeur::findAll();
                $this->view->load("professeur/listerProfesseur", $data);
                // dd($data);
            }
        }

        public function add(){
            if($this->request->isPost()){
                if(isset($_POST['add-professeur-fetch'])){
                    // var_dump($_POST["sexe"]);
                    extract($_POST);
                    $prof = new Professeur();

                    $prof->setNomComplet($nom_complet);
                    $prof->setAdresse($adresse);
                    $prof->setGrade($grade);
                    $prof->setSexe($sexe);
                    $lastIdProf = $prof->insert();

                    if($lastIdProf >0){
                        if($modules != NULL){
                            foreach ($modules as $idModule) {
                                $professeurModule = new ProfesseurModule();
                                $professeurModule ->insertProfesseurModule($lastIdProf, $idModule);
                            }
                        }
    
                        if($classes != NULL){
                            foreach($classes as $idClasse){
                                $profClassAnnee = new ProfesseurClasseAnnee();
                                $profClassAnnee -> insetProfesseurClasseAnnee($lastIdProf, $idClasse);
                            }
                        }
                        echo $lastIdProf;
                    }else{
                        echo 0;
                    }
                    
                }
            }
            if($this->request->isGet()){
                
            }
        }

        public function supprimer(){
            if($this->request->isPost()){

                if($_POST['idSupprimer']){
                    extract($_POST);
                    $result = Professeur::deleteById($idSupprimer);
                    echo $result;
                }

            }
        }
    }