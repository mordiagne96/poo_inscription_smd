<?php

    namespace App\Controller;
    use App\Models\Classe;
    class ClasseController extends Controller{

        public function add(){
            echo "Methode add-classe";
        }

        public function lister(){

                if($this->request->isGet()){
                    $data = Classe::findAll();
                    $this->view->load("classe/listerClasse", $data);
                    // dd($data);
                }
        }
    }