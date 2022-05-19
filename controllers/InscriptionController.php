<?php

namespace App\Controller;

use App\Models\Inscription;

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
    }