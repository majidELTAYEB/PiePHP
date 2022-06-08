<?php
    namespace Core;
    class Database{
        public function connect()
        {
            try {
                return new \PDO('mysql:host=localhost;dbname=PiePHP;charset=utf8', 'majid', 'komballe007.');
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
        
        }
    }