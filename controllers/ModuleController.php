<?php

namespace App\Controller;

use App\Models\Module;

    class ModuleController extends Controller{
        
        public function lister(){
            if($this->request->isPost()){
                echo "method post";
            }

            if($this->request->isGet()){
                echo "lister module";
                $data = Module::findAll();
                // dd($data);
                $this->view->load("module/listerModule", $data);
                // dd($data);
            }
        }
    }