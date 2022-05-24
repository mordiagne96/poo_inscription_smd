<?php

namespace App\Controller;

use App\Models\Module;

    class ModuleController extends Controller{
        
        public function lister(){
            if($this->request->isPost()){
                $data = Module::findAll();
                echo json_encode($data);
            }

            if($this->request->isGet()){
                $data = Module::findAll();
                // dd($data);
                $this->view->load("module/listerModule", $data);
                // dd($data);
            }
        }
        public function add(){
            // echo "ajouter module";
            if($this->request->isPost()){
                if(isset($_POST['data'])){
                    extract($_POST);
                    $module = json_decode($data);
                    $new_module = new Module();
                    $new_module->setLibelle($module->libelle);
                    $result = $new_module->insert();
                    if($result > 0){
                        echo $result;
                    }else{
                        echo 0;
                    }
                }
            }
            
        }

        public function supprimer(){
            if($this->request->isPost()){
                if(isset($_POST["idSupprimer"])){
                    extract($_POST);
                  //   echo $idSupprimer;
                      $result= Module::deleteById($idSupprimer);
                      echo $result;
                  }
                // echo "ok";
            }
            
        }
    }