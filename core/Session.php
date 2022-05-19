<?php

use App\Models\User;

    class Session{

        private User $user;

        public function __construct(){
            $this->user = new User();
        }

        public function getId(){
            return $this->user->getId();
        }
 
        public function getNomComplet(){
            return $this->user->getNomComplet();
        }

        public function getRole(){
            return $this->user->getRole();
        }
    }