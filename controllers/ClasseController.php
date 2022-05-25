<?php


    namespace App\Controller;
    use App\Models\Classe;
    use App\Config\Constante;

    class ClasseController extends Controller{

        public function add(){
            if($this->request->isGet()){
                $this->view->load("classe/nouvelleClasse");
                // dd($data);
            }
            if($this->request->isPost()){
                // $this->view->load("classe/nouvelleClasse");
                if(isset($_POST['data'])){
                    extract($_POST);
                    $classe = json_decode($data);
                    // dd($classe->libelle);
                    $newClasse = new Classe();
                    $newClasse->setLibelle($classe->libelle);
                    $newClasse->setFiliere($classe->filiere);
                    $newClasse->setNiveau($classe->niveau);
                    
                    $result = $newClasse->insert();
                    if($result > 0){
                        echo $result;
                    }else{
                        echo 0;
                    }
                }   
            }
        }

        public function edit(){
            if($this->request->isGet()){
                $id = $this->request->getUri()[2];
                //    dd(Classe::findById($id));
                $data = Classe::findById($id);
                    // $data = null;
                $this->view->load("classe/nouvelleClasse",$data);
            }


            //update classe avec php
            //*************************** */
            // if($this->request->isPost()){
            //     // echo "modification";
            //     die("modification classe fetch");
            //     $idAModifier = $this->request->getUri()[2];
            //     $classe = new Classe();
            //     extract($_POST);
            //     $classe->setId($idAModifier);
            //     $classe->setLibelle($libelle);
            //     $classe->setFiliere($filiere);
            //     $classe->setNiveau($niveau);
            //     $result = $classe->update();
            //     // echo $result;
            //     header("location:".Constante::urlBase()."Classe/lister");
            // }
           
            if($this->request->isPost()){
                extract($_POST);
                $datas = json_decode($data);
                if(isset($datas)){
                    // die($datas->id);
                        $classe = new Classe();
                        $classe->setId($datas->id);
                        $classe->setLibelle($datas->libelle);
                        $classe->setFiliere($datas->filiere);
                        $classe->setNiveau($datas->niveau);
                        $result = $classe->update();
                        if($result > 0){
                            echo $result;
                        }else{
                            echo 0;
                        }
                }
            }


        }

        public function lister(){

                if($this->request->isGet()){
                    $data = Classe::findAll();
                    $this->view->load("classe/listerClasse", $data);
                    // dd($data);
                }
                
                if($this->request->isPost()){
                    $data = Classe::findAll();
                    echo json_encode($data);
                }

        }

        public function supprimer(){
            if($this->request->isPost()){
                if(isset($_POST["idSupprimer"])){
                  extract($_POST);
                //   echo $idSupprimer;
                    $result= Classe::deleteById($idSupprimer);

                    echo $result;
                }
            }
        }
    }