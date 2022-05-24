<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

use App\Models\RP;
use App\Core\Router;
use App\Models\User;
use App\Core\Request;
use App\Core\DataBase;
use App\Models\Classe;
use App\Models\Module;
use App\Models\Etudiant;
use App\Models\Professeur;
use App\Models\Inscription;
use App\Models\AttacheClasse;
use App\Models\ProfesseurModule;
use App\Models\ProfesseurClasseAnnee;
use App\Exception\RouteNotFoundException;

    require_once('../vendor/autoload.php');
    require_once('../core/fonctions.php');
    require_once('../core/loadRoute.php');
    
   
  
    // $us = new Professeur(); 

    // $us->setNomComplet("Ibrahima Dia");
    // $us->setAdresse("Mbar");
    // $us->setGrade("Maitrise");
    // // // var_dump($us);die;
    // $us -> insert();
    


    // dd(AttacheClasse::findAll());


// $class = new Classe();

// $class -> setLibelle("Alioune Sitéo Diatta");
// $class -> setFiliere("Dev Data");
// $class -> setNiveau("Master");

// $professeurModule = new ProfesseurModule();
// $professeurModule ->insertProfesseurModule(8, 5);

// $profClassAnnee = new ProfesseurClasseAnnee();
// $profClassAnnee -> insetProfesseurClasseAnnee(8, 7);

// Module::deleteById(7);


// $etu = new Etudiant();
// $etu->genererMatricule();
// $etu->setNomComplet("sakho");
// $etu->setAdresse("yeumbeul");
// $etu->setLogin("sakho@gmail.com");
// $etu->setPassword("passer");
// $etu->setSexe("M");
// // dd($etu);
// $etu->insert();
// die("dd");

// $insc  = new Inscription();
// $insc->genererNumero();
// $insc->setDate(date('d-m-Y'));
// $result = $insc->insertInscription(1,13,3,4);
// echo $result;


