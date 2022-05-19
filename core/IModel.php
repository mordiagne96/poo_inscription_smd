<?php
    namespace App\Core;

    Interface IModel{
        public function insert():int;
        public function update():int;
        public function delete():int;

        public static function findAll():array;
        public static function findById(int $id):array;
        public static function findBy(string $sql, array $tab=[], bool $single=false):null|object|array;
        public static function findOneBy():array;
    }