<?php
namespace App\Controller;

use App\Models\Demande;

    class DemandeController extends Controller{

        public function lister(){
            // echo "methode lister-demande";
            if($this->request->isPost()){
                echo "method post";
            }

            if($this->request->isGet()){
                $data = Demande::findAll();
                // dd($data);die;
                $this->view->load("demande/listerDemande", $data);
                // dd($data);
            }
        }
    }