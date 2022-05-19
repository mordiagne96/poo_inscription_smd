<?php
namespace App\Controller;
use App\Core\Request;
use App\Core\View;

    class Controller{

        protected Request $request;
        protected View $view;

        public function __construct(){
            $this->view = new View();
            $this->request = new Request();
        }

    }