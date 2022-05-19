<?php
use App\Core\DataBase;
use App\Models\Etudiant;
use App\Models\User;
use App\Models\Classe;
use App\Models\Professeur;
use App\Models\RP;
use App\Core\Request;
use App\Core\Router;
use App\Exception\RouteNotFoundException;
use App\Models\AttacheClasse;

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