<?php

    class Validator{

        public function valid_email(string $key, string $data,array $errors, string $message){
            if(empty($data) && $data != 0){
                $errors[$key]=$message;
            }

            if(!isset($errors[$key])){
                if(!filter_var(trim($data),FILTER_VALIDATE_EMAIL)){
                    $errors[$key]=$message;
                }
            }

            if(!isset($errors[$key]))
            {
                // valid_email($key,$data,$errors);
                $regex = "/^([a-zA-Z0-9\.]+@gmail+(\.)+com)$/";
                if(!isset($errors[$key])){
                    if(!preg_match($regex, trim($data))){
                        $errors[$key] = "Seul les email de type @gmail.com sont autoriser";
                    }
                }
            }

        }


        

    }