<?php

namespace App\Controller;

use App\Core\Session;
use App\Models\Etudiant;
use App\Models\Inscription;
use Digia\InstanceFactory\InstanceFactory;

    class InscriptionController extends Controller{
        
        public function lister(){
            if($this->request->isPost()){
                echo "method post";
            }

            if($this->request->isGet()){
                $data = Inscription::findAll();
                // dd($data);die;
                $this->view->load("inscription/listerInscription", $data);
                // dd($data);
            }
        }

        public function add(){
            if($this->request->isPost()){
                // dd($_POST);
                extract($_POST);

                $session =  new Session();
                $user = $session->getSession("user");

                // dd($user["id"]);
                
                // Etudiant->insert();

                $etu = new Etudiant();
                $etu->genererMatricule();
                $etu->setNomComplet($nomComplet);
                $etu->setAdresse($adresse);
                $etu->setLogin($login);
                $etu->setPassword("passer");
                $etu->setSexe($sexe);
                $lastIdEtu = $etu->insert();

                if($lastIdEtu > 0){
                    $insc  = new Inscription();
                    $insc->genererNumero();
                    $insc->setDate(date('d-m-Y'));
                    $result = $insc->insertInscription($idClasse,$lastIdEtu,$user["id"],4);
                    echo $result;
                }

                // $etu = \Digia\InstanceFactory\InstanceFactory::fromProperties(Etudiant::class,[$nomComplet,$adresse,$login,$sexe]);

                // dd($etu->getNomComplet());


            }
        }
    }