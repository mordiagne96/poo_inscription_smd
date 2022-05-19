<?php

namespace App\Controller;

use App\Models\Professeur;

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
    }